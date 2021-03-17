<?php

namespace App\Http\Controllers;

use App\Appointment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Http\Controllers\PatientController;

class AppointmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {        
        //Formatação na data para um modelo yyyy-mm-dd
        $data = explode('/', $request['data']);
        $request['data'] = $data[2].'-'.$data[1].'-'.$data[0];
        
        //Retorna as vagas do dia que está tentando agendar
        $vagas = DB::table('appointment_vacancie')
                            ->select('numvagas')
                            ->where('data', $request['data'])
                            ->get();
        //Verifica se o dia já tem vaga, se não tiver seta a quatidade de vaga, se tiver verifica se é maior que 0
        if(count($vagas) == 0){
            DB::table('appointment_vacancie')->insert([
                'data' => $request['data'],
                'numvagas' => 29
            ]);
        }else{
            if($vagas[0]->numvagas <= 0){
                return redirect()->route('telaInicial')->with('errorAppointment', 'As vagas para o dia informado acabaram, tenta uma outra data !');
            }
        }

        //Verifica se esse paciente não tem uma consulta agendada para esse mesmo dia
        $appointments = DB::table('appointment')
        ->join('patient', 'appointment.patient', '=', 'patient.id')
        ->select('appointment.*', 'patient.datanascimento')
        ->where('appointment.data', $request['data'])
        ->get();
        
        //Pega a data de nascimento do paciente que será agendado e a data atual
        $patient = DB::table('patient')->select('datanascimento')->where('id', $request['patient'])->get();
        $dateNew = Carbon::createFromFormat('Y-m-d', $patient[0]->datanascimento);
        $dateNow = Carbon::createFromFormat('Y-m-d', Carbon::now()->toDateString());
        
        if(isset($appointments[0]->patient)){
            foreach($appointments as $appointment){
                if($appointment->patient == $request['patient']){
                    return redirect()->route('telaInicial')->with('errorAppointment', 'Esse paciente já tem uma consulta agendada para esse dia!');
                }else{
                    //Gera a senha do paciente caso já tenham outros pacientes na fila
                    $dateExist = Carbon::createFromFormat('Y-m-d', $appointment->datanascimento);
                    $idade = $dateNow->diffInYears($dateNew);
                    if($idade >= 60){
                        $ticket = substr($appointment->ticket, 2);
                        $ticket++;
                        $request['ticket'] = strlen($ticket) > 1?'PC'.$ticket:'PC0'.$ticket;
                    }else{
                        $ticket = substr($appointment->ticket, 2);
                        $ticket++;
                        $request['ticket'] = strlen($ticket) > 1?'AC'.$ticket:'AC0'.$ticket;
                    }
                }
            }
        }else{
            //Gera a senha do paciente caso ele seja o primeiro da fila
            $idade = $dateNow->diffInYears($dateNew);
            if($idade >= 60){
                $request['ticket'] = 'PC01';
            }else{
                $request['ticket'] = 'AC01';
            }
        }        
        
        $appointment = new Appointment();
        DB::table('appointment_vacancie')->decrement('numvagas');
        $appointment->create($request->except(['_token']));

        return redirect()->route('telaInicial')->with('successAppointment', 'Consulta agendada com sucesso !!');
    }
    
    /**
     * Display all resources.
     *
     * @return \Illuminate\Http\Response
     */
    public function listAppointment()
    {
        $dateNow = Carbon::createFromFormat('Y-m-d', Carbon::now()->toDateString());
        $appointments = DB::table('appointment')
            ->join('patient', 'appointment.patient', '=', 'patient.id')
            ->join('doctor', 'appointment.doctor', '=', 'doctor.id')
            ->select('appointment.*', 'patient.nome as patient_name', 'patient.telefone', 'doctor.nome as doctor_name')
            ->where('appointment.data', $dateNow)
            ->where('appointment.status', null)
            ->get();
        foreach($appointments as $appointment){
            $nomecompleto = explode(' ', ucfirst(strtolower($appointment->doctor_name)));
            $nome = 'Dr. '.$nomecompleto[0];
            $appointment->doctor_name = $nome;
            $appointment->telefone = $appointment->telefone > 0?PatientController::mascara('(##) # ####-####', $appointment->telefone) : 'Sem telefone cadastrado';
        }
        return response()->json($appointments);
        
    }

    public function listAppointmentStatus()
    {
        $dateNow = Carbon::createFromFormat('Y-m-d', Carbon::now()->toDateString());
        $appointments = DB::table('appointment')
            ->join('patient', 'appointment.patient', '=', 'patient.id')
            ->join('doctor', 'appointment.doctor', '=', 'doctor.id')
            ->select('appointment.*', 'patient.nome as patient_name', 'patient.telefone', 'doctor.nome as doctor_name')
            ->where('appointment.data', $dateNow)
            ->where('appointment.status', "!=" , null)
            ->get();
        foreach($appointments as $appointment){
            $nomecompleto = explode(' ', ucfirst(strtolower($appointment->doctor_name)));
            $nome = 'Dr. '.$nomecompleto[0];
            $appointment->doctor_name = $nome;
        }
        return response()->json($appointments);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Appointment  $appointment
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $dateNow = Carbon::createFromFormat('Y-m-d', Carbon::now()->toDateString());
        $appointment = DB::table('appointment')
            ->join('patient', 'appointment.patient', '=', 'patient.id')
            ->join('doctor', 'appointment.doctor', '=', 'doctor.id')
            ->select('appointment.*', 'appointment.status as status_a', 'patient.*')
            ->where('ticket', $request->ticket)
            ->where('appointment.data', $dateNow)
            ->get();
        return response()->json($appointment);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Appointment  $appointment
     * @return \Illuminate\Http\Response
     */
    public function edit(Appointment $appointment)
    {
       
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Appointment  $appointment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        DB::table('appointment')
            ->where('id', $request->appointment)
            ->update(['status' => $request->status]);
        
        $dateNow = Carbon::createFromFormat('Y-m-d', Carbon::now()->toDateString());
        $appointments = DB::table('appointment')
            ->join('patient', 'appointment.patient', '=', 'patient.id')
            ->join('doctor', 'appointment.doctor', '=', 'doctor.id')
            ->select('appointment.*', 'patient.nome as patient_name', 'patient.telefone', 'doctor.nome as doctor_name')
            ->where('appointment.data', $dateNow)
            ->get();
        foreach($appointments as $appointment){
            $nomecompleto = explode(' ', ucfirst(strtolower($appointment->doctor_name)));
            $nome = 'Dr. '.$nomecompleto[0];
            $appointment->doctor_name = $nome;
            $appointment->telefone = $appointment->telefone > 0?PatientController::mascara('(##) # ####-####', $appointment->telefone) : 'Sem telefone cadastrado';
        }
        return response()->json($appointments);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Appointment  $appointment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Appointment $appointment)
    {
        //
    }

    public function listAppointmentJson()
    {
        $appointments = DB::table('appointment')
            ->join('patient', 'appointment.patient', '=', 'patient.id')
            ->join('doctor', 'appointment.doctor', '=', 'doctor.id')
            ->select('appointment.*', 'patient.nome as patient_name', 'doctor.nome as doctor_name')
            ->get();
        foreach($appointments as $appointment){
            $appointment->start = $appointment->data;
            $appointment->title = $appointment->ticket;
        }
        return response()->json($appointments);
    }
}

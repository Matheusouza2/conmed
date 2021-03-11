<?php

namespace App\Http\Controllers;

use App\Appointment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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

        $vagas = DB::table('appointment_vacancie')
                            ->select('numvagas')
                            ->where('data', $request['data'])
                            ->get();

        dd($vagas[0]->numvagas);
        if(empty($vagas->items)){
            DB::table('appointment_vacancie')->insert([
                'data' => $request['data'],
                'numvagas' => 1
            ]);
        }else{
            if($vagas[0]->numvagas == 0){
                return redirect()->route('telaInicial')->with('errorAppointment', 'As vagas para hoje acabaram');        
            }else{
                DB::table('appointment_vacancie')->decrement('numvagas');
            }
        }

        $appointment = new Appointment();
        $request['ticket'] = 'PC13';

        $appointment->create($request->except(['_token']));

        return redirect()->route('telaInicial')->with('successAppointment', 'Consulta agendada com sucesso !!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Appointment  $appointment
     * @return \Illuminate\Http\Response
     */
    public function show(Appointment $appointment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Appointment  $appointment
     * @return \Illuminate\Http\Response
     */
    public function edit(Appointment $appointment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Appointment  $appointment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Appointment $appointment)
    {
        //
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
            ->select('appointment.*', 'patient.nome as patient_nome', 'doctor.nome as doctor_name')
            ->get();
        foreach($appointments as $appointment){
            $appointment->start = $appointment->data;
            $appointment->title = $appointment->ticket;
        }
        return response()->json($appointments);
    }
}

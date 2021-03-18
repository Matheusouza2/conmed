<?php

namespace App\Http\Controllers;

use App\Attendance;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class AttendanceController extends Controller
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
        $dateNow = Carbon::createFromFormat('Y-m-d', Carbon::now()->toDateString());
        $appointment = DB::table('appointment')
            ->join('patient', 'appointment.patient', '=', 'patient.id')
            ->join('doctor', 'appointment.doctor', '=', 'doctor.id')
            ->select('appointment.*', 'appointment.status as status_a', 'patient.cpf as patient_cpf', 'doctor.crm')
            ->where('ticket', $request->ticket)
            ->where('appointment.data', $dateNow)
            ->get();
                
        $attendance = new Attendance();
        
        $request['hash'] = Hash::make($dateNow.$appointment[0]->crm.$appointment[0]->patient_cpf);
        $request['doctor'] = $appointment[0]->doctor;
        $request['patient'] = $appointment[0]->patient;
        $request['data'] = $dateNow;

        $attendanceVerify = Attendance::where('patient', $request['patient'])
                                                ->where('data', $dateNow)
                                                ->first();
        if($attendanceVerify === null){
            $attendance->create($request->except(['_token']));
        }else{
            return response()->json('error');
        }
    
        return response()->json('success');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\attendance  $attendance
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $dateNow = Carbon::createFromFormat('Y-m-d', Carbon::now()->toDateString());
        $appointment = DB::table('attendance')
            ->join('patient', 'attendance.patient', '=', 'patient.id')
            ->join('doctor', 'attendance.doctor', '=', 'doctor.id')
            ->select('attendance.*', 'patient.*')
            ->where('patient', $request->patient)
            ->where('attendance.data', $dateNow)
            ->get();
        return response()->json($appointment);
    }

    /**
     * Display the All resources.
     *
     * @param  \App\attendance  $attendance
     * @return \Illuminate\Http\Response
     */
    public function showAll(Request $request)
    {
        $dateNow = Carbon::createFromFormat('Y-m-d', Carbon::now()->toDateString());
        $attendance = DB::table('attendance')
            ->join('patient', 'attendance.patient', '=', 'patient.id')
            ->join('doctor', 'attendance.doctor', '=', 'doctor.id')
            ->select('attendance.*', 'patient.*')
            ->where('patient', $request->patient)
            ->get();
        return response()->json($attendance);
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\attendance  $attendance
     * @return \Illuminate\Http\Response
     */
    public function edit(attendance $attendance)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\attendance  $attendance
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $dateNow = Carbon::createFromFormat('Y-m-d', Carbon::now()->toDateString());
        DB::table('attendance')
            ->where('patient', $request->patient)
            ->where('data', $dateNow)
            ->update(['anamnesis' => $request->anamnesis, 
                      'medicines' => $request->medicines,
                      'exams' => $request->exams]);
                
        return response()->json('success');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\attendance  $attendance
     * @return \Illuminate\Http\Response
     */
    public function destroy(attendance $attendance)
    {
        //
    }
}

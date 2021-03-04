<?php

namespace App\Http\Controllers;

use App\Patient;
use Illuminate\Http\Request;

class PatientController extends Controller
{
    public function viewFormPatient(){
        return view('admin.formPatient');
    }

    public function savePatient(Request $request){
        $patient = new Patient();
        
        $patient->create($request->except(['_token']));

        return redirect()->route('listPatient')->with('mensage', 'Paciente cadastrado com sucesso!');
    }

    function listPatient(){
        $patients = Patient::all();
        return view('admin.patients', compact('patients'));
    }

    public function updatePatient(Type $var = null)
    {
        # code...
    }

    public function delPatient(Type $var = null)
    {
        # code...
    }
}

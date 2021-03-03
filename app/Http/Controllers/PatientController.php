<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PatientController extends Controller
{
    public function viewFormPatient(){
        return view('admin.formPatient');
    }

    public function savePatient(Type $var = null)
    {
        # code...
    }

    function listPatient(Type $var = null)
    {
        # code...
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

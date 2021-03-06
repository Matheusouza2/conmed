<?php

namespace App\Http\Controllers;

use App\Doctor;
use App\Controllers\PatientController;
use Illuminate\Http\Request;

class DoctorController extends Controller
{
    public function listDoctors()
    {
        $doctors = Doctor::all();
        foreach($doctors as $doctor){
            $cpfv = null;
            $cpf = $doctor->cpf;
            if(strlen($cpf) == 10){
                $cpfv = '0'.$cpf;
            }elseif(strlen($cpf) == 9){
                $cpfv = '00'.$cpf;
            }else{
                $cpfv = $cpf;
            }
            $doctor->cpf = $cpfv;
            $doctor->cpf = PatientController::mascara('###.###.###-##', $doctor->cpf);
            $doctor->telefone = ($doctor->telefone > 0)?PatientController::mascara('(##) # ####-####', $doctor->telefone) : 'Sem telefone cadastrado';
        }
        return view('admin.doctors', compact('doctors'));
    }

    public function listDoctorJson(Request $request)
    {
        $data = [];
        if($request->has('q')){
            $search = $request->q;
            $data = Doctor::select("id","nome")
                    ->where('nome','ILIKE',"%$search%")
                    ->get();
        }
        return response()->json($data);
    }
}

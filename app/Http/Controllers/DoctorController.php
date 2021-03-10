<?php

namespace App\Http\Controllers;

use App\Doctor;
use App\Http\Controllers\PatientController;
use Illuminate\Http\Request;

class DoctorController extends Controller
{
    public function viewFormDoctor()
    {
        return view('admin.formDoctor');
    }

    public function storeDoctor(Request $request)
    {
        $doctor = new Doctor();
        //Retira a formatação de texto do CPF
        $request['cpf'] = str_replace(array('.','-'), '', $request['cpf']);
        //Retirar a formatação de texto do telefone
        $request['telefone'] = $request['telefone']??0;
        $request['telefone'] = str_replace(array('(',')','-',' '),'',$request['telefone']);
        $doctorVerify = Doctor::where('cpf', $request['cpf'])
                                ->orWhere('crm', $request['crm'])
                                ->where('uf', $request['uf'])
                                ->first();
        if($doctorVerify === null){
            $doctor->create($request->except(['_token']));
            return redirect()->route('listDoctors')->with('mensage', 'Médico cadastrado com sucesso!');
        }else{
            return redirect()->route('formDoctor')->with('mensage', 'Já consta um médico com esse CPF ou CRM cadastrado!');
        }
    }

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

    public function listDoctorsJson(Request $request)
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

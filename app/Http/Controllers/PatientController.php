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

        //Retira a formatação de texto do CPF
        $request['cpf'] = str_replace(array('.','-'), '', $request['cpf']);
        //Retira a formatação de texto do CEP
        $request['cep'] = str_replace('-', '', $request['cep']);
        //Retirar a formatação de texto do telefone
        $request['telefone'] = $request['telefone']??0;
        $request['telefone'] = str_replace(array('(',')','-',' '),'',$request['telefone']);
        //Formata  a data de nascimento de d/m/Y para m/d/Y acompanhando o banco de dados
        $data = explode('/', $request['datanascimento']);
        $request['datanascimento'] = $data[1].'/'.$data[0].'/'.$data[2];
        //Recupera o paciente com o CPF para logos após fazer a verificação de cadastro
        $patientVerify = Patient::where('cpf', $request['cpf'])->first();
        
        if($patientVerify === null){
            $patient->create($request->except(['_token']));
            return redirect()->route('listPatient')->with('mensage', 'Paciente cadastrado com sucesso!');
        }else{
            return redirect()->route('formPatient')->with('mensage', 'Já consta um paciente com esse CPF cadastrado!');
        }
    }

    public function listPatient(){
        $patients = Patient::all();
        foreach($patients as $patient){
            $cpfv = null;
            $cpf = $patient->cpf;
            if(strlen($cpf) == 10){
                $cpfv = '0'.$cpf;
            }elseif(strlen($cpf) == 9){
                $cpfv = '00'.$cpf;
            }else{
                $cpfv = $cpf;
            }
            $patient->cpf = $cpfv;
            $patient->cpf = PatientController::mascara('###.###.###-##', $patient->cpf);
            $patient->telefone = ($patient->telefone > 0)?PatientController::mascara('(##) # ####-####', $patient->telefone) : 'Sem telefone cadastrado';
        }
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

    public function mascara($mask, $str){
        $str = str_replace(" ","",$str);
        for($i=0;$i<strlen($str);$i++){
            $mask[strpos($mask,"#")] = $str[$i];
        }
        return $mask;
    }
}

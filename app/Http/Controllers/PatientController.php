<?php

namespace App\Http\Controllers;

use App\Patient;
use Illuminate\Http\Request;

class PatientController extends Controller
{
    public function viewFormPatient(){
        session(['edit' => false]);
        return view('admin.formPatient');
    }

    public function storePatient(Request $request){
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
        //Recupera o paciente com o CPF para logos após faz a verificação de cadastro
        $patientVerify = Patient::where('cpf', $request['cpf'])->first();
        $request['status'] = 'active';
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
    
    public function listPatientJson(Request $request)
    {
        $data = [];
        if($request->has('q')){
            $search = $request->q;
            $data = Patient::select("id","nome","cpf", "convenio", "logradouro", "numero", "cidade", "uf")
                    ->where('cpf','ILIKE',"%$search%")
                    ->orWhere('nome', 'ILIKE', "%$search%")
                    ->get();
        }
        
        foreach($data as $patient){
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
        }
        return response()->json($data);
    }

    public function viewEditPatient(Patient $patient)
    {
        session(['edit' => true]);
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
        $patient->cep = PatientController::mascara('#####-###', $patient->cep);
        $patient->telefone = ($patient->telefone > 0)?PatientController::mascara('(##) # ####-####', $patient->telefone) : '';
        return view('admin.formPatient', compact('patient'));
    }

    public function editPatient(Request $request, Patient $patient)
    {
        //Retira a formatação de texto do CPF
        $request['cpf'] = str_replace(array('.','-'), '', $request['cpf']);
        //Retira a formatação de texto do CEP
        $request['cep'] = str_replace('-', '', $request['cep']);
        //Retirar a formatação de texto do telefone
        $request['telefone'] = $request['telefone']??0;
        $request['telefone'] = str_replace(array('(',')','-',' '),'',$request['telefone']);
        //Formata  a data de nascimento de d/m/Y para m/d/Y acompanhando o banco de dados
        $data = explode('/', $request['datanascimento']);
        $request['datanascimento'] = $data[2].'-'.$data[1].'-'.$data[0];

        $patient->nome = $request->nome;
        $patient->nomesocial = $request->nomesocial;
        $patient->cpf = $request->cpf;
        $patient->datanascimento = $request->datanascimento;
        $patient->cep = $request->cep;
        $patient->logradouro = $request->logradouro;
        $patient->numero = $request->numero;
        $patient->bairro = $request->bairro;
        $patient->cidade = $request->cidade;
        $patient->uf = $request->uf;
        $patient->telefone = $request->telefone;
        $patient->convenio = $request->convenio;
        $patient->numeroconvenio = $request->numeroconvenio;
        $patient->observacoes = $request->observacoes;
        $patient->save();
        return redirect()->route('listPatient');
    }

    public function delPatient(Patient $patient)
    {
        $patient->status = 'deactivated';
        $patient->save();
        return redirect()->route('listPatient')->with('mensage', 'Paciente desativado com sucesso!');
    }

    public static function mascara($mask, $str){
        $str = str_replace(" ","",$str);
        for($i=0;$i<strlen($str);$i++){
            $mask[strpos($mask,"#")] = $str[$i];
        }
        return $mask;
    }
}

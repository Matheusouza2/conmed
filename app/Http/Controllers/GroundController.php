<?php

namespace App\Http\Controllers;

use App\Ground;
use Illuminate\Http\Request;

class GroundController extends Controller{
    
    public function saveGround(Request $request){
        
        $ground = new Ground();
        $ground->create($request->except(['_token']));

        return redirect()->action('DashboardController@telaInicial')->with('mensage', 'Terreno cadastrado com sucesso!');
    }
}

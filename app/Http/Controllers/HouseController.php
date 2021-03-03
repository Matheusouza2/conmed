<?php

namespace App\Http\Controllers;

use App\House;
use Illuminate\Http\Request;

class HouseController extends Controller{
    
    public function saveHouse(Request $request){
        $house = new House();

        $house->create($request->except(['_token']));

        return redirect()->route('telaInicial')->with('mensage', 'Imóvel cadastrado com sucesso!');
    }
}

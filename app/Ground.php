<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ground extends Model{

    protected $table = 'ground';

    protected $fillable = [
        'largura', 
        'comprimento', 
        'topografia', 
        'localizacao',
        'moradores_prox',
        'observacao'
    ];

}
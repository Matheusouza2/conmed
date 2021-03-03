<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class House extends Model{
    protected $table = 'house';

    protected $fillable = [
        'estadoImovel',
        'conservacao',
        'qtdquartos',
        'suites',
        'varanda',
        'salaEstar',
        'cozinha',
        'areaServico',
        'areaLazer',
        'closet',
        'observacao'
    ];
}

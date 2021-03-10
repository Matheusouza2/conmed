<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    protected $table = 'doctor';

    protected $fillable = [
        'uf',
        'crm',
        'cpf',
        'nome',
        'situacao',
        'telefone',
        'observacoes'
    ];
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    protected $table = 'patient';

    protected $fillable = [
        'nome',
        'nomesocial',
        'cpf',
        'datanascimento',
        'cep',
        'logradouro',
        'numero',
        'bairro',
        'cidade',
        'uf',
        'telefone',
        'convenio',
        'numeroconvenio',
        'observacoes'
    ];
}

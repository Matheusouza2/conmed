<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Paciente extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(){
        Schema::create('patient', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nome');
            $table->string('nomesocial')->nullable();
            $table->bigInteger('cpf');
            $table->date('datanascimento');
            $table->bigInteger('cep');
            $table->string('logradouro');
            $table->integer('numero')->nullable();
            $table->string('bairro');
            $table->string('cidade');
            $table->string('uf');
            $table->bigInteger('telefone')->nullable();
            $table->string('convenio');
            $table->bigInteger('numeroconvenio')->nullable();
            $table->text('observacoes')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(){
        //
    }
}

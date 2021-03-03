<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHouseTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('house', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('estadoImovel');
            $table->string('conservacao');
            $table->integer('qtdquartos');
            $table->integer('suites')->default('0');
            $table->string('varanda')->default('off');
            $table->string('salaEstar')->default('off');
            $table->string('cozinha')->default('off');
            $table->string('areaServico')->default('off');
            $table->string('areaLazer')->default('off');
            $table->string('closet')->default('off');
            $table->text('observacao');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('house');
    }
}

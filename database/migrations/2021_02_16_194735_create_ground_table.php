<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGroundTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ground', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->float('largura');
            $table->float('comprimento');
            $table->string('topografia');
            $table->integer('localizacao');
            $table->integer('moradores_prox');
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
        Schema::dropIfExists('ground');
    }
}

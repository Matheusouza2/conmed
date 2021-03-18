<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableAppointments extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('appointment', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('patient');
            $table->integer('doctor');
            $table->date('data');
            $table->string('ticket');
            $table->string('status')->nullable();
            $table->timestamps();
            $table->foreign('patient')->references('id')->on('patient');
            $table->foreign('doctor')->references('id')->on('doctor');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('table_appointments');
    }
}

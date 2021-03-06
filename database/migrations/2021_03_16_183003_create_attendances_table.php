<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAttendancesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('attendance', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('doctor');
            $table->integer('patient');
            $table->date('data');
            $table->text('anamnesis')->nullable();
            $table->text('medicines')->nullable();
            $table->text('exams')->nullable();
            $table->string('images')->nullable();
            $table->string('hash')->nullable();
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
        Schema::dropIfExists('attendances');
    }
}

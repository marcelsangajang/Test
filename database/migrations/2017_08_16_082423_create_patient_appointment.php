<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePatientAppointment extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('patient_appointment', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('patient_id')->unsigned();
            $table->integer('chair_id')->unsigned();
            $table->date('date');
            $table->time('time');
            $table->integer('duration');
            $table->string('treatment_type');
            $table->timestamps();
        });

        Schema::table('patient_appointment', function($table) {
           $table->foreign('patient_id')->references('id')->on('patient')->onDelete('cascade')->onUpdate('no action');
           $table->foreign('chair_id')->references('id')->on('chair')->onDelete('cascade')->onUpdate('no action');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('patient_appointment');
    }
}

<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePatientGroupAppointmentConnect extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('patient_group_appointment_connect', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('appointment_id')->unsigned();
            $table->integer('group_id')->unsigned();
            $table->timestamps();
        });

        Schema::table('patient_group_appointment_connect', function($table) {
           $table->foreign('appointment_id')->references('id')->on('patient_appointment')->onDelete('cascade')->onUpdate('no action');
           $table->foreign('group_id')->references('id')->on('patient_group_appointment')->onDelete('cascade')->onUpdate('no action');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('patient_group_appointment_connect');
    }
}

<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmployeeDayOff extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employee_day_off', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('employee_id')->unsigned();
            $table->date('start_date');
            $table->date('end_date');
            $table->time('start_time');
            $table->time('end_time');
            $table->timestamps();
        });

        Schema::table('employee_day_off', function($table) {
           $table->foreign('employee_id')->references('id')->on('employee')->onDelete('cascade')->onUpdate('no action');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('employee_day_off');
    }
}

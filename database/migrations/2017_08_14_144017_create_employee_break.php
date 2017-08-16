<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmployeeBreak extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employee_break', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('weekday_id')->unsigned();
            $table->time('start_time');
            $table->time('end_time');         
            $table->timestamps();
        });

        Schema::table('employee_break', function($table) {
           $table->foreign('weekday_id')->references('id')->on('employee_weekday')->onDelete('cascade')->onUpdate('no action');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('employee_break');
    }
}

<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmployeePeriod extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employee_period', function (Blueprint $table) {
            $table->increments('id');
<<<<<<< HEAD
            $table->integer('employee_id')->unsigned();
=======
            $table->integer('employee_id');
>>>>>>> 7b00d724bb5600743aade44a9d9beaa3e45bcbaa
            $table->integer('interval');
            $table->date('start_date');
            $table->date('end_date');
            $table->string('description', 40);
            $table->timestamps();
        });

        Schema::table('employee_period', function($table) {
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
        Schema::dropIfExists('employee_period');
    }
}

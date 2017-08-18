<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateChairPeriod extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chair_period', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('chair_id')->unsigned();
            $table->integer('interval');
            $table->integer('interval_lines')->nullable();
            $table->date('start_date');
            $table->date('end_date');
            $table->string('description', 40);
            $table->timestamps();
        });


        Schema::table('chair_period', function($table) {
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
        Schema::dropIfExists('chair_period');
    }
}

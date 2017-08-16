<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateScheduleWeekday extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('schedule_weekday', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('period_id')->unsigned();
            $table->time('start_time');
            $table->time('end_time');
            $table->integer('repeat');
            $table->string('day', 3);
            $table->timestamps();
        });

        Schema::table('schedule_weekday', function($table) {
           $table->foreign('period_id')->references('id')->on('schedule_period')->onDelete('cascade')->onUpdate('no action');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('schedule_weekday');
    }
}

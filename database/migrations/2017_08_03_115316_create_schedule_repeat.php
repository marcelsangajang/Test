<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateScheduleRepeat extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('schedule_repeat', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('weekday_id')->unsigned();
            $table->date('start_date');
            $table->timestamps();
        });

        Schema::table('schedule_repeat', function($table) {
           $table->foreign('weekday_id')->references('id')->on('schedule_weekday')->onDelete('cascade')->onUpdate('no action');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('schedule_repeat');
    }
}

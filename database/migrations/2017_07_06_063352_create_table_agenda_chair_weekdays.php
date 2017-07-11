<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableAgendaChairWeekdays extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('agenda_chair_weekdays', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('period_id');
            $table->integer('interval');
            $table->time('begin_time');
            $table->time('end_time');
            $table->string('day', 3);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('agenda_chair_weekdays');
    }
}
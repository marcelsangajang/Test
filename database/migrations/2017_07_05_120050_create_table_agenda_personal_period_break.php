<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableAgendaPersonalPeriodBreak extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('agenda_personal_period_break', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('period_id');
            $table->time('start');
            $table->time('end');
            $table->string('day', 3);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('agenda_personal_period_break');
    }
}

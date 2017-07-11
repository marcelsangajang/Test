<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AgendaPersonalWeekdayFormController extends Controller
{
    //Create the weekdays for this period
        //MONDAY
        $agendaPersonalPeriodWeekdays = new AgendaPersonalPeriodWeekdays();
        $start_time = Input::get('start_time_mo');
        $end_time = Input::get('end_time_mo');
        $day = 'mo';
        $period_id = $agendaPersonalPeriod->id;

        $agendaPersonalPeriodWeekdays->period_id =$period_id;
        $agendaPersonalPeriodWeekdays->start_time = $start_time;
        $agendaPersonalPeriodWeekdays->end_time = $end_time;
        $agendaPersonalPeriodWeekdays->day = $day;
        $agendaPersonalPeriodWeekdays->save();

        //THUESDAY
        $agendaPersonalPeriodWeekdays = new AgendaPersonalPeriodWeekdays();
        $start_time = Input::get('start_time_tu');
        $end_time = Input::get('end_time_tu');
        $day = 'tu';
        $period_id = $agendaPersonalPeriod->id;

        $agendaPersonalPeriodWeekdays->period_id =$period_id;
        $agendaPersonalPeriodWeekdays->start_time = $start_time;
        $agendaPersonalPeriodWeekdays->end_time = $end_time;
        $agendaPersonalPeriodWeekdays->day = $day;
        $agendaPersonalPeriodWeekdays->save();
      
        //WEDNESDAY
        $agendaPersonalPeriodWeekdays = new AgendaPersonalPeriodWeekdays();
        $start_time = Input::get('start_time_we');
        $end_time = Input::get('end_time_we');
        $day = 'we';
        $period_id = $agendaPersonalPeriod->id;

        $agendaPersonalPeriodWeekdays->period_id =$period_id;
        $agendaPersonalPeriodWeekdays->start_time = $start_time;
        $agendaPersonalPeriodWeekdays->end_time = $end_time;
        $agendaPersonalPeriodWeekdays->day = $day;
        $agendaPersonalPeriodWeekdays->save();
        
        //THURSDAY
        $agendaPersonalPeriodWeekdays = new AgendaPersonalPeriodWeekdays();
        $start_time = Input::get('start_time_th');
        $end_time = Input::get('end_time_th');
        $day = 'th';
        $period_id = $agendaPersonalPeriod->id;

        $agendaPersonalPeriodWeekdays->period_id =$period_id;
        $agendaPersonalPeriodWeekdays->start_time = $start_time;
        $agendaPersonalPeriodWeekdays->end_time = $end_time;
        $agendaPersonalPeriodWeekdays->day = $day;
        $agendaPersonalPeriodWeekdays->save();

        //FRIDAY
        $agendaPersonalPeriodWeekdays = new AgendaPersonalPeriodWeekdays();
        $start_time = Input::get('start_time_fr');
        $end_time = Input::get('end_time_fr');
        $day = 'fr';
        $period_id = $agendaPersonalPeriod->id;

        $agendaPersonalPeriodWeekdays->period_id =$period_id;
        $agendaPersonalPeriodWeekdays->start_time = $start_time;
        $agendaPersonalPeriodWeekdays->end_time = $end_time;
        $agendaPersonalPeriodWeekdays->day = $day;
        $agendaPersonalPeriodWeekdays->save();

        public function weekday() {

        }
        
}

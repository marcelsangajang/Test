<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Request;
use App\models\AgendaPersonalPeriod;
use App\models\AgendaPersonalPeriodWeekdays;
use App\Http\Controllers\Controller;
use Input;


class PeriodController extends Controller
{
    public function period() {
        return view('CreatePersonalPeriod');
    }


    public function funcpostPeriod() {
        
        $inputForm = Input::all();
        //$dataVal = AgendaPersonal::validate($inputForm);
        
        //if ($dataVal->fails()) {
            
        //    return redirect()->route('createpersonalagenda')->with([$inputForm])->withErrors($dataVal);
            
        //}
         

        //Create a period for a personal agenda
        $agendaPersonalPeriod = new AgendaPersonalPeriod();
        $agenda_personal_id = 1;//Input::get('');
        $description = Input::get('description');
        $start_date = Input::get('start_date');
        $end_date = Input::get('end_date');

          
        $agendaPersonalPeriod->description = $description;
        $agendaPersonalPeriod->agenda_personal_id = $agenda_personal_id;
        $agendaPersonalPeriod->start_date = $start_date;
        $agendaPersonalPeriod->end_date = $end_date;
        $agendaPersonalPeriod->save();

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
        
 
        echo 'Gelukt';
        
        echo '<pre>';
        var_dump(Request::all());
        echo '</pre>';
        
      
    }
 
}

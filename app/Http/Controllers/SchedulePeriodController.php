<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\ScheduleModel;
use App\models\SchedulePeriodModel;
use App\models\ScheduleWeekdayModel;
use Input;

class SchedulePeriodController extends Controller
{
    public function view() {
        $allSchedules = ScheduleModel::get()->toArray();
  
        foreach ($allSchedules as $schedule) {
            $allSchedulesArray[] = array('id' => $schedule['id'], 'chair_id' => $schedule['chair_id'], 'employee_id' => $schedule['employee_id']);
        }
        
        return view('SchedulePeriodView', compact('allSchedulesArray'));  
    }

    public function post() {
        //Create a period for a personal agenda
        $inputForm = Input::all();
        $schedule_period = new SchedulePeriodModel();
        $schedule_period->schedule_id = $inputForm['scheduleSelect'];
        $schedule_period->description = Input::get('description');
        $schedule_period->start_date = Input::get('start_date');
        $schedule_period->end_date = Input::get('end_date');

        $schedule_period->save();

        $period_id = $schedule_period->id;
        
        $myList = ['mon', 'tue', 'wed', 'thu', 'fri', 'sat', 'sun'];
     
        //Create 7 weekdays per period
        for ($x = 0; $x < 7; $x++) {
            //Create weekday
            $agendaPersonalPeriodWeekdays = new ScheduleWeekdayModel();
            $start_time = Input::get('start_time_'.$myList[$x]);
            $end_time = Input::get('end_time_'.$myList[$x]);
            $day = $myList[$x];
            
            //Update weekday table in DB
            $agendaPersonalPeriodWeekdays->period_id =$period_id;
            $agendaPersonalPeriodWeekdays->start_time = $start_time;
            $agendaPersonalPeriodWeekdays->end_time = $end_time;
            $agendaPersonalPeriodWeekdays->day = $day;
            $agendaPersonalPeriodWeekdays->save();

        } 
        return view('welcome');
    }
}

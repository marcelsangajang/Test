<?php
/*Form controller for generating periods. This class needs weekdays and breaks to create periods. This class is
used by the Personal Agenda (form) controller to generate a Personal Agenda*/

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Request;
use App\models\AgendaPersonalPeriodModel;
use App\models\AgendaPersonalWeekdaysModel;
use App\models\AgendaPersonalBreakModel;
use App\Http\Controllers\Controller;
use App\models\AgendaPersonalSuperModel;
use App\Models\AgendaPersonalModel;
use Input;
use DB;
use View;

class AgendaPersonalPeriodFormController extends Controller
{
    public function period() {
        $allAgendas = AgendaPersonalModel::get()->toArray();
  
        foreach ($allAgendas as $agenda) {
            $allAgendasArray[] = array('id' => $agenda['id'], 'description_intern' => $agenda['description_intern']);
        }
        
        return view('AgendaPersonalPeriodFormView', compact('allAgendasArray'));       
    }

    //Creates periods, the corresponding weekdays (work hours) and breaks
    public function funcpostPeriod() {
        //Create a period for a personal agenda
        $inputForm = Input::all();
        $agendaPersonalPeriod = new AgendaPersonalPeriodModel();
        $agenda_personal_id = $inputForm['agendaSelect'];
        $description = Input::get('description');
        $start_date = Input::get('start_date');
        $end_date = Input::get('end_date');
         
        $agendaPersonalPeriod->description = $description;
        $agendaPersonalPeriod->interval = 2;
        $agendaPersonalPeriod->agenda_id = $agenda_personal_id;
        $agendaPersonalPeriod->start_date = $start_date;
        $agendaPersonalPeriod->end_date = $end_date;
        $agendaPersonalPeriod->save();

        $period_id = $agendaPersonalPeriod->id;
        
        $myList = ['mon', 'tue', 'wed', 'thu', 'fri', 'sat', 'sun'];
     
        //Create 7 weekdays per period
        for ($x = 0; $x < 7; $x++) {
            //Create weekday
            $agendaPersonalPeriodWeekdays = new AgendaPersonalWeekdaysModel();
            $start_time = Input::get('start_time_'.$myList[$x]);
            $end_time = Input::get('end_time_'.$myList[$x]);
            $day = $myList[$x];
            
            //Update weekday table in DB
            $agendaPersonalPeriodWeekdays->period_id =$period_id;
            $agendaPersonalPeriodWeekdays->start_time = $start_time;
            $agendaPersonalPeriodWeekdays->end_time = $end_time;
            $agendaPersonalPeriodWeekdays->day = $day;
            $agendaPersonalPeriodWeekdays->save();

            //Create the breaks for each weekday
            $max_breaks = 2;
            for ($i = 1; $i < $max_breaks + 1; $i++) {
                $agendaPersonalBreak = new AgendaPersonalBreakModel();
                $agendaPersonalBreak->weekday_id = $agendaPersonalPeriodWeekdays->id;
                $agendaPersonalBreak->start_time = Input::get('break'.$i.'_start_'.$myList[$x]);
                $agendaPersonalBreak->end_time = Input::get('break'.$i.'_end_'.$myList[$x]); 
                $agendaPersonalBreak->save();
            }
        } 
        return view('welcome')    ;
    }
 
}

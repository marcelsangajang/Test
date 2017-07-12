<?php
/*Form controller for generating periods. This class needs weekdays and breaks to create periods. This class is
used by the Personal Agenda (form) controller to generate a Personal Agenda*/

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Request;
use App\models\AgendaPersonalPeriodModel;
use App\models\AgendaPersonalWeekdaysModel;
use App\models\AgendaPersonalBreakModel;
use App\Http\Controllers\Controller;
use Input;

class AgendaPersonalPeriodFormController extends Controller
{
    public function period() {
        return view('AgendaPersonalPeriodFormView');
    }


    public function funcpostPeriod() {
        //Create a period for a personal agenda
        $agendaPersonalPeriod = new AgendaPersonalPeriodModel();
        $agenda_personal_id = Input::get('agenda_personal_id');
        $description = Input::get('description');
        $start_date = Input::get('start_date');
        $end_date = Input::get('end_date');
         
        $agendaPersonalPeriod->description = $description;
        $agendaPersonalPeriod->agenda_id = $agenda_personal_id;
        $agendaPersonalPeriod->start_date = $start_date;
        $agendaPersonalPeriod->end_date = $end_date;
        $agendaPersonalPeriod->save();

        $period_id = $agendaPersonalPeriod->id;
  
        //MONDAY
        $agendaPersonalPeriodWeekdays = new AgendaPersonalWeekdaysModel();
        $start_time = Input::get('start_time_mo');
        $end_time = Input::get('end_time_mo');
        $day = 'mo';

        $agendaPersonalPeriodWeekdays->period_id =$period_id;
        $agendaPersonalPeriodWeekdays->start_time = $start_time;
        $agendaPersonalPeriodWeekdays->end_time = $end_time;
        $agendaPersonalPeriodWeekdays->day = $day;
        $agendaPersonalPeriodWeekdays->save();

        //Monday breaks
        $agendaPersonalBreak = new AgendaPersonalBreakModel();
        $agendaPersonalBreak->weekday_id = $agendaPersonalPeriodWeekdays->id;
        $agendaPersonalBreak->start_time = Input::get('break1_start_mo');
        $agendaPersonalBreak->end_time = Input::get('break1_end_mo'); 
        $agendaPersonalBreak->save();

        $agendaPersonalBreak = new AgendaPersonalBreakModel();
        $agendaPersonalBreak->weekday_id = $agendaPersonalPeriodWeekdays->id;
        $agendaPersonalBreak->start_time = Input::get('break2_start_mo');
        $agendaPersonalBreak->end_time = Input::get('break2_end_mo'); 
        $agendaPersonalBreak->save();


        //TUESDAY
        $agendaPersonalPeriodWeekdays = new AgendaPersonalWeekdaysModel();
        $start_time = Input::get('start_time_tu');
        $end_time = Input::get('end_time_tu');
        $day = 'tu';

        $agendaPersonalPeriodWeekdays->period_id =$period_id;
        $agendaPersonalPeriodWeekdays->start_time = $start_time;
        $agendaPersonalPeriodWeekdays->end_time = $end_time;
        $agendaPersonalPeriodWeekdays->day = $day;
        $agendaPersonalPeriodWeekdays->save();

        //Tuesday breaks
        $agendaPersonalBreak = new AgendaPersonalBreakModel();
        $agendaPersonalBreak->weekday_id = $agendaPersonalPeriodWeekdays->id;
        $agendaPersonalBreak->start_time = Input::get('break1_start_tu');
        $agendaPersonalBreak->end_time = Input::get('break1_end_mo'); 
        $agendaPersonalBreak->save();

        $agendaPersonalBreak = new AgendaPersonalBreakModel();
        $agendaPersonalBreak->weekday_id = $agendaPersonalPeriodWeekdays->id;
        $agendaPersonalBreak->start_time = Input::get('break2_start_tu');
        $agendaPersonalBreak->end_time = Input::get('break2_end_tu'); 
        $agendaPersonalBreak->save();

        //WEDNESDAY
        $agendaPersonalPeriodWeekdays = new AgendaPersonalWeekdaysModel();
        $start_time = Input::get('start_time_we');
        $end_time = Input::get('end_time_we');
        $day = 'we';

        $agendaPersonalPeriodWeekdays->period_id =$period_id;
        $agendaPersonalPeriodWeekdays->start_time = $start_time;
        $agendaPersonalPeriodWeekdays->end_time = $end_time;
        $agendaPersonalPeriodWeekdays->day = $day;
        $agendaPersonalPeriodWeekdays->save();

        //Wednesday breaks
        $agendaPersonalBreak = new AgendaPersonalBreakModel();
        $agendaPersonalBreak->weekday_id = $agendaPersonalPeriodWeekdays->id;
        $agendaPersonalBreak->start_time = Input::get('break1_start_we');
        $agendaPersonalBreak->end_time = Input::get('break1_end_we'); 
        $agendaPersonalBreak->save();

        $agendaPersonalBreak = new AgendaPersonalBreakModel();
        $agendaPersonalBreak->weekday_id = $agendaPersonalPeriodWeekdays->id;
        $agendaPersonalBreak->start_time = Input::get('break2_start_we');
        $agendaPersonalBreak->end_time = Input::get('break2_end_we'); 
        $agendaPersonalBreak->save();

        //THURSDAY
        $agendaPersonalPeriodWeekdays = new AgendaPersonalWeekdaysModel();
        $start_time = Input::get('start_time_th');
        $end_time = Input::get('end_time_th');
        $day = 'th';

        $agendaPersonalPeriodWeekdays->period_id =$period_id;
        $agendaPersonalPeriodWeekdays->start_time = $start_time;
        $agendaPersonalPeriodWeekdays->end_time = $end_time;
        $agendaPersonalPeriodWeekdays->day = $day;
        $agendaPersonalPeriodWeekdays->save();

        //Thursday breaks
        $agendaPersonalBreak = new AgendaPersonalBreakModel();
        $agendaPersonalBreak->weekday_id = $agendaPersonalPeriodWeekdays->id;
        $agendaPersonalBreak->start_time = Input::get('break1_start_th');
        $agendaPersonalBreak->end_time = Input::get('break1_end_th'); 
        $agendaPersonalBreak->save();

        $agendaPersonalBreak = new AgendaPersonalBreakModel();
        $agendaPersonalBreak->weekday_id = $agendaPersonalPeriodWeekdays->id;
        $agendaPersonalBreak->start_time = Input::get('break2_start_th');
        $agendaPersonalBreak->end_time = Input::get('break2_end_th'); 
        $agendaPersonalBreak->save();

        //FRIDAY
        $agendaPersonalPeriodWeekdays = new AgendaPersonalWeekdaysModel();
        $start_time = Input::get('start_time_fr');
        $end_time = Input::get('end_time_fr');
        $day = 'fr';

        $agendaPersonalPeriodWeekdays->period_id =$period_id;
        $agendaPersonalPeriodWeekdays->start_time = $start_time;
        $agendaPersonalPeriodWeekdays->end_time = $end_time;
        $agendaPersonalPeriodWeekdays->day = $day;
        $agendaPersonalPeriodWeekdays->save();

        //Friday breaks
        $agendaPersonalBreak = new AgendaPersonalBreakModel();
        $agendaPersonalBreak->weekday_id = $agendaPersonalPeriodWeekdays->id;
        $agendaPersonalBreak->start_time = Input::get('break1_start_fr');
        $agendaPersonalBreak->end_time = Input::get('break1_end_fr'); 
        $agendaPersonalBreak->save();

        $agendaPersonalBreak = new AgendaPersonalBreakModel();
        $agendaPersonalBreak->weekday_id = $agendaPersonalPeriodWeekdays->id;
        $agendaPersonalBreak->start_time = Input::get('break2_start_fr');
        $agendaPersonalBreak->end_time = Input::get('break2_end_fr'); 
        $agendaPersonalBreak->save();

        //SATURDAY
        $agendaPersonalPeriodWeekdays = new AgendaPersonalWeekdaysModel();
        $start_time = Input::get('start_time_sa');
        $end_time = Input::get('end_time_sa');
        $day = 'sa';

        $agendaPersonalPeriodWeekdays->period_id =$period_id;
        $agendaPersonalPeriodWeekdays->start_time = $start_time;
        $agendaPersonalPeriodWeekdays->end_time = $end_time;
        $agendaPersonalPeriodWeekdays->day = $day;
        $agendaPersonalPeriodWeekdays->save();

        //Saturday breaks
        $agendaPersonalBreak = new AgendaPersonalBreakModel();
        $agendaPersonalBreak->weekday_id = $agendaPersonalPeriodWeekdays->id;
        $agendaPersonalBreak->start_time = Input::get('break1_start_sa');
        $agendaPersonalBreak->end_time = Input::get('break1_end_sa'); 
        $agendaPersonalBreak->save();

        $agendaPersonalBreak = new AgendaPersonalBreakModel();
        $agendaPersonalBreak->weekday_id = $agendaPersonalPeriodWeekdays->id;
        $agendaPersonalBreak->start_time = Input::get('break2_start_sa');
        $agendaPersonalBreak->end_time = Input::get('break2_end_sa'); 
        $agendaPersonalBreak->save();

        //SUNDAY
        $agendaPersonalPeriodWeekdays = new AgendaPersonalWeekdaysModel();
        $start_time = Input::get('start_time_su');
        $end_time = Input::get('end_time_su');
        $day = 'su';

        $agendaPersonalPeriodWeekdays->period_id =$period_id;
        $agendaPersonalPeriodWeekdays->start_time = $start_time;
        $agendaPersonalPeriodWeekdays->end_time = $end_time;
        $agendaPersonalPeriodWeekdays->day = $day;
        $agendaPersonalPeriodWeekdays->save();

        //Sunday breaks
        $agendaPersonalBreak = new AgendaPersonalBreakModel();
        $agendaPersonalBreak->weekday_id = $agendaPersonalPeriodWeekdays->id;
        $agendaPersonalBreak->start_time = Input::get('break1_start_su');
        $agendaPersonalBreak->end_time = Input::get('break1_end_su'); 
        $agendaPersonalBreak->save();

        $agendaPersonalBreak = new AgendaPersonalBreakModel();
        $agendaPersonalBreak->weekday_id = $agendaPersonalPeriodWeekdays->id;
        $agendaPersonalBreak->start_time = Input::get('break2_start_su');
        $agendaPersonalBreak->end_time = Input::get('break2_end_su'); 
        $agendaPersonalBreak->save();

        echo '<pre>';
        var_dump(Request::all());
        echo '</pre>';
        
      
    }
 
}

<?php
/*Form controller for generating periods. This class needs weekdays and breaks to create periods. This class is
used by the Personal Agenda (form) controller to generate a Personal Agenda*/

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Request;
use App\models\AgendaPersonalPeriodModel;
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

        echo '<pre>';
        var_dump(Request::all());
        echo '</pre>';
        
      
    }
 
}

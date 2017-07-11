<?php
/*Form controller for generating weekdays. This data is needed by AgendaPersonalPeriodFormController to generate periods*/
namespace App\Http\Controllers;


use Illuminate\Support\Facades\Request;
use App\models\AgendaPersonalWeekdaysModel;
use App\Http\Controllers\Controller;
use Input;

class AgendaPersonalWeekdaysFormController extends Controller
{
	public function weekdays() {
		return view('AgendaPersonalWeekdaysFormView');
	}

	public function funcpostWeekdays() {
		$period_id = Input::get('period_id');

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

        //THUESDAY
        $agendaPersonalPeriodWeekdays = new AgendaPersonalWeekdaysModel();
        $start_time = Input::get('start_time_tu');
        $end_time = Input::get('end_time_tu');
        $day = 'tu';

        $agendaPersonalPeriodWeekdays->period_id =$period_id;
        $agendaPersonalPeriodWeekdays->start_time = $start_time;
        $agendaPersonalPeriodWeekdays->end_time = $end_time;
        $agendaPersonalPeriodWeekdays->day = $day;
        $agendaPersonalPeriodWeekdays->save();

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

	}
}

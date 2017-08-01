<?php
/*Form controller for generating periods. This class needs weekdays and breaks to create periods. This class is
used by the Personal Agenda (form) controller to generate a Personal Agenda*/

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Request;
use App\models\EmployeePeriodModel;
use App\models\EmployeeWeekdayModel;
use App\models\EmployeeBreakModel;
use App\Http\Controllers\Controller;
use App\models\AgendaPersonalSuperModel;
use App\Models\EmployeeModel;
use Input;
use DB;
use View;

class EmployeePeriodController extends Controller
{
    public function view() {
        $allEmployees = EmployeeModel::get()->toArray();
  
        foreach ($allEmployees as $employee) {
            $allEmployeesArray[] = array('id' => $employee['id'], 'description_intern' => $employee['description_intern']);
        }
        
        return view('EmployeePeriodView', compact('allEmployeesArray'));       
    }

    //Creates periods, the corresponding weekdays (work hours) and breaks
    public function post() {
        //Create a period for a personal agenda
        $inputForm = Input::all();
        $employee_period = new EmployeePeriodModel();
        $employee_period->agenda_id = $inputForm['employeeSelect'];
        $employee_period->description = Input::get('description');
        $employee_period->start_date = Input::get('start_date');
        $employee_period->end_date = Input::get('end_date');
        $employee_period->interval = 2;

        $employee_period->save();

        $period_id = $employee_period->id;
        
        $myList = ['mon', 'tue', 'wed', 'thu', 'fri', 'sat', 'sun'];
     
        //Create 7 weekdays per period
        for ($x = 0; $x < 7; $x++) {
            
            //Create weekday
            $employee_weekdays = new EmployeeWeekdayModel();
            $employee_weekdays->period_id = $period_id;
            $employee_weekdays->start_time = Input::get('start_time_'.$myList[$x]);
            $employee_weekdays->end_time = Input::get('end_time_'.$myList[$x]);
            $employee_weekdays->day = $myList[$x];
            $employee_weekdays->save();

            //Create the breaks for each weekday
            $max_breaks = 2;
            for ($i = 1; $i < $max_breaks + 1; $i++) {
                $employee_break = new EmployeeBreakModel();
                $employee_break->weekday_id = $employee_weekdays->id;
                $employee_break->start_time = Input::get('break'.$i.'_start_'.$myList[$x]);
                $employee_break->end_time = Input::get('break'.$i.'_end_'.$myList[$x]); 
                $employee_break->save();
            }
        } 
        return view('welcome');
    }
 
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ChairModel;
use App\Models\EmployeeModel;
use App\models\ScheduleModel;
use App\models\SchedulePeriodModel;
use App\models\ScheduleWeekdayModel;
use App\models\ScheduleRepeatModel;
use Input;

class ScheduleController extends Controller
{
    public function view() {       
    	$allChairs = ChairModel::get()->toArray();
   
        foreach ($allChairs as $chair) {
            $allChairsArray[] = array('id' => $chair['id'], 'description' => $chair['description']);
        }

        $allEmployees = EmployeeModel::get()->toArray();

        foreach ($allEmployees as $employee) {
            $allEmployeesArray[] = array('id' => $employee['id'], 'first_name' => $employee['first_name'], 
            	'last_name' => $employee['last_name']);
        }

        $allSchedules = ScheduleModel::get()->toArray();
  
        foreach ($allSchedules as $schedule) {
            $allSchedulesArray[] = array('id' => $schedule['id'], 'chair_id' => $schedule['chair_id'], 'employee_id' => $schedule['employee_id']);
        }

        return view('ScheduleView')->with(['allChairsArray'=>$allChairsArray])->with(['allEmployeesArray'=>$allEmployeesArray])->with(['allSchedulesArray'=>$allSchedulesArray]);         
    }
      
    public function createSchedule() {   
        $inputForm = Input::all();
        //$dataVal = ScheduleModel::validate($inputForm);
        
        //if ($dataVal->fails()) {        
        //    return redirect()->route('ScheduleView')->with([$inputForm])->withErrors($dataVal);    
       // }
         
    	$appointment = new ScheduleModel();
        $appointment->employee_id = $inputForm['employeeSelect'];
        $appointment->chair_id = $inputForm['chairSelect'];
        $appointment->save();
        return view('welcome');
    }

    public function createPeriod() {
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
            //$nr indicates the amount of different worktimes on that workday per period
            $nr = Input::get('repeat_number_'.$myList[$x]);
            //If the day is fixed throughout the period
            if($nr == 0) {
                //Create weekday and update db
                $weekday = new ScheduleWeekdayModel();
                $weekday->period_id =$period_id;
                $weekday->start_time = Input::get('start_time_'.$myList[$x].'_0');
                $weekday->end_time = Input::get('end_time_'.$myList[$x].'_0');
                $weekday->repeat = $nr;
                $weekday->day = $myList[$x];
                $weekday->save();
            } 
            //If the worktimes are different on the same weekday depending on the week
            else {
                for($i = 0; $i < $nr + 1; $i++) {
                    //Create weekday and update db
                    $weekday = new ScheduleWeekdayModel();
                    $weekday->period_id =$period_id;
                    $weekday->start_time = Input::get('start_time_'.$myList[$x].'_'.$i);
                    $weekday->end_time = Input::get('end_time_'.$myList[$x].'_'.$i);
                    $weekday->repeat = $nr;
                    $weekday->day = $myList[$x];
                    $weekday->save();

                    //Create link entry in repeat table
                    $repeat = new ScheduleRepeatModel();
                    $repeat->weekday_id = $weekday->id;
                    $repeat->start_date = Input::get('date_'.$i);
                    $repeat->save();
                }
            }
        } 
    }
}

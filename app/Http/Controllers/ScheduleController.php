<?php
//Author: Marcel Sang-Ajang
//This file contains the schedule functionality. The schedule section of the program links a chair to one (or more) employees. 
//After the user links a chair to an employee, the availability of the chair and the availability of its employees is combined, 
//creating a schedule indicating which chair is staffed during which dates/times and by which employees.
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
    //Load all variables used in view, then return view
    public function view() {              
        //Retrieve all chairs from db
        $allChairs = ChairModel::get()->toArray();

        foreach ($allChairs as $chair) {
            $allChairsArray[] = array('id' => $chair['id'], 'description' => $chair['description']);
        }

        //Retrieve all employees from db
        $allEmployees = EmployeeModel::get()->toArray();

        foreach ($allEmployees as $employee) {
            $allEmployeesArray[] = array('id' => $employee['id'], 'first_name' => $employee['first_name'], 
            	'last_name' => $employee['last_name']);
        }

        //Retrieve all schedules from db
        $allSchedules = ScheduleModel::get()->toArray();
  
        foreach ($allSchedules as $schedule) {
            $allSchedulesArray[] = array('id' => $schedule['id'], 'chair_id' => $schedule['chair_id'], 'employee_id' => $schedule['employee_id']);
        }

        //Return the view with all created arrays
        return view('ScheduleView')->with(['allChairsArray'=>$allChairsArray])->with(['allEmployeesArray'=>$allEmployeesArray])->with(['allSchedulesArray'=>$allSchedulesArray]);         
    }
      
    //Creates a schedule: links one chair to one (or more) employees
    public function createSchedule() {   
        $input = Input::all();

        //Data validation
        //$dataVal = ScheduleModel::validate($input);
        
        //if ($dataVal->fails()) {        
        //    return redirect()->route('ScheduleView')->with([$input])->withErrors($dataVal);    
        // }
         
    	$schedule = new ScheduleModel();
        $schedule->employee_id = $input['employeeSelect'];
        $schedule->chair_id = $input['chairSelect'];
        $schedule->save();
        return view('welcome');
    }

    //Creates schedule periods (and weekdays), and store in db
    public function createPeriod() {
        //Create a period for the schedule
        $input = Input::all();
        $schedulePeriod = new SchedulePeriodModel();
        $schedulePeriod->schedule_id = $input['scheduleSelect'];
        $schedulePeriod->description = $input['description'];
        $schedulePeriod->start_date = $input['start_date'];
        $schedulePeriod->end_date = $input['end_date'];
        $schedulePeriod->save();

        //Hardcoded list of weekday abbreviations used in html form
        $myList = ['mon', 'tue', 'wed', 'thu', 'fri', 'sat', 'sun'];

        //Create 7 weekdays per period
        for ($x = 0; $x < 7; $x++) {
            //$nr indicates the amount of different worktimes for that weekday during that period
            $nr = $input['repeat_number_'.$myList[$x]];
            //If the day is fixed throughout the period
            if($nr == 0) {
                //Create weekday and update db
                $scheduleWeekday = new ScheduleWeekdayModel();
                $scheduleWeekday->period_id = $schedulePeriod->id;
                $scheduleWeekday->start_time = $input['start_time_'.$myList[$x].'_0'];
                $scheduleWeekday->end_time = $input['end_time_'.$myList[$x].'_0'];
                $scheduleWeekday->repeat = $nr;
                $scheduleWeekday->day = $myList[$x];
                $scheduleWeekday->save();
            } 
            //If the worktimes are different on the same weekday depending on the week
            else {
                for($i = 0; $i < $nr + 1; $i++) {
                    //Create weekday and update db
                    $scheduleWeekday = new ScheduleWeekdayModel();
                    $scheduleWeekday->period_id = $schedulePeriod->id;
                    $scheduleWeekday->start_time = $input['start_time_'.$myList[$x].'_'.$i];
                    $scheduleWeekday->end_time = $input['end_time_'.$myList[$x].'_'.$i];
                    $scheduleWeekday->repeat = $nr;
                    $scheduleWeekday->day = $myList[$x];
                    $scheduleWeekday->save();

                    //Create link entry in repeat table
                    $scheduleRepeat = new ScheduleRepeatModel();
                    $scheduleRepeat->weekday_id = $scheduleWeekday->id;
                    $scheduleRepeat->start_date = $input['date_'.$i];
                    $scheduleRepeat->save();
                }
            }
        } 
        return view('welcome');
    }
}

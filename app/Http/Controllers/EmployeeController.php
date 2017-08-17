<?php
//Author: Marcel Sang-Ajang
//This file controls the employee section of the program. It controls the db section responsible for employee availability
namespace App\Http\Controllers;

use Illuminate\Support\Facades\Request;
use App\models\EmployeeModel;
use App\models\EmployeePeriodModel;
use App\models\EmployeeWeekdayModel;
use App\models\EmployeeBreakModel;
use App\Http\Controllers\Controller;
use Input;

class EmployeeController extends Controller {
    //Load all variables used in view, then return view
    public function view() {       
        $allEmployees = EmployeeModel::get()->toArray();
    
        //Create array of all employees in db, then pass to form
        foreach ($allEmployees as $employee) {
            $allEmployeesArray[] = array('id' => $employee['id'], 'description_intern' => $employee['description_intern']);
        }
        
        return view('EmployeeView', compact('allEmployeesArray'));    
    }
      
    //Creates employee and stores in db
    public function CreateEmployee() {   
        $input = Input::all();
        
        $dataVal = EmployeeModel::validate($input);
        
        //Data validation
        if ($dataVal->fails()) {        
            return redirect()->route('EmployeeView')->with([$input])->withErrors($dataVal);    
        }
         
        //Create employee model, save in db using input from frontend form
        $employee = new EmployeeModel();
        $employee->description_intern = $input['description_intern'];
        $employee->first_name = $input['first_name'];
        $employee->last_name = $input['last_name'];
        $employee->date_of_birth = $input['date_of_birth'];
        $employee->address = $input['address'];
        $employee->zipcode = $input['zipcode'];
        $employee->house_number = $input['house_number'];
        $employee->city = $input['city'];
        $employee->phone_number_1 = $input['phone_number'];
        $employee->phone_number_2 = 12345;
        $employee->email = $input['email'];
        $employee->type = $input['type'];             
        $employee->save();   

        return view('welcome');
    }

    //Creates employee periods (and weekdays), link to employee id, and store in db
    public function createPeriod() {
        $input = Input::all();

        //Create period model and store in db
        $employeePeriod = new EmployeePeriodModel();
        $employeePeriod->employee_id = $input['employeeSelect']; //Link to employee id
        $employeePeriod->description = $input['description'];
        $employeePeriod->start_date = $input['start_date'];
        $employeePeriod->end_date = $input['end_date'];
        $employeePeriod->interval = 2; //temporarily hardcoded
        $employeePeriod->save();
                
        //Hardcoded list of weekday abbreviations used in html form
        $myList = ['mon', 'tue', 'wed', 'thu', 'fri', 'sat', 'sun'];
     
        //Create 7 weekdays per period
        for ($x = 0; $x < 7; $x++) {
            
            //Create weekday
            $employeeWeekday = new EmployeeWeekdayModel();
            $employeeWeekday->period_id = $employeePeriod->id;
            $employeeWeekday->start_time = $input['start_time_'.$myList[$x]];
            $employeeWeekday->end_time = $input['end_time_'.$myList[$x]];
            $employeeWeekday->day = $myList[$x];
            $employeeWeekday->save();

            //Create the breaks for each weekday
            $max_breaks = 2;
            //Create at most 2 breaks per weekday
            for ($i = 1; $i < $max_breaks + 1; $i++) {
                $EmployeeBreak = new EmployeeBreakModel();
                $EmployeeBreak->weekday_id = $employeeWeekday->id;
                $EmployeeBreak->start_time = $input['break'.$i.'_start_'.$myList[$x]];
                $EmployeeBreak->end_time = $input['break'.$i.'_end_'.$myList[$x]]; 
                $EmployeeBreak->save();
            }
        } 
        return view('welcome');
    }
    
}

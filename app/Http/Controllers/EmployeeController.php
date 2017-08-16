<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Request;
use App\models\EmployeeModel;
use App\models\EmployeePeriodModel;
use App\models\EmployeeWeekdayModel;
use App\models\EmployeeBreakModel;
use App\Http\Controllers\Controller;
use Input;

class EmployeeController extends Controller {
    public function view() {       
        $allEmployees = EmployeeModel::get()->toArray();
  
        foreach ($allEmployees as $employee) {
            $allEmployeesArray[] = array('id' => $employee['id'], 'description_intern' => $employee['description_intern']);
        }
        
        return view('EmployeeView', compact('allEmployeesArray'));    
    }
      
    public function CreateEmployee() {   
        $inputForm = Input::all();
        
        $dataVal = EmployeeModel::validate($inputForm);
        
        if ($dataVal->fails()) {        
            return redirect()->route('EmployeeView')->with([$inputForm])->withErrors($dataVal);    
        }
         
        $employee = new EmployeeModel();
        $employee->description_intern = Input::get('description_intern');
        $employee->first_name = Input::get('first_name');
        $employee->last_name = Input::get('last_name');
        $employee->date_of_birth = Input::get('date_of_birth');
        $employee->address = Input::get('address');
        $employee->zipcode = Input::get('zipcode');
        $employee->house_number = Input::get('house_number');
        $employee->city = Input::get('city');
        $employee->phone_number_1 = Input::get('phone_number');
        $employee->phone_number_2 = 12345;
        $employee->email = Input::get('email');
        $employee->type = Input::get('type');
                  
        $employee->save();      
        return view('welcome');
    }

    public function createPeriod() {

        $inputForm = Input::all();
        $employee_period = new EmployeePeriodModel();
        $employee_period->employee_id = $inputForm['employeeSelect'];
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

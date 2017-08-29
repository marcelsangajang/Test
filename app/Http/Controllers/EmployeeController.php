<?php
//Author: Marcel Sang-Ajang
//This file controls the employee section of the program. It controls the db section responsible for employee availability
namespace App\Http\Controllers;

use Illuminate\Support\Facades\Request;
use App\models\EmployeeModel;
use App\models\EmployeePeriodModel;
use App\models\EmployeeWeekdayModel;
use App\models\EmployeeBreakModel;
use App\models\EmployeeRepeatModel;
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
        //if ($dataVal->fails()) {        
        //    return redirect()->route('EmployeeView')->with([$input])->withErrors($dataVal);    
        //}




        //Create employee model, save in db using input from frontend form
        $employee = new EmployeeModel();
        $employee->description_intern = $input['descriptionIntern'];
        $employee->first_name = $input['firstName'];
        $employee->last_name = $input['lastName'];
        $employee->date_of_birth = $input['dateOfBirth'];
        $employee->address = $input['address'];
        $employee->zipcode = $input['zipcode'];
        $employee->house_number = $input['houseNumber'];
        $employee->city = $input['city'];
        $employee->phone_number_1 = $input['phoneNumber1'];
        $employee->phone_number_2 = $input['phoneNumber2'];
        $employee->email = $input['email'];
        $employee->type = $input['type'];             
        $employee->save();   

        return view('welcome');
        echo json_encode($employee, true);
    }

    //Creates employee periods (and weekdays), link to employee id, and store in db
    public function createPeriod() {
        $input = Input::all();

        //Create period model and store in db
        $employeePeriod = new EmployeePeriodModel();
        $employeePeriod->employee_id = $input['employeeID']; 
        $employeePeriod->description = $input['description'];
        $employeePeriod->start_date = $input['startDate'];
        $employeePeriod->end_date = $input['endDate'];
        $employeePeriod->interval = $input['interval']; 
        $employeePeriod->interval_lines = $input['intervalLines']; 
        $employeePeriod->save();
                        
        //Create 7 weekdays per period
        foreach($input['employeeAvailability'] as $weekday) {
            //Create weekday
            $employeeWeekday = new EmployeeWeekdayModel();
            $employeeWeekday->period_id = $employeePeriod->id;
            $employeeWeekday->start_time = $weekday['startTime'];
            $employeeWeekday->end_time = $weekday['endTime'];
            $employeeWeekday->day = substr($weekday['weekday'], 0, 3);
            $employeeWeekday->repeat_interval = $weekday['repeatInterval'];
            $employeeWeekday->save();

            //Create the breaks for each weekday
            foreach($weekday['breaks'] as $break) {
                $employeeBreak = new EmployeeBreakModel();
                $employeeBreak->weekday_id = $employeeWeekday->id;
                $employeeBreak->start_time = $break['startTime'];
                $employeeBreak->end_time = $break['endTime']; 
                $employeeBreak->save();
            }

            echo $weekday['repeatInterval'];
            //Create repeats for the weekdays that have it selected
            if($weekday['repeat'] == true) {
                $employeeRepeat = new EmployeeRepeatModel();
                $employeeRepeat->weekday_id = $employeeWeekday->id;
                $employeeRepeat->start_date = $weekday['repeatDate'];
                $employeeRepeat->save();
            }
        } 

        return view('welcome');
    }

    //Permanently deletes employee from db
    public function deleteEmployee($id) {
        //App\Models\EmployeeModel::destroy($id);
        echo $id;
    }
}

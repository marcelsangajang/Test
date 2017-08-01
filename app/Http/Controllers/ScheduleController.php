<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ChairModel;
use App\Models\ScheduleModel;
use App\Models\EmployeeModel;
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

        return view('ScheduleView')->with(['allChairsArray'=>$allChairsArray])->with(['allEmployeesArray'=>$allEmployeesArray]);         
    }
      
    public function post() {   
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
}

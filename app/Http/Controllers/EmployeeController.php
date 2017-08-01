<?php

namespace App\Http\Controllers;

use App\models\EmployeeModel;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Request;
use Input;

class EmployeeController extends Controller {
    public function view() {       
        return view('employeeView');        
    }
      
    public function post() {   
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
}

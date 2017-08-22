<?php

//This file creates the first employee, chair and patient. This is temporary since we arent working with frontend JS
// Now we can place the employee and period employee creation in one view without using JS


namespace App\Http\Controllers;

use App\models\ChairModel;
use App\models\EmployeeModel;
use App\models\PatientModel;
use App\Models\ScheduleModel;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Request;
use Input;

class TestController extends Controller
{
    public function view() {
    	return view('testview');
    }

    public function vue() {
        return view('vue');
    }

    //Create first employee, chair and patient for testing purposes
    public function post() {
    	//Create employee
    	$employee = new EmployeeModel();
        $employee->description_intern = 'Marcel';
        $employee->first_name = 'Marcel';
        $employee->last_name = 'Sang-Ajang';
        $employee->date_of_birth = '1992-05-26';
        $employee->address = 'Maria Dermoutlaan';
        $employee->zipcode = 1187;
        $employee->house_number = 1;
        $employee->city = 'Amstelveen';
        $employee->phone_number_1 = 061234567;
        $employee->phone_number_2 = 12345;
        $employee->email = 'marcel_saj@hotmail.com';
        $employee->type = 'Tandarts';
        $employee->save();

    	//Create chair
        $chair = new ChairModel();
        $chair->description = 'Stoel 1';
        $chair->save();      

    	//Create patient
    	$patient = new PatientModel();
        $patient->first_name = 'Marcel';
        $patient->last_name = 'Sang-Ajang';
        $patient->date_of_birth = '1992-05-26';
        $patient->address = 'Maria Dermoutlaan';
        $patient->zipcode = 1187;
        $patient->house_number = 1;
        $patient->city = 'Amstelveen';
        $patient->phone_number_1 = 061234567;
        $patient->phone_number_2 = 12345;
        $patient->email = 'marcel_saj@hotmail.com';
        $patient->save();

        $schedule = new ScheduleModel();
        $schedule->employee_id = 1;
        $schedule->chair_id = 1;
        $schedule->save();
    }
}

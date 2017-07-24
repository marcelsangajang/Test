<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\PatientModel;
use App\Http\Controllers\Controller;
use Input;

class PatientFormController extends Controller
{
    public function view() {
    	
        return view('PatientFormView');        
    }

    public function post() {
    	$patient = new PatientModel();
        $patient->first_name = Input::get('first_name');
        $patient->last_name = Input::get('last_name');
        $patient->date_of_birth = Input::get('date_of_birth');
        $patient->address = Input::get('address');
        $patient->zipcode = Input::get('zipcode');
        $patient->house_number = Input::get('house_number');
        $patient->city = Input::get('city');
        $patient->phone_number_1 = Input::get('phone_number');
        $patient->phone_number_2 = 12345;
        $patient->email = Input::get('email');
        $patient->save();
    }
}

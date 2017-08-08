<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Input;

class PatientGroupAppointmentController extends Controller
{
    public function post() {
    	$inputForm = Input::all();

    	$temp = $inputForm['patientGroup'];
    	echo $temp;
    }
}

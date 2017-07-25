<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PatientAppointmentsController extends Controller {

	public function view() {
		return view('PatientAppointmentsFormView');

        $allPatients = PatientModel::with(array('periods', 'periods.weekdays.breaks'))->get();
   
        foreach ($allPatients as $patient) {
            $allPatientsArray[] = array('id' => $patient['id'], 'description_intern' => $patient['description_intern']);
        }
        
        return view('AgendaPersonalPeriodFormView', compact('allPatientsArray'));       
    }
    
    public function post() {
    	$appointment = new PatientAppointmentsModel();
    	
    }
}

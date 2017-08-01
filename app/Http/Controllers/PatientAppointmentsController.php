<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//use App\models\AgendaPersonalSuperModel;
use App\Models\PatientModel;
use App\Models\EmployeeModel;
use App\Models\PatientAppointmentsModel;

use Input;
class PatientAppointmentsController extends Controller {

	public function view() {
		//return view('PatientAppointmentsFormView');

        $allPatients = PatientModel::get()->toArray();
   
        foreach ($allPatients as $patient) {
            $allPatientsArray[] = array('id' => $patient['id'], 'first_name' => $patient['first_name'], 'last_name' => 
            	$patient['last_name'], 'date_of_birth' => $patient['date_of_birth'], 'address' => $patient['address'], 'house_number' => $patient['house_number']);
        }

        $allAgendas = EmployeeModel::get()->toArray();
  
        foreach ($allAgendas as $agenda) {
            $allAgendasArray[] = array('id' => $agenda['id'], 'description_intern' => $agenda['description_intern'], 'type' => $agenda['type']);
        }
     
        return view('PatientAppointmentsFormView')->with(['allPatientsArray'=>$allPatientsArray])->with(['allAgendasArray' => $allAgendasArray]); 
    }
    
    public function post() {
        $inputForm = Input::all();

    	$appointment = new PatientAppointmentsModel();
        $appointment->patient_id = $inputForm['patientSelect'];
        $appointment->agenda_id = $inputForm['agendaSelect'];
        $appointment->date = Input::get('date');
        $appointment->time = Input::get('time');
        $appointment->duration = Input::get('duration');
        $appointment->treatment_type = Input::get('treatment_type');
        $appointment->save();
        return view('welcome');

    }
}

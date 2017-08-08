<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PatientModel;
use Input;
use DB;

class PatientGroupController extends Controller
{
    public function view() {
    	$allPatients = PatientModel::get()->toArray();
   
        foreach ($allPatients as $patient) {
            $allPatientsArray[] = array('id' => $patient['id'], 'first_name' => $patient['first_name'], 'last_name' => 
            	$patient['last_name'], 'date_of_birth' => $patient['date_of_birth'], 'address' => $patient['address'], 'house_number' => $patient['house_number']);
        }

        return view('PatientGroupView')->with(['allPatientsArray'=>$allPatientsArray]);       
    }

    public function post() {
    	$inputForm = Input::all();
    	$patient_id = $inputForm['patientSelect'];

    	//Finds the zipcode and house number of the main patient
    	$main_patient = DB::table('patient')->where('id', $patient_id)->select('zipcode', 'house_number')->get();
    	$zipcode = $main_patient[0]->zipcode;
    	$house_number = $main_patient[0]->house_number;
    	//var_dumpS($main_patient);

    	//Finds all patients living on that adress
    	$patient_group = DB::table('patient')->where([['zipcode', $zipcode], ['house_number', $house_number]])->get();

    	//var_dumpS($main_patient2);

    	
    	//var_dumpS($patient_group);
    	foreach ($patient_group as $patient) {
    	//	echo 'id = '.$patient->id;
    		$allPatientsArray[] = array('id' => $patient->id, 'first_name' => $patient->first_name, 'last_name' => $patient->last_name);
    	}

    	return view('PatientGroupAppointmentView')->with(['allPatientsArray'=>$allPatientsArray]);
    }
}

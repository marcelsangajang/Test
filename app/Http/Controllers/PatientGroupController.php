<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PatientModel;

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
}

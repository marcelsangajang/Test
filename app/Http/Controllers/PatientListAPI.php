<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use app\models\PatientModel;

use DB;


class PatientListAPI extends Controller
{
    public function get_all_patients() {

       $patientsColl = DB::table('patient')->get();

       echo json_encode($patientsColl);

    }
}

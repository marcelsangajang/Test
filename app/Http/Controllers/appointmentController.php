<?php

namespace App\Http\Controllers;


use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Request;
use Input;

use App\models\PatientAppointmentModel;


class appointmentController extends Controller
{
    public function postAppointm(Request $request) {

        $input = Input::all();

        if ($input) {

            $appointm = new PatientAppointmentModel();
            $appointm->patient_id = $input['patientID'];
            $appointm->chair_id   = $input['agendaID'];
            $appointm->date       = $input['date'];
            $appointm->time       = $input['time'];
            $appointm->duration   = $input['duration'];
            $appointm->treatment_type   = 'controle';
            $appointm->save();
        }
    }
}

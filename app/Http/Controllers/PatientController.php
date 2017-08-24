<?php


namespace App\Http\Controllers;
use App\Models\PatientGroupAppointmentModel;
use App\models\PatientGroupAppointmentConnectModel;
use Illuminate\Http\Request;
use App\models\PatientModel;
use App\models\EmployeeModel;
use App\models\PatientAppointmentModel;

use App\Http\Controllers\Controller;
use Input;
use DB;

class PatientController extends Controller
{   
    //------------------PATIENT SECTION -----------------------------------------------
    public function patientView() {
        return view('PatientView');        
    }

    //Create a patient and store in db
    public function createPatient() {
        $input = Input::all();
        $patient = new PatientModel();
        $patient->first_name = $input['first_name'];
        $patient->last_name = $input['last_name'];
        $patient->date_of_birth = $input['date_of_birth'];
        $patient->address = $input['address'];
        $patient->zipcode = $input['zipcode'];
        $patient->house_number = $input['house_number'];
        $patient->city = $input['city'];
        $patient->phone_number_1 = $input['phone_number'];
        $patient->phone_number_2 = 12345;
        $patient->email = $input['email'];
        $patient->save();

        return view('welcome');
    }

    public function patientList() {
        $allPatients = PatientModel::get()->toArray();

        //Create array of all employees in db, then pass to form
        foreach ($allPatients as $patient) {
            $allPatientsArray[] = array('id' => $patient['id'], 'first_name' => $patient['first_name'], 'last_name' => $patient['last_name'], 'date_of_birth' => $patient['date_of_birth'], 'address' => $patient['address'], 'house_number' => $patient['house_number'], 'zipcode' => $patient['zipcode'], 'phone_number_1' => $patient['phone_number_1'], 'phone_number_2' => $patient['phone_number_2'], 'email' => $patient['email']);
        }
        return view('PatientListView', compact('allPatientsArray'));  
    }

    //------------------ APPOINTMENT SECTION -----------------------------------------------

    public function appointmentView() {
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
     
        return view('PatientAppointmentView')->with(['allPatientsArray'=>$allPatientsArray])->with(['allAgendasArray' => $allAgendasArray]); 
    }

    public function findAppointmentType() {
        $inputForm = Input::all();

        if($inputForm['appointmentSelect'] == 'group')  {
            return $this->createGroupAppointment($inputForm);  
        }
        if($inputForm['appointmentSelect'] == 'single') 
            $this->createAppointment($inputForm);

        return view('welcome');
    }

    public function createAppointment($inputForm) {

        $appointment = new PatientAppointmentModel();
        $appointment->patient_id = $inputForm['patientSelect'];
        $appointment->chair_id = $inputForm['agendaSelect'];
        $appointment->date = $inputForm['date'];
        $appointment->time = $inputForm['time'];
        $appointment->duration = $inputForm['duration'];
        $appointment->treatment_type = $inputForm['treatment_type'];
        $appointment->save();
        //return view('welcome');
        return $appointment->id;
    }

    //------------------GROUP APPOINTMENT SECTION -----------------------------------------------

    /*public function appointmentList() {
        $allAppointments = PatientAppointmentModel::get()->toArray();

        //Create array of all employees in db, then pass to form
        foreach ($allAppointments as $appointment) {
            $allPatientsArray[] = array('id' => $appointment['id'], 'patient_id' => $appointment['patient_id'], 'chair_id' => $appointment['chair_id'], 'date' => $appointment['date'], 'time' => $appointment['time'], 'duration' => $appointment['duration'], 'treatment_type' => $appointment['treatment_type'],);
        }

    }*/

    public function createGroupAppointment($inputForm) {
        //Create group appointment entry in DB
        $groupAppointment = new PatientGroupAppointmentModel();
        $groupAppointment->duration = $inputForm['duration'];
        $groupAppointment->description = $inputForm['description'];
        $groupAppointment->save();

        //Finds the zipcode and house number of the main patient
        $patient_id = $inputForm['patientSelect'];
        $main_patient = DB::table('patient')->where('id', $patient_id)->select('zipcode', 'house_number')->get();
        $zipcode = $main_patient[0]->zipcode;
        $house_number = $main_patient[0]->house_number;

        //Finds all patients living on that adress
        $patient_group = DB::table('patient')->where([['zipcode', $zipcode], ['house_number', $house_number]])->get();

        //Change the duration to create single appointments
        $inputForm['duration'] /= count($patient_group);

        //Iterates through all patients living on that adress, creates single appointments
        foreach ($patient_group as $patient) {
            //Array passed back to view to show which patients are added to the group appointment
            $allPatientsArray[] = array('id' => $patient->id, 'first_name' => $patient->first_name, 'last_name' => $patient->last_name);

            //Select correct patient id for every single appointment
            $inputForm['patientSelect'] = $patient->id;
            
            //Create a single appointment for each patient
            $appointmentID = $this->createAppointment($inputForm);

            //Create entry in connection table (patient_group_appointment_connect)
            $connect = new PatientGroupAppointmentConnectModel();
            $connect->appointment_id = $appointmentID;
            $connect->group_id = $groupAppointment->id;
            $connect->save();
        }

        return view('PatientGroupAppointmentView')->with(['allPatientsArray'=>$allPatientsArray]);
    }

}

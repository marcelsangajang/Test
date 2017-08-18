<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class PatientGroupAppointmentModel extends Model
{
    protected $table = 'patient_group_appointment';

    //public function patients() {        
    //    return $this->hasMany(PatientGroupAppointmentModel::class, 'group_id');    
    //}
}

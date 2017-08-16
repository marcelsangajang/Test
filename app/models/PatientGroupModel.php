<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PatientGroupModel extends Model
{
    protected $table = 'patient_group';

    public function patients() {        
        return $this->hasMany(PatientGroupAppointmentModel::class, 'group_id');    
    }
}

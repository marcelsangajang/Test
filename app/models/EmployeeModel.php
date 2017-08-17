<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Validator;
use App\models\EmployeePeriodModel;

class EmployeeModel extends Model
{
    protected $table = 'employee';
    
    public function periods() {       
        return $this->hasMany(EmployeePeriodModel::class, 'employee_id');      
    }
    
   // public function appointments() {      
     //   return $this->hasMany(PatientAppointmentsModel::class, 'agenda_id');       
    //}
    
    public static $rules = array(
        'description_intern' => 'required|min:2'
    );

    public static function validate($data) {   
        return Validator::make($data, static::$rules);   
    }
}

?>
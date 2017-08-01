<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
//use Illuminate\Support\Facades\Validator;

class ScheduleModel extends Model
{
    protected $table = 'schedule';
    
    public function periods() {       
        return $this->hasMany(ChairPeriodModel::class, 'schedule_id');      
    }
    
   // public static $rules = array(
    //    'description' => 'required|min:2'
    //);

    //public static function validate($data) {   
    //    return Validator::make($data, static::$rules);   
   // }
}

?>
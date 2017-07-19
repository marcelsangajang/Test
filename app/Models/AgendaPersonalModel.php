<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Validator;


class AgendaPersonalModel extends Model
{
    protected $table = 'agenda_personal';
    
    public function periods() {
        
        return $this->hasMany(AgendaPersonalPeriodModel::class, 'agenda_id');
        
    }
    


    public static $rules = array(
        'description_intern' => 'required|min:2'
    );

    public static function validate($data) {
    
    return Validator::make($data, static::$rules);
    
    }
}



?>
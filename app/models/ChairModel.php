<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Validator;

class ChairModel extends Model
{
    protected $table = 'chair';
    
    public function periods() {       
        return $this->hasMany(ChairPeriodModel::class, 'chair_id');      
    }
    
    public static $rules = array(
        'description' => 'required|min:2'
    );

    public static function validate($data) {   
        return Validator::make($data, static::$rules);   
    }
}

?>
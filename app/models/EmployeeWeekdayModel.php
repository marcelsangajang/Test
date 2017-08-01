<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EmployeeWeekdayModel extends Model
{
    protected $table = 'employees_weekdays';
     
    public function breaks() {      
        return $this->hasMany(EmployeeBreakModel::class, 'weekday_id');     
    }    
}

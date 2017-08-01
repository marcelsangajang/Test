<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EmployeePeriodModel extends Model
{
    protected $table = 'employees_periods';
      
    public function weekdays() {        
        return $this->hasMany(EmployeeWeekdayModel::class, 'period_id');    
    }
}

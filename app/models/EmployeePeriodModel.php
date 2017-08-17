<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\models\EmployeeWeekdayModel;

class EmployeePeriodModel extends Model
{
    protected $table = 'employee_period';
      
    public function weekdays() {        
        return $this->hasMany(EmployeeWeekdayModel::class, 'period_id');    
    }
}

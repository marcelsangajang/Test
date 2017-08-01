<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SchedulePeriodModel extends Model
{
    protected $table = 'schedule_period';
      
    public function weekdays() {        
        return $this->hasMany(ChairWeekdayModel::class, 'period_id');    
    }
}

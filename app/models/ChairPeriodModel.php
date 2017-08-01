<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ChairPeriodModel extends Model
{
    protected $table = 'chairs_periods';
      
    public function weekdays() {        
        return $this->hasMany(ChairWeekdayModel::class, 'period_id');    
    }
}

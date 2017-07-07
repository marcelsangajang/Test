<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class AgendaPersonalPeriod extends Model
{
    protected $table = 'agenda_personal_period';
    
    
        public function weekdays() {
        
        return $this->hasMany(AgendaPersonalPeriodWeekdays::class, 'agenda_personal_period_id');
        
    }
    
    
    
}

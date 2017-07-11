<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AgendaPersonalPeriodModel extends Model
{
    protected $table = 'agenda_personal_period';
    
    
        public function weekdays() {
        
        return $this->hasMany(AgendaPersonalPeriodWeekdays::class, 'agenda_id');
        
    }
    
    
    
}

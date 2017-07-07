<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class AgendaPersonalPeriodWeekdays extends Model
{
    protected $table = 'agenda_personal_weekdays';
    
    
    public function breaks() {
        
        return $this->hasMany(AgendaPersonalPeriodBreak::class, 'weekday_id');
        
    }    
    
}

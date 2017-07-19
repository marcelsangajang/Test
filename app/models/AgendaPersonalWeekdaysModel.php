<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AgendaPersonalWeekdaysModel extends Model
{
    protected $table = 'agenda_personal_weekdays';
    
    
    public function breaks() {
        
        return $this->hasMany(AgendaPersonalBreakModel::class, 'weekday_id');
        
    }    
    
}

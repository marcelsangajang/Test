<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\models\ChairWeekdayModel;

class ChairPeriodModel extends Model
{
    protected $table = 'chair_period';
      
    public function weekdays() {        
        return $this->hasMany(ChairWeekdayModel::class, 'period_id');    
    }
}

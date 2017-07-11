<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

use App\Models\AgendaPersonal;
use App\Models\AgendaPersonalPeriod;
use App\Models\AgendaPersonalPeriodBreak;
use App\Models\AgendaPersonalPeriodWeekdays;



class AgendaPersonalWrapper {
   
    public $agenda;

    $this->agenda   = AgendaPersonal::find(1);
    
    
}

class Period {
    
    
    
    
}

class Weekdays {
    
    
    
    
}

class Breaks {
    
    
    
    
}



/*
class PersonalAgendaController extends Controller {
    
    public $agenda;
    public $period;
    public $weekdays;
    public $breaks;

    function __construct() {
        
        $this->agenda   = AgendaPersonal::find(1);
        $this->period   = AgendaPersonal::find(1)->period;
        $this->weekdays();
        $this->breaks();

    }
    
    
   public function weekdays() {
        
        foreach($this->period as $period) {
            
            $this->weekdays[] = AgendaPersonalPeriod::find($period->id)->weekdays;

        }
    }
    
    public function breaks() {
    
        foreach($this->weekdays as $weekday) {
            
           $this->breaks[] = AgendaPersonalPeriodWeekdays::find($weekday->collection->id)->breaks;

        }
    }   
    
    
    public function test() {    
    
    echo 'test';
        
        echo 'AGENDA';
        echo '<pre>';
        echo $this->agenda->description_intern;
        echo '</pre>';
        
        echo 'PERIOD';
        echo '<pre>';
        var_dump($this->period);
        echo '</pre>';

        echo 'WEEKDAYS';
        echo '<pre>';
        var_dump($this->weekdays);
        echo '</pre>';

        echo 'BREAKS';
        echo '<pre>';
        var_dump($this->breaks);
        echo '</pre>';        
        
        
    }


}

*/


?>
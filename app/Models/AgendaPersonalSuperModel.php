<?php

/*
 * 
 * 
 * 
 */

namespace App\Models;

use DB;
use AgendaPersonal;
use AgendaPersonalPeriodModel;
use AgendaPersonalBreakModel;
use AgendaPersonalWeekdaysModel;

class PeriodWeekdaysBreaks {
    
    public $periodID;
    public $agendaInterval;
    protected $weekdaysObjArray;
    protected $breaksObjArray;
    public $weekdaysBreaksObjArray;
    
    public function __construct($inputPeriodID) {
        
        $this->periodID = $inputPeriodID;
        $this->get_weekdays();
        $this->add_breaks_to_weekdays_OBJ_ARRAY();
    }
    
    public function get_weekdays() {
        
        $this->weekdaysObjArray = DB::table('agenda_personal_period')
                                    ->join('agenda_personal_weekdays', 'agenda_personal_period.id', '=', 'agenda_personal_weekdays.period_id')
                                    ->where('agenda_personal_period.id', '=',  $this->periodID)
                                    ->get();        
    }

    public function add_breaks_to_weekdays_OBJ_ARRAY() {
        
        foreach ($this->weekdaysObjArray as $weekdayObj) {
        
            $weekdayID = $weekdayObj->id;
            $periodName = $weekdayObj->description;
        
            $break = DB::table('agenda_personal_weekdays')
                        ->join('agenda_personal_breaks', 'agenda_personal_weekdays.id', '=', 'agenda_personal_breaks.weekday_id')
                        ->select('agenda_personal_breaks.weekday_id', 'agenda_personal_breaks.begin_time', 'agenda_personal_breaks.end_time')
                        ->where('agenda_personal_weekdays.id', '=', $weekdayID)
                        ->get();
            
                    
            $this->weekdaysBreaksObjArray[$periodName][] = array('weekDay' => $weekdayObj, 'breaks' =>  $break);
            
        }
        
    }

}

class AgendaPersonalSuperModel extends PeriodWeekdaysBreaks {
    
    public $agendaID;
    public $agendaDescriptionIntern = 'Test Agenda';
    public $agendaDescriptionExtern = 'Test Agenda';
    public $PeriodObjArray;
    public $periodWeekdaysBreaksObjArray;
    
    public function __construct($inputAgendaID) {
        
        $this->agendaID = $inputAgendaID;
        $this->get_periods();
        $this->get_period_weekdays_breaks_Obj();
    }
    
    public function get_periods() {
        
        $this->PeriodObjArray = DB::table('agenda_personal')
                    ->join('agenda_personal_period', 'agenda_personal.id', '=', 'agenda_personal_period.agenda_id')
                    ->select('agenda_personal_period.id')
                    ->where('agenda_personal.id', '=',  $this->agendaID)
                    ->get();
    }   
    
    public function get_period_weekdays_breaks_Obj() {
        
        foreach ($this->PeriodObjArray as $periodObj) {
            
            $periodID = $periodObj->id;
           
            $periodWeekdaysBreaksObj = new PeriodWeekdaysBreaks($periodID);
            $this->periodWeekdaysBreaksObjArray[] = $periodWeekdaysBreaksObj->weekdaysBreaksObjArray;
            
        }
        
    }
     
}




?>
<?php

/*
 * 
 * 
 * 
 */

namespace App\Models;

use DB;
use AgendaPersonal;


class AgendaPersonalSuperModel {
    
    public $agendaId;
    public $fullAgendaObj;
    
    function __construct($agendaIdInput) {
        
        $this->agendaId = $agendaIdInput;
        $this->get_full_agenda_obj();
        
    }
    
    public function get_full_agenda_obj() {
    
        if ($this->agendaId) {
            
        $this->fullAgendaObj = AgendaPersonalModel::with(array('periods', 'periods.weekdays.breaks'))->where('id', $this->agendaId)->first();
        
        } 
            
    }
        
         
    
    
    public function get_work_day($dateInput) {
    
        if ($this->fullAgendaObj) {
            //continue
        } else {
            return false;
        }
        
        
        foreach ($this->fullAgendaObj['periods'] as $agendaPeriod) {
            
            $date               = new \DateTime($dateInput);
            $startDate          = new \DateTime($agendaPeriod['original']['start_date']);
            $endDate            = new \DateTime($agendaPeriod['original']['end_date']);
            $weekdayBreaksArray = $this->combine_weekday_breaks__array($agendaPeriod['weekdays']);
            $weekDaysArray      = $this->make_weekday_array($agendaPeriod['weekdays']);
            $breaksArray        = array();
            $agendaInterval     = $agendaPeriod['original']['interval'];
                        
            if ($date > $startDate && $date < $endDate ) {
                
                // Continue             
                
            } else {
                
                return false;
            }
            
            $dateDayFormat = formatS($date);
            
            if (in_array($dateDayFormat, $weekDaysArray)) {
                
                $workday = $weekdayBreaksArray[$dateDayFormat];
                $timeBlocks = $this->make_workday_time_blocks_array($workday, $agendaInterval);
                var_dumpS($timeBlocks);
                
            } else {
                
                return false;
            }          
        }
    }

        
    //Make "final" workday array. Inclusive: breaks 
    //Not added yet: Appointments, blocked time blocks
    
    private function make_workday_time_blocks_array($workDayArray, $interval) {
        
        $startTime      = new \DateTime($workDayArray['start_time']);
        $endTime        = new \DateTime($workDayArray['end_time']);
        $breaksArray    = $this->make_break_time_blocks_array($workDayArray['breaks'], $interval);
        $interval       = new \DateInterval('PT' . $interval . 'M');
              
        $startWhile = clone $startTime;
        
        while ($startWhile <= $endTime) {
            
            if (in_array($startWhile->format('H:i'), $breaksArray)) {
                
                $timeBlocksArray[] = array('status' => 'break', 'time' => $startWhile->format('H:i'));
                $startWhile->add($interval);
            
            } else {
                
                $timeBlocksArray[] =  array('status' => 'open', 'time' => $startWhile->format('H:i'));
                $startWhile->add($interval);
                
            }
        }
        
        return $timeBlocksArray;
        
    }    
    
    private function make_break_time_blocks_array($breaksArray, $interval) {
        
       $interval       = new \DateInterval('PT' . $interval . 'M');
        
        foreach ($breaksArray as $break) {

            $breakStartTime = new \DateTime($break['start_time']);
            $breakEndTime   = new \DateTime($break['end_time']);
            $breakEndTime   = $breakEndTime->sub($interval);
            
            $breakStartWhile = clone $breakStartTime;
        
            while ($breakStartWhile <= $breakEndTime) {

            $breakTimeBlocksArray[] = $breakStartWhile->format('H:i');
            $breakStartWhile->add($interval);
		
            }
        }
        return $breakTimeBlocksArray;
        
    }     
    
    private function make_weekday_array($weekdaysObjArray) {
        
        foreach ($weekdaysObjArray as $weekdayObj) {
            
            $weekdaysArray[] = $weekdayObj->day;
            
        }
        
        return $weekdaysArray;
        
    }
    
    private function combine_weekday_breaks__array($weekdaysObjArray) {
        
        foreach ($weekdaysObjArray as $weekdayObj) {
            
            $breaks = $this->make_breaks_array($weekdayObj['breaks']);
            $weekdayBreaksArray[$weekdayObj->day] = array('start_time' => $weekdayObj->start_time, 'end_time' => $weekdayObj->end_time, 'breaks' => $breaks);
            
        }
        
        return $weekdayBreaksArray;
        
    }
    
    private function make_breaks_array($breaksObjArray) {
        
        $breaksArray = array();
        
        foreach ($breaksObjArray as $breakObj) {
            
            $breaksArray[] = array('start_time' => $breakObj->start_time, 'end_time' => $breakObj->end_time);
            
        }
        
        return $breaksArray;
        
    }
    
       

}



?>
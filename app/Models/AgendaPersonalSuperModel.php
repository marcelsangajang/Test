<?php

/*
 * 
 * 
 * 
 */

namespace App\Models;

use DB;
use AgendaPersonal;
use PatientAppointmentsModel;
use Illuminate\Support\Collection;


class AgendaPersonalSuperModel {
   
    private $agendaId;
    private $periodInterval;
    private $date;
    private $daySchedule;
    private $breaks;
    private $appointments;
    
    public $inPeriod = false;
    public $workdaySchedule;
    public $periodDescription;
    
    function __construct($agendaId, $date) {
        
        $this->agendaId = $agendaId;
        $this->date    = $date;  
        
        $this->workday_by_date();
        $this->get_appointments(); 
        
    }
    
    private function workday_by_date() {
        
        $date = new \DateTime($this->date);
        
        //Check if date is in one of the periods and if so, get workday schedule data
        $periodsObjArray = AgendaPersonalModel::with(array('periods', 'periods.weekdays.breaks', 'appointments'))->where('id', $this->agendaId)->get();
        $periods = $periodsObjArray[0]->periods;
        
        
        foreach ($periods as $period) {
           
            $periodStart = new \DateTime($period['start_date']);
            $periodEnd   = new \DateTime($period['end_date']);
            
            if ($date >= $periodStart && $date <= $periodEnd) {
                
                $this->periodStart       = $periodStart;
                $this->periodEnd         = $periodEnd;
                $this->periodInterval    = $period->interval;
                $this->periodDescription = $period->description;
                $this->daySchedule       = $period['weekdays']->where('day', formatS($date))->first();
                $dayBreaks               = $this->daySchedule['breaks'];
                
                //Make and declare 1 dimensional array containing all breaks
                $this->breaks            = $this->make_break_array($dayBreaks);
                $this->inPeriod          = true;                
                
            }
        }
        
        $this->workdaySchedule = $this->make_timeblocks();
    }  
    
    
    private function make_break_array($dayBreaks) {
        
        foreach ($dayBreaks as $break) {
            
            $breakArray[] = array('start' => $break['start_time'], 'end' => $break['end_time']);
            
        } 
        return $breakArray;
    }
    
    
    //Make workday time array
    //This function can only be called after the 'workday_by_date' function
    private function make_timeblocks() {
        
        $startTime      = new \DateTime($this->daySchedule['start_time']);
        $endTime        = new \DateTime($this->daySchedule['end_time']);
        $interval       = new \DateInterval('PT' . $this->periodInterval . 'M');
        $breaksArray    = $this->breaks;
                
        $startWhile = clone $startTime;
        
        while ($startWhile <= $endTime) {
            
            if ($this->between_time($startWhile->format('H:i:s'), $breaksArray, 'start', 'end')) {
                
                $timeBlocksArray[] = array('status' => 'break', 'time' => $startWhile->format('H:i'));
                $startWhile->add($interval);
          
            } else {

                $timeBlocksArray[] =  array('status' => 'open', 'time' => $startWhile->format('H:i'));
                $startWhile->add($interval);
                
            }
        }
        
        return $timeBlocksArray;
        
    }   
    
    private function between_time($timeNeedle, $timeHaystackArray, $indexStart, $indexEnd) {
        
        foreach ($timeHaystackArray as $startEnd) {
            
            if ($timeNeedle > $startEnd[$indexStart] && $timeNeedle < $startEnd[$indexEnd] OR $timeNeedle == $startEnd[$indexStart] OR $timeNeedle == $startEnd[$indexEnd]) {
                
                return True;
                
            } else {
                
                return False;
                
            }
        }
    }
    
    //Get all of the appointmensts for given 'agendaId' and 'date'
    private function get_appointments() {
        
        $appointments = DB::table('patient_appointments')
                            ->select()
                            ->where('agenda_id', $this->agendaId)
                            ->where('date', $this->date)
                            ->get();
        

        //$appointments = $appointments['appointments'];     
        var_dumpS($appointments);
    }
    
    //Calculate percentages - UNDER CONSTRUCTION
    public function free_time_statistic() {
        
        $timeBlocks = $this->workdaySchedule;
        $timeBlocksTotal = count($timeBlocks);
        
        $timeBlocksColl = new Collection($timeBlocks);
        var_dumpS($timeBlocksColl);
        
    }
    
    
}



?>
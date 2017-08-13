<?php

/*
 *@Toine
 *
 *Class for generating agenda time blocks for the given date and employee_id
 */

namespace App\Models;

use DB;
use App\Models\ChairModel;
use Illuminate\Support\Collection;


class ChairTimeBlocksModel {

    private $agendaId;
    private $periodInterval;
    private $date;
    private $daySchedule;
    private $breaks;
    private $appointments;

    public $inPeriod = false;
    public $workdaySchedule;

    function __construct($agendaId, $date) {

        $this->agendaId = $agendaId;
        $this->date     = $date;
        $this->workday_by_date();
    }

    private function workday_by_date() {

        $date = new \DateTime($this->date);

        //Check if date is in one of the periods and if so, get workday schedule data
        //NOTE: if the date is found in multiple periods the last one will overwrite pervious
        $periodsObjArray = ChairModel::with(array('periods.weekdays'))->where('id', $this->agendaId)->get();
        $periods = $periodsObjArray[0]->periods;

        if ($periods->isNotEmpty()) {

          foreach ($periods as $period) {

              $periodStart = new \DateTime($period['start_date']);
              $periodEnd   = new \DateTime($period['end_date']);

              if ($date >= $periodStart && $date <= $periodEnd) {

                  $this->periodStart       = $periodStart;
                  $this->periodEnd         = $periodEnd;
                  $this->periodInterval    = $period->interval;
                  $this->periodDescription = $period->description;
                  $this->daySchedule       = $period['weekdays']->where('day', formatS($date))->first();

                  //set inperiod boolean
                  $this->inPeriod          = true;

              }
          }

            $this->workdaySchedule = $this->make_timeblocks();
      }
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

          switch($startWhile->format('H:i:s')) {

/*            case $this->between_time($startWhile->format('H:i:s'), $breaksArray, 'start', 'end') :
              $timeBlocksArray[] = array('status' => 'break', 'time' => $startWhile->format('H:i'));
              $startWhile->add($interval);
              break;
*/
            default :
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

    }




}



?>

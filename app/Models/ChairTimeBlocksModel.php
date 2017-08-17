<?php

/*
 *@Toine
 *
 *
 */

namespace App\Models;

use DB;
use App\Models\ChairModel;
use Illuminate\Support\Collection;


class ChairTimeBlocksModel {

    private $chairID;
    private $periodInterval;
    private $date;
    private $daySchedule;
    private $dayScheduleArray = array();

    public $inEmplPeriod  = false;
    public $inChairPeriod = false;
    public $workdaySchedule;

    //Constructer will assign variables and will call functions to return the time blocks array
    function __construct($chairID, $date) {

        $this->chairID = $chairID;
        $this->date    = $date;

        $this->get_chair_schedule();
        $this->get_chair_availability();
        $this->make_timeblocks();
    }

    private function get_chair_schedule() {

          $date = new \DateTime($this->date);
          $employeeSchedule = ScheduleModel::with(array('periods.weekdays'))->where('chair_id', $this->chairID)->get();

          foreach ($employeeSchedule as $schedule) {

            $employeeID = $schedule['employee_id'];

            foreach ($schedule['periods'] as $period) {

              $periodStart = new \DateTime($period['start_date']);
              $periodEnd   = new \DateTime($period['end_date']);

              if ($date >= $periodStart && $date <= $periodEnd) {

                  $day = $period['weekdays']->where('day', formatS($date));
                  $dayScheduleColl[] = array('employeeID' => $employeeID, 'dayArray' => $day);

                  $this->inChairPeriod = true;
              }

            }

          }

          if (isset($dayScheduleColl)) {

            $this->make_day_schedule_array($dayScheduleColl);

          }
    }

    private function make_day_schedule_array($daySchedule) {

      foreach ($daySchedule as $schedule) {

        $employeeID = $schedule['employeeID'];

        foreach ($schedule['dayArray'] as $dayArray) {

          $dayName = $dayArray['day'];
          $this->dayScheduleArray[] = array('employeeID' => $employeeID,'day_name' => $dayName, 'start' => $dayArray['start_time'], 'end' => $dayArray['end_time']);

        }
      }
  }

    private function get_chair_availability() {

        $date = new \DateTime($this->date);

        $periodsObjArray = ChairModel::with(array('periods.weekdays'))->where('id', $this->chairID)->get();
        $periods = $periodsObjArray[0]->periods;

        if ($periods->isNotEmpty()) {

          foreach ($periods as $period) {

              $periodStart = new \DateTime($period['start_date']);
              $periodEnd   = new \DateTime($period['end_date']);

              if ($date >= $periodStart && $date <= $periodEnd) {

                  $this->periodStart       = $periodStart;
                  $this->periodEnd         = $periodEnd;
                  $this->periodInterval    = $period->interval;
                  $this->intervalLines     = $period->interval_lines;
                  $this->periodDescription = $period->description;
                  $this->daySchedule       = $period['weekdays']->where('day', formatS($date))->first();

                  //set inperiod boolean    --NOG EVEN OVER NADENKEN AANGEZIEN LAATSTE PERIODE OVERSCHRIJFT
                  $this->inEmplPeriod      = true;

              }
          }
        }
      }

      //Make workday time array
      //Inclusive: breaks, chair (if scheduled)
      private function make_timeblocks() {

          $startTime          = new \DateTime($this->daySchedule['start_time']);
          $endTime            = new \DateTime($this->daySchedule['end_time']);
          $chairScheduleArray = $this->dayScheduleArray;
          $intervalLines      = $this->calc_interval($this->periodInterval, $this->intervalLines);
          $arrayCount         = count($intervalLines);


          $startWhile = clone $startTime;
          $countLoop  = 0;

          while ($startWhile <= $endTime) {

            $interval = new \DateInterval('PT' .  $intervalLines[$countLoop] . 'M');

            switch($startWhile->format('H:i:s')) {

              case !empty($employeeID = $this->inside_schedule_time($startWhile->format('H:i:s'), $chairScheduleArray)) :

                  $chairDescription = DB::select('SELECT `description_intern` FROM `employee` WHERE `id` = "' . $employeeID .'"');
                  $chairDescription = $chairDescription[0]->description_intern;

                  $timeBlocksArray[] = array('status' => 'Ingeroosterd: ' . $chairDescription, 'time' => $startWhile->format('H:i'));
                  $startWhile->add($interval);
                  break;

              case $startWhile->format('H:i:s') == $endTime->format('H:i:s') :

                  $timeBlocksArray[] = array('status' => 'Einde werktijd', 'time' => $startWhile->format('H:i'));
                  $startWhile->add($interval);
                  break;

              default :
                $timeBlocksArray[] = array('status' => 'open', 'time' => $startWhile->format('H:i'));
                $startWhile->add($interval);

            }

              if ($countLoop == $arrayCount - 1) {
                $countLoop = 0;
              } else {
                $countLoop++;
              }
        }

          $this->workdaySchedule = $timeBlocksArray;

      }

      //Function to check if time inside a chair schedule period
      //This fuction belongs too 'make_timeblocks()'
      private function inside_schedule_time($timeNeedle, $timeHaystackArray) {

        foreach ($timeHaystackArray as $timeHaystack) {

          if ($timeNeedle >= $timeHaystack['start'] && $timeNeedle < $timeHaystack['end']) {

           return $timeHaystack['employeeID'];

          }
        }
      }

      private function calc_interval($interval, $multipleNumber) {

        if (!empty($multipleNumber)) {

          $divide      = floor(($interval / $multipleNumber));
          $divideCount = floor(($interval / $divide));
          $count       = $divide * $multipleNumber;
          $rest        = floor(($interval - $count));

          for ($i = 0 ; $i < $divideCount; $i++) {
            $intervalArray[] = $divide;
          }

          if ($rest > 0) {
            array_push($intervalArray, $rest);
          }

          return $intervalArray;

      } else {

        return array($interval);

      }
    }

}



?>

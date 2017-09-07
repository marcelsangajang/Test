<?php

/*
 *@Toine
 *
 *
 */

namespace App\Models;

use DB;
use App\Models\EmployeeModel;
use Illuminate\Support\Collection;


class EmployeeTimeBlocksModel {

    private $employeeId;
    private $periodInterval;
    private $date;
    private $daySchedule;
    private $breaksArray      = array();
    private $dayScheduleArray = array();

    public $workdaySchedule = array();

    //Constructer will assign necessary variables and will call functions to return the time blocks array
    function __construct($employeeId, $date) {

        $this->employeeId = $employeeId;
        $this->date       = $date;

        $this->get_employee_schedule();
        $this->get_employee_availability();

        if (isset($this->daySchedule)) {
        $this->make_timeblocks();
        }
    }

    //Check if given date is in one or multiple chair schedule for the given employee
    //if so get the data
    private function get_employee_schedule() {

          $date = new \DateTime($this->date);
          $employeeSchedule = ScheduleModel::with(array('periods.weekdays'))->where('employee_id', $this->employeeId)->get();

          foreach ($employeeSchedule as $schedule) {

            $chairID = $schedule['chair_id'];

            foreach ($schedule['periods'] as $period) {

              $periodStart = new \DateTime($period['start_date']);
              $periodEnd   = new \DateTime($period['end_date']);

              if ($date >= $periodStart && $date <= $periodEnd) {

                  $day = $period['weekdays']->where('day', formatS($date));
                  $dayScheduleColl[] = array('chairID' => $chairID, 'dayArray' => $day);

              }

            }

          }

          if (isset($dayScheduleColl)) {

            $this->make_day_schedule_array($dayScheduleColl);

          }
    }

    //if employee have chair schedule, make multidimensional array with the data of given Collection
    //this function belongs too 'get_employee_schedule()'
    private function make_day_schedule_array($daySchedule) {

      foreach ($daySchedule as $schedule) {

        $chairID = $schedule['chairID'];

        foreach ($schedule['dayArray'] as $dayArray) {

          $dayName = $dayArray['day'];
          $this->dayScheduleArray[] = array('chairID' => $chairID,'day_name' => $dayName, 'start' => $dayArray['start_time'], 'end' => $dayArray['end_time']);

        }
      }
    }

    //Check if date is in one of the periods and if so, get workday schedule data
    //NOTE: if the date is found in multiple periods the last period will overwrite previous
    private function get_employee_availability() {

        $date = new \DateTime($this->date);

        $periodsObjArray = EmployeeModel::with(array('periods.weekdays.breaks'))->where('id', $this->employeeId)->get();

        if ($periodsObjArray->isNotEmpty()) {

          $periods = $periodsObjArray[0]->periods;

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
                  $dayBreaks               = $this->daySchedule['breaks'];

                  //Make and assign 1 dimensional array containing all breaks
                  $this->breaksArray       = $this->make_break_array($dayBreaks);
              }
          }
        }
      }

    //Make simplex array with data from break collection
    //This function belongs to 'get_employee_availability()'
    private function make_break_array($dayBreaks) {

        foreach ($dayBreaks as $break) {

            $breakArray[] = array('start' => $break['start_time'], 'end' => $break['end_time']);

        }

        return $breakArray;
    }


    //Make workday time array
    //Inclusive: breaks, chair (if scheduled)
    private function make_timeblocks() {

        $startTime          = new \DateTime($this->daySchedule['start_time']);
        $endTime            = new \DateTime($this->daySchedule['end_time']);
        $interval           = new \DateInterval('PT' . $this->periodInterval . 'M');
        $breaksArray        = $this->breaksArray;
        $chairScheduleArray = $this->dayScheduleArray;
        $intervalLines      = $this->calc_interval($this->periodInterval, $this->intervalLines);
        $arrayCount         = count($intervalLines);

        $startWhile = clone $startTime;
        $countLoop  = 0;

        while ($startWhile <= $endTime) {

          $interval = new \DateInterval('PT' .  $intervalLines[$countLoop] . 'M');

          switch($startWhile->format('H:i:s')) {

            case $this->inside_break_time($startWhile->format('H:i:s'), $breaksArray) :
              $timeBlocksArray[] = array('status' => 'break', 'time' => $startWhile->format('H:i'));
              $startWhile->add($interval);
              break;

            case !empty($chairID = $this->inside_schedule_time($startWhile->format('H:i:s'), $chairScheduleArray)) :

                $chairDescription = DB::select('SELECT `description` FROM `chair` WHERE `id` = "' . $chairID .'"');
                $chairDescription = $chairDescription[0]->description;
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

    //Function to check if time inside a break period
    //This fuction belongs too 'make_timeblocks()'
    private function inside_break_time($timeNeedle, $timeHaystackArray) {

        foreach ($timeHaystackArray as $startEnd) {

            if ($timeNeedle >= $startEnd['start'] && $timeNeedle < $startEnd['end']) {

                return True;

            } else {

                return False;

            }
        }
    }

    //Function to check if time inside a chair schedule period
    //This fuction belongs too 'make_timeblocks()'
    private function inside_schedule_time($timeNeedle, $timeHaystackArray) {

      foreach ($timeHaystackArray as $timeHaystack) {

        if ($timeNeedle >= $timeHaystack['start'] && $timeNeedle < $timeHaystack['end']) {

         return $timeHaystack['chairID'];

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

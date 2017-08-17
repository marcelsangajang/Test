<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Request;
use App\models\EmployeeTimeBlocksModel;
use App\models\ChairTimeBlocksModel;
use App\Http\Controllers\Controller;

use App\Models\EmployeeModel;

use DB;
use Input;
use View;

class EmployeeTimeBlocksController {

    public function test() {


      echo '<form method="GET">
            <label>ChairID/EmployeeID</label>
            <input name="chair">
            <label>Date</label>
            <input name="date" type="date">
            <select name="option">
            <option name="chair">chair</option>
            <option name="employee">employee</option>
            </select>
            <input type="submit" value="submit"></form>';

    if (!empty($_GET) && $_GET['option'] == 'chair') {

          $timeBlocksObj = new ChairTimeBlocksModel($_GET['chair'], $_GET['date']);
          $test = $timeBlocksObj->workdaySchedule;
          var_dumpS($test);
    }


    if (!empty($_GET) && $_GET['option'] == 'employee') {

          $timeBlocksObj = new EmployeeTimeBlocksModel($_GET['chair'], $_GET['date']);
          $test = $timeBlocksObj->workdaySchedule;
          var_dumpS($test);
    }
  }
}

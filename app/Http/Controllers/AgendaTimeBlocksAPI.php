<?php

/*
*
*Author: Toine
*
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

class AgendaTimeBlocksAPI {

    public function api() {

    if (!empty($_GET) && $_GET['option'] == 'chair') {

          $timeBlocksObj = new ChairTimeBlocksModel($_GET['chair'], $_GET['date']);
          $test = $timeBlocksObj->timeBlocksColl;

          var_dumpS($test);

          echo json_encode($test, true);
    }


    if (!empty($_GET) && $_GET['option'] == 'employee') {

          $timeBlocksObj = new EmployeeTimeBlocksModel($_GET['chair'], $_GET['date']);
          $test = $timeBlocksObj->timeBlocksArray;
          
          echo json_encode($test, true);


    }
  }

  public function show() {

    return View::make('agendaAPI');

  }

}

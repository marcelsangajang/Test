<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Request;
use App\models\EmployeeTimeBlocksModel;
use App\Http\Controllers\Controller;

use App\Models\EmployeeModel;

use DB;
use Input;
use View;


class EmployeeTimeBlocksController {


    public function test() {

      $timeBlocksObj = new EmployeeTimeBlocksModel(1, '10-05-2017');
      $test = $timeBlocksObj->workdaySchedule;

      var_dumpS($test);


    }



}

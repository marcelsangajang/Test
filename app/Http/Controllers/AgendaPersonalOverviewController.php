<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Request;
use App\models\AgendaPersonalSuperModel;
use App\Http\Controllers\Controller;

use App\Models\EmployeeModel;

use DB;
use Input;
use View;


class AgendaPersonalOverviewController {
    
            
    public function test() {
        
        
       $allAgendas = EmployeeModel::with(array('periods', 'periods.weekdays.breaks'))->get();
   
            foreach ($allAgendas as $agenda) {
       
                $allAgendasArray[] = array('id' => $agenda['id'], 'description_intern' => $agenda['description_intern']);
       
            }
   
        
        return View::make('AgendaPersonalOverview', compact('allAgendasArray'));

    }
    
    public function OverviewPost() {
        
       //   if (Input::all()){   
            $inputForm = Input::all();
            
            $allAgendas = EmployeeModel::with(array('periods', 'periods.weekdays.breaks'))->get();
   
            foreach ($allAgendas as $agenda) {
       
                $allAgendasArray[] = array('id' => $agenda['id'], 'description_intern' => $agenda['description_intern']);
       
            }
   
        
            $agendaObj = new AgendaPersonalSuperModel($inputForm['agendaSelect'], $inputForm['date']);
            $workday = $agendaObj->workdaySchedule;
            
             return view('AgendaPersonalOverview')->with(['workday'=>$workday])->with(['allAgendasArray' => $allAgendasArray]);
            
      //  }
             
    }
    
    
    
}
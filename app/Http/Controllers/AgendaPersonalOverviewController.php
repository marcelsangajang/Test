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

use App\Models\AgendaPersonalModel;

use DB;
use Input;
use View;

class AgendaPersonalOverviewController {
    
            
    public function test() {
             
         $allAgendas = DB::table('agenda_personal')
                                ->get();
        
         $allAgendas = $allAgendas->toArray();
         
         $agenda = AgendaPersonalModel::find(1);
         
         $agendaPeriods = $agenda->periods;
         
         $agendaTest = AgendaPersonalModel::with(array('periods', 'periods.weekdays'))->where('id', 2)->first();
         
            echo '<pre>';
            var_dump($agendaTest['periods'][0]['weekdays'][0]['original']);
         // var_dump($agendaTest['periods'][0]->interval);
            echo '</pre>';
            
       // return View::make('AgendaPersonalOverview', compact('allAgendas'));

    }
    
    public function agenda_overview_output() {
        

    
        if (Input::all()){   
            $inputForm = Input::all();
        
            $agendaObj = new AgendaPersonalSuperModel($inputForm['agendaSelect']);
            
            echo '<pre>';
            var_dump($agendaObj);
        }
    }
    
    
    
}
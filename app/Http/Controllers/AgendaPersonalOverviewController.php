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

use DB;
use Input;
use View;

class AgendaPersonalOverviewController {
    
            
    public function test() {
             
         $allAgendas = DB::table('agenda_personal')
                                ->get();
        
         $allAgendas = $allAgendas->toArray();

        
        return View::make('AgendaPersonalOverview', compact('allAgendas'));
        
        // $full->periodWeekdaysBreaksObjArray[0]  AgendaPersonalOverview
    
        
    //    echo '<pre>'; $full = new AgendaPersonalSuperModel(1);
    //    var_dump($full->periodWeekdaysBreaksObjArray[0]);
    //    echo '</pre>'; $full = new AgendaPersonalSuperModel(1);
        
        
        
    }
    
    
    
}
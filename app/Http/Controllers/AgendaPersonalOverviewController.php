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
use Input;

class AgendaPersonalOverviewController {
    
            
    public function test() {
        
        $full = new AgendaPersonalSuperModel(1);
        
        $test = array('test1', 'test2');
     
        return view('AgendaPersonalOverview')->with(['data'=>$test]); 
        
        // $full->periodWeekdaysBreaksObjArray[0]
    
        
    //    echo '<pre>';
    //    var_dump($full->periodWeekdaysBreaksObjArray[0]);
    //    echo '</pre>'; 
        
        
        
    }
    
    
    
}
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

class FullAgenda {
    
            
    public function test() {
        
        $full = new AgendaPersonalSuperModel(1);
        
        echo '<pre>';
        var_dump($full->periodWeekdaysBreaksObjArray[0]);
        echo '</pre>'; 
        
        
        
    }
    
    
    
}
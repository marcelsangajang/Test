<?php

namespace App\Http\Controllers;

use App\Models\AgendaPersonal;
use App\Http\Controllers\Controller;
use Input;



class CreatePersonalAgendaController extends Controller {
    
    public function funcformview() {
        
        return view('CreatePersonalAgenda');        
    }
    
     public function funcpost() {

        $agendaPersonal = new AgendaPersonal();
         
        $decriptionIntern = Input::get('description_intern');
        $decriptionExtern = Input::get('description_extern');
        $type = Input::get('type');
       
        
        $agendaPersonal->description_intern = $decriptionIntern;
        $agendaPersonal->description_extern = $decriptionExtern;
        $agendaPersonal->type = $type;
        $agendaPersonal->save();
        
        echo 'Gelukt';
    
    }
 
    
}

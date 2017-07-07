<?php

namespace App\Http\Controllers;

use App\Models\AgendaPersonal;
use App\Http\Controllers\Controller;
use Input;
use Illuminate\Support\Facades\Validator;


class CreatePersonalAgendaController extends Controller {
    
    public function funcformview() {
        
        return view('CreatePersonalAgenda');        
    }
    
    /*
    
    public function validate_user_input() {
        
        $validator = Validator::make(
            [
            'description_intern' => Input::get('description_intern'),
            'type' => Input::get('type')
            ],
            [
            'description_intern' => ['required', 'min:5'],
            'type' => ['required', 'min:5', 'integer']
            ]
         );
        
        $failed = $validator->failed();
        
        print_r($failed);
        
         
        if ($validator->fails()) {
            
            echo 'This is not good :(';

        }  
    }
    
    */
    
     public function funcpost() {
         
        $this->validate_user_input();
                  
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

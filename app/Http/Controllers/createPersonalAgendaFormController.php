<?php

namespace App\Http\Controllers;

use App\models\AgendaPersonal;

use App\Http\Controllers\Controller;
use Input;
use Illuminate\Support\Facades\Request;



class CreatePersonalAgendaFormController extends Controller {
    
    public function funcformview() {
        
        return view('CreatePersonalAgenda');        
    }
      

    public function funcpost() {
        
        $inputForm = Input::all();
        $dataVal = AgendaPersonal::validate($inputForm);
        
        if ($dataVal->fails()) {
            
            return redirect()->route('createpersonalagenda')->with([$inputForm])->withErrors($dataVal);
            
        }
         
        $agendaPersonal = new AgendaPersonal();
    
        $decriptionIntern = Input::get('description_intern');
        $decriptionExtern = Input::get('description_extern');
        $type = Input::get('type');
          
        $agendaPersonal->description_intern = $decriptionIntern;
        $agendaPersonal->description_extern = $decriptionExtern;
        $agendaPersonal->type = $type;
        $agendaPersonal->save();
        
        echo 'Gelukt';
        
        echo '<pre>';
        var_dump(Request::all());
        echo '</pre>';
        
      
    }


    
}

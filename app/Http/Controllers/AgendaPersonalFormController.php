<?php

namespace App\Http\Controllers;

use App\models\agendaPersonalModel;

use App\Http\Controllers\Controller;
use Input;
use Illuminate\Support\Facades\Request;



class AgendaPersonalFormController extends Controller {
    
    public function funcformview() {
        
        return view('agendaPersonalForm');        
    }
      

    public function funcpost() {
        
        $inputForm = Input::all();
        $dataVal = agendaPersonalModel::validate($inputForm);
        
        if ($dataVal->fails()) {
            
            return redirect()->route('agendaPersonalForm')->with([$inputForm])->withErrors($dataVal);
            
        }
         
        $agendaPersonal = new AgendaPersonalModel();
    
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
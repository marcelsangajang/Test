<?php

namespace App\Http\Controllers;

use App\models\ChairModel;
use Illuminate\Http\Request;
use Input;

class ChairController extends Controller
{
    public function view() {       
        return view('ChairView');        
    }
      
    public function post() {   
        $inputForm = Input::all();
        $dataVal = ChairModel::validate($inputForm);
        
        if ($dataVal->fails()) {        
            return redirect()->route('ChairView')->with([$inputForm])->withErrors($dataVal);    
        }
         
        $chair = new ChairModel();
        $chair->description = Input::get('description');
                  
        $chair->save();      
        return view('welcome');
    }
}

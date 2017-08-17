<?php
//Author: Marcel Sang-Ajang
//This file controls the chair section of the program. It controls the db section responsible for chair availability
namespace App\Http\Controllers;

use App\models\ChairModel;
use App\models\ChairPeriodModel;
use App\models\ChairWeekdayModel;
use Illuminate\Http\Request;
use Input;

class ChairController extends Controller
{
    //Load all variables used in view, then return view
    public function view() {
        $allChairs = ChairModel::get()->toArray();
  
        //Create array of all chairs in db, then pass to form
        foreach ($allChairs as $Chair) {
            $allChairsArray[] = array('id' => $Chair['id'], 'description' => $Chair['description']);
        }
        
        return view('ChairView', compact('allChairsArray'));       
    }
     
    //Creates chair and stores in db 
    public function createChair() {   
        $input = Input::all();

        //Data validation
        $dataVal = ChairModel::validate($input);
        
        if ($dataVal->fails()) {        
            return redirect()->route('ChairView')->with([$input])->withErrors($dataVal);    
        }
         
        $chair = new ChairModel();
        $chair->description = $input['description'];     
        $chair->save();     

        return view('welcome');
    }

    //Creates chair periods (and weekdays), link to chair id, and store in db
    public function createPeriod() {
        //Create period model and store in db
        $input = Input::all();
        $chairPeriod = new ChairPeriodModel();
        $chairPeriod->chair_id = $input['ChairSelect']; //Link to chair id
        $chairPeriod->description = $input['description'];
        $chairPeriod->start_date = $input['start_date'];
        $chairPeriod->end_date = $input['end_date'];
        $chairPeriod->save();
        
        //Hardcoded list of weekday abbreviations used in html form
        $myList = ['mon', 'tue', 'wed', 'thu', 'fri', 'sat', 'sun'];
     
        //Create 7 weekdays per period
        for ($x = 0; $x < 7; $x++) {
            //Create chair weekdays and store in db
            $chairWeekday = new ChairWeekdayModel();
            $chairWeekday->period_id = $chairPeriod->id;
            $chairWeekday->start_time = $input['start_time_'.$myList[$x]];
            $chairWeekday->end_time = $input['end_time_'.$myList[$x]];
            $chairWeekday->day = $myList[$x];
            $chairWeekday->save();

        } 
        return view('welcome');
    }
}

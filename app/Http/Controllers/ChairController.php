<?php
//Author: Marcel Sang-Ajang
//This file controls the chair section of the program. It controls the db section responsible for chair availability
namespace App\Http\Controllers;

use App\models\ChairModel;
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

    //Creates chair periods (and weekdays), link to chair id, and store in db
    public function createPeriod() {
        //Create period model and store in db
        $inputForm = Input::all();
        $chair_period = new ChairPeriodModel();
        $chair_period->chair_id = $inputForm['ChairSelect']; //Link to chair id
        $chair_period->description = Input::get('description');
        $chair_period->start_date = Input::get('start_date');
        $chair_period->end_date = Input::get('end_date');
        $chair_period->save();

        $period_id = $chair_period->id;
        
        $myList = ['mon', 'tue', 'wed', 'thu', 'fri', 'sat', 'sun'];
     
        //Create 7 weekdays per period
        for ($x = 0; $x < 7; $x++) {
            //Create weekday
            $agendaPersonalPeriodWeekdays = new ChairWeekdayModel();
            $start_time = Input::get('start_time_'.$myList[$x]);
            $end_time = Input::get('end_time_'.$myList[$x]);
            $day = $myList[$x];
            
            //Update weekday table in DB
            $agendaPersonalPeriodWeekdays->period_id =$period_id;
            $agendaPersonalPeriodWeekdays->start_time = $start_time;
            $agendaPersonalPeriodWeekdays->end_time = $end_time;
            $agendaPersonalPeriodWeekdays->day = $day;
            $agendaPersonalPeriodWeekdays->save();

        } 
        return view('welcome');
    }
}

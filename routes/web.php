<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

// Create personal agenda FORM
Route::get('AgendaPersonalFormView', ['as' => 'AgendaPersonalFormView', 'uses' => 'AgendaPersonalFormController@funcformview']);

//POST personal agenda 
Route::post('post', 'AgendaPersonalFormController@funcpost');



// Create period and workdays
Route::get('AgendaPersonalPeriodFormView', ['as' => 'AgendaPersonalPeriodFormView', 'uses' => 'AgendaPersonalPeriodFormController@period']);

//POST period (from personal agenda)
Route::post('postPeriod', 'AgendaPersonalPeriodFormController@funcpostPeriod');

//Agenda overview
Route::get('AgendaPersonalOverview', ['as' => 'AgendaPersonalOverview', 'uses' => 'AgendaPersonalOverviewController@test']);

//POST Agenda overview
Route::post('agendaOverviewpost', ['as' => 'AgendaPersonalPeriodFormView', 'uses' => 'AgendaPersonalOverviewController@OverviewPost']);


//Route::get('/public/test', 'TestController@doTheTest');
Route::get('/test', 'TestController@doTheTest');

//Route::get('/public/test', function() {
//	return view('test');
//});

/*Route::get('/test', function() {
	
	$temp = DB::table('personal_agenda')->latest()->get();//find($id);

	return view('test', compact('temp'));
});

Route::get('/{about}', function($id) {

	$temp = DB::table('personal_agenda')->find($id);
	
	return view('test', compact('temp'));

	
});*/
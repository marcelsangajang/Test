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
Route::get('createpersonalagenda', ['as' => 'createpersonalagenda', 'uses' => 'createPersonalAgendaFormController@funcformview']);
//POST personal agenda 
Route::post('post', 'createPersonalAgendaFormController@funcpost');


// Create period and workdays
Route::get('period', ['as' => 'createpersonalagenda', 'uses' => 'periodController@period']);

//POST period (from personal agenda)
Route::post('postPeriod', 'periodController@funcpostPeriod');


Route::get('fullagenda', ['as' => 'fullagenda', 'uses' => 'PersonalAgendaController@test']);


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
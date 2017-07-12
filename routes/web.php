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


// Create period
Route::get('AgendaPersonalPeriodFormView', ['as' => 'AgendaPersonalPeriodFormView', 'uses' => 'AgendaPersonalPeriodFormController@period']);

//POST period (from personal agenda)
Route::post('postPeriod', 'AgendaPersonalPeriodFormController@funcpostPeriod');

Route::get('fullagenda', ['as' => 'fullagenda', 'uses' => 'PersonalAgendaController@test']);


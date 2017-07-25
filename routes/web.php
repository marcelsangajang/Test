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

//Create and post patient
Route::get('PatientAppointmentsFormView', ['as' => 'PatientAppointmentsFormView', 'uses' => 'PatientAppointmentsController@view']);
Route::post('postAppointment', 'PatientAppointmentsController@post');

//Make appointment
Route::get('PatientFormView', ['as' => 'PatientFormView', 'uses' => 'PatientFormController@view']);
Route::post('postPatient', 'PatientFormController@post');


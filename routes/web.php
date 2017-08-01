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

// Create and post EMPLOYEE
Route::get('EmployeeView', ['as' => 'EmployeeView', 'uses' => 'EmployeeController@view']); 
Route::post('EmployeePost', 'EmployeeController@post');

// Create and post EMPLOYEE PERIOD and WORKDAYS
Route::get('EmployeePeriodView', ['as' => 'EmployeePeriodView', 'uses' => 'EmployeePeriodController@view']);
Route::post('EmployeePeriodPost', 'EmployeePeriodController@post');

//Create and post CHAIR
Route::get('ChairView', ['as' => 'ChairView', 'uses' => 'ChairController@view']); 
Route::post('ChairPost', 'ChairController@post');

//Create and post CHAIR PERIOD AND WORKDAYS
Route::get('ChairPeriodView', ['as' => 'ChairPeriodView', 'uses' => 'ChairPeriodController@view']); 
Route::post('ChairPeriodPost', 'ChairPeriodController@post');

//Agenda overview
Route::get('AgendaPersonalOverview', ['as' => 'AgendaPersonalOverview', 'uses' => 'AgendaPersonalOverviewController@test']);

//POST Agenda overview
Route::post('agendaOverviewpost', ['as' => 'AgendaPersonalPeriodFormView', 'uses' => 'AgendaPersonalOverviewController@OverviewPost']);

//Make Appointment
Route::get('PatientAppointmentsFormView', ['as' => 'PatientAppointmentsFormView', 'uses' => 'PatientAppointmentsController@view']);
Route::post('postAppointment', 'PatientAppointmentsController@post');

//Create and post patient
Route::get('PatientFormView', ['as' => 'PatientFormView', 'uses' => 'PatientFormController@view']);
Route::post('postPatient', 'PatientFormController@post');


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

//Initialization of a few data objects in db (needed to prevent errors, because of no frontend)
Route::get('Test', ['as' => 'Test', 'uses' => 'TestController@view']);
Route::get('Vue',  ['as' => 'Vue', 'uses' => 'TestController@vue']);
Route::post('TestPost', 'TestController@post');

// Employee functionality
Route::get('EmployeeView', ['as' => 'EmployeeView', 'uses' => 'EmployeeController@view']); 
Route::post('EmployeePost', 'EmployeeController@createEmployee');
Route::post('EmployeePeriodPost', 'EmployeeController@createPeriod');

// Chair functionality
Route::get('ChairView', ['as' => 'ChairView', 'uses' => 'ChairController@view']); 
Route::post('ChairPost', 'ChairController@createChair');
Route::post('ChairPeriodPost', 'ChairController@createPeriod');

// Appointment functionality
Route::get('PatientAppointmentView', ['as' => 'PatientAppointmentView', 'uses' => 'PatientController@appointmentView']);
Route::post('postAppointment', 'PatientController@findAppointmentType');

// Patient functionality
Route::get('PatientView', ['as' => 'PatientView', 'uses' => 'PatientController@patientView']);
Route::get('PatientList', ['as' => 'PatientList', 'uses' => 'PatientController@patientList']);
Route::post('postPatient', 'PatientController@createPatient');

//Create and post patient GROUP
//Route::get('PatientGroupView', ['as' => 'PatientGroupView', 'uses' => 'PatientController@groupAppointmentView']);
Route::post('PatientGroupPost', 'PatientController@showGroupAppointment');

//Create and post SCHEDULE
Route::get('ScheduleView', ['as' => 'ScheduleView', 'uses' => 'ScheduleController@view']);
Route::post('postSchedule', 'ScheduleController@createSchedule');
Route::post('postSchedulePeriod', 'ScheduleController@createPeriod');

//Agenda overview
Route::get('AgendaTimeBlocks', ['as' => 'AgendaTimeBlocks', 'uses' => 'EmployeeTimeBlocksController@test']);

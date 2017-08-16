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

//TEST
Route::get('Test', ['as' => 'Test', 'uses' => 'TestController@view']);
Route::post('TestPost', 'TestController@post');

// Create and post EMPLOYEE
<<<<<<< HEAD
Route::get('EmployeeView', ['as' => 'EmployeeView', 'uses' => 'EmployeeController@view']); 
Route::post('EmployeePost', 'EmployeeController@createEmployee');
Route::post('EmployeePeriodPost', 'EmployeeController@createPeriod');

//Create and post CHAIR
Route::get('ChairView', ['as' => 'ChairView', 'uses' => 'ChairController@view']); 
Route::post('ChairPost', 'ChairController@createChair');

//Create and post CHAIR PERIOD AND WORKDAYS
Route::post('ChairPeriodPost', 'ChairController@createPeriod');
=======
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
>>>>>>> 7b00d724bb5600743aade44a9d9beaa3e45bcbaa

//Make Appointment
Route::get('PatientAppointmentView', ['as' => 'PatientAppointmentView', 'uses' => 'PatientAppointmentController@view']);
Route::post('postAppointment', 'PatientAppointmentController@post');

//Create and post patient
Route::get('PatientView', ['as' => 'PatientView', 'uses' => 'PatientController@view']);
Route::post('postPatient', 'PatientController@post');

//Create and post patient GROUP
Route::get('PatientGroupView', ['as' => 'PatientGroupView', 'uses' => 'PatientGroupController@view']);
Route::post('PatientGroupPost', 'PatientGroupController@post');

//Create and post patient GROUP
Route::get('PatientGroupAppointmentView', ['as' => 'PatientGroupAppointmentView', 'uses' => 'PatientGroupAppointmentController@view']);
Route::post('PatientGroupAppointmentPost', 'PatientGroupAppointmentController@post');

//Create and post SCHEDULE
Route::get('ScheduleView', ['as' => 'ScheduleView', 'uses' => 'ScheduleController@view']);
Route::post('postSchedule', 'ScheduleController@createSchedule');
Route::post('postSchedulePeriod', 'ScheduleController@createPeriod');

//Agenda overview
Route::get('AgendaTimeBlocks', ['as' => 'AgendaTimeBlocks', 'uses' => 'EmployeeTimeBlocksController@test']);

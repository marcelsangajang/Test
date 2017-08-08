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
Route::post('postSchedule', 'ScheduleController@post');

//Create and post SCHEDULE PERIOD
Route::get('SchedulePeriodView', ['as' => 'SchedulePeriodView', 'uses' => 'SchedulePeriodController@view']);
Route::post('postSchedulePeriod', 'SchedulePeriodController@post');

//Agenda overview
Route::get('AgendaPersonalOverview', ['as' => 'AgendaPersonalOverview', 'uses' => 'AgendaPersonalOverviewController@test']);

Route::post('agendaOverviewpost', ['as' => 'AgendaPersonalPeriodFormView', 'uses' => 'AgendaPersonalOverviewController@OverviewPost']);

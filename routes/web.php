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

Route::get('/test', function() {
	
	$temp = DB::table('personal_agenda')->latest()->get();//find($id);

	return view('test', compact('temp'));
});

Route::get('/{about}', function($id) {

	$temp = DB::table('personal_agenda')->find($id);
	
	return view('test', compact('temp'));

	
});
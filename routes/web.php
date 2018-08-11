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
Route::post('/info', 'ReservationController@userSubmit')->name('info');
Route::get('/info', function (){
    return redirect('/');
});
Route::post('/store', 'ReservationController@store');
Route::get('/available/{date}', 'ReservationController@available');
Route::get('/reservations', 'ReservationController@indexView');
Route::get('/tables', 'ReservationController@index');
Route::post('/confirm', 'ReservationController@confirm');
Route::get('/ures', 'ReservationController@uRes');
Route::post('/your_reservations', 'ReservationController@uResView')->name('c_res');
Route::get('/your_res/{email}', 'ReservationController@youIndex');
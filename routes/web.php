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
    return redirect('home');
});
//
//Auth::routes();
//
//Route::get('/home', 'HomeController@index')->name('home');
Route::get('/lang/{lang}', ['as'=>'lang.switch', 'uses'=>'LanguageController@switchLang']);

//// staff
//Route::get('/staff', 'StaffController@index');
//Route::get('/staff/add', 'StaffController@add');
//Route::post('/staff/add', 'StaffController@create');
//Route::get('/staff/edit/{id}', 'StaffController@update');
//Route::post('/staff/edit/{id}', 'StaffController@edit');
//Route::post('/staff/delete', 'StaffController@destroy');
//
//
//Route::get('/patient', 'PatientController@index');
//Route::get('/patient/add', 'PatientController@add');
//Route::get('/patient/edit/{id}', 'PatientController@update');
//Route::get('/patient/delete/{id}', 'PatientController@destroy');

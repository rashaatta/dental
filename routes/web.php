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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// staff
Route::get('staff', 'StaffController@index');
Route::get('staff/edit/{id}', 'StaffController@update');
Route::post('staff/edit/{id}', 'StaffController@edit');
Route::get('staff/delete/{id}', 'StaffController@destroy');

Route::get('lang/{lang}', ['as'=>'lang.switch', 'uses'=>'LanguageController@switchLang']);

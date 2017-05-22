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


//Route::get('/', function () {
//    return view('home');
//});
//
//Auth::routes();
//
//Route::get('/home', 'HomeController@index')->name('home');
Route::get('/lang/{lang}', ['as' => 'lang.switch', 'uses' => 'LanguageController@switchLang']);

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


// API Routes
Route::group(array('prefix' => 'api/v1'), function () {
    /**
     * since we will be using this just for CRUD, we don't need create and edit
     * Angular will handle both of those forms
     * this ensures a user can't access api/create or api/edit when there's nothing
     */
    Route::resource('staff', 'StaffController', array('only' => array('index', 'store', 'destroy')));
}
);

// API Routes
Route::group(array('middleware' => 'web'), function () {
    Route::get('/', function () {
        return view('home');
    });
}
);
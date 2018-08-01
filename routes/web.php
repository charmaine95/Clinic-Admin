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

//------------GUEST-------------//
Route::get('/', 'HomeController@guest');
Route::get('/about', 'HomeController@about');
Route::post('/deviceToken', function() {
    
});
// For authenticared user route only
Route::group(['middleware' => 'auth', 'prefix' => 'dashboard'], function () {
    Route::get('/', function () {
        return view('dashboard.index');
    });

    Route::get('doctors', 'DoctorController@index');
    Route::get('doctors/create', 'DoctorController@create');
    Route::post('doctors/create', 'DoctorController@store');
    Route::get('doctors/{id}', 'DoctorController@show');
    Route::post('doctors/update/{id}', 'DoctorController@update');

    Route::get('profile', 'ProfileController@show');
    Route::post('profile/update/{id}', 'ProfileController@update');

});

// Pubic routes
Route::get('/login', 'Auth\AuthController@getLogin');
Route::post('/login', 'Auth\AuthController@postLogin');
Route::get('/register', 'Auth\AuthController@getRegister');
Route::post('/register', 'Auth\AuthController@postRegister');
Route::get('/logout', 'Auth\AuthController@logout');
Route::get('/forgot', 'Auth\PasswordController@forgot');
Route::get('/reset', 'Auth\PasswordController@reset');
Route::post('/reset', 'Auth\PasswordController@postReset');
Route::post('/password/email', 'Auth\PasswordController@email');
Route::post('serviceSchedule/setDate', 'Admin\ServiceController@setDateSchedule');

//Firebase Sample
Route::get('/firebasesample', 'FirebaseController@index');



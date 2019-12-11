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

/**
 * Route to the fronted page
 * These routes are freely exposed
 */

Route::get('/', function () {
    return view('welcome');
});

/**
 * Custom authentication, currently not different from Laravel's default
 * I prefer the syntax for all routes
 */

Auth::routes();

Route::get('/auth/login', function () {
    return view('login');
})->name('login');

Route::post('authenticate', 'Auth\LoginController@login')->name('authenticate');
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/backend','HomeController@index')->name('backend');
Route::get('/about', 'AboutUsController@index')->name('about');
Route::get('/services', 'ServicesController@index')->name('services');
Route::get('/imprint', 'ImprintController@index')->name('imprint');
Route::get('/contact', 'ContactFormController@index')->name('contact');
Route::post('/contact', 'ContactFormController@store')->name('contact');

/**
 * Protected routes - only authenticated user can access
 */

Route::group(["middleware" => ['auth']], function () {

    Route::group(["middleware" => ['hasPermission:admin-document']], function () {
        Route::get('/document/{patientId}', 'DocumentController@create')->name('newdocument');
        Route::post('/document/{patientId}', 'DocumentController@store')->name('document');
        Route::get('/documents', 'DocumentController@index')->name('documents');
    });

    Route::group(["middleware" => ['hasPermission:admin-patient']], function () {
        Route::get('/patients', 'PatientController@index')->name('patients');
        Route::get('/patient/{id}', 'PatientController@edit')->name('patient');
        Route::get('/patient/', 'PatientController@create')->name('newpatient');
        Route::post('/patient/', 'PatientController@store')->name('newpatient');
        Route::post('/patient/{id}', 'PatientController@update')->name('patient');
        Route::post('/patient/{id}/delete', 'PatientController@destroy');
    });

    Route::get('logout', 'Auth\LoginController@logout')->name('logout');

});

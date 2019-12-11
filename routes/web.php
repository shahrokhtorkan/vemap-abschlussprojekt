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

// Wilkommen (welcome.blade.php)
Route::get('/', function () {
    return view('welcome');
});

// Über uns (about.blade.php)
Route::get('/about', 'AboutUsController@index')->name('about');

// Leistungen (services.blade.php)
Route::get('/services', 'ServicesController@index')->name('services');

// Impressum (imprint.blade.php)
Route::get('/imprint', 'ImprintController@index')->name('imprint');

// Kontakt (contact.blade.php) - Three step vue.js form, needs a post route
Route::get('/contact', 'ContactFormController@index')->name('contact'); // shows contact form
Route::post('/contact', 'ContactFormController@store')->name('contact');


/**
 * Custom authentication, currently not different from Laravel's default
 * I prefer the syntax for all routes
 */
Auth::routes();
Route::post('login', [
    'uses' => 'SignInController@signin',
    'as' => 'auth.signin'
]);

// I think we do not need this route, but left here upon Shahrokhs request
Route::get('/home', 'HomeController@index')->name('home');


/**
 * Protected routes - only authenticated user can access
 */
Route::middleware(['auth'])->group(function () {

    // Benutzer-Dashboard (returns view home.blade.php)
    Route::get('/backend','HomeController@index')->name('backend');

    // Patientenübersicht
    Route::get('/patients', 'PatientController@index')->name('patients');

    // Patienten bearbeiten
    Route::get('/patient/{id}', 'PatientController@edit')->name('patient');

    // Neuer Patient - I would prefer /patient/new
    Route::get('/patient/', 'PatientController@create')->name('newpatient');

    // Patienten speichern
    Route::post('/patient/', 'PatientController@store')->name('newpatient');

    // Patienten updaten
    Route::post('/patient/{id}', 'PatientController@update')->name('patient');

    // Patienten löschen
    Route::post('/patient/{id}/delete', 'PatientController@destroy');

    Route::get('/document/{patientId}', 'DocumentController@create')->name('newdocument');
    Route::post('/document/{patientId}', 'DocumentController@store')->name('document');
    Route::get('/documents', 'DocumentController@index')->name('documents');
});


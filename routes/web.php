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
use App\Patient;
use App\Appointment;
use App\User;

Auth::routes();

Route::get('/', function () {
    return view('frontend');
});

Route::get('/login', function () {
    return view('login');
})->name('login');

Route::post('authenticate', 'Auth\LoginController@login')->name('authenticate');

/*Route::get('/backend','HomeController@index')->name('frontend');*/

Route::get('/about', 'AboutUsController@index')->name('about');
Route::get('/services', 'ServicesController@index')->name('services');
Route::get('/imprint', 'ImprintController@index')->name('imprint');
Route::get('/contact', 'ContactFormController@index')->name('contact');
Route::post('/contact', 'ContactFormController@store')->name('contact');

/**
 * Protected routes - only authenticated user can access
 */
Route::group(["middleware" => ['auth']], function () {

    /*Route::get('/backend', function () {
        return view('backend');
    })->name('backend');*/

    Route::get('/backend', function () {
        User::requirePermission('login');
        $user = auth()->user();
        return view('backend', ['user' => $user, 'patient' => $user->patient])  ;
    })->name('backend');

    Route::get('/inquiries','InquiriesController@index')->name('inquiries');
    Route::post('/inquiries/{qid}', 'InquiriesController@update')->name('update');

    /*Route::group(["middleware" => ['hasPermission:admin-document']], function () {*/
        Route::get('/document/{patientId}', 'DocumentController@create')->name('newdocument');
        Route::post('/document/{patientId}', 'DocumentController@store')->name('document');
        Route::get('/documents', 'DocumentController@index')->name('documents');
        Route::post('/documents/{patientId}/delete', 'DocumentController@destroy');
    /*});*/

    /*Route::group(["middleware" => ['hasPermission:admin-patient']], function () {*/
        Route::get('/patients', 'PatientController@index')->name('patients');
        Route::get('/patient/{id}', 'PatientController@edit')->name('patient');
        Route::get('/patient/', 'PatientController@create')->name('newpatient');
        Route::post('/patient/', 'PatientController@store')->name('newpatient');
        Route::post('/patient/{id}', 'PatientController@update')->name('patient');
        Route::post('/patient/{id}/newaccount', 'PatientController@newAccount');
        Route::post('/patient/{id}/delete', 'PatientController@destroy');
        Route::get('/patients.json', 'PatientController@indexJSON');
    /*});*/

    /*Route::group(["middleware" => ['hasPermission:admin-calendar']], function () {*/
        Route::get('/appointments', 'AppointmentController@index')->name('appointments');
    /*});*/

    Route::get('logout', 'Auth\LoginController@logout')->name('logout');
});

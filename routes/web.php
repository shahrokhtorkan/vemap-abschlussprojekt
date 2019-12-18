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
})->name('/');

Route::get('/login', function () {
    return view('login');
})->name('login');

Route::post('authenticate', 'Auth\LoginController@login')->name('authenticate');

/**
 * Public routes - all user can access
 */

Route::view('/about', 'frontend.about')->name('about');
Route::view('/services', 'frontend.services')->name('services');
Route::view('/imprint', 'frontend.imprint')->name('imprint');
Route::view('/contact', 'frontend.contact')->name('contact');
Route::post('/contact', 'ContactFormController@store')->name('contact');

/**
 * Protected routes - only authenticated user can access
 */

Route::group(["middleware" => ['auth']], function () {

    Route::get('/backend', function () {
        User::requirePermission('login');
        $user = auth()->user();
        $patient = $user->patient;
        if ($patient) {
            $documents = $patient->documents;
        }else {
            $documents = [];
        }
        return view('backend', [
            'user' => $user,
            'patient' => $patient,
            'documents' => $documents,
            'mySlots' => Appointment::getMyConfirmedSlots(), 'availableSlots' => Appointment::getAvailableSlots()
        ]);
    })->name('backend');

    /**
     * Protected routes Inquiries - 'admin-contact'
     */
    Route::get('/inquiries','InquiriesController@index')->name('inquiries');
    Route::post('/inquiries/{qid}', 'InquiriesController@update')->name('update');
    /**
     * Protected routes Documents - 'admin-document'
     */
    Route::get('/document/{patientId}', 'DocumentController@create')->name('newdocument');
    Route::post('/document/{patientId}', 'DocumentController@store')->name('document');
    Route::get('/documents', 'DocumentController@index')->name('documents');
    Route::post('/documents/{patientId}/delete', 'DocumentController@destroy');
    /**
     * Protected routes Patients - 'admin-patient'
     */
    Route::get('/patients', 'PatientController@index')->name('patients');
    Route::get('/patient/{id}', 'PatientController@edit')->name('patient');
    Route::get('/patient/', 'PatientController@create')->name('newpatient');
    Route::post('/patient/', 'PatientController@store')->name('newpatient');
    Route::post('/patient/{id}', 'PatientController@update')->name('patient');
    Route::post('/patient/{id}/newaccount', 'PatientController@newAccount');
    Route::post('/patient/{id}/delete', 'PatientController@destroy');
    Route::get('/patients.json', 'PatientController@indexJSON');
    /**
     * Protected routes Appointments - 'admin-calendar'
     */
    Route::get('/appointments', 'AppointmentController@index')->name('appointments');
    Route::post('/appointments/create', 'AppointmentController@createForDay');
    Route::post('/appointment/{id}/assignpatient', 'AppointmentController@assignPatient');
    Route::post('/appointment/{id}/setstatus', 'AppointmentController@setStatus');
    Route::post('/appointments/{Id}/destroy', 'AppointmentController@destroy');
    Route::post('/appointment/{id}/cancel', 'AppointmentController@cancel');
    Route::post('/appointment/reserve', 'AppointmentController@reserve');
    /**
     * Logout
     */
    Route::get('logout', 'Auth\LoginController@logout')->name('logout');
});

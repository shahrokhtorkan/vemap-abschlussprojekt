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
Route::post('login', [
    'uses' => 'SignInController@signin',
    'as' => 'auth.signin'
]);
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/backend','HomeController@index')->name('backend');
Route::get('/contact', 'ContactFormController@index')->name('contact');
Route::post('/submit', 'ContactFormController@submit');
Route::get('/about', 'AboutUsController@index')->name('about');
Route::get('/services', 'ServicesController@index')->name('services');
Route::get('/imprint', 'ImprintController@index')->name('imprint');
Route::get('/patients', 'PatientController@index')->name('patients');

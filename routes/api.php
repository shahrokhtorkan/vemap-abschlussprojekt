<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

// Add Q
Route::post('contact/store', function(Request $request){
    return Contact::create(['name' => $request->input(['name']), 'email' => $request->input(['email']), 'phone' => $request->input(['phone'])]);
});

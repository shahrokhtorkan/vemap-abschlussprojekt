<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

/*
 * Custom login routine
 *
 */
class SignInController extends Controller
{
    public function signin(Request $request)
    {
        // Validate input data
        $this->validate($request, [
            'name' => 'required',
            'password' => 'required'
        ]);

        // Using Auth facade to verify user credentials
        if(Auth::attempt([
            'name' => $request->input('name'),
            'password' => $request->input('password'),
        ], $request->has('remember'))) {
            return redirect('/backend'); // If using named route, pls. use backend.index
        }
        return redirect()->back()->with('error', 'Authentifizierung fehlgeschlagen.'); // Note for Shahrokh: @if(Session::has('error') {{ Session:: get('error') }} @endif
    }
}

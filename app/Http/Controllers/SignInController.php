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
    /**
     * Custom sign-in controller. Currently does nothing in particular
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     * @throws \Illuminate\Validation\ValidationException
     */
    public function signin(Request $request)
    {
        // Validate input data
        $this->validate($request, [
            'email' => 'required',
            'password' => 'required'
        ]);

        // Using Auth facade to verify user credentials TODO change email to name in final version
        if(Auth::attempt([
            'email' => $request->input('email'),
            'password' => $request->input('password'),
        ], $request->has('remember'))) {
            return redirect('/backend'); // If using named route, pls. use backend.index
        }
        return redirect()->back()->with('error', 'Authentifizierung fehlgeschlagen.'); // Note for Shahrokh: @if(Session::has('error') {{ Session:: get('error') }} @endif
    }
}

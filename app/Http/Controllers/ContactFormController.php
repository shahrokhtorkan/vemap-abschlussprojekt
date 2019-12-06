<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
class ContactFormController extends Controller
{
    public function submit(Request $request) {
        $this->validate($request, [
            'name' => 'required|string',
            'email' => 'required|email',
            'message' => 'required',
        ]);
        /*
          Add mail functionality here.
        */
        return response()->json(null, 200);
    }

    public function index()
    {
        return view('contact');
    }
}

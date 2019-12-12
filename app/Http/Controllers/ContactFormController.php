<?php
namespace App\Http\Controllers;
use App\Inquiry;
use Illuminate\Http\Request;

class ContactFormController extends Controller
{
    /**
     * Submit contact form
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request) {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'phone'=>'required',
            'service'=>'required',
            'q1'=>'required',
            'q2'=>'required',
            'q3'=>'required',
            'q4'=>'required',
            'q5'=>'required',
        ]);

        $inquiry = new Inquiry();
        $inquiry->name = $request->name;
        $inquiry->email = $request->email;
        $inquiry->phone = $request->phone;
        $inquiry->service = $request->service;
        $inquiry->q1 = $request->q1;
        $inquiry->q2 = $request->q2;
        $inquiry->q3 = $request->q3;
        $inquiry->q4 = $request->q4;
        $inquiry->q5 = $request->q5;
        $inquiry->status = 1;
        $inquiry->save();

        /*
          Add mail functionality here.
        */

        return response()->json([
            'inquiry' => $inquiry,
            'message' => 'Anfrage wurde gesendet.'
        ]);
    }

    public function index()
    {
        return view('contact');
    }
}

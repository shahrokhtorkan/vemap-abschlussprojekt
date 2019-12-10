<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;

class ContactFormController extends Controller
{
    /**
     * Submit form function placeholder TODO request should be stored in DB also
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     * @throws \Illuminate\Validation\ValidationException
     */

    public function create()
    {
        return view('');
    }

    public function submit(Request $request) {
        $request->validate([
            'name' => 'required|alpha_dash|max:255',
            'email' => 'email',
            'phone'=>'required|numeric|digits:10',
            'Leistungen'=>'required',
            'q1'=>'required',
            'q2'=>'required',
            'q3'=>'required',
            'q4'=>'required',
            'q5'=>'required',
        ]);

        $contact = new contact();
        $contact->name = $request->name;
        $contact->email = $request->email;
        $contact->phone = $request->phone;
        $contact->Leistungen = $request->Leistungen;
        $contact->q1 = $request->q1;
        $contact->q2 = $request->q2;
        $contact->q3 = $request->q3;
        $contact->q4 = $request->q4;
        $contact->q5 = $request->q5;
        $contact->save();
        dd($contact->name);
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

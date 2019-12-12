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
        // Validate form
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

        // Collect questions to one array
        $questions = [];

        array_push($questions, $request->q1);
        array_push($questions, $request->q2);
        array_push($questions, $request->q3);
        array_push($questions, $request->q4);


        // Save data from the form
        $inquiry = new Inquiry();
        $inquiry->name = $request->name;
        $inquiry->email = $request->email;
        $inquiry->phone = $request->phone;
        $inquiry->service = $request->service;
        $inquiry->question = json_encode($questions);
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

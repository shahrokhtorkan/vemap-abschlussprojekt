<?php
namespace App\Http\Controllers;
use App\Inquiry;
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



    public function store(Request $request) {
        $request->validate([
            'name' => 'required',
            'email' => 'email',
            'phone'=>'required',
            'Leistungen'=>'required',
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
        $inquiry->service = 'a';
        $inquiry->q1 = 'q1';
        $inquiry->q2 = 'q2';
        $inquiry->q3 = 'q3';
        $inquiry->q4 = 'q4';
        $inquiry->q5 = 'q5';
        $inquiry->status = 1;
        $inquiry->save();

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

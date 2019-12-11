<?php
namespace App\Http\Controllers;
use App\Inquiries;
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

        $inquiries = new Inquiry();
        $inquiries->name = $request->name;
        $inquiries->email = $request->email;
        $inquiries->phone = $request->phone;
        $inquiries->Leistungen = $request->Leistungen;
        $inquiries->q1 = $request->q1;
        $inquiries->q2 = $request->q2;
        $inquiries->q3 = $request->q3;
        $inquiries->q4 = $request->q4;
        $inquiries->q5 = $request->q5;
        $inquiries->save();
        session()->flash("message", "Patient {$inquiries->name} {$inquiries->email} wurde angelegt.");
        return redirect('contact');

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

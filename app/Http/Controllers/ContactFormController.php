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

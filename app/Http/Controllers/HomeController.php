<?php

namespace App\Http\Controllers;

use App\Inquiries;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $inquiries = Inquiries::orderBy('id', 'desc')->paginate(5);

        return view('backend',compact('inquiries'));
    }
}

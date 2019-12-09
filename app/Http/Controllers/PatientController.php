<?php

namespace App\Http\Controllers;

use App\Patient;
use Illuminate\Http\Request;
use Illuminate\View\View;

class PatientController extends Controller
{
    /**
     *
     *
     * @return \Illuminate\Contracts\View\Factory|View
     */
    public function index()
    {
        $patients = Patient::all();
        return view('backend.patients', [
            'patients' => $patients
        ]);
    }

    /**
     * Show the form for creating new patient
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.patient');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

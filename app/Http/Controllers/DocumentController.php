<?php

namespace App\Http\Controllers;

use App\Document;
use App\Patient;
use Illuminate\Http\Request;

class DocumentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backend.documents', [
            'document' => auth()->user()->documents()->orderBy('id', 'desc')->paginate(getenv('AIOT_PAGINATE_ROWS'))
        ]);
    }

    /**
     * @param int $patientId
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create(int $patientId)
    {
        return view('backend.document', [ 'patientId' => $patientId]);
    }

    /**
     * @param Request $request
     * @param int $patientId
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request, int $patientId)
    {
        $patient = Patient::find($patientId);

        $documents = new Document();
        $documents->user()->associate(auth()->user());
        $documents->patient()->associate($patient);
        $documents->text = $request->text;
        $documents->save();

        return redirect()->route('patient', $patientId);
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

<?php

namespace App\Http\Controllers;

use App\Document;
use App\Patient;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DocumentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $documents = Document::orderBy('id', 'desc')->paginate(6);
//        dd($documents);
//        return view('backend.documents', array(
//            'documents' => auth()->user()->documents()->orderBy('id', 'desc')->paginate(getenv('AIOT_PAGINATE_ROWS'))
//        ));
        return view('backend.documents',compact('documents'));
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
    public function store(Request $request, int $id)
    {

        $request->validate([
            'text' => 'required',
            'file' => 'required|mimes:doc,docx,pdf,txt|max:2048',
        ]);

        $patient = Patient::findOrFail($id);
        /*$user = User::findOrFail($patient->user_id);*/
        $uploded_file = $request->file('file');
        $name = $request->text;
        $doc_path = Storage::disk('upload_doc')->put($patient->firstname . $patient->lastname, $uploded_file);

        $document = new Document();
        $document->user()->associate(auth()->user());
        $document->patient()->associate($patient);
        $document->text = $name;
        $document->pdf = "/upload_doc/" . $doc_path;
        $document->save();
        return redirect()->route('patients', $id);
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

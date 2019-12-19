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
        User::requirePermission('admin-document');

        $documents = Document::orderBy('id', 'desc')->paginate(9);
        return view('backend.documents',compact('documents'));
    }

    /**
     * @param int $patientId
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create(int $patientId)
    {
        User::requirePermission('admin-document');

        $patient = Patient::findOrFail($patientId);
        $user = auth()->user();

        return view('backend.document', [ 'patientId' => $patientId, 'patient' => $patient, 'user' => $user]);
    }

    /**
     * @param Request $request
     * @param int $patientId
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request, int $patientId)
    {
        User::requirePermission('admin-document');

        $request->validate([
            'text' => 'required',
            'file' => 'required|mimes:doc,docx,pdf,txt|max:2048',
        ]);

        $patient = Patient::findOrFail($patientId);

        // Send a mail notification
        try {
            \Mail::to($patient->email)->send(new \App\Mail\PatientDocumentNotification());
        } catch(\Exception $e){
            dd ($e->getMessage());
        }

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
        return redirect()->route('patients', $patientId);
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
    public function destroy($documentId)
    {
        //delete the Row from the Documents table
        $document = Document::findOrFail($documentId);
        $document->delete();

        //delete the file from the directory
        $doc_path = $document->pdf;
        $path_pieces = explode("/",$doc_path);
        $doc_path = "/$path_pieces[2]/$path_pieces[2]";
        Storage::disk('upload_doc')->delete($doc_path);
        return redirect(route('documents'));
    }
}

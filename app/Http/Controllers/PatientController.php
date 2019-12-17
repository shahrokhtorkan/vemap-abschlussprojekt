<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Patient;
use App\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use \InvalidArgumentException;
use Illuminate\Http\Request;

class PatientController extends Controller
{
    /**
     * Display a listing of the resource, optionally filtered
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        User::requirePermission('admin-patient');

        $request = request();

        list($orderBy, $orderDirection) = $this->determineOrdering($request);

        $patients = $this->getPatientsAsRequested($request, $orderBy, $orderDirection, true);

        return view('backend.patients', [
            'patientCount' => Patient::all()->count(),
            'patients' => $patients,
            'orderBy' => $orderBy,
            'orderDirection' => $orderDirection,
            'orderDirectionIndicator' => ($orderDirection == 'asc') ? '&darr;' : '&uarr;',
            'inverseOrderDirection' => ($orderDirection == 'asc') ? 'desc' : 'asc',
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        User::requirePermission('admin-patient');

        return view('backend.patient', ['patient' => null, 'user' => null]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        User::requirePermission('admin-patient');

        $request->validate([
            'firstname' => 'required|alpha_dash|max:255',
            'lastname' => 'required|alpha_dash|max:255',
            'email' => 'email',
            'svnr' => 'required|numeric|digits:10|unique:patients',
            'address' => 'string|nullable|max:500',
            'plz' => 'required|numeric|digits_between:4,5',
            'city' => 'required|alpha_dash|max:255',
            'country' => 'required|alpha_dash|max:255',
        ]);

        $patient = new Patient();
        $patient->firstname = $request->firstname;
        $patient->lastname = $request->lastname;
        $patient->email = $request->email;
        $patient->svnr = $request->svnr;
        $patient->address = $request->address;
        $patient->plz = $request->plz;
        $patient->city = $request->city;
        $patient->country = $request->country;
        $patient->save();
        session()->flash("message", "Patient {$patient->firstname} {$patient->lastname} wurde angelegt.");
        return view('backend.patient', ['patient' => $patient, 'user' => null]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        User::requirePermission('admin-patient');

        $patient = Patient::findOrFail($id);
        $user = $patient->user;
        return view('backend.patient', ['patient' => $patient, 'user' => $user]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        User::requirePermission('admin-patient');

        $patient = Patient::findOrFail($id);
        $patient->firstname = $request->firstname;
        $patient->lastname = $request->lastname;
        $patient->email = $request->email;
        $patient->svnr = $request->svnr;
        $patient->address = $request->address;
        $patient->plz = $request->plz;
        $patient->city = $request->city;
        $patient->country = $request->country;
        $patient->save();

        $user = $patient->user;

        session()->flash("message", "Patient {$patient->firstname} {$patient->lastname} wurde gespeichert.");
        return view('backend.patient', ['patient' => $patient, $user => null]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::requirePermission('admin-patient');

        $patient = Patient::findOrFail($id);
        $message = "Patient {$patient->firstname} {$patient->lastname} wurde gelöscht.";
        $patient->delete();
        session()->flash("message", $message);
        return redirect(route('patients'));
    }

    public function newAccount($id)
    {
        User::requirePermission('admin-patient');

        $patient = Patient::findOrFail($id);
        $user = new User();
        $user->name = "{$patient->firstname}.{$patient->lastname}";
        if (!$patient->email) {
            throw ValidationException::withMessages(['email' => "Bitte eine E-Mail-Adresse eingeben."]);
        }
        $cleartextPassword = $user->name;
        $user->password = Hash::make($cleartextPassword);
        $user->email = $patient->email;
        $user->patient()->associate($patient);
        $user->save();
        $user->addRole('patient');
        session()->flash("message", "Benutzer '{$user->name}' mit Kennwort '{$cleartextPassword}' wurde für Patient {$patient->vorname} {$patient->nachname} angelegt.");
        return redirect("/patient/{$patient->id}");
    }

    public function indexJSON(){
        User::requirePermission('admin-patient');

        $request=request();

        list($orderBy, $orderDirection) = $this->determineOrdering($request);

        $patients = $this->getPatientsAsRequested($request, $orderBy, $orderDirection);
        $patientsArray = $this->patientsToArray($patients);

        return response()->json($patientsArray);
    }

    /**
     * @param $request
     * @return array
     */
    private function determineOrdering($request): array
    {
        $orderBy = $request->query('orderBy', 'lastname');
        $orderDirection = $request->query('orderDirection', 'asc');

        if (!in_array($orderBy, ['firstname', 'lastname', 'svnr', 'address'])) {
            throw new InvalidArgumentException("Invalid sort key.");
        } elseif (!in_array($orderDirection, ['asc', 'desc'])) {
            throw new InvalidArgumentException("Invalid sort direction.");
        }
        return array($orderBy, $orderDirection);
    }

    /**
     * @param $request
     * @param $orderBy
     * @param $orderDirection
     * @return mixed
     */
    private function getPatientsAsRequested($request, $orderBy, $orderDirection, $paginate=false)
    {
        if ($request->has('query')) {
            $query = $request->get('query');
            $queryResult=Patient::where('firstname', 'like', "%{$query}%")
                ->orWhere('lastname', 'like', "%{$query}%")
                ->orWhere('svnr', 'like', "%{$query}%")
                ->orderBy($orderBy, $orderDirection);
        } else {
            $queryResult = Patient::orderBy($orderBy, $orderDirection);
        }
        if($paginate) {
            $patients = $queryResult->paginate(14);
        } else {
            $patients = $queryResult->get();
        }
        return $patients;
    }

    /**
     * @param $patients
     * @return false|string
     */
    private function patientsToArray($patients)
    {
        $patientsArray = [];
        foreach ($patients as $patient) {
            $patientArray = [
                'id' => $patient->id,
                'label' => "{$patient->firstname} {$patient->lastname} ({$patient->svnr})"
            ];
            array_push($patientsArray, $patientArray);
        }
        return $patientsArray;
    }

}

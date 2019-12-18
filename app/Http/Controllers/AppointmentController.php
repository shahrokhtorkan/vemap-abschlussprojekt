<?php

namespace App\Http\Controllers;

use App\Patient;
use App\Appointment;
use App\User;
use Illuminate\Http\Request;

class AppointmentController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function index() {
        User::requirePermission('admin-calendar');

        $user = auth()->user();

        $availableSlots=$user->appointments()->where('status', 'available')->paginate(8);
        $reservedSlots=$user->appointments()->where('status', 'reserved')->paginate(8);
        $confirmedSlots=$user->appointments()->whereIn('status', ['reserved','confirmed'])->paginate(8);

        return view('backend.appointments', ['confirmedSlots'=>$confirmedSlots, 'reservedSlots'=>$reservedSlots, 'availableSlots'=>$availableSlots, 'patients'=>Patient::orderBy('lastname')->get(), 'slotStatus' => Appointment::STATUS]);
    }

    /**
     * Assign an existing appointment to a patient
     *
     * @param $slotId
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function assignPatient($slotId) {
        $request = request();
        $patientId = $request->patient_id;
        $appointment = Appointment::findOrFail($slotId);
        $patient = Patient::findOrFail($patientId);
        $appointment->patient()->associate($patient);
        $appointment->status='confirmed';
        $appointment->save();
        return redirect()->route('appointments');
    }

    /**
     * Changes status of an existing appointment
     *
     * @param $slotId
     * @return \Illuminate\Http\RedirectResponse
     */
    public function setStatus($slotId) {
        $request = request();
        $status = $request->status;

        // TODO check if status is a valid status

        $slot = Appointment::findOrFail($slotId);
        $slot->status = $status;
        $slot->patient()->dissociate();
        $slot->save();
        return redirect()->route('appointments');
    }

    /**
     * @param $slotId
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    /*public function destroy($slotId)
    {
        $appointment = Appointment::findOrFail($slotId);
        $appointment->destroy();
        return redirect(route('appointments'));
    }*/

    public function destroy($slotId)
    {
        Appointment::destroy($slotId);
        return redirect('/appointments');
    }
}

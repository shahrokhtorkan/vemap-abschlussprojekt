<?php

namespace App\Http\Controllers;

use App\Patient;
use App\Appointment;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\ViewErrorBag;
use Illuminate\Validation\ValidationException;
use InvalidArgumentException;

class AppointmentController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function index() {

        User::requirePermission('admin-calendar');

        $user = auth()->user();

        $availableSlots = $user->appointments()->where('status', 'available')->paginate(4);
        $reservedSlots = $user->appointments()->where('status', 'reserved')->paginate(4);
        $confirmedSlots = $user->appointments()->whereIn('status', ['reserved','confirmed'])->paginate(4);

        return view('backend.appointments', ['confirmedSlots' => $confirmedSlots, 'reservedSlots' => $reservedSlots, 'availableSlots' => $availableSlots, 'patients' => Patient::orderBy('lastname')->get(), 'slotStatus' => $this->getAllStatus()]);
    }

    private function getAllStatus()
    {
        return Appointment::STATUS;
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
        // Send a mail notification
        try {
            \Mail::to($patient->email)->send(new \App\Mail\PatientAppointmentNotification());
        } catch(\Exception $e){
            dd ($e->getMessage());
        }
        return redirect("/appointments");
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

        $this->checkIsValidStatus($status);

        $slot = Appointment::findOrFail($slotId);
        $slot->status = $status;
        if($status=='available') {
            $slot->patient()->dissociate();
        }
        $slot->save();
        return redirect("/appointments");
    }

    /**
     * @param $status
     */
    public function checkIsValidStatus($status): void
    {
        if (!in_array($status, $this->getAllStatus())) {
            throw new InvalidArgumentException("Invalid status.");
        }
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        Appointment::destroy($id);
        return redirect('/appointments');
    }

    /**
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function reserve()
    {
        $request = request();
        $slot = Appointment::findOrFail($request->slot_id);
        $patient = auth()->user()->patient;

        $slot->patient()->associate($patient);
        $slot->status = 'reserved';
        $slot->save();
        return redirect(route('backend'));
    }

    /**
     * @param $slot_id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function cancel($id)
    {
        $slot = Appointment::findOrFail($id);

        if ($slot->status == 'reserved') {
            $slot->patient()->dissociate();
            $slot->status = 'available';
            $slot->save();
        } else {
            return redirect(route('backend'))->withErrors(['status'=>'Bereits vom Behandler bestätigte Termine können nicht storniert werden.']);
        }
        return redirect(route('backend'));
    }

    /**
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     * @throws \Exception
     */
    public function createForDay()
    {
        $request = request();
        try {
            $date = Carbon::parse($request->day_date);
            $startTime = Carbon::parse($request->start);
            $endTime = Carbon::parse($request->end);
        } catch (\Exception $e) {
            throw new InvalidArgumentException("Mindestens einer der Datums- / Uhrzeitparameter in der Anforderung ist ungültig.");
        }
        $slotSizeMinutes = 30;

        $currentDateTime = $date->setHours(0)->copy();
        $endDateTime = $date->copy()->addHours($endTime->hour)->addMinutes($endTime->minute);

        if ($endDateTime <= $currentDateTime) {
            throw new \Exception("End datetime {$endDateTime} <= Current datetime {$currentDateTime}");
        }

        $currentDateTime->setHours($startTime->hour);
        $currentDateTime->setMinutes($startTime->minute);

        while ($currentDateTime < $endDateTime->copy()->subMinutes($slotSizeMinutes)) {
            $slot = new Appointment();
            $slot->user()->associate($request->user());
            $slot->start = $currentDateTime;
            $currentDateTime->addMinutes($slotSizeMinutes);
            $slot->end = $currentDateTime;
            $slot->save();
        }

        return redirect('/appointments');
    }
}

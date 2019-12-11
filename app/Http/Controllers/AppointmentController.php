<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AppointmentController extends Controller
{
    public function index()
    {
        $user = auth()->user();

        $availableSlots = $user->appointments()->where('status', 'available');
        $reservedSlots = $user->appointments()->where('status', 'reserved');
        $confirmedSlots = $user->appointments()->whereIn('status', ['reserved', 'confirmed']);



        //return view('backend.slots', ['reservedAndConfirmedSlots' => $reservedAndConfirmedSlots, 'reservedSlots' => $reservedSlots, 'availableSlots' => $availableSlots, 'patients' => Patient::orderBy('lastname')->get(), 'slotStati' => $this->getAllStati()]);
    }
}

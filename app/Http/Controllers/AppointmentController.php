<?php

namespace App\Http\Controllers;

use App\Patient;
use App\User;
use Illuminate\Http\Request;

class AppointmentController extends Controller
{
    public function index()
    {
        User::requirePermission('admin-calendar');

        $user = auth()->user();

        $availableSlots = $user->appointments()->where('status', 'available');

        $reservedSlots = $user->appointments()->where('status', 'reserved');

        $confirmedSlots = $user->appointments()->where('status', 'confirmed');



        return view('backend.appointments', ['confirmedSlots' => $confirmedSlots, 'reservedSlots' => $reservedSlots, 'availableSlots' => $availableSlots]);
    }
}

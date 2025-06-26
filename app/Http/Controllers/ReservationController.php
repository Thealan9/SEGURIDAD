<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reservation;

class ReservationController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'space_id' => 'required|exists:spaces,id',
            'start_time' => 'required|date|after:now',
            'end_time' => 'required|date|after:start_time',
        ]);
        $validated['user_id'] = auth()->id();
        Reservation::create($validated);



        return redirect()->route('spaces.reserve')->with('success', 'Reserva creada exitosamente.');
    }

    public function cancel($id)
    {
        $reservation = Reservation::findOrFail($id);

        if ($reservation->user_id !== auth()->id()) {
            abort(403, 'Unauthorized action.');
        }

        if ($reservation->start_time <= now()) {
            return redirect()->back()->with('error', 'Cannot cancel past or ongoing reservations.');
        }

        $reservation->status = 'cancelled';
        $reservation->save();

        return redirect()->route('reservations.index')->with('success', 'Reservation cancelled successfully.');
    }
}

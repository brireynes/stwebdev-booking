<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Service;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function index()
    {
        $services = Service::all();
        return view('booking.index', compact('services'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'service_id' => 'required|exists:services,id',
            'date' => 'required|date',
            'time' => 'required',
        ]);

        Booking::create([
            'user_id' => auth()->id() ?? 1,
            'service_id' => $validated['service_id'],
            'date' => $validated['date'],
            'time' => $validated['time'],
            'status' => 'pending',
        ]);

        return redirect()
            ->route('bookings.index')
            ->with('success', 'Booking successful!');
    }
}
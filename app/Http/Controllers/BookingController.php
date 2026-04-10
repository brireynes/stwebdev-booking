<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Booking;
use App\Models\Service;

class BookingController extends Controller
{
    public function index()
    {
        $services = Service::all();

        return view('user.booking', compact('services'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'service_id' => 'required',
            'booking_date' => 'required',
            'booking_time' => 'required',
        ]);

        Booking::create([
            'user_id' => 1,
            'service_id' => $request->service_id,
            'booking_date' => $request->booking_date,
            'booking_time' => $request->booking_time,
            'notes' => $request->notes,
        ]);

        return redirect('/booking')->with('success', 'Booking Successful!');
    }
}
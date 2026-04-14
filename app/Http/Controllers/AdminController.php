<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Booking;
use App\Models\Service;

class AdminController extends Controller
{
    public function dashboard()
    {
        return view('admin.dashboard', [
            'totalUsers' => User::count(),
            'totalBookings' => Booking::count(),
            'totalServices' => Service::count(),

            'recentBookings' => Booking::with(['user', 'service'])
                ->latest()
                ->take(5)
                ->get()
        ]);
    }
}

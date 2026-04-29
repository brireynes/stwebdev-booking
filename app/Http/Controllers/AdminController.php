<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Booking;
use App\Models\Service;
use Illuminate\Http\Request;

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

    public function users()
{
    $users = User::latest()->get();

    return view('admin.users', compact('users'));
}

public function deleteUser($id)
{
    $user = User::findOrFail($id);

    // safety: prevent deleting self
    if (auth()->id() == $user->id) {
        return redirect()->back()->with('error', 'You cannot delete your own account.');
    }

    $user->delete();

    return redirect()->back()->with('success', 'User deleted successfully.');
}

 public function bookings()
{
    $bookings = Booking::with(['user', 'service'])
        ->latest()
        ->get();

    return view('admin.bookings', compact('bookings'));
}

public function updateStatus(Request $request, $id)
{
    $request->validate([
        'status' => 'required|in:pending,approved,completed,cancelled'
    ]);

    $booking = Booking::findOrFail($id);
    $booking->status = $request->status;
    $booking->save();

    return redirect()->back()->with('success', 'Booking status updated successfully.');
}

public function services()
{
    $services = Service::latest()->get();

    return view('admin.services.index', compact('services'));
}

public function createService()
{
    return view('admin.services.create');
}

public function storeService(Request $request)
{
    $validated = $request->validate([
        'name' => 'required|string|max:255',
        'description' => 'nullable|string',
        'price' => 'required|numeric|min:0',
        'duration' => 'required|integer|min:1',
        'type' => 'required|in:service,package,promo',
    ]);

    $validated['is_featured'] = $request->has('is_featured');

    Service::create($validated);

    return redirect()
        ->route('admin.services')
        ->with('success', 'Service created successfully.');
}

public function editService(Service $service)
{
    return view('admin.services.edit', compact('service'));
}

public function updateService(Request $request, Service $service)
{
    $validated = $request->validate([
        'name' => 'required|string|max:255',
        'description' => 'nullable|string',
        'price' => 'required|numeric|min:0',
        'duration' => 'required|integer|min:1',
        'type' => 'required|in:service,package,promo',
    ]);

    $validated['is_featured'] = $request->has('is_featured');

    $service->update($validated);

    return redirect()
        ->route('admin.services')
        ->with('success', 'Service updated successfully.');
}

public function deleteService(Service $service)
{
    $service->delete();

    return redirect()
        ->route('admin.services')
        ->with('success', 'Service deleted successfully.');
}
}

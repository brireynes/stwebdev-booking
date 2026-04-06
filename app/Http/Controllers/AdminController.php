<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Display the admin dashboard.
     */
    public function dashboard()
    {
        $totalBookings = Booking::count();
        $pendingBookings = Booking::where('status', 'pending')->count();
        $totalUsers = User::count();

        return view('admin', [
            'title' => 'Admin Dashboard',
            'navType' => 'admin',
            'totalBookings' => $totalBookings,
            'pendingBookings' => $pendingBookings,
            'totalUsers' => $totalUsers,
        ]);
    }

    /**
     * Display all bookings.
     */
    public function bookings(Request $request)
    {
        $query = Booking::with('user');

        // Filter by status if provided
        if ($request->has('status') && $request->status !== 'all') {
            $query->where('status', $request->status);
        }

        // Search by user name or email
        if ($request->has('search') && $request->search) {
            $search = $request->search;
            $query->whereHas('user', function ($q) use ($search) {
                $q->where('name', 'like', "%$search%")
                  ->orWhere('email', 'like', "%$search%");
            });
        }

        $bookings = $query->orderBy('appointment_date', 'desc')->paginate(10);

        return view('admin.bookings', [
            'title' => 'All Bookings',
            'navType' => 'admin',
            'bookings' => $bookings,
            'currentStatus' => $request->status ?? 'all',
            'searchQuery' => $request->search ?? '',
        ]);
    }

    /**
     * Approve a booking.
     */
    public function approveBooking(Booking $booking)
    {
        $booking->update(['status' => 'approved']);

        return redirect()->back()->with('success', 'Booking approved successfully.');
    }

    /**
     * Reject a booking.
     */
    public function rejectBooking(Request $request, Booking $booking)
    {
        $request->validate([
            'rejection_reason' => 'nullable|string|max:500',
        ]);

        $booking->update([
            'status' => 'rejected',
            'notes' => $request->rejection_reason,
        ]);

        return redirect()->back()->with('success', 'Booking rejected successfully.');
    }

    /**
     * Display all users for management.
     */
    public function users(Request $request)
    {
        $query = User::withCount('bookings');

        // Search by name or email
        if ($request->has('search') && $request->search) {
            $search = $request->search;
            $query->where('name', 'like', "%$search%")
                  ->orWhere('email', 'like', "%$search%");
        }

        $users = $query->orderBy('created_at', 'desc')->paginate(10);

        return view('admin.users', [
            'title' => 'User Management',
            'navType' => 'admin',
            'users' => $users,
            'searchQuery' => $request->search ?? '',
        ]);
    }

    /**
     * Delete a user and their bookings.
     */
    public function deleteUser(User $user)
    {
        $user->bookings()->delete();
        $user->delete();

        return redirect()->back()->with('success', 'User and their bookings deleted successfully.');
    }

    /**
     * View user details and bookings.
     */
    public function userDetails(User $user)
    {
        $bookings = $user->bookings()->orderBy('appointment_date', 'desc')->get();

        return view('admin.user-details', [
            'title' => 'User Details',
            'navType' => 'admin',
            'user' => $user,
            'bookings' => $bookings,
        ]);
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    /**
     * Show user profile with bookings
     */
    public function show()
    {
        $user = Auth::user();
        $bookings = $user->bookings()->with('service')->latest()->get();
        
        return view('profile.show', compact('user', 'bookings'));
    }

    /**
     * Show edit profile page
     */
    public function edit()
    {
        $user = Auth::user();
        return view('profile.edit', compact('user'));
    }

    /**
     * Update user profile
     */
    public function update(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email,' . Auth::id(),
        ]);

        Auth::user()->update($validated);

        return redirect()
            ->route('profile.show')
            ->with('success', 'Profile updated successfully!');
    }
}

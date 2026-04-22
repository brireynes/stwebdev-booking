<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    /**
     * Show the admin dashboard
     */
    public function dashboard()
    {
        $admins = User::whereIn('role', ['super_admin', 'admin'])->get();
        return view('admin.dashboard', ['admins' => $admins]);
    }

    /**
     * Show form to create a new admin
     */
    public function createAdminForm()
    {
        // Only super_admin can create admins
        if (auth()->user()->role !== 'super_admin') {
            abort(403, 'Only super admins can create admins');
        }

        return view('admin.create-admin');
    }

    /**
     * Store a new admin
     */
    public function storeAdmin(Request $request)
    {
        // Only super_admin can create admins
        if (auth()->user()->role !== 'super_admin') {
            abort(403, 'Only super admins can create admins');
        }

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6'
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'admin',
        ]);

        return redirect()->route('admin.dashboard')->with('success', 'Admin created successfully!');
    }
}

<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ServiceController;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome', [
        'title' => 'Welcome',
        'description' => 'Please choose whether to register or log in to continue.',
    ]);
})->name('welcome');

Route::get('/register', function () {
    return view('register', [
        'title' => 'User Registration',
        'formAction' => route('register.submit'),
        'submitLabel' => 'Register',
        'fields' => [
            [
                'label' => 'Full Name',
                'name' => 'name',
                'type' => 'text',
                'placeholder' => 'Enter your full name',
            ],
            [
                'label' => 'Email Address',
                'name' => 'email',
                'type' => 'email',
                'placeholder' => 'Enter your email',
            ],
            [
                'label' => 'Contact Number',
                'name' => 'contact',
                'type' => 'text',
                'placeholder' => 'Enter your contact number',
            ],
            [
                'label' => 'Password',
                'name' => 'password',
                'type' => 'password',
                'placeholder' => 'Create a password',
            ],
            [
                'label' => 'Confirm Password',
                'name' => 'password_confirmation',
                'type' => 'password',
                'placeholder' => 'Confirm your password',
            ],
        ],
    ]);
})->name('register');

Route::post('/register', function (Request $request) {
    $data = $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|max:255|unique:users,email',
        'contact' => 'nullable|string|max:255',
        'password' => 'required|string|min:8|confirmed',
    ]);

    $user = User::create([
        'name' => $data['name'],
        'email' => $data['email'],
        'contact' => $data['contact'] ?? null,
        'password' => Hash::make($data['password']),
    ]);

    Auth::login($user);
    $request->session()->regenerate();

    return redirect()->route('user.home');
})->name('register.submit');

Route::get('/login', function () {
    return view('login-choice', [
        'title' => 'Login Selection',
        'description' => 'Choose which type of login you want to use.',
        'options' => [
            [
                'label' => 'User Login',
                'route' => route('user.login'),
            ],
            [
                'label' => 'Admin Login',
                'route' => route('admin.login'),
            ],
        ],
    ]);
})->name('login.choice');

Route::get('/login/user', function () {
    return view('login', [
        'title' => 'User Login',
        'formAction' => route('user.login.submit'),
        'submitLabel' => 'Login as User',
        'fields' => [
            [
                'label' => 'Email Address',
                'name' => 'email',
                'type' => 'email',
                'placeholder' => 'Enter your email',
            ],
            [
                'label' => 'Password',
                'name' => 'password',
                'type' => 'password',
                'placeholder' => 'Enter your password',
            ],
        ],
    ]);
})->name('user.login');

Route::post('/login/user', function (Request $request) {
    $credentials = $request->validate([
        'email' => 'required|email',
        'password' => 'required|string',
    ]);

    if (Auth::attempt($credentials)) {
        $request->session()->regenerate();
        return redirect()->intended(route('user.home'));
    }

    return back()->withErrors(['email' => 'The provided credentials do not match our records.'])->onlyInput('email');
})->name('user.login.submit');

Route::get('/login/admin', function () {
    return view('login', [
        'title' => 'Admin Login',
        'formAction' => route('admin.login.submit'),
        'submitLabel' => 'Login as Admin',
        'fields' => [
            [
                'label' => 'Admin Email',
                'name' => 'email',
                'type' => 'email',
                'placeholder' => 'Enter admin email',
            ],
            [
                'label' => 'Password',
                'name' => 'password',
                'type' => 'password',
                'placeholder' => 'Enter password',
            ],
        ],
    ]);
})->name('admin.login');

Route::post('/login/admin', function (Request $request) {
    $credentials = $request->validate([
        'email' => 'required|email',
        'password' => 'required|string',
    ]);

    if (Auth::attempt($credentials)) {
        $request->session()->regenerate();
        return redirect()->intended(route('admin.dashboard'));
    }

    return back()->withErrors(['email' => 'The provided credentials do not match our records.'])->onlyInput('email');
})->name('admin.login.submit');

Route::get('/home', function () {
    if (!Auth::check()) {
        return redirect()->route('user.login');
    }

    return view('home', [
        'title' => 'User Home',
        'description' => 'Welcome to the user dashboard.',
    ]);
})->name('user.home');

Route::get('/booking', function () {
    if (!Auth::check()) {
        return redirect()->route('user.login');
    }

    $defaultService = request()->query('service', '');

    return view('booking', [
        'title' => 'Booking Page',
        'formAction' => '#',
        'submitLabel' => 'Submit Booking',
        'fields' => [
            [
                'label' => 'Service',
                'name' => 'service',
                'type' => 'text',
                'placeholder' => 'Enter selected service',
                'value' => $defaultService,
            ],
            [
                'label' => 'Appointment Date',
                'name' => 'appointment_date',
                'type' => 'date',
                'placeholder' => '',
            ],
            [
                'label' => 'Appointment Time',
                'name' => 'appointment_time',
                'type' => 'time',
                'placeholder' => '',
            ],
        ],
    ]);
})->name('booking');

Route::get('/profile', function () {
    if (!Auth::check()) {
        return redirect()->route('user.login');
    }

    return view('profile.edit', [
        'title' => 'Edit Profile',
    ]);
})->name('profile.edit');

Route::post('/profile/update', function (Request $request) {
    if (!Auth::check()) {
        return redirect()->route('user.login');
    }

    $data = $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|max:255|unique:users,email,' . Auth::id(),
        'contact' => 'nullable|string|max:255',
    ]);

    Auth::user()->update($data);

    return redirect()->route('profile.edit')->with('status', 'Profile updated successfully.');
})->name('profile.update');

Route::get('/profile/password', function () {
    if (!Auth::check()) {
        return redirect()->route('user.login');
    }

    return view('profile.password', [
        'title' => 'Change Password',
    ]);
})->name('profile.password');

Route::post('/profile/password', function (Request $request) {
    if (!Auth::check()) {
        return redirect()->route('user.login');
    }

    $data = $request->validate([
        'current_password' => 'required|string',
        'password' => 'required|string|min:8|confirmed',
    ]);

    if (!Hash::check($data['current_password'], Auth::user()->password)) {
        return back()->withErrors(['current_password' => 'Your current password is incorrect.']);
    }

    Auth::user()->update(['password' => Hash::make($data['password'])]);

    return redirect()->route('profile.password')->with('status', 'Password changed successfully.');
})->name('profile.password.submit');

Route::get('/profile/bookings', function () {
    if (!Auth::check()) {
        return redirect()->route('user.login');
    }

    return view('profile.history', [
        'title' => 'Booking History',
        'bookings' => Auth::user()->bookings()->latest()->get(),
    ]);
})->name('profile.history');

Route::get('/logout', function (Request $request) {
    Auth::logout();
    $request->session()->invalidate();
    $request->session()->regenerateToken();

    return redirect()->route('welcome');
})->name('logout');

Route::get('/services', [ServiceController::class, 'index'])->name('services');
Route::get('/service/{service}', [ServiceController::class, 'show'])->name('service.show');

Route::get('/admin', function () {
    if (!Auth::check()) {
        return redirect()->route('admin.login');
    }

    return app(AdminController::class)->dashboard();
})->name('admin.dashboard');

// Admin bookings management
Route::get('/admin/bookings', function () {
    if (!Auth::check()) {
        return redirect()->route('admin.login');
    }

    return app(AdminController::class)->bookings();
})->name('admin.bookings');

Route::post('/admin/bookings/{booking}/approve', function ($booking) {
    if (!Auth::check()) {
        return redirect()->route('admin.login');
    }

    return app(AdminController::class)->approveBooking($booking);
})->name('admin.bookings.approve');

Route::post('/admin/bookings/{booking}/reject', function ($booking) {
    if (!Auth::check()) {
        return redirect()->route('admin.login');
    }

    return app(AdminController::class)->rejectBooking($booking);
})->name('admin.bookings.reject');

// Admin user management
Route::get('/admin/users', function () {
    if (!Auth::check()) {
        return redirect()->route('admin.login');
    }

    return app(AdminController::class)->users();
})->name('admin.users');

Route::get('/admin/users/{user}', function ($user) {
    if (!Auth::check()) {
        return redirect()->route('admin.login');
    }

    return app(AdminController::class)->userDetails($user);
})->name('admin.user-details');

Route::delete('/admin/users/{user}', function ($user) {
    if (!Auth::check()) {
        return redirect()->route('admin.login');
    }

    return app(AdminController::class)->deleteUser($user);
})->name('admin.users.delete');

Route::get('/about', function () {
    return view('about', [
        'title' => 'About Us',
        'navType' => 'guest',
    ]);
})->name('about');


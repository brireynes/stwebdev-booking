<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Auth;


// Home
Route::get('/', function () {
    return view('home');
})->name('home');

// Public pages
Route::get('/services', function () {
    return view('services');
})->name('services.index');

Route::get('/packages', function () {
    return view('packages');
})->name('packages.index');

Route::get('/promos', function () {
    return view('promos');
})->name('promos.index');

Route::get('/contact', function () {
    return view('contact');
})->name('contact');

Route::get('/about', function () {
    return view('about');
})->name('about');

Route::get('/login', function () {
    return view('login', [
        'formAction' => url('/login'),
        'fields' => [
            [
                'name' => 'email',
                'label' => 'Email',
                'type' => 'email',
                'placeholder' => 'Enter email'
            ],
            [
                'name' => 'password',
                'label' => 'Password',
                'type' => 'password',
                'placeholder' => 'Enter password'
            ],
        ]
    ]);
});

// Booking
Route::get('/booking', [BookingController::class, 'index'])->name('bookings.index');
Route::post('/booking', [BookingController::class, 'store'])->name('booking.store');

// Admin
use App\Http\Controllers\AdminController;

Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])
    ->middleware(['auth', 'role:admin'])
    ->name('admin.dashboard');

// Auth protected
Route::middleware('auth')->group(function () {
    Route::get('/profile', function () {
        return view('profile.edit');
    })->name('profile.edit');
});


Route::get('/register', [AuthController::class, 'showRegister']);
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', function () {
    Auth::logout();
    request()->session()->invalidate();
    request()->session()->regenerateToken();

    return redirect('/login');
})->name('logout');


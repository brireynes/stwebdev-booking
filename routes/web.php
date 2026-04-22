<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\AuthController;

// Home
Route::get('/', function () {
    return view('home');
})->name('home');

// Public pages
Route::get('/services', [ServiceController::class, 'index'])->name('services.index');
Route::get('/service/{service}', [ServiceController::class, 'show'])->name('services.show');
Route::post('/cart/add', [ServiceController::class, 'addToCart'])->name('cart.add');

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

// Admin - Protected by AdminOnly middleware
Route::middleware(['auth', 'admin.only'])->group(function () {
    Route::get('/admin/dashboard', [\App\Http\Controllers\AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::get('/admin/create-admin', [\App\Http\Controllers\AdminController::class, 'createAdminForm'])->name('admin.create-form');
    Route::post('/admin/create-admin', [\App\Http\Controllers\AdminController::class, 'storeAdmin'])->name('admin.create');
});

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
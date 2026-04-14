<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\ServiceController;

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
    return view('login');
})->name('login');

// Booking
Route::get('/booking', [BookingController::class, 'index'])->name('bookings.index');
Route::post('/booking', [BookingController::class, 'store'])->name('booking.store');

// Admin
Route::get('/admin/dashboard', function () {
    return view('admin.dashboard');
})->name('admin.dashboard');

// Auth protected
Route::middleware('auth')->group(function () {
    Route::get('/profile', function () {
        return view('profile.edit');
    })->name('profile.edit');
});
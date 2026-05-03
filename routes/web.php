<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\AdminController;
use App\Models\Service;
use App\Models\HomepageImage;

// Home
Route::get('/', function () {
    $featuredServices = Service::where('is_featured', true)
        ->latest()
        ->take(3)
        ->get();

    $homepageImages = HomepageImage::all()->keyBy('key');

    return view('home', compact('featuredServices', 'homepageImages'));
})->name('home');

// Public pages
Route::get('/services', [ServiceController::class, 'index'])->name('services.index');

Route::get('/packages', function () {
    return view('packages');
})->name('packages.index');

Route::get('/promos', function () {
    return view('promos');
})->name('promos.index');

Route::get('/contact', [ContactController::class, 'index'])->name('contact');
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');

Route::get('/about', function () {
    return view('about');
})->name('about');

// Auth pages
Route::get('/login', function () {
    return view('login', [
        'formAction' => url('/login'),
        'fields' => [
            [
                'name' => 'email',
                'label' => 'Email',
                'type' => 'email',
                'placeholder' => 'Enter email',
            ],
            [
                'name' => 'password',
                'label' => 'Password',
                'type' => 'password',
                'placeholder' => 'Enter password',
            ],
        ],
    ]);
})->name('login');

Route::get('/register', [AuthController::class, 'showRegister']);
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

Route::post('/logout', function () {
    Auth::logout();
    request()->session()->invalidate();
    request()->session()->regenerateToken();

    return redirect('/login');
})->name('logout');

// Booking
Route::get('/booking', [BookingController::class, 'index'])->name('bookings.index');
Route::get('/booking/{service}', [BookingController::class, 'create'])->name('booking.create');

Route::post('/booking', [BookingController::class, 'store'])
    ->name('booking.store')
    ->middleware('auth');

// Admin dashboard
Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])
    ->middleware(['auth', 'role:admin'])
    ->name('admin.dashboard');

// Admin homepage images
Route::get('/admin/homepage-images', [AdminController::class, 'homepageImages'])
    ->middleware(['auth', 'role:admin'])
    ->name('admin.homepage-images');

Route::put('/admin/homepage-images/{homepageImage}', [AdminController::class, 'updateHomepageImage'])
    ->middleware(['auth', 'role:admin'])
    ->name('admin.homepage-images.update');

// Admin users
Route::get('/admin/users', [AdminController::class, 'users'])
    ->middleware(['auth', 'role:admin'])
    ->name('admin.users');

Route::delete('/admin/users/{id}', [AdminController::class, 'deleteUser'])
    ->middleware(['auth', 'role:admin'])
    ->name('admin.users.delete');

// Admin bookings
Route::get('/admin/bookings', [AdminController::class, 'bookings'])
    ->middleware(['auth', 'role:admin'])
    ->name('admin.bookings');

Route::post('/admin/bookings/{id}/status', [AdminController::class, 'updateStatus'])
    ->middleware(['auth', 'role:admin'])
    ->name('admin.bookings.status');

// Admin services
Route::get('/admin/services', [AdminController::class, 'services'])
    ->middleware(['auth', 'role:admin'])
    ->name('admin.services');

Route::get('/admin/services/create', [AdminController::class, 'createService'])
    ->middleware(['auth', 'role:admin'])
    ->name('admin.services.create');

Route::post('/admin/services', [AdminController::class, 'storeService'])
    ->middleware(['auth', 'role:admin'])
    ->name('admin.services.store');

Route::get('/admin/services/{service}/edit', [AdminController::class, 'editService'])
    ->middleware(['auth', 'role:admin'])
    ->name('admin.services.edit');

Route::put('/admin/services/{service}', [AdminController::class, 'updateService'])
    ->middleware(['auth', 'role:admin'])
    ->name('admin.services.update');

Route::delete('/admin/services/{service}', [AdminController::class, 'deleteService'])
    ->middleware(['auth', 'role:admin'])
    ->name('admin.services.delete');

// Profile
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'show'])->name('profile.show');
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');
});

// Inventory
Route::get('/inventory', [BookingController::class, 'inventory'])
    ->middleware('auth')
    ->name('inventory.index');
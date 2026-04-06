<?php

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
        'formAction' => '#',
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
        'formAction' => route('user.home'),
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

Route::get('/login/admin', function () {
    return view('login', [
        'title' => 'Admin Login',
        'formAction' => route('admin.dashboard'),
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

Route::get('/home', function () {
    return view('home', [
        'title' => 'User Home',
        'description' => 'Welcome to the user dashboard.',
        'navType' => 'user',
    ]);
})->name('user.home');

Route::get('/booking', function () {
    return view('booking', [
        'title' => 'Booking Page',
        'navType' => 'user',
        'formAction' => '#',
        'submitLabel' => 'Submit Booking',
        'fields' => [
            [
                'label' => 'Service',
                'name' => 'service',
                'type' => 'text',
                'placeholder' => 'Enter selected service',
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

Route::get('/admin', function () {
    return view('admin', [
        'title' => 'Admin Dashboard',
        'navType' => 'admin',
        'features' => [
            'View all bookings',
            'Approve or reject appointments',
            'Manage user records',
        ],
    ]);
})->name('admin.dashboard');

Route::get('/about', function () {
    return view('about', [
        'title' => 'About Us',
        'navType' => 'guest',
    ]);
})->name('about');


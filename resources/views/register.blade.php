@extends('layouts.app')

@section('content')

<div class="min-h-screen flex items-center justify-center bg-gray-100">

    <div class="w-full max-w-md bg-white p-8 rounded-2xl shadow-lg border border-yellow-200">

        <!-- Title -->
        <h1 class="text-2xl font-bold text-yellow-600 mb-6 text-center">
            Create Account
        </h1>

        <!-- ✅ SUCCESS MESSAGE -->
       <!-- SUCCESS MESSAGE -->
@if(session('success'))
    <div class="mb-4 p-3 rounded-lg bg-green-100 text-green-700 border border-green-300">
        {{ session('success') }}
    </div>
@endif

<!-- ERROR MESSAGE (from failed login) -->
@if(session('error'))
    <div class="mb-4 p-3 rounded-lg bg-red-100 text-red-700 border border-red-300">
        {{ session('error') }}
    </div>
@endif

<!-- VALIDATION / AUTH ERRORS -->
@if($errors->any())
    <div class="mb-4 p-3 rounded-lg bg-red-100 text-red-700 border border-red-300">
        <ul class="list-disc pl-5">
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
        <!-- VALIDATION ERRORS -->
        @if ($errors->any())
            <div class="mb-4 p-3 rounded-lg bg-red-50 border border-red-200 text-red-600 text-sm">
                <ul class="list-disc pl-5 space-y-1">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <!-- Form -->
        <form method="POST" action="{{ url('/register') }}" class="space-y-4">
            @csrf

            <!-- Name -->
            <div>
                <label class="text-sm text-gray-700">Name</label>
                <input type="text" name="name"
                    value="{{ old('name') }}"
                    placeholder="Enter your name"
                    class="w-full mt-1 p-3 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-yellow-400 focus:border-yellow-400">
            </div>

            <!-- Email -->
            <div>
                <label class="text-sm text-gray-700">Email</label>
                <input type="email" name="email"
                    value="{{ old('email') }}"
                    placeholder="Enter your email"
                    class="w-full mt-1 p-3 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-yellow-400 focus:border-yellow-400">
            </div>

            <!-- Password -->
            <div>
                <label class="text-sm text-gray-700">Password</label>
                <input type="password" name="password"
                    placeholder="Enter your password"
                    class="w-full mt-1 p-3 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-yellow-400 focus:border-yellow-400">
            </div>

            <!-- Button -->
            <button type="submit"
                class="w-full bg-yellow-500 hover:bg-yellow-600 text-white font-semibold py-3 rounded-lg transition">
                Register
            </button>

        </form>

        <!-- Login link -->
        <p class="text-center text-gray-500 text-sm mt-6">
            Already have an account?
            <a href="{{ url('/login') }}"
               class="text-yellow-600 hover:text-yellow-500 font-semibold">
                Login
            </a>
        </p>

    </div>

</div>

@endsection
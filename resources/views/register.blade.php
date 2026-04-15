@extends('layouts.app')

@section('content')

<div class="min-h-screen flex items-center justify-center bg-gray-100">

    <div class="w-full max-w-md bg-white p-8 rounded-2xl shadow-lg border border-yellow-200">

        <!-- Title -->
        <h1 class="text-2xl font-bold text-yellow-600 mb-6 text-center">
            Create Account
        </h1>

        <!-- Form -->
        <form method="POST" action="{{ url('/register') }}" class="space-y-4">
            @csrf

            <!-- Name -->
            <div>
                <label class="text-sm text-gray-700">Name</label>
                <input type="text" name="name"
                    placeholder="Enter your name"
                    class="w-full mt-1 p-3 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-yellow-400 focus:border-yellow-400">
            </div>

            <!-- Email -->
            <div>
                <label class="text-sm text-gray-700">Email</label>
                <input type="email" name="email"
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
@extends('layouts.app')

@section('content')

<div class="min-h-screen flex items-center justify-center bg-stone-900 text-white">

    <div class="w-full max-w-md bg-stone-800 p-8 rounded-2xl shadow-lg">

        <h1 class="text-2xl font-bold text-yellow-500 mb-6 text-center">
            Create Account
        </h1>

        <form method="POST" action="{{ url('/register') }}" class="space-y-4">
            @csrf

            <!-- Name -->
            <div>
                <label class="text-sm text-gray-300">Name</label>
                <input type="text" name="name"
                    placeholder="Enter your name"
                    class="w-full mt-1 p-3 rounded bg-stone-900 border border-gray-700 focus:outline-none focus:ring-2 focus:ring-yellow-500 text-white">
            </div>

            <!-- Email -->
            <div>
                <label class="text-sm text-gray-300">Email</label>
                <input type="email" name="email"
                    placeholder="Enter your email"
                    class="w-full mt-1 p-3 rounded bg-stone-900 border border-gray-700 focus:outline-none focus:ring-2 focus:ring-yellow-500 text-white">
            </div>

            <!-- Password -->
            <div>
                <label class="text-sm text-gray-300">Password</label>
                <input type="password" name="password"
                    placeholder="Enter your password"
                    class="w-full mt-1 p-3 rounded bg-stone-900 border border-gray-700 focus:outline-none focus:ring-2 focus:ring-yellow-500 text-white">
            </div>

            <!-- Button -->
            <button type="submit"
                class="w-full bg-yellow-600 hover:bg-yellow-500 text-black font-semibold py-3 rounded-lg transition">
                Register
            </button>

        </form>

        <!-- Login link -->
        <p class="text-center text-gray-400 text-sm mt-6">
            Already have an account?
            <a href="{{ url('/login') }}"
               class="text-yellow-500 hover:text-yellow-400 font-semibold">
                Login
            </a>
        </p>

    </div>

</div>

@endsection
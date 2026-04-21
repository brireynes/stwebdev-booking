@extends('layouts.app')

@section('content')

<div class="min-h-screen flex items-center justify-center bg-stone-900 text-white">

    <div class="w-full max-w-md bg-stone-800 p-8 rounded-2xl shadow-lg">

        <h1 class="text-2xl font-bold text-yellow-500 mb-6 text-center">
            Login
        </h1>

        <form method="POST" action="{{ url('/login') }}" class="space-y-4">
            @csrf

            <div>
                <label class="text-sm text-gray-300">Email</label>
                <input type="email" name="email"
                    class="w-full mt-1 p-3 rounded bg-stone-900 border border-gray-700 text-white">
            </div>

            <div>
                <label class="text-sm text-gray-300">Password</label>
                <input type="password" name="password"
                    class="w-full mt-1 p-3 rounded bg-stone-900 border border-gray-700 text-white">
            </div>

            <button type="submit"
                class="w-full bg-yellow-600 hover:bg-yellow-500 text-black font-semibold py-3 rounded-lg">
                Login
            </button>

        </form>

        <!-- Register link -->
        <p class="text-center text-gray-400 text-sm mt-6">
            Don't have an account?
            <a href="{{ url('/register') }}"
               class="text-yellow-500 hover:text-yellow-400 font-semibold">
                Register now
            </a>
        </p>

    </div>

</div>

@endsection
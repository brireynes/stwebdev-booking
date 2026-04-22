@extends('layouts.admin')

@section('title', 'Create Admin')

@section('content')

<!-- Header -->
<div class="mb-6">
    <h1 class="text-3xl font-bold">Create Admin Account</h1>
    <p class="text-gray-600">Add a new admin to the system</p>
</div>

<!-- Form -->
<div class="bg-white border rounded-xl p-8 shadow-sm max-w-lg">
    <form action="{{ route('admin.create') }}" method="POST">
        @csrf

        <!-- Name Field -->
        <div class="mb-6">
            <label for="name" class="block text-sm font-medium text-gray-700 mb-2">Full Name</label>
            <input type="text" id="name" name="name" 
                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-black @error('name') border-red-500 @enderror"
                placeholder="Enter admin name"
                value="{{ old('name') }}"
                required>
            @error('name')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <!-- Email Field -->
        <div class="mb-6">
            <label for="email" class="block text-sm font-medium text-gray-700 mb-2">Email Address</label>
            <input type="email" id="email" name="email" 
                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-black @error('email') border-red-500 @enderror"
                placeholder="Enter email address"
                value="{{ old('email') }}"
                required>
            @error('email')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <!-- Password Field -->
        <div class="mb-6">
            <label for="password" class="block text-sm font-medium text-gray-700 mb-2">Password</label>
            <input type="password" id="password" name="password" 
                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-black @error('password') border-red-500 @enderror"
                placeholder="Enter password (min 6 characters)"
                required>
            @error('password')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <!-- Buttons -->
        <div class="flex gap-4">
            <button type="submit" class="flex-1 bg-black text-white px-4 py-2 rounded-lg hover:bg-gray-800 font-medium">
                Create Admin
            </button>
            <a href="{{ route('admin.dashboard') }}" class="flex-1 bg-gray-200 text-gray-800 px-4 py-2 rounded-lg hover:bg-gray-300 font-medium text-center">
                Cancel
            </a>
        </div>
    </form>
</div>

@endsection

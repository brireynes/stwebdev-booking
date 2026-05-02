@extends('layouts.app')

@section('title', 'Edit Profile')

@section('content')
<div class="min-h-screen bg-white">
    <div class="max-w-2xl mx-auto px-6 py-12">
        <!-- Header -->
        <div class="mb-8">
            <h1 class="text-4xl font-bold text-black mb-2">Edit Profile</h1>
            <p class="text-gray-600">Update your personal information</p>
        </div>

        @if($errors->any())
            <div class="mb-6 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded">
                <ul class="list-disc list-inside">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @if(session('success'))
            <div class="mb-6 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded">
                {{ session('success') }}
            </div>
        @endif

        <!-- Form -->
        <form method="POST" action="{{ route('profile.update') }}" class="bg-gray-50 rounded-lg p-8 border border-gray-200">
            @csrf
            @method('PUT')

            <!-- Name Field -->
            <div class="mb-6">
                <label for="name" class="block text-gray-700 font-semibold mb-2">Full Name</label>
                <input 
                    type="text" 
                    id="name" 
                    name="name" 
                    value="{{ old('name', $user->name) }}"
                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:border-yellow-500 focus:ring-2 focus:ring-yellow-200 @error('name') border-red-500 @enderror"
                    required
                >
                @error('name')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Email Field -->
            <div class="mb-6">
                <label for="email" class="block text-gray-700 font-semibold mb-2">Email Address</label>
                <input 
                    type="email" 
                    id="email" 
                    name="email" 
                    value="{{ old('email', $user->email) }}"
                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:border-yellow-500 focus:ring-2 focus:ring-yellow-200 @error('email') border-red-500 @enderror"
                    required
                >
                @error('email')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Info Box -->
            <div class="mb-8 bg-blue-50 border border-blue-200 rounded-lg p-4">
                <p class="text-sm text-blue-800">
                    <span class="font-semibold">Note:</span> To change your password, please contact support or use the password reset feature.
                </p>
            </div>

            <!-- Action Buttons -->
            <div class="flex gap-4">
                <button 
                    type="submit" 
                    class="flex-1 bg-yellow-500 hover:bg-yellow-600 text-black font-semibold py-3 rounded-lg transition"
                >
                    Save Changes
                </button>
                <a 
                    href="{{ route('profile.show') }}" 
                    class="flex-1 bg-gray-300 hover:bg-gray-400 text-black font-semibold py-3 rounded-lg transition text-center"
                >
                    Cancel
                </a>
            </div>
        </form>

        <!-- Danger Zone -->
        <div class="mt-12 pt-8 border-t border-gray-300">
            <h2 class="text-2xl font-bold text-red-600 mb-4">Account Settings</h2>
            <p class="text-gray-600 mb-6">Account created: <span class="font-semibold">{{ $user->created_at->format('F d, Y') }}</span></p>
            
            <details class="bg-red-50 border border-red-200 rounded-lg p-4">
                <summary class="font-semibold text-red-600 cursor-pointer">Account Information</summary>
                <div class="mt-4 text-sm text-gray-700">
                    <p><span class="font-semibold">User ID:</span> {{ $user->id }}</p>
                    <p><span class="font-semibold">Role:</span> {{ ucfirst($user->role) }}</p>
                </div>
            </details>
        </div>

        <!-- Back Link -->
        <div class="mt-8">
            <a href="{{ route('profile.show') }}" class="inline-block text-yellow-600 hover:text-yellow-700 font-semibold">
                ← Back to Profile
            </a>
        </div>
    </div>
</div>
@endsection

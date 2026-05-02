@extends('layouts.app')

@section('title', 'My Profile')

@section('content')
<div class="min-h-screen bg-white">
    <div class="max-w-4xl mx-auto px-6 py-12">
        <!-- Header Section -->
        <div class="mb-8">
            <div class="flex items-center justify-between mb-6">
                <h1 class="text-4xl font-bold text-black">My Profile</h1>
                <a href="{{ route('profile.edit') }}" class="bg-yellow-500 hover:bg-yellow-600 text-black px-6 py-2 rounded-lg font-semibold transition">
                    Edit Profile
                </a>
            </div>

            <!-- User Info Card -->
            <div class="bg-gray-100 rounded-lg p-6 border-l-4 border-yellow-500">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <p class="text-gray-600 text-sm font-semibold mb-1">Full Name</p>
                        <p class="text-2xl text-black font-bold">{{ $user->name }}</p>
                    </div>
                    <div>
                        <p class="text-gray-600 text-sm font-semibold mb-1">Email</p>
                        <p class="text-xl text-black">{{ $user->email }}</p>
                    </div>
                    <div>
                        <p class="text-gray-600 text-sm font-semibold mb-1">Member Since</p>
                        <p class="text-black">{{ $user->created_at->format('F d, Y') }}</p>
                    </div>
                    <div>
                        <p class="text-gray-600 text-sm font-semibold mb-1">Account Type</p>
                        <p class="text-black capitalize">{{ $user->role }}</p>
                    </div>
                </div>
            </div>
        </div>

        @if(session('success'))
            <div class="mb-6 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded">
                {{ session('success') }}
            </div>
        @endif

        <!-- Bookings Section -->
        <div class="mt-12">
            <h2 class="text-3xl font-bold text-black mb-6">My Bookings</h2>

            @if($bookings->isEmpty())
                <div class="text-center py-12 bg-gray-50 rounded-lg">
                    <span class="material-symbols-outlined text-6xl text-gray-400 block mb-4">event_note</span>
                    <p class="text-gray-600 text-lg mb-4">You haven't made any bookings yet.</p>
                    <a href="{{ route('services.index') }}" class="inline-block bg-yellow-500 hover:bg-yellow-600 text-black px-6 py-2 rounded-lg font-semibold transition">
                        Browse Services
                    </a>
                </div>
            @else
                <div class="grid grid-cols-1 gap-4">
                    @foreach($bookings as $booking)
                        <div class="bg-white border border-gray-200 rounded-lg p-6 hover:shadow-lg transition">
                            <div class="grid grid-cols-1 md:grid-cols-4 gap-4 items-center">
                                <!-- Service Info -->
                                <div class="md:col-span-1">
                                    <p class="text-gray-600 text-sm font-semibold mb-1">Service</p>
                                    <p class="text-black font-semibold">{{ $booking->service->name ?? 'N/A' }}</p>
                                </div>

                                <!-- Date -->
                                <div>
                                    <p class="text-gray-600 text-sm font-semibold mb-1">Date</p>
                                    <p class="text-black">{{ \Carbon\Carbon::parse($booking->date)->format('M d, Y') }}</p>
                                </div>

                                <!-- Time -->
                                <div>
                                    <p class="text-gray-600 text-sm font-semibold mb-1">Time</p>
                                    <p class="text-black">{{ $booking->time }}</p>
                                </div>

                                <!-- Status -->
                                <div class="flex items-end h-full">
                                    <span class="inline-block px-4 py-2 rounded-full text-sm font-semibold
                                        @if($booking->status === 'pending')
                                            bg-yellow-100 text-yellow-800
                                        @elseif($booking->status === 'confirmed')
                                            bg-green-100 text-green-800
                                        @elseif($booking->status === 'completed')
                                            bg-blue-100 text-blue-800
                                        @elseif($booking->status === 'cancelled')
                                            bg-red-100 text-red-800
                                        @else
                                            bg-gray-100 text-gray-800
                                        @endif
                                    ">
                                        {{ ucfirst($booking->status) }}
                                    </span>
                                </div>
                            </div>

                            <!-- Service Price & Description -->
                            @if($booking->service)
                                <div class="mt-4 pt-4 border-t border-gray-200">
                                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                        <div>
                                            <p class="text-gray-600 text-sm font-semibold mb-1">Price</p>
                                            <p class="text-lg text-yellow-600 font-bold">${{ number_format($booking->service->price, 2) }}</p>
                                        </div>
                                        @if($booking->service->description)
                                            <div>
                                                <p class="text-gray-600 text-sm font-semibold mb-1">Description</p>
                                                <p class="text-gray-700 text-sm">{{ Str::limit($booking->service->description, 100) }}</p>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            @endif

                            <!-- Booking Date -->
                            <div class="mt-4 pt-4 border-t border-gray-200">
                                <p class="text-gray-500 text-xs">Booked on {{ $booking->created_at->format('F d, Y \a\t g:i A') }}</p>
                            </div>
                        </div>
                    @endforeach
                </div>

                <!-- Summary Stats -->
                <div class="mt-8 grid grid-cols-1 md:grid-cols-4 gap-4">
                    <div class="bg-blue-50 rounded-lg p-4 border-l-4 border-blue-500">
                        <p class="text-gray-600 text-sm font-semibold">Total Bookings</p>
                        <p class="text-3xl font-bold text-blue-600">{{ $bookings->count() }}</p>
                    </div>

                    <div class="bg-yellow-50 rounded-lg p-4 border-l-4 border-yellow-500">
                        <p class="text-gray-600 text-sm font-semibold">Pending</p>
                        <p class="text-3xl font-bold text-yellow-600">{{ $bookings->where('status', 'pending')->count() }}</p>
                    </div>

                    <div class="bg-green-50 rounded-lg p-4 border-l-4 border-green-500">
                        <p class="text-gray-600 text-sm font-semibold">Confirmed</p>
                        <p class="text-3xl font-bold text-green-600">{{ $bookings->where('status', 'confirmed')->count() }}</p>
                    </div>

                    <div class="bg-red-50 rounded-lg p-4 border-l-4 border-red-500">
                        <p class="text-gray-600 text-sm font-semibold">Cancelled</p>
                        <p class="text-3xl font-bold text-red-600">{{ $bookings->where('status', 'cancelled')->count() }}</p>
                    </div>
                </div>
            @endif
        </div>

        <!-- Back Button -->
        <div class="mt-12">
            <a href="{{ route('home') }}" class="inline-block text-yellow-600 hover:text-yellow-700 font-semibold">
                ← Back to Home
            </a>
        </div>
    </div>
</div>
@endsection

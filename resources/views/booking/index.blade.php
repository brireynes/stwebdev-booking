@extends('layouts.app')

@section('content')

<div class="bg-white min-h-screen py-10 relative">

    <div class="max-w-7xl mx-auto px-6">

        <!-- Title -->
        <div class="mb-10 text-center">
            <h1 class="text-4xl font-bold text-black italic">
                Book an Appointment
            </h1>
        </div>

        <!-- Success Message -->
        @if(session('success'))
            <div class="bg-green-100 text-green-700 p-4 mb-6 rounded">
                {{ session('success') }}
            </div>
        @endif

        <!-- Validation Errors -->
        @if ($errors->any())
            <div class="bg-red-100 text-red-700 p-4 mb-6 rounded">
                <ul class="list-disc pl-5 space-y-1">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-10">

            <!-- Booking Form -->
            <div class="lg:col-span-2 bg-white p-8 shadow border
                {{ !auth()->check() ? 'opacity-50 pointer-events-none' : '' }}">

                <form action="{{ route('booking.store') }}" method="POST" class="space-y-8">
                    @csrf

                    <!-- Service Selection -->
                    <div>
                        <h2 class="text-lg font-semibold text-yellow-600 mb-4">
                            Service Selection
                        </h2>

                        <label for="service_id" class="block mb-2 text-black">
                            Choose Service
                        </label>

                        <select name="service_id"
                                id="service_id"
                                class="w-full border p-3 rounded text-black"
                                required>

                            <option value="" disabled selected>
                                Select a service
                            </option>

                            @foreach($services as $s)
                                <option value="{{ $s->id }}"
                                    {{ (isset($service) && $service->id == $s->id) ? 'selected' : '' }}>
                                    {{ $s->name }} - ₱{{ $s->price }}
                                </option>
                            @endforeach

                        </select>
                    </div>

                    <!-- Schedule -->
                    <div>
                        <h2 class="text-lg font-semibold text-yellow-600 mb-4">
                            Schedule
                        </h2>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 text-black">
                            <div>
                                <label class="block mb-2">Date</label>
                                <input type="date" name="date"
                                       value="{{ old('date') }}"
                                       class="w-full border p-3 rounded"
                                       required>
                            </div>

                            <div>
                                <label class="block mb-2">Time</label>
                                <input type="time" name="time"
                                       value="{{ old('time') }}"
                                       class="w-full border p-3 rounded"
                                       required>
                            </div>
                        </div>
                    </div>

                    <!-- Submit -->
                    <div class="pt-4">
                        <button type="submit"
                                class="bg-yellow-600 text-white px-8 py-3 rounded font-semibold">
                            Book Appointment
                        </button>
                    </div>

                </form>

            </div>

            <!-- Side Info -->
            <div class="bg-gray-50 p-8 border space-y-6">

                <div>
                    <h3 class="text-lg font-semibold text-yellow-600">
                        Bong's Salon
                    </h3>
                    <p class="text-gray-700 mt-2">
                        Premium salon experience for students, professionals, and walk-in customers.
                    </p>
                </div>

                <div>
                    <h4 class="font-semibold">Address</h4>
                    <p class="text-gray-600">Main Street, Philippines</p>
                </div>

                <div>
                    <h4 class="font-semibold">Business Hours</h4>
                    <p class="text-gray-600">Mon - Fri: 9AM - 8PM</p>
                    <p class="text-gray-600">Sat - Sun: 10AM - 6PM</p>
                </div>

                <div>
                    <h4 class="font-semibold">Contact</h4>
                    <p class="text-gray-600">0912-345-6789</p>
                </div>

            </div>

        </div>
    </div>

    <!-- LOGIN OVERLAY -->
    @if(!auth()->check())
        <div class="fixed inset-0 bg-black/60 backdrop-blur-sm flex items-center justify-center z-50">

            <div class="bg-white p-8 rounded-2xl shadow-lg max-w-md text-center space-y-4">

                <h2 class="text-2xl font-bold text-black">
                    Login Required
                </h2>

                <p class="text-gray-600">
                    You need to log in before booking an appointment.
                </p>

                <a href="{{ route('login') }}"
                   class="inline-block bg-yellow-600 text-white px-6 py-3 rounded font-semibold">
                    Go to Login
                </a>

            </div>

        </div>
    @endif

</div>

@endsection
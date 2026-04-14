@extends('layouts.app')

@section('content')

<div class="bg-white min-h-screen py-10">
    <div class="max-w-7xl mx-auto px-6">

        <!-- Title -->
        <div class="mb-10 text-center">
            <h1 class="text-4xl font-bold text-black italic">
                Book an Appointment
            </h1>

            <p class="text-gray-600 mt-3">
                Schedule your salon service quickly and easily
            </p>
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
            <div class="lg:col-span-2 bg-white p-8 shadow border">

                <form action="{{ route('booking.store') }}" method="POST" class="space-y-8">
                    @csrf

                    <!-- Service Selection -->
                    <div>
                        <h2 class="text-lg font-semibold text-yellow-600 mb-4">
                            Service Selection
                        </h2>

                        <label for="service_id" class="block mb-2">Choose Service</label>

                        <select
                            name="service_id"
                            id="service_id"
                            class="w-full border p-3 rounded"
                            required
                        >
                            <option value="" disabled {{ old('service_id') ? '' : 'selected' }}>
                                Select a service
                            </option>
                            

                            @foreach($services as $service)
                                <option value="{{ $service->id }}" {{ old('service_id') == $service->id ? 'selected' : '' }}>
                                    {{ $service->name }} - ₱{{ $service->price }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Schedule -->
                    <div>
                        <h2 class="text-lg font-semibold text-yellow-600 mb-4">
                            Schedule
                        </h2>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label for="date" class="block mb-2">Date</label>
                                <input
                                    type="date"
                                    name="date"
                                    id="date"
                                    value="{{ old('date') }}"
                                    class="w-full border p-3 rounded"
                                    required
                                >
                            </div>

                            <div>
                                <label for="time" class="block mb-2">Time</label>
                                <input
                                    type="time"
                                    name="time"
                                    id="time"
                                    value="{{ old('time') }}"
                                    class="w-full border p-3 rounded"
                                    required
                                >
                            </div>
                        </div>
                    </div>

                    <!-- Submit -->
                    <div class="pt-4">
                        <button
                            type="submit"
                            class="bg-yellow-600 text-white px-8 py-3 rounded font-semibold"
                        >
                            Book Appointment
                        </button>
                    </div>
                </form>

            </div>

            <!-- Side Information -->
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
                    <p class="text-gray-600">
                        Bong's Salon, Main Street, Philippines
                    </p>
                </div>

                <div>
                    <h4 class="font-semibold">Business Hours</h4>
                    <p class="text-gray-600">
                        Mon - Fri: 9AM - 8PM
                    </p>
                    <p class="text-gray-600">
                        Sat - Sun: 10AM - 6PM
                    </p>
                </div>

                <div>
                    <h4 class="font-semibold">Contact</h4>
                    <p class="text-gray-600">
                        0912-345-6789
                    </p>
                </div>

                <div class="bg-yellow-100 p-4 rounded">
                    <p class="text-sm text-gray-700">
                        Please arrive 10 minutes before your appointment.
                    </p>
                </div>
            </div>

        </div>
    </div>
</div>

@endsection
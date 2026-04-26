@extends('layouts.app')

@section('content')
<div class="max-w-6xl mx-auto px-6 py-10">

    <!-- Header -->
    <div class="mb-8">
        <h1 class="text-4xl font-bold text-gray-900">My Bookings</h1>
        <p class="text-gray-500 mt-2">Track all your booked salon services</p>
    </div>

    @if($bookings->isEmpty())
        <div class="bg-white border rounded-xl p-8 text-center shadow-sm">
            <p class="text-gray-500">You have no booked services yet.</p>
        </div>
    @else

        <div class="grid gap-5">

            @foreach($bookings as $booking)

                @php
                    $status = strtolower($booking->status);
                @endphp

                <div class="bg-white border rounded-2xl shadow-sm p-6 flex flex-col md:flex-row md:items-center md:justify-between hover:shadow-md transition">

                    <!-- Left Info -->
                    <div>
                        <h2 class="text-xl font-semibold text-gray-900">
                            {{ $booking->service->name }}
                        </h2>

                        <div class="text-gray-600 mt-2 space-y-1 text-sm">
                            <p><span class="font-medium">Date:</span> {{ $booking->date }}</p>
                            <p><span class="font-medium">Time:</span> {{ $booking->time }}</p>
                        </div>
                    </div>

                    <!-- Right Status -->
                    <div class="mt-4 md:mt-0">

                        <span class="px-4 py-2 rounded-full text-sm font-semibold text-white
                            
                            @if($status === 'completed' || $status === 'done')
                                bg-green-600
                            @elseif($status === 'confirmed')
                                bg-blue-500
                            @elseif($status === 'pending')
                                bg-yellow-500 text-black
                            @elseif($status === 'processing')
                                bg-orange-500
                            @elseif($status === 'cancelled')
                                bg-red-600
                            @else
                                bg-gray-500
                            @endif
                        ">
                            {{ ucfirst($booking->status) }}
                        </span>

                    </div>

                </div>

            @endforeach

        </div>

    @endif

</div>
@endsection
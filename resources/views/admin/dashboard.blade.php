@extends('layouts.admin')

@section('title', 'Dashboard')

@section('content')

<!-- Header -->
<div class="mb-6">
    <h1 class="text-3xl font-bold">Dashboard Overview</h1>
    <p class="text-gray-600">Welcome to Bong's Salon Admin Panel</p>
</div>

<!-- Stats -->
<div class="grid md:grid-cols-3 gap-6 mb-8">

    <div class="bg-white border p-6 rounded-xl shadow-sm">
        <h2 class="text-sm text-gray-500">Total Users</h2>
        <p class="text-3xl font-bold text-black mt-2">
            0 <!-- backend: User::count() -->
        </p>
    </div>

    <div class="bg-white border p-6 rounded-xl shadow-sm">
        <h2 class="text-sm text-gray-500">Total Bookings</h2>
        <p class="text-3xl font-bold text-black mt-2">
            0 <!-- backend: Booking::count() -->
        </p>
    </div>

    <div class="bg-white border p-6 rounded-xl shadow-sm">
        <h2 class="text-sm text-gray-500">Total Services</h2>
        <p class="text-3xl font-bold text-black mt-2">
            0 <!-- backend: Service::count() -->
        </p>
    </div>

</div>

<!-- Overview -->
<div class="bg-white border rounded-xl p-6 shadow-sm mb-6">
    <h2 class="text-xl font-semibold mb-4">
        Dashboard Overview
    </h2>

    <p class="text-gray-600 leading-relaxed">
        This dashboard provides a quick overview of your salon system.
        You can monitor total users, track bookings, and manage services efficiently.
        Use the sidebar to navigate through different sections such as bookings, services, and users.
    </p>
</div>

<!-- Recent Bookings -->
<div class="bg-white border rounded-xl p-6 shadow-sm mb-6">

    <h2 class="text-xl font-semibold mb-4">
        Recent Bookings
    </h2>

    <div class="overflow-x-auto">
        <table class="w-full text-sm text-left">

            <thead class="text-gray-500 border-b">
                <tr>
                    <th class="py-3 px-2">User</th>
                    <th class="py-3 px-2">Service</th>
                    <th class="py-3 px-2">Date</th>
                    <th class="py-3 px-2">Time</th>
                    <th class="py-3 px-2">Status</th>
                </tr>
            </thead>

            <tbody class="text-gray-700">

                {{-- foreach($recentBookings as $booking) --}}

                <tr class="border-b hover:bg-gray-50">

                    <td class="py-3 px-2">
                        John Doe <!-- backend: $booking->user->name -->
                    </td>

                    <td class="py-3 px-2">
                        Haircut <!-- backend: $booking->service->name -->
                    </td>

                    <td class="py-3 px-2">
                        2026-04-13 <!-- backend: $booking->date -->
                    </td>

                    <td class="py-3 px-2">
                        10:00 AM <!-- backend: $booking->time -->
                    </td>

                    <td class="py-3 px-2">
                        <span class="px-3 py-1 rounded-full text-xs bg-yellow-100 text-yellow-700">
                            Pending <!-- backend: $booking->status -->
                        </span>
                    </td>

                </tr>

                {{-- endforeach --}}

            </tbody>

        </table>
    </div>

</div>

@endsection
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

    <!-- Users -->
    <div class="bg-white border p-6 rounded-xl shadow-sm">
        <h2 class="text-sm text-gray-500">Total Users</h2>
        <p class="text-3xl font-bold text-black mt-2">
            {{ $totalUsers }}
        </p>
    </div>

    <!-- Bookings -->
    <div class="bg-white border p-6 rounded-xl shadow-sm">
        <h2 class="text-sm text-gray-500">Total Bookings</h2>
        <p class="text-3xl font-bold text-black mt-2">
            {{ $totalBookings }}
        </p>
    </div>

    <!-- Services -->
    <div class="bg-white border p-6 rounded-xl shadow-sm">
        <h2 class="text-sm text-gray-500">Total Services</h2>
        <p class="text-3xl font-bold text-black mt-2">
            {{ $totalServices }}
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
        Use the sidebar to navigate through bookings, services, and users.
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

                @forelse($recentBookings as $booking)

                    <tr class="border-b hover:bg-gray-50">

                        <!-- User -->
                        <td class="py-3 px-2">
                            {{ $booking->user->name ?? 'Unknown User' }}
                        </td>

                        <!-- Service -->
                        <td class="py-3 px-2">
                            {{ $booking->service->name ?? 'Unknown Service' }}
                        </td>

                        <!-- Date -->
                        <td class="py-3 px-2">
                            {{ $booking->date }}
                        </td>

                        <!-- Time -->
                        <td class="py-3 px-2">
                            {{ $booking->time }}
                        </td>

                        <!-- Status -->
                        <td class="py-3 px-2">
                            <span class="px-3 py-1 rounded-full text-xs
                                {{ $booking->status === 'pending' ? 'bg-yellow-100 text-yellow-700' : '' }}
                                {{ $booking->status === 'approved' ? 'bg-green-100 text-green-700' : '' }}
                                {{ $booking->status === 'cancelled' ? 'bg-red-100 text-red-700' : '' }}
                            ">
                                {{ ucfirst($booking->status) }}
                            </span>
                        </td>

                    </tr>

                @empty

                    <tr>
                        <td colspan="5" class="text-center py-6 text-gray-500">
                            No bookings found
                        </td>
                    </tr>

                @endforelse

            </tbody>

        </table>

    </div>

</div>

@endsection
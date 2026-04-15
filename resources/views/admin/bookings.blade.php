@extends('layouts.admin')

@section('content')

<h1 class="text-2xl font-bold mb-6">Bookings</h1>

<div class="bg-white shadow border rounded-lg overflow-hidden">

    <table class="w-full text-left">
        <thead class="bg-gray-100">
            <tr>
                <th class="p-3">ID</th>
                <th class="p-3">Customer</th>
                <th class="p-3">Service</th>
                <th class="p-3">Date</th>
                <th class="p-3">Time</th>
                <th class="p-3">Status</th>
            </tr>
        </thead>

        <tbody>
            @foreach($bookings as $booking)
                <tr class="border-t">
                    <td class="p-3">{{ $booking->id }}</td>

                    <td class="p-3">
                        {{ $booking->user->name ?? 'N/A' }}
                    </td>

                    <td class="p-3">
                        {{ $booking->service->name ?? 'N/A' }}
                    </td>

                    <td class="p-3">{{ $booking->date }}</td>

                    <td class="p-3">{{ $booking->time }}</td>

                    <td class="p-3">
    <form action="{{ route('admin.bookings.status', $booking->id) }}" method="POST">
        @csrf

        <select name="status"
            onchange="this.form.submit()"
            class="border rounded px-2 py-1 text-sm
                {{ $booking->status == 'pending' ? 'bg-yellow-100' : '' }}
                {{ $booking->status == 'approved' ? 'bg-blue-100' : '' }}
                {{ $booking->status == 'completed' ? 'bg-green-100' : '' }}
                {{ $booking->status == 'cancelled' ? 'bg-red-100' : '' }}">
            
            <option value="pending" {{ $booking->status == 'pending' ? 'selected' : '' }}>
                Pending
            </option>

            <option value="approved" {{ $booking->status == 'approved' ? 'selected' : '' }}>
                Approved
            </option>

            <option value="completed" {{ $booking->status == 'completed' ? 'selected' : '' }}>
                Completed
            </option>

            <option value="cancelled" {{ $booking->status == 'cancelled' ? 'selected' : '' }}>
                Cancelled
            </option>
        </select>
    </form>
</td>

                   
                </tr>
            @endforeach
        </tbody>

    </table>

</div>

@endsection
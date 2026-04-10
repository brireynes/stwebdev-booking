@extends('layouts.app')

@section('content')

<div style="width: 600px; margin: auto; padding: 20px;">

    <h2>Book Appointment</h2>

    <form action="{{ route('booking.store') }}" method="POST">

        @csrf

        <div style="margin-bottom: 15px;">
            <label>Service</label>
            <select name="service_id" required>

                <option value="">Select Service</option>

                @foreach($services as $service)
                    <option value="{{ $service->id }}">
                        {{ $service->name }} - ₱{{ $service->price }}
                    </option>
                @endforeach

            </select>
        </div>

        <div style="margin-bottom: 15px;">
            <label>Date</label>
            <input type="date" name="booking_date" required>
        </div>

        <div style="margin-bottom: 15px;">
            <label>Time</label>
            <input type="time" name="booking_time" required>
        </div>

        <div style="margin-bottom: 15px;">
            <label>Notes (Optional)</label>
            <textarea name="notes"></textarea>
        </div>

        <button type="submit">
            Confirm Booking
        </button>

    </form>

</div>

@endsection
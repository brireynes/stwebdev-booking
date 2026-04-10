@extends('layouts.app')

@section('content')
    <section class="page-header-section">
        <div class="page-header-inner">
            <div>
                <h1>Booking History</h1>
                <p>Review your past and upcoming bookings in one place.</p>
            </div>
        </div>
    </section>

    <section class="package-section">
        <div class="package-card">
            <h3>Your bookings</h3>
            <div style="margin-top: 16px;">
                @forelse ($bookings as $booking)
                    <div style="margin-bottom: 16px; padding: 18px; background: #f8fafc; border-radius: 16px;">
                        <strong>{{ $booking->service }}</strong>
                        <p style="margin: 6px 0 0; color: #4b5563;">{{ $booking->appointment_date->format('Y-m-d') }} · {{ ucfirst($booking->status) }}</p>
                    </div>
                @empty
                    <p>No booking history is available yet.</p>
                @endforelse
            </div>
        </div>
    </section>
@endsection
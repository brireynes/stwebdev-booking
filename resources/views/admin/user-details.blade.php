@extends('layouts.app')

@section('content')
<div class="admin-container">
    <div class="page-header">
        <h1>{{ $title }}</h1>
        <a href="{{ route('admin.users') }}" class="btn-back">← Back to Users</a>
    </div>

    <!-- User Information -->
    <div class="user-info-card">
        <div class="user-header">
            <div>
                <h2>{{ $user->name }}</h2>
                <p class="user-email">{{ $user->email }}</p>
            </div>
            <form action="{{ route('admin.users.delete', $user) }}" method="POST" style="display: inline;"
                  onsubmit="return confirm('Are you sure you want to delete this user and all their bookings?');">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn-delete-user">Delete User</button>
            </form>
        </div>

        <div class="user-meta">
            <div class="meta-item">
                <span class="meta-label">Member Since:</span>
                <span class="meta-value">{{ $user->created_at->format('M d, Y') }}</span>
            </div>
            <div class="meta-item">
                <span class="meta-label">Total Bookings:</span>
                <span class="meta-value">{{ $bookings->count() }}</span>
            </div>
            <div class="meta-item">
                <span class="meta-label">Account Status:</span>
                <span class="meta-value status-active">Active</span>
            </div>
        </div>
    </div>

    <!-- User Bookings -->
    <div class="bookings-section">
        <h3>User Bookings</h3>

        @if ($bookings->count() > 0)
            <div class="bookings-list">
                @foreach ($bookings as $booking)
                    <div class="booking-item status-{{ $booking->status }}">
                        <div class="booking-info">
                            <div class="booking-service">
                                <strong>Service:</strong> {{ $booking->service }}
                            </div>
                            <div class="booking-date">
                                <strong>Date & Time:</strong> 
                                {{ $booking->appointment_date->format('M d, Y') }} at {{ $booking->appointment_time }}
                            </div>
                            @if ($booking->notes)
                                <div class="booking-notes">
                                    <strong>Notes:</strong> {{ $booking->notes }}
                                </div>
                            @endif
                        </div>
                        <div class="booking-status">
                            <span class="status-badge status-{{ $booking->status }}">
                                {{ ucfirst($booking->status) }}
                            </span>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <div class="empty-bookings">
                <p>This user has no bookings yet.</p>
            </div>
        @endif
    </div>
</div>

<style>
    .admin-container {
        max-width: 900px;
        margin: 0 auto;
    }

    .page-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 30px;
    }

    .btn-back {
        background: #f0f0f0;
        color: #333;
        padding: 8px 16px;
        border-radius: 4px;
        text-decoration: none;
        font-size: 0.9rem;
        transition: background 0.2s;
    }

    .btn-back:hover {
        background: #e0e0e0;
    }

    .user-info-card {
        background: #fff;
        border-radius: 8px;
        box-shadow: 0 2px 8px rgba(0,0,0,0.1);
        padding: 30px;
        margin-bottom: 30px;
    }

    .user-header {
        display: flex;
        justify-content: space-between;
        align-items: flex-start;
        margin-bottom: 20px;
        padding-bottom: 20px;
        border-bottom: 1px solid #e0e0e0;
    }

    .user-header h2 {
        margin: 0 0 8px 0;
        color: #222;
        font-size: 1.8rem;
    }

    .user-email {
        color: #666;
        margin: 0;
        font-size: 1.05rem;
    }

    .btn-delete-user {
        background: #c62828;
        color: #fff;
        border: none;
        padding: 10px 18px;
        border-radius: 4px;
        cursor: pointer;
        font-weight: 600;
        font-size: 0.9rem;
        transition: background 0.2s;
    }

    .btn-delete-user:hover {
        background: #b71c1c;
    }

    .user-meta {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
        gap: 20px;
    }

    .meta-item {
        display: flex;
        flex-direction: column;
        gap: 6px;
    }

    .meta-label {
        color: #666;
        font-size: 0.9rem;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }

    .meta-value {
        color: #222;
        font-weight: 600;
        font-size: 1.1rem;
    }

    .status-active {
        display: inline-block;
        background: #e8f5e9;
        color: #2e7d32;
        padding: 4px 12px;
        border-radius: 12px;
    }

    .bookings-section {
        background: #fff;
        border-radius: 8px;
        box-shadow: 0 2px 8px rgba(0,0,0,0.1);
        padding: 30px;
    }

    .bookings-section h3 {
        margin-top: 0;
        color: #222;
        font-size: 1.4rem;
    }

    .bookings-list {
        display: flex;
        flex-direction: column;
        gap: 16px;
    }

    .booking-item {
        border: 1px solid #e0e0e0;
        border-left: 4px solid #999;
        padding: 16px;
        border-radius: 4px;
        display: flex;
        justify-content: space-between;
        align-items: flex-start;
        transition: all 0.2s;
    }

    .booking-item:hover {
        box-shadow: 0 2px 8px rgba(0,0,0,0.08);
    }

    .booking-item.status-pending {
        border-left-color: #ffc107;
        background: rgba(255, 193, 7, 0.05);
    }

    .booking-item.status-approved {
        border-left-color: #28a745;
        background: rgba(40, 167, 69, 0.05);
    }

    .booking-item.status-rejected {
        border-left-color: #dc3545;
        background: rgba(220, 53, 69, 0.05);
    }

    .booking-info {
        flex: 1;
        display: flex;
        flex-direction: column;
        gap: 8px;
    }

    .booking-service,
    .booking-date,
    .booking-notes {
        color: #333;
    }

    .booking-service strong,
    .booking-date strong,
    .booking-notes strong {
        color: #666;
        margin-right: 6px;
    }

    .booking-status {
        margin-left: 20px;
    }

    .status-badge {
        display: inline-block;
        padding: 6px 12px;
        border-radius: 20px;
        font-size: 0.85rem;
        font-weight: 600;
        text-align: center;
    }

    .status-pending {
        background: #fff3cd;
        color: #856404;
    }

    .status-approved {
        background: #e8f5e9;
        color: #2e7d32;
    }

    .status-rejected {
        background: #ffebee;
        color: #c62828;
    }

    .empty-bookings {
        padding: 40px 20px;
        text-align: center;
        color: #999;
    }

    h1 {
        color: #222;
        margin: 0;
    }
</style>
@endsection

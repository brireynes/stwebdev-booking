@extends('layouts.app')

@section('content')
<div class="admin-container">
    <h1>{{ $title }}</h1>
    <p style="color: #666; margin-bottom: 30px;">Welcome to the admin dashboard. Manage bookings and users below.</p>

    <!-- Dashboard Stats -->
    <div class="stats-grid">
        <div class="stat-card">
            <h3>Total Bookings</h3>
            <p class="stat-number">{{ $totalBookings }}</p>
        </div>
        <div class="stat-card">
            <h3>Pending Bookings</h3>
            <p class="stat-number">{{ $pendingBookings }}</p>
        </div>
        <div class="stat-card">
            <h3>Total Users</h3>
            <p class="stat-number">{{ $totalUsers }}</p>
        </div>
    </div>

    <!-- Admin Features -->
    <div class="admin-features" style="margin-top: 40px;">
        <h2>Quick Access</h2>
        <div class="feature-cards">
            <a href="{{ route('admin.bookings') }}" class="feature-card">
                <h3>📅 View All Bookings</h3>
                <p>View, approve, and reject all customer appointments</p>
                <span class="badge">{{ $pendingBookings }} Pending</span>
            </a>

            <a href="{{ route('admin.users') }}" class="feature-card">
                <h3>👥 Manage Users</h3>
                <p>View user records and manage customer accounts</p>
                <span class="badge">{{ $totalUsers }} Users</span>
            </a>
        </div>
    </div>
</div>

<style>
    .admin-container {
        max-width: 1200px;
        margin: 0 auto;
    }

    .stats-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
        gap: 20px;
        margin-bottom: 40px;
    }

    .stat-card {
        background: #fff;
        padding: 24px;
        border-radius: 8px;
        box-shadow: 0 2px 8px rgba(0,0,0,0.1);
        text-align: center;
    }

    .stat-card h3 {
        color: #666;
        font-size: 0.95rem;
        margin-bottom: 12px;
        text-transform: uppercase;
    }

    .stat-number {
        font-size: 2.5rem;
        font-weight: bold;
        color: #3f6f4a;
    }

    .feature-cards {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
        gap: 24px;
        margin-top: 20px;
    }

    .feature-card {
        background: #fff;
        padding: 28px;
        border-radius: 8px;
        box-shadow: 0 2px 8px rgba(0,0,0,0.1);
        text-decoration: none;
        color: inherit;
        transition: all 0.3s ease;
        position: relative;
        display: flex;
        flex-direction: column;
    }

    .feature-card:hover {
        transform: translateY(-4px);
        box-shadow: 0 8px 16px rgba(0,0,0,0.15);
    }

    .feature-card h3 {
        margin: 0 0 12px 0;
        font-size: 1.2rem;
        color: #222;
    }

    .feature-card p {
        color: #666;
        margin: 0 0 16px 0;
        flex: 1;
    }

    .badge {
        display: inline-block;
        background: #e8f5e9;
        color: #2e7d32;
        padding: 6px 12px;
        border-radius: 20px;
        font-size: 0.85rem;
        font-weight: 600;
    }

    h1 {
        color: #222;
        margin-bottom: 8px;
    }

    h2 {
        color: #222;
        margin-bottom: 20px;
        font-size: 1.5rem;
    }
</style>
@endsection
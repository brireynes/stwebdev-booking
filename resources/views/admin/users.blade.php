@extends('layouts.app')

@section('content')
<div class="admin-container">
    <div class="page-header">
        <h1>{{ $title }}</h1>
        <a href="{{ route('admin.dashboard') }}" class="btn-back">← Back to Dashboard</a>
    </div>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <!-- Search -->
    <div class="search-section">
        <form method="GET" action="{{ route('admin.users') }}" class="search-form">
            <input type="text" name="search" placeholder="Search by name or email..." 
                   value="{{ $searchQuery }}" class="search-input">
            <button type="submit" class="btn-search">Search</button>
        </form>
    </div>

    <!-- Users Table -->
    <div class="table-responsive">
        @if ($users->count() > 0)
            <table class="users-table">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Total Bookings</th>
                        <th>Joined</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        <tr class="user-row">
                            <td class="user-name-cell">
                                <a href="{{ route('admin.user-details', $user) }}">
                                    {{ $user->name }}
                                </a>
                            </td>
                            <td>{{ $user->email }}</td>
                            <td>
                                <span class="booking-count">{{ $user->bookings_count }}</span>
                            </td>
                            <td>{{ $user->created_at->format('M d, Y') }}</td>
                            <td>
                                <div class="action-buttons">
                                    <a href="{{ route('admin.user-details', $user) }}" class="btn-action btn-view">
                                        View
                                    </a>
                                    <form action="{{ route('admin.users.delete', $user) }}" method="POST" style="display: inline;" 
                                          onsubmit="return confirm('Are you sure you want to delete this user and all their bookings?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn-action btn-delete">Delete</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <!-- Pagination -->
            <div class="pagination-wrapper">
                {{ $users->links() }}
            </div>
        @else
            <div class="empty-state">
                <p>No users found.</p>
            </div>
        @endif
    </div>
</div>

<style>
    .admin-container {
        max-width: 1000px;
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

    .alert {
        padding: 16px;
        border-radius: 4px;
        margin-bottom: 20px;
    }

    .alert-success {
        background: #e8f5e9;
        color: #2e7d32;
        border: 1px solid #a5d6a7;
    }

    .search-section {
        background: #fff;
        padding: 20px;
        border-radius: 8px;
        margin-bottom: 30px;
        box-shadow: 0 2px 8px rgba(0,0,0,0.1);
    }

    .search-form {
        display: flex;
        gap: 12px;
    }

    .search-input {
        flex: 1;
        padding: 10px 12px;
        border: 1px solid #ddd;
        border-radius: 4px;
        font-size: 0.95rem;
    }

    .search-input:focus {
        outline: none;
        border-color: #3f6f4a;
        box-shadow: 0 0 0 3px rgba(63, 111, 74, 0.1);
    }

    .btn-search {
        background: #3f6f4a;
        color: #fff;
        padding: 10px 24px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        font-weight: 600;
        transition: background 0.2s;
    }

    .btn-search:hover {
        background: #2e5a38;
    }

    .table-responsive {
        background: #fff;
        border-radius: 8px;
        overflow: hidden;
        box-shadow: 0 2px 8px rgba(0,0,0,0.1);
    }

    .users-table {
        width: 100%;
        border-collapse: collapse;
    }

    .users-table thead {
        background: #f5f5f5;
    }

    .users-table th {
        padding: 16px;
        text-align: left;
        font-weight: 600;
        color: #333;
        border-bottom: 2px solid #e0e0e0;
    }

    .users-table td {
        padding: 14px 16px;
        border-bottom: 1px solid #e0e0e0;
    }

    .user-row:hover {
        background: #fafafa;
    }

    .user-name-cell a {
        color: #3f6f4a;
        text-decoration: none;
        font-weight: 600;
    }

    .user-name-cell a:hover {
        text-decoration: underline;
    }

    .booking-count {
        display: inline-block;
        background: #f0f0f0;
        padding: 4px 12px;
        border-radius: 12px;
        font-weight: 600;
        color: #333;
    }

    .action-buttons {
        display: flex;
        gap: 8px;
    }

    .btn-action {
        padding: 6px 12px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        font-size: 0.85rem;
        font-weight: 600;
        text-decoration: none;
        display: inline-block;
        transition: all 0.2s;
    }

    .btn-view {
        background: #e8f5e9;
        color: #2e7d32;
        border: 1px solid #a5d6a7;
    }

    .btn-view:hover {
        background: #c8e6c9;
    }

    .btn-delete {
        background: #ffebee;
        color: #c62828;
        border: 1px solid #ef9a9a;
    }

    .btn-delete:hover {
        background: #ffcdd2;
    }

    .empty-state {
        padding: 60px 20px;
        text-align: center;
        color: #999;
    }

    .pagination-wrapper {
        display: flex;
        justify-content: center;
        align-items: center;
        padding: 20px;
        gap: 10px;
    }

    h1 {
        color: #222;
        margin: 0;
    }
</style>
@endsection

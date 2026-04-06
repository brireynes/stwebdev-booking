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

    <!-- Filters -->
    <div class="filters-section">
        <form method="GET" action="{{ route('admin.bookings') }}" class="filter-form">
            <div class="filter-group">
                <input type="text" name="search" placeholder="Search by user name or email..." 
                       value="{{ $searchQuery }}" class="search-input">
            </div>

            <div class="filter-group">
                <select name="status" onchange="this.form.submit()" class="status-select">
                    <option value="all" @selected($currentStatus === 'all')>All Statuses</option>
                    <option value="pending" @selected($currentStatus === 'pending')>Pending</option>
                    <option value="approved" @selected($currentStatus === 'approved')>Approved</option>
                    <option value="rejected" @selected($currentStatus === 'rejected')>Rejected</option>
                </select>
            </div>

            <button type="submit" class="btn-filter">Search</button>
        </form>
    </div>

    <!-- Bookings Table -->
    <div class="table-responsive">
        @if ($bookings->count() > 0)
            <table class="bookings-table">
                <thead>
                    <tr>
                        <th>User</th>
                        <th>Email</th>
                        <th>Service</th>
                        <th>Date</th>
                        <th>Time</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($bookings as $booking)
                        <tr class="booking-row status-{{ $booking->status }}">
                            <td class="user-name">
                                <a href="{{ route('admin.user-details', $booking->user) }}">
                                    {{ $booking->user->name }}
                                </a>
                            </td>
                            <td>{{ $booking->user->email }}</td>
                            <td>{{ $booking->service }}</td>
                            <td>{{ $booking->appointment_date->format('M d, Y') }}</td>
                            <td>{{ $booking->appointment_time }}</td>
                            <td>
                                <span class="status-badge status-{{ $booking->status }}">
                                    {{ ucfirst($booking->status) }}
                                </span>
                            </td>
                            <td>
                                <div class="action-buttons">
                                    @if ($booking->status === 'pending')
                                        <form action="{{ route('admin.bookings.approve', $booking) }}" method="POST" style="display: inline;">
                                            @csrf
                                            <button type="submit" class="btn-action btn-approve">Approve</button>
                                        </form>

                                        <button class="btn-action btn-reject" onclick="showRejectModal({{ $booking->id }})">Reject</button>
                                    @else
                                        <span class="text-muted">No actions</span>
                                    @endif
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <!-- Pagination -->
            <div class="pagination-wrapper">
                {{ $bookings->links() }}
            </div>
        @else
            <div class="empty-state">
                <p>No bookings found.</p>
            </div>
        @endif
    </div>
</div>

<!-- Reject Modal -->
<div id="rejectModal" class="modal">
    <div class="modal-content">
        <span class="close" onclick="closeRejectModal()">&times;</span>
        <h2>Reject Booking</h2>
        <form id="rejectForm" method="POST">
            @csrf
            <div class="form-group">
                <label for="rejection_reason">Reason for Rejection (Optional):</label>
                <textarea id="rejection_reason" name="rejection_reason" rows="4" class="input-textarea" placeholder="Enter the reason for rejection..."></textarea>
            </div>
            <div class="modal-actions">
                <button type="button" class="btn-cancel" onclick="closeRejectModal()">Cancel</button>
                <button type="submit" class="btn-confirm">Reject Booking</button>
            </div>
        </form>
    </div>
</div>

<style>
    .admin-container {
        max-width: 1200px;
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

    .filters-section {
        background: #fff;
        padding: 20px;
        border-radius: 8px;
        margin-bottom: 30px;
        box-shadow: 0 2px 8px rgba(0,0,0,0.1);
    }

    .filter-form {
        display: flex;
        gap: 16px;
        flex-wrap: wrap;
        align-items: flex-end;
    }

    .filter-group {
        flex: 1;
        min-width: 150px;
    }

    .search-input,
    .status-select {
        width: 100%;
        padding: 10px 12px;
        border: 1px solid #ddd;
        border-radius: 4px;
        font-size: 0.95rem;
    }

    .search-input:focus,
    .status-select:focus {
        outline: none;
        border-color: #3f6f4a;
        box-shadow: 0 0 0 3px rgba(63, 111, 74, 0.1);
    }

    .btn-filter {
        background: #3f6f4a;
        color: #fff;
        padding: 10px 24px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        font-weight: 600;
        transition: background 0.2s;
    }

    .btn-filter:hover {
        background: #2e5a38;
    }

    .table-responsive {
        background: #fff;
        border-radius: 8px;
        overflow: hidden;
        box-shadow: 0 2px 8px rgba(0,0,0,0.1);
    }

    .bookings-table {
        width: 100%;
        border-collapse: collapse;
    }

    .bookings-table thead {
        background: #f5f5f5;
    }

    .bookings-table th {
        padding: 16px;
        text-align: left;
        font-weight: 600;
        color: #333;
        border-bottom: 2px solid #e0e0e0;
    }

    .bookings-table td {
        padding: 14px 16px;
        border-bottom: 1px solid #e0e0e0;
    }

    .booking-row:hover {
        background: #fafafa;
    }

    .user-name a {
        color: #3f6f4a;
        text-decoration: none;
        font-weight: 600;
    }

    .user-name a:hover {
        text-decoration: underline;
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

    .action-buttons {
        display: flex;
        gap: 8px;
        flex-wrap: wrap;
    }

    .btn-action {
        padding: 6px 12px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        font-size: 0.85rem;
        font-weight: 600;
        transition: all 0.2s;
    }

    .btn-approve {
        background: #e8f5e9;
        color: #2e7d32;
        border: 1px solid #a5d6a7;
    }

    .btn-approve:hover {
        background: #c8e6c9;
    }

    .btn-reject {
        background: #ffebee;
        color: #c62828;
        border: 1px solid #ef9a9a;
    }

    .btn-reject:hover {
        background: #ffcdd2;
    }

    .text-muted {
        color: #999;
        font-size: 0.9rem;
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

    .modal {
        display: none;
        position: fixed;
        z-index: 1;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0,0,0,0.4);
    }

    .modal-content {
        background-color: #fefefe;
        margin: 50px auto;
        padding: 30px;
        border: 1px solid #888;
        border-radius: 8px;
        width: 90%;
        max-width: 500px;
        box-shadow: 0 4px 12px rgba(0,0,0,0.15);
    }

    .close {
        color: #aaa;
        float: right;
        font-size: 28px;
        font-weight: bold;
        cursor: pointer;
    }

    .close:hover {
        color: #000;
    }

    .input-textarea {
        width: 100%;
        padding: 12px;
        border: 1px solid #ddd;
        border-radius: 4px;
        font-family: Arial, sans-serif;
        font-size: 1rem;
    }

    .input-textarea:focus {
        outline: none;
        border-color: #3f6f4a;
    }

    .modal-actions {
        display: flex;
        gap: 12px;
        justify-content: flex-end;
        margin-top: 20px;
    }

    .btn-cancel,
    .btn-confirm {
        padding: 10px 20px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        font-weight: 600;
        transition: all 0.2s;
    }

    .btn-cancel {
        background: #f0f0f0;
        color: #333;
    }

    .btn-cancel:hover {
        background: #e0e0e0;
    }

    .btn-confirm {
        background: #c62828;
        color: #fff;
    }

    .btn-confirm:hover {
        background: #b71c1c;
    }

    h1 {
        color: #222;
        margin: 0;
    }

    h2 {
        margin-top: 0;
        color: #222;
    }
</style>

<script>
    function showRejectModal(bookingId) {
        document.getElementById('rejectModal').style.display = 'block';
        document.getElementById('rejectForm').action = `/admin/bookings/${bookingId}/reject`;
    }

    function closeRejectModal() {
        document.getElementById('rejectModal').style.display = 'none';
    }

    window.onclick = function(event) {
        const modal = document.getElementById('rejectModal');
        if (event.target == modal) {
            modal.style.display = 'none';
        }
    }
</script>
@endsection

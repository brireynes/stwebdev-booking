@extends('layouts.app')

@section('content')
    <section class="page-header-section">
        <div class="page-header-inner">
            <div>
                <h1>Change Password</h1>
                <p>Use this page to implement your password update form and security checks.</p>
            </div>
        </div>
    </section>

    <section class="service-detail-section">
        <div class="service-detail-card">
            <div class="service-detail-image">Security</div>
            <div>
                <div class="service-detail-price">Password settings</div>
                <p>Change your account password for better security.</p>
                <form method="POST" action="{{ route('profile.password.submit') }}" style="margin-top: 24px;">
                    @csrf
                    <div class="form-group">
                        <label for="current_password">Current Password</label>
                        <input type="password" id="current_password" name="current_password" placeholder="Enter current password">
                    </div>
                    <div class="form-group">
                        <label for="password">New Password</label>
                        <input type="password" id="password" name="password" placeholder="Enter new password">
                    </div>
                    <div class="form-group">
                        <label for="password_confirmation">Confirm New Password</label>
                        <input type="password" id="password_confirmation" name="password_confirmation" placeholder="Confirm new password">
                    </div>
                    <button type="submit" class="button button-primary">Update password</button>
                </form>
            </div>
        </div>
    </section>
@endsection
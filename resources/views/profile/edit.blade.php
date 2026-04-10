@extends('layouts.app')

@section('content')
    <section class="page-header-section">
        <div class="page-header-inner">
            <div>
                <h1>Edit Profile</h1>
                <p>Update your personal details to keep your account information current.</p>
            </div>
        </div>
    </section>

    <section class="service-detail-section">
        <div class="service-detail-card">
            <div class="service-detail-image">Profile</div>
            <div>
                <div class="service-detail-price">Account settings</div>
                <p>Update your name, email, and contact number here.</p>
                <form method="POST" action="{{ route('profile.update') }}" style="margin-top: 24px;">
                    @csrf
                    <div class="form-group">
                        <label for="name">Full Name</label>
                        <input type="text" id="name" name="name" value="{{ old('name', $authUser->name ?? '') }}" placeholder="Enter your full name">
                    </div>
                    <div class="form-group">
                        <label for="email">Email Address</label>
                        <input type="email" id="email" name="email" value="{{ old('email', $authUser->email ?? '') }}" placeholder="Enter your email">
                    </div>
                    <div class="form-group">
                        <label for="contact">Contact Number</label>
                        <input type="text" id="contact" name="contact" value="{{ old('contact', $authUser->contact ?? '') }}" placeholder="Enter your contact number">
                    </div>
                    <button type="submit" class="button button-primary">Save changes</button>
                </form>
            </div>
        </div>
    </section>
@endsection
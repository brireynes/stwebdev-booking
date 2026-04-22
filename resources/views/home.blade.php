@extends('layouts.app')

@section('content')

<div class="flex justify-between items-center mb-6">
    <div>
        <h1>Welcome to Bong's Salon</h1>
        <p>Book your salon services easily.</p>
    </div>
    @if(auth()->check() && (auth()->user()->role === 'super_admin' || auth()->user()->role === 'admin'))
        <a href="{{ route('admin.dashboard') }}" class="bg-black text-white px-4 py-2 rounded-lg hover:bg-gray-800">
            Admin Dashboard
        </a>
    @endif
</div>

@endsection
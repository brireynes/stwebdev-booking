@extends('layouts.app')

@section('content')
    <section class="page-header-section">
        <div class="page-header-inner">
            <div>
                <h1>{{ $service->name }}</h1>
                <p>{{ $service->description }}</p>
            </div>
        </div>
    </section>

    <section class="service-detail-section">
        <div class="service-detail-card">
            <div class="service-detail-image">Service</div>
            <div class="service-detail-body">
                <div class="service-detail-price">Price: ₱{{ number_format($service->price, 2) }}</div>
                <p>Ready to book this service? Add it to your cart and continue to checkout.</p>
                <div class="detail-actions">
                    <a href="{{ route('booking') }}?service={{ urlencode($service->name) }}" class="button button-primary">Add to cart</a>
                    <a href="{{ route('services') }}" class="button button-secondary">Back to Services</a>
                </div>
            </div>
        </div>
    </section>
@endsection

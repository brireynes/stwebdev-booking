@extends('layouts.app')

@section('content')
    <section class="page-header-section">
        <div class="page-header-inner">
            <div>
                <h1>Our Services</h1>
                <p>Explore our available services, select the one that fits your needs, and book it with just one click.</p>
            </div>
        </div>
    </section>

    <section class="services-section">
        <div class="services-grid">
            @forelse ($services as $service)
                <article class="service-card">
                    <div class="service-card-image">
                        <span>Service</span>
                    </div>
                    <div class="service-card-body">
                        <h2>{{ $service->name }}</h2>
                        <p>{{ $service->description }}</p>
                        <div class="service-price">₱{{ number_format($service->price, 2) }}</div>
                    </div>
                    <div class="service-card-footer">
                        <a href="{{ route('service.show', $service) }}" class="button button-primary">Book</a>
                    </div>
                </article>
            @empty
                <div class="empty-state">
                    <h2>No services found</h2>
                    <p>Please check back soon for new offers and packages.</p>
                </div>
            @endforelse
        </div>
    </section>

    <section class="package-section">
        <h2>Packages</h2>
        <div class="package-grid">
            @foreach ($packages as $package)
                <article class="package-card">
                    <h3>{{ $package['title'] }}</h3>
                    <span>{{ $package['subtitle'] }}</span>
                    <p>{{ $package['description'] }}</p>
                    <div class="package-price">{{ $package['price'] }}</div>
                </article>
            @endforeach
        </div>
    </section>

    <section class="promo-section">
        <div class="promo-header">
            <h2>Promotions</h2>
            <div class="promo-controls">
                <button class="promo-button prev-button" type="button">‹</button>
                <button class="promo-button next-button" type="button">›</button>
            </div>
        </div>
        <div class="promo-track-container">
            <div class="promo-track">
                @foreach ($promos as $promo)
                    <article class="promo-card">
                        <h3>{{ $promo['title'] }}</h3>
                        <p>{{ $promo['description'] }}</p>
                    </article>
                @endforeach
            </div>
        </div>
    </section>

    <script>
        const promoTrack = document.querySelector('.promo-track');
        const prevButton = document.querySelector('.prev-button');
        const nextButton = document.querySelector('.next-button');

        if (promoTrack) {
            prevButton.addEventListener('click', () => {
                promoTrack.scrollBy({ left: -320, behavior: 'smooth' });
            });

            nextButton.addEventListener('click', () => {
                promoTrack.scrollBy({ left: 320, behavior: 'smooth' });
            });
        }
    </script>
@endsection

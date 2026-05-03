@extends('layouts.app')

@section('content')

<section class="relative bg-[#f8f1ec]">
    <div class="max-w-7xl mx-auto px-6 py-20 grid md:grid-cols-2 gap-12 items-center">
        <div>
            <p class="text-sm uppercase tracking-[0.3em] text-[#b08968] font-semibold mb-4">
                About Bong's Salon
            </p>

            <h1 class="text-4xl md:text-5xl font-bold text-gray-900 leading-tight mb-6">
                Bringing out the best in every client
            </h1>

            <p class="text-gray-700 text-lg leading-relaxed mb-8">
                Bong's Salon is dedicated to helping every client feel confident, refreshed,
                and beautiful through quality hair and beauty services delivered with care.
            </p>

            <a href="{{ route('services.index') }}"
               class="inline-block bg-[#b08968] text-white px-8 py-3 rounded-full font-semibold hover:bg-[#8f6a4f] transition">
                View Our Services
            </a>
        </div>

        <div class="rounded-3xl overflow-hidden shadow-lg">
            <img src="{{ asset('images/about-salon.png') }}"
                 alt="Bong's Salon interior"
                 class="w-full h-[420px] object-cover">
        </div>
    </div>
</section>

<!-- ABOUT THE OWNER -->
<section class="max-w-7xl mx-auto px-6 py-20">
    <div class="grid md:grid-cols-2 gap-12 items-center">
        <div class="order-2 md:order-1">
            <p class="text-sm uppercase tracking-[0.3em] text-[#b08968] font-semibold mb-4">
                About the Owner
            </p>

            <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-6">
                The story behind Bong's Salon
            </h2>

            <p class="text-gray-700 leading-relaxed mb-5">
                Bong’s Salon was built from the dedication and passion of its owner, Bong, who
                believed that a salon should be more than a place for hair and beauty services.
                For him, it should be a welcoming space where people can feel comfortable,
                respected, and confident from the moment they walk in.
            </p>

            <p class="text-gray-700 leading-relaxed mb-5">
                His journey in the salon industry started with a strong interest in personal
                grooming, hairstyling, and customer service. Over time, that interest grew into a
                deeper commitment to helping clients express themselves through their appearance.
                Bong understood that every haircut, hair color, treatment, or beauty service could
                make a real difference in how someone feels about themselves.
            </p>

            <p class="text-gray-700 leading-relaxed mb-5">
                With patience, practice, and continuous learning, he developed the values that now
                guide Bong’s Salon: proper care, honest service, attention to detail, and respect
                for each client’s personal style. These values became the foundation of the salon
                and continue to shape the way every service is done.
            </p>

            <p class="text-gray-700 leading-relaxed">
                Today, Bong’s Salon carries his vision of providing quality salon services in a
                friendly and professional environment. Every client is treated with care, and every
                visit is seen as an opportunity to help someone feel refreshed, confident, and
                ready to face the day with a renewed sense of beauty.
            </p>
        </div>

        <div class="order-1 md:order-2">
            <img src="{{ asset('images/about-owner.png') }}"
                 alt="Owner of Bong's Salon"
                 class="rounded-3xl shadow-md w-full h-[550px] object-cover">
        </div>
    </div>
</section>

<section class="max-w-7xl mx-auto px-6 py-20">
    <div class="grid md:grid-cols-2 gap-12 items-center">
        <div>
            <img src="{{ asset('images/about-founder.png') }}"
                 alt="Salon stylist"
                 class="rounded-3xl shadow-md w-full h-[450px] object-cover">
        </div>

        <div>
            <p class="text-sm uppercase tracking-[0.3em] text-[#b08968] font-semibold mb-4">
                Our Story
            </p>

            <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-6">
                A salon built on passion, skill, and trust
            </h2>

            <p class="text-gray-700 leading-relaxed mb-5">
                Bong's Salon was created with a simple goal: to provide professional salon
                services in a welcoming space where clients can relax, feel cared for, and leave
                with renewed confidence.
            </p>

            <p class="text-gray-700 leading-relaxed mb-5">
                From haircuts and hair color to rebonding, treatments, nails, and beauty care,
                our team focuses on giving each client a service that matches their style,
                personality, and needs.
            </p>

            <p class="text-gray-700 leading-relaxed">
                Every appointment is handled with attention, patience, and genuine care because
                we believe beauty is not only about appearance — it is also about comfort,
                confidence, and self-expression.
            </p>
        </div>
    </div>
</section>

<section class="bg-[#fff8f3] py-20">
    <div class="max-w-7xl mx-auto px-6 text-center">
        <p class="text-sm uppercase tracking-[0.3em] text-[#b08968] font-semibold mb-4">
            What We Believe
        </p>

        <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-12">
            Quality service made personal
        </h2>

        <div class="grid md:grid-cols-3 gap-8">
            <div class="bg-white p-8 rounded-3xl shadow-sm">
                <h3 class="text-xl font-bold text-gray-900 mb-4">Professional Care</h3>
                <p class="text-gray-600 leading-relaxed">
                    We provide services with proper consultation, careful application,
                    and attention to every detail.
                </p>
            </div>

            <div class="bg-white p-8 rounded-3xl shadow-sm">
                <h3 class="text-xl font-bold text-gray-900 mb-4">Comfortable Experience</h3>
                <p class="text-gray-600 leading-relaxed">
                    Our salon aims to create a relaxing and friendly environment for every
                    client who visits us.
                </p>
            </div>

            <div class="bg-white p-8 rounded-3xl shadow-sm">
                <h3 class="text-xl font-bold text-gray-900 mb-4">Confidence & Beauty</h3>
                <p class="text-gray-600 leading-relaxed">
                    Our goal is to help clients look good, feel good, and leave with confidence.
                </p>
            </div>
        </div>
    </div>
</section>

<section class="max-w-7xl mx-auto px-6 py-20">
    <div class="grid md:grid-cols-2 gap-12 items-center">
        <div>
            <p class="text-sm uppercase tracking-[0.3em] text-[#b08968] font-semibold mb-4">
                Our Services
            </p>

            <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-6">
                Hair and beauty services for every style
            </h2>

            <p class="text-gray-700 leading-relaxed mb-6">
                Bong's Salon offers a wide range of services designed to fit different beauty
                needs, from everyday grooming to full salon transformations.
            </p>

            <ul class="space-y-3 text-gray-700">
                <li>✓ Haircut and hairstyling</li>
                <li>✓ Hair color and treatments</li>
                <li>✓ Hair rebonding and Brazilian blow dry</li>
                <li>✓ Manicure and pedicure services</li>
                <li>✓ Beauty packages and promos</li>
            </ul>
        </div>

        <div class="grid grid-cols-2 gap-4">
            <img src="{{ asset('images/about-service-1.png') }}"
                 alt="Hair service"
                 class="rounded-3xl h-64 w-full object-cover shadow-sm">

            <img src="{{ asset('images/about-service-2.png') }}"
                 alt="Salon treatment"
                 class="rounded-3xl h-64 w-full object-cover shadow-sm mt-10">

            <img src="{{ asset('images/about-service-3.png') }}"
                 alt="Salon care"
                 class="rounded-3xl h-64 w-full object-cover shadow-sm -mt-10">

            <img src="{{ asset('images/about-service-4.png') }}"
                 alt="Beauty service"
                 class="rounded-3xl h-64 w-full object-cover shadow-sm">
        </div>
    </div>
</section>

<section class="bg-[#b08968] text-white">
    <div class="max-w-7xl mx-auto px-6 py-16 text-center">
        <h2 class="text-3xl md:text-4xl font-bold mb-4">
            Ready for your next salon experience?
        </h2>

        <p class="text-white/90 mb-8 max-w-2xl mx-auto">
            Visit Bong's Salon and let our team help you achieve a look that fits you best.
        </p>

        <a href="{{ route('bookings.index') }}"
           class="inline-block bg-white text-[#8f6a4f] px-8 py-3 rounded-full font-semibold hover:bg-gray-100 transition">
            Book an Appointment
        </a>
    </div>
</section>

@endsection
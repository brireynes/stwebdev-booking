@extends('layouts.app')

@section('content')
<div class="bg-white text-gray-900">

    <!-- PAGE BANNER -->
    <section class="bg-black py-20 text-center text-white">
        <div class="max-w-7xl mx-auto px-6">
            <span class="material-symbols-outlined text-yellow-500 text-4xl mb-3">
                content_cut
            </span>

            <h1 class="text-4xl md:text-5xl font-bold mb-4">
                Contact
            </h1>

            <div class="text-sm text-gray-300">
                <a href="{{ route('home') }}" class="hover:text-yellow-500 transition">Home</a>
                <span class="mx-2">›</span>
                <span>Contact</span>
            </div>
        </div>
    </section>

    <!-- CONTACT SECTION -->
    <section class="py-24">
        <div class="max-w-7xl mx-auto px-6">

            <div class="text-center mb-16">
                <span class="inline-block text-sm uppercase tracking-[0.35em] text-yellow-600 mb-3">
                    Get In Touch
                </span>

                <h2 class="text-3xl md:text-4xl font-bold text-black mb-4">
                    We’d Love To Hear From You
                </h2>

                <p class="text-gray-600 max-w-2xl mx-auto">
                    For appointments, questions, and salon service inquiries, send us a message and our team will get back to you soon.
                </p>
            </div>

            <div class="grid gap-12 lg:grid-cols-2">

                <!-- CONTACT INFO -->
                <div class="space-y-8">

                    <div class="flex gap-4">
                        <span class="material-symbols-outlined text-yellow-600 text-3xl">
                            location_on
                        </span>
                        <div>
                            <h3 class="text-xl font-bold text-black mb-1">Address</h3>
                            <p class="text-gray-600">
                                Bong's Salon<br>
                                Unit 2, Golden Avenue<br>
                                Iloilo City, Philippines
                            </p>
                        </div>
                    </div>

                    <div class="flex gap-4">
                        <span class="material-symbols-outlined text-yellow-600 text-3xl">
                            call
                        </span>
                        <div>
                            <h3 class="text-xl font-bold text-black mb-1">Phone</h3>
                            <p class="text-gray-600">
                                Mobile: 0912-345-6789<br>
                                Landline: (033) 123-4567
                            </p>
                        </div>
                    </div>

                    <div class="flex gap-4">
                        <span class="material-symbols-outlined text-yellow-600 text-3xl">
                            mail
                        </span>
                        <div>
                            <h3 class="text-xl font-bold text-black mb-1">Email</h3>
                            <p class="text-gray-600">
                                bongssalon@example.com
                            </p>
                        </div>
                    </div>

                    <div class="flex gap-4">
                        <span class="material-symbols-outlined text-yellow-600 text-3xl">
                            schedule
                        </span>
                        <div>
                            <h3 class="text-xl font-bold text-black mb-1">Working Hours</h3>
                            <p class="text-gray-600">
                                Monday - Saturday: 9:00 AM - 7:00 PM<br>
                                Sunday: 10:00 AM - 5:00 PM
                            </p>
                        </div>
                    </div>

                </div>

                <!-- CONTACT FORM -->
                <div class="rounded-3xl border border-gray-200 bg-white p-8 shadow-sm">

                    @if(session('success'))
                        <div class="mb-6 rounded-xl border border-green-200 bg-green-50 p-4 text-green-700">
                            {{ session('success') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('contact.store') }}" class="space-y-6">
                        @csrf

                        <div>
                            <label for="name" class="block text-sm font-semibold text-gray-700 mb-2">
                                Your Name
                            </label>
                            <input type="text"
                                   id="name"
                                   name="name"
                                   value="{{ old('name') }}"
                                   placeholder="Juan Dela Cruz"
                                   class="w-full rounded-xl border border-gray-300 px-4 py-3 focus:border-yellow-500 focus:outline-none focus:ring-2 focus:ring-yellow-500/20">

                            @error('name')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="email" class="block text-sm font-semibold text-gray-700 mb-2">
                                Email Address
                            </label>
                            <input type="email"
                                   id="email"
                                   name="email"
                                   value="{{ old('email') }}"
                                   placeholder="juan@example.com"
                                   class="w-full rounded-xl border border-gray-300 px-4 py-3 focus:border-yellow-500 focus:outline-none focus:ring-2 focus:ring-yellow-500/20">

                            @error('email')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="subject" class="block text-sm font-semibold text-gray-700 mb-2">
                                Subject
                            </label>
                            <input type="text"
                                   id="subject"
                                   name="subject"
                                   value="{{ old('subject') }}"
                                   placeholder="Booking inquiry"
                                   class="w-full rounded-xl border border-gray-300 px-4 py-3 focus:border-yellow-500 focus:outline-none focus:ring-2 focus:ring-yellow-500/20">

                            @error('subject')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="message" class="block text-sm font-semibold text-gray-700 mb-2">
                                Message
                            </label>
                            <textarea id="message"
                                      name="message"
                                      rows="5"
                                      placeholder="Hi, I’d like to ask about..."
                                      class="w-full rounded-xl border border-gray-300 px-4 py-3 focus:border-yellow-500 focus:outline-none focus:ring-2 focus:ring-yellow-500/20">{{ old('message') }}</textarea>

                            @error('message')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <button type="submit"
                                class="w-full rounded-xl bg-yellow-500 px-6 py-3 font-semibold text-black hover:bg-yellow-400 transition">
                            Submit Message
                        </button>
                    </form>
                </div>

            </div>
        </div>
    </section>

    <!-- SALON FEATURES -->
    <section class="bg-[#f8f3ea] py-12">
        <div class="max-w-7xl mx-auto px-6">
            <div class="grid gap-8 md:grid-cols-4">

                <div class="flex items-center gap-4">
                    <span class="material-symbols-outlined text-4xl text-black">
                        workspace_premium
                    </span>
                    <div>
                        <h3 class="font-bold text-black">Professional Stylists</h3>
                        <p class="text-sm text-gray-600">Experienced salon experts</p>
                    </div>
                </div>

                <div class="flex items-center gap-4">
                    <span class="material-symbols-outlined text-4xl text-black">
                        spa
                    </span>
                    <div>
                        <h3 class="font-bold text-black">Premium Hair Care</h3>
                        <p class="text-sm text-gray-600">Quality products and services</p>
                    </div>
                </div>

                <div class="flex items-center gap-4">
                    <span class="material-symbols-outlined text-4xl text-black">
                        verified
                    </span>
                    <div>
                        <h3 class="font-bold text-black">Clean & Comfortable</h3>
                        <p class="text-sm text-gray-600">Relaxing salon experience</p>
                    </div>
                </div>

                <div class="flex items-center gap-4">
                    <span class="material-symbols-outlined text-4xl text-black">
                        event_available
                    </span>
                    <div>
                        <h3 class="font-bold text-black">Easy Booking</h3>
                        <p class="text-sm text-gray-600">Simple appointment process</p>
                    </div>
                </div>

            </div>
        </div>
    </section>

</div>
@endsection
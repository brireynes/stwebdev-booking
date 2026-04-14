@extends('layouts.app')

@section('content')
<div class="bg-background text-on-surface">
    <div class="max-w-6xl mx-auto px-6 py-20">

        @if(session('success'))
            <div class="mb-8 rounded-3xl border border-amber-200/20 bg-amber-50/10 p-5 text-amber-100">
                {{ session('success') }}
            </div>
        @endif

        <div class="grid gap-12 lg:grid-cols-[1.2fr_0.8fr]">
            <div class="rounded-[2rem] border border-outline-variant/15 bg-surface-container p-10 shadow-xl shadow-black/5">
                <div class="mb-6 flex items-center justify-between gap-4">
                    <span class="inline-flex items-center rounded-full bg-primary px-4 py-2 text-sm uppercase tracking-[0.3em] text-on-primary">Service Detail</span>
                    <span class="text-sm text-on-surface-variant">{{ $service->duration }} mins</span>
                </div>

                <h1 class="text-5xl font-bold tracking-tight mb-6">{{ $service->name }}</h1>
                <p class="text-on-surface-variant leading-relaxed mb-10">{{ $service->description }}</p>

                <div class="grid gap-6 md:grid-cols-2 mb-10">
                    <div class="rounded-3xl bg-surface-container-high p-6">
                        <p class="text-sm uppercase tracking-[0.25em] text-primary">Price</p>
                        <p class="mt-3 text-4xl font-bold">₱{{ number_format($service->price, 2) }}</p>
                    </div>
                    <div class="rounded-3xl bg-surface-container-high p-6">
                        <p class="text-sm uppercase tracking-[0.25em] text-primary">Duration</p>
                        <p class="mt-3 text-4xl font-bold">{{ $service->duration }} mins</p>
                    </div>
                </div>

                <div class="flex flex-col gap-4 sm:flex-row">
                    <a href="{{ route('services.index') }}" class="inline-flex items-center justify-center rounded-3xl border border-outline-variant/30 bg-transparent px-8 py-4 text-sm font-semibold uppercase tracking-[0.25em] text-on-surface transition hover:border-primary hover:text-primary">Back to Services</a>

                    <form action="{{ route('cart.add') }}" method="POST" class="w-full sm:w-auto">
                        @csrf
                        <input type="hidden" name="service_id" value="{{ $service->id }}">
                        <button type="submit" class="inline-flex w-full items-center justify-center rounded-3xl bg-primary px-8 py-4 text-sm font-semibold uppercase tracking-[0.25em] text-on-primary transition hover:bg-primary-container">Add to Cart</button>
                    </form>
                </div>
            </div>

            <aside class="rounded-[2rem] border border-outline-variant/15 bg-surface-container p-10 shadow-xl shadow-black/5">
                <div class="space-y-6">
                    <div>
                        <h2 class="text-3xl font-semibold">Need a quick booking?</h2>
                        <p class="mt-3 text-on-surface-variant">Add the service to your cart now and complete your appointment in the booking flow.</p>
                    </div>

                    <div class="rounded-3xl bg-surface-container-high p-6">
                        <p class="text-sm uppercase tracking-[0.25em] text-primary">Special note</p>
                        <p class="mt-3 text-on-surface-variant">If you want a faster reservation, head over to the booking page after adding items to cart.</p>
                    </div>

                    <a href="{{ route('bookings.index') }}" class="inline-flex w-full items-center justify-center rounded-3xl bg-primary px-6 py-4 text-sm font-semibold uppercase tracking-[0.25em] text-on-primary transition hover:bg-primary-container">Go to Booking</a>
                </div>
            </aside>
        </div>
    </div>
</div>
@endsection
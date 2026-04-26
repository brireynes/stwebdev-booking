@extends('layouts.app')

@section('content')

<!-- PROMOS SECTION -->
<div class="w-full py-16 bg-gray-100">
    <div class="max-w-7xl mx-auto px-6">

        <!-- HEADER -->
        <div class="text-center mb-12">
            <h2 class="text-4xl font-bold text-yellow-600">
                Special Promos
            </h2>
            <p class="text-gray-600 mt-2">
                Exclusive discounts for selected clients and days
            </p>
        </div>

        <!-- GRID -->
        <div class="grid md:grid-cols-3 gap-6">

            <!-- PROMO 1 -->
            <div class="bg-white border border-gray-200 rounded-xl overflow-hidden flex flex-col hover:shadow-lg transition">

                <div class="h-52 bg-yellow-50 flex items-center justify-center">
                    <span class="text-yellow-500 font-semibold">Haircut Promo</span>
                </div>

                <div class="p-5 flex flex-col flex-1">

                    <span class="text-xs bg-yellow-500 text-white px-2 py-1 rounded w-fit mb-2">
                        New Client
                    </span>

                    <h2 class="text-lg font-semibold text-gray-900 mb-1">
                        New Client Haircut Promo
                    </h2>

                    <p class="text-gray-600 text-sm mb-3">
                        For new clients: Get 50% OFF on Haircut (original ₱100 → promo ₱50 only).
                    </p>

                    <div class="flex items-center justify-between mb-4">
                        <p class="text-sm text-gray-500">Duration</p>
                        <p class="text-sm font-medium">30 mins</p>
                    </div>

                    <p class="text-xl font-bold text-yellow-600 mb-4">
                        ₱50
                    </p>

                    <a href="{{ route('booking.create', 1) }}"
                       onclick="return handleBooking(event, 1)"
                       class="mt-auto w-full bg-yellow-500 text-white py-2 rounded-md hover:bg-yellow-600 transition text-center">
                        Avail Promo
                    </a>

                </div>
            </div>

            <!-- PROMO 2 -->
            <div class="bg-white border border-gray-200 rounded-xl overflow-hidden flex flex-col hover:shadow-lg transition">

                <div class="h-52 bg-yellow-50 flex items-center justify-center">
                    <span class="text-yellow-500 font-semibold">Weekend Deal</span>
                </div>

                <div class="p-5 flex flex-col flex-1">

                    <span class="text-xs bg-orange-500 text-white px-2 py-1 rounded w-fit mb-2">
                        Weekend
                    </span>

                    <h2 class="text-lg font-semibold text-gray-900 mb-1">
                        Weekend Manicure & Pedicure Deal
                    </h2>

                    <p class="text-gray-600 text-sm mb-3">
                        Weekend special: Get Manicure or Pedicure for only ₱50 each.
                    </p>

                    <div class="flex items-center justify-between mb-4">
                        <p class="text-sm text-gray-500">Duration</p>
                        <p class="text-sm font-medium">45 mins</p>
                    </div>

                    <p class="text-xl font-bold text-yellow-600 mb-4">
                        ₱50
                    </p>

                    <a href="{{ route('booking.create', 2) }}"
                       onclick="return handleBooking(event, 2)"
                       class="mt-auto w-full bg-yellow-500 text-white py-2 rounded-md hover:bg-yellow-600 transition text-center">
                        Avail Promo
                    </a>

                </div>
            </div>

            <!-- PROMO 3 -->
            <div class="bg-white border border-gray-200 rounded-xl overflow-hidden flex flex-col hover:shadow-lg transition">

                <div class="h-52 bg-yellow-50 flex items-center justify-center">
                    <span class="text-yellow-500 font-semibold">Student Discount</span>
                </div>

                <div class="p-5 flex flex-col flex-1">

                    <span class="text-xs bg-blue-500 text-white px-2 py-1 rounded w-fit mb-2">
                        Student
                    </span>

                    <h2 class="text-lg font-semibold text-gray-900 mb-1">
                        Student Nail Care Discount
                    </h2>

                    <p class="text-gray-600 text-sm mb-3">
                        Students get discounted Manicure or Pedicure for only ₱50. Valid student ID required.
                    </p>

                    <div class="flex items-center justify-between mb-4">
                        <p class="text-sm text-gray-500">Duration</p>
                        <p class="text-sm font-medium">45 mins</p>
                    </div>

                    <p class="text-xl font-bold text-yellow-600 mb-4">
                        ₱50
                    </p>

                    <a href="{{ route('booking.create', 3) }}"
                       onclick="return handleBooking(event, 3)"
                       class="mt-auto w-full bg-yellow-500 text-white py-2 rounded-md hover:bg-yellow-600 transition text-center">
                        Avail Promo
                    </a>

                </div>
            </div>

        </div>
    </div>
</div>

@endsection
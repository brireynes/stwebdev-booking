@extends('layouts.app')

@section('content')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Promos</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<!-- PROMOS SECTION -->
<div id="promos" class="w-full py-16 bg-gray-100">
    <div class="max-w-7xl mx-auto px-6">

        <h2 class="text-3xl font-bold text-yellow-600 mb-10 text-center">
            Promos
        </h2>

        <div class="grid md:grid-cols-3 gap-6">

            <!-- Promo 1 -->
            <div class="bg-white border border-gray-200 rounded-2xl shadow-sm overflow-hidden flex flex-col">

                <div class="h-56 bg-gray-200 flex items-center justify-center">
                    <span class="text-gray-500 text-sm">Image</span>
                </div>

                <div class="p-6 flex flex-col flex-1">
                    <span class="text-xs bg-yellow-600 text-white px-2 py-1 rounded-full w-fit mb-2">Limited</span>

                    <h2 class="text-xl font-semibold mb-2 text-black">Summer Promo</h2>
                    <p class="text-gray-600 mb-4">Enjoy 20% off on all packages.</p>
                    <p class="text-sm text-gray-500 mb-6">Valid until May 30</p>

                    <button class="w-full bg-yellow-600 text-white py-2 rounded-lg hover:bg-yellow-700 mt-auto">
                        Avail Promo
                    </button>
                </div>

            </div>

            <!-- Promo 2 -->
            <div class="bg-white border border-gray-200 rounded-2xl shadow-sm overflow-hidden flex flex-col">

                <div class="h-56 bg-gray-200 flex items-center justify-center">
                    <span class="text-gray-500 text-sm">Image</span>
                </div>

                <div class="p-6 flex flex-col flex-1">
                    <span class="text-xs bg-yellow-600 text-white px-2 py-1 rounded-full w-fit mb-2">Hot Deal</span>

                    <h2 class="text-xl font-semibold mb-2 text-black">Weekend Special</h2>
                    <p class="text-gray-600 mb-4">Book on weekends and get free decorations.</p>
                    <p class="text-sm text-gray-500 mb-6">Every Saturday & Sunday</p>

                    <button class="w-full bg-yellow-600 text-white py-2 rounded-lg hover:bg-yellow-700 mt-auto">
                        Avail Promo
                    </button>
                </div>

            </div>

            <!-- Promo 3 -->
            <div class="bg-white border border-gray-200 rounded-2xl shadow-sm overflow-hidden flex flex-col">

                <div class="h-56 bg-gray-200 flex items-center justify-center">
                    <span class="text-gray-500 text-sm">Image</span>
                </div>

                <div class="p-6 flex flex-col flex-1">
                    <span class="text-xs bg-yellow-600 text-white px-2 py-1 rounded-full w-fit mb-2">Best Value</span>

                    <h2 class="text-xl font-semibold mb-2 text-black">Group Discount</h2>
                    <p class="text-gray-600 mb-4">Get ₱1,000 off for group bookings.</p>
                    <p class="text-sm text-gray-500 mb-6">Minimum of 5 bookings</p>

                    <button class="w-full bg-yellow-600 text-white py-2 rounded-lg hover:bg-yellow-700 mt-auto">
                        Avail Promo
                    </button>
                </div>

            </div>

        </div>
    </div>
</div>


</body>
</html>

@endsection
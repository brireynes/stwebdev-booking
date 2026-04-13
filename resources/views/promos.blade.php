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
<body class="bg-gray-900">

<div class="max-w-7xl mx-auto py-10 px-4">
    <h1 class="text-3xl font-bold mb-6 text-white">Promos</h1>

    <div class="grid md:grid-cols-3 gap-6">

        <!-- Promo 1 -->
        <div class="bg-stone-800 rounded-2xl shadow p-6 flex flex-col border-l-4 border-yellow-600">
            
            <div>
                <span class="text-xs bg-yellow-600 text-white px-2 py-1 rounded-full">Limited</span>
                <h2 class="text-xl font-semibold mb-2 mt-2 text-white">Summer Promo</h2>
                <p class="text-yellow-600 mb-4">Enjoy 20% off on all packages.</p>
                <p class="text-sm text-gray-300 mb-4">Valid until May 30</p>
            </div>

            <button class="w-full bg-yellow-600 text-white py-2 rounded-lg hover:bg-yellow-700 mt-auto">
                Avail Promo
            </button>

        </div>

        <!-- Promo 2 -->
        <div class="bg-stone-800 rounded-2xl shadow p-6 flex flex-col border-l-4 border-yellow-600">
            
            <div>
                <span class="text-xs bg-yellow-600 text-white px-2 py-1 rounded-full">Hot Deal</span>
                <h2 class="text-xl font-semibold mb-2 mt-2 text-white">Weekend Special</h2>
                <p class="text-yellow-600 mb-4">Book on weekends and get free decorations.</p>
                <p class="text-sm text-gray-300 mb-4">Every Saturday & Sunday</p>
            </div>

            <button class="w-full bg-yellow-600 text-white py-2 rounded-lg hover:bg-yellow-700 mt-auto">
                Avail Promo
            </button>

        </div>

        <!-- Promo 3 -->
        <div class="bg-stone-800 rounded-2xl shadow p-6 flex flex-col border-l-4 border-yellow-600">
            
            <div>
                <span class="text-xs bg-yellow-600 text-white px-2 py-1 rounded-full">Best Value</span>
                <h2 class="text-xl font-semibold mb-2 mt-2 text-white">Group Discount</h2>
                <p class="text-yellow-600 mb-4">Get ₱1,000 off for group bookings.</p>
                <p class="text-sm text-gray-300 mb-4">Minimum of 5 bookings</p>
            </div>

            <button class="w-full bg-yellow-600 text-white py-2 rounded-lg hover:bg-yellow-700 mt-auto">
                Avail Promo
            </button>

        </div>

    </div>
</div>

</body>
</html>

@endsection
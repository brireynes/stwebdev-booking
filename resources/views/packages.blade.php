@extends('layouts.app')

@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Packages</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">

<!-- PACKAGES SECTION -->
<div id="packages" class="max-w-7xl mx-auto px-6 py-16">
    <h2 class="text-3xl font-bold text-yellow-600 mb-10 text-center">Packages</h2>

    <div class="grid md:grid-cols-3 gap-6">

        <!-- Basic -->
        <div class="bg-white border border-gray-200 rounded-2xl shadow-sm overflow-hidden flex flex-col">

            <div class="h-56 bg-gray-200 flex items-center justify-center">
                <span class="text-gray-500 text-sm">Image</span>
            </div>

            <div class="p-6 flex flex-col flex-1">
                <h2 class="text-xl font-semibold mb-2 text-black">Basic Package</h2>
                <p class="text-gray-600 mb-4">Perfect for small events.</p>
                <p class="text-2xl font-bold text-yellow-600 mb-6">₱2,000</p>

                <button class="w-full bg-yellow-600 text-white py-2 rounded-lg hover:bg-yellow-700 mt-auto">
                    Book Now
                </button>
            </div>
        </div>

        <!-- Deluxe -->
        <div class="bg-white border border-gray-200 rounded-2xl shadow-sm overflow-hidden flex flex-col">

            <div class="h-56 bg-gray-200 flex items-center justify-center">
                <span class="text-gray-500 text-sm">Image</span>
            </div>

            <div class="p-6 flex flex-col flex-1">
                <span class="text-xs bg-yellow-600 text-white px-2 py-1 rounded-full w-fit mb-2">Popular</span>

                <h2 class="text-xl font-semibold mb-2 text-black">Deluxe Package</h2>
                <p class="text-gray-600 mb-4">Best for medium-sized events.</p>
                <p class="text-2xl font-bold text-yellow-600 mb-6">₱5,000</p>

                <button class="w-full bg-yellow-600 text-white py-2 rounded-lg hover:bg-yellow-700 mt-auto">
                    Book Now
                </button>
            </div>
        </div>

        <!-- Prestige -->
        <div class="bg-white border border-gray-200 rounded-2xl shadow-sm overflow-hidden flex flex-col">

            <div class="h-56 bg-gray-200 flex items-center justify-center">
                <span class="text-gray-500 text-sm">Image</span>
            </div>

            <div class="p-6 flex flex-col flex-1">
                <h2 class="text-xl font-semibold mb-2 text-black">Prestige Package</h2>
                <p class="text-gray-600 mb-4">Perfect for large events.</p>
                <p class="text-2xl font-bold text-yellow-600 mb-6">₱10,000</p>

                <button class="w-full bg-yellow-600 text-white py-2 rounded-lg hover:bg-yellow-700 mt-auto">
                    Book Now
                </button>
            </div>
        </div>

    </div>
</div>
</body>
</html>
@endsection
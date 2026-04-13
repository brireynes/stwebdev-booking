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

<div class="max-w-7xl mx-auto py-10 px-4">
    <h1 class="text-3xl font-bold mb-6 text-white">Packages</h1>

    <div class="grid md:grid-cols-3 gap-6">

        <!-- Basic Package -->
        <div class="bg-stone-800 rounded-2xl shadow p-6 flex flex-col">
            
            <div>
                <h2 class="text-xl font-semibold mb-2 text-white">Basic Package</h2>
                <p class="text-yellow-600 mb-4">Perfect for small events.</p>
                <p class="text-2xl font-bold text-yellow-600 mb-4">₱2,000</p>

                <ul class="text-sm text-gray-300 mb-4 space-y-1">
                    <li>✔ 2 Hours</li>
                    <li>✔ Basic Setup</li>
                </ul>
            </div>

            <button class="w-full bg-yellow-600 text-white py-2 rounded-lg hover:bg-yellow-700 mt-auto">
                Book Now
            </button>

        </div>

        <!-- Deluxe Package -->
        <div class="bg-stone-800 rounded-2xl shadow p-6 flex flex-col ">
            
            <div>
                <span class="text-xs bg-yellow-600 text-white px-2 py-1 rounded-full">Popular</span>
                <h2 class="text-xl font-semibold mb-2 mt-2 text-white">Deluxe Package</h2>
                <p class="text-yellow-600 mb-4">Best for medium-sized events.</p>
                <p class="text-2xl font-bold text-yellow-600 mb-4">₱5,000</p>

                <ul class="text-sm text-gray-300 mb-4 space-y-1">
                    <li>✔ 4 Hours Coverage</li>
                    <li>✔ Full Setup</li>
                    <li>✔ 2 Staff Assistance</li>
                    <li>✔ Free Decorations</li>
                </ul>
            </div>

            <button class="w-full bg-yellow-600 text-white py-2 rounded-lg hover:bg-yellow-700 mt-auto">
                Book Now
            </button>

        </div>

        <!-- Prestige Package -->
        <div class="bg-stone-800 rounded-2xl shadow p-6 flex flex-col">
            
            <div>
                <h2 class="text-xl font-semibold mb-2 text-white">Prestige Package</h2>
                <p class="text-yellow-600 mb-4">Perfect for large events.</p>
                <p class="text-2xl font-bold text-yellow-600 mb-4">₱10,000</p>

                <ul class="text-sm text-gray-300 mb-4 space-y-1">
                    <li>✔ Full Day Coverage</li>
                    <li>✔ Premium Setup</li>
                    <li>✔ 3+ Staff Assistance</li>
                    <li>✔ Free Decorations</li>
                    <li>✔ Priority Support</li>
                </ul>
            </div>

            <button class="w-full bg-yellow-600 text-white py-2 rounded-lg hover:bg-yellow-700 mt-auto">
                Book Now
            </button>

        </div>

    </div>
</div>

</body>
</html>
@endsection
@extends('layouts.app')

@section('content')

<script>
function handleBooking(event, packageId) {
    const isLoggedIn = @json(auth()->check());

    if (!isLoggedIn) {
        event.preventDefault();

        document.getElementById('loginOverlay').classList.remove('hidden');
        document.body.style.overflow = 'hidden';

        return false;
    }

    window.location.href = `/booking/${packageId}`;
}

function closeOverlay() {
    document.getElementById('loginOverlay').classList.add('hidden');
    document.body.style.overflow = 'auto';
}
</script>

<div class="bg-gray-100">

<!-- PACKAGES SECTION -->
<div id="packages" class="max-w-7xl mx-auto px-6 py-16">

    <h2 class="text-3xl font-bold text-yellow-600 mb-10 text-center">
        Packages
    </h2>

    <div class="grid md:grid-cols-3 gap-6">

        <!-- Basic -->
        <div class="bg-white border border-gray-200 rounded-2xl shadow-sm overflow-hidden flex flex-col">

            <div class="h-56 bg-gray-200 flex items-center justify-center">
                <span class="text-gray-500 text-sm">Image</span>
            </div>

            <div class="p-6 flex flex-col flex-1">

                <h2 class="text-xl font-semibold mb-2 text-black">
                    Basic Package
                </h2>

                <p class="text-gray-600 mb-4">
                    Perfect for small events.
                </p>

                <p class="text-2xl font-bold text-yellow-600 mb-6">
                    ₱2,000
                </p>

                <a href="{{ route('booking.create', 1) }}"
                   onclick="return handleBooking(event, 1)"
                   class="w-full bg-yellow-600 text-white py-2 rounded-lg hover:bg-yellow-700 mt-auto text-center">
                    Book Now
                </a>

            </div>
        </div>

        <!-- Deluxe -->
        <div class="bg-white border border-gray-200 rounded-2xl shadow-sm overflow-hidden flex flex-col">

            <div class="h-56 bg-gray-200 flex items-center justify-center">
                <span class="text-gray-500 text-sm">Image</span>
            </div>

            <div class="p-6 flex flex-col flex-1">

                <span class="text-xs bg-yellow-600 text-white px-2 py-1 rounded-full w-fit mb-2">
                    Popular
                </span>

                <h2 class="text-xl font-semibold mb-2 text-black">
                    Deluxe Package
                </h2>

                <p class="text-gray-600 mb-4">
                    Best for medium-sized events.
                </p>

                <p class="text-2xl font-bold text-yellow-600 mb-6">
                    ₱5,000
                </p>

                <a href="{{ route('booking.create', 2) }}"
                   onclick="return handleBooking(event, 2)"
                   class="w-full bg-yellow-600 text-white py-2 rounded-lg hover:bg-yellow-700 mt-auto text-center">
                    Book Now
                </a>

            </div>
        </div>

        <!-- Prestige -->
        <div class="bg-white border border-gray-200 rounded-2xl shadow-sm overflow-hidden flex flex-col">

            <div class="h-56 bg-gray-200 flex items-center justify-center">
                <span class="text-gray-500 text-sm">Image</span>
            </div>

            <div class="p-6 flex flex-col flex-1">

                <h2 class="text-xl font-semibold mb-2 text-black">
                    Prestige Package
                </h2>

                <p class="text-gray-600 mb-4">
                    Perfect for large events.
                </p>

                <p class="text-2xl font-bold text-yellow-600 mb-6">
                    ₱10,000
                </p>

                <a href="{{ route('booking.create', 3) }}"
                   onclick="return handleBooking(event, 3)"
                   class="w-full bg-yellow-600 text-white py-2 rounded-lg hover:bg-yellow-700 mt-auto text-center">
                    Book Now
                </a>

            </div>
        </div>

    </div>
</div>

</div>

<!-- LOGIN OVERLAY -->
<div id="loginOverlay"
     class="hidden fixed inset-0 bg-black/70 backdrop-blur-sm z-50 flex items-center justify-center">

    <div class="bg-white p-8 rounded-2xl shadow-xl text-center w-[90%] max-w-md">

        <h2 class="text-2xl font-bold mb-2">Login Required</h2>
        <p class="text-gray-600 mb-6">
            You need to login before booking a package.
        </p>

        <a href="{{ route('login') }}"
           class="block bg-yellow-500 text-white py-3 rounded-xl font-semibold hover:bg-yellow-600">
            Go to Login
        </a>

        <button onclick="closeOverlay()"
                class="mt-4 text-gray-500 hover:text-black">
            Cancel
        </button>

    </div>
</div>

@endsection
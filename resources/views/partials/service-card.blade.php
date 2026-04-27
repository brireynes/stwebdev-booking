<article class="flex flex-col justify-between h-full rounded-2xl border border-gray-200 bg-white p-6 shadow-sm transition hover:shadow-md">

    <!-- Image -->
    <div class="mb-5">
        <img
            src="{{ $item->image ? asset($item->image) : asset('images/default-service.jpg') }}"
            alt="{{ $item->name }}"
            class="w-full h-48 object-cover rounded-xl border border-gray-200"
        >
    </div>

    <!-- Content -->
    <div class="flex-1">

        <h2 class="text-xl font-semibold text-gray-900 mb-2">
            {{ $item->name }}
        </h2>

        <p class="text-gray-500 text-sm mb-5">
            {{ \Illuminate\Support\Str::limit($item->description, 120) }}
        </p>

        <div class="flex items-center justify-between mb-6">
            <div>
                <span class="text-xs uppercase tracking-widest text-gray-400">
                    Price
                </span>
                <p class="text-lg font-bold text-gray-900">
                    ₱{{ number_format($item->price, 2) }}
                </p>
            </div>

            <span class="text-xs bg-gray-100 px-3 py-1 rounded-full text-gray-600">
                {{ $item->duration }} mins
            </span>
        </div>

    </div>

    <!-- Button -->
    <div class="mt-auto">
        @auth
            <a href="{{ route('booking.create', $item->id) }}"
               class="block w-full rounded-xl bg-yellow-500 px-5 py-3 text-center font-semibold text-white hover:bg-yellow-600 transition">
                Book Now
            </a>
        @else
            <button type="button"
                    onclick="openLoginModal()"
                    class="block w-full rounded-xl bg-yellow-500 px-5 py-3 text-center font-semibold text-white hover:bg-yellow-600 transition">
                Book Now
            </button>
        @endauth
    </div>

</article>
<div class="bg-white rounded-2xl border border-gray-200 shadow-sm overflow-hidden p-5">
    @if($item->image)
        <img
            src="{{ asset($item->image) }}"
            alt="{{ $item->name }}"
            class="w-full h-72 object-cover rounded-xl border border-gray-200"
        >
    @else
        <div class="w-full h-72 rounded-xl border border-gray-200 flex items-center justify-center text-gray-400">
            No image
        </div>
    @endif

    <div class="mt-6">
        <h3 class="text-2xl font-semibold text-black">
            {{ $item->name }}
        </h3>

        <p class="mt-2 text-gray-600">
            {{ \Illuminate\Support\Str::limit($item->description, 120) }}
        </p>

        <div class="mt-4 flex items-center justify-between">
            <div>
                <p class="text-sm text-gray-500">Price</p>
                <p class="text-lg font-bold text-black">
                    ₱{{ number_format($item->price, 2) }}
                </p>
            </div>

            <p class="text-sm text-gray-500">
                {{ $item->duration }} mins
            </p>
        </div>

        <div class="mt-5">
            @auth
                <a
                    href="{{ route('booking.create', $item->id) }}"
                    class="block text-center bg-black text-white px-4 py-3 rounded-xl hover:bg-gray-800 transition"
                >
                    Book Now
                </a>
            @else
                <a
                    href="{{ route('login') }}"
                    class="block text-center bg-black text-white px-4 py-3 rounded-xl hover:bg-gray-800 transition"
                >
                    Book Now
                </a>
            @endauth
        </div>
    </div>
</div>
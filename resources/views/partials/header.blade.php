<header class="sticky top-0 z-50 bg-black text-white shadow-md">
    <div class="max-w-7xl mx-auto px-6">
        <div class="flex items-center justify-between h-16">

           <div class="flex items-center gap-2">
                <span class="material-symbols-outlined text-yellow-500 text-3xl">
                    content_cut
                </span>

                <a href="{{ route('home') }}" class="text-xl font-bold text-yellow-500">
                    Bong's Salon
                </a>
            </div>

            {{-- Navigation --}}
            <nav class="hidden md:flex items-center gap-8">
                <a href="{{ route('home') }}" class="hover:text-yellow-500 transition">
                    Home
                </a>

                <a href="{{ route('services.index') }}" class="hover:text-yellow-500 transition">
                    Services
                </a>

                <a href="{{ route('contact') }}" class="hover:text-yellow-500 transition">
                    Contact
                </a>

                @auth
                    <a href="{{ route('bookings.index') }}" class="hover:text-yellow-500 transition">
                        My Bookings
                    </a>
                @endauth
            </nav>

            {{-- User Account --}}
            <div class="flex items-center gap-4">
                @auth
                    <a href="{{ route('profile.edit') }}" class="flex items-center gap-2 hover:text-yellow-500 transition">
                        <span class="material-symbols-outlined">account_circle</span>
                        <span class="hidden md:inline">{{ Auth::user()->name }}</span>
                    </a>

                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="hover:text-red-400 transition">
                            Logout
                        </button>
                    </form>
                @else
                    <a href="{{ route('login') }}"
                       class="flex items-center justify-center hover:text-yellow-500 transition"
                       aria-label="Login">
                        <span class="material-symbols-outlined text-3xl">account_circle</span>
                    </a>
                @endauth
            </div>

        </div>
    </div>
</header>
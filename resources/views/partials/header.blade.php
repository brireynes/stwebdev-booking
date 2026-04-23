    <header class="w-full z-50 bg-[#0B0B0F] border-b border-outline-variant/15">
        <nav class="flex justify-between items-center px-8 py-4 max-w-full">

            {{-- Left: Brand Identity --}}
            <div class="flex items-center gap-3 cursor-pointer active:scale-95 transition-all duration-300">
                <span class="material-symbols-outlined text-primary text-2xl">content_cut</span>
                <a href="{{ url('/') }}" class="font-headline text-2xl font-bold tracking-tighter text-[#E4E1E7]">
                Bong's Salon
                </a>
            </div>
            {{-- Center: Navigation Links --}}
            <div class="hidden md:flex items-center space-x-8">

                <a href="{{ route('home') }}"
                class="{{ request()->routeIs('home') ? 'text-[#D4AF37] border-b border-[#D4AF37] pb-1 font-bold text-lg tracking-tight' : 'text-[#D0C5AF] font-medium tracking-widest uppercase text-[10px]' }} hover:text-[#D4AF37] transition-all duration-300 ease-in-out cursor-pointer active:scale-95">
                    Home
                </a>

                <a href="{{ route('services.index') }}"
                class="{{ request()->routeIs('services.*') ? 'text-[#D4AF37] border-b border-[#D4AF37] pb-1 font-bold text-lg tracking-tight' : 'text-[#D0C5AF] font-medium tracking-widest uppercase text-[10px]' }} hover:text-[#D4AF37] transition-all duration-300 ease-in-out cursor-pointer active:scale-95">
                    Services
                </a>

                <a href="{{ route('packages.index') }}"
                class="{{ request()->routeIs('packages.*') ? 'text-[#D4AF37] border-b border-[#D4AF37] pb-1 font-bold text-lg tracking-tight' : 'text-[#D0C5AF] font-medium tracking-widest uppercase text-[10px]' }} hover:text-[#D4AF37] transition-all duration-300 ease-in-out cursor-pointer active:scale-95">
                    Packages
                </a>

                <a href="{{ route('promos.index') }}"
                class="{{ request()->routeIs('promos.*') ? 'text-[#D4AF37] border-b border-[#D4AF37] pb-1 font-bold text-lg tracking-tight' : 'text-[#D0C5AF] font-medium tracking-widest uppercase text-[10px]' }} hover:text-[#D4AF37] transition-all duration-300 ease-in-out cursor-pointer active:scale-95">
                    Promos
                </a>

                <a href="{{ route('contact') }}"
                class="{{ request()->routeIs('contact') ? 'text-[#D4AF37] border-b border-[#D4AF37] pb-1 font-bold text-lg tracking-tight' : 'text-[#D0C5AF] font-medium tracking-widest uppercase text-[10px]' }} hover:text-[#D4AF37] transition-all duration-300 ease-in-out cursor-pointer active:scale-95">
                    Contact
                </a>

                <a href="{{ route('bookings.index') }}"
                    class="{{ request()->routeIs('bookings.*') ? 'text-[#D4AF37] border-b border-[#D4AF37] pb-1 font-bold text-lg tracking-tight' : 'text-[#D0C5AF] font-medium tracking-widest uppercase text-[10px]' }} hover:text-[#D4AF37] transition-all duration-300 ease-in-out cursor-pointer active:scale-95">
                    My Bookings
                </a>
@auth
<a href="{{ route('inventory.index') }}"
   class="{{ request()->routeIs('inventory.*') ? 'text-[#D4AF37] border-b border-[#D4AF37] pb-1 font-bold text-lg tracking-tight' : 'text-[#D0C5AF] font-medium tracking-widest uppercase text-[10px]' }} hover:text-[#D4AF37] transition-all duration-300 ease-in-out cursor-pointer active:scale-95">
    Inventory
</a>
@endauth

            </div>

            {{-- Right: User Account --}}
            <div class="flex items-center gap-4">
                @auth
                    <div class="relative group">
                        <button class="flex items-center gap-2 w-10 h-10 rounded-full border border-outline-variant/30 hover:border-primary/50 transition-colors duration-300 justify-center">
                            <span class="material-symbols-outlined text-on-surface-variant text-xl">account_circle</span>
                        </button>

                        <div class="absolute right-0 mt-2 w-48 bg-[#1F1F23] border border-outline-variant/30 rounded-xl shadow-lg opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-200 z-50">
                            <div class="px-4 py-3 border-b border-outline-variant/20">
                                <p class="text-sm font-semibold text-[#E4E1E7]">{{ Auth::user()->name }}</p>
                                <p class="text-xs text-[#D0C5AF] truncate">{{ Auth::user()->email }}</p>
                            </div>
                            <a href="{{ route('profile.edit') }}"
                            class="block px-4 py-2 text-sm text-[#D0C5AF] hover:text-[#D4AF37] hover:bg-[#2A292E] transition-colors">
                                Profile
                            </a>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit"
                                        class="w-full text-left px-4 py-2 text-sm text-[#D0C5AF] hover:text-red-400 hover:bg-[#2A292E] transition-colors">
                                    Logout
                                </button>
                            </form>
                        </div>
                    </div>
                @else
                    <a href="/login"
                    class="flex items-center justify-center w-10 h-10 rounded-full border border-outline-variant/30 hover:border-primary/50 transition-colors duration-300">
                        <span class="material-symbols-outlined text-on-surface-variant text-xl">account_circle</span>
                    </a>
                @endauth
            </div>

        </nav>
    </header>
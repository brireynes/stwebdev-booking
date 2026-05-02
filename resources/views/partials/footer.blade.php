<footer class="border-t border-outline-variant bg-surface-container mt-16">
    <div class="mx-auto max-w-7xl px-6 py-12">
        <div class="grid grid-cols-1 gap-10 md:grid-cols-4">

            <div>
                <h3 class="font-headline text-xl font-bold text-on-surface">
                    Bong's Salon
                </h3>
                <p class="mt-3 text-sm text-on-surface-variant">
                    transforms your look with the latest styles and vibrant color trends. Your hair's new happy place. Book now! ✂️
                </p>
            </div>

            <div>
                <h4 class="mb-4 font-semibold text-on-surface">Explore</h4>
                <ul class="space-y-2 text-sm text-on-surface-variant">
                    <li>
                        <a href="{{ route('about') }}" class="hover:text-primary">
                            About Us
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('services.index') }}" class="hover:text-primary">
                            Services
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('contact') }}" class="hover:text-primary">
                            Contact
                        </a>
                    </li>
                </ul>
            </div>

            <div>
                <h4 class="mb-4 font-semibold text-on-surface">Bacolod City</h4>
                <p class="text-sm leading-6 text-on-surface-variant">
                    Bong's Salon
                </p>
            </div>

            <div>
                <h4 class="mb-4 font-semibold text-on-surface">Get in Touch</h4>
                <p class="text-sm text-on-surface-variant">Email: chucia18@gmail.com</p>
                <p class="mt-2 text-sm text-on-surface-variant">Phone: 0921 287 9031</p>
            </div>

        </div>

        <div class="mt-10 border-t border-outline-variant pt-4 text-sm text-on-surface-variant">
            Copyright © {{ date('Y') }} Bong's Salon. All rights reserved.
        </div>
    </div>
</footer>
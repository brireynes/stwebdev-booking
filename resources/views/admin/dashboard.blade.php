<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Bong's Salon</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-stone-900 text-white">

<div class="flex min-h-screen">

    <!-- Sidebar -->
    <aside class="w-64 bg-stone-800 p-6">
        <h2 class="text-2xl font-bold text-yellow-600 mb-8">Admin Panel</h2>

        <nav class="space-y-4">
            <a href="/admin/dashboard" class="block hover:text-yellow-600">Dashboard</a>
            <a href="/admin/services" class="block hover:text-yellow-600">Services</a>
            <a href="/admin/bookings" class="block hover:text-yellow-600">Bookings</a>
            <a href="/admin/users" class="block hover:text-yellow-600">Users</a>
            <a href="/admin/packages" class="block hover:text-yellow-600">Packages</a>
            <a href="/admin/promos" class="block hover:text-yellow-600">Promos</a>
        </nav>
    </aside>

    <!-- Main Content -->
    <main class="flex-1 p-8">

        <!-- Header -->
        <div class="mb-6">
            <h1 class="text-3xl font-bold">Dashboard Overview</h1>
            <p class="text-gray-400">Welcome to Bong's Salon Admin Panel</p>
        </div>

        <!-- Stats -->
        <div class="grid md:grid-cols-3 gap-6 mb-8">

            <!-- Total Users -->
            <div class="bg-stone-800 p-6 rounded-2xl shadow">
                <h2 class="text-sm text-gray-400">Total Users</h2>

                <!-- 🔽 BACKEND: Replace with dynamic value -->
                <!-- Controller should pass: $totalUsers -->
                <p class="text-3xl font-bold text-yellow-600 mt-2">
                    {{ $totalUsers ?? 0 }}
                </p>
            </div>

            <!-- Total Bookings -->
            <div class="bg-stone-800 p-6 rounded-2xl shadow">
                <h2 class="text-sm text-gray-400">Total Bookings</h2>

                <!-- 🔽 BACKEND: Replace with dynamic value -->
                <!-- Controller should pass: $totalBookings -->
                <p class="text-3xl font-bold text-yellow-600 mt-2">
                    {{ $totalBookings ?? 0 }}
                </p>
            </div>

            <!-- Total Services -->
            <div class="bg-stone-800 p-6 rounded-2xl shadow">
                <h2 class="text-sm text-gray-400">Total Services</h2>

                <!-- 🔽 BACKEND: Replace with dynamic value -->
                <!-- Controller should pass: $totalServices -->
                <p class="text-3xl font-bold text-yellow-600 mt-2">
                    {{ $totalServices ?? 0 }}
                </p>
            </div>

        </div>

        <!-- Overview -->
        <div class="bg-stone-800 rounded-2xl p-6 shadow mb-6">
            <h2 class="text-xl font-semibold text-yellow-600 mb-4">
                Dashboard Overview
            </h2>

            <p class="text-gray-300 leading-relaxed">
                This dashboard provides a quick overview of your salon system. 
                You can monitor total users, track bookings, and manage services efficiently. 
                Use the sidebar to navigate through different sections such as packages and promos.
            </p>
        </div>

        <!-- Dynamic Page Content -->
        <!-- 🔽 BACKEND: Other admin pages will load here -->
        <!-- Example: services, bookings, users, etc. -->
        <div>
            @yield('content')
        </div>

    </main>

</div>

</body>
</html>
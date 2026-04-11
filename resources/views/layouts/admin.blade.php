<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - @yield('title', config('app.name'))</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="min-h-screen bg-gray-100 text-black">

    <div class="flex min-h-screen">
        <aside class="w-64 bg-white border-r p-6">
            <h2 class="text-xl font-bold mb-6">Admin Panel</h2>

            <nav class="space-y-3">
                <a href="{{ route('admin.dashboard') }}" class="block text-gray-700 hover:text-black">
                    Dashboard
                </a>
                <a href="#" class="block text-gray-700 hover:text-black">
                    Bookings
                </a>
                <a href="#" class="block text-gray-700 hover:text-black">
                    Services
                </a>
                <a href="#" class="block text-gray-700 hover:text-black">
                    Users
                </a>
            </nav>
        </aside>

        <main class="flex-1 p-8">
            @yield('content')
        </main>
    </div>

</body>
</html>
@extends('layouts.admin')

@section('title', 'Users Management')

@section('content')

<div class="p-6">

    <!-- Header -->
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold text-black">Users Management</h1>
        <p class="text-gray-500 text-sm">Manage all registered users</p>
    </div>

    <!-- Success Message -->
    @if(session('success'))
        <div class="bg-green-100 text-green-700 p-3 mb-4 rounded">
            {{ session('success') }}
        </div>
    @endif

    <!-- Error Message -->
    @if(session('error'))
        <div class="bg-red-100 text-red-700 p-3 mb-4 rounded">
            {{ session('error') }}
        </div>
    @endif

    <!-- Users Table -->
    <div class="bg-white border border-gray-200 rounded-xl shadow-sm overflow-hidden">

        <table class="w-full text-left">

            <!-- Table Head -->
            <thead class="bg-gray-100 text-gray-700 text-sm uppercase tracking-wide">
                <tr>
                    <th class="p-4">ID</th>
                    <th class="p-4">Name</th>
                    <th class="p-4">Email</th>
                    <th class="p-4">Role</th>
                    <th class="p-4">Joined</th>
                    <th class="p-4 text-center">Action</th>
                </tr>
            </thead>

            <!-- Table Body -->
            <tbody class="text-gray-700">

                @forelse($users as $user)
                    <tr class="border-t hover:bg-gray-50 transition">

                        <td class="p-4">{{ $user->id }}</td>

                        <td class="p-4 font-medium">
                            {{ $user->name }}
                        </td>

                        <td class="p-4">
                            {{ $user->email }}
                        </td>

                        <td class="p-4">
                            @if($user->role == 'admin')
                                <span class="px-3 py-1 text-xs bg-yellow-200 text-yellow-800 rounded-full">
                                    Admin
                                </span>
                            @else
                                <span class="px-3 py-1 text-xs bg-gray-200 text-gray-700 rounded-full">
                                    User
                                </span>
                            @endif
                        </td>

                        <td class="p-4 text-sm text-gray-500">
                            {{ $user->created_at->format('M d, Y') }}
                        </td>

                        <!-- Action -->
                        <td class="p-4 text-center">

                            <form action="{{ route('admin.users.delete', $user->id) }}"
                                  method="POST"
                                  onsubmit="return confirm('Are you sure you want to delete this user?')">

                                @csrf
                                @method('DELETE')

                                <button class="bg-red-500 hover:bg-red-600 text-white px-4 py-1 rounded-lg text-sm transition">
                                    Delete
                                </button>

                            </form>

                        </td>

                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="text-center p-6 text-gray-500">
                            No users found.
                        </td>
                    </tr>
                @endforelse

            </tbody>

        </table>

    </div>
</div>

@endsection
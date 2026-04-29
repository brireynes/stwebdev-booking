@extends('layouts.admin')

@section('title', 'Manage Services')

@section('content')
<div class="p-6">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold">Manage Services, Packages, and Promos</h1>

        <a href="{{ route('admin.services.create') }}"
           class="bg-yellow-500 text-black px-4 py-2 rounded font-semibold">
            Add New
        </a>
    </div>

    @if(session('success'))
        <div class="mb-4 p-3 bg-green-100 text-green-700 rounded">
            {{ session('success') }}
        </div>
    @endif

    <div class="overflow-x-auto bg-white rounded shadow">
        <table class="w-full border-collapse">
            <thead>
                <tr class="bg-gray-100 text-left">
                    <th class="p-3 border">Name</th>
                    <th class="p-3 border">Type</th>
                    <th class="p-3 border">Price</th>
                    <th class="p-3 border">Duration</th>
                    <th class="p-3 border">Featured</th>
                    <th class="p-3 border">Actions</th>
                </tr>
            </thead>

            <tbody>
                @forelse($services as $service)
                    <tr>
                        <td class="p-3 border">{{ $service->name }}</td>
                        <td class="p-3 border">{{ ucfirst($service->type) }}</td>
                        <td class="p-3 border">₱{{ number_format($service->price, 2) }}</td>
                        <td class="p-3 border">{{ $service->duration }} mins</td>
                        <td class="p-3 border">
                            {{ $service->is_featured ? 'Yes' : 'No' }}
                        </td>
                        <td class="p-3 border flex gap-2">
                            <a href="{{ route('admin.services.edit', $service) }}"
                               class="bg-blue-500 text-white px-3 py-1 rounded">
                                Edit
                            </a>

                            <form action="{{ route('admin.services.delete', $service) }}"
                                  method="POST"
                                  onsubmit="return confirm('Delete this item?');">
                                @csrf
                                @method('DELETE')

                                <button type="submit"
                                        class="bg-red-500 text-white px-3 py-1 rounded">
                                    Delete
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="p-3 border text-center">
                            No services, packages, or promos found.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
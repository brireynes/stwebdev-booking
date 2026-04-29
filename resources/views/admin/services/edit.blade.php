@extends('layouts.admin')

@section('title', 'Edit Service')

@section('content')
<div class="p-6 max-w-3xl">
    <h1 class="text-2xl font-bold mb-6">Edit Service / Package / Promo</h1>

    <form action="{{ route('admin.services.update', $service) }}" method="POST" class="space-y-4">
        @csrf
        @method('PUT')

        <div>
            <label class="block font-semibold mb-1">Name</label>
            <input type="text" name="name" value="{{ old('name', $service->name) }}"
                   class="w-full border rounded p-2" required>
            @error('name') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
        </div>

        <div>
            <label class="block font-semibold mb-1">Description</label>
            <textarea name="description" class="w-full border rounded p-2" rows="4">{{ old('description', $service->description) }}</textarea>
            @error('description') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
        </div>

        <div>
            <label class="block font-semibold mb-1">Price</label>
            <input type="number" name="price" value="{{ old('price', $service->price) }}"
                   class="w-full border rounded p-2" required>
            @error('price') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
        </div>

        <div>
            <label class="block font-semibold mb-1">Duration in minutes</label>
            <input type="number" name="duration" value="{{ old('duration', $service->duration) }}"
                   class="w-full border rounded p-2" required>
            @error('duration') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
        </div>

        <div>
            <label class="block font-semibold mb-1">Type</label>
            <select name="type" class="w-full border rounded p-2" required>
                <option value="service" {{ old('type', $service->type) === 'service' ? 'selected' : '' }}>Service</option>
                <option value="package" {{ old('type', $service->type) === 'package' ? 'selected' : '' }}>Package</option>
                <option value="promo" {{ old('type', $service->type) === 'promo' ? 'selected' : '' }}>Promo</option>
            </select>
            @error('type') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
        </div>

        <div>
            <label class="flex items-center gap-2">
                <input type="checkbox" name="is_featured" value="1"
                       {{ old('is_featured', $service->is_featured) ? 'checked' : '' }}>
                <span>Feature this on homepage</span>
            </label>
        </div>

        <div class="flex gap-3">
            <button type="submit" class="bg-yellow-500 text-black px-4 py-2 rounded font-semibold">
                Update
            </button>

            <a href="{{ route('admin.services') }}" class="bg-gray-300 text-black px-4 py-2 rounded">
                Cancel
            </a>
        </div>
    </form>
</div>
@endsection
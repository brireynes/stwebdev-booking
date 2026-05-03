@extends('layouts.admin')

@section('title', 'Homepage Images')

@section('content')
<div class="p-6">
    <h1 class="text-2xl font-bold mb-6">Homepage Images</h1>

    @if(session('success'))
        <div class="mb-4 p-3 bg-green-100 text-green-700 rounded">
            {{ session('success') }}
        </div>
    @endif

    <div class="space-y-6">
        @foreach($homepageImages as $image)
            <div class="bg-white rounded shadow p-5 border">
                <h2 class="text-lg font-bold mb-2">{{ $image->title }}</h2>

                <p class="text-sm text-gray-500 mb-3">
                    Key: {{ $image->key }}
                </p>

                @if($image->image)
                    <img src="{{ asset('storage/' . $image->image) }}"
                         class="w-64 h-40 object-cover rounded mb-4">
                @else
                    <div class="w-64 h-40 bg-gray-100 rounded flex items-center justify-center text-gray-400 mb-4">
                        No image
                    </div>
                @endif

                <form action="{{ route('admin.homepage-images.update', $image) }}"
                      method="POST"
                      enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <input type="file" name="image" accept="image/*" required class="mb-3 block">

                    @error('image')
                        <p class="text-red-500 text-sm mb-2">{{ $message }}</p>
                    @enderror

                    <button type="submit"
                            class="bg-yellow-500 text-black px-4 py-2 rounded font-semibold">
                        Update Image
                    </button>
                </form>
            </div>
        @endforeach
    </div>
</div>
@endsection
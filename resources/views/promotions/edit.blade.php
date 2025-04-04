@extends('layouts.app')

@section('title', 'Edit Promotion')

@section('content')
    <div class="mb-6">
        <h1 class="text-3xl font-bold mb-2">Edit Promotion</h1>
        <p class="text-gray-600">Update the details of "{{ $promotion->title }}"</p>
    </div>

    <div class="bg-white rounded-lg shadow-md p-6">
        <form action="{{ route('promotions.update', $promotion) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-4">
                <label for="title" class="block text-gray-700 font-medium mb-2">Title</label>
                <input type="text" name="title" id="title" value="{{ old('title', $promotion->title) }}" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                @error('title')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="description" class="block text-gray-700 font-medium mb-2">Description</label>
                <textarea name="description" id="description" rows="6" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" required>{{ old('description', $promotion->description) }}</textarea>
                @error('description')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="image" class="block text-gray-700 font-medium mb-2">Image</label>
                @if ($promotion->image)
                    <div class="mb-3">
                        <img src="{{ asset('storage/' . $promotion->image) }}" alt="{{ $promotion->title }}" class="w-40 h-40 object-cover rounded-md border">
                        <p class="text-sm text-gray-500 mt-1">Current image</p>
                    </div>
                @endif
                <input type="file" name="image" id="image" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" accept="image/*">
                <p class="text-sm text-gray-500 mt-1">Upload a new image (JPEG, PNG, JPG, GIF - max 2MB) or leave blank to keep the current image</p>
                @error('image')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex justify-end">
                <a href="{{ route('promotions.show', $promotion) }}" class="bg-gray-300 hover:bg-gray-400 text-gray-800 px-4 py-2 rounded-md mr-2">Cancel</a>
                <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-md">Update Promotion</button>
            </div>
        </form>
    </div>
@endsection
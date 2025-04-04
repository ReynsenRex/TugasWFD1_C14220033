@extends('layouts.app')

@section('title', 'Add New Promotion')

@section('content')
    <div class="mb-6">
        <h1 class="text-3xl font-bold mb-2 text-red-500">Add New Promotion</h1>
        <p class="text-gray-400">Create a new promotion to showcase on the website</p>
    </div>

    <div class="bg-black rounded-lg shadow-md p-6 border border-red-500">
        <form action="{{ route('promotions.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="mb-4">
                <label for="title" class="block text-gray-300 font-medium mb-2">Title</label>
                <input type="text" name="title" id="title" value="{{ old('title') }}" class="w-full px-3 py-2 border border-gray-600 rounded-md bg-black text-white focus:outline-none focus:ring-2 focus:ring-red-500" placeholder="Enter promotion title" required>
                @error('title')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="description" class="block text-gray-300 font-medium mb-2">Description</label>
                <textarea name="description" id="description" rows="6" class="w-full px-3 py-2 border border-gray-600 rounded-md bg-black text-white focus:outline-none focus:ring-2 focus:ring-red-500" placeholder="Enter promotion description" required>{{ old('description') }}</textarea>
                <p id="description-counter" class="text-sm text-gray-400 mt-1">0/500 characters</p>
                @error('description')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="image" class="block text-gray-300 font-medium mb-2">Image</label>
                <input type="file" name="image" id="image" class="w-full px-3 py-2 border border-gray-600 rounded-md bg-black text-white focus:outline-none focus:ring-2 focus:ring-red-500" accept="image/*" onchange="previewImage(event)" required>
                <p class="text-sm text-gray-400 mt-1">Upload an image (JPEG, PNG, JPG, GIF - max 2MB)</p>
                <img id="image-preview" class="mt-4 w-40 h-40 object-cover rounded-md hidden border border-gray-600" alt="Image Preview">
                @error('image')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex justify-end">
                <a href="{{ route('promotions.index') }}" class="bg-gray-700 hover:bg-gray-800 text-white px-4 py-2 rounded-md mr-2">Cancel</a>
                <button type="submit" class="bg-red-600 hover:bg-red-700 text-white px-4 py-2 rounded-md">Create Promotion</button>
            </div>
        </form>
    </div>

    <script>
        const descriptionInput = document.getElementById('description');
        const descriptionCounter = document.getElementById('description-counter');
        descriptionInput.addEventListener('input', () => {
            const length = descriptionInput.value.length;
            descriptionCounter.textContent = `${length}/500 characters`;
        });

        function previewImage(event) {
            const imagePreview = document.getElementById('image-preview');
            const file = event.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = () => {
                    imagePreview.src = reader.result;
                    imagePreview.classList.remove('hidden');
                };
                reader.readAsDataURL(file);
            }
        }
    </script>
@endsection
@extends('layouts.app')

@section('title', $promotion->title)

@section('content')
    <div class="mb-6 flex flex-col md:flex-row md:items-center md:justify-between">
        <div>
            <h1 class="text-3xl font-bold mb-2">{{ $promotion->title }}</h1>
            <p class="text-gray-600">
                <span>Posted on {{ $promotion->created_at->format('M d, Y') }}</span>
                @if($promotion->updated_at > $promotion->created_at)
                    <span class="ml-2">(Updated on {{ $promotion->updated_at->format('M d, Y') }})</span>
                @endif
            </p>
        </div>
        <div class="mt-4 md:mt-0 flex space-x-3">
            <a href="{{ route('promotions.edit', $promotion) }}" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-md">Edit</a>
            <form action="{{ route('promotions.destroy', $promotion) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this promotion?')">
                @csrf
                @method('DELETE')
                <button type="submit" class="bg-red-600 hover:bg-red-700 text-white px-4 py-2 rounded-md">Delete</button>
            </form>
        </div>
    </div>

    <div class="bg-white rounded-lg overflow-hidden shadow-md">
        @if ($promotion->image)
            <img src="{{ asset('storage/' . $promotion->image) }}" alt="{{ $promotion->title }}" class="w-full h-80 object-cover object-center">
        @else
            <div class="bg-gray-300 w-full h-80 flex items-center justify-center">
                <span class="text-gray-500">No Image</span>
            </div>
        @endif
        <div class="p-6">
            <div class="prose max-w-none">
                <p class="whitespace-pre-line">{{ $promotion->description }}</p>
            </div>
        </div>
    </div>

    <div class="mt-6">
        <a href="{{ route('promotions.index') }}" class="text-blue-600 hover:text-blue-800 font-medium">&larr; Back to promotions</a>
    </div>
@endsection
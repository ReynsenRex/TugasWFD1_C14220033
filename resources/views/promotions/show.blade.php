@extends('layouts.app')

@section('title', $promotion->title)

@section('content')
    <div class="mb-6 flex flex-col md:flex-row md:items-center md:justify-between">
        <div>
            <h1 class="text-4xl font-extrabold mb-2 text-red-500">{{ $promotion->title }}</h1>
            <p class="text-gray-400 text-sm italic">
                {{ $promotion->subtitle ?? 'Discover amazing deals and offers!' }}
            </p>
            <p class="text-gray-400 mt-2">
                <span>Posted on {{ $promotion->created_at->format('M d, Y') }}</span>
                @if($promotion->updated_at > $promotion->created_at)
                    <span class="ml-2 text-green-500 font-semibold">(Updated on {{ $promotion->updated_at->format('M d, Y') }})</span>
                @endif
            </p>
        </div>
        <div class="mt-4 md:mt-0 flex space-x-3">
            <a href="{{ route('promotions.edit', $promotion) }}" class="bg-red-600 hover:bg-red-700 text-white px-4 py-2 rounded-md transition duration-300">Edit</a>
            <form action="{{ route('promotions.destroy', $promotion) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this promotion?')">
                @csrf
                @method('DELETE')
                <button type="submit" class="bg-gray-700 hover:bg-gray-800 text-white px-4 py-2 rounded-md transition duration-300">Delete</button>
            </form>
        </div>
    </div>

    <div class="bg-black rounded-lg overflow-hidden shadow-md border border-red-500">
        @if ($promotion->image)
            <img src="{{ asset('storage/' . $promotion->image) }}" alt="{{ $promotion->title }}" class="w-full h-80 object-cover object-center hover:scale-105 transition-transform duration-300">
        @else
            <img src="https://via.placeholder.com/800x400?text=No+Image+Available" alt="No Image" class="w-full h-80 object-cover object-center">
        @endif
        <div class="p-6">
            <div class="prose max-w-none text-gray-300">
                <p class="whitespace-pre-line">{{ $promotion->description }}</p>
            </div>
            <div class="mt-4">
                <span class="text-gray-400 text-sm">Tags:</span>
                <span class="inline-block bg-red-100 text-red-800 text-xs font-semibold mr-2 px-2.5 py-0.5 rounded">#Promotion</span>
                <span class="inline-block bg-gray-100 text-gray-800 text-xs font-semibold mr-2 px-2.5 py-0.5 rounded">#Deals</span>
            </div>
        </div>
    </div>

    <div class="mt-6 flex justify-between items-center">
        <a href="{{ route('promotions.index') }}" class="text-red-500 hover:text-red-700 font-medium flex items-center">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
            </svg>
            Back to promotions
        </a>
        <button class="bg-gray-700 hover:bg-gray-800 text-white px-4 py-2 rounded-md flex items-center">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
            </svg>
            Share
        </button>
    </div>
@endsection
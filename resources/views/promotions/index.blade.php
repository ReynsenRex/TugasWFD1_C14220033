@extends('layouts.app')

@section('title', 'Homepage - Promotions')

@section('content')
    <div class="mb-6">
        <h1 class="text-3xl font-bold mb-2">Latest Promotions</h1>
        <p class="text-gray-600">Check out our current promotions and special offers!</p>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @forelse ($promotions as $promotion)
            <div class="bg-white rounded-lg overflow-hidden shadow-md hover:shadow-lg transition duration-300">
                @if ($promotion->image)
                    <img src="{{ asset('storage/' . $promotion->image) }}" alt="{{ $promotion->title }}" class="w-full h-48 object-cover object-center">
                @else
                    <div class="bg-gray-300 w-full h-48 flex items-center justify-center">
                        <span class="text-gray-500">No Image</span>
                    </div>
                @endif
                <div class="p-4">
                    <h2 class="text-xl font-semibold mb-2 truncate">{{ $promotion->title }}</h2>
                    <p class="text-gray-600 mb-4 line-clamp-3">{{ \Illuminate\Support\Str::limit($promotion->description, 100) }}</p>
                    <div class="flex justify-between items-center">
                        <a href="{{ route('promotions.show', $promotion) }}" class="text-blue-600 hover:text-blue-800 font-medium">View Details</a>
                        <span class="text-sm text-gray-500">{{ $promotion->created_at->format('M d, Y') }}</span>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-span-full text-center py-10">
                <p class="text-gray-500 text-lg">No promotions found.</p>
                <a href="{{ route('promotions.create') }}" class="mt-4 inline-block bg-blue-600 hover:bg-blue-700 text-white px-6 py-2 rounded-md">Add New Promotion</a>
            </div>
        @endforelse
    </div>

    <div class="mt-8">
        {{ $promotions->links() }}
    </div>
@endsection
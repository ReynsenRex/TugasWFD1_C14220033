@extends('layouts.app')

@section('title', 'Homepage - Promotions')

@section('content')
    <div class="mb-6">
        <h1 class="text-3xl font-bold mb-2 text-red-500">Explore Our Latest Promotions</h1>
        <p class="text-gray-400">Find the best deals and offers tailored just for you!</p>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @forelse ($promotions as $promotion)
            <div class="bg-black text-white rounded-lg overflow-hidden shadow-md hover:shadow-lg transition duration-300 relative border border-red-500">
                @if ($promotion->image)
                    <div class="relative">
                        <img src="{{ asset('storage/' . $promotion->image) }}" alt="{{ $promotion->title }}" class="w-full h-48 object-cover object-center">
                        <div class="absolute inset-0 bg-gradient-to-t from-black via-transparent to-transparent opacity-70"></div>
                    </div>
                @else
                    <div class="bg-gray-800 w-full h-48 flex items-center justify-center">
                        <span class="text-gray-500">No Image Available</span>
                    </div>
                @endif
                <div class="p-4">
                    <h2 class="text-xl font-semibold mb-2 truncate text-red-500">{{ $promotion->title }}</h2>
                    <p class="text-gray-400 mb-4 line-clamp-3">{{ \Illuminate\Support\Str::limit($promotion->description, 100) }}</p>
                    <div class="flex justify-between items-center">
                        <a href="{{ route('promotions.show', $promotion) }}" class="bg-red-600 hover:bg-red-700 text-white px-4 py-2 rounded-md transition duration-300">Read More</a>
                        <span class="text-sm text-gray-500">{{ $promotion->created_at->format('M d, Y') }}</span>
                    </div>
                </div>
                @if ($promotion->created_at->diffInDays(now()) <= 7)
                    <span class="absolute top-2 left-2 bg-green-500 text-white text-xs font-semibold px-2 py-1 rounded">New</span>
                @endif
            </div>
        @empty
            <div class="col-span-full text-center py-10">
                <p class="text-gray-400 text-lg">No promotions available at the moment.</p>
                <a href="{{ route('promotions.create') }}" class="mt-4 inline-block bg-red-600 hover:bg-red-700 text-white px-6 py-2 rounded-md">Add New Promotion</a>
            </div>
        @endforelse
    </div>

    <div class="mt-8 flex justify-center">
        {{ $promotions->links('pagination::tailwind') }}
    </div>
@endsection
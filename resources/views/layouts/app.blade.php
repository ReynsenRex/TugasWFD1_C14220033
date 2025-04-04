<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Promotion Website')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @yield('styles')
</head>
<body class="bg-black text-white min-h-screen flex flex-col">
    <header class="bg-red-600 text-white shadow-md">
        <div class="container mx-auto px-4 py-4">
            <div class="flex justify-between items-center">
                <a href="{{ route('promotions.index') }}" class="text-2xl font-bold">PromotionEcen</a>
                <nav class="space-x-4">
                    <a href="{{ route('promotions.index') }}" class="hover:underline">Home</a>
                    <a href="{{ route('promotions.create') }}" class="bg-red-700 hover:bg-red-800 px-4 py-2 rounded-md">Add Promotion</a>
                </nav>
            </div>
        </div>
    </header>

    <main class="container mx-auto px-4 py-8 flex-grow">
        @if (session('success'))
            <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-6" role="alert">
                <p>{{ session('success') }}</p>
            </div>
        @endif

        @yield('content')
    </main>

    <footer class="bg-red-800 text-white py-6">
        <div class="container mx-auto px-4">
            <div class="flex flex-col md:flex-row justify-between items-center">
                <div class="mb-4 md:mb-0">
                    <h3 class="text-xl font-bold">PromotionEcen</h3>
                    <p class="text-gray-300">Find the best promotions here!</p>
                </div>
                <div class="text-gray-300">
                    &copy; {{ date('Y') }} Ecen.
                </div>
            </div>
        </div>
    </footer>

    @yield('scripts')
</body>
</html>
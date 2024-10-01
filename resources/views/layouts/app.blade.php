<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Nhóm 1 Laravel</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
    <link rel="icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">
    <link rel="icon" href="{{ asset('favicon.png') }}" type="image/png">
    <link rel="icon" href="{{ asset('favicon.svg') }}" type="image/svg+xml">
    <script src="//unpkg.com/alpinejs" defer></script>
    @vite('resources/css/app.css')
</head>
<body style="min-height: 100vh;">
    <header class="bg-gray-800 pt-3 pb-4">
        <div class="container mx-auto px-4 flex items-center justify-between">
            <a href="/" class="text-base md:text-xl lg:text-2xl font-bold text-red-700">
                LaravelMovies
            </a>
            <nav class="flex items-center text-xs md:text-sm lg:text-base space-x-3 md:space-x-4 lg:space-x-6 text-[#c7c0c0]">
                <a href="/" style="{{ request()->is('/') ? 'text-shadow: 1px 2px 7px rgba(249, 12, 98, 1)' : '' }}" class='{{ request()->is('/') ? "text-red-500 scale-[1.17] px-[2px] md:px-[6px] lg:px-3" : "hover:text-red-700 duration-300 border-b border-b-transparent" }}' >Home</a>
                <a href="/tvshows" style="{{ request()->is('tvshows') ? 'text-shadow: 1px 2px 7px rgba(249, 12, 98, 1)' : '' }}" class='{{ request()->is('tvshows') ? "text-red-500 scale-[1.17] px-[2px] md:px-[6px] lg:px-3" : "hover:text-red-700 duration-300 border-b border-b-transparent" }}' >TV Shows</a>
                <a href="/movies" style="{{ request()->is('movies') ? 'text-shadow: 1px 2px 7px rgba(249, 12, 98, 1)' : '' }}" class='{{ request()->is('movies') ? "text-red-500 scale-[1.17] px-[2px] md:px-[6px] lg:px-3" : "hover:text-red-700 duration-300 border-b border-b-transparent" }}' >Movies</a>
                <a href="/populars" style="{{ request()->is('populars') ? 'text-shadow: 1px 2px 7px rgba(249, 12, 98, 1)' : '' }}" class='{{ request()->is('populars') ? "text-red-500 scale-[1.17] px-[2px] md:px-[6px] lg:px-3" : "hover:text-red-700 duration-300 border-b border-b-transparent" }}' >New & Popular</a>
                <a href="#" style="{{ false ? 'text-shadow: 1px 2px 7px rgba(249, 12, 98, 1)' : '' }}" class='{{ false ? "text-red-500 scale-[1.17] px-[2px] md:px-[6px] lg:px-3" : "hover:text-red-700 duration-300 border-b border-b-transparent" }}' >My List</a>
            </nav>
            <div class="flex items-center space-x-1 md:space-x-2 lg:space-x-4 pt-1 text-xs md:text-lg lg:text-xl text-[#7a8bd8]">
                <i class="fas fa-search w-5 h-5"></i>
                <i class="fas fa-bell w-5 h-5 hidden md:block"></i>
                <a href="/register" class="flex pb-[1px] md:pb-[2px]" style="text-decoration: none;">
                    <i class="fas fa-user w-5 h-5"></i>
                </a>
            </div>
        </div>
    </header>
{{--     
    <header class="absolute top-0 left-0 w-full p-4 z-20">
        <nav class="flex justify-between items-center">
            <div class="text-xl font-bold">plex</div>
            <ul class="flex space-x-6">
                <li class="group relative">
                    <a href="#" class="text-white hover:text-gray-400">Home</a>
                </li>
                <li class="group relative">
                    <a href="#" class="text-white hover:text-gray-400">Live TV</a>
                    <!-- Dropdown -->
                    <div class="absolute left-0 mt-2 w-48 bg-white text-black rounded-lg opacity-0 group-hover:opacity-100 transition-all duration-500 ease-in-out">
                        <ul class="p-4">
                            <li><a href="#" class="block hover:bg-gray-100 p-2">Featured Channels</a></li>
                            <li><a href="#" class="block hover:bg-gray-100 p-2">Categories</a></li>
                        </ul>
                    </div>
                </li>
                <li class="group relative">
                    <a href="#" class="text-white hover:text-gray-400">On Demand</a>
                    <!-- Dropdown -->
                    <div class="absolute left-0 mt-2 w-48 bg-white text-black rounded-lg opacity-0 group-hover:opacity-100 transition-all duration-500 ease-in-out">
                        <ul class="p-4">
                            <li><a href="#" class="block hover:bg-gray-100 p-2">Movies & TV Shows</a></li>
                            <li><a href="#" class="block hover:bg-gray-100 p-2">Most Popular</a></li>
                        </ul>
                    </div>
                </li>
                <li class="group relative">
                    <a href="#" class="text-white hover:text-gray-400">Discover</a>
                </li>
            </ul>
            <div>
                <a href="#" class="text-white hover:text-gray-400">Sign In</a>
            </div>
        </nav>
    </header> --}}

    <main style="flex: 1;" class="bg-gray-950 text-gray-100 min-h-screen">
        @yield('content')
    </main>

    <footer class="bg-gray-800 py-3">
        <div class="container mx-auto px-4 text-center text-gray-400">
            <p>&copy; 2030 LaravelMovies. All rights reserved.</p>
        </div>
    </footer>
</body>
</html>
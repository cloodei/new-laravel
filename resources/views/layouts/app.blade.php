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
<body>
    <header class="bg-gray-800 pt-3 pb-4">
        <div class="container mx-auto px-4 flex items-center justify-between">
            <a href="/" class="text-base md:text-xl lg:text-2xl font-bold text-red-700">
                LaravelMovies
            </a>
            <nav class="flex items-center text-xs md:text-sm lg:text-base space-x-3 md:space-x-4 lg:space-x-6 text-[#c7c0c0]">
                <a href="/" class='{{ request()->is('/') ? "text-red-400 scale-[1.15] bg-slate-950 px-[6px] md:px-2 lg:px-[12px] pb-[2px] pt-[1px] md:pb-[4px] md:pt-[3px] rounded-lg" : "hover:text-red-700 duration-300 border-b border-b-transparent" }}' >Home</a>
                <a href="/tvshows" class='{{ request()->is('tvshows') ? "text-red-400 scale-[1.15] bg-slate-950 px-[6px] md:px-2 lg:px-[12px] pb-[2px] pt-[1px] md:pb-[4px] md:pt-[3px] rounded-lg" : "hover:text-red-700 duration-300 border-b border-b-transparent" }}' >TV Shows</a>
                <a href="/movies" class='{{ request()->is('movies') ? "text-red-400 scale-[1.15] bg-slate-950 px-[6px] md:px-2 lg:px-[12px] pb-[2px] pt-[1px] md:pb-[4px] md:pt-[3px] rounded-lg" : "hover:text-red-700 duration-300 border-b border-b-transparent" }}' >Movies</a>
                <a href="/populars" class='{{ request()->is('populars') ? "text-red-400 scale-[1.15] bg-slate-950 px-[6px] md:px-2 lg:px-[12px] pb-[2px] pt-[1px] md:pb-[4px] md:pt-[3px] rounded-lg" : "hover:text-red-700 duration-300 border-b border-b-transparent" }}' >New & Popular</a>
                <a href="#" class='{{ false ? "text-red-400 scale-[1.15] bg-slate-950 px-[6px] md:px-2 lg:px-[12px] pb-[2px] pt-[1px] md:pb-[4px] md:pt-[3px] rounded-lg" : "hover:text-red-700 duration-300 border-b border-b-transparent" }}' >My List</a>
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

    <main>
        @yield('content')
    </main>

    <footer class="bg-gray-800 py-3">
        <div class="container mx-auto px-4 text-center text-gray-400">
            <p>&copy; 2030 LaravelMovies. All rights reserved.</p>
        </div>
    </footer>
</body>
</html>
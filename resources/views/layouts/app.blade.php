<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Nhóm 1 Laravel</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
    @vite('resources/css/app.css')
</head>
<body>
    <header class="bg-gray-800 pt-3 pb-4">
        <div class="container mx-auto px-4 flex items-center justify-between">
            <a href="/" class="text-lg md:text-xl lg:text-2xl font-bold text-red-700">
                LaravelMovies
            </a>
            <nav class="flex text-xs md:text-sm lg:text-base space-x-3 md:space-x-4 lg:space-x-6 text-[#c7c0c0]">
                <a href="#" class="hover:text-red-500 duration-300">Home</a>
                <a href="#" class="hover:text-red-500 duration-300">TV Shows</a>
                <a href="#" class="hover:text-red-500 duration-300">Movies</a>
                <a href="#" class="hover:text-red-500 duration-300">New & Popular</a>
                <a href="#" class="hover:text-red-500 duration-300">My List</a>
            </nav>
            <div class="flex space-x-4 pt-1 text-[#80d7ff]">
                <i class="fas fa-search w-5 h-5"></i>
                <i class="fas fa-bell w-5 h-5"></i>
                <i class="fas fa-user w-5 h-5"></i>
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
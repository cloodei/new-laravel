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
            <a href="/" class="text-2xl font-bold text-red-700">
                LaravelMovies
            </a>
            <nav class="hidden md:flex space-x-6 text-[#c7c0c0]">
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

    <div class="min-h-screen bg-gray-900 text-gray-100">
        <main class="container mx-auto px-4 py-8 pt-0">
            <section class="mb-12">
                <div class="relative h-96 rounded-lg overflow-hidden">
                    
                    <img
                        alt="Featured Movie"
                        class="w-full h-full object-cover"
                        src="https://brawlhalla.wiki.gg/images/thumb/b/b0/Gridiron_Xull.png/609px-Gridiron_Xull.png"
                    />
                    <div class="absolute inset-0 bg-gradient-to-t from-gray-900 to-transparent"></div>
                    <div class="absolute bottom-0 left-0 p-6">
                        <h1 class="text-4xl font-bold mb-2">Featured Movie: Laravel</h1>
                        <p class="text-lg mb-4">Laravel thing php thing laravel and php thing.</p>
                        <x-button class="bg-red-600 hover:bg-red-700">
                            <i class="fas fa-play w-4 h-4 mr-2"></i>
                            Play
                        </x-button>
                    </div>
                </div>
            </section>
    
            @foreach ($genres as $genre)
            <section class="mb-12">
                <h2 class="text-2xl font-semibold mb-4">{{ $genre['name'] }} Movies</h2>
                <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                    @foreach ($genre['movies'] as $movie)
                    <div class="relative group movies-bg">
                        <img
                            alt="{{ $movie }}"
                            class="w-full h-48 object-cover rounded-lg transition-transform duration-200 group-hover:scale-105"
                            src="https://brawlhalla.wiki.gg/images/thumb/b/b0/Gridiron_Xull.png/609px-Gridiron_Xull.png"
                        />
                        <div class="absolute inset-0 bg-black bg-opacity-0 group-hover:bg-opacity-80 transition-opacity duration-200 rounded-lg flex flex-col items-center justify-center opacity-0 group-hover:opacity-100">
                            <h3 class="text-lg font-semibold text-center mb-2">{{ $movie }}</h3>
                            <p class="text-sm text-center mb-2">A brief description of the movie plot.</p>
                            <div class="flex items-center text-sm mb-2">
                                <i class="fas fa-clock w-4 h-4 mr-1"></i>
                                <span>2h 15m</span>
                            </div>
                            <x-button variant="ghost" size="sm" class="text-white transition duration-300 hover:bg-[#c2c2d6] hover:text-[#362ea7]">
                                <i class="fas fa-play w-4 h-4 mr-2"></i>
                                Play
                            </x-button>
                        </div>
                        <span class="mt-2">
                            <i class="fas fa-star w-4 h-4 mr-1"></i>
                            <span>5.0</span>
                        </span>
                    </div>
                    @endforeach
                </div>
            </section>
            @endforeach
        </main>
    </div>

    <footer class="bg-gray-800 py-3">
        <div class="container mx-auto px-4 text-center text-gray-400">
            <p>&copy; 2030 LaravelMovies. All rights reserved.</p>
        </div>
    </footer>
</body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
    <link rel="icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">
    <script src="//unpkg.com/alpinejs" defer></script>
    @vite('resources/css/app.css')
</head>
<body>
    <div class="min-h-screen bg-gray-900 text-gray-100">
        <div class="flex">
            <!-- Sidebar -->
            <aside class="w-40 lg:w-64 bg-gray-800 min-h-screen p-4">
                <h1 class="text-2xl font-bold mb-8">ADMIN</h1>
                <nav>
                    <a href="/admin" class="w-full justify-start mb-2 block {{ request()->is('admin') ? 'bg-gray-700' : 'hover:bg-gray-700' }} p-2 rounded-md">
                        <i class="fa-solid fa-chart-line mr-2 h-4 w-4"></i>
                        Dashboard
                    </a>
                    <a href="/admin/movies" class="w-full justify-start mb-2 block {{ request()->is('admin/movies') ? 'bg-gray-700' : 'hover:bg-gray-700' }} p-2 rounded-md">
                        <i class="fa-solid fa-video mr-2 h-4 w-4"></i>
                        Movies
                    </a>
                    <a href="/admin/tvshows" class="w-full justify-start mb-2 block {{ request()->is('admin/tvshows') ? 'bg-gray-700' : 'hover:bg-gray-700' }} p-2 rounded-md">
                        <i class="fa-solid fa-tv mr-2 h-4 w-4"></i>
                        TV Shows
                    </a>
                    <a href="/admin/categories" class="w-full justify-start mb-2 block {{ request()->is('admin/categories') ? 'bg-gray-700' : 'hover:bg-gray-700' }} p-2 rounded-md">
                        <i class="fa-solid fa-list-ul mr-2 h-4 w-4"></i>
                        Categories
                    </a>
                    <a href="/admin/genres" class="w-full justify-start block {{ request()->is('admin/genres') ? 'bg-gray-700' : 'hover:bg-gray-700' }} p-2 rounded-md">
                        <i class="fa-solid fa-icons mr-2 h-4 w-4"></i>
                        Genres
                    </a>
                </nav>
                <h1 class="text-2xl font-bold my-8">USERS</h1>
                <nav>
                    <a href="/" class="w-full justify-start mb-2 block p-2 rounded-md hover:bg-gray-900">
                        <i class="fa-solid fa-house mr-2 h-4 w-4"></i>
                        Homepage
                    </a>
                    <a href="/movies" class="w-full justify-start mb-2 block p-2 rounded-md hover:bg-gray-900">
                        <i class="fa-solid fa-video mr-2 h-4 w-4"></i>
                        Movies
                    </a>
                    <a href="/tvshows" class="w-full justify-start mb-2 block p-2 rounded-md hover:bg-gray-900">
                        <i class="fa-solid fa-tv mr-2 h-4 w-4"></i>
                        TV Shows
                    </a>
                    <a href="/populars" class="w-full justify-start mb-2 block p-2 rounded-md hover:bg-gray-900">
                        <i class="fa-solid fa-tv mr-2 h-4 w-4"></i>
                        New & Popular
                    </a>
                </nav>
            </aside>

            <main class="flex-1 p-8">
                @yield('content')
            </main>
        </div>
    </div>
</body>
</html>
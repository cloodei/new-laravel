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
            <aside class="w-40 lg:w-64 bg-gray-800 min-h-screen p-4 flex flex-col justify-between">
                <div class="sidenav-content">
                    <h1 class="text-2xl font-bold mb-5">ADMIN</h1>
                    <nav class="text-sm">
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
                        <a href="/admin/genres" class="w-full justify-start mb-7 block {{ request()->is('admin/genres') ? 'bg-gray-700' : 'hover:bg-gray-700' }} p-2 rounded-md">
                            <i class="fa-solid fa-icons mr-2 h-4 w-4"></i>
                            Genres
                        </a>
                    </nav>
                    <h1 class="text-2xl font-bold pt-3 mb-5 border-t border-t-gray-300">USERS</h1>
                    <nav class="text-sm">
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
                </div>
                <form id="logout-form" action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="button" id="logout-button" class="rounded-md hover:bg-gray-700 transition p-[8px] w-full text-start font-semibold text-2xl">
                        <i class="fa-solid fa-power-off mr-1"></i>
                        LOGOUT
                    </button>
                </form>
            </aside>

            <main class="flex-1 p-8">
                @yield('content')
            </main>
        </div>
    </div>
    
    <div id="logout-modal" class="fixed inset-0 items-center justify-center bg-black bg-opacity-[0.65] hidden z-50">
        <div class="bg-gray-700 p-6 rounded-lg shadow-lg text-center text-white z-40">
            <h2 class="text-xl font-bold mb-4">Confirm Logout</h2>
            <p>Are you sure you want to logout?</p>
            <div class="mt-4 flex justify-center gap-4">
                <button id="confirm-logout" class="bg-emerald-600 border border-emerald-300 text-white px-5 py-2 rounded-md hover:bg-emerald-400 transition">Yes</button>
                <button id="cancel-logout" class="bg-red-700 border border-[#e94c66] px-5 py-2 rounded-md hover:bg-red-500 transition">No</button>
            </div>
        </div>
    </div>

    <script>
        document.getElementById('logout-button').addEventListener('click', function() {
            document.getElementById('logout-modal').classList.remove('hidden');
            document.getElementById('logout-modal').classList.add('flex');
        });
    
        document.getElementById('confirm-logout').addEventListener('click', function() {
            document.getElementById('logout-form').submit();
        });
    
        document.getElementById('cancel-logout').addEventListener('click', function() {
            document.getElementById('logout-modal').classList.add('hidden');
            document.getElementById('logout-modal').classList.remove('flex');
        });
    </script>
</body>
</html>
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
    <link rel="icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    @vite('resources/css/app.css')
    @livewireStyles
</head>
<body>
    <div class="min-h-screen bg-gray-900 text-gray-100">
        <div class="flex">
            <aside class="w-40 lg:w-64 bg-gray-900 h-screen overflow-y-auto p-4 flex flex-col justify-between sidenav-scrollbar">
                <div class="">
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
                        <a href="/admin/genres" class="w-full justify-start mb-2 block {{ request()->is('admin/genres') ? 'bg-gray-700' : 'hover:bg-gray-700' }} p-2 rounded-md">
                            <i class="fa-solid fa-icons mr-2 h-4 w-4"></i>
                            Genres
                        </a>
                    </nav>
                    <h1 class="text-2xl font-bold pt-[10px] mb-5 mt-6 border-t border-t-gray-300">MAIN</h1>
                    <nav class="text-sm mb-3">
                        <a href="/" class="w-full justify-start mb-2 block p-2 rounded-md hover:bg-gray-700">
                            <i class="fa-solid fa-house mr-2 h-4 w-4"></i>
                            Homepage
                        </a>
                        <a href="/movies" class="w-full justify-start mb-2 block p-2 rounded-md hover:bg-gray-700">
                            <i class="fa-solid fa-video mr-2 h-4 w-4"></i>
                            Movies
                        </a>
                        <a href="/tvshows" class="w-full justify-start mb-2 block p-2 rounded-md hover:bg-gray-700">
                            <i class="fa-solid fa-tv mr-2 h-4 w-4"></i>
                            TV Shows
                        </a>
                        <a href="/populars" class="w-full justify-start mb-2 block p-2 rounded-md hover:bg-gray-700">
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

            <div class="flex-1 flex flex-col overflow-hidden">
                <!-- Header -->
                <header class="flex items-center justify-between py-2 px-[10px] bg-gray-900">
                    <button class="lg:hidden" onclick="toggleSidebar()">
                        <i class="fas fa-chevron-down text-lg pt-[2px]"></i>
                    </button>
                    <img src="{{ asset('storage/images/officialLogo2.svg') }}" class="h-[42px]" alt="">
                    <div class="flex items-center">
                        <input type="search" placeholder="Search..." class="w-48 lg:w-64 py-2 pl-4 mr-4 bg-gray-700 text-white rounded-md">
                        <button class="px-3 py-[5px] rounded-xl hover:bg-slate-500 transition duration-300">
                            <i class="fas fa-bell text-base pt-[2px]"></i>
                        </button>
                        <button class="font-semibold text-[22px] mx-3 ml-1 px-[15px] py-[3px] rounded-lg hover:bg-slate-500 transition duration-300">
                            ROOT
                        </button>
                    </div>
                </header>
                <!-- Main Content -->
                <main class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-950 p-6">
                    @yield('content')
                </main>
            </div>
        </div>
    </div>
    
    @livewireScripts

    <div id="logout-modal" class="fixed flex bg-opacity-65 opacity-0 transition duration-300 inset-0 items-center justify-center z-[-1]">
        <div class="bg-gray-700 p-6 rounded-lg shadow-lg text-center text-white z-40">
            <h2 class="text-xl font-bold mb-4">Confirm Logout</h2>
            <p>Are you sure you want to logout?</p>
            <div class="mt-4 flex justify-center gap-4">
                <button id="confirm-logout" class="bg-emerald-700 border border-emerald-300 text-white px-5 py-2 rounded-md hover:bg-emerald-400 transition">Yes</button>
                <button id="close-modal" class="bg-red-700 border border-rose-300 px-5 py-2 rounded-md hover:bg-red-500 transition">No</button>
            </div>
        </div>
    </div>

    <script>
        document.getElementById('logout-button').addEventListener('click', () => {
            const modal = document.getElementById('logout-modal');
            modal.classList.remove('z-[-1]');
            modal.classList.remove('opacity-0');
            modal.classList.add('bg-black');
            modal.classList.add('z-[1000]');
            modal.classList.add('opacity-100');
        });

        document.getElementById('close-modal').addEventListener('click', () => {
            const modal = document.getElementById('logout-modal');
            modal.classList.remove('bg-black');
            modal.classList.remove('z-[1000]');
            modal.classList.remove('opacity-100');
            modal.classList.add('z-[-1]');
            modal.classList.add('opacity-0');
        });

        document.getElementById('confirm-logout').addEventListener('click', () => {
            document.getElementById('logout-form').submit();
        });
    </script>

</body>
</html>
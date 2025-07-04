<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Nhóm 1 Laravel</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
    <link rel="stylesheet" href="{{ asset('css/movies.css') }}">
    <link rel="icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Chakra+Petch:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Be+Vietnam+Pro:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:ital,opsz,wght@0,9..40,100..1000;1,9..40,100..1000&display=swap" rel="stylesheet">
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    @vite('resources/css/app.css')
</head>
<body class="bg-black">
    <header class="py-0 fixed top-0 flex px-4 lg:px-10 navbar-bg" style="z-index: 1000; border-bottom: 1px solid rgba(138, 152, 226, 0.3); width: 100%; border-top: none;">
        <div class="px-0 flex items-center justify-between w-full">
            <div class="flex gap-5 md:gap-7 lg:gap-10">
                <a href="/" class="">
                    <img src="{{ asset('storage/images/officialLogo2.svg') }}" class="lg:h-[50px] md:h-[42px] h-9 my-[1px]" alt="">
                </a>
                <nav class="flex items-center text-sm lg:text-lg space-x-3 md:space-x-4 lg:space-x-6 text-gray-200" style="font-family: 'DM Sans', sans-serif;">
                    <div>
                        <a href="/" style="{{ request()->is('/') ? 'text-shadow: 1px 2px 7px rgba(249, 12, 98, 0.7); transform: scale(1.17); display: inline-block; filter: drop-shadow(-4px 2px 32px #dc093e);' : '' }}" class='flex items-center {{ request()->is('/') ? "text-red-500 scale-[1.17] pl-[2px] md:pl-[6px] lg:pl-3 pr-[1px] md:pr-[4px] lg:pr-[9px]" : "hover:text-red-700 duration-300 gap-[6px]" }}' >
                            <i class="fa-solid fa-house lg:text-base"></i>
                            Home
                        </a>
                    </div>
                    <div class="relative">
                        <a href="/tvshows" id="showsDD" style="{{ request()->is('tvshows') ? 'text-shadow: 1px 2px 7px rgba(249, 12, 98, 0.7); transform: scale(1.17); display: inline-block; filter: drop-shadow(-4px 2px 32px #dc093e);' : '' }}" class='flex items-center {{ request()->is('tvshows') ? "text-red-500 scale-[1.17] pl-[2px] md:pl-[6px] lg:pl-3 pr-[1px] md:pr-[4px] lg:pr-[9px]" : "hover:text-red-700 duration-300 gap-[6px]" }}' >
                            <i class="fa-solid fa-tv lg:text-base"></i>
                            TV Shows
                        </a>
                    </div>
                    <div class="relative">
                        <a href="/movies" id="moviesDD" style="{{ request()->is('movies') ? 'text-shadow: 1px 2px 7px rgba(249, 12, 98, 0.7); transform: scale(1.17); display: inline-block; filter: drop-shadow(-4px 2px 32px #dc093e);' : '' }}" class='flex items-center {{ request()->is('movies') ? "text-red-500 pl-[2px] md:pl-[6px] lg:pl-3 pr-[1px] md:pr-[4px] lg:pr-[9px]" : "hover:text-red-700 duration-300 gap-[6px]" }}' >
                            <i class="fa-solid fa-video lg:text-base"></i>
                            Movies
                        </a>
                    </div>
                    {{-- @auth
                        <a href="/watchlist" style="{{ false ? 'text-shadow: 1px 2px 7px rgba(249, 12, 98, 0.7)' : '' }}" class='flex items-center {{ false ? "text-red-500 scale-[1.17] pl-[2px] md:pl-[6px] lg:pl-3 pr-[1px] md:pr-[4px] lg:pr-[9px]" : "hover:text-red-700 duration-300 gap-[6px]" }}'>
                            <i class="fa-solid fa-clock lg:text-base text-sm"></i>
                            My List
                        </a>
                    @endauth --}}
                </nav>
            </div>
            <div class="flex items-center space-x-1 md:space-x-3 lg:space-x-5 pt-1 text-xs md:text-lg lg:text-xl text-gray-300">
                <a href="/search"><i class="fas pt-1 md:pt-0 fa-search w-5 h-5"></i></a>
                <i class="fas fa-bell w-5 h-5 hidden md:block"></i>
                @if($role === 'user')
                <div class="relative">
                    <a href="/profile" id="profile-img" class="cursor-pointer rounded-full w-5 h-5 md:w-7 md:h-7 pb-[1px] md:pb-[2px] lg:pb-[3px] flex items-center justify-center">
                        @if(Auth::user()->image)
                            <img src="{{ asset('storage/' . Auth::user()->image) }}" class="rounded-full w-full h-full object-cover" alt="">
                        @else
                            <img src="{{ asset('storage/images/user-placeholder.png') }}" class="object-cover rounded-full"></img>
                        @endif
                    </a>
                    <div class="absolute navbar-dd invisible right-[-12px] mt-2 ml-0 w-24 lg:w-40 bg-[#101422] border border-[#6c6a75bd] text-zinc-50 rounded-lg opacity-0 transition-all duration-[450ms] ease-in-out z-10" style="box-shadow: rgba(64, 105, 105, 0.25) 0px 32px 60px, rgba(64, 105, 105, 0.15) 0px -12px 30px, rgba(64, 105, 105, 0.15) 0px 4px 6px, rgba(64, 105, 105, 0.2) 0px 12px 13px, rgba(64, 105, 105, 0.12) 0px -3px 5px;">
                        <div class="relative border-b border-b-[#9aa3bb] px-2">
                            <p data-fullname="{{ Auth::user()->name }}" class="text-xl truncate text-center font-semibold mt-2 pb-[10px]">
                                {{ Auth::user()->name }}
                            </p>
                            <div class="popover">
                                {{ Auth::user()->name }}
                            </div>
                        </div>
                        <ul class="px-[6px] pb-3 pt-2 flex flex-col justify-center gap-1 text-base">
                            <a href="/profile" class="rounded-md hover:bg-gray-800 transition py-[4px] px-3 flex items-center">
                                <p class="flex-1">Profile</p>
                                <div class="fa-regular fa-address-card pt-[1px] ml-auto"></div>
                            </a>
                            <div class="flex items-center justify-between rounded-md hover:bg-gray-800 transition cursor-pointer py-[4px] px-3 pr-[9px]">
                                <a href="/favorites">Favorites</a>
                                <i class="fa-regular fa-heart pt-[1px]"></i>
                            </div>
                            <div class="flex items-center justify-between rounded-md hover:bg-gray-800 transition cursor-pointer py-[4px] px-3 pr-[9px]">
                                <a href="/watchlist">Watchlist</a>
                                <i class="fa-regular fa-clock pt-[2px]"></i>
                            </div>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="flex: 1;">
                                @csrf
                                <button type="button" id="logout-button2" class="rounded-md hover:bg-gray-700 transition py-[4px] px-3 w-full text-start">Logout</button>
                            </form>
                        </ul>
                    </div>
                </div>
                @elseif ($role === 'admin')
                <div class="relative">
                    <a href="/admin" id="popularsDD" class="flex pb-[1px] md:pb-[2px]" style="text-decoration: none;">
                        <img src="{{ asset('storage/images/admin-icon.png') }}" class="w-[26px] h-[26px] object-cover" alt="">
                    </a>
                    <div class="absolute navbar-dd invisible right-[-12px] mt-2 ml-0 w-28 lg:w-52 bg-[#101422] border border-[#6c6a75bd] text-zinc-50 rounded-lg opacity-0 transition-all duration-[450ms] ease-in-out z-10" style="box-shadow: rgba(64, 105, 105, 0.25) 0px 32px 60px, rgba(64, 105, 105, 0.15) 0px -12px 30px, rgba(64, 105, 105, 0.15) 0px 4px 6px, rgba(64, 105, 105, 0.2) 0px 12px 13px, rgba(64, 105, 105, 0.12) 0px -3px 5px;">
                        <h2 class="text-xl text-center font-bold mt-2 pb-[10px] border-b border-b-[#9aa3bb]">
                            ADMIN PANEL
                        </h2>
                        <ul class="px-[6px] pb-3 pt-2 flex flex-col justify-center gap-1 text-sm">
                            <a href="/admin" class="rounded-md hover:bg-gray-700 transition py-[4px] px-3">Dashboard</a>
                            <a href="/admin/movies" class="rounded-md hover:bg-gray-700 transition py-[4px] px-3">Movies</a>
                            <a href="/admin/tvshows" class="rounded-md hover:bg-gray-700 transition py-[4px] px-3">TV Shows</a>
                            <a href="/admin/categories" class="rounded-md hover:bg-gray-700 transition py-[4px] px-3">Categories</a>
                            <a href="/admin/genres" class="rounded-md hover:bg-gray-700 transition py-[4px] px-3">Genres</a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="flex: 1;">
                                @csrf
                                <button type="button" id="logout-button" class="rounded-md hover:bg-gray-700 transition py-[4px] px-3 w-full text-start">Logout</button>
                            </form>
                        </ul>
                    </div>
                </div>
                @endif
                @guest
                    <a href="/login" class="text-lg font-semibold tracking-tight text-red-600 hover:text-gray-300 border-[2px] pt-[2px] pb-[6px] px-[17px] border-red-700 hover:bg-rose-700 hover:border-transparent rounded-lg transition-all duration-300" style="filter: drop-shadow(-4px 2px 32px #dc093e);">
                        Login
                    </a>
                @endguest
            </div>
        </div>
    </header>

    <main id="app" style="flex: 1;" class="bg-gray-950 text-gray-100 mt-12 md:mt-[51px] lg:mt-[54px] min-h-[calc(100vh-39px-48px)] md:min-h-[calc(100vh-45px-48px)] lg:min-h-[calc(100vh-53px-48px)]">
        @yield('content')
    </main>
    
    <footer class="bg-gray-800 py-3">
        <div class="container mx-auto px-4 text-center text-gray-400">
            <p>&copy; 2030 LaravelMovies. All rights reserved.</p>
        </div>
    </footer>

    @if(session('error'))
        <div id="flash-message" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-[77%] z-50">
            <div class="bg-gray-800 p-5 md:p-6 lg:p-7 lg:pb-8 rounded-lg shadow-lg text-center border border-slate-500">
                <h2 class="text-3xl font-bold mb-3 text-red-500">Error</h2>
                <p class="text-sm text-gray-100">{{ session('error') }}</p>
            </div>
        </div>
        <script>
            setTimeout(() => {
                document.getElementById('flash-message').style.display = 'none';
            }, 2000);
        </script>
    @elseif(session('success'))
        <div id="flash-message" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-[77%] z-50">
            <div class="bg-gray-800 p-5 md:p-6 lg:p-7 lg:pb-8 rounded-lg shadow-lg text-center border border-slate-500">
                <h2 class="text-3xl font-bold mb-3 text-emerald-400">Success</h2>
                <p class="text-sm text-gray-100">{{ session('success') }}</p>
            </div>
        </div>
        <script>
            setTimeout(() => {
                document.getElementById('flash-message').style.display = 'none';
            }, 1200);
        </script>
    @endif

    <div id="logout-modal" class="fixed flex bg-opacity-[67%] opacity-0 transition duration-300 inset-0 items-center justify-center z-[-1]">
        <div class="bg-[#212936] border border-gray-600 p-6 rounded-lg shadow-lg text-center text-gray-200 z-40">
            <h2 class="text-xl font-bold mb-4">Confirm Logout</h2>
            <p>Are you sure you want to logout?</p>
            <div class="mt-4 flex justify-center gap-4">
                <button id="confirm-logout" type="button" class="bg-emerald-700 border border-emerald-300 text-white px-5 py-2 rounded-md hover:bg-emerald-400 transition">Yes</button>
                <button id="close-modal" type="button" class="bg-red-700 border border-rose-300 px-5 py-2 text-white rounded-md hover:bg-red-500 transition">No</button>
            </div>
        </div>
    </div>

    <script>
        const logoutButtons = document.querySelectorAll('#logout-button');
        const logoutButtons2 = document.querySelectorAll('#logout-button2');
        const closeModalButtons = document.querySelectorAll('#close-modal');
        const confirmButtons = document.querySelectorAll('#confirm-logout');

        logoutButtons.forEach(button => {
            button.addEventListener('click', () => {
                const modal = document.getElementById('logout-modal');
                modal.classList.remove('z-[-1]');
                modal.classList.remove('opacity-0');
                modal.classList.add('bg-black');
                modal.classList.add('z-[1000]');
                modal.classList.add('opacity-100');
            });
        });

        logoutButtons2.forEach(button => {
            button.addEventListener('click', () => {
                const modal = document.getElementById('logout-modal');
                modal.classList.remove('z-[-1]');
                modal.classList.remove('opacity-0');
                modal.classList.add('bg-black');
                modal.classList.add('z-[1000]');
                modal.classList.add('opacity-100');
            });
        });

        closeModalButtons.forEach(button => {
            button.addEventListener('click', () => {
                const modal = document.getElementById('logout-modal');
                modal.classList.remove('bg-black');
                modal.classList.remove('z-[1000]');
                modal.classList.remove('opacity-100');
                modal.classList.add('z-[-1]');
                modal.classList.add('opacity-0');
            });
        });

        confirmButtons.forEach(button => {
            button.addEventListener('click', () => {
                document.getElementById('logout-form').submit();
            });
        });
    </script>
</body>
</html>
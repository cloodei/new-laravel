<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="{{ asset('css/register.css') }}">
    <link rel="icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">
    <script src="//unpkg.com/alpinejs" defer></script>
    @vite('resources/css/app.css')
</head>
<body class="shooting-star-container min-h-screen">
    <div class="stars"></div>
    <div class="container mx-auto px-4 py-5 lg:py-8 pt-3 lg:pt-5 z-50">
        <div class="max-w-md mx-auto bg-[#03030f] border border-[#3d4a5c] p-6 pt-4 rounded-lg form-shadow text-[#cacaca]">
            <h1 class="text-2xl font-semibold mb-3 lg:mb-6 text-center">Login</h1>
            <form action="{{ route('login') }}" method="POST">
                @csrf

                <div class="mb-4">
                    <label for="email" class="block text-sm font-medium mb-2">Email</label>
                    <input type="text" id="email" name="email" value="{{ old('email') }}" class="w-full px-4 py-2 bg-[#141e2ccb] text-gray-200 rounded-lg border {{ $errors->has('email') ? 'border-red-500' : 'border-gray-500' }}" />
                    @error('email')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="password" class="block text-sm font-medium mb-2">Password</label>
                    <input type="password" id="password" name="password" value="{{ old('password') }}" class="w-full px-4 py-2 bg-[#141e2ccb] text-gray-200 rounded-lg border {{ $errors->has('password') ? 'border-red-500' : 'border-gray-500' }}" />
                    @error('password')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>
                
                <div class="mt-4 flex justify-between items-center">
                    <div class="flex items-center">
                        <span class="text-sm">Don't have an account?</span>
                        <a href="/register" class="text-red-700 hover:text-red-300 transition ml-2 duration-[250ms]">
                            Register
                            <i class="fa-regular fa-bell ml-[3px]"></i>
                        </a>
                    </div>
                    <a href="/" class="text-[#107474] hover:text-[#82dbc5] transition duration-[250ms]">
                        Home
                        <i class="fas fa-home ml-[5px]"></i>
                    </a>
                </div>

                <div class="mt-4 lg:mt-10">
                    <x-button class="bg-red-800 text-white transition duration-[200ms] hover:bg-red-600 w-full">
                        Login
                        <i class="fa-regular fa-circle-check ms-[4px] pt-[2px]"></i>
                    </x-button>
                </div>
            </form>
        </div>
    </div>

    <div class="absolute right-2 bottom-2 text-white">
        &copy; LaravelMovies
    </div>
    
    <script>
        const starContainer = document.querySelector('.stars');
        const starCount = 30;

        for (let i = 0; i < starCount; i++) {
            const star = document.createElement('div');
            star.classList.add('star');
            star.style.setProperty('--star-tail-length', `${Math.random() * 2 + 4}em`);
            star.style.setProperty('--top-offset', `${Math.random() * 100}vh`);
            star.style.setProperty('--left-offset', `${Math.random() * 100}vw`);
            star.style.setProperty('--fall-duration', `${Math.random() * 6 + 6}s`);
            star.style.setProperty('--fall-delay', `${Math.random() * 10}s`);
            starContainer.appendChild(star);
        }
    </script>
</body>
</html>
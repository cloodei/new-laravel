<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register</title>
</head>
<body>
    <div class="container mx-auto px-4 py-8">
        <div class="max-w-md mx-auto bg-gray-800 p-6 rounded-lg shadow-lg">
            <h1 class="text-2xl font-semibold mb-6">Register</h1>
            <form action="#" method="POST">
                @csrf
                <div class="mb-4">
                    <label for="name" class="block text-sm font-medium mb-2">Name</label>
                    <input type="text" id="name" name="name" value="{{ old('username') }}" class="w-full px-4 py-2 bg-gray-700 text-gray-100 rounded-lg border @error('username') border-red-500 @enderror" />
                    @error('username')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="email" class="block text-sm font-medium mb-2">Email</label>
                    <input type="email" id="email" name="email" value="{{ old('email') }}" class="w-full px-4 py-2 bg-gray-700 text-gray-100 rounded-lg border @error('email') border-red-500 @enderror" />
                    @error('email')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="password" class="block text-sm font-medium mb-2">Password</label>
                    <input type="password" id="password" name="password" value="{{ old('password') }}" class="w-full px-4 py-2 bg-gray-700 text-gray-100 rounded-lg border @error('password') border-red-500 @enderror" />
                    @error('password')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="password_confirmation" class="block text-sm font-medium mb-2">Confirm Password</label>
                    <input type="password" id="password_confirmation" name="password_confirmation" class="w-full px-4 py-2 bg-gray-700 text-gray-100 rounded-lg" />
                </div>

                <div class="mb-4">
                    <x-button class="bg-red-400 transition duration-[250ms] hover:bg-red-700">
                        Register
                    </x-button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
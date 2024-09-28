@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-gray-900 text-gray-100">
    <main class="container mx-auto px-4 py-8">
        <section class="mb-12">
            <div class="relative h-96 rounded-lg overflow-hidden">
                <img
                    alt="Featured Movie"
                    class="w-full h-full object-cover"
                    src="/placeholder.svg?height=384&width=768"
                />
                <div class="absolute inset-0 bg-gradient-to-t from-gray-900 to-transparent"></div>
                <div class="absolute bottom-0 left-0 p-6">
                    <h1 class="text-4xl font-bold mb-2">Featured Movie Title</h1>
                    <p class="text-lg mb-4">A brief description of the featured movie goes here.</p>
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
                <div class="relative group">
                    <img
                        alt="{{ $movie }}"
                        class="w-full h-48 object-cover rounded-lg transition-transform duration-200 group-hover:scale-105"
                        src="/placeholder.svg?height=192&width=128&text={{ urlencode($movie) }}"
                    />
                    <div class="absolute inset-0 bg-black bg-opacity-0 group-hover:bg-opacity-80 transition-opacity duration-200 rounded-lg flex flex-col items-center justify-center opacity-0 group-hover:opacity-100">
                        <h3 class="text-lg font-semibold text-center mb-2">{{ $movie }}</h3>
                        <p class="text-sm text-center mb-2">A brief description of the movie plot.</p>
                        <div class="flex items-center text-sm mb-2">
                            <i class="fas fa-clock w-4 h-4 mr-1"></i>
                            <span>2h 15m</span>
                        </div>
                        <x-button variant="ghost" size="sm" class="text-white">
                            <i class="fas fa-play w-4 h-4 mr-2"></i>
                            Play
                        </x-button>
                    </div>
                </div>
                @endforeach
            </div>
        </section>
        @endforeach
    </main>
</div>
@endsection
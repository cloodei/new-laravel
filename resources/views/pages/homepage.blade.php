@extends('layouts.app')

@section('content')


<div class="min-h-screen bg-gray-950 text-gray-100">
    <section class="mb-12">
        <div class="relative h-96 rounded-lg overflow-hidden">
            <div class="px-10 w-full h-full">
                <img
                    alt="Featured Movie"
                    class="w-full h-full object-cover"
                    src="https://brawlhalla.wiki.gg/images/thumb/b/b0/Gridiron_Xull.png/609px-Gridiron_Xull.png"
                />
            </div>
            <div class="absolute inset-0 bg-gradient-to-t from-[#56497938] to-transparent"></div>
            <div class="absolute bottom-4 left-6 p-6">
                <h1 class="text-4xl font-bold mb-2">Featured Movie: Laravel</h1>
                <p class="text-lg mb-4">Laravel thing php thing laravel and php thing.</p>
                <x-button class="bg-red-600 hover:bg-red-700">
                    <i class="fas fa-play w-4 h-4 mr-2"></i>
                    Play
                </x-button>
            </div>
        </div>
    </section>
    <main class="container mx-auto px-4 py-8 pt-0">
        @foreach ($genres as $genre)
        <section class="mb-12">
            <h2 class="text-2xl font-semibold mb-4">{{ $genre['name'] }} Movies</h2>
            <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                @foreach ($genre['movies'] as $movie)
                <div>
                    <div class="relative group movies-bg h-28 lg:h-48 rounded-lg">
                        <img
                            alt="{{ $movie['title'] }}"
                            class="w-full h-full object-cover rounded-lg transition-transform duration-200 group-hover:scale-105"
                            src="{{ $movie['image'] }}"
                        />
                        <div class="absolute top-[2.5%] translate-y--1/2 h-[95%] left-[2.5%] translate-x--1/2 w-[95%] inset-0 bg-black bg-opacity-0 group-hover:bg-opacity-80 transition-opacity duration-200 rounded-lg lg:rounded-xl flex flex-col items-center justify-center opacity-0 group-hover:opacity-100">
                            <h3 class="text-lg lg:text-xl font-semibold text-center mb-1 lg:mb-2">{{ $movie['title'] }}</h3>
                            <div class="flex items-center text-sm mb-1 lg:mb-[14px]">
                                <i class="fas fa-clock w-4 h-4 mr-1"></i>
                                <span>2h 15m</span>
                            </div>
                            <x-button variant="ghost" size="sm" class="text-sm lg:text-base text-white transition duration-300 hover:bg-[#a0b6b4] hover:text-[#1b1215]">
                                <i class="fas fa-play w-4 h-4 mr-2"></i>
                                Play
                            </x-button>
                        </div>
                    </div>
                    <div class="mt-2 text-sm lg:text-base">
                        <p class="font-semibold">{{ $movie['title'] }}</p>
                        <p class="text-gray-400">2021</p>
                        <i class="fas fa-star text-[#fff38a]"></i>
                        <span class="">{{ $movie['rating'] }}</span>
                    </div>
                </div>
                @endforeach
            </div>
        </section>
        @endforeach
    </main>
</div>


@endsection
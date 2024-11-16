@extends('layouts.app')

@section('content')
    <div class="container mx-auto py-6">
        <form method="GET" action="{{ route('search') }}" class="flex justify-center mb-8">
            <input 
                type="text" 
                name="search" 
                placeholder="Tìm kiếm phim..." 
                value="{{ request('search') }}" 
                class="w-full md:w-1/2 px-4 py-2 border border-gray-300 rounded-l-md focus:outline-none focus:ring-2 focus:ring-blue-500 bg-transparent"
            >
            <button 
                type="submit" 
                class="px-6 py-2 bg-blue-500 text-white font-semibold rounded-r-md hover:bg-blue-600 transition duration-300"
            >
                Tìm kiếm
            </button>
        </form>

        @if($movies->isEmpty())
            <p class="text-center text-gray-500">Không tìm thấy phim nào.</p>
        @else
            <div class="flex flex-wrap gap-6 justify-center">
                @foreach ($movies as $movie)
                <div class="w-64">
                    <div class="relative group h-64 rounded-lg overflow-hidden bg-gray-800 shadow-lg">
                        <img 
                            alt="{{ $movie['title'] }}" 
                            class="w-full h-full object-cover transition-transform duration-300 group-hover:scale-110" 
                            src="{{ $movie['image'] }}"
                        />
                        <a 
                            href="/movies/{{ $movie['id'] }}" 
                            class="absolute inset-0 flex flex-col items-center justify-center bg-black bg-opacity-60 opacity-0 group-hover:opacity-100 transition duration-300"
                        >
                            <h3 class="text-white text-lg font-semibold text-center mb-2">{{ $movie['title'] }}</h3>
                            <div class="text-sm text-gray-300 mb-4">
                                <i class="fa-regular fa-clock mr-2"></i>
                                {{ $movie->duration < 60 ? $movie->duration . ' phút' : floor($movie->duration / 60) . ' giờ ' . ($movie->duration % 60) . ' phút' }}
                            </div>
                            <button class="px-4 py-2 bg-blue-500 text-white text-sm font-semibold rounded hover:bg-blue-600 transition duration-300">
                                <i class="fas fa-play mr-2"></i> Xem ngay
                            </button>
                        </a>
                    </div>
                    <div class="mt-3 text-center">
                        <p class="text-gray-300 font-semibold text-base">{{ $movie['title'] }}</p>
                        <p class="text-gray-500 text-sm">{{ \Carbon\Carbon::parse($movie->start_date)->format('F j, Y') }}</p>
                    </div>
                </div>
                @endforeach
            </div>
        @endif
    </div>

@endsection
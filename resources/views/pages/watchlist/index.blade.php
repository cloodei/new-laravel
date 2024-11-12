@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-gray-950 via-gray-900 to-gray-950">
    <div class="max-w-7xl mx-auto px-4 py-8">
        <h1 class="text-3xl font-bold text-white mb-8">My List</h1>

        @if($watchedContent->isEmpty())
            <div class="text-center py-16">
                <div class="text-gray-400 text-lg">
                    <i class="fas fa-film text-4xl mb-4"></i>
                    <p>Your watchlist is empty</p>
                    <a href="/movies" class="text-blue-400 hover:text-blue-300 mt-2 inline-block">
                        Discover content to watch
                    </a>
                </div>
            </div>
        @else
            <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5 gap-6">
                @foreach($watchedContent as $item)
                    <div class="group relative">
                        <div class="aspect-[2/3] rounded-lg overflow-hidden bg-gray-800">
                            <img src="{{ asset($item->content->image) }}" 
                                 alt="{{ $item->content->title }}"
                                 class="w-full h-full object-cover transition duration-300 group-hover:scale-110 group-hover:opacity-50">
                            
                            <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/50 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                                <div class="absolute bottom-0 left-0 right-0 p-4">
                                    <h3 class="text-white font-semibold">{{ $item->content->title }}</h3>
                                    <p class="text-gray-300 text-sm">{{ $item->duration }}</p>
                                    
                                    <div class="flex items-center space-x-3 mt-3">
                                        <a href="/watch/{{ $item->content->id }}" 
                                           class="px-5 py-[6px] bg-gray-300 text-gray-950 rounded-md text-base font-medium hover:bg-white transition">
                                            <i class="fas fa-play mr-2"></i>Play
                                        </a>
                                        <form action="{{ route('watchlist.destroy', $item->id) }}" method="POST" class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <button class="py-[6px] px-[13px] bg-gray-800/80 text-white rounded-full hover:bg-gray-700 transition">
                                                <i class="fas fa-times text-xl"></i>
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
</div>
@endsection
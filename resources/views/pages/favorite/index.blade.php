@extends('layouts.app')

@section('content')
    <div class="container mx-auto py-6">
        <div class="flex flex-wrap gap-6 justify-center">
            @foreach ($favorites as $favorite)
                <div class="w-64">
                    <div class="relative group h-64 rounded-lg overflow-hidden bg-gray-800 shadow-lg">
                        <img
                            alt="{{ $favorite->content->title }}" 
                            class="w-full h-full object-cover transition-transform duration-300 group-hover:scale-110" 
                            src="{{ $favorite->content->image }}"
                        />
                        <a 
                            href="/watch/{{ $favorite->content['id'] }}" 
                            class="absolute inset-0 flex flex-col items-center justify-center bg-black bg-opacity-60 opacity-0 group-hover:opacity-100 transition duration-300"
                        >
                            <h3 class="text-white text-lg font-semibold text-center mb-2">{{ $favorite->content->title }} {{ $favorite->content->season_id ? ' ' . $favorite->content->season->title : '' }}</h3>
                            <div class="text-sm text-gray-300 mb-4">
                                <i class="fa-regular fa-clock mr-2"></i>
                                {{ $favorite->content->duration < 60 ? $favorite->content->duration . ' phút' : floor($favorite->content->duration / 60) . ' giờ ' . ($favorite->content->duration % 60) . ' phút' }}
                            </div>
                            <form action="{{ route('favorites.remove', $favorite->content->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to remove this movie from your favorites?')" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="px-4 py-2 bg-red-500 text-white text-sm font-semibold rounded hover:bg-red-600 transition duration-300">
                                    <i class="fas fa-trash-alt mr-2"></i> Xóa khỏi yêu thích
                                </button>
                            </form>                            
                        </a>
                    </div>
                    <div class="mt-3 text-center">
                        <p class="text-gray-300 font-semibold text-base">{{ $favorite->content->title }} {{ $favorite->content->season_id ? ' ' . $favorite->content->season->title : '' }}</p>
                        <p class="text-gray-500 text-sm">{{ \Carbon\Carbon::parse($favorite->content->start_date)->format('F j, Y') }}</p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection

@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-gray-950">
    <div class="relative py-7">
        <div class="w-[75%] h-[75%] m-auto aspect-video bg-gray-900 relative group">
            <video class="w-full h-full object-cover" controls 
                   poster="{{ $movie->trailer }}">
                <source src="{{ $movie->trailer }}" type="video/mp4">
            </video>
        </div>
        <a href="{{ url()->previous() }}" class="absolute left-[6%] top-4 text-gray-200 hover:text-white transition">
            <i class="fas fa-arrow-left mr-2"></i>
            <span>Back</span>
        </a>
    </div>

    <div class="max-w-7xl mx-auto px-4 py-8">
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            <div class="lg:col-span-2 space-y-6">
                <div class="bg-gray-800/50 backdrop-blur-md rounded-xl p-6 border border-gray-700">
                    <div class="flex items-center justify-between mb-4">
                        <h1 class="text-2xl font-bold text-white">{{ $movie->title }} {{ $movie->season_id ? ' ' . $movie->season->title : '' }}</h1>
                        <div class="flex items-center space-x-4">
                            <span class="px-3 py-1 rounded-full text-xs font-semibold {{ $movie->content_type === 'VIP' ? 'bg-gradient-to-r from-yellow-400 to-yellow-600' : 'bg-blue-600' }} text-white">
                                {{ $movie->content_type}}
                            </span>
                            <span class="text-gray-400">
                                <i class="fas fa-clock mr-2"></i>{{ $movie->duration < 60 ? $movie->duration . ' m' : floor($movie->duration / 60) . ' h ' . ($movie->duration % 60) . ' m' }}
                            </span>
                        </div>
                    </div>
                    <p class="text-gray-300 leading-relaxed mb-4">{{ $movie->description }}</p>
                    <div class="flex items-center space-x-6">
                        <form action="{{ route('favorite.add', $movie['id']) }}" method="POST" class="inline">
                            @csrf
                            <button type="submit" class="flex items-center space-x-2 transition 
                                {{ $favorites->contains($movie['id']) ? 'text-red-500' : 'text-gray-400 hover:text-white' }}">
                                <i class="fas fa-heart"></i>
                                <span>{{ $favorites->contains($movie['id']) ? 'Favorited' : 'Add to Favorites' }}</span>
                            </button>
                        </form>                                                                   
                        <button class="flex items-center space-x-2 text-gray-400 hover:text-white transition">
                            <i class="fas fa-share"></i>
                            <span>Share</span>
                        </button>
                    </div>
                </div>
                <div class="p-4 bg-gray-800/50 backdrop-blur-md rounded-xl p-6 border border-gray-700">
                    <h2 class="text-2xl font-bold text-white mb-4">Episodes</h2>
                    <div class="flex flex-wrap gap-3">
                        @foreach ($movieEpisodes as $item)
                            <a href="/watch/{{ $item['id'] }}"
                               class="w-10 h-10 flex items-center justify-center rounded-lg 
                                      {{ $movie->episode == $item->episode ? 'bg-blue-500 text-white shadow-lg' : 'bg-gray-700 text-gray-300 hover:bg-gray-600 hover:text-white' }} 
                                      transition duration-300">
                                <span class="font-semibold">{{ $item->episode }}</span>
                            </a>
                        @endforeach
                    </div>
                </div>                             
                @if (count($sameName) > 1)
                    <div class="bg-gray-800/50 backdrop-blur-md rounded-xl p-6 border border-gray-700">
                        <div class="flex items-center justify-between mb-6">
                            <h2 class="text-xl font-semibold text-white">Season</h2>
                        </div>
                        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">
                            @foreach ($sameName as $item)
                                <a href="/watch/{{ $item->id }}" class="group">
                                    <div class="relative aspect-video rounded-lg overflow-hidden">
                                        <img src="{{ $item->image }}" 
                                            class="w-full h-full object-cover transition duration-300 group-hover:scale-110">
                                        <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent"></div>
                                        <div class="absolute bottom-0 left-0 right-0 p-4">
                                            <p class="text-sm font-medium text-white">{{ $item->title }} {{ $item->season_id ? ' ' . $item->season->title : '' }}</p>
                                            <p class="text-xs text-gray-300">{{ $item->duration < 60 ? $item->duration . ' m' : floor($item->duration / 60) . ' h ' . ($item->duration % 60) . ' m' }}</p>
                                        </div>
                                    </div>
                                </a>
                            @endforeach
                        </div>
                    </div>
                @endif

                <div class="bg-gray-800/50 backdrop-blur-md rounded-xl p-6 border border-gray-700">
                    <h2 class="text-xl font-semibold text-white mb-6">Details</h2>
                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-2 gap-6">
                        <div class="space-y-4">
                            <div>
                                <p class="text-gray-400 text-xs font-medium">Genre</p>
                                <div class="flex flex-wrap gap-2">
                                    @foreach ($movie->thuocnhieuGenre as $item)
                                        <span class="px-3 py-1 bg-blue-500 text-white rounded-full text-xs font-medium hover:bg-blue-600 transition duration-300">{{ $item->name }}</span>
                                    @endforeach
                                </div>
                            </div>
                
                            <div>
                                <p class="text-gray-400 text-xs font-medium">Release Date</p>
                                <p class="text-white font-semibold">{{ \Carbon\Carbon::parse($movie->start_date)->format('F j, Y') }}</p>
                            </div>
                        </div>
                        <div class="space-y-4">
                            <div>
                                <p class="text-gray-400 text-xs font-medium">Director</p>
                                <p class="text-white font-semibold">Nhà làm phim hay</p>
                            </div>
                            <div>
                                <p class="text-gray-400 text-xs font-medium">Rating</p>
                                <div class="flex items-center">
                                    <p class="text-white font-semibold mr-2">5</p>
                                    <i class="fa-solid fa-star text-yellow-400"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>                
            </div>

            <div class="lg:col-span-1">
                <div class="bg-gray-800/50 backdrop-blur-md rounded-xl p-6 border border-gray-700">
                    <h2 class="text-xl font-semibold text-white mb-4">You May Also Like</h2>
                    <div x-data="{ 
                        currentIndex: 0,
                        items: [],
                        init() {
                            this.items = this.$refs.carousel.children;
                        },
                        next() {
                            this.currentIndex = (this.currentIndex + 1) % this.items.length;
                            this.updateCarousel();
                        },
                        prev() {
                            this.currentIndex = (this.currentIndex - 1 + this.items.length) % this.items.length;
                            this.updateCarousel();
                        },
                        updateCarousel() {
                            const itemHeight = this.items[0].offsetHeight;
                            this.$refs.carousel.style.transform = `translateY(-${this.currentIndex * (itemHeight + 12)}px)`;
                        }
                    }" class="relative">
                        <div class="absolute right-0 top-[-48px] flex space-x-2">
                            <button @click="prev" class="p-2 rounded-lg bg-gray-700 text-gray-200 hover:bg-gray-500 transition">
                                <i class="fas fa-chevron-up"></i>
                            </button>
                            <button @click="next" class="p-2 rounded-lg bg-gray-700 text-gray-200 hover:bg-gray-500 transition">
                                <i class="fas fa-chevron-down"></i>
                            </button>
                        </div>
                        
                        <div class="overflow-hidden h-[360px]">
                            <div x-ref="carousel" class="space-y-[12px] transition-transform duration-300">
                                @foreach($movies as $rec)
                                <div class="group cursor-pointer">
                                    <a href="/tvshows/{{ $rec->id }}"
                                       class="flex space-x-4 p-2 rounded-lg hover:bg-gray-700/50 transition">
                                        <img src="{{ $rec->image }}" 
                                             alt="{{ $rec->title }}"
                                             class="w-24 h-16 object-cover rounded-md">
                                        <div>
                                            <h3 class="text-white group-hover:text-blue-400 transition">{{ $rec->title }} {{ $rec->season_id ? ' ' . $rec->season->title : '' }}</h3>
                                            <p class="text-sm text-gray-400">{{ $rec->duration < 60 ? $rec->duration . ' m' : floor($rec->duration / 60) . ' h ' . ($rec->duration % 60) . ' m' }}</p>
                                            <div class="flex items-center mt-1">
                                                <i class="fas fa-star text-yellow-500 text-xs mr-1"></i>
                                                <span class="text-xs text-gray-400">{{ $rec->rating }}</span>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
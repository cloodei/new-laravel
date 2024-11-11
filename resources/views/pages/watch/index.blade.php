@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-gray-950">
    <!-- Video Player -->
    <div class="relative py-7">
        <div class="w-[75%] h-[75%] m-auto aspect-video bg-gray-900 relative group">
            <video class="w-full h-full object-cover" controls 
                   poster="{{ asset('storage/images/movie13.jpg') }}">
                <source src="{{ asset('storage/videos/bg-banner-vid.mp4') }}" type="video/mp4">
            </video>
        </div>
        <a href="{{ url()->previous() }}" class="absolute left-[6%] top-4 text-gray-200 hover:text-white transition">
            <i class="fas fa-arrow-left mr-2"></i>
            <span>Back</span>
        </a>
    </div>

    <!-- Content Details -->
    <div class="max-w-7xl mx-auto px-4 py-8">
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            <!-- Main Content Info -->
            <div class="lg:col-span-2 space-y-6">
                <div class="bg-gray-800/50 backdrop-blur-md rounded-xl p-6 border border-gray-700">
                    <div class="flex items-center justify-between mb-4">
                        <h1 class="text-2xl font-bold text-white">{{ $content['title'] }}</h1>
                        <div class="flex items-center space-x-4">
                            <span class="px-3 py-1 rounded-full text-xs font-semibold {{ $content['content_type'] === 0 ? 'bg-gradient-to-r from-yellow-400 to-yellow-600' : 'bg-blue-600' }} text-white">
                                {{ $content['content_type'] === 0 ? 'VIP' : 'Regular' }}
                            </span>
                            <span class="text-gray-400">
                                <i class="fas fa-clock mr-2"></i>{{ $content['duration'] }}
                            </span>
                        </div>
                    </div>

                    <p class="text-gray-300 leading-relaxed mb-4">{{ $content['description'] }}</p>
                    
                    <!-- Tags -->
                    <div class="flex flex-wrap gap-2 mb-6">
                        @foreach($content['tags'] as $tag)
                            <a href="#" class="px-3 py-1 rounded-full text-xs font-medium bg-blue-500/20 text-blue-400 hover:bg-blue-500/30 transition">
                                {{ $tag }}
                            </a>
                        @endforeach
                    </div>

                    <div class="flex items-center space-x-6">
                        <button class="flex items-center space-x-2 text-gray-400 hover:text-white transition">
                            <i class="fas fa-heart"></i>
                            <span>Add to Favorites</span>
                        </button>
                        <button class="flex items-center space-x-2 text-gray-400 hover:text-white transition">
                            <i class="fas fa-share"></i>
                            <span>Share</span>
                        </button>
                    </div>
                </div>

                <!-- Episodes Panel -->
                <div class="bg-gray-800/50 backdrop-blur-md rounded-xl p-6 border border-gray-700">
                    <div class="flex items-center justify-between mb-6">
                        <h2 class="text-xl font-semibold text-white">Episodes</h2>
                        <div class="flex space-x-2">
                            <button class="px-4 py-2 rounded-lg bg-gray-700 text-gray-300 hover:bg-gray-600 transition">
                                Season 1
                            </button>
                        </div>
                    </div>
                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">
                        @for($i = 1; $i <= 6; $i++)
                            <a href="#" class="group">
                                <div class="relative aspect-video rounded-lg overflow-hidden">
                                    <img src="{{ asset('storage/images/movie13.jpg') }}" 
                                         class="w-full h-full object-cover transition duration-300 group-hover:scale-110">
                                    <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent"></div>
                                    <div class="absolute bottom-0 left-0 right-0 p-4">
                                        <p class="text-sm font-medium text-white">Episode {{ $i }}</p>
                                        <p class="text-xs text-gray-300">42 min</p>
                                    </div>
                                </div>
                            </a>
                        @endfor
                    </div>
                </div>

                <!-- Additional Info -->
                <div class="bg-gray-800/50 backdrop-blur-md rounded-xl p-6 border border-gray-700">
                    <h2 class="text-xl font-semibold text-white mb-4">Details</h2>
                    <div class="grid grid-cols-2 gap-4 text-sm">
                        <div>
                            <p class="text-gray-400">Genre</p>
                            <p class="text-white">{{ $content['genre'] }}</p>
                        </div>
                        <div>
                            <p class="text-gray-400">Release Date</p>
                            <p class="text-white">{{ $content['release_date'] }}</p>
                        </div>
                        <div>
                            <p class="text-gray-400">Director</p>
                            <p class="text-white">{{ $content['director'] }}</p>
                        </div>
                        <div>
                            <p class="text-gray-400">Rating</p>
                            <p class="text-white">{{ $content['rating'] }}</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Recommendations Carousel -->
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
                                @foreach($recommendations as $rec)
                                <div class="group cursor-pointer">
                                    <a href="/tvshows/{{ $rec['id'] }}"
                                       class="flex space-x-4 p-2 rounded-lg hover:bg-gray-700/50 transition">
                                        <img src="{{ asset('storage/' . $rec['thumbnail']) }}" 
                                             alt="{{ $rec['title'] }}"
                                             class="w-24 h-16 object-cover rounded-md">
                                        <div>
                                            <h3 class="text-white group-hover:text-blue-400 transition">{{ $rec['title'] }}</h3>
                                            <p class="text-sm text-gray-400">{{ $rec['duration'] }}</p>
                                            <div class="flex items-center mt-1">
                                                <i class="fas fa-star text-yellow-500 text-xs mr-1"></i>
                                                <span class="text-xs text-gray-400">{{ $rec['rating'] }}</span>
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
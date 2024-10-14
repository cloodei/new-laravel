@extends('layouts.app')

@section('content')

<div class="relative" style="min-height: calc(80vh);">
    <div class="w-[80%] right-0 z-0 absolute" style="height: 80vh;">
        <video autoplay loop muted class="inset-0 w-full object-cover" style="height: 80vh;">
            <source src="{{ asset('storage/videos/bg-banner-vid.mp4') }}" type="video/mp4">
            Your browser does not support the video tag.
        </video>
        <div class="absolute inset-0" style="background: linear-gradient(to left, transparent, #030712);"></div>
        <div class="absolute inset-0 h-1/2 bottom-0 mt-auto" style="background: linear-gradient(to bottom, transparent, #030712);"></div>
    </div>
    
    <div class="relative z-2 text-white w-[50%] flex flex-col justify-center items-center text-center" style="height: 80vh;">
        <h1 class="lg:text-4xl md:text-[27px] text-xl font-bold mb-3 lg:mb-7">Featured Movie: Laravel</h1>
        <p class="lg:text-lg text-base mb-0">
            LaravelMovies có rất ít movie nhưng có rất nhiều laravel, xem thêm tại
            <a href="https://laravel.com" class="text-blue-400 hover:underline" target="_blank"> đây</a>.
        </p>
        @if($role === 'guest')
            <p class="mb-3 lg:mb-6 lg:text-lg text-base">
                <a href="/login" class="text-blue-400 hover:underline">Đăng nhập</a> để có thêm movie.
            </p>
            <a href="/register" class="px-3 md:px-4 py-1 md:py-[5px] text-sm lg:text-lg rounded-[6px] bg-red-600 hover:bg-red-700 flex items-center md:pt-[6px]">
                Sign up now
                <i class="fa-solid fa-right-to-bracket w-4 h-4 ml-2 pt-[2px]"></i>
            </a>
        @else
            <p class="lg:text-lg text-base mb-3 lg:mb-6">Đón xem những bộ phim vô cùng laravel.</p>
            <a href="/movies" class="px-3 md:px-4 py-1 md:py-[5px] text-sm lg:text-lg rounded-[6px] bg-red-600 hover:bg-red-700 flex items-center md:pt-[6px]">
                View More
                <i class="fa-solid fa-video ml-[7px]"></i>
            </a>
        @endif
    </div>

    <main class="lg:mx-20 md:mx-16 mx-12 py-8 pt-0">
        @foreach ($genres as $genre)
        <section class="mb-12">
            <a href="#" class="text-gray-200 text-lg md:text-xl lg:text-2xl font-semibold transition-all hover:text-gray-400">
                {{ $genre['name'] }} Movies
                <i class="fa-solid fa-chevron-right ml-[3px] lg:ml-[6px]"></i>
            </a>
            {{-- <div class="grid grid-cols-3 md:grid-cols-6 gap-3 md:gap-4 mt-[10px] lg:mt-4 overflow-hidden px-6">
                @foreach ($genre['movies'] as $movie)
                <div>
                    <div class="relative group movies-bg h-36 md:h-[212px] lg:h-[264px] rounded-lg overflow-hidden">
                        <img
                            alt="{{ $movie['title'] }}"
                            class="w-full h-full object-cover rounded-lg transition-transform duration-200 group-hover:scale-110 group-hover:opacity-40"
                            src="{{ $movie['image'] }}"
                        />
                        <a href="/movie" class="absolute top-[4%] translate-y--1/2 h-[92%] left-[4%] translate-x--1/2 w-[92%] inset-0 bg-black bg-opacity-0 group-hover:bg-opacity-80 transition-opacity duration-200 rounded-lg lg:rounded-[6px] flex flex-col items-center justify-center opacity-0 group-hover:opacity-100">
                            <h3 class="text-base lg:text-xl font-semibold text-center mb-1 lg:mb-2">{{ $movie['title'] }}</h3>
                            <div class="flex items-center text-sm mb-1 lg:mb-[14px]">
                                <i class="fas fa-clock w-4 h-4 mr-1"></i>
                                <span>2h 15m</span>
                            </div>
                            <x-button variant="ghost" size="sm" class="text-sm lg:text-base py-[2px] lg:py-[5px] px-[6px] lg:px-4 text-white transition duration-300 hover:bg-[#a0b6b4] hover:text-[#1b1215]">
                                <i class="fas fa-play w-4 h-4 mr-2"></i>
                                Play
                            </x-button>
                        </a>
                    </div>
                    <div class="mt-2 text-sm lg:text-base">
                        <p class="font-semibold">{{ $movie['title'] }}</p>
                        <p class="text-gray-400">2021</p>
                    </div>
                </div>
                @endforeach
            </div> --}}
            <div x-data="carousel()" class="relative overflow-hidden mt-3">
                <div class="flex items-center justify-between absolute top-0 left-0 right-0 md:h-[212px] lg:h-[288px]">
                    <button @click="prev()" class="hover:bg-[#030712e3] bg-transparent rounded-l-lg transition duration-[250ms] p-2 z-10 w-8 lg:w-12 h-full">
                        <i class="fas fa-chevron-left text-lg lg:text-2xl text-[#bfc1c5]"></i>
                    </button>
                    <button @click="next()" class="hover:bg-[#030712e3] bg-transparent transition duration-[250ms] p-2 z-10 w-8 lg:w-12 h-full">
                        <i class="fas fa-chevron-right text-lg lg:text-2xl text-[#bfc1c5]"></i>
                    </button>
                </div>
                <div class="flex transition-transform duration-500 ease-in-out gap-3 md:gap-5" x-ref="carousel">
                    @foreach ($genre['movies'] as $movie)
                    <div class="carousel-item flex-shrink-0 w-[36%] md:w-[18%] lg:w-[18%]">
                        <div class="relative group movies-bg h-36 md:h-[212px] lg:h-[288px] rounded-lg overflow-hidden">
                            <img
                                alt="{{ $movie['title'] }}"
                                class="w-full h-full object-cover rounded-lg transition-transform duration-200 group-hover:scale-110 group-hover:opacity-40"
                                src="{{ $movie['image'] }}"
                            />
                            <a href="/movie" class="absolute top-[4%] translate-y--1/2 h-[92%] left-[4%] translate-x--1/2 w-[92%] inset-0 bg-black bg-opacity-0 group-hover:bg-opacity-80 transition-opacity duration-200 rounded-lg lg:rounded-[6px] flex flex-col items-center justify-center opacity-0 group-hover:opacity-100">
                                <h3 class="text-base lg:text-xl font-semibold text-center mb-1 lg:mb-2">{{ $movie['title'] }}</h3>
                                <div class="flex items-center text-sm mb-1 lg:mb-[14px]">
                                    <i class="fas fa-clock w-4 h-4 mr-1"></i>
                                    <span>2h 15m</span>
                                </div>
                                <x-button variant="ghost" size="sm" class="text-sm lg:text-base py-[2px] lg:py-[5px] px-[6px] lg:px-4 text-white transition duration-300 hover:bg-[#a0b6b4] hover:text-[#1b1215]">
                                    <i class="fas fa-play w-4 h-4 mr-2"></i>
                                    Play
                                </x-button>
                            </a>
                        </div>
                        <div class="mt-2 text-sm lg:text-base">
                            <p class="font-semibold">{{ $movie['title'] }}</p>
                            <p class="text-gray-400">2021</p>
                        </div>
                    </div>
                    @endforeach
                    @foreach ($genre['movies'] as $movie)
                    <div class="carousel-item flex-shrink-0 w-[36%] md:w-[18%] lg:w-[18%]">
                        <div class="relative group movies-bg h-36 md:h-[212px] lg:h-[288px] rounded-lg overflow-hidden">
                            <img
                                alt="{{ $movie['title'] }}"
                                class="w-full h-full object-cover rounded-lg transition-transform duration-200 group-hover:scale-110 group-hover:opacity-40"
                                src="{{ $movie['image'] }}"
                            />
                            <a href="/movie" class="absolute top-[4%] translate-y--1/2 h-[92%] left-[4%] translate-x--1/2 w-[92%] inset-0 bg-black bg-opacity-0 group-hover:bg-opacity-80 transition-opacity duration-200 rounded-lg lg:rounded-[6px] flex flex-col items-center justify-center opacity-0 group-hover:opacity-100">
                                <h3 class="text-base lg:text-xl font-semibold text-center mb-1 lg:mb-2">{{ $movie['title'] }}</h3>
                                <div class="flex items-center text-sm mb-1 lg:mb-[14px]">
                                    <i class="fas fa-clock w-4 h-4 mr-1"></i>
                                    <span>2h 15m</span>
                                </div>
                                <x-button variant="ghost" size="sm" class="text-sm lg:text-base py-[2px] lg:py-[5px] px-[6px] lg:px-4 text-white transition duration-300 hover:bg-[#a0b6b4] hover:text-[#1b1215]">
                                    <i class="fas fa-play w-4 h-4 mr-2"></i>
                                    Play
                                </x-button>
                            </a>
                        </div>
                        <div class="mt-2 text-sm lg:text-base">
                            <p class="font-semibold">{{ $movie['title'] }}</p>
                            <p class="text-gray-400">2021</p>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </section>
        @endforeach
    </main>
</div>

<script>
    function carousel() {
        return {
            currentIndex: 0,
            items: [],
            init() {
                this.items = this.$refs.carousel.children;
                this.cloneItems();
            },
            cloneItems() {
                const carousel = this.$refs.carousel;
                const items = Array.from(this.items);
                items.forEach(item => {
                    const clone = item.cloneNode(true);
                    carousel.appendChild(clone);
                });
            },
            next() {
                this.currentIndex = (this.currentIndex + 2) % this.items.length;
                this.update();
            },
            prev() {
                this.currentIndex = (this.currentIndex - 2 + this.items.length) % this.items.length;
                this.update();
            },
            update() {
                const itemWidth = this.items[0].offsetWidth;
                const gap = 20;
                const offset = this.currentIndex * (itemWidth + gap);
                this.$refs.carousel.style.transform = `translateX(-${offset}px)`;
            }
        }
    }
</script>
@endsection
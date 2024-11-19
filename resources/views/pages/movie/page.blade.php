@extends('layouts.app')

@section('content')

<div class="bg-gray-950 text-gray-100 px-12 lg:px-20 xl:px-32 pb-12">
    <div x-data="mainCarousel()" class="relative overflow-hidden mt-3 w-full mx-auto">
        <div class="flex items-center justify-between absolute top-0 left-0 right-0 h-[80vh]">
            <button @click="prev()" class="hover:bg-[#030712e3] bg-transparent text-gray-400 text-opacity-70 rounded-bl-lg transition duration-[250ms] p-2 z-10 w-8 lg:w-12 h-full">
                <i class="fas fa-chevron-left text-lg lg:text-3xl"></i>
            </button>
            <button @click="next()" class="hover:bg-[#030712e3] bg-transparent text-gray-400 text-opacity-70 transition duration-[250ms] p-2 z-10 w-8 lg:w-12 h-full">
                <i class="fas fa-chevron-right text-lg lg:text-3xl"></i>
            </button>
        </div>
        <div class="flex transition-transform duration-500 ease-in-out" x-ref="carousel">
            @foreach ($movies as $movieBanner)
            <div class="carousel-item flex-shrink-0 w-full">
                    <div class="relative group movies-bg h-[80vh] rounded-b-lg overflow-hidden">
                        <img
                            alt="{{ $movieBanner['title'] }}"
                            class="w-full h-full object-cover rounded-b-lg transition-transform duration-200 group-hover:scale-[1.06] group-hover:opacity-7"
                            src="{{ $movieBanner['image'] }}"
                        />
                        <div class="absolute inset-0 h-1/2 bottom-0 mt-auto" style="background: linear-gradient(to bottom, transparent, #030712);"></div>
                        <div class="absolute lg:bottom-6 bottom-4 lg:left-12 left-6">
                            <h2 class="text-2xl lg:text-[43px] font-bold text-gray-100" style="text-shadow: 2px 3px 9px rgb(135, 142, 182);">
                                {{ $movieBanner['title'] }}
                            </h2>
                            <div class="flex mt-6 gap-1">
                                <a href="/movies/{{ $movieBanner['id'] }}" class="text-gray-100 text-xl px-9 py-[10px] rounded-lg font-semibold" style="background: linear-gradient(to left, #dd7f27, #d32c56);">
                                    <i class="fa-solid fa-play mr-[6px]"></i>
                                    Watch Now
                                </a>
                                <a href="{{ route('favorite.add', $movieBanner['id']) }}" class="ml-4 text-gray-200 text-xl px-[14px] pb-2 pt-[9px] rounded-full font-semibold transition-all duration-[250ms] like-btn">
                                    <i class="fa-regular fa-heart"></i>
                                </a>
                                <button class="ml-4 text-gray-200 text-xl px-[14px] pb-2 pt-[9px] rounded-full font-semibold transition-all duration-[250ms] like-btn">
                                    <i class="fa-solid fa-share"></i>
                                </button>
                            </div>
                        </div>
                    </div>
            </div>
            @endforeach
        </div>
    </div>
    <div class="w-full mx-auto mt-6 lg:mt-12">
        <section class="mb-8">
            <a href="#" class="text-gray-100 text-lg md:text-xl lg:text-2xl font-semibold transition-all hover:text-gray-300">
                Trending
                <i class="fa-solid fa-chevron-right ml-[2px] lg:ml-1 text-base md:text-lg lg:text-xl"></i>
            </a>
            <div x-data="carousel()" class="relative overflow-hidden mt-3">
                <div class="flex items-center justify-between absolute top-0 left-0 right-0 md:h-[108px] lg:h-[144px]">
                    <button @click="prev(16)" class="hover:bg-[#030712e3] bg-transparent rounded-l-lg transition duration-[250ms] p-2 z-10 w-5 lg:w-9 h-full">
                        <i class="fas fa-chevron-left text-base lg:text-lg text-[#a6aab1]"></i>
                    </button>
                    <button @click="next(16)" class="hover:bg-[#030712e3] bg-transparent transition duration-[250ms] p-2 z-10 w-5 lg:w-9 h-full">
                        <i class="fas fa-chevron-right text-base lg:text-lg text-[#a6aab1]"></i>
                    </button>
                </div>
                <div class="flex transition-transform duration-500 ease-in-out gap-4" x-ref="carousel">
                    @foreach ($movies as $movie)
                    <div class="carousel-item flex-shrink-0 w-[27%] md:w-[30%] lg:w-[18%]">
                        <div class="relative group movies-bg h-36 md:h-[108px] lg:h-[144px] rounded-lg overflow-hidden">
                            <img
                                alt="{{ $movie['title'] }}"
                                class="w-full h-full object-cover rounded-lg transition-transform duration-200 group-hover:scale-110 group-hover:opacity-40"
                                src="{{ $movie['image'] }}"
                            />
                            <a href="/movies/{{ $movie['id'] }}" class="absolute top-[4%] translate-y--1/2 h-[92%] left-[4%] translate-x--1/2 w-[92%] transition duration-300 rounded-lg lg:rounded-[6px] flex flex-col items-center justify-center opacity-0 group-hover:opacity-100">
                                <i class="fa-solid fa-circle-play text-gray-200 text-[68px]"></i>
                            </a>
                        </div>
                        <div class="mt-2 pl-[6px]">
                            <p class="font-semibold text-gray-300 text-sm md:text-base lg:text-lg">{{ $movie['title'] }}</p>
                            <p class="text-gray-500 text-xs lg:text-sm">{{ \Carbon\Carbon::parse($movie->start_date)->format('F j, Y') }}</p>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </section>
        <section class="mb-[72px]">
            <a href="#" class="text-gray-100 text-lg md:text-xl lg:text-2xl font-semibold transition-all hover:text-gray-300">
                On theaters now
                <i class="fa-solid fa-chevron-right ml-[2px] lg:ml-1 text-base md:text-lg lg:text-xl"></i>
            </a>
            <div x-data="carousel()" class="relative overflow-hidden mt-3">
                <div class="flex items-center justify-between absolute top-0 left-0 right-0 md:h-[108px] lg:h-[144px]">
                    <button @click="prev(16)" class="hover:bg-[#030712e3] bg-transparent rounded-l-lg transition duration-[250ms] p-2 z-10 w-5 lg:w-9 h-full">
                        <i class="fas fa-chevron-left text-base lg:text-lg text-[#a6aab1]"></i>
                    </button>
                    <button @click="next(16)" class="hover:bg-[#030712e3] bg-transparent transition duration-[250ms] p-2 z-10 w-5 lg:w-9 h-full">
                        <i class="fas fa-chevron-right text-base lg:text-lg text-[#a6aab1]"></i>
                    </button>
                </div>
                <div class="flex transition-transform duration-500 ease-in-out gap-4" x-ref="carousel">
                    @foreach ($moviess as $movie)
                    <div class="carousel-item flex-shrink-0 w-[27%] md:w-[30%] lg:w-[18%]">
                        <div class="relative group movies-bg h-36 md:h-[108px] lg:h-[144px] rounded-lg overflow-hidden">
                            <img
                                alt="{{ $movie['title'] }}"
                                class="w-full h-full object-cover rounded-lg transition-transform duration-200 group-hover:scale-110 group-hover:opacity-40"
                                src="{{ $movie['image'] }}"
                            />
                            <a href="/movies/{{ $movie['id'] }}" class="absolute top-[4%] translate-y--1/2 h-[92%] left-[4%] translate-x--1/2 w-[92%] transition duration-300 rounded-lg lg:rounded-[6px] flex flex-col items-center justify-center opacity-0 group-hover:opacity-100">
                                <i class="fa-solid fa-circle-play text-gray-200 text-[68px]"></i>
                            </a>
                        </div>
                        <div class="mt-2 pl-[6px]">
                            <p class="font-semibold text-gray-300 text-sm md:text-base lg:text-lg">{{ $movie['title'] }}</p>
                            <p class="text-gray-500 text-xs lg:text-sm">{{ \Carbon\Carbon::parse($movie->start_date)->format('F j, Y') }}</p>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </section>

        @foreach ($genres as $genre)
            @if($genre->content->count() > 0)
            <section class="mb-12">
                <a href="#" class="text-gray-100 text-lg md:text-xl lg:text-2xl font-semibold transition-all hover:text-gray-300">
                    {{ $genre->name }} Movies
                    <i class="fa-solid fa-chevron-right ml-[2px] lg:ml-1 text-base md:text-lg lg:text-xl"></i>
                </a>
                <div x-data="carousel()" class="relative overflow-hidden mt-3">
                    <div class="flex items-center justify-between absolute top-0 left-0 right-0 md:h-[196px] lg:h-[256px]">
                        <button @click="prev(16)" class="hover:bg-[#030712e3] bg-transparent rounded-l-lg transition duration-[250ms] p-2 z-10 w-5 lg:w-8 h-full">
                            <i class="fas fa-chevron-left text-base lg:text-lg text-[#bfc1c5]"></i>
                        </button>
                        <button @click="next(16)" class="hover:bg-[#030712e3] bg-transparent transition duration-[250ms] p-2 z-10 w-5 lg:w-8 h-full">
                            <i class="fas fa-chevron-right text-base lg:text-lg text-[#bfc1c5]"></i>
                        </button>
                    </div>
                    <div class="flex transition-transform duration-500 ease-in-out gap-4" x-ref="carousel">
                        @foreach ($genre->content as $movie)
                        <div class="carousel-item flex-shrink-0 w-[27%] md:w-[27%] lg:w-[14.8%]">
                            <div class="relative group movies-bg h-36 md:h-[196px] lg:h-[256px] rounded-lg overflow-hidden">
                                <img
                                    alt="{{ $movie['title'] }}"
                                    class="w-full h-full object-cover rounded-lg transition-transform duration-200 group-hover:scale-110 group-hover:opacity-40"
                                    src="{{ $movie['image'] }}"
                                />
                                <a href="/movies/{{ $movie['id'] }}" class="absolute top-[4%] translate-y--1/2 h-[92%] left-[4%] translate-x--1/2 w-[92%] transition duration-300 rounded-lg flex flex-col items-center justify-center bg-black opacity-0 group-hover:opacity-100">
                                    <h3 class="text-base lg:text-xl font-semibold text-center mb-1 lg:mb-2">{{ $movie['title'] }}</h3>
                                    <div class="flex items-center text-sm mb-1 lg:mb-[14px]">
                                        <i class="fa-regular fa-clock mr-[6px] pt-[2px] text-sm"></i>
                                        <span>{{ $movie->duration < 60 ? $movie->duration . ' phút' : floor($movie->duration / 60) . ' giờ ' . ($movie->duration % 60) . ' phút' }}</span>
                                    </div>
                                    <x-button variant="ghost" size="sm" class="text-sm lg:text-base py-[2px] lg:py-[5px] px-[6px] lg:px-4 text-white transition duration-300 hover:bg-[#a0b6b4] hover:text-[#1b1215]">
                                        <i class="fas fa-play w-4 h-4 mr-2"></i>
                                        Play
                                    </x-button>
                                </a>
                            </div>
                            <div class="mt-2 pl-2">
                                <p class="font-semibold mb-0 text-gray-300 text-base md:text-lg lg:text-xl">{{ $movie['title'] }}</p>
                                <p class="text-gray-500 text-sm">{{ \Carbon\Carbon::parse($movie->start_date)->format('F j, Y') }}</p>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </section>
            @endif
        @endforeach
    </div>
</div>

<script>
    function mainCarousel() {
        return {
            currentIndex: 0,
            items: [],
            itemWidth: 0,
            init() {
                this.items = this.$refs.carousel.children;
                this.itemWidth = this.$refs.carousel.offsetWidth;
            },
            next() {
                if (this.currentIndex < this.items.length - 1) {
                    this.currentIndex++;
                } else {
                    this.currentIndex = 0;
                }
                this.update();
            },
            prev() {
                if (this.currentIndex > 0) {
                    this.currentIndex--;
                } else {
                    this.currentIndex = this.items.length - 1;
                }
                this.update();
            },
            update() {
                const offset = this.currentIndex * this.itemWidth;
                this.$refs.carousel.style.transform = `translateX(-${offset}px)`;
            }
        }
    }
    function carousel() {
        return {
            currentIndex: 0,
            items: [],
            init() {
                this.items = this.$refs.carousel.children;
                this.cloneItems();
            },
            next(gap) {
                this.currentIndex = (this.currentIndex + 2) % this.items.length;
                this.update(gap);
            },
            prev(gap) {
                this.currentIndex = (this.currentIndex - 2 + this.items.length) % this.items.length;
                this.update(gap);
            },
            update(gap) {
                const itemWidth = this.items[0].offsetWidth;
                const offset = this.currentIndex * (itemWidth + gap);
                this.$refs.carousel.style.transform = `translateX(-${offset}px)`;
            }
        }
    }
</script>

@endsection
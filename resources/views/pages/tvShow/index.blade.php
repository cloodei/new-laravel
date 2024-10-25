@extends('layouts.app')

@section('content')

<div class="xl:px-28 lg:px-20 md:px-16 px-12 lg:py-7 py-4">
    <div class="flex">
        <img
            alt="{{ $tvShow['title'] }}"
            class="object-cover rounded-lg w-[25%] h-[25%] border border-gray-800"
            style="box-shadow: rgba(74, 76, 82, 0.45) 0px 8px 20px, rgba(74, 76, 82, 0.25) 0px 6px 6px;"
            src="{{ $tvShow['image'] }}"
        />
        <div class="mt-6 lg:pl-16 md:pl-10 pl-7">
            <p class="text-xl md:text-2xl lg:text-3xl font-semibold mb-2">{{ $tvShow['title'] }}</p>
            <p class="text-sm mb-5 text-gray-500">
                Directed by <span class="text-gray-600">Daniel Atlas</span>
            </p>
            <p class="text-base text-sky-500 tracking-tighter">
                2019<span class="ml-4 text-rose-600">16+</span><span class="ml-[13px] text-[#7b879e]">2h<span class="ml-[2px]">30m</span></span>
            </p>
            <p class="text-base mb-5">
                <span class="text-gray-500">Genres:</span>
                <span class="text-gray-300">{{ $tvShow['genre'] }}</span>
            </p>
            <p class="text-base lg:text-lg mb-5">
                {{ $tvShow['description'] }}
            </p>
            <div class="flex items-center">
                <button class="bg-gray-200 text-gray-950 px-8 py-[10px] rounded-[100px] mr-3 transition duration-200 hover:bg-rose-400 hover:text-rose-950">
                    <i class="fa-solid fa-play mr-2"></i>
                    Play
                </button>
                <button class="bg-[#030712] text-gray-200 px-6 py-[10px] rounded-[100px] border border-gray-200 transition duration-200 hover:border-transparent hover:bg-sky-300 hover:text-black">
                    <i class="fa-solid fa-plus mr-[6px]"></i>
                    Add to Watchlist
                </button>
            </div>
        </div>
    </div>

    <div class="mt-10">
        <p class="text-lg md:text-xl lg:text-2xl font-semibold mb-5">
            Cast:
            <span class="text-base md:text-lg lg:text-xl font-medium text-gray-200">
                <span class="text-gray-500">Jesse Eisenberg</span>,
                <span class="text-gray-500">Mark Ruffalo</span>,
                <span class="text-gray-500">Woody Harrelson</span>,
                <span class="text-gray-500">Dave Franco</span>
            </span>
        </p>
        <p class="text-lg md:text-xl lg:text-2xl font-semibold mb-5">
            Tags:
            <span class="text-sm md:text-base lg:text-lg font-medium ml-2">
                <a href="#" class="text-sky-500 text-opacity-80 bg-slate-800 lg:py-[6px] lg:px-[10px] md:py-1 md:px-[7px] py-[3px] px-1 rounded-md">Drama</a>
                <a href="#" class="text-sky-500 text-opacity-80 bg-slate-800 lg:py-[6px] lg:px-[10px] md:py-1 md:px-[7px] py-[3px] px-1 rounded-md">Action</a>
                <a href="#" class="text-sky-500 text-opacity-80 bg-slate-800 lg:py-[6px] lg:px-[10px] md:py-1 md:px-[7px] py-[3px] px-1 rounded-md">Romance</a>
            </span>
        </p>
    </div>
    <section class="mt-20">
        <a href="#" class="text-gray-200 text-base md:text-lg lg:text-xl font-semibold transition-all hover:text-gray-400">
            See more
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
                @foreach ($tvShows as $tvShow)
                <div class="carousel-item flex-shrink-0 w-[27%] md:w-[30%] lg:w-[18%]">
                    <div class="relative group movies-bg h-36 md:h-[108px] lg:h-[144px] rounded-lg overflow-hidden">
                        <img
                            alt="{{ $tvShow['title'] }}"
                            class="w-full h-full object-cover rounded-lg transition-transform duration-200 group-hover:scale-110 group-hover:opacity-40"
                            src="{{ $tvShow['image'] }}"
                        />
                        <a href="/movie" class="absolute top-[4%] translate-y--1/2 h-[92%] left-[4%] translate-x--1/2 w-[92%] transition duration-300 rounded-lg lg:rounded-[6px] flex flex-col items-center justify-center opacity-0 group-hover:opacity-100">
                            <i class="fa-solid fa-circle-play text-gray-200 text-[68px]"></i>
                        </a>
                    </div>
                    <div class="mt-2 pl-[6px]">
                        <p class="font-semibold text-gray-300 text-sm md:text-base lg:text-lg">{{ $tvShow['title'] }}</p>
                        <p class="text-gray-500 text-xs lg:text-sm">2027</p>
                    </div>
                </div>
                @endforeach
                @foreach ($tvShows as $tvShow)
                <div class="carousel-item flex-shrink-0 w-[27%] md:w-[30%] lg:w-[18%]">
                    <div class="relative group movies-bg h-36 md:h-[108px] lg:h-[144px] rounded-lg overflow-hidden">
                        <img
                            alt="{{ $tvShow['title'] }}"
                            class="w-full h-full object-cover rounded-lg transition-transform duration-200 group-hover:scale-110 group-hover:opacity-40"
                            src="{{ $tvShow['image'] }}"
                        />
                        <a href="/movie" class="absolute top-[4%] translate-y--1/2 h-[92%] left-[4%] translate-x--1/2 w-[92%] transition duration-300 rounded-lg lg:rounded-[6px] flex flex-col items-center justify-center opacity-0 group-hover:opacity-100">
                            <i class="fa-solid fa-circle-play text-gray-200 text-[68px]"></i>
                        </a>
                    </div>
                    <div class="mt-2 pl-[6px]">
                        <p class="font-semibold text-gray-300 text-sm md:text-base lg:text-lg">{{ $tvShow['title'] }}</p>
                        <p class="text-gray-500 text-xs lg:text-sm">2027</p>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    <section class="mt-8 mb-4">
        <a href="#" class="text-gray-200 text-base md:text-lg lg:text-xl font-semibold transition-all hover:text-gray-400">
            Popular
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
                @foreach ($tvShows as $tvShow)
                <div class="carousel-item flex-shrink-0 w-[27%] md:w-[30%] lg:w-[18%]">
                    <div class="relative group movies-bg h-36 md:h-[108px] lg:h-[144px] rounded-lg overflow-hidden">
                        <img
                            alt="{{ $tvShow['title'] }}"
                            class="w-full h-full object-cover rounded-lg transition-transform duration-200 group-hover:scale-110 group-hover:opacity-40"
                            src="{{ $tvShow['image'] }}"
                        />
                        <a href="/movie" class="absolute top-[4%] translate-y--1/2 h-[92%] left-[4%] translate-x--1/2 w-[92%] transition duration-300 rounded-lg lg:rounded-[6px] flex flex-col items-center justify-center opacity-0 group-hover:opacity-100">
                            <i class="fa-solid fa-circle-play text-gray-200 text-[68px]"></i>
                        </a>
                    </div>
                    <div class="mt-2 pl-[6px]">
                        <p class="font-semibold text-gray-300 text-sm md:text-base lg:text-lg">{{ $tvShow['title'] }}</p>
                        <p class="text-gray-500 text-xs lg:text-sm">2027</p>
                    </div>
                </div>
                @endforeach
                @foreach ($tvShows as $tvShow)
                <div class="carousel-item flex-shrink-0 w-[27%] md:w-[30%] lg:w-[18%]">
                    <div class="relative group movies-bg h-36 md:h-[108px] lg:h-[144px] rounded-lg overflow-hidden">
                        <img
                            alt="{{ $tvShow['title'] }}"
                            class="w-full h-full object-cover rounded-lg transition-transform duration-200 group-hover:scale-110 group-hover:opacity-40"
                            src="{{ $tvShow['image'] }}"
                        />
                        <a href="/movie" class="absolute top-[4%] translate-y--1/2 h-[92%] left-[4%] translate-x--1/2 w-[92%] transition duration-300 rounded-lg lg:rounded-[6px] flex flex-col items-center justify-center opacity-0 group-hover:opacity-100">
                            <i class="fa-solid fa-circle-play text-gray-200 text-[68px]"></i>
                        </a>
                    </div>
                    <div class="mt-2 pl-[6px]">
                        <p class="font-semibold text-gray-300 text-sm md:text-base lg:text-lg">{{ $tvShow['title'] }}</p>
                        <p class="text-gray-500 text-xs lg:text-sm">2027</p>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
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
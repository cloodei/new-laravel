@extends('layouts.app')

@section('content')

<div class="bg-gray-950 text-gray-100 px-9 lg:px-16">
    <div x-data="carousel()" class="relative overflow-hidden mt-3 w-[90%] mx-auto">
        <div class="flex items-center justify-between absolute top-0 left-0 right-0 h-[80vh]">
            <button @click="prev()" class="hover:bg-[#030712e3] bg-transparent rounded-l-lg transition duration-[250ms] p-2 z-10 w-8 lg:w-12 h-full">
                <i class="fas fa-chevron-left text-lg lg:text-2xl text-[#bfc1c5]"></i>
            </button>
            <button @click="next()" class="hover:bg-[#030712e3] bg-transparent transition duration-[250ms] p-2 z-10 w-8 lg:w-12 h-full">
                <i class="fas fa-chevron-right text-lg lg:text-2xl text-[#bfc1c5]"></i>
            </button>
        </div>
        <div class="flex transition-transform duration-500 ease-in-out" x-ref="carousel">
            @foreach ($movies as $movie)
            <div class="carousel-item flex-shrink-0 w-full">
                <div class="relative group movies-bg h-[80vh] rounded-b-lg overflow-hidden">
                    <img
                        alt="{{ $movie['title'] }}"
                        class="w-full h-full object-cover rounded-b-lg transition-transform duration-200 group-hover:scale-110 group-hover:opacity-40"
                        src="{{ $movie['image'] }}"
                    />
                    <div class="absolute lg:bottom-8 bottom-4 lg:left-8 left-4">
                        <h2 class="text-2xl lg:text-[43px] font-bold mb-5">{{ $movie['title'] }}</h2>
                        <div class="flex mt-3">
                            <a href="#" class="text-gray-100 text-xl px-9 py-[10px] rounded-lg font-semibold" style="background: linear-gradient(to left, #dd7f27, #d32c56);">
                                <i class="fa-solid fa-play mr-[6px]"></i>
                                Watch Now
                            </a>
                            <button class="ml-4 text-gray-200 text-xl px-[14px] pb-2 pt-[9px] rounded-full font-semibold transition-all duration-[250ms] like-btn">
                                <i class="fa-regular fa-heart"></i>
                            </button>
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
</div>

<script>
    function carousel() {
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
</script>

@endsection
{{-- <x-hover-card>
    <x-slot name="trigger">
        <x-button>@laravelTesting</x-button>
    </x-slot>
    <x-slot name="content">
        <div class="flex justify-between space-x-4">
            <x-avatar src="https://img.stackshare.io/service/992/AcA2LnWL_400x400.jpg" fallback="VC" />
            <div class="space-y-1">
                <h4 class="text-sm font-semibold">@laravelPHP</h4>
                <p class="text-sm">
                    LaravelMovies. Test component đừng có động vào. Test tính năng hover card component
                </p>
                <div class="flex items-center pt-2">
                    <svg class="mr-2 h-4 w-4 opacity-70" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M8 7V3m8 4V3m-9 8h10m-5 4v5m-4-5h8m-8 0a4 4 0 108 0H8z" />
                    </svg>
                    <span class="text-xs text-gray-500">
                        Joined December 2021
                    </span>
                </div>
            </div>
        </div>
    </x-slot>
</x-hover-card> --}}
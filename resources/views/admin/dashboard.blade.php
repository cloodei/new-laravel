@extends('layouts.admin')

@section('content')
    <h2 class="text-3xl font-bold mb-4">Dashboard</h2>
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
        <div class="bg-gray-800 p-4 rounded-lg border border-slate-500 hover:scale-110 transition duration-[250ms]">
            <h3 class="text-xl font-semibold mb-2 flex justify-between items-center">
                Total Movies
                <i class="fa-solid fa-film pt-[2px]" style="color: #8184da; font-size: 32px;"></i>
            </h3>
            <p class="text-4xl font-bold">1,234</p>
        </div>
        <div class="bg-gray-800 p-4 rounded-lg border border-slate-500 hover:scale-110 transition duration-[250ms]">
            <h3 class="text-xl font-semibold mb-2 flex justify-between items-center">
                Total TV Shows
                <i class="fa-solid fa-tv" style="color: #34ad84; font-size: 32px;"></i>
            </h3>
            <p class="text-4xl font-bold">567</p>
        </div>
        <div class="bg-gray-800 p-4 rounded-lg border border-slate-500 hover:scale-110 transition duration-[250ms]">
            <h3 class="text-xl font-semibold mb-2 flex justify-between items-center">
                Categories
                <i class="fa-solid fa-layer-group" style="color: #FFD43B; font-size: 32px;"></i>
            </h3>
            <p class="text-4xl font-bold">100</p>
        </div>
        <div class="bg-gray-800 p-4 rounded-lg border border-slate-500 hover:scale-110 transition duration-[250ms]">
            <h3 class="text-xl font-semibold mb-2 flex justify-between items-center">
                Genres
                <i class="fa-solid fa-icons" style="color: #fd72bc; font-size: 32px;"></i>
            </h3>
            <p class="text-4xl font-bold">200</p>
        </div>
    </div>
@endsection
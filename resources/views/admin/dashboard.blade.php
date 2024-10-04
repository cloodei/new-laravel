@extends('layouts.admin')

@section('content')
    <h2 class="text-3xl font-bold mb-4">Dashboard</h2>
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
        <div class="bg-gray-800 p-4 rounded-lg">
            <h3 class="text-xl font-semibold mb-2">Total Movies</h3>
            <p class="text-4xl font-bold">1,234</p>
        </div>
        <div class="bg-gray-800 p-4 rounded-lg">
            <h3 class="text-xl font-semibold mb-2">Total TV Shows</h3>
            <p class="text-4xl font-bold">567</p>
        </div>
        <div class="bg-gray-800 p-4 rounded-lg">
            <h3 class="text-xl font-semibold mb-2">Categories</h3>
            <p class="text-4xl font-bold">15</p>
        </div>
        <div class="bg-gray-800 p-4 rounded-lg">
            <h3 class="text-xl font-semibold mb-2">Genres</h3>
            <p class="text-4xl font-bold">28</p>
        </div>
    </div>
@endsection
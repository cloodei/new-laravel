@extends('layouts.app')

@section('content')
<div class="container mx-auto p-4">
    <div class="flex flex-col items-center">
        {{-- <img src="{{ $movie['image'] }}" alt="{{ $movie['title'] }}" class="w-64 h-64 object-cover mb-4"> --}}
        <h1 class="text-3xl font-bold mb-2">Hello world</h1>
        <p class="text-lg mb-4">Rating: 5 / 5</p>
        <p class="text-base mb-4">Hello World!</p>
        <a href="/movies" class="text-blue-500 hover:underline">Back to Movies</a>
    </div>
</div>
@endsection
@extends('layouts.app')

@section('content')

<div class="relative min-h-[80vh]">
    <div class="w-[70%] right-[50%] translate-x-1/2 z-0 absolute" style="height: 80vh;">
        <video autoplay loop muted class="inset-0 w-full object-cover" style="height: 80vh;">
            <source src="{{ asset('storage/videos/bg-banner-vid.mp4') }}" type="video/mp4">
            Your browser does not support the video tag.
        </video>
        <div class="absolute inset-0" style="background: linear-gradient(to left, #030712cb, transparent, #030712cb);"></div>
        <div class="absolute inset-0 h-1/2 bottom-0 mt-auto" style="background: linear-gradient(to bottom, transparent, #030712);"></div>
    </div>
</div>

@endsection
@extends('layouts.admin')

@section('content')
<h2 class="text-3xl font-bold mb-4"> Edit Category</h2>
<div class="w-full max-w-">
    <div class="flex flex-col gap-8">
        @if ($errors->any())
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                <ul class="list-disc pl-5">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="bg-gray-800 p-4 rounded-lg h-fit flex-1 border border-slate-500">
            @if (session('status'))
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
                    <span class="block sm:inline">{{ session('status') }}</span>
                </div>
            @endif
            <form action="{{route('seasons.update', [$season->id])}}" method="POST">
                @method('PUT')
                @csrf
                <div class="mb-4">
                    <label for="seasonName" class="block text-sm font-medium text-gray-300">Season Name</label> 
                    <input id="seasonName" name="season_number" value="{{$season->name}}" class="bg-gray-700 mt-[10px] border border-gray-400 text-gray-100 p-2 rounded-md w-full">
                </div>
                <div class="mb-4">
                    <label for="seasonTitle" class="block text-sm font-medium text-gray-300">Title</label> 
                    <input id="seasonTitle" name="title" value="{{$season->slug}}" class="bg-gray-700 mt-[10px] border border-gray-400 text-gray-100 p-2 rounded-md w-full">
                </div>
                <div class="mb-6">
                    <label for="seasonDescription" class="block text-sm font-medium text-gray-300">Description</label>
                    <input id="seasonDescription" name="description" value="{{$season->description}}" class="bg-gray-700 mt-[10px] border border-gray-400 text-gray-100 p-2 rounded-md w-full">
                </div>
                <button type="submit" class="bg-blue-600 transition hover:bg-blue-900 text-gray-100 font-bold py-2 px-4 rounded-md">Edit Season</button>
            </form>
        </div>
    </div>
</div>
@endsection
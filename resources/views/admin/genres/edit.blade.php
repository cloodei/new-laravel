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
            <form action="{{route('genres.update', [$genre->id])}}" method="POST">
                @method('PUT')
                @csrf
                <div class="mb-4">
                    <label for="genresName" class="block text-sm font-medium text-gray-300">Genre Name</label> 
                    <input id="slug" name="name" value="{{$genre->name}}" onkeyup="ChangeToSlug();" class="bg-gray-700 mt-[10px] border border-gray-400 text-gray-100 p-2 rounded-md w-full">
                </div>
                <div class="mb-4">
                    <label for="genresSlug" class="block text-sm font-medium text-gray-300">Slug</label> 
                    <input id="convert_slug" name="slug" value="{{$genre->slug}}" class="bg-gray-700 mt-[10px] border border-gray-400 text-gray-100 p-2 rounded-md w-full">
                </div>
                <div class="mb-4">
                    <label for="genreActivate" class="block text-sm font-medium text-white">Kích hoạt</label>
                    <select id="genreActivate" name="activate" class="mt-1 block w-full border border-gray-600 bg-black text-white rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50">
                        @if ($genre->activate === 0)
                            <option selected value="0">Kích hoạt</option>
                            <option value="1">Không kích hoạt</option>
                        @else
                            <option value="0">Kích hoạt</option>
                            <option selected value="1">Không kích hoạt</option>
                        @endif
                    </select>
                </div>                              
                <button type="submit" class="bg-blue-600 transition hover:bg-blue-900 text-gray-100 font-bold py-2 px-4 rounded-md">Edit Genre</button>
            </form>
        </div>
    </div>
</div>
@endsection
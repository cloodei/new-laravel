@extends('layouts.admin')

@section('content')
<h2 class="text-3xl font-bold mb-4">Update Content</h2>
<div class="w-full max-w-2xl mx-auto">
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
        <div class="bg-gray-800 p-6 rounded-lg border border-gray-600">
            @if (session('status'))
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
                    <span class="block sm:inline">{{ session('status') }}</span>
                </div>
            @endif
            <form action="{{ route('contents.update', [$content->id]) }}" method="POST" enctype="multipart/form-data">
                @method('PUT')
                @csrf
                <div class="mb-4">
                    <label for="titleContent" class="block text-sm font-medium text-gray-300">Title</label>
                    <input id="title" name="title" value="{{ $content->title }}" class="bg-gray-700 mt-2 border border-gray-600 text-gray-100 p-2 rounded-md w-full">
                </div>
                <div class="mb-4">
                    <label for="descriptionContent" class="block text-sm font-medium text-gray-300">Description</label>
                    <textarea class="form-control w-full bg-gray-700 border border-gray-600 text-gray-100 p-2 rounded-md" name="description" id="description" rows="5" style="resize: none">{{ $content->description }}</textarea>
                </div>
                <div class="mb-4">
                    <label for="categoriesContent" class="block text-sm font-medium text-white">Category</label>
                    <select id="categories" name="category_id" class="mt-1 block w-full border border-gray-600 bg-black text-white rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50">
                        @foreach ($categories as $item)
                            <option {{ $item->id === $content->category_id ? 'selected' : '' }} value="{{ $item->id }}">{{ $item->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-4">
                    <label for="genresContent" class="block text-sm font-medium text-white">Genre</label>
                    @foreach ($genres as $item)
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" name="genre[]" type="checkbox" id="{{ $item->id }}" value="{{ $item->id }}" 
                                @if($content->thuocnhieuGenre->contains('id', $item->id)) checked @endif>
                            <label class="form-check-label text-gray-300" for="{{ $item->id }}">{{ $item->name }}</label>
                        </div>
                    @endforeach
                </div>
                <div class="mb-4">
                    <label for="seasonsContent" class="block text-sm font-medium text-white">Season</label>
                    <select id="seasons" name="season_id" class="mt-1 block w-full border border-gray-600 bg-black text-white rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50">
                        <option value="" {{ $content->season_id === null ? 'selected' : '' }}>No Season</option>
                        @foreach ($seasons as $item)
                            <option {{ $item->id === $content->season_id ? 'selected' : '' }} value="{{ $item->id }}">{{ $item->season_number }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-4">
                    <label for="durationContent" class="block text-sm font-medium text-gray-300">Duration</label>
                    <input id="duration" name="duration" value="{{ $content->duration }}" class="bg-gray-700 mt-2 border border-gray-600 text-gray-100 p-2 rounded-md w-full">
                </div>
                <div class="mb-4">
                    <label for="start_dateContent" class="block text-sm font-medium text-gray-300">Start Date</label>
                    <input id="start_date" name="start_date" value="{{ $content->start_date }}" class="bg-gray-700 mt-2 border border-gray-600 text-gray-100 p-2 rounded-md w-full">
                </div>
                <div class="mb-4">
                    <label for="imageContent" class="block text-sm font-medium text-gray-300">Hình ảnh</label>
                    <input type="file" class="mt-2 block w-full text-gray-100 bg-gray-700 border border-gray-600 rounded-md p-2" name="image">
                    <img src="{{ $content->image }}" alt="" class="mt-2" height="200" width="200">
                </div>
                <div class="mb-4">
                    <label for="trailerContent" class="block text-sm font-medium text-gray-300">Trailer</label>
                    <input type="file" class="mt-2 block w-full text-gray-100 bg-gray-700 border border-gray-600 rounded-md p-2" name="trailer">
                    <video width="200" height="200" controls class="mt-2">
                        <source src="{{ $content->trailer }}" type="video/mp4">
                    </video>
                </div>
                <div class="mb-4">
                    <label for="content_typeContent" class="block text-sm font-medium text-white">Loại</label>
                    <select id="content_type" name="content_type" class="mt-1 block w-full border border-gray-600 bg-black text-white rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50">
                        <option value="VIP" {{ $content->content_type === 'VIP' ? 'selected' : '' }}>VIP</option>
                        <option value="Reguler" {{ $content->content_type === 'Reguler' ? 'selected' : '' }}>Reguler</option>
                    </select>
                </div>
                <div class="mb-4">
                    <label for="activate" class="block text-sm font-medium text-white">Kích hoạt</label>
                    <select id="activate" name="activate" class="mt-1 block w-full border border-gray-600 bg-black text-white rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50">
                        <option value="1" {{ $content->activate === 1 ? 'selected' : '' }}>Kích hoạt</option>
                        <option value="0" {{ $content->activate === 0 ? 'selected' : '' }}>Không kích hoạt</option>
                    </select>
                </div>
                <button type="submit" class="bg-blue-600 transition hover:bg-blue-900 text-gray-100 font-bold py-2 px-4 rounded-md">Update Content</button>
            </form>
        </div>
    </div>
</div>
@endsection
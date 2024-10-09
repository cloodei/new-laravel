@extends('layouts.admin')

@section('content')
<h2 class="text-3xl font-bold mb-4">Genres</h2>
<div class="flex flex-col md:flex-row gap-8">
    <div class="bg-gray-800 p-4 rounded-lg h-fit flex-1 border border-slate-500">
        <h3 class="text-xl font-semibold mb-6">Add Genre</h3>
        <form action="" method="POST">
            @csrf
            <div class="mb-4">
                <label for="genreName" class="block text-sm font-medium text-gray-300">Genre Name</label>
                <input id="genreName" name="name" class="bg-gray-700 mt-[10px] border border-gray-400 text-gray-100 p-2 rounded-md w-full">
            </div>
            <div class="mb-6">
                <label for="genreSlug" class="block text-sm font-medium text-gray-300">Slug</label>
                <input id="genreSlug" name="slug" class="bg-gray-700 mt-[10px] border border-gray-400 text-gray-100 p-2 rounded-md w-full">
            </div>
            <button type="submit" class="bg-blue-600 transition hover:bg-blue-900 text-gray-100 font-bold py-2 px-4 rounded-md">Add Genre</button>
        </form>
    </div>
    <div class="bg-gray-800 p-4 pb-7 rounded-lg flex-1 border border-slate-500">
        <h3 class="text-[21px] font-semibold mb-4">Existing Genres</h3>
        <table class="w-full">
            <thead>
                <tr class="border-b border-gray-600 text-lg">
                    <th class="text-left p-2">Genre Name</th>
                    <th class="text-left p-2">Genre Slug</th>
                    <th class="text-left p-2"></th>
                </tr>
            </thead>
            <tbody>
                @foreach ([
                    ['name' => 'Action', 'slug' => 'action'],
                    ['name' => 'Comedy', 'slug' => 'comedy'],
                    ['name' => 'Drama', 'slug' => 'drama'],
                    ['name' => 'Horror', 'slug' => 'horror'],
                    ['name' => 'Sci-Fi', 'slug' => 'sci-fi']
                ] as $genre)
                    <tr class="border-b border-gray-600 hover:bg-slate-700 transition">
                        <td class="p-2 rounded-s-sm">{{ $genre['name'] }}</td>
                        <td class="p-2">{{ $genre['slug'] }}</td>
                        <td class="p-2 rounded-e-smrounded-s-sm">
                            <a href="#" class="text-blue-500 hover:text-gray-100 transition px-[9px] py-[7px] hover:bg-blue-700 rounded-lg">
                                <i class="fa-solid fa-pen-to-square text-xl"></i>
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
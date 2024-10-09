@extends('layouts.admin')

@section('content')
<h2 class="text-3xl font-bold mb-4">Movies</h2>
<div class="bg-gray-800 p-4 pb-7 rounded-lg border border-gray-600">
    <div class="flex justify-between items-center mb-4">
        <input type="search" placeholder="Search movies..." class="max-w-sm md:max-w-md lg:max-w-lg bg-gray-700 border border-slate-500 text-white p-2 pl-3 rounded-md placeholder-slate-200">
        <a href="#" class="bg-blue-600 hover:bg-blue-800 text-gray-100 transition font-bold py-[6px] px-4 rounded-lg">
            <i class="fa-solid fa-plus mr-2 text-lg"></i>
            Add Movie
        </a>
    </div>
    <div class="overflow-x-auto">
        <table class="w-full">
            <thead>
                <tr class="border-b border-gray-700 text-lg">
                    <th class="text-left p-2">Title</th>
                    <th class="text-left p-2">Genre</th>
                    <th class="text-left p-2">Release Year</th>
                    <th class="text-left p-2">Actions</th>
                </tr>
            </thead>
            <tbody>
                <tr class="border-b border-gray-700">
                    <td class="p-2">Inception</td>
                    <td class="p-2">Sci-Fi</td>
                    <td class="p-2">2010</td>
                    <td class="p-2">
                        <a href="#" class="text-blue-400 hover:text-blue-800 transition">
                            <i class="fa-solid fa-pen-to-square text-[27px]"></i>
                        </a>
                        <a href="#" class="text-[#dd4364] hover:text-red-800 transition ml-3">
                            <i class="fa-solid fa-ban text-[27px]"></i>
                        </a>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
@endsection
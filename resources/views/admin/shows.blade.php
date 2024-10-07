@extends('layouts.admin')

@section('content')

<h2 class="text-3xl font-bold mb-4">TV Shows</h2>
<div class="bg-gray-800 p-4 rounded-lg">
    <div class="flex justify-between items-center mb-4">
        <input type="search" placeholder="Search TV shows..." class="max-w-sm bg-gray-700 text-white p-2 rounded">
        <a href="#" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
            <i class="fa-solid fa-plus mr-2 h-4 w-4"></i>
            Add TV Show
        </a>
    </div>
    <div class="overflow-x-auto">
        <table class="w-full">
            <thead>
                <tr class="border-b border-gray-700">
                    <th class="text-left p-2">Title</th>
                    <th class="text-left p-2">Genre</th>
                    <th class="text-left p-2">Seasons</th>
                    <th class="text-left p-2">Actions</th>
                </tr>
            </thead>
            <tbody>
                <tr class="border-b border-gray-700">
                    <td class="p-2">Stranger Things</td>
                    <td class="p-2">Sci-Fi, Horror</td>
                    <td class="p-2">4</td>
                    <td class="p-2">
                        <a href="#" class="text-blue-500 hover:text-blue-700">Edit</a>
                        <a href="#" class="text-red-500 hover:text-red-700 ml-2">Delete</a>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
    
@endsection
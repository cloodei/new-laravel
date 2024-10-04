@extends('layouts.admin')

@section('content')
<h2 class="text-3xl font-bold mb-4">Categories</h2>
<div class="grid grid-cols-1 md:grid-cols-2 gap-8">
    <div class="bg-gray-800 p-4 rounded-lg">
        <h3 class="text-xl font-semibold mb-4">Add Category</h3>
        <form action="" method="POST">
            @csrf
            <div class="mb-4">
                <label for="categoryName" class="block text-sm font-medium text-gray-300">Category Name</label>
                <input id="categoryName" name="name" class="bg-gray-700 mt-3 text-white p-2 rounded w-full">
            </div>
            <div class="mb-4">
                <label for="categoryDescription" class="block text-sm font-medium text-gray-300">Description</label>
                <input id="categoryDescription" name="description" class="bg-gray-700 mt-3 text-white p-2 rounded w-full">
            </div>
            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Add Category</button>
        </form>
    </div>
    <div class="bg-gray-800 p-4 rounded-lg">
        <h3 class="text-xl font-semibold mb-4">Existing Categories</h3>
        <ul class="space-y-2">
            <li class="flex justify-between items-center">
                <span>Action</span>
                <a href="#" class="text-blue-500 hover:text-blue-700">Edit</a>
            </li>
            <li class="flex justify-between items-center">
                <span>Comedy</span>
                <a href="#" class="text-blue-500 hover:text-blue-700">Edit</a>
            </li>
            <li class="flex justify-between items-center">
                <span>Drama</span>
                <a href="#" class="text-blue-500 hover:text-blue-700">Edit</a>
            </li>
        </ul>
    </div>
</div>
@endsection
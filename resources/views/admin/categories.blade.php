@extends('layouts.admin')

@section('content')
<h2 class="text-3xl font-bold mb-4">Categories</h2>
<div class="flex flex-col md:flex-row gap-8">
    <div class="bg-gray-800 p-4 rounded-lg h-fit flex-1 border border-slate-500">
        <h3 class="text-xl font-semibold mb-6">Add Category</h3>
        <form action="" method="POST">
            @csrf
            <div class="mb-4">
                <label for="categoryName" class="block text-sm font-medium text-gray-300">Category Name</label>
                <input id="categoryName" name="name" class="bg-gray-700 mt-[10px] border border-gray-400 text-gray-100 p-2 rounded-md w-full">
            </div>
            <div class="mb-6">
                <label for="categoryDescription" class="block text-sm font-medium text-gray-300">Description</label>
                <input id="categoryDescription" name="description" class="bg-gray-700 mt-[10px] border border-gray-400 text-gray-100 p-2 rounded-md w-full">
            </div>
            <button type="submit" class="bg-blue-600 transition hover:bg-blue-900 text-gray-100 font-bold py-2 px-4 rounded-md">Add Category</button>
        </form>
    </div>
    <div class="bg-gray-800 p-4 pb-7 rounded-lg flex-1 border border-slate-500">
        <h3 class="text-[21px] font-semibold mb-4">Existing Categories</h3>
        <table class="w-full">
            <thead>
                <tr class="border-b border-gray-600 text-lg">
                    <th class="text-left p-2">Category Name</th>
                    <th class="text-left p-2">Description</th>
                    <th class="text-left p-2"></th>
                </tr>
            </thead>
            <tbody>
                @foreach ([
                    ['name' => 'Action', 'description' => 'Movies with a lot of action'],
                    ['name' => 'Comedy', 'description' => 'Movies that make you laugh'],
                    ['name' => 'Drama', 'description' => 'Movies that make you cry'],
                    ['name' => 'Horror', 'description' => 'Movies that scare you'],
                    ['name' => 'Sci-Fi', 'description' => 'Movies that make you think']
                ] as $category)
                    <tr class="border-b border-gray-600 hover:bg-slate-700 transition">
                        <td class="p-2 rounded-s-sm">{{ $category['name'] }}</td>
                        <td class="p-2">{{ $category['description'] }}</td>
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
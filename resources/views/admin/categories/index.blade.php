@extends('layouts.admin')

@section('content')
<h2 class="text-3xl font-bold mb-4">Categories</h2>
<div class="bg-gray-800 p-4 pb-7 rounded-lg border border-gray-600">
    <div class="flex justify-end items-center mb-4">
        <a href="categories/create" class="bg-blue-600 hover:bg-blue-800 text-gray-100 transition font-bold py-[6px] px-4 rounded-lg">
            <i class="fa-solid fa-plus mr-2 text-lg"></i>
            Add Category
        </a>
    </div>
    <div class="overflow-x-auto">
        <table class="w-full">
            <thead>
                <tr class="border-b border-gray-700 text-lg">
                    <th class="text-left p-2">Name</th>
                    <th class="text-left p-2">Description</th>
                    <th class="text-left p-2">Slug</th>
                    <th class="text-left p-2">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($categories as $item)
                <tr class="border-b border-gray-700">
                    <td class="p-2">{{$item->name}}</td>
                    <td class="p-2">{{$item->description}}</td>
                    <td class="p-2">{{$item->slug}}</td>
                    <td class="p-2">
                        <a href="{{route('categories.edit', [$item->id])}}" class="text-blue-400 hover:text-blue-800 transition">
                            <i class="fa-solid fa-pen-to-square text-[27px]"></i>
                        </a>
                        {{-- <a href="#" class="text-[#dd4364] hover:text-red-800 transition ml-3">
                            <i class="fa-solid fa-ban text-[27px]"></i>
                        </a> --}}
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
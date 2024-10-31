<!-- genres/index.blade.php -->
@extends('layouts.admin')

@section('content')
<div class="container mx-auto">
    <div class="flex justify-between items-center mb-8">
        <h2 class="text-4xl font-bold text-gray-300 border-b-[3px] border-blue-400 pb-1">Genres Management</h2>
        <div class="flex h-fit items-center justify-center gap-4">
            <div class="px-4 pt-[8px] pb-[9px] border rounded-lg border-sky-200 h-fit">
                <span class="text-gray-200">Total Genres:</span>
                <span class="font-bold text-blue-300 ml-[6px]">{{ $genres->count() }}</span>
            </div>
            <a href="genres/create" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg transition-colors duration-200 flex items-center">
                <i class="fa-solid fa-plus mr-2"></i>
                Add Genre
            </a>
        </div>
    </div>

    <div class="rounded-xl shadow-xl overflow-hidden">
        <div class="overflow-x-auto">
            <table class="min-w-full">
                <thead>
                    <tr class="bg-gradient-to-r from-sky-700 to-sky-950 text-white">
                        <th class="py-4 px-6 text-left text-sm font-semibold">Name</th>
                        <th class="py-4 px-6 text-left text-sm font-semibold">Slug</th>
                        <th class="py-4 px-6 text-left text-sm font-semibold">Status</th>
                        <th class="py-4 px-6 text-left text-sm font-semibold">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-700">
                    @foreach ($genres as $item)
                    <tr class="hover:bg-gray-700/50 transition-colors duration-200">
                        <td class="py-4 px-6 text-gray-300">{{$item->name}}</td>
                        <td class="py-4 px-6 text-gray-300">{{$item->slug}}</td>
                        <td class="py-4 px-6">
                            <span class="px-3 py-1 rounded-full text-sm font-semibold
                                {{ $item->activate === 0 ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                                {{ $item->activate === 0 ? 'Active' : 'Inactive' }}
                            </span>
                        </td>
                        <td class="py-4 px-6">
                            <a href="{{route('genres.edit', [$item->id])}}" 
                               class="text-blue-400 hover:text-blue-300 transition-colors duration-200">
                                <i class="fa-solid fa-pen-to-square text-2xl"></i>
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
<!-- seasons/index.blade.php -->
@extends('layouts.admin')

@section('content')
<div class="container mx-auto">
    <div class="flex justify-between items-center mb-8">
        <h2 class="text-4xl font-bold text-gray-300 border-b-[3px] border-blue-400 pb-1">Seasons Management</h2>
        <div class="flex h-fit items-center justify-center gap-4">
            <div class="px-4 pt-[8px] pb-[9px] border rounded-lg border-sky-200 h-fit">
                <span class="text-gray-200">Total Seasons:</span>
                <span class="font-bold text-blue-300 ml-[6px]">{{ $seasons->count() }}</span>
            </div>
            <a href="seasons/create" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg transition-colors duration-200 flex items-center">
                <i class="fa-solid fa-plus mr-2"></i>
                Add Season
            </a>
        </div>
    </div>

    <div class="bg-gray-800 rounded-xl shadow-xl overflow-hidden border border-gray-700">
        <div class="overflow-x-auto">
            <table class="min-w-full">
                <thead>
                    <tr class="bg-gradient-to-r from-sky-700 to-sky-950 text-white">
                        <th class="py-4 px-6 text-left text-sm font-semibold">Season Number</th>
                        <th class="py-4 px-6 text-left text-sm font-semibold">Title</th>
                        <th class="py-4 px-6 text-left text-sm font-semibold">Description</th>
                        <th class="py-4 px-6 text-left text-sm font-semibold">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-700">
                    @foreach ($seasons as $item)
                    <tr class="hover:bg-gray-700/50 transition-colors duration-200">
                        <td class="py-4 px-6 text-gray-300">{{$item->season_number}}</td>
                        <td class="py-4 px-6 text-gray-300">{{$item->title}}</td>
                        <td class="py-4 px-6 text-gray-300">{{$item->description}}</td>
                        <td class="py-4 px-6">
                            <a href="{{route('seasons.edit', [$item->id])}}" 
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
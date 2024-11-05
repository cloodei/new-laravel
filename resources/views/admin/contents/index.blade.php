@extends('layouts.admin')

@section('content')
<div class="container mx-auto">
    <div class="flex justify-between items-center mb-8">
        <h2 class="text-4xl font-bold text-gray-300 border-b-[3px] border-blue-400 pb-1">Contents Management</h2>
        <div class="flex h-fit items-center justify-center gap-4">
            <div class="px-4 pt-[8px] pb-[9px] border rounded-lg border-sky-200 h-fit">
                <span class="text-gray-200">Total Contents:</span>
                <span class="font-bold text-blue-300 ml-[6px]">{{ $contents->count() }}</span>
            </div>
            <a href="contents/create" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg transition-colors duration-200 flex items-center">
                <i class="fa-solid fa-plus mr-2"></i>
                Add Content
            </a>
        </div>
    </div>

    <div class="bg-gray-100 rounded-xl shadow-xl overflow-hidden border border-gray-700">
        <div class="overflow-x-auto">
            <table class="min-w-full">
                <thead>
                    <tr class="bg-gradient-to-r from-sky-700 to-sky-950 text-white">
                        <th class="py-4 px-6 text-left text-sm font-semibold">Title</th>
                        <th class="py-4 px-6 text-left text-sm font-semibold">Category</th>
                        <th class="py-4 px-6 text-left text-sm font-semibold">Genre</th>
                        <th class="py-4 px-6 text-left text-sm font-semibold">Season</th>
                        <th class="py-4 px-6 text-left text-sm font-semibold">Type</th>
                        <th class="py-4 px-6 text-left text-sm font-semibold">Status</th>
                        <th class="py-4 px-6 text-left text-sm font-semibold">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-700">
                    @if($contents->isEmpty())
                        <tr>
                            <td colspan="8" class="text-center py-8">
                                <div class="flex flex-col items-center text-gray-500">
                                    <svg class="w-16 h-16 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4"></path>
                                    </svg>
                                    <span class="text-xl">No contents found</span>
                                </div>
                            </td>
                        </tr>
                    @else
                        @foreach ($contents as $item)
                        <tr class="hover:bg-gray-700/50 transition-colors duration-200">
                            <td class="py-4 px-6 text-gray-300">{{$item->title}}</td>
                            <td class="py-4 px-6 text-gray-300">{{$item->category->name}}</td>
                            <td class="py-4 px-6 text-gray-300">
                                @foreach ($item->thuocnhieuGenre as $genre)
                                    <span class="inline-block bg-gray-700 px-2 py-1 rounded-full text-sm mb-1">
                                        {{ $genre->name }}
                                    </span>
                                    @if (!$loop->last)<br>@endif
                                @endforeach
                            </td>
                            <td class="py-4 px-6 text-gray-300">{{$item->season->season_number}}</td>
                            <td class="py-4 px-6">
                                <span class="px-3 py-1 rounded-full text-sm font-semibold
                                    {{ $item->activate === 0 ? 'bg-purple-100 text-purple-800' : 'bg-blue-100 text-blue-800' }}">
                                    {{ $item->activate === 0 ? 'VIP' : 'Regular' }}
                                </span>
                            </td>
                            <td class="py-4 px-6">
                                <span class="px-3 py-1 rounded-full text-sm font-semibold
                                    {{ $item->activate === 0 ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                                    {{ $item->activate === 0 ? 'Active' : 'Inactive' }}
                                </span>
                            </td>
                            <td class="py-4 px-6">
                                <a href="{{route('contents.edit', [$item->id])}}" 
                                class="text-blue-400 hover:text-blue-300 transition-colors duration-200">
                                    <i class="fa-solid fa-pen-to-square text-2xl"></i>
                                </a>
                            </td>
                        </tr>
                        @endforeach
                    @endif
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
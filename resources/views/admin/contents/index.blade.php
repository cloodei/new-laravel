@extends('layouts.admin')

@section('content')
<h2 class="text-3xl font-bold mb-4">Contents</h2>
<div class="bg-gray-800 p-4 pb-7 rounded-lg border border-gray-600">
    <div class="flex justify-end items-center mb-4">
        <a href="contents/create" class="bg-blue-600 hover:bg-blue-800 text-gray-100 transition font-bold py-[6px] px-4 rounded-lg">
            <i class="fa-solid fa-plus mr-2 text-lg"></i>
            Add Content
        </a>
    </div>
    <div class="overflow-x-auto">
        <table class="w-full">
            <thead>
                <tr class="border-b border-gray-700 text-lg">
                    <th class="text-left p-2">Titles</th>
                    <th class="text-left p-2">Description</th>
                    <th class="text-left p-2">Category</th>
                    <th class="text-left p-2">Genre</th>
                    <th class="text-left p-2">Season</th>
                    <th class="text-left p-2">Duration</th>
                    <th class="text-left p-2">Start Date</th>
                    <th class="text-left p-2">Image</th>
                    <th class="text-left p-2">Trailer</th>
                    <th class="text-left p-2">Loại</th>
                    <th class="text-left p-2">Activate</th>
                    <th class="text-left p-2">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($contents as $item)
                    <tr class="border-b border-gray-700">
                        <td class="p-2">{{$item->title}}</td>
                        <td class="p-2">{{$item->description}}</td>
                        <td class="p-2">{{$item->category->name}}</td>
                        <td class="p-2">
                            @foreach ($item->thuocnhieuGenre as $genre)
                                {{ $genre->name }}
                                @if (!$loop->last)
                                    , <br>
                                @endif
                            @endforeach
                        </td>
                        <td class="p-2">{{$item->season->season_number}}</td>
                        <td class="p-2">{{$item->duration}} phút</td>
                        <td class="p-2">{{$item->start_date}}</td>
                        <td class="p-2"><img src="{{asset('uploads/images/' . $item->image)}}" alt="" height="200" width="200"></td>
                        <td class="p-2">
                            <video width="200" height="200" controls>
                                <source src="{{ asset('uploads/trailer/' . $item->trailer) }}" type="video/mp4">
                            </video>
                        </td>
                        <td class="p-2">
                            @if ($item->activate === 0)
                                <span>VIP</span>
                            @else
                                <span>Reguler</span>
                            @endif
                        </td>
                        <td class="p-2">
                            @if ($item->activate === 0)
                                <span>Kích hoạt</span>
                            @else
                                <span>Không kích hoạt</span>
                            @endif
                        </td>
                        <td class="p-2">
                            <a href="{{route('contents.edit', [$item->id])}}" class="text-blue-400 hover:text-blue-800 transition">
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
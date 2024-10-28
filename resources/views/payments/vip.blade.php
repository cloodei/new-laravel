@extends('layouts.app')

@section('content')

<div class="content">
    <h2 class="text-3xl font-bold mb-4">VIP Packages</h2>
    <div class="bg-gray-800 p-4 pb-7 rounded-lg border border-gray-600">
        <div class="overflow-x-auto">
            <table class="min-w-full">
                <thead>
                    <tr class="border-b border-gray-700 text-lg">
                        <th class="text-left p-2">Name</th>
                        <th class="text-left p-2">Description</th>
                        <th class="text-left p-2">Price</th>
                        <th class="text-left p-2">Duration</th>
                        <th class="text-left p-2">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($vip as $item)
                    <tr class="border-b border-gray-700">
                        <td class="p-2">{{ $item->package_name }}</td>
                        <td class="p-2">{{ $item->description }}</td>
                        <td class="p-2">{{ number_format($item->price) }} VNĐ</td>
                        <td class="p-2">{{ $item->duration }} tháng</td>
                        <td class="p-2">
                            <a href="{{ route('payments.show', [$item->id]) }}" class="bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-700 transition">
                                Chọn
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
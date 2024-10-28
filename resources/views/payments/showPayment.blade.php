@extends('layouts.app')

@section('content')

<div class="content">
    <h2 class="text-3xl font-bold mb-4">Các gói đã mua</h2>
    <div class="bg-gray-800 p-4 pb-7 rounded-lg border border-gray-600">
        <div class="overflow-x-auto">
            <table class="min-w-full">
                <thead>
                    <tr class="border-b border-gray-700 text-lg">
                        <th class="text-left p-2">Payment date</th>
                        <th class="text-left p-2">Price</th>
                        <th class="text-left p-2">Trạng thái</th>
                        <th class="text-left p-2">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($payments as $item)
                    <tr class="border-b border-gray-700">
                        <td class="p-2">{{ $item->payment_date }}</td>
                        <td class="p-2">{{ number_format($item->payment_amount) }} VNĐ</td>
                        <td class="p-2">{{ $item->payment_status }}</td>
                        <td class="p-2">
                            @if ($item->payment_status === 'approved')
                                <span class="text-green-600 font-semibold">Thành công</span>
                            @else
                                <form action="{{ route('payments.delete', [$item->id]) }}" method="POST" style="display:inline;">
                                    @method('DELETE')
                                    @csrf
                                    <button type="submit" class="bg-red-500 text-white py-2 px-4 rounded hover:bg-red-700 transition">
                                        Hủy
                                    </button>
                                </form>
                            @endif
                        </td>                        
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection
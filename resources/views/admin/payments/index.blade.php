@extends('layouts.admin')

@section('content')
<div class="container mx-auto px-4 py-6">
    <h2 class="text-3xl font-bold mb-4">Danh sách thanh toán</h2>

    @if(session('success'))
        <div class="bg-green-500 text-white p-4 mb-4 rounded">
            {{ session('success') }}
        </div>
    @endif

    @if(session('error'))
        <div class="bg-red-500 text-white p-4 mb-4 rounded">
            {{ session('error') }}
        </div>
    @endif

    <div class="overflow-x-auto">
        <table class="min-w-full bg-white border border-gray-600 rounded-lg shadow-lg">
            <thead class="bg-gray-800 text-white">
                <tr>
                    <th class="border-b py-3 px-4 text-left">Người dùng</th>
                    <th class="border-b py-3 px-4 text-left">Số tiền</th>
                    <th class="border-b py-3 px-4 text-left">Trạng thái</th>
                    <th class="border-b py-3 px-4 text-left">Hành động</th>
                </tr>
            </thead>
            <tbody>
                @if($payments->isEmpty())
                    <tr>
                        <td colspan="4" class="text-center py-4 text-gray-500">Không có dữ liệu nào để hiển thị.</td>
                    </tr>
                @else
                    @foreach($payments as $item)
                        <tr class="hover:bg-gray-100 transition duration-150 ease-in-out">
                            <td class="border-b py-2 px-4 text-gray-800">{{ $item->user->name }}</td>
                            <td class="border-b py-2 px-4 text-gray-800">{{ number_format($item->payment_amount) }} VNĐ</td>
                            <td class="border-b py-2 px-4 text-gray-800">{{ ucfirst($item->payment_status) }}</td>
                            <td class="border-b py-2 px-4 flex space-x-2 items-center">
                                @if ($item->payment_status === 'pending')
                                    <form action="{{ route('admin.payments.approve', [$item->id]) }}" method="POST" class="inline">
                                        @csrf
                                        <button type="submit" class="bg-green-500 text-white px-3 py-1 rounded hover:bg-green-600 transition duration-150 ease-in-out">
                                            Xác nhận
                                        </button>
                                    </form>
                                    <form action="{{ route('admin.payments.reject', [$item->id]) }}" method="POST" class="inline">
                                        @csrf
                                        <button type="submit" class="bg-red-500 text-white px-3 py-1 rounded hover:bg-red-600 transition duration-150 ease-in-out">
                                            Hủy
                                        </button>
                                    </form>
                                @elseif ($item->payment_status === 'rejected')
                                    <span class="text-red-600 font-semibold">Không thành công</span>
                                @else
                                    <span class="text-green-600 font-semibold">Thành công</span>
                                @endif
                            </td>                            
                        </tr>
                    @endforeach
                @endif
            </tbody>
        </table>
    </div>    
</div>
@endsection
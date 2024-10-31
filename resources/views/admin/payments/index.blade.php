@extends('layouts.admin')

@section('content')
<div class="container mx-auto">
    <div class="flex justify-between items-center mb-8">
        <h2 class="text-4xl font-bold text-gray-300 border-b-[3px] border-blue-400 pb-1">Payment Management</h2>
        <div class="px-4 pt-[8px] pb-[9px] border rounded-lg border-sky-200">
            <span class="text-gray-200">Total Payments:</span>
            <span class="font-bold text-blue-300 ml-[6px]">{{ $payments->count() }}</span>
        </div>
    </div>

    @if(session('success'))
        <div class="bg-green-500 text-white p-4 mb-6 rounded-lg shadow-lg transform transition-all duration-500 hover:scale-[1.02]">
            <div class="flex items-center">
                <svg class="w-6 h-6 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
                {{ session('success') }}
            </div>
        </div>
    @endif

    @if(session('error'))
        <div class="bg-red-500 text-white p-4 mb-6 rounded-lg shadow-lg transform transition-all duration-500 hover:scale-[1.02]">
            <div class="flex items-center">
                <svg class="w-6 h-6 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
                {{ session('error') }}
            </div>
        </div>
    @endif

    <div class="bg-white rounded-xl shadow-xl overflow-hidden">
        <div class="overflow-x-auto">
            <table class="min-w-full">
                <thead>
                    <tr class="bg-gradient-to-r from-sky-700 to-sky-950 text-white">
                        <th class="py-4 px-6 text-left text-sm font-semibold uppercase tracking-wider">User</th>
                        <th class="py-4 px-6 text-left text-sm font-semibold uppercase tracking-wider">Amount</th>
                        <th class="py-4 px-6 text-left text-sm font-semibold uppercase tracking-wider">Status</th>
                        <th class="py-4 px-6 text-left text-sm font-semibold uppercase tracking-wider">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    @if($payments->isEmpty())
                        <tr>
                            <td colspan="4" class="text-center py-8">
                                <div class="flex flex-col items-center text-gray-500">
                                    <svg class="w-16 h-16 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4"></path>
                                    </svg>
                                    <span class="text-xl">No payments found</span>
                                </div>
                            </td>
                        </tr>
                    @else
                        @foreach($payments as $item)
                            <tr class="bg-gray-200 hover:bg-[#90a9bb] transition duration-200">
                                <td class="py-4 px-6">
                                    <div class="flex items-center">
                                        <div class="h-10 w-10 rounded-full bg-blue-300 flex items-center justify-center text-blue-600 font-bold">
                                            {{ strtoupper(substr($item->user->name, 0, 2)) }}
                                        </div>
                                        <span class="ml-4 font-medium text-gray-900">{{ $item->user->name }}</span>
                                    </div>
                                </td>
                                <td class="py-4 px-6">
                                    <span class="font-semibold text-gray-950">{{ number_format($item->payment_amount) }}</span>
                                    <span class="text-gray-700 ml-1">VNĐ</span>
                                </td>
                                <td class="py-4 px-6">
                                    <span class="px-4 pt-1 pb-[6px] rounded-full text-sm font-semibold {{ $item->payment_status === 'pending' ? 'bg-yellow-200 text-yellow-600' : ($item->payment_status === 'rejected' ? 'bg-red-200 text-red-600' : 'bg-green-100 text-green-600') }}">
                                        {{ ucfirst($item->payment_status) }}
                                    </span>
                                </td>
                                <td class="py-4 px-6">
                                    @if ($item->payment_status === 'pending')
                                        <div class="flex space-x-2">
                                            <form action="{{ route('admin.payments.approve', [$item->id]) }}" method="POST">
                                                @csrf
                                                <button type="submit" class="bg-green-500 hover:bg-green-600 text-white px-4 py-[6px] rounded-lg transition-colors duration-200 flex items-center">
                                                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                                    </svg>
                                                    Approve
                                                </button>
                                            </form>
                                            <form action="{{ route('admin.payments.reject', [$item->id]) }}" method="POST">
                                                @csrf
                                                <button type="submit" class="bg-red-500 hover:bg-red-600 text-white px-4 py-[6px] rounded-lg transition-colors duration-200 flex items-center">
                                                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                                                    </svg>
                                                    Reject
                                                </button>
                                            </form>
                                        </div>
                                    @else
                                        <span class="{{ $item->payment_status === 'rejected' ? 'text-red-600' : 'text-green-600' }} font-semibold">
                                            {{ $item->payment_status === 'rejected' ? 'Payment Rejected' : 'Payment Completed' }}
                                        </span>
                                    @endif
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
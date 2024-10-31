@extends('layouts.app')

@section('content')
<div class="p-8 max-w-7xl mx-auto px-4">
    <h2 class="text-3xl font-bold mb-8 text-center">VIP Membership Packages</h2>
    
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
        @foreach ($vip as $item)
        <div class="bg-gray-800 rounded-xl overflow-hidden shadow-lg border border-gray-700 hover:border-blue-500 transition-all duration-300 transform hover:-translate-y-2">
            <div class="p-6">
                <div class="text-2xl font-bold text-blue-500 mb-4">{{ $item->package_name }}</div>
                
                <div class="space-y-4">
                    <div class="text-3xl font-bold text-white">
                        {{ number_format($item->price) }} VNĐ
                    </div>
                    
                    <div class="text-gray-400">
                        <span class="font-semibold text-white">Duration:</span> 
                        {{ $item->duration }} tháng
                    </div>
                    
                    <div class="text-gray-300 min-h-[80px]">
                        {{ $item->description }}
                    </div>
                </div>
            </div>

            <div class="px-6 pb-6">
                <a href="{{ route('payments.show', [$item->id]) }}" 
                   class="block w-full text-center bg-blue-600 hover:bg-blue-700 text-white font-bold py-3 px-4 rounded-lg transition-colors duration-200">
                    Select Package
                </a>
            </div>
        </div>
        @endforeach
    </div>
</div>

@endsection
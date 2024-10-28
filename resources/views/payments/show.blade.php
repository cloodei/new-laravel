@extends('layouts.app')

@section('content')
    <div class="container mx-auto px-4 py-6">
        <h1 class="text-2xl font-bold text-center mb-4">Thanh toán gói VIP: {{ $package->package_name }}</h1>
        <p class="text-xl text-center mb-6">Giá: {{ number_format($package->price) }} VNĐ</p>
        
        <div class="flex justify-center mb-6">
            <!-- QR code thanh toán -->
            @if ( $package->id === 1 )
                <img src="{{ asset('storage/QR_code/QR_40000.png') }}" alt="QR Code" class="w-64 h-64">
            @elseif ( $package->id === 2 )
                <img src="{{ asset('storage/QR_code/QR_150000.png') }}" alt="QR Code" class="w-64 h-64">
            @elseif ( $package->id === 3 )
                <img src="{{ asset('storage/QR_code/QR_400000.png') }}" alt="QR Code" class="w-64 h-64">
            @endif
        </div>
        
        <div class="flex justify-center space-x-4">
            <form action="{{ route('payments.process', [$package->id]) }}" method="POST">
                @csrf
                <input type="hidden" name="amount" value="{{ $package->price }}">
                <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600 transition">Đã thanh toán</button>
            </form>
            <a href="/vip" class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600 transition">
                Hủy
            </a>
        </div>        
    </div>
@endsection
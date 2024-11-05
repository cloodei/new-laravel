@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-gray-900 via-gray-800 to-gray-900">
    <div class="max-w-4xl mx-auto px-4 py-12">
        <div class="relative">
            <div class="absolute inset-0 bg-blue-500/10 backdrop-blur-xl rounded-2xl"></div>
            <div class="relative p-8 text-center">
                <div class="relative inline-block">
                    <div class="w-32 h-32 rounded-full border-4 border-blue-500/30 p-1 backdrop-blur-sm">
                        @if($user->image)
                            <img src="{{ asset('storage/' . $user->image) }}" 
                                 alt="{{ $user->name }}" 
                                 class="w-full h-full object-cover rounded-full">
                        @else
                            <div class="w-full h-full rounded-full bg-blue-600 flex items-center justify-center text-3xl font-bold text-white">
                                {{ strtoupper(substr($user->name, 0, 1)) }}
                            </div>
                        @endif
                    </div>
                    
                    <div class="absolute -bottom-2 -right-2">
                        @if($user->subscription_type === 'VIP')
                            <span class="px-3 py-1 rounded-full text-xs font-semibold bg-gradient-to-r from-yellow-400 to-yellow-600 text-white shadow-lg">
                                VIP
                            </span>
                        @else
                            <span class="px-3 py-1 rounded-full text-xs font-semibold bg-gray-600 text-gray-200">
                                Free
                            </span>
                        @endif
                    </div>
                </div>

                <h1 class="mt-6 text-3xl font-bold text-white">
                    {{ $user->name }}
                </h1>
                
                <p class="mt-2 text-blue-400">
                    {{ $user->email }}
                </p>
            </div>
        </div>

        <div class="mt-8 grid grid-cols-1 md:grid-cols-2 gap-6">
            <div class="bg-gray-800/50 backdrop-blur-md rounded-xl p-6 border border-gray-700">
                <div class="flex items-center justify-between">
                    <h2 class="text-xl font-semibold text-white">Subscription</h2>
                    <i class="fas fa-crown text-yellow-500"></i>
                </div>
                <p class="mt-2 text-gray-400">Current Plan</p>
                <p class="mt-1 text-2xl font-bold text-blue-400">
                    {{ ucfirst($user->subscription_type) }}
                </p>
            </div>

            <div class="bg-gray-800/50 backdrop-blur-md rounded-xl p-6 border border-gray-700">
                <div class="flex items-center justify-between">
                    <h2 class="text-xl font-semibold text-white">Account Status</h2>
                    <i class="fas fa-shield-alt text-green-500"></i>
                </div>
                <p class="mt-2 text-gray-400">Member Since</p>
                <p class="mt-1 text-2xl font-bold text-blue-400">
                    {{ $user->created_at->format('M Y') }}
                </p>
            </div>
        </div>
    </div>
</div>
@endsection
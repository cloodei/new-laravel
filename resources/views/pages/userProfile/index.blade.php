@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-gray-950 via-gray-900 to-gray-950">
    <div class="max-w-5xl mx-auto px-4 py-12">
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
            <div class="bg-gray-800/50 backdrop-blur-md rounded-xl p-6 border border-gray-700 transition-all duration-200 hover:-translate-y-2">
                <div class="flex items-center justify-between">
                    <h2 class="text-xl font-semibold text-white">Subscription</h2>
                    <i class="fas fa-crown text-yellow-500"></i>
                </div>
                <p class="mt-1 text-gray-400">Current Plan</p>
                <p class="mt-2 text-2xl font-bold text-blue-400 flex items-center justify-between">
                    <span>
                        {{ ucfirst($user->subscription_type) }}
                    </span>
                    <a href="/vip" class="ml-2 text-base text-sky-600 hover:underline">
                        {{ $user->subscription_type === 'VIP' ? 'Manage Subscription' : 'Upgrade Now' }}
                    </a>
                </p>
            </div>

            <div class="bg-gray-800/50 backdrop-blur-md rounded-xl p-6 border border-gray-700 transition-all duration-200 hover:-translate-y-2">
                <div class="flex items-center justify-between">
                    <h2 class="text-xl font-semibold text-white">Account Status</h2>
                    <i class="fas fa-shield-alt text-green-500"></i>
                </div>
                <p class="mt-1 text-gray-400">Member Since</p>
                <p class="mt-2 text-2xl font-bold text-blue-400">
                    {{ $user->created_at->format('M Y') }}
                </p>
            </div>
        </div>
        
        <div class="mt-8" x-data="{ 
            showModal: false,
            modalType: null,
            paymentToCancel: null,
            subscriptionToRefund: null
        }">
            @if($pendingPayment)
                <div class="bg-yellow-500/10 backdrop-blur-md rounded-xl p-6 border border-yellow-500/30">
                    <h2 class="text-xl font-semibold text-white mb-3">Pending Payments</h2>
                    <div class="flex items-center justify-between py-2 border-b border-gray-700">
                        <div>
                            <p class="text-yellow-400 font-bold text-2xl">
                                {{ $currentPendingPackage }}
                            </p>
                            <p class="text-sm text-gray-400 mt-2">
                                {{ number_format($pendingPayment->payment_amount) }} VNĐ
                            </p>
                            <span class="inline-block mt-1 px-2 py-1 rounded-md text-xs bg-yellow-500/20 text-yellow-400">
                                Pending Approval
                            </span>
                        </div>
                        <button @click="showModal = true; modalType = 'cancel'; paymentToCancel = {{ $pendingPayment->id }}" 
                                class="px-4 py-2 rounded-lg bg-red-500/20 border border-red-500/30 text-red-400 hover:bg-red-500/30 transition duration-150">
                            Cancel Payment
                        </button>
                    </div>
                </div>
            @endif

            @if($currentSubscription)
                <div class="mt-6 bg-blue-500/10 backdrop-blur-md rounded-xl p-6 border border-blue-500/30">
                    <div class="flex items-center justify-between mb-3">
                        <h2 class="text-xl font-semibold text-white">Current Subscription</h2>
                        <span class="px-3 py-1 rounded-full text-xs font-medium bg-green-500/20 text-green-400">
                            Active
                        </span>
                    </div>
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-blue-400 font-bold text-2xl" style='font-family: "Chakra Petch", sans-serif;'>
                                {{ $currentSubscriptionPackage }}
                            </p>
                            <p class="text-sm text-gray-400 mt-2">
                                Expires: {{ Carbon\Carbon::parse($currentSubscription->end_date)->format('M d, Y') }}
                            </p>
                        </div>
                        <button @click="showModal = true; modalType = 'refund'; subscriptionToRefund = {{ $currentSubscription->id }}" 
                                class="px-4 py-2 rounded-lg bg-red-500/20 border border-red-500/30 text-red-400 hover:bg-red-500/30 transition duration-150">
                            Request Refund
                        </button>
                    </div>
                </div>
            @endif

            <div x-show="showModal" x-cloak
                 class="fixed inset-0 z-50 overflow-y-auto pt-[15vh]">
                <div class="flex items-center justify-center min-h-screen px-4 pt-4 pb-20 text-center sm:block sm:p-0">
                    <div class="fixed inset-0 transition-opacity" aria-hidden="true">
                        <div class="absolute inset-0 bg-gray-900 opacity-90"></div>
                    </div>
        
                    <div class="inline-block align-bottom bg-gray-800 rounded-xl text-left overflow-hidden shadow-2xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full border border-gray-700">
                        <div class="bg-gray-800 px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                            <template x-if="modalType === 'cancel'">
                                <div>
                                    <h3 class="text-2xl font-bold text-center text-red-400 mb-4">
                                        Confirm Cancellation
                                    </h3>
                                    <p class="text-center text-gray-300 mb-6">
                                        Are you sure you want to cancel this payment? This action cannot be undone.
                                    </p>
                                </div>
                            </template>
                            
                            <template x-if="modalType === 'refund'">
                                <div>
                                    <h3 class="text-2xl font-bold text-center text-red-400 mb-4">
                                        Confirm Refund Request
                                    </h3>
                                    <p class="text-center text-gray-300 mb-6">
                                        Are you sure you want to request a refund? Your VIP subscription will be cancelled immediately.
                                    </p>
                                </div>
                            </template>
                        </div>
        
                        <div class="bg-gray-900 px-6 py-4 sm:px-6 sm:flex sm:flex-row-reverse gap-3">
                            <template x-if="modalType === 'cancel'">
                                <form :action="`/payments/delete/${paymentToCancel}`" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="w-full inline-flex justify-center rounded-lg border border-transparent px-5 py-2.5 bg-red-700 text-base font-medium text-white hover:bg-red-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-900 focus:ring-red-500 sm:ml-3 sm:w-auto sm:text-sm transition duration-150 ease-in-out">
                                        Confirm Cancel
                                    </button>
                                </form>
                            </template>
                            <template x-if="modalType === 'refund'">
                                <form>
                                    {{-- @csrf :action="`/subscription/refund/${subscriptionToRefund}`" method="POST"
                                    @method('POST') --}}
                                    <button type="button" @click="showModal = false" class="w-full inline-flex justify-center rounded-lg border border-transparent px-5 py-2.5 bg-red-700 text-base font-medium text-white hover:bg-red-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-900 focus:ring-red-500 sm:ml-3 sm:w-auto sm:text-sm transition duration-150 ease-in-out">
                                        Confirm Refund
                                    </button>
                                </form>
                            </template>
                            <button @click="showModal = false" 
                                    class="mt-3 w-full inline-flex justify-center rounded-lg border border-sky-950 px-5 py-2.5 bg-blue-950 text-base font-medium text-gray-200 hover:bg-blue-900 hover:text-white focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-900 focus:ring-gray-500 sm:mt-0 sm:w-auto sm:text-sm transition duration-150 ease-in-out">
                                <span x-text="modalType === 'cancel' ? 'Keep Payment' : 'Keep Subscription'"></span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
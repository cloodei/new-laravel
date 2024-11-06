@extends('layouts.app')

@section('content')
<div class="p-8 max-w-7xl mx-auto px-4">
    <h2 class="text-3xl font-bold mb-8 text-center">VIP Membership Packages</h2>
    
    <div class="flex items-center justify-center gap-8" 
     x-data="{ 
        openModal: false,
        selectedPackage: { id: null, name: '', price: '', rawPrice: '' },
        toggleModal(value) {
            this.openModal = value;
            if(value) {
                document.body.classList.add('overflow-Hidden');
            }
            else {
                setTimeout(() => {
                    document.body.classList.remove('overflow-Hidden');
                }, 160);
            }
        }
     }">
        @foreach ($vip as $item)
        <div class="bg-gray-800 rounded-xl overflow-Hidden shadow-lg border border-gray-700 hover:border-blue-500 transition-all duration-300 transform hover:-translate-y-2">
            <div class="p-6">
                <div class="text-2xl font-bold text-blue-500 mb-4">
                    {{ $item->package_name }}
                </div>
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
                <button @click="toggleModal(true); selectedPackage = {
                    id: {{ $item->id }},
                    name: '{{ $item->package_name }}',
                    price: '{{ number_format($item->price) }}',
                    rawPrice: {{ $item->price }}
                }" 
                class="block w-full text-center bg-blue-600 hover:bg-blue-700 text-white font-bold py-3 px-4 rounded-lg transition-colors duration-200">
                    Select Package
                </button>
            </div>
        </div>
        @endforeach

        <div x-show="openModal" 
            x-cloak
            x-transition:enter="transition ease-out duration-200"
            x-transition:enter-start="opacity-0 transform scale-95"
            x-transition:enter-end="opacity-100 transform scale-100"
            x-transition:leave="transition ease-in duration-150"
            x-transition:leave-start="opacity-100 transform scale-100"
            x-transition:leave-end="opacity-0 transform scale-95"
            class="fixed inset-0 z-50 pt-[10vh]"
            style="display: none;">
            <div class="flex items-center justify-center min-h-screen px-4 pt-4 pb-20 text-center sm:block sm:p-0">
                <div class="fixed inset-0 transition-opacity" aria-hidden="true">
                    <div class="absolute inset-0 bg-gray-900 opacity-90"></div>
                </div>

                <div class="inline-block align-bottom bg-gray-800 rounded-xl text-left overflow-hidden shadow-2xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full border border-gray-700">
                    <div class="bg-gray-800 px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                        <h3 class="text-2xl font-bold text-center text-blue-400 mb-4">
                            Thanh toán gói VIP: <span x-text="selectedPackage.name" class="text-white"></span>
                        </h3>
                        <p class="text-xl text-center mb-6 text-gray-300">
                            Giá: <span x-text="selectedPackage.price" class="text-white font-semibold"></span> VNĐ
                        </p>
                        
                        <div class="flex justify-center mb-6">
                            <div class="p-3 bg-gray-700 rounded-lg shadow-inner">
                                <template x-if="selectedPackage.id == 1">
                                    <img src="{{ asset('storage/QR_code/QR_40000.png') }}" alt="QR Code" class="w-64 h-64">
                                </template>
                                <template x-if="selectedPackage.id == 2">
                                    <img src="{{ asset('storage/QR_code/QR_150000.png') }}" alt="QR Code" class="w-64 h-64">
                                </template>
                                <template x-if="selectedPackage.id == 3">
                                    <img src="{{ asset('storage/QR_code/QR_400000.png') }}" alt="QR Code" class="w-64 h-64">
                                </template>
                            </div>
                        </div>
                    </div>

                    <div class="bg-gray-900 px-6 py-4 sm:px-6 sm:flex sm:flex-row-reverse gap-3">
                        <form :action="`/payments/${selectedPackage.id}`" method="POST" class="inline-block">
                            @csrf
                            <input type="hidden" name="amount" x-bind:value="selectedPackage.rawPrice">
                            <button type="submit" 
                                    class="w-full inline-flex justify-center rounded-lg border border-transparent px-5 py-2.5 bg-gradient-to-r from-blue-600 to-blue-700 text-base font-medium text-white hover:from-blue-700 hover:to-blue-800 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-900 focus:ring-blue-500 sm:ml-3 sm:w-auto sm:text-sm transition duration-150 ease-in-out transform hover:-translate-y-0.5">
                                Đã thanh toán
                            </button>
                        </form>
                        <button type="button" 
                                @click="toggleModal(false)" 
                                class="mt-3 w-full inline-flex justify-center rounded-lg border border-gray-600 px-5 py-2.5 bg-gray-800 text-base font-medium text-gray-300 hover:bg-gray-700 hover:text-white focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-900 focus:ring-gray-500 sm:mt-0 sm:w-auto sm:text-sm transition duration-150 ease-in-out">
                            Hủy
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
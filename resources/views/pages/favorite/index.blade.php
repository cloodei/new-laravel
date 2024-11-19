@extends('layouts.app')

@section('content')
    <div class="container mx-auto py-6">
        <div class="flex flex-wrap gap-6 justify-center">
            @foreach ($favorites as $favorite)
                <div class="w-64">
                    <div class="relative group h-64 rounded-lg overflow-hidden bg-gray-800 shadow-lg">
                        {{-- Image --}}
                        <img
                            alt="{{ $favorite->content->title }}" 
                            class="w-full h-full object-cover transition-transform duration-300 group-hover:scale-110" 
                            src="{{ $favorite->content->image }}"
                        />
                        <a 
                            href="javascript:void(0);" 
                            onclick="confirmRemove('{{ route('favorite.remove', $favorite->content->id) }}')" 
                            class="absolute inset-0 flex flex-col items-center justify-center bg-black bg-opacity-60 opacity-0 group-hover:opacity-100 transition duration-300"
                        >
                            <h3 class="text-white text-lg font-semibold text-center mb-2">{{ $favorite->content->title }}</h3>
                            <div class="text-sm text-gray-300 mb-4">
                                <i class="fa-regular fa-clock mr-2"></i>
                                {{ $favorite->content->duration < 60 ? $favorite->content->duration . ' phút' : floor($favorite->content->duration / 60) . ' giờ ' . ($favorite->content->duration % 60) . ' phút' }}
                            </div>
                            <button class="px-4 py-2 bg-red-500 text-white text-sm font-semibold rounded hover:bg-red-600 transition duration-300">
                                <i class="fas fa-trash-alt mr-2"></i> Xóa khỏi yêu thích
                            </button>
                        </a>
                    </div>
                    <div class="mt-3 text-center">
                        <p class="text-gray-300 font-semibold text-base">{{ $favorite->content->title }}</p>
                        <p class="text-gray-500 text-sm">{{ \Carbon\Carbon::parse($favorite->content->start_date)->format('F j, Y') }}</p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    {{-- SweetAlert2 Script --}}
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        function confirmRemove(url) {
            Swal.fire({
                title: 'Xác nhận xóa',
                text: 'Bạn có chắc chắn muốn xóa nội dung này khỏi danh sách yêu thích?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Xóa',
                cancelButtonText: 'Hủy'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = url;
                }
            });
        }
    </script>
@endsection

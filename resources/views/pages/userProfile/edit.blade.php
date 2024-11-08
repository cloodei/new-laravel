@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-gray-950 via-gray-900 to-gray-950">
    <div class="max-w-2xl mx-auto pt-8 pb-14">
        <div x-data="{ showModal: false }" class="relative">
            <div class="bg-gray-800 backdrop-blur-md rounded-xl p-8 border border-gray-900">
                <h2 class="text-2xl font-bold text-white mb-6">Edit Profile</h2>
                @if($errors->any())
                    <div class="mb-6 p-4 rounded-lg bg-red-500/10 border border-red-500/30">
                        <div class="font-medium text-red-400">
                            {{ __('Whoops! Something went wrong.') }}
                        </div>
                        <ul class="mt-3 list-disc list-inside text-sm text-red-300">
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form id="profile-form" action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-6">
                        <div class="flex items-center justify-center">
                            <div class="relative">
                                <div class="w-32 h-32 rounded-full p-1 backdrop-blur-sm overflow-hidden {{ $user->image ? '' : 'border-4 border-blue-500/35'}}">
                                    @if($user->image)
                                        <img id="preview" src="{{ asset('storage/' . $user->image) }}" 
                                             alt="{{ $user->name }}" 
                                             class="w-full h-full object-cover rounded-full">
                                    @else
                                        <div id="initial" class="w-full h-full rounded-full bg-blue-700 flex items-center justify-center text-3xl font-bold text-white">
                                            {{ strtoupper(substr($user->name, 0, 1)) }}
                                        </div>
                                        <img id="preview" src="" alt="" class="w-full h-full object-cover rounded-full hidden">
                                    @endif
                                </div>
                                <label class="absolute -bottom-[6px] -right-[3px] bg-sky-700 rounded-full py-2 px-3 cursor-pointer hover:bg-blue-500 transition">
                                    <input type="file" name="image" class="hidden" accept="image/*" onchange="previewImage(this)">
                                    <i class="fas fa-camera text-gray-200"></i>
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="space-y-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-300 mb-1">Name</label>
                            <input type="text" name="name" value="{{ old('name', $user->name) }}" 
                                   class="w-full px-4 py-2 rounded-lg bg-gray-900 border {{ $errors->has('name') ? 'border-red-500' : 'border-gray-600' }} text-white focus:outline-none focus:border-blue-500">
                            @error('name')
                                <p class="mt-1 text-sm text-red-400">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-300 mb-1">Email</label>
                            <input type="email" name="email" value="{{ old('email', $user->email) }}" 
                                   class="w-full px-4 py-2 rounded-lg bg-gray-900 border {{ $errors->has('email') ? 'border-red-500' : 'border-gray-600' }} text-white focus:outline-none focus:border-blue-500">
                            @error('email')
                                <p class="mt-1 text-sm text-red-400">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-300 mb-1">New Password</label>
                            <input type="password" name="password" 
                                   class="w-full px-4 py-2 rounded-lg bg-gray-900 border {{ $errors->has('password') ? 'border-red-500' : 'border-gray-600' }} text-white focus:outline-none focus:border-blue-500">
                            @error('password')
                                <p class="mt-1 text-sm text-red-400">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-300 mb-1">Confirm Password</label>
                            <input type="password" name="password_confirmation" 
                                   class="w-full px-4 py-2 rounded-lg bg-gray-900 border {{ $errors->has('password_confirmation') ? 'border-red-500' : 'border-gray-600' }} text-white focus:outline-none focus:border-blue-500">
                            @error('password_confirmation')
                                <p class="mt-1 text-sm text-red-400">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div class="mt-8 flex justify-end space-x-4">
                        <a href="{{ route('profile.index') }}"
                           class="px-4 py-2 rounded-lg border border-rose-800 text-gray-100 bg-rose-950 hover:bg-rose-700 hover:text-white transition">
                            Cancel
                        </a>
                        <button type="button" @click="showModal = true"
                                class="px-4 py-2 rounded-lg border border-blue-700 text-gray-100 bg-blue-900 hover:bg-blue-700 transition">
                            Save Changes
                        </button>
                    </div>
                </form>
            </div>

            <!-- Confirmation Modal -->
            <div x-show="showModal" 
                x-cloak
                x-transition:enter="transition ease-out duration-300"
                x-transition:enter-start="opacity-0 transform translate-y-4 sm:translate-y-0 sm:scale-95"
                x-transition:enter-end="opacity-100 transform translate-y-0 sm:scale-100"
                x-transition:leave="transition ease-in duration-200"
                x-transition:leave-start="opacity-100 transform translate-y-0 sm:scale-100"
                x-transition:leave-end="opacity-0 transform translate-y-4 sm:translate-y-0 sm:scale-95"
                class="fixed inset-0 z-50 pt-[17vh]">
                <div class="flex items-center justify-center min-h-screen px-4 pt-4 pb-20 text-center sm:block sm:p-0">
                    <div class="fixed inset-0 transition-opacity" 
                        x-transition:enter="ease-out duration-300"
                        x-transition:enter-start="opacity-0"
                        x-transition:enter-end="opacity-90"
                        x-transition:leave="ease-in duration-200"
                        x-transition:leave-start="opacity-90"
                        x-transition:leave-end="opacity-0"
                        aria-hidden="true">
                        <div class="absolute inset-0 bg-gray-900 opacity-90"></div>
                    </div>
                    <div class="inline-block align-bottom bg-gray-800 rounded-xl text-left overflow-hidden shadow-2xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full border border-gray-700"
                        x-transition:enter="transition ease-out duration-300 delay-150"
                        x-transition:enter-start="opacity-0 transform scale-95"
                        x-transition:enter-end="opacity-100 transform scale-100"
                        x-transition:leave="transition ease-in duration-200"
                        x-transition:leave-start="opacity-100 transform scale-100"
                        x-transition:leave-end="opacity-0 transform scale-95">
                        <div class="bg-gray-800 px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                            <h3 class="text-2xl font-bold text-center text-blue-400 mb-4">
                                Confirm Changes
                            </h3>
                            <p class="text-center text-gray-300 mb-6">
                                Are you sure you want to save these changes to your profile?
                            </p>
                        </div>
                        <div class="bg-gray-900 px-6 py-4 sm:px-6 sm:flex sm:flex-row-reverse gap-3">
                            <button @click="document.getElementById('profile-form').submit()" 
                                    class="w-full inline-flex justify-center rounded-lg border border-transparent px-5 py-2.5 bg-emerald-500 text-base font-medium text-gray-100 hover:bg-emerald-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-900 focus:ring-blue-500 sm:ml-3 sm:w-auto sm:text-sm transition duration-150 ease-in-out">
                                Save Changes
                            </button>
                            <button @click="showModal = false" 
                                    class="mt-3 w-full inline-flex justify-center rounded-lg border border-gray-600 px-5 py-2.5 bg-gray-800 text-base font-medium text-gray-300 hover:bg-gray-700 hover:text-white focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-900 focus:ring-gray-500 sm:mt-0 sm:w-auto sm:text-sm transition duration-150 ease-in-out">
                                Cancel
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function previewImage(input) {
        if(input.files && input.files[0]) {
            const reader = new FileReader();
            reader.onload = function(e) {
                document.getElementById('initial')?.classList.add('hidden');
                const preview = document.getElementById('preview');
                preview.src = e.target.result;
                preview.classList.remove('hidden');
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
</script>
@endsection
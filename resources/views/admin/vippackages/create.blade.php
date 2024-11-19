@extends('layouts.admin')

@section('content')
<h2 class="text-3xl font-bold mb-4"> Add VipPackages</h2>
<div class="w-full max-w-">
    <div class="flex flex-col gap-8">
        @if ($errors->any())
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                <ul class="list-disc pl-5">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="bg-gray-800 p-4 rounded-lg h-fit flex-1 border border-slate-500">
            @if (session('status'))
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
                    <span class="block sm:inline">{{ session('status') }}</span>
                </div>
            @endif
            <form action="{{route('vippackages.store')}}" method="POST">
                @csrf
                <div class="mb-4">
                    <label for="vippackageName" class="block text-sm font-medium text-gray-300">Package Name</label> 
                    <input id="Name" name="package_name" value="{{old('name')}}" class="bg-gray-700 mt-[10px] border border-gray-400 text-gray-100 p-2 rounded-md w-full">
                </div>
                <div class="mb-4">
                    <label for="vippackageDescription" class="block text-sm font-medium text-gray-300">Description</label> 
                    <input id="Description" name="description" value="{{old('description')}}" class="bg-gray-700 mt-[10px] border border-gray-400 text-gray-100 p-2 rounded-md w-full">
                </div>
                <div class="mb-4">
                    <label for="vippackagePrice" class="block text-sm font-medium text-gray-300">Price</label> 
                    <input id="Price" name="price" value="{{old('price')}}" class="bg-gray-700 mt-[10px] border border-gray-400 text-gray-100 p-2 rounded-md w-full">
                </div>
                <div class="mb-4">
                    <label for="vippackageDuration" class="block text-sm font-medium text-gray-300">Duration</label> 
                    <input id="Duration" name="duration" value="{{old('duration')}}" class="bg-gray-700 mt-[10px] border border-gray-400 text-gray-100 p-2 rounded-md w-full">
                </div>                               
                <button type="submit" class="bg-blue-600 transition hover:bg-blue-900 text-gray-100 font-bold py-2 px-4 rounded-md">Add VipPackage</button>
            </form>
        </div>
    </div>
</div>
@endsection
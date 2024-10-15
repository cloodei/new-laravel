@extends('layouts.admin')

@section('content')
<h2 class="text-3xl font-bold mb-4"> Edit Category</h2>
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
            <form action="{{route('categories.update', [$category->id])}}" method="POST">
                @method('PUT')
                @csrf
                <div class="mb-4">
                    <label for="categoryName" class="block text-sm font-medium text-gray-300">Category Name</label> 
                    <input id="slug" name="name" value="{{$category->name}}" onkeyup="ChangeToSlug();" class="bg-gray-700 mt-[10px] border border-gray-400 text-gray-100 p-2 rounded-md w-full">
                </div>
                <div class="mb-4">
                    <label for="categorySlug" class="block text-sm font-medium text-gray-300">Slug</label> 
                    <input id="convert_slug" name="slug" value="{{$category->slug}}" class="bg-gray-700 mt-[10px] border border-gray-400 text-gray-100 p-2 rounded-md w-full">
                </div>
                <div class="mb-6">
                    <label for="categoryDescription" class="block text-sm font-medium text-gray-300">Description</label>
                    <input id="categoryDescription" name="description" value="{{$category->description}}" class="bg-gray-700 mt-[10px] border border-gray-400 text-gray-100 p-2 rounded-md w-full">
                </div>
                <button type="submit" class="bg-blue-600 transition hover:bg-blue-900 text-gray-100 font-bold py-2 px-4 rounded-md">Edit Category</button>
            </form>
        </div>
    </div>
</div>
@endsection
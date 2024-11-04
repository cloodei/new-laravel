@extends('layouts.admin')

@section('content')
<div class="container mx-auto">
    <div class="flex justify-between items-center mb-8">
        <h2 class="text-4xl font-bold text-gray-300 border-b-[3px] border-blue-400 pb-1">User List</h2>
        <div>
            <div class="px-4 pt-[8px] pb-[9px] border rounded-lg border-sky-200">
                <span class="text-gray-200">Total users:</span>
                <span class="font-bold text-blue-300 ml-[6px]">{{ $users->count() }}</span>
            </div>
            <form action="{{ route('admin.users.check') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <button type="submit" class="bg-blue-600 transition hover:bg-blue-900 text-gray-100 font-bold py-2 px-4 rounded-md">Update</button>
            </form>
        </div>
    </div>
    <div class="bg-white rounded-xl shadow-xl overflow-hidden">
        <div class="overflow-x-auto">
            <table class="min-w-full">
                <thead>
                    <tr class="bg-gradient-to-r from-sky-700 to-sky-950 text-white">
                        <th class="py-4 px-6 text-left text-sm font-semibold uppercase tracking-wider">User</th>
                        <th class="py-4 px-6 text-left text-sm font-semibold uppercase tracking-wider">Subscription Type</th>
                        <th class="py-4 px-6 text-left text-sm font-semibold uppercase tracking-wider">Remaining Days</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    @if($users->isEmpty())
                        <tr>
                            <td colspan="3" class="text-center py-8">
                                <div class="flex flex-col items-center text-gray-500">
                                    <svg class="w-16 h-16 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4"></path>
                                    </svg>
                                    <span class="text-xl">No users found</span>
                                </div>
                            </td>
                        </tr>
                    @else
                        @foreach($users as $item)
                            <tr class="bg-gray-200 hover:bg-[#90a9bb] transition duration-200">
                                <td class="py-4 px-6">
                                    <div class="flex items-center">
                                        <div class="h-10 w-10 rounded-full bg-blue-300 flex items-center justify-center text-blue-600 font-bold">
                                            {{ strtoupper(substr($item->name, 0, 2)) }}
                                        </div>
                                        <span class="ml-4 font-medium text-gray-900">{{ $item->name }}</span>
                                    </div>
                                </td>
                                <td class="py-4 px-6">
                                    <span class="font-semibold text-gray-950">{{ $item->subscription_type }}</span>
                                </td>
                                <td class="py-4 px-6">
                                    @if(isset($remainingDays[$item->id]) && $remainingDays[$item->id] !== null)
                                        <span class="text-green-700 font-semibold">{{ ceil($remainingDays[$item->id]) }} days</span>
                                    @else
                                        <span class="text-red-500 font-semibold">Expired</span>
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
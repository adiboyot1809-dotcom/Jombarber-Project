@extends('master.app')

@section('content')
<h1 class="text-2xl font-bold mb-6">Browse Available Barbershops</h1>

<div class="grid grid-cols-1 md:grid-cols-2 gap-6">
    @foreach($barbers as $barber)
    <div class="bg-white p-5 rounded-xl border border-gray-100 shadow-xs flex space-x-4">
        <div class="w-24 h-24 bg-gray-100 rounded-lg flex items-center justify-center text-gray-400 shrink-0">
            <i class="fa-solid fa-user-tie text-3xl"></i>
        </div>
        <div class="flex-1">
            <h3 class="text-lg font-bold text-gray-800">{{ $barber->name }}</h3>
            <p class="text-sm text-gray-500">{{ $barber->specialization }}</p>
            <p class="text-xs text-blue-600 font-semibold mt-1">Status: {{ $barber->availability_status }}</p>
            
            <div class="mt-3 pt-3 border-t border-gray-50 text-xs text-gray-400">
                Total Reviews: ({{ $barber->reviews->count() }})
            </div>
        </div>
    </div>
    @endforeach
</div>
@endsection
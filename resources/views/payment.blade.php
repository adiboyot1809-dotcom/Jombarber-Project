@extends('master.app')

@section('content')
<div class="max-w-md mx-auto bg-white p-6 rounded-xl border border-gray-100 shadow-xs mt-10">
    <h2 class="text-xl font-bold mb-4 text-gray-800">Order Summary</h2>
    <p class="text-gray-400 text-xs mb-6">Review your booking details securely</p>

    <div class="space-y-4 border-b border-gray-100 pb-4 mb-4 text-sm">
        <div class="flex justify-between">
            <span class="text-gray-500">Service</span>
            <span class="font-semibold">Haircut & Grooming</span>
        </div>
        <div class="flex justify-between">
            <span class="text-gray-500">Barber Assigned</span>
            <span class="font-semibold text-blue-600">{{ $appointment->barber->name }}</span>
        </div>
        <div class="flex justify-between">
            <span class="text-gray-500">Date</span>
            <span class="font-semibold">{{ $appointment->appointment_date }}</span>
        </div>
        <div class="flex justify-between">
            <span class="text-gray-500">Time</span>
            <span class="font-semibold">{{ $appointment->appointment_time }}</span>
        </div>
        <div class="flex justify-between">
            <span class="text-gray-500">Price</span>
            <span class="font-semibold">RM {{ number_format($appointment->price, 2) }}</span>
        </div>
    </div>

    <div class="flex justify-between items-center mb-6">
        <span class="font-bold text-gray-800">Total Charged</span>
        <span class="text-xl font-extrabold text-blue-600">RM {{ number_format($appointment->price, 2) }}</span>
    </div>

    <a href="{{ route('appointments.my') }}" class="block text-center w-full bg-blue-600 text-white font-medium py-2.5 rounded-lg hover:bg-blue-700 transition">Confirm & Finish</a>
</div>
@endsection
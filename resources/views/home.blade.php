@extends('master.app')

@section('content')
<div class="py-4">
    <h2 class="text-lg text-gray-600 mb-6">Book your next appointment or explore our services</h2>
    
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        <div class="bg-white p-6 rounded-xl border border-gray-100 shadow-xs flex flex-col justify-between">
            <div>
                <i class="fa-regular fa-calendar-check text-blue-600 text-2xl mb-3"></i>
                <h3 class="text-xl font-bold mb-1">Book Appointment</h3>
                <p class="text-gray-500 text-sm mb-4">Schedule your next visit with our expert barbers</p>
            </div>
            <a href="{{ route('booking.form') }}" class="inline-block text-center bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 font-medium transition">Book Now</a>
        </div>

        <div class="bg-white p-6 rounded-xl border border-gray-100 shadow-xs flex flex-col justify-between">
            <div>
                <i class="fa-regular fa-clock text-blue-600 text-2xl mb-3"></i>
                <h3 class="text-xl font-bold mb-1">My Appointments</h3>
                <p class="text-gray-500 text-sm mb-4">View and manage your tracking booking history details</p>
            </div>
            <a href="{{ route('appointments.my') }}" class="inline-block text-center border border-gray-200 text-gray-700 px-4 py-2 rounded-lg hover:bg-gray-50 font-medium transition">View History</a>
        </div>

        <div class="bg-white p-6 rounded-xl border border-gray-100 shadow-xs flex flex-col justify-between">
            <div>
                <i class="fa-regular fa-star text-blue-600 text-2xl mb-3"></i>
                <h3 class="text-xl font-bold mb-1">Rate Barber</h3>
                <p class="text-gray-500 text-sm mb-4">Share your structural experiences and support your local styling squad</p>
            </div>
            <a href="{{ route('rate.form') }}" class="inline-block text-center border border-gray-200 text-gray-700 px-4 py-2 rounded-lg hover:bg-gray-50 font-medium transition">Leave Review</a>
        </div>
    </div>
</div>
@endsection
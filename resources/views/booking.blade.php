@extends('master.app')

@section('content')
<div class="max-w-2xl mx-auto bg-white p-8 rounded-xl shadow-xs border border-gray-100">
    <h1 class="text-2xl font-bold mb-1 text-gray-800">Schedule Your Visit</h1>
    <p class="text-gray-500 text-sm mb-6">Select your preferred professional, date, and time slot</p>

    <form action="{{ route('booking.store') }}" method="POST" class="space-y-5">
        @csrf
        <div>
            <label class="block text-sm font-semibold mb-1">Select Barber Profile</label>
            <select name="barber_id" required class="w-full p-2.5 border rounded-lg outline-none focus:ring-2 focus:ring-blue-500 bg-white">
                @foreach($barbers as $barber)
                    <option value="{{ $barber->barber_id }}">{{ $barber->name }} ({{ $barber->specialization }})</option>
                @endforeach
            </select>
        </div>

        <div>
            <label class="block text-sm font-semibold mb-1">Choose Date</label>
            <input type="date" name="appointment_date" required class="w-full p-2.5 border rounded-lg outline-none focus:ring-2 focus:ring-blue-500">
        </div>

        <div>
            <label class="block text-sm font-semibold mb-3">Time Slot</label>
            <div class="grid grid-cols-3 gap-3">
                @foreach(['09:00 AM', '10:00 AM', '11:00 AM', '12:00 PM', '01:00 PM', '02:00 PM', '03:00 PM', '04:00 PM', '05:00 PM'] as $slot)
                <label class="border rounded-lg p-2.5 text-center cursor-pointer hover:bg-blue-50 transition block">
                    <input type="radio" name="appointment_time" value="{{ $slot }}" required class="mr-1">
                    <span class="text-sm font-medium">{{ $slot }}</span>
                </label>
                @endforeach
            </div>
        </div>

        <div>
            <label class="block text-sm font-semibold mb-1">Notes (Optional)</label>
            <textarea name="notes" placeholder="Any special requests or preferences..." rows="3" class="w-full p-2.5 border rounded-lg outline-none focus:ring-2 focus:ring-blue-500"></textarea>
        </div>

        <button type="submit" class="w-full bg-blue-600 text-white font-semibold py-3 rounded-lg hover:bg-blue-700 transition cursor-pointer">Proceed to Payment</button>
    </form>
</div>
@endsection
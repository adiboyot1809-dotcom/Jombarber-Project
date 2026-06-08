@extends('master.app')

@section('content')
<div class="max-w-3xl mx-auto">
    <h1 class="text-2xl font-bold mb-6">My Appointments Schedule</h1>

    @if($appointments->isEmpty())
        <div class="bg-white p-6 text-center rounded-xl border text-gray-400">No appointments booked yet.</div>
    @else
        <div class="space-y-4">
            @foreach($appointments as $app)
            <div class="bg-white p-5 rounded-xl border border-gray-100 shadow-xs flex flex-col justify-between items-start md:flex-row md:items-center">
                <div>
                    <span class="text-xs uppercase font-bold px-2.5 py-1 rounded-full {{ $app->status === 'cancelled' ? 'bg-red-50 text-red-500' : 'bg-amber-50 text-amber-600' }}">
                        {{ $app->status }}
                    </span>
                    <h3 class="text-xl font-bold mt-2 text-gray-800">RM {{ number_format($app->price, 2) }}</h3>
                    <p class="text-sm text-gray-500 mt-1">
                        <i class="fa-regular fa-calendar-days mr-1"></i> {{ $app->appointment_date }} 
                        <span class="mx-2">|</span> 
                        <i class="fa-regular fa-clock mr-1"></i> {{ $app->appointment_time }}
                    </p>
                    <p class="text-xs text-blue-600 mt-1 font-medium">Barber: {{ $app->barber->name }} (Queue Details: #{{ $app->queue_number }})</p>
                </div>
                
                @if($app->status !== 'cancelled')
                <form action="{{ route('appointment.cancel', $app->appointment_id) }}" method="POST" class="mt-4 md:mt-0 w-full md:w-auto">
                    @csrf
                    <button type="submit" class="w-full bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded-lg text-sm font-medium transition cursor-pointer">Cancel Appointment</button>
                </form>
                @endif
            </div>
            @endforeach
        </div>
    @endif
</div>
@endsection
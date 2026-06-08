@extends('master.app')

@section('content')
<div class="min-h-[75vh] flex items-center justify-center">
    <div class="bg-white p-8 rounded-xl shadow-md border border-gray-100 max-w-md w-full">
        <h1 class="text-2xl font-bold text-gray-800 text-center">Create Account</h1>
        <p class="text-gray-500 text-sm text-center mb-6">Register to manage your barber bookings</p>

        <form action="{{ route('register') }}" method="POST" class="space-y-4">
            @csrf
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-1">Full Name</label>
                <input type="text" name="name" required placeholder="John Doe" class="w-full px-4 py-2 border rounded-lg outline-none focus:ring-2 focus:ring-blue-500 text-sm">
            </div>
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-1">Email Address</label>
                <input type="email" name="email" required placeholder="name@example.com" class="w-full px-4 py-2 border rounded-lg outline-none focus:ring-2 focus:ring-blue-500 text-sm">
            </div>
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-1">Password</label>
                <input type="password" name="password" required placeholder="••••••••" class="w-full px-4 py-2 border rounded-lg outline-none focus:ring-2 focus:ring-blue-500 text-sm">
            </div>
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-1">Confirm Password</label>
                <input type="password" name="password_confirmation" required placeholder="••••••••" class="w-full px-4 py-2 border rounded-lg outline-none focus:ring-2 focus:ring-blue-500 text-sm">
            </div>
            <button type="submit" class="w-full bg-blue-600 text-white font-medium py-2.5 rounded-lg hover:bg-blue-700 transition mt-2 cursor-pointer">Register Account</button>
        </form>
    </div>
</div>
@endsection
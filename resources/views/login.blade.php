@extends('master.app')

@section('content')
<div class="min-h-[70vh] flex items-center justify-center">
    <div class="bg-white p-8 rounded-xl shadow-md border border-gray-100 max-w-md w-full text-center">
        <div class="flex justify-center text-blue-600 mb-2">
            <i class="fa-solid fa-scissors text-4xl"></i>
        </div>
        <h1 class="text-2xl font-bold text-gray-800">Welcome to JomBarber</h1>
        <p class="text-gray-500 text-sm mb-6">Sign in to your account</p>

        <form action="{{ url('/login') }}" method="POST" class="text-left space-y-4">
            @csrf
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-1">Email Address</label>
                <input type="email" name="email" required placeholder="your@email.com" class="w-full px-4 py-2 border border-gray-200 rounded-lg focus:ring-2 focus:ring-blue-500 outline-none transition">
            </div>
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-1">Password</label>
                <input type="password" name="password" required placeholder="••••••••" class="w-full px-4 py-2 border border-gray-200 rounded-lg focus:ring-2 focus:ring-blue-500 outline-none transition">
            </div>
            <button type="submit" class="w-full bg-blue-600 text-white font-medium py-2.5 rounded-lg hover:bg-blue-700 transition mt-2 cursor-pointer">Sign In</button>
        </form>
        <p class="mt-4 text-xs text-gray-500">Don't have an account? <a href="{{ route('register') }}" class="text-blue-600 hover:underline">Register here</a></p>
    </div>
</div>
@endsection
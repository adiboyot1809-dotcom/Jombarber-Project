<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>JomBarber System</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body class="bg-gray-50 font-sans text-gray-900">

    <nav class="bg-white shadow-sm border-b border-gray-200 py-4 px-8 flex justify-between items-center">
        <div class="flex items-center space-x-2">
            <i class="fa-solid fa-scissors text-blue-600 text-2xl"></i>
            <span class="text-xl font-bold tracking-tight text-blue-950">JomBarber</span>
        </div>
        @auth
        <div class="flex items-center space-x-6">
            <a href="{{ route('home') }}" class="hover:text-blue-600 font-medium transition">Dashboard</a>
            <a href="{{ route('barbers.browse') }}" class="hover:text-blue-600 font-medium transition">Browse Shops</a>
            <a href="{{ route('appointments.my') }}" class="hover:text-blue-600 font-medium transition">My Bookings</a>
            <form action="{{ route('logout') }}" method="POST" class="inline">
                @csrf
                <button type="submit" class="text-red-500 hover:text-red-700 font-medium transition cursor-pointer">Sign Out</button>
            </form>
        </div>
        @endauth
    </nav>

    <main class="max-w-6xl mx-auto p-6">
        @yield('content')
    </main>

</body>
</html>
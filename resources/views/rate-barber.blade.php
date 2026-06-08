@extends('master.app')

@section('content')
<div class="max-w-md mx-auto bg-white p-6 rounded-xl border border-gray-100 shadow-xs mt-6">
    <h2 class="text-xl font-bold mb-1">Share Your Experience</h2>
    <p class="text-gray-400 text-xs mb-6">Help others by rating your specialist performance</p>

    <form action="{{ route('rate.store') }}" method="POST" class="space-y-4">
        @csrf
        <div>
            <label class="block text-sm font-semibold mb-1">Select Barber</label>
            <select name="barber_id" required class="w-full p-2 border rounded-lg bg-white">
                @foreach($barbers as $b)
                    <option value="{{ $b->barber_id }}">{{ $b->name }}</option>
                @endforeach
            </select>
        </div>

        <div>
            <label class="block text-sm font-semibold mb-1">Rating Score (1-5)</label>
            <input type="number" name="rating" min="1" max="5" required placeholder="5" class="w-full p-2 border rounded-lg">
        </div>

        <div>
            <label class="block text-sm font-semibold mb-1">Comment (Optional)</label>
            <textarea name="comment" placeholder="Share your thoughts transparently..." rows="3" class="w-full p-2 border rounded-lg"></textarea>
        </div>

        <button type="submit" class="w-full bg-blue-600 text-white font-medium py-2 rounded-lg hover:bg-blue-700 transition cursor-pointer">Submit Review</button>
    </form>
</div>
@endsection
@extends('layouts.app')

@section('title', 'Select Date and Time')

@section('content')
<section class="container mx-auto p-8">
    <div class="text-center mb-6">
        <h1 class="text-4xl font-bold">Reserve a Table at {{ $restaurant->name }}</h1>
        <p class="text-lg">Please select your preferred date and time.</p>
    </div>

    <!-- Reservation Form -->
    <form action="{{ route('restaurants.storeReservation') }}" method="POST">
        @csrf

        <!-- Hidden field for restaurant_id -->
        <input type="hidden" name="restaurant_id" value="{{ $restaurant->id }}">

        <!-- Date Selection -->
        <div class="mb-4">
            <label for="date" class="block text-lg font-semibold">Select Date</label>
            <input
                type="date"
                id="date"
                name="date"
                class="w-full p-2 border rounded"
                required
                min="2024-12-19"
                max="2024-12-20"
            >
        </div>

        <!-- Time Selection -->
        <div class="mb-4">
            <label for="time" class="block text-lg font-semibold">Select Time</label>
            <select id="time" name="time" class="w-full p-2 border rounded" required>
                <option value="" disabled selected>Select a time</option>
                <option value="12:30">12:30</option>
                <option value="14:00">14:00</option>
                <option value="15:00">15:00</option>
                <option value="17:30">17:30</option>
            </select>
        </div>

        <!-- Submit Button -->
        <button type="submit" class="bg-blue-500 text-white py-2 px-4 rounded-lg hover:bg-blue-600">
            Reserve
        </button>
    </form>
</section>
@endsection

@extends('layouts.app')

@section('title', 'Select Date and Time')

@section('content')
<section class="container mx-auto p-8">
    <div class="text-center mb-6">
        <h1 class="text-4xl font-bold text-white">Reserve a Table at {{ $restaurant->name }}</h1>
        <p class="text-lg text-white">Please select your preferred date and time.</p>
    </div>

    <!-- Reservation Form -->
    <form action="{{ route('restaurants.storeReservation') }}" method="POST">
        @csrf

        <!-- Date Selection -->
        <div class="mb-4">
            <label for="date" class="block text-lg font-semibold">Select Date</label>
            <input type="date" id="date" name="date" class="w-full p-2 border rounded" required>
        </div>

        <!-- Time Selection -->
        <div class="mb-4">
            <label for="time" class="block text-lg font-semibold">Select Time</label>
            <input type="time" id="time" name="time" class="w-full p-2 border rounded" required>
        </div>

        <!-- Submit Button -->
        <button type="submit" class="bg-blue-500 text-white py-2 px-4 rounded-lg hover:bg-blue-600">
            Reserve
        </button>
    </form>
</section>
@endsection

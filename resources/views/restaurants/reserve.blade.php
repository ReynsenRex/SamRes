@extends('layouts.app')

@section('title', 'Select Date and Time')

@section('content')
  <section class="container mx-auto p-8">
    <!-- Heading -->
    <div class="text-center mb-8">
      <h1 class="text-4xl font-bold text-white mb-2">Reserve a Table at {{ $restaurant->name }}</h1>
      <p class="text-lg text-gray-300">Please select your preferred date and time.</p>
    </div>

    <!-- Reservation Form Container -->
    <div class="flex justify-center">
      <form action="{{ route('restaurants.storeReservation') }}" method="POST"
            class="w-full max-w-md bg-gray-800 p-6 rounded-lg shadow-md">
        @csrf
        <!-- Date Selection -->
        <div class="mb-6">
          <label for="date" class="block text-lg font-semibold text-white mb-2">Select Date</label>
          <input type="date" id="date" name="date"
                 class="w-full p-3 rounded-md bg-white text-gray-900 border border-gray-600 focus:outline-none focus:ring-2 focus:ring-blue-400"
                 required>
        </div>
        <!-- Time Selection -->
        <div class="mb-6">
          <label for="time" class="block text-lg font-semibold text-white mb-2">Select Time</label>
          <input type="time" id="time" name="time"
                 class="w-full p-3 rounded-md bg-white text-gray-900 border border-gray-600 focus:outline-none focus:ring-2 focus:ring-blue-400"
                 required>
        </div>
        <!-- Submit Button -->
        <div class="text-center">
          <button type="submit"
                  class="w-full bg-blue-500 hover:bg-blue-600 text-white font-semibold py-3 px-6 rounded-md transition-all duration-200">
            Reserve Table
          </button>
        </div>
      </form>
    </div>
  </section>

@endsection

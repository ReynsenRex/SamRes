@extends('layouts.app')
@section('title', 'Home')

@section('content')
  <section class="bg-black text-white min-h-screen">
    <div class="flex flex-col items-center justify-center min-h-screen">
      {{-- Menu Options --}}
      <div class="grid grid-cols-1 md:grid-cols-3 gap-12">
        {{-- Reserve a Table --}}
        <a  href="{{ url('/pickcuisine') }}" >
        <div class="flex flex-col items-center">
          <img src="{{ asset('images/reserve_table.png') }}" alt="Reserve a Table" class="w-60 h-60 mb-4">
          <h2 href="{{ url('/') }}" class="text-lg font-semibold">Reserve a table</h2>
        </div>
        </a>

        {{-- History --}}
        <a  href="{{ url('/') }}" >
        <div class="flex flex-col items-center">
          <img src="{{ asset('images/history.png') }}" alt="History" class="w-60 h-60 mb-4">
          <h2 href="{{ url('/') }}" class="text-lg font-semibold">History</h2>
        </div>
        </a>

        {{-- Loyalty Points --}}
        <a  href="{{ url('/loyaltypoints') }}" >
        <div class="flex flex-col items-center">
          <img src="{{ asset('images/loyalty_points.png') }}" alt="Loyalty Points" class="w-60 h-60 mb-4">
          <h2 class="text-lg font-semibold">Loyalty points</h2>
        </div>
        </a>
      </div>
    </div>
  </section>
@endsection

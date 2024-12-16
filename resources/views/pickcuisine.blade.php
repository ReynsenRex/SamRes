@extends('layouts.app')
@section('title', 'Pick a Cuisine')

@section('content')
  <section class="bg-black text-white min-h-screen">
    <div class="container mx-auto py-12">
      {{-- Page Title --}}
      <div class="text-center mb-8">
        <h1 class="text-4xl font-bold">Pick a cuisine</h1>
      </div>

      {{-- Cuisine Grid --}}
      <div class="grid grid-cols-1 md:grid-cols-3 gap-8 justify-items-center">
        {{-- Indonesian --}}
        <a  href="{{ url('/restaurants') }}" >
        <div class="text-center">
          <img src="{{ asset('images/cuisines/indonesian.png') }}" alt="Indonesian Cuisine" class="w-64 h-48 rounded-lg mb-4 object-cover">
          <h2 class="text-xl font-semibold">Indonesian</h2>
        </div>
        </a>

        {{-- Japanese --}}
        <a  href="{{ url('/restaurants') }}" >
        <div class="text-center">
          <img src="{{ asset('images/cuisines/japanese.png') }}" alt="Japanese Cuisine" class="w-64 h-48 rounded-lg mb-4 object-cover">
          <h2 class="text-xl font-semibold">Japanese</h2>
        </div>
        </a>

        {{-- Korean --}}
        <a  href="{{ url('/restaurants') }}" >
        <div class="text-center">
          <img src="{{ asset('images/cuisines/korean.png') }}" alt="Korean Cuisine" class="w-64 h-48 rounded-lg mb-4 object-cover">
          <h2 class="text-xl font-semibold">Korean</h2>
        </div>
        </a>

        {{-- Fast Food --}}
        <a  href="{{ url('/restaurants') }}" >
        <div class="text-center">
          <img src="{{ asset('images/cuisines/fastfood.png') }}" alt="Fast Food" class="w-64 h-48 rounded-lg mb-4 object-cover">
          <h2 class="text-xl font-semibold">Fast food</h2>
        </div>
        </a>

        {{-- Italian --}}
        <a  href="{{ url('/restaurants') }}" >
        <div class="text-center">
          <img src="{{ asset('images/cuisines/italian.png') }}" alt="Italian Cuisine" class="w-64 h-48 rounded-lg mb-4 object-cover">
          <h2 class="text-xl font-semibold">Italian</h2>
        </div>
        </a>

        {{-- Western --}}
        <a  href="{{ url('/restaurants') }}" >
        <div class="text-center">
          <img src="{{ asset('images/cuisines/western.png') }}" alt="Western Cuisine" class="w-64 h-48 rounded-lg mb-4 object-cover">
          <h2 class="text-xl font-semibold">Western</h2>
        </div>
      </a>
    </div>

      {{-- Back Button --}}

      <div class="mt-8 flex justify-center">
        <a href="{{ url()->previous() }}" class="bg-gray-500 hover:bg-gray-600 text-white py-2 px-4 rounded">
          Back
        </a>
      </div>
    </div>
  </section>
@endsection

@extends('layouts.app')

@section('title', 'Pick a Cuisine')

@section('content')
  <section class="bg-black text-white min-h-screen">
    <div class="container mx-auto py-12">
      
      {{-- Page Title --}}
      <div class="text-center mb-8">
        <h1 class="text-4xl font-bold">{{ 'Pick a Cuisine' }}</h1>
      </div>

      {{-- Dynamic Cuisine Grid --}}
      <div class="grid grid-cols-1 md:grid-cols-3 gap-8 justify-items-center">
        @foreach ($categories as $category)
          <a href="{{ route('restaurants.byCategory', $category->id) }}">
            <div class="text-center">
              <img src="{{ asset($category->image) }}" 
                   alt="{{ $category->name }}" 
                   class="w-64 h-48 rounded-lg mb-4 object-cover">
              <h2 class="text-xl font-semibold">{{ $category->name }}</h2>
            </div>
          </a>
        @endforeach
      </div>

      {{-- Back Button --}}
      <div class="mt-8 flex justify-center">
        <a href="{{ url()->previous() }}" 
           class="bg-gray-500 hover:bg-gray-600 text-white py-2 px-4 rounded">
          Back
        </a>
      </div>

    </div>
  </section>
@endsection

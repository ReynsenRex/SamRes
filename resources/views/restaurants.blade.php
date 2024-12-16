@extends('layouts.app')

@section('title', 'Restaurants by Category')

@section('content')
  <div class="container">
    <h1>Restaurants</h1>

    {{-- Display categories as clickable links --}}
    <div class="categories">
      <h2>Categories</h2>
      <ul>
        @foreach ($categories as $category)
          <li>
            <a href="{{ route('restaurants.byCategory', $category->id) }}">{{ $category->name }}</a>
          </li>
        @endforeach
      </ul>
    </div>

    {{-- Display selected category and restaurants --}}
    @if(isset($selectedCategory))
      <h3>Showing restaurants in {{ $selectedCategory->name }} category</h3>
    @endif

    <div class="restaurants">
      <h2>Restaurants</h2>
      <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
        @foreach ($restaurants as $restaurant)
          <div class="bg-white border shadow-md border-gray-200 rounded-lg">
            <div class="relative h-[350px] w-full overflow-hidden rounded-t-lg">
              <img class="rounded-t-lg w-full h-full object-cover" src="{{ $restaurant->image_url }}" alt="Restaurant Image" />
            </div>
            <div class="p-5">
              <h5 class="mb-2 text-xl font-bold">{{ $restaurant->name }}</h5>
              <p>{{ $restaurant->category->name }}</p>
              <p>Rating: {{ $restaurant->rating }} | Price: {{ $restaurant->price }}</p>
            </div>
          </div>
        @endforeach
      </div>
    </div>
  </div>
@endsection

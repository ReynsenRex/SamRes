@extends('layouts.app')

@section('title', 'Restaurants')

@section('content')
<section class="bg-black text-gray-800 min-h-screen">
    {{-- Vue Component --}}
    <restaurant-list :initial-restaurants="{{ json_encode($restaurants) }}"></restaurant-list>
  </div>
</section>
@endsection

@push('scripts')
<script src="{{ mix('js/app.js') }}"></script>
@endpush

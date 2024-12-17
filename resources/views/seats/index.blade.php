@extends('layouts.app')
@section('title', 'Seats')

@section('content')

  <section class="bg-black dark:bg-black">
    <div class="py-8 px-4 mx-auto max-w-screen-xl lg:py-16 lg:px-6">
      <div class="mx-auto text-center mb-8 lg:mb-16 overflow-x-auto">
        <seat />
      </div>
    </div>
  </section>

@endsection

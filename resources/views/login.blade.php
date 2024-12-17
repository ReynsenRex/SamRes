@extends('layouts.login-template')
@section('title', 'Login')

@section('content')
  <section class="bg-black dark:bg-black">
    <div class="flex flex-col items-center justify-center px-6 py-8 mx-auto md:h-screen lg:py-0">
      <div class="w-full bg-black rounded-lg shadow md:mt-0 sm:max-w-md xl:p-0 dark:bg-black">
        <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
          <img src="{{ asset('images/SamLogo.png') }}" class="h-32 mx-auto" alt="Logo" /> <!-- Centered and larger -->
          <h1 class="text-xl text-center font-bold leading-tight tracking-tight text-white md:text-2xl dark:text-white">
            Login to Your Account
          </h1>

          @if (session()->has('loginError'))
            <div>
              <div class="p-4 mb-4 text-md text-white rounded-lg bg-black dark:black dark:text-white" role="alert">
                <span class="font-medium">{{ session('loginError') }}</span>
              </div>
            </div>
          @endif

          <form class="space-y-4 md:space-y-6" action="/signin" method="POST">
            @csrf
            <div>
              <input type="email" name="email" id="email"
                     class="bg-gray-800 border border-gray-800 text-gray-900 rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-800 dark:border-gray-800 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                     placeholder="Email" required value="{{ old('email') }}">
            </div>
            <div>
              <input type="password" name="password" id="password" placeholder="Password"
                     class="bg-gray-800 border border-gray-800 text-gray-900 rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-800 dark:border-gray-800 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                     required="">
            </div>
            <button class="w-full text-white bg-blue-700 font-medium rounded-lg px-5 py-2.5 text-center">
              Login to Your Account
            </button>
          </form>
        </div>
      </div>
    </div>
  </section>
@endsection

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>@yield('title', $title)</title>
  @vite('resources/css/app.css')
  @vite(['resources/js/app.js'])
</head>

<body>
  {{-- Navbar Section --}}
  <header>
    <nav class="bg-black border-black-200 dark:bg-black-900">
      <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
        <a href="{{ url('/') }}" class="flex items-center space-x-3 rtl:space-x-reverse">
          <img src="{{ $mainLogo }}" class="h-24" alt="Logo" />
          <span class="self-center text-4xl font-semibold whitespace-nowrap dark:text-white">{{ $title }}</span>
        </a>
        {{-- Conditional Logout Button --}}
        @if (!empty($showLogout) && $showLogout)
        <div class="flex md:order-2 space-x-3 md:space-x-0 rtl:space-x-reverse">
            <img src="{{ $secondaryLogo }}" class="h-16" alt="Logo" style="margin-top: -10px;" />
          <a href="{{ $logoutLink }}" type="button"
            class="text-white bg-primary-600 hover:bg-primary-700 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-2xl px-4 py-2 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">Logout</a>
        </div>
        @else
        <div class="flex md:order-2 space-x-3 md:space-x-0 rtl:space-x-reverse">
            <a href="{{ url()->previous() }}" class="bg-gray-500 hover:bg-gray-600 text-white py-2 px-4 rounded">
                Back
            </a>
        @endif
      </div>
    </nav>
  </header>

  {{-- Main Section --}}
  <main id="app">
    @yield('content')
  </main>

  {{-- Footer Section --}}
  <footer>
    {{-- TODO: Footer here --}}
  </footer>

</body>

<script src="{{ mix('js/app.js') }}"></script>

</html>

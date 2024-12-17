<!DOCTYPE html>
<html lang="en" class="">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>@yield('title')</title>
  @vite('resources/css/app.css')
  @vite(['resources/js/app.js'])
</head>

<body>
  {{-- Navbar Section --}}
  <header>
    <nav class="bg-black border-black-200 dark:bg-black-900">
      <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
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

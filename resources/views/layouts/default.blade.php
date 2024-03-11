<!DOCTYPE html>
<html lang="en">
  <head>
    @include('includes.frontsite.meta');

    <link rel="shortcut icon" href="{{ asset('/asset/frontsite/images/logo.png') }}" type="image/x-icon">

    <title>@yield('title') | Meet-Doctor</title>


    @stack('before-style')
        @include('includes.frontsite.style')
    @stack('after-style')

  </head>
  <body>

    @include('components.frontsite.header')
        @yield('content')
    @include('components.frontsite.footer')

    @stack('before-script')
        @include('includes.frontsite.script')
    @stack('after-script')

    {{-- Modals --}}
    {{-- If you have modals create here --}}

  </body>
</html>

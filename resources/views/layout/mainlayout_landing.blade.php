<!DOCTYPE html>
<html lang="es">
  <head>
    @include('layout.partials.head')
  </head>

  <body>
@include('layout.partials.header_landing')
@yield('content')
@include('layout.partials.footer-landing')
@include('layout.partials.footer-scripts')
  </body>
</html>

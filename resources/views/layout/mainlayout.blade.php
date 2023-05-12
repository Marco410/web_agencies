<!DOCTYPE html>
<html lang="es">
  <head>
    @include('layout.partials.head')
  </head>
  @if(Route::is(['chat']))
  <body class="chat-page">
  @endif
  @if(!Route::is(['chat']))
<body>
@endif
@include('layout.partials.header')
@yield('content')
@include('layout.partials.footer')
@include('layout.partials.footer-scripts')
  </body>
</html>

<!DOCTYPE html>
<html lang="es">
  <head>
    @include('layout.partials.head_admin')
  </head>
  <body>
  @if(!Route::is(['login','registro','forgot.password','password.reset' ]))
    @include('layout.partials.header_admin')
    @include('layout.partials.nav_admin')
  @endif
 @yield('content')
 @include('layout.partials.footer_admin-scripts')
  </body>
</html>
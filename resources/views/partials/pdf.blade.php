<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>{{ config('app.name') }}</title>
    @include('partials.pdf_styles')
  </head>
  <body>
    @yield('content')
    <footer>
      Printed by: ODNCONSULTMAR.COM DATA BASE SYSTEM                                 
    </footer>
  </body>
</html>
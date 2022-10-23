<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
  </head>
  <body>
  <header>@include('components.header')</header>
    <div class="container">
        
        @yield('content')
    </div>
  </body>
</html>

<!doctype html>
<html lang={{ str_replace('_', '-', app()->getLocale()) }}>
<head>
  <meta charset="UTF-8">
  <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>@yield('title')</title>
  <link rel="stylesheet" href="{{ Vite::asset('resources/scss/main.scss') }}">
  <script type="text/javascript" src="{{ Vite::asset('resources/js/app.js') }}" defer></script>
  @livewireStyles
</head>
<body>
<main class="content-wrap is-auth">
  @yield('content')
</main>
@livewireScripts
</body>
</html>
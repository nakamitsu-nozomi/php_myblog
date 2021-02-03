<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="utf-8">
  <title>@yield('title')</title>
  {{-- <link rel="stylesheet" type="text/css" href="css/styles.css"> --}}
    <link rel="stylesheet" href="{{ asset('/css/styles.css') }}">
</head>
<body>
  <div class="container">
    @yield('content')
  </div>
</body>
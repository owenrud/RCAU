<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  @vite('resources/css/app.css')
  <script src="https://kit.fontawesome.com/43733cda5c.js" crossorigin="anonymous"></script>
@yield('link')
</head>
<body>
<title>Dashboard</title>
<div class="flex h-screen">
  @include('layouts.navbar')

  
  @yield('content')

  </div>
</div>
<script src="https://unpkg.com/flowbite@1.5.1/dist/flowbite.js"></script>

@yield('script')
</body>
</html>
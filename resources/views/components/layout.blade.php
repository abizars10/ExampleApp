<!doctype html>
<html class="box-border h-full p-0 m-0 bg-gray-100">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  @vite('resources/css/app.css')
  {{-- font style --}}
  <link rel="stylesheet" href="https://rsms.me/inter/inter.css">
  {{-- AlpineJS --}}
  <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>
<body class="h-full">
  {{ $slot }}
</body>
</html>
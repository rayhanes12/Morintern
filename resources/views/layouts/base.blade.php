<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Morintern')</title>
    @vite('resources/css/app.css')
</head>
<body class="Plus Jakarta Sans bg-gray-50 text-gray-800">
    @yield('body')
    @vite('resources/js/app.js')
</body>
</html>

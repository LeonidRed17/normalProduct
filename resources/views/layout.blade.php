<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    @vite('resources/js/app.js')
</head>
<body>
<x-header>
</x-header>
</body>
<div class="container">
    @yield('main_content')
</div>
</html>
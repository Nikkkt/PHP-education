<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <title>Welcome</title>
</head>
<body>
<h1>{{ $welcomeMessage }}</h1>
<a href="{{ route('set-locale', 'en') }}">English</a> |
<a href="{{ route('set-locale', 'uk') }}">Українська</a>
</body>
</html>

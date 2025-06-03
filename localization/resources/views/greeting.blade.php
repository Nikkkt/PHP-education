<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <title>Greeting</title>
</head>
<body>
<h1>{{ __('messages.greeting') }}</h1>
<a href="{{ route('set-locale', 'en') }}">English</a> |
<a href="{{ route('set-locale', 'uk') }}">Українська</a>
</body>
</html>

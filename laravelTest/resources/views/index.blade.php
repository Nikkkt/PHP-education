<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <title>{{ __('messages.welcome') }}</title>
</head>
<body>
<h1>{{ __('messages.welcome') }}</h1>
<a href="/language/en">English</a> | <a href="/language/uk">Українська</a>
</body>
</html>

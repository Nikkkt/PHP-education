<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <title>Products</title>
</head>
<body>
<h1>Product List</h1>
<ul>
    @foreach ($products as $product)
        <li>{{ $product->name }} - ${{ $product->price }}</li>
    @endforeach
</ul>
</body>
</html>

@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h2>{{ $product->name }}</h2>
            </div>
            <div class="card-body">
                <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" class="img-fluid mb-3"
                     style="max-width: 300px;">
                <p><strong>Price:</strong> ${{ number_format($product->price, 2) }}</p>
                <p><strong>Description:</strong> {{ $product->description }}</p>
                <p><strong>Author:</strong> {{ $product->author->name }}</p>
            </div>
            <div class="card-footer">
                <a href="{{ route('products.index') }}" class="btn btn-secondary">Back to Products</a>
            </div>
        </div>
    </div>
@endsection

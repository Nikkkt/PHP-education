<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Product;
use Illuminate\Support\Facades\Cache;

class ProductController extends Controller
{
    public function index()
    {
        //
    }

    public function create()
    {
        //
    }

    public function store(StoreProductRequest $request)
    {
        //
    }

    public function show(Product $product)
    {
        $product = Cache::remember("product_{$product->id}", 30, function () use ($product) {
            sleep(10);
            return $product;
        });

        return view('products.show', compact('product'));
    }

    public function edit(Product $product)
    {
        //
    }

    public function update(UpdateProductRequest $request, Product $product)
    {
        $product->update($request->all());

        Cache::forget("product_{$product->id}");

        return redirect()->back();
    }

    public function destroy(Product $product)
    {
        //
    }
}

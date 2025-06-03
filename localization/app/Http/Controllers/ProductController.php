<?php
namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Support\Facades\Cache;

class ProductController extends Controller
{
    public function index()
    {
        $products = Cache::remember('products', now()->addMinutes(10), function () {
            return Product::all();
        });

        return view('products', compact('products'));
    }
}

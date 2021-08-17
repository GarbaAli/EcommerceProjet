<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::inRandomOrder()->take(9)->get();
        return view('products.index', compact('products'));
    }


    public function shop()
    {
        $products = Product::inRandomOrder()->paginate(10);
        return view('products.shop', compact('products'));
    }

    public function show(Product $product)
    {
        return view('products.show', compact('product'));
    }
}

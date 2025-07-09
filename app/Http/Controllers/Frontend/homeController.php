<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;

class homeController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        $products = Product::with('category')->get();
        return view('frontend.home', compact('categories', 'products'));
    }


    public function gallery()
    {
        $products = Product::orderBy('id', 'desc')->get();
        return view('frontend.gallery', compact('products'));
    }

    public function productsByCategory($categoryId)
    {
        $category = Category::findOrFail($categoryId);
        $products = $category->products()->where('status', 1)->get();
        return view('frontend.category', compact('category', 'products'));
    }


    public function showProduct($product)
    {
        $product = Product::findOrFail($product);
        return view('frontend.show', compact('product'));
    }
}

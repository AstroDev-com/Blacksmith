<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;

class homeController extends Controller
{

    public function index()
    {
        $data = Product::all();
        return view ('frontend.home', compact('data'));

    }
}

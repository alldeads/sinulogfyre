<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
    }


    public function products()
    {
        $products = Product::all();

        $token = request()->token;

        return view('products', compact('products', 'token'));
    }

    public function beginners()
    {
        return view('beginners');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\User;

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

        $user = User::verify_token( $token );

        if ( $user === false ) {
            return redirect('/');
        }

        return view('products', compact('products', 'token'));
    }

    public function beginners()
    {
        return view('beginners');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\User;
use App\Method;

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

    public function get_product()
    {
        $product_name = request()->product;
        $token        = request()->token;
        $message = "";

        $user = User::verify_token( $token );

        if ( $user === false ) {
            return redirect('/');
        }

        $product = Product::get_single_product( str_replace( '-', ' ', $product_name ) );

        if ( $product === false ) {
            return redirect('/' . $token . '/tickets');
        }

        $options = Method::all();

        return view('single', compact('product', 'message', 'options'));
    }

    public function beginners()
    {
        return view('beginners');
    }
}

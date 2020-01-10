<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\User;
use App\Method;
use App\Order;
use App\Payment;
use App\Details;
use App\Mail\NewOrder;
use Illuminate\Support\Facades\Mail;

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

        if ( count( request()->all() ) > 0 ) {

            $validatedData = request()->validate([
                'name'             => 'required',
                'email_address'    => 'required|email',
                'address'          => 'required',
                'phone'            => 'required|numeric',
                'method'           => 'required',
                'reference_code'   => 'required',
            ]);

            $quantity = request()->product_quantity;
            $price    = $product->price;

            $order = Order::create([
                'order_number' => 'SF-' . uniqid(),
                'product_id'   => request()->product_id,
                'quantity'     => request()->product_quantity,
                'total_price'  => $quantity * $price
            ]);

            $details = Details::create([
                'reference_code' => request()->reference_code,
                'full_name'      => request()->name,
                'address'        => request()->address,
                'phone'          => request()->phone,
                'email'          => request()->email_address
            ]);

            $payment = Payment::create([
                'method_id'    => request()->method,
                'user_id'      => $user->id,
                'details_id'   => $details->id,
                'order_id'     => $order->id,
                'status'       => 'pending',
            ]);

            $message = "Your order has been received! Please check your email!";

            // dd(request()->email_address);

            // Mail::to(request()->email_address)
                    ->cc('johnrexter.flores@gmail.com')
                    ->send(new NewOrder( $payment ));
        }

        return view('single', compact('product', 'message', 'options'));
    }

    public function beginners()
    {
        return view('beginners');
    }
}

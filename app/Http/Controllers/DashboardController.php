<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\User;

class DashboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $init = array(
            "page_header" => "Dashboard",
            "page_icon"   => "fa-dashboard",
            "page_name"   => "Summary"
        );

        return view('home', compact('init'));
    }

    public function profile( Request $request )
    {
        $init = array(
            "page_header" => "Profile",
            "page_icon"   => "fa-dashboard",
            "page_name"   => "Profile"
        );

        if ( count( $request->all() ) > 0 ) {

            $result = User::update_user( $request );
        }

        $user = auth()->user();

        return view('dashboard.profile', compact('init', 'user'));
    }

    public function history()
    {
        $init = array(
            "page_header" => "Transaction",
            "page_icon"   => "fa-cog",
            "page_name"   => "History"
        );

        $transactions = auth()->user()->transactions;

        return view('dashboard.history', compact('init', 'transactions'));
    }

    public function rewards( Request $request )
    {
        if ( auth()->user()->status == 0 ) {
            return redirect('dashboard/home');
        }
        
        $init = array(
            "page_header" => "Rewards",
            "page_icon"   => "fa-cog",
            "page_name"   => "Rewards"
        );

        if ( count( $request->all() ) > 0 ) {

            $result = Rewards::claim_daily_reward();
        }

        $rewards = Rewards::get_user_rewards( auth()->user()->id );

        return view('dashboard.rewards', compact('init', 'rewards'));
    }

    public function payments( Request $request )
    {
        $init = array(
            "page_header" => "Payments",
            "page_icon"   => "fa-money",
            "page_name"   => "Payments"
        );

        $message = "Please pay the amount of Php 1,500.00";

        $user = auth()->user();

        if ( $user->status == 1 )
        {
            return redirect('dashboard/home');
        }

        if ( count( $request->all() ) > 1 ) {

            if ( $request['remittance_center'] == "BDO" || $request['remittance_center'] == "BPI" ) {

                $validatedData = $request->validate( [
                    'reference_code'    => 'required',
                    'sender_name'       => 'required',
                    'address'           => 'required',
                    'phone'             => 'required|numeric|confirmed',
                ] );

            } else {

                $validatedData = $request->validate( [
                    'reference_code'    => 'required',
                    'full_name'         => 'required',
                    'address'           => 'required',
                    'phone'             => 'required|numeric|confirmed',
                ] );
            }

            $payment = Payment::create( [
                'user_id'             => $user->id,
                'user_name'           => isset( $request['user_name'] ) ? $request['user_name'] : "",
                'transaction_code'    => isset( $request['reference_code'] ) ? $request['reference_code'] : "",
                'remittance_id'   => isset( $request['remittance_center'] ) ? $request['remittance_center'] : 4,
                'status'              => 'pending',
                'full_name'           => isset( $request['full_name'] ) ? $request['full_name'] : "",
                'account_name'        => isset( $request['sender_name'] ) ? $request['sender_name'] : "",
                'bank_account_number' => isset( $request['bank_account_number'] ) ? $request['bank_account_number'] : "",
                'address'             => isset( $request['address'] ) ? $request['address'] : "",
                'dreciept'            => isset( $request['date_receipt'] ) ? $request['date_receipt'] : null,
                'treciept'            => isset( $request['time_receipt'] ) ? $request['time_receipt'] : null,
                'phone'               => isset( $request['phone'] ) ? $request['phone'] : "",
                'type'                => 'account'
            ] );

            if ( count( $payment->toArray() ) > 0 ) {
                $message = "We are processing your payment. Thank you!";
            }
        }

        return view('dashboard.payment', compact('init', 'user', 'message'));
    }

    public function encashments( Request $request )
    {
        $init = array(
            "page_header" => "Encashment",
            "page_icon"   => "fa-money",
            "page_name"   => "Encashment"
        );

        $message    = "Minimum encashment Php 2,000.00";
        $encashment = [];
        $proceed    = false;

        $user = auth()->user();

        $available_cash = Binary::get_available_cash( $user->id );

        $organic_cash   = auth()->user()->points['cash'];
        $binary_cash    = $available_cash - $organic_cash;

        $points = Points::findOrFail( auth()->user()->points['id'] );

        if ( count( $request->all() ) > 1 ) {

            if ( $request['remittance_center'] == "BDO" || $request['remittance_center'] == "BPI" ) {

                $validatedData = $request->validate( [
                    'amount'              => 'required',
                    'sender_name'         => 'required',
                    'address'             => 'required',
                    'bank_account_number' => 'required',
                    'phone'               => 'required|numeric|confirmed',
                ] );

            } else {

                $validatedData = $request->validate( [
                    'full_name'         => 'required',
                    'amount'            => 'required',
                    'address'           => 'required',
                    'phone'             => 'required|numeric|confirmed',
                ] );
            }

            $amount = $request['amount'];

            if ( $amount > $available_cash ) {

                $message = "Oops! You have insufficient balance.";

            } else if ( $amount < 2001 ) {

                $message = "Oops! Minimum encashment is Php 2,000.00";

            } else {

                if ( $amount <= $binary_cash ) {

                    $points->b_cash_out += $binary_cash;
                    $proceed = true;
                } else {

                    // Deduct binary cash
                    $x = $amount - $binary_cash;

                    // Deduct organic cash
                    $y = $organic_cash - $x;

                    if ( $y >= 0 ) {

                        $points->cash       -= $x;
                        $points->b_cash_out += $binary_cash;
                        $points->o_cash_out += $x;
                        $proceed = true;
                    }
                }

                $points->save();

                if ( $proceed ) {

                    $encashment = Encashment::create( [
                        'user_id'             => $user->id,
                        'user_name'           => isset( $request['user_name'] ) ? $request['user_name'] : "",
                        'transaction_code'    => isset( $request['reference_code'] ) ? $request['reference_code'] : "",
                        'remittance_center'   => isset( $request['remittance_center'] ) ? $request['remittance_center'] : "",
                        'status'              => 'pending',
                        'full_name'           => isset( $request['full_name'] ) ? $request['full_name'] : "",
                        'account_name'        => isset( $request['sender_name'] ) ? $request['sender_name'] : "",
                        'bank_account_number' => isset( $request['bank_account_number'] ) ? $request['bank_account_number'] : "",
                        'address'             => isset( $request['address'] ) ? $request['address'] : "",
                        'dreciept'            => isset( $request['date_receipt'] ) ? $request['date_receipt'] : null,
                        'treciept'            => isset( $request['time_receipt'] ) ? $request['time_receipt'] : null,
                        'phone'               => isset( $request['phone'] ) ? $request['phone'] : "",
                        'amount'              => $amount
                    ] );
                }
            }

            if ( $proceed ) {

                $message = "We are processing your encashment. Thank you!";
            }
        }

        return view('dashboard.encashment', compact('init', 'user', 'message'));
    }

    public function encashment_history()
    {
        $init = array(
            "page_header" => "Encashment History",
            "page_icon"   => "fa-money",
            "page_name"   => "Encashment History"
        );

        $encashments = Encashment::get_user_encashments( auth()->user()->id );

        return view('dashboard.encashment_history', compact('init', 'encashments'));
    }

    public function products()
    {
        if ( auth()->user()->status == 0 ) {
            return redirect('dashboard/home');
        }

        $init = array(
            "page_header" => "Products",
            "page_icon"   => "fa-shopping-cart",
            "page_name"   => "Products"
        );

        $products = Product::all();

        return view('dashboard.product', compact('init', 'products'));
    }

    public function get_product( $product_name )
    {
        if ( auth()->user()->status == 0 ) {
            return redirect('dashboard/home');
        }

        $init = array(
            "page_header" => "Products",
            "page_icon"   => "fa-shopping-cart",
            "page_name"   => "Products"
        );

        $product = Product::get_single_product( str_replace( '-', ' ', $product_name ) );
        $message = "";
        $centers = Remittance::all();

        if ( $product === false ) {

            return redirect('/dashboard/products');
        }

        if ( count( request()->all() ) > 0 ) {

            if ( request('remittance_center') == "4" ) {

                $validatedData = request()->validate( [
                    'name'             => 'required',
                    'phone'            => 'required|numeric',
                    'address'          => 'required',
                    'city'             => 'required',
                    'postal'           => 'required',
                    'remittance_center'=> 'required',
                ] );

            } else {
                $validatedData = request()->validate( [
                    'name'             => 'required',
                    'phone'            => 'required|numeric',
                    's_phone'          => 'required|numeric',
                    'address'          => 'required',
                    'city'             => 'required',
                    'postal'           => 'required',
                    'reference_code'   => 'required',
                    'sender_name'      => 'required',
                    'remittance_center'=> 'required',
                    'date_paid'        => 'required'
                ] );
            }

            $order = Order::create([
                'product_id'     => $product->id,
                'user_id'        => auth()->user()->id,
                'reference_code' => "UPH-" . str_replace(".","",microtime(true)).rand(000,999),
                'quantity'       => request('product_quantity'),
                'total_amount'   => request('product_quantity') * $product->price
            ]);

            $payment = Payment::create([
                'order_id'          => $order->id,
                'transaction_code'  => request('reference_code') ? request('reference_code') : "",
                'remittance_id'     => request('remittance_center'),
                'address'           => request('address'),
                'full_name'         => request('sender_name'),
                'phone'             => request('phone'),
                's_phone'           => request('s_phone'),
                'user_id'           => auth()->user()->id,
                'dreciept'          => request('date_paid'),
                'region_id'         => 1,
                'city'              => request('city'),
                'postal'            => request('postal'),
                'country'           => "Philippines",
                'type'              => 'order'
            ]);

            $message = "Your order has been received!";
        }

        return view('dashboard.single', compact( 'product', 'init', 'message', 'centers' ) );
    }

    public function downlines()
    {
        $init = array(
            "page_header" => "Network",
            "page_icon"   => "fa-money",
            "page_name"   => "List"
        );

        $downlines = Binary::get_downlines( auth()->user()->id );

        $left = Binary::get_left_downlines( auth()->user()->id );

        $right = Binary::get_right_downlines( auth()->user()->id );

        return view('dashboard.downlines', compact('init', 'downlines', 'left', 'right'));
    }

    public function inactive_downlines()
    {
        $init = array(
            "page_header" => "Network",
            "page_icon"   => "fa-money",
            "page_name"   => "Inactive Members"
        );

        $downlines = Binary::get_inactive_downlines( auth()->user()->id );

        return view('dashboard.inactive', compact('init', 'downlines'));
    }
}

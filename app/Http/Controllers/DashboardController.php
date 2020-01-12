<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\User;
use App\Payment;
use App\Mail\TicketConfirmed;
use Illuminate\Support\Facades\Mail;

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

        // return new TicketConfirmed(Payment::find(1)) );

        return view('home', compact('init'));
    }

    public function sales()
    {
        $init = array(
            "page_header" => "Sales",
            "page_icon"   => "fa-money",
            "page_name"   => "Report"
        );

        $payments = auth()->user()->payments()->paginate(10);

        return view('sales', compact('init', 'payments'));
    }
}

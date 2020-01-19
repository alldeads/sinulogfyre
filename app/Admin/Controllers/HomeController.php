<?php

namespace App\Admin\Controllers;

use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\Dashboard;
use Encore\Admin\Layout\Column;
use Encore\Admin\Layout\Content;
use Encore\Admin\Layout\Row;

use App\Serial;
use App\Payment;

class HomeController extends Controller
{
    public function index(Content $content)
    {
        return $content
            ->title('Dashboard')
            ->description('Reports')
            ->row(function (Row $row) {

                 $row->column(3, function (Column $column) {
                    $payments = Payment::where('status', 'paid')->get();
                    $total = 0;

                    foreach ($payments as $payment) {
                        
                        if ( $payment->method->id == 2 ) {
                            $total += $payment->order->total_price;
                        }
                    }

                    $column->append('<div class="row" style="background-color: white; padding: 5px; margin:5px;">
                                        <div class="col-md-5">
                                            <img src="'. asset('images/paypal.jpeg') .'" width="100%">
                                        </div>
                                        <div class="col-md-7 text-right">
                                            <h2>'.$total.'</h2>
                                            <div>Paypal Payments</div>
                                        </div>
                                    </div>
                                    ');
                });

                $row->column(3, function (Column $column) {
                    $payments = Payment::where('status', 'paid')->get();
                    $total = 0;

                    foreach ($payments as $payment) {
                        
                        if ( $payment->method->id == 1 ) {
                            $total += $payment->order->total_price;
                        }
                    }

                    $column->append('<div class="row" style="background-color: white; padding: 5px; margin:5px;">
                                        <div class="col-md-5">
                                            <img src="'. asset('images/palawan.jpg') .'" width="100%">
                                        </div>
                                        <div class="col-md-7 text-right">
                                            <h2>'.$total.'</h2>
                                            <div>Palawan Payments</div>
                                        </div>
                                    </div>
                                    ');
                });

                $row->column(3, function (Column $column) {
                    $payments = Payment::where('status', 'paid')->get();
                    $total = 0;

                    foreach ($payments as $payment) {
                        
                        if ( $payment->method->id == 3 ) {
                            $total += $payment->order->total_price;
                        }
                    }

                    $column->append('<div class="row" style="background-color: white; padding: 5px; margin:5px;">
                                        <div class="col-md-5">
                                            <img src="'. asset('images/eleven.png') .'" width="100%">
                                        </div>
                                        <div class="col-md-7 text-right">
                                            <h2>'.$total.'</h2>
                                            <div>7/11 Payments</div>
                                        </div>
                                    </div>
                                    ');
                });

                $row->column(3, function (Column $column) {
                    $payments = Payment::where('status', 'paid')->get();
                    $total = 0;

                    foreach ($payments as $payment) {
                        
                        if ( $payment->method->id == 4 ) {
                            $total += $payment->order->total_price;
                        }
                    }

                    $column->append('<div class="row" style="background-color: white; padding: 5px; margin:5px;">
                                        <div class="col-md-5">
                                            <img src="'. asset('images/gcash.png') .'" width="100%">
                                        </div>
                                        <div class="col-md-7 text-right">
                                            <h2>'.$total.'</h2>
                                            <div>Gcash Payments</div>
                                        </div>
                                    </div>
                                    ');
                });

                $row->column(3, function (Column $column) {
                    $payments = Payment::where('status', 'paid')->get();
                    $column->append('<div class="row" style="background-color: white; padding: 5px; margin:5px;">
                                        <div class="col-md-6">
                                            <i class="fa fa-money fa-5x"></i>
                                        </div>
                                        <div class="col-md-6 text-right">
                                            <h2>'. count($payments->toArray()) .'</h2>
                                            <div>Paid Payments</div>
                                        </div>
                                    </div>
                                    ');
                });

                $row->column(3, function (Column $column) {
                    $payments = Payment::where('status', 'pending')->get();
                    $column->append('<div class="row" style="background-color: white; padding: 5px; margin:5px;">
                                        <div class="col-md-5">
                                            <i class="fa fa-warning fa-5x"></i>
                                        </div>
                                        <div class="col-md-7 text-right">
                                            <h2>'. count($payments->toArray()) .'</h2>
                                            <div>Pending Payments</div>
                                        </div>
                                    </div>
                                    ');
                });

                $row->column(3, function (Column $column) {
                    $payments = Payment::where('status', 'duplicated')->get();
                    $column->append('<div class="row" style="background-color: white; padding: 5px; margin:5px;">
                                        <div class="col-md-5">
                                            <i class="fa fa-clone fa-5x"></i>
                                        </div>
                                        <div class="col-md-7 text-right">
                                            <h2>'. count($payments->toArray()) .'</h2>
                                            <div>Duplicate Payments</div>
                                        </div>
                                    </div>
                                    ');
                });

                $row->column(3, function (Column $column) {
                    $payments = Payment::where('status', 'declined')->get();
                    $column->append('<div class="row" style="background-color: white; padding: 5px; margin:5px;">
                                        <div class="col-md-5">
                                            <i class="fa fa-ban fa-5x"></i>
                                        </div>
                                        <div class="col-md-7 text-right">
                                            <h2>'. count($payments->toArray()) .'</h2>
                                            <div>Declined Payments</div>
                                        </div>
                                    </div>
                                    ');
                });

                $row->column(3, function (Column $column) {
                    $serial = Serial::where('status', 'used')->get();
                    $column->append('<div class="row" style="background-color: white; padding: 5px; margin:5px;">
                                        <div class="col-md-5">
                                            <i class="fa fa-lock fa-5x"></i>
                                        </div>
                                        <div class="col-md-7 text-right">
                                            <h2>'. count( $serial->toArray() ) .'</h2>
                                            <div>Unclaimed Tickets</div>
                                        </div>
                                    </div>
                                    ');
                });

                $row->column(3, function (Column $column) {
                    $serial = Serial::where('status', 'blocked')->get();

                    $column->append('<div class="row" style="background-color: white; padding: 5px; margin:5px;">
                                        <div class="col-md-6">
                                            <i class="fa fa-unlock fa-5x"></i>
                                        </div>
                                        <div class="col-md-6 text-right">
                                            <h2>'. count( $serial->toArray() ) .'</h2>
                                            <div>Claimed Tickets</div>
                                        </div>
                                    </div>
                                    ');
                });

                $row->column(3, function (Column $column) {
                    $serial = Serial::where('status', 'duplicated')->get();

                    $column->append('<div class="row" style="background-color: white; padding: 5px; margin:5px;">
                                        <div class="col-md-5">
                                            <i class="fa fa-minus-circle fa-5x"></i>
                                        </div>
                                        <div class="col-md-7 text-right">
                                            <h2>'. count( $serial->toArray() ) .'</h2>
                                            <div>Duplicate Tickets</div>
                                        </div>
                                    </div>
                                    ');
                });

                $row->column(3, function (Column $column) {
                    $serial = Serial::where('status', 'available')->get();

                    $column->append('<div class="row" style="background-color: white; padding: 5px; margin:5px;">
                                        <div class="col-md-6">
                                            <i class="fa fa-check-circle fa-5x"></i>
                                        </div>
                                        <div class="col-md-6 text-right">
                                            <h2>'. count( $serial->toArray() ) .'</h2>
                                            <div>Available Tickets</div>
                                        </div>
                                    </div>
                                    ');
                });

                $row->column(3, function (Column $column) {
                    $payments = Payment::where('status', 'paid')->get();

                    $total = 0;

                    foreach ($payments as $payment) {
                        
                        if ( $payment->order->product->id == 1 ) {

                            $total += $payment->order->quantity;
                        }
                    }

                    $column->append('<div class="row" style="background-color: white; padding: 5px; margin:5px;">
                                        <div class="col-md-6">
                                            <img src="'. asset('products/images/81463729_377066763142641_7711675575957454848_n.jpg') .'" width="100%">
                                        </div>
                                        <div class="col-md-6 text-right">
                                            <h2>'. $total .'</h2>
                                            <div>VIP Tickets</div>
                                        </div>
                                    </div>
                                    ');
                });

                $row->column(3, function (Column $column) {
                    $payments = Payment::where('status', 'paid')->get();

                    $total = 0;

                    foreach ($payments as $payment) {
                        
                        if ( $payment->order->product->id == 2 ) {

                            $total += $payment->order->quantity;
                        }
                    }

                    $column->append('<div class="row" style="background-color: white; padding: 5px; margin:5px;">
                                        <div class="col-md-6">
                                            <img src="'. asset('products/images/81327007_607665803322647_1180082083217801216_n.jpg') .'" width="100%">
                                        </div>
                                        <div class="col-md-6 text-right">
                                            <h2>'. $total .'</h2>
                                            <div>Gen Ad Tickets</div>
                                        </div>
                                    </div>
                                    ');
                });

                $row->column(3, function (Column $column) {
                    $payments = Payment::where('status', 'paid')->get();

                    $total = 0;

                    foreach ($payments as $payment) {
                        
                        if ( $payment->order->product->id == 3 ) {

                            $total += $payment->order->quantity;
                        }
                    }

                    $column->append('<div class="row" style="background-color: white; padding: 5px; margin:5px;">
                                        <div class="col-md-5">
                                            <img src="'. asset('products/images/82253736_2277616679006372_555321284049764352_n.jpg') .'" width="100%">
                                        </div>
                                        <div class="col-md-7 text-right">
                                            <h2>'. $total .'</h2>
                                            <div>Ground Floor Tables</div>
                                        </div>
                                    </div>
                                    ');
                });

                $row->column(3, function (Column $column) {
                    $payments = Payment::where('status', 'paid')->get();

                    $total = 0;

                    foreach ($payments as $payment) {
                        
                        if ( $payment->order->product->id == 4 ) {

                            $total += $payment->order->quantity;
                        }
                    }

                    $column->append('<div class="row" style="background-color: white; padding: 5px; margin:5px;">
                                        <div class="col-md-5">
                                            <img src="'. asset('products/images/83062936_482361212474147_2866091368076279808_n.jpg') .'" width="100%">
                                        </div>
                                        <div class="col-md-7 text-right">
                                            <h2>'. $total .'</h2>
                                            <div>Second Floor Tables</div>
                                        </div>
                                    </div>
                                    ');
                });

                $row->column(3, function (Column $column) {
                    $payments = Payment::where('status', 'paid')->get();
                    $total = 0;

                    foreach ($payments as $payment) {
                        
                        $total += $payment->order->total_price;
                    }

                    $column->append('<div class="row" style="background-color: white; padding: 5px; margin:5px;">
                                        <div class="col-md-6">
                                            <i class="fa fa-line-chart fa-5x"></i>
                                        </div>
                                        <div class="col-md-6 text-right">
                                            <h2>'.$total.'</h2>
                                            <div>Total Payments</div>
                                        </div>
                                    </div>
                                    ');
                });

                $row->column(3, function (Column $column) {
                    $payments = Payment::where('status', 'paid')->get();
                    $total = 0;

                    foreach ($payments as $payment) {
                        
                        $total += $payment->order->quantity;
                    }

                    $column->append('<div class="row" style="background-color: white; padding: 5px; margin:5px;">
                                        <div class="col-md-5">
                                            <i class="fa fa-industry fa-5x"></i>
                                        </div>
                                        <div class="col-md-7 text-right">
                                            <h2>'.$total.'</h2>
                                            <div>Total Sold Tickets</div>
                                        </div>
                                    </div>
                                    ');
                });

                $row->column(3, function (Column $column) {
                    $payments = Payment::where('status', 'paid')->get();
                    $total = 0;

                    foreach ($payments as $payment) {
                        
                        $total += $payment->order->total_price;
                    }

                    $column->append('<div class="row" style="background-color: white; padding: 5px; margin:5px;">
                                        <div class="col-md-4">
                                            <i class="fa fa-info fa-5x"></i>
                                        </div>
                                        <div class="col-md-8 text-right">
                                            <h2>'.$total * 0.05 .'</h2>
                                            <div>Total Commissions(5%)</div>
                                        </div>
                                    </div>
                                    ');
                });

                $row->column(3, function (Column $column) {
                    $payments = Payment::where('status', 'paid')->get();
                    $total = 0;

                    foreach ($payments as $payment) {
                        
                        $total += $payment->order->total_price;
                    }

                    $column->append('<div class="row" style="background-color: white; padding: 5px; margin:5px;">
                                        <div class="col-md-3">
                                            <i class="fa fa-info-circle fa-5x"></i>
                                        </div>
                                        <div class="col-md-9 text-right">
                                            <h2>'.$total * 0.15 .'</h2>
                                            <div>Total Commissions(15%)</div>
                                        </div>
                                    </div>
                                    ');
                });

                // $row->column(4, function (Column $column) {
                //     $column->append(Dashboard::extensions());
                // });

                // $row->column(4, function (Column $column) {
                //     $column->append(Dashboard::dependencies());
                // });
            });
    }
}

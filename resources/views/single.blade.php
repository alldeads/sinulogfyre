@extends('layouts.app')

@section('extra_css')
    <style type="text/css">
        
        .card {
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
            max-width: 700px;
            margin: auto;
            text-align: center;
            font-family: arial;
        }

        .price {
            color: grey;
            font-size: 22px;
            text-align: left;
        }

        .card button {
            border: none;
            outline: 0;
            padding: 12px;
            color: white;
            background-color: #000;
            text-align: center;
            cursor: pointer;
            width: 100%;
            font-size: 18px;
        }

        .card button:hover {
            opacity: 0.7;
        }

    </style>
@endsection

@section('content')
    
    <!-- page details -->
    <div class="breadcrumb-agile mt-4">
        <div class="container">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="/products">Products</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page"> {{ $product->name }}</li>
            </ol>
        </div>
    </div>

    <section class="login py-5">
        <div class="container">

            @if ( strlen( $message ) > 0 )
                <div class="alert-success" style="text-align: center; padding: 30px 0px 20px 0px; margin-bottom: 20px;">
                    {{ $message }}
                </div>
            @endif

            <div class="row" >
                <div class="col-lg-12" style="margin-bottom: 50px;">
                    <a href="/product/{{ str_replace(' ', '-', $product->name) }}">
                        <div class="card">
                            <img src="{{ asset('products/' . $product->avatar_first) }}" alt="" width="100%">
                        </div>
                    </a>
                </div>

                <div class="col-lg-12" style="margin-bottom: 50px;">
                    <h1>{{ $product->name }}</h1>

                    <hr>

                    {!! $product->description !!}

                    <hr>

                    <div class="row">
                        <div class="col-md-6">
                            <p id="price_text" class="price">₱{{ number_format( $product->price, 2, '.', '' ) }}</p>
                        </div>

                        <div class="col-md-6">
                            <input id="p_quantity" type="number" class="form-control" value="1" autofocus>
                        </div>
                    </div> 

                    <hr>
                </div>
            </div>

            <div class="row justify-content-center text-center" id="paypal" style="display: none;">

                @if ( $product->id == 1 ) 
                    <div class="col-lg-6 col-md-6 col-sm-12 col-12" id="vipticket">
                        <form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
                            <input type="hidden" name="cmd" value="_s-xclick">
                            <input type="hidden" name="hosted_button_id" value="5932FLFLEBFW4">
                            <input type="image" src="https://www.paypalobjects.com/en_US/i/btn/btn_paynowCC_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
                            <img alt="" border="0" src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" width="1" height="1">
                        </form>
                    </div>
                @elseif ( $product->id == 2 )
                    <div class="col-lg-6 col-md-6 col-sm-12 col-12" id="genadticket">
                        <form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
                            <input type="hidden" name="cmd" value="_s-xclick">
                            <input type="hidden" name="hosted_button_id" value="79HE4P3N9BUY8">
                            <input type="image" src="https://www.paypalobjects.com/en_US/i/btn/btn_paynowCC_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
                            <img alt="" border="0" src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" width="1" height="1">
                        </form>
                    </div>
                @elseif ( $product->id == 3 )
                    <div class="col-lg-12 col-md-12 col-sm-12 col-12" id="groundfloor">
                        <form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
                        <input type="hidden" name="cmd" value="_s-xclick">
                        <input type="hidden" name="hosted_button_id" value="TDVG4UVJU2CRE">
                        <table class="table table-bordered">
                            <tr>
                                <td>
                                    <input type="hidden" name="on0" value="Tables">Tables
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <select name="os0" class="form-control">
                                        <option value="Table 3">Table 3 </option>
                                        <option value="Table 4">Table 4 </option>
                                    </select> 
                                </td>
                            </tr>
                        </table>
                        <input type="image" src="https://www.paypalobjects.com/en_US/i/btn/btn_buynowCC_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
                        <img alt="" border="0" src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" width="1" height="1">
                        </form>
                    </div>
                @elseif ( $product->id == 4 )
                    <div class="col-lg-6 col-md-6 col-sm-12 col-12" id="secondfloor">
                        <form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
                        <input type="hidden" name="cmd" value="_s-xclick">
                        <input type="hidden" name="hosted_button_id" value="CBXWGD5AYGB5Y">
                        <table class="table table-bordered">
                        <tr><td><input type="hidden" name="on0" value="Tables">Tables</td></tr><tr><td><select class="form-control" name="os0">
                            <option value="Table 1">Table 1 </option>
                            <option value="Table 2">Table 2 </option>
                            <option value="Table 3">Table 3 </option>
                            <option value="Table 4">Table 4 </option>
                            <option value="Table 9">Table 9 </option>
                            <option value="Table 12">Table 12 </option>
                            <option value="Table 13">Table 13 </option>
                            <option value="Table 14">Table 14 </option>
                        </select> </td></tr>
                        </table>
                        <input type="image" src="https://www.paypalobjects.com/en_US/i/btn/btn_buynowCC_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
                        <img alt="" border="0" src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" width="1" height="1">
                        </form>

                    </div>
                @endif
            </div>

            <form method="POST">
                @csrf
                <input type="hidden" id="product_price" name="product_price" value="{{ $product->price }}">
                <input type="hidden" id="product_quantity" name="product_quantity" value="1">
                <input type="hidden" id="product_id" name="product_id" value="{{ $product->id }}">

                <div class="row" id="normal">
                    <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                        <div class="form-group row">
                            <div class="col-md-12">
                                <div class="panel">
                                    <div class="panel-heading" style="text-align: left;">
                                        <h6> Payment Options </h6>
                                        <hr>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-12">
                                <select id="payment_method" name="method" class="form-control{{ $errors->has('method') ? ' is-invalid' : '' }}">
                                    
                                    @foreach( $options as $option )
                                        <option value="{{ $option->id }}"> {{ $option->name }}</option>
                                    @endforeach
                                </select>

                                @if ($errors->has('method'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('method') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="col-md-12" id="palawan" style="margin-top: 10px;display: none; ">
                                <div class="panel">
                                    <div class="panel-heading" style="text-align: left;">
                                        <ol type="1">
                                            <li>1. Go to the nearest Palawan Pawnshop</li>
                                            <li>2. Send <b style="color:red;">the exact amount</b> to</li>
                                            <p><font size="3">[<b style="color: skyblue;">Jan Dominique Perez</b>] </font></p>
                                            <p><font size="3">[<b style="color: skyblue;">Mandaue City</b>]</font></p>
                                            <p>[<b style="color: skyblue;">09954683327</b>]</p>
                                            <li>3. Fill up the form</li>
                                            <li>4. Please keep receipt until payment is confirmed </li>
                                            <li>5. Please allow 6-12 hours order confirmation </li>
                                        </ol>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-12" id="gcash" style="margin-top: 10px; display: block; ">
                                <div class="panel">
                                    <div class="panel-heading" style="text-align: left;">
                                        <ol>
                                            <li>1. Using GCash app</li>
                                            <li>2. Send <b style="color:red;">the exact amount</b> to</li>
                                            <p><font size="3">[<b style="color: skyblue;">Jan Dominique Perez</b>] </font></p>
                                            <p>[<b style="color: skyblue;">09954683327</b>]</p>
                                            <li>3. Fill up the form</li>
                                            <li>4. Please keep receipt until payment is confirmed </li>
                                            <li>5. Please allow 6-12 hours order confirmation </li>
                                        </ol>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-12" id="seven" style="margin-top: 10px; display: none; ">
                                <div class="panel">
                                    <div class="panel-heading" style="text-align: left;">
                                        <ol>
                                            <li>1. Visit to any 7/11 </li>
                                            <li>2. Go to Cashier</li>
                                            <li>3. Ask to Send Money Via Palawan</li>
                                            <li>4. Send <b style="color:red;">the exact amount</b> to</li>
                                            <p><font size="3">[<b style="color: skyblue;">Jan Dominique Perez</b>] </font></p>
                                            <p><font size="3">[<b style="color: skyblue;">Mandaue City</b>]</font></p>
                                            <p>[<b style="color: skyblue;">09954683327</b>]</p>
                                            <li>5. Fill up the form</li>
                                            <li>6. Please keep receipt until payment is confirmed </li>
                                            <li>7. Please allow 6-12 hours order confirmation </li>
                                        </ol>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-12">
                                <input id="reference_code" type="text" class="form-control{{ $errors->has('reference_code') ? ' is-invalid' : '' }}" name="reference_code" placeholder="Transaction Number/Code">

                                @if ($errors->has('reference_code'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('reference_code') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        {{-- <div class="form-group row">
                            <div class="col-md-12">
                                <input id="date_paid" type="date" class="form-control{{ $errors->has('date_paid') ? ' is-invalid' : '' }}" name="date_paid" placeholder="Date Paid" >

                                @if ($errors->has('date_paid'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('date_paid') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div> --}}
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                        <div class="form-group row">
                            <div class="col-md-12">
                                <div class="panel">
                                    <div class="panel-heading" style="text-align: left;">
                                        <h6> Billing Information</h6>
                                        <hr>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-12">
                                <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" required autofocus placeholder="Sender Full Name">

                                @if ($errors->has('name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-12">
                                <input id="address" type="text" class="form-control{{ $errors->has('address') ? ' is-invalid' : '' }}" name="address" required autofocus placeholder="Sender Address">

                                @if ($errors->has('address'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('address') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-12">
                                <input id="email_address" type="text" class="form-control{{ $errors->has('email_address') ? ' is-invalid' : '' }}" name="email_address" required autofocus placeholder="Email Address">

                                @if ($errors->has('email_address'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email_address') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-12">
                                <input id="phone" type="text" class="form-control{{ $errors->has('phone') ? ' is-invalid' : '' }}" name="phone" autofocus placeholder="Sender Phone Number">

                                @if ($errors->has('phone'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('phone') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-12">
                                <button class="btn btn-danger" type="submit">Checkout</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>
@endsection
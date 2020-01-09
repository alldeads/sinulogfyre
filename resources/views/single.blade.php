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

                    <p class="desc">{{ $product->description }}</p>

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

            <form method="POST">
                @csrf
                <input type="hidden" id="product_price" name="product_price" value="{{ $product->price }}">
                <input type="hidden" id="product_quantity" name="product_quantity" value="1">
                <input type="hidden" id="product_id" name="product_id" value="{{ $product->id }}">

                <div class="row">
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
                    </div>

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

                            <div class="col-md-12" id="palawan" style="margin-top: 10px;display: block; ">
                                <div class="panel">
                                    <div class="panel-heading" style="text-align: left;">
                                        <ul>
                                            <li> Go to the nearest Palawan Pawnshop</li>
                                            <li> Send <b style="color:red;">the exact amount</b> to</li>
                                            <b><font size="3">[Jan Dominique Perez] [Mandaue City]</font></b>
                                            <b>[09954683327]</b>
                                            <li> Fill up the form on the <b>bottom side of the page</b></li>
                                            <li> Please keep receipt until payment is confirmed </li>
                                            <li> Please allow 6-12 hours order confirmation </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-12" id="gcash" style="margin-top: 10px; display: none; ">
                                <div class="panel">
                                    <div class="panel-heading" style="text-align: left;">
                                        <ul>
                                            <li> Using GCash app</li>
                                            <li> Send <b style="color:red;">the exact amount</b> to</li>
                                            <b><font size="3">[Jan Dominique Perez] [09954683327]</font></b>
                                            <li> Fill up the form on the <b>bottom side of the page</b></li>
                                            <li> Please keep receipt until payment is confirmed </li>
                                            <li> Please allow 6-12 hours order confirmation </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-12" id="seven" style="margin-top: 10px; display: none; ">
                                <div class="panel">
                                    <div class="panel-heading" style="text-align: left;">
                                        <ul>
                                            <li> Visit to any 7/11 </li>
                                            <li> Go to Cashier</li>
                                            <li> Ask to Send Money Via Palawan</li>
                                            <li> Send <b style="color:red;">the exact amount</b> to</li>
                                            <b><font size="3">[Jan Dominique Perez] [Mandaue City]</font></b>
                                            <b>[09954683327]</b>
                                            <li> Fill up the form on the <b>bottom side of the page</b></li>
                                            <li> Please keep receipt until payment is confirmed </li>
                                            <li> Please allow 6-12 hours order confirmation </li>
                                        </ul>
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

                        <div class="form-group row">
                            <div class="col-md-12">
                                <input id="date_paid" type="date" class="form-control{{ $errors->has('date_paid') ? ' is-invalid' : '' }}" name="date_paid" placeholder="Date Paid" >

                                @if ($errors->has('date_paid'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('date_paid') }}</strong>
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
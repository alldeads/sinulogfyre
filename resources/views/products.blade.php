@extends('layouts.app')

@section('extra_css')
    <style type="text/css">
        
        .card {
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
            max-width: 700px;
            margin: auto;
            text-align: center;
            font-family: arial;
            margin-bottom: 10px;
        }

        .price {
            color: grey;
            font-size: 22px;
            text-align: center;
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

        .desc {
            text-align: justify;
        }

    </style>
@endsection

@section('content')
    
    <!-- page details -->
    <div class="breadcrumb-agile mt-4">
        <div class="container">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="/">Home</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page"> Products</li>
            </ol>
        </div>
    </div>

    <section class="login py-5">
        <div class="container">
            <div class="row">
                @foreach( $products as $product )
                    <div class="col-lg-12">
                        <a href="/{{ $token }}/product/{{ str_replace(' ', '-', $product->name) }}">
                            <div class="card">
                                <img src="{{ asset('products/' . $product->avatar_first) }}" alt="" width="100%">
                                <h1>{{ $product->name }}</h1>
                                <p class="price">₱{{ number_format( $product->price, 2, '.', '' ) }}</p>
                                <p class="desc">{{ $product->description }}</p>
                                <p><button>Buy Now</button></p>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

@endsection
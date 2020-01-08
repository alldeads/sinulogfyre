@extends('layouts.app')

@section('content')
    
    <!-- page details -->
    <div class="breadcrumb-agile mt-4">
        <div class="container">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="/">Home</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page"> Beginner's Guide</li>
            </ol>
        </div>
    </div>

    <section class="wthree-row" id="about">
        <div class="container py-lg-5">
            <div class="row" style="text-align: center;" align="center">
                {{-- <div class="col-lg-12 col-sm-6 about-right mt-lg-0 mt-4">
                    <iframe width="100%" height="500" src="https://www.youtube.com/embed/0cyTYysc6Bs" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                </div> --}}

                <style type="text/css">
                    p {
                        text-align: center;
                    }
                </style>

                

                <div class="col-lg-12 col-sm-6 about-right mt-lg-0 mt-4">
                    <h2> PROMOTER GUIDE:</h2><br><br>

                    <h3> How to Earn?</h3><br>

                    <p> Sell physical tickets or sell online using your own website that we provide to you. You can also earn by becoming a Promoter Manager by recruiting a team of promoters to sell for you. Just contact the organizer in-charge.</p><br><br>

                    <h3> How Much are the Commissions?</h3><br>

                    <p> For every ticket sold you earn 10% from every ticket sold and can be seen when you login to your account. You also earn an overriding bonus of 5% from the sales of the team under you.</p><br></br>

                    <h3> How Do I Sell?</h3><br>

                    <p> Aside from selling physical tickets, just login to your account with your email address & the password we provide. You can find the "TICKET LINK", just copy the link and send to your friends. </p><br><br>

                    <h3> How to Promote? </h3><br>

                    <p> Just post pictures of the event on social media, add a nice & inviting caption ending with "PM ME or buy here: <insert your ticket link>".</p><br><br>

                    <h3> How do my Customers Pay using the link? </h3><br>

                    <p> When they click the link, they choose the ticket they need and they will be provided with payment options such as: PAYPAL, PALAWAN, GCASH, PAYPAL (CREDIT/DEBIT CARD).</p>
                </div>

                {{-- <div class="col-lg-12 col-sm-6 about-right mt-lg-0 mt-4">
                    <img src="{{ asset("images/oppor.jpeg") }}" class="img-fluid" alt="" />
                </div> --}}
            </div>
        </div>
    </section>

@endsection
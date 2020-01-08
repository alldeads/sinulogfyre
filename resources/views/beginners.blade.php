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
                    <h2> FREQUENTLY ASKED QUESTIONS</h2><br><br>

                    <h3> How Much Is the Package?</h3><br>

                    <p> Our Package is <span style="color: #c21212;">P1,500</span> inclusive of one product of your choice. After purchase, you will have <span style="color: #c21212;">full access</span> to our discounts, training videos, your referral link with video presentation to grow your sales team, and your product link to start your drop shipping business!</p><br><br>

                    <h3> How Do I Pay / Activate Account?</h3><br>

                    <p> After registering click the "Pay Now" function & <span style="color: #c21212;">click any of the payment options</span> available. Your account will be activated within 24 to 48 hours. Your product will be shipped within the Philippines in 1 to 7 days.</p><br></br>

                    <h3> How Do I Start Selling / Drop Shipping?</h3><br>

                    <p> Go to your dashboard and copy your <span style="color: #c21212;">"Product Link"</span> and send to your friends or post on your social media accounts. Include <span style="color: #c21212;">photos and a good caption</span> for better sales results.</p>

                    <p> If a person makes purchase, we ship the product for you! Sales-profit are given after payment.</p><br></br>

                    <h3> How Do I Earn from My Sales Team?</h3><br>

                    <p> For every referral we give you Raffle Entries for the month. For every pairing sale (matching bonus; Left/Right) you earn P200 down your line/team (Safety-nets apply). You also earn percentage of sales from products purchased or sold under your personal team.</p>

                    <p> You can <span style="color: #c21212;">change the position</span> (Left/Right) settings by logging in to your dashboard & click <span style="color: #c21212;">"My Profile"</span>.</p><br></br>

                    <h3> How Do I Grow My Sales Team?</h3><br>

                    <p> You can grow your SALESTEAM by referring new members through referring them directly or through your <span style="color: #c21212;">"referral link"</span> on found on your account dashboard.</p><br></br>

                    <h3> How Does the Daily Raffle Rewards Work?</h3><br>

                    <p> Claim raffle entries by logging in everyday (Refresh at 12:00 PH Time) Our raffle draw is done after the end of every month, with multiple winners getting prizes such as: <span style="color: #c21212;">TRAVEL PACKAGES, GADGETS, MOBILE PHONES & MORE!</span></p><br></br>

                    <h3> How to Withdraw Commissions?</h3><br>

                    <p> Log-in to your account & click <span style="color: #c21212;">"Encashment"</span> and choose the options available (charges will apply). Our cut-off for encashment requests are every Saturday, and will be paid 1 to 10 days after depending on volume of requests.</p>

                    <p> Due to the high volume of requests our minimum withdrawal amount is P2,000. </span></p><br></br>

                    <h3> What are the Company Safety-nets?</h3><br>

                    <p> Our vision for the company is to benefit not just our business, but all our distributors, drop shippers, and product users for the long term. In this regard, not only have we given great benefits with a great system, we have applied safety-measures to assure our long term goals.</p>

                    <ol>
                        <li> The 1st Pair/Match Bonus = P 0.00 </li>
                        <li> Every 5th Pair/Match Bonus = 100 Raffle Entries </li>
                        <li> Maximum Monthly Pair/Match Bonus = P60,000 </li>
                        <li> 10% Encashment Process Fee + Remittance Charges</li>
                    </ol>
                </div>

                {{-- <div class="col-lg-12 col-sm-6 about-right mt-lg-0 mt-4">
                    <img src="{{ asset("images/oppor.jpeg") }}" class="img-fluid" alt="" />
                </div> --}}
            </div>
        </div>
    </section>

@endsection
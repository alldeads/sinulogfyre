@extends('layouts.dashboard')

@section("content")

    <div class="row">
        <div class="col-lg-3 col-md-6">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-3">
                            <i class="fa fa-money fa-4x"></i>
                        </div>
                        <div class="col-xs-9 text-right">
                           <h2>1</h2>
                            <div>Available Cash</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6">
            <div class="panel panel-red">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-3">
                            <i class="fa fa-gift fa-4x"></i>
                        </div>
                        <div class="col-xs-9 text-right">
                           <h2>1</h2>
                            <div>Raffle Ticket</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6">
            <div class="panel panel-red">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-3">
                            <i class="fa fa-user-plus fa-4x"></i>
                        </div>
                        <div class="col-xs-9 text-right">
                           <h2>1</h2>
                            <div>Total Pairs</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6">
            <div class="panel panel-red">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-3">
                            <i class="fa fa-users fa-4x"></i>
                        </div>
                        <div class="col-xs-9 text-right">
                           <h2>1</h2>
                            <div>Direct Recruits</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-3">
                            <i class="fa fa-money fa-4x"></i>
                        </div>
                        <div class="col-xs-9 text-right">
                            <h2>1</h2>
                            <div>Pending Cash</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6">
            <div class="panel panel-yellow">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-3">
                            <i class="fa fa-sitemap fa-4x"></i>
                        </div>
                        <div class="col-xs-9 text-right">
                            <h2>1</h2>
                            <div> Left Downlines</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6">
            <div class="panel panel-yellow">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-3">
                            <i class="fa fa-sitemap fa-4x"></i>
                        </div>
                        <div class="col-xs-9 text-right">
                            <h2>1</h2>
                            <div> Right Downlines</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6">
            <div class="panel panel-green">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-3">
                            <i class="fa fa-user-o fa-4x"></i>
                        </div>
                        <div class="col-xs-9 text-right">
                           <h2>1</h2>
                            <div> Inactive Downlines</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- @include("dashboard.summary") --}}
@endsection

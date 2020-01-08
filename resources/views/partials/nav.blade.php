<!-- Navigation -->
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        {{-- <a class="navbar-brand" href="summary"><img src="{{ asset('images/cashcoin-black.jpg')}}" width="120" ></a> --}}
    </div>
    <!-- Top Menu Items -->
    <ul class="nav navbar-right top-nav">
        <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i>&nbsp;&nbsp;{{ auth()->user()->email }} <b class="caret"></b></a>
            <ul class="dropdown-menu">
                <li>
                    <a href="/dashboard/profile"><i class="fa fa-fw fa-user"></i> My Profile</a>
                </li>
                {{-- <li>
                    <a href="#"><i class="fa fa-fw fa-bank"></i> My Bank</a>
                </li>
                <li>
                    <a href="#"><i class="fa fa-fw fa-key"></i> Change Password</a>
                </li> --}}
                <li class="divider"></li>
                <li>
                    <a href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                        </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </li>
            </ul>
        </li>
    </ul>            
    <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
     <div class="collapse navbar-collapse navbar-ex1-collapse">
        <ul class="nav navbar-nav side-nav">
             <li class="active">
                <div style="text-align: center;">
                    <a href="myphoto"><img src="{{ asset('images/logo.png') }}" class="user-image img-responsive" width="150"/></a>       
                </div>                     
            </li>

            <li class="active">
                <a href="/home"><i class="fa fa-fw fa-dashboard"></i> Dashboard</a>
            </li>

            <li>
                <a href="/sales"><i class="fa fa-fw fa-money"></i> Sales Report</a>
            </li>   
            {{-- <li>
                <a href="javascript:;" data-toggle="collapse" data-target="#demo9"><i class="fa fa-fw fa-sitemap"></i> Network <span class="label label-danger pull-right">{{ count( $left_downlines ) + count( $right_downlines ) }}</span></a>
                <ul id="demo9" class="collapse">                         
                    <li>
                        <a href="/dashboard/downlines">List</a>
                        <a href="/dashboard/inactive/downlines">Inactive Invites</a>
                    </li>                                                                 
                </ul>
            </li>      --}}

               {{-- <li>
                <a href="javascript:;" data-toggle="collapse" data-target="#demo8"><i class="fa fa-fw fa-user"></i> Accounts</a>
                <ul id="demo8" class="collapse">                         
                    <li>
                        <a href="../register" target="_new">New Chick Account</a>
                        <a href="addaccount">Add Chick Account</a>
                    </li>
                </ul>
            </li>               
            <li>
                <a href="javascript:;" data-toggle="collapse" data-target="#demo9"><i class="fa fa-fw fa-sitemap"></i> Network</a>
                <ul id="demo9" class="collapse">                         
                    <li>
                        <a href="mynetwork">List</a>
                        <a href="inactive">Inactive Invites</a>
                    </li>                                                                 
                </ul>
            </li>        

             <li>
                <a href="javascript:;" data-toggle="collapse" data-target="#demo7"><i class="fa fa-fw fa-gear"></i> Codes</a>
                <ul id="demo7" class="collapse">                         
                    <li>
                        <a href="buycodes">Buy Code</a>
                        <a href="mycodes">My Codes</a>
                        <a href="transfermulti">Transfer Codes</a>
                        <a href="transferlogs">Transfer Logs</a>
                        <a href="codesused">Used Codes</a>
                    </li>                   
                </ul>
            </li>   
            <li>
                <a href="javascript:;" data-toggle="collapse" data-target="#demo4"><i class="fa fa-money fa-key"></i> Transactions</a>
                <ul id="demo4" class="collapse">
                    <li>
                        <a href="mywallet">Income History</a>                                
                        <a href="encash">Encash Wallet</a>
                        <a href="history">Encashment History</a>      
                        <a href="fund">Encash Maturity</a>
                        <a href="fhistory">Maturity History</a> 
                        <a href="psitems">Personal Sales Items</a>   
                        <a href="pshistory">Personal Sales History</a>         
                    </li>
                </ul>
            </li>                 --}}                                         
            
        </ul>
    </div>
    <!-- /.navbar-collapse -->
</nav>
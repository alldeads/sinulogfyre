<!-- //header -->
<header class="py-sm-3 pt-3 pb-2" id="home">
    <div class="container">
        <!-- nav -->
        <div class="top d-md-flex">
            <div class="logo">
                <img src="{{ asset('images/logo.png') }}" class="img-responsive" width="140">
            </div>
            <div class="search-form mx-md-auto">
            <div>&nbsp;</div>
            </div>

            @auth
                <div class="forms mt-md-0 mt-2">
                    <a href="/home" class="btn"><span class="fa fa-user-circle-o"></span>Home</a>
                </div>

            @else 

                <div class="forms mt-md-0 mt-2">
                    <a href="/login" class="btn"><span class="fa fa-user-circle-o"></span>Sign In</a>
                </div>
            @endauth
        </div>
        <nav class="text-center">
            <label for="drop" class="toggle"><span class="fa fa-bars"></span></label>
            <input type="checkbox" id="drop" />
            <ul class="menu">
                <li class="mr-lg-4 mr-2"><a href="/">Home</a></li>
                <li class="mr-lg-4 mr-2"><a href="/beginners_guide">Beginners Guide</a></li>
                <li class=""><a href="#">Contact Us</a></li>
            </ul>
        </nav>
        <!-- //nav -->
    </div>
</header><!-- //header -->
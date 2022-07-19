<header>
    <div class="offcanvas offcanvas-top" tabindex="-1" id="offcanvasTop">
        <div class="offcanvas-header">
            <div class="logo"><a href="{{route('index')}}"><img src="{{asset('uploads/'.$site_setting->headerlogo)}}" alt="" /></a></div>
            <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
            <div class="main-nav">
                <ul>
                    <li <?php echo (request()->routeIs('index')) ? 'class="active"' : ''; ?>><a href="{{route('index')}}">Home</a></li>
                    <li <?php echo (request()->routeIs('features')) ? 'class="active"' : ''; ?>><a href="{{route('features')}}">Features</a></li>
                    <li <?php echo (request()->routeIs('howitworks')) ? 'class="active"' : ''; ?>><a href="{{route('howitworks')}}">How it works</a></li>
                    <li <?php echo (request()->routeIs('pricing')) ? 'class="active"' : ''; ?>><a href="{{route('pricing')}}">Pricing</a></li>
                    <li <?php echo (request()->routeIs('contactus')) ? 'class="active"' : ''; ?>><a href="{{route('contactus')}}">Contact us</a></li>
                </ul>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="header-container">
            <div class="logo"><a href="{{route('index')}}"><img src="{{asset('uploads/'.$site_setting->headerlogo)}}" alt="" /></a></div>
            <div class="desktop-nav main-nav">
                <ul>
                    <li <?php echo (request()->routeIs('index')) ? 'class="active"' : ''; ?>><a href="{{route('index')}}">Home</a></li>
                    <li <?php echo (request()->routeIs('features')) ? 'class="active"' : ''; ?>><a href="{{route('features')}}">Features</a></li>
                    <li <?php echo (request()->routeIs('howitworks')) ? 'class="active"' : ''; ?>><a href="{{route('howitworks')}}">How it works</a></li>
                    <li <?php echo (request()->routeIs('pricing')) ? 'class="active"' : ''; ?>><a href="{{route('pricing')}}">Pricing</a></li>
                    <li <?php echo (request()->routeIs('contactus')) ? 'class="active"' : ''; ?>><a href="{{route('contactus')}}">Contact us</a></li>
                </ul>

            </div>
            <div class="main-header-right">
                <a href="{{route('cart.list')}}" class="cart">
                    <?php if (\Cart::getTotalQuantity() > 0) {  ?>
                        <span class="cart-has-item"></span>
                    <?php } ?>
                    <i class="fal fa-shopping-cart"></i>
                    MY CART
                </a>
                @auth('customer')
                <div class="dropdown">
                    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                        {{auth()->guard('customer')->user()->name}}
                        <i class="far fa-chevron-down"></i>
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                        <li><a class="dropdown-item" href="{{route('myaccount')}}">My Account</a></li>
                        <li><a class="dropdown-item support-item" href="{{route('support')}}">Support <span></span></a></li>
                        <li><a class="dropdown-item" href="{{route('myaccount.orders')}}">Billing</a></li>
                        <li><a class="dropdown-item logout-items" href="{{route('logout')}}">Logout</a></li>
                    </ul>
                    <div class="shortname">
                        <?php
                        $shorts = explode(" ", auth()->guard('customer')->user()->name);
                        $name = mb_substr($shorts[0], 0, 1);
                        if (!empty($shorts[1]))
                            $name = $name . " " . mb_substr($shorts[1], 0, 1);
                        ?>
                        <span><?php echo strtoupper($name); ?></span>
                    </div>
                </div>

                @endauth

                @guest('customer')
                <a href="#" class="login" data-bs-toggle="modal" data-bs-target="#loginModel">
                    <i class="fal fa-user"></i>
                    Login
                </a>
                @endunless
                <a href="https://app.delet.com/" target="_blank" class="login btn-blue app-login">
                    <i class="fa fa-mobile" aria-hidden="true"></i>
                    App Login
                </a>
            </div>
        </div>
        <div class="menu-toggle">
            <button class="btn btn-primary" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasTop" aria-controls="offcanvasTop"></button>
        </div>
    </div>
</header>

@include('models.models')
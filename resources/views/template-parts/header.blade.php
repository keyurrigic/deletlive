<header>
    <!-- <div class="small-header">
        <div class="container">
            <div class="d-flex justify-content-between align-items-center">
                <div class="small-header-left  d-flex align-items-center">
                    <a href="tel:310-926-7313" class="tel d-flex align-items-center"><svg
                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" height="16" width="16">
                            <path d="M493.4 24.6l-104-24c-11.3-2.6-22.9 3.3-27.5 13.9l-48 112c-4.2 9.8-1.4 21.3 6.9
                                28l60.6 49.6c-36 76.7-98.9 140.5-177.2 177.2l-49.6-60.6c-6.8-8.3-18.2-11.1-28-6.9l-112
                                48C3.9 366.5-2 378.1.6 389.4l24 104C27.1 504.2 36.7 512 48 512c256.1 0 464-207.5 464-464
                                0-11.2-7.7-20.9-18.6-23.4z" fill="#5271FF" />
                        </svg> {{$contact_details->telephone}}</a>
                    <a href="mailto:{{$contact_details->email}}" class="mail d-flex align-items-center"><svg
                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" height="16" width="16">
                            <path d="M502.3 190.8c3.9-3.1 9.7-.2 9.7 4.7V400c0 26.5-21.5 48-48 48H48c-26.5
                                0-48-21.5-48-48V195.6c0-5 5.7-7.8 9.7-4.7 22.4 17.4 52.1 39.5 154.1 113.6 21.1 15.4 56.7
                                47.8 92.2 47.6 35.7.3 72-32.8 92.3-47.6 102-74.1 131.6-96.3 154-113.7zM256 320c23.2.4
                                56.6-29.2 73.4-41.4 132.7-96.3 142.8-104.7 173.4-128.7 5.8-4.5 9.2-11.5
                                9.2-18.9v-19c0-26.5-21.5-48-48-48H48C21.5 64 0 85.5 0 112v19c0 7.4 3.4 14.3 9.2 18.9
                                30.6 23.9 40.7 32.4 173.4 128.7 16.8 12.2 50.2 41.8 73.4 41.4z" fill="#5271FF" />
                        </svg>{{$contact_details->email}}</a>
                </div>
                <div class="small-header-right d-flex align-items-center">
                   
                    <a href="{{route('cart.list')}}" class="cart">
                        <span class="cart-has-item"></span>
                        <i class="fal fa-shopping-cart"></i>
                        MY CART
                    </a>
                    @auth('customer')
                    <div class="dropdown">
                        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            {{auth()->guard('customer')->user()->name}}
                            <i class="far fa-chevron-down"></i>
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                            <li><a class="dropdown-item" href="{{route('myaccount')}}">My Account</a></li>
                            <li><a class="dropdown-item" href="{{route('support')}}">Support</a></li>
                            <li><a class="dropdown-item" href="{{route('myaccount.orders')}}">Billing</a></li>
                            <li><a class="dropdown-item" href="{{route('logout')}}">Logout</a></li>
                        </ul>
                    </div>
                    <div class="shortname">
                        <?php
                        /*$shorts = explode(" ", auth()->guard('customer')->user()->name);
                        $name = mb_substr($shorts[0], 0, 1);
                        if (!empty($shorts[1]))
                            $name = $name . " " . mb_substr($shorts[1], 0, 1);*/
                        ?>
                        <span><?php //echo strtoupper($name); 
                                ?></span>
                    </div>
                    @endauth
                    
                    @guest('customer')
                    <a href="#" class="login" data-bs-toggle="modal"
                        data-bs-target="#loginModel">
                        <i class="fal fa-user"></i>
                        Login
                    </a>
                    @endunless                   
                    
                    

                </div>
            </div>
        </div>
    </div> -->
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
                    <?php if(\Cart::getTotalQuantity() > 0) {  ?>
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
            </div>
        </div>
        <div class="menu-toggle">
            <button class="btn btn-primary" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasTop" aria-controls="offcanvasTop"></button>
        </div>
    </div>
</header>

@include('models.models')
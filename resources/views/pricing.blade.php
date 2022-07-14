@extends('main')
@section('content')
<!--- Banner -->
<div class="inner-banner">
    <div class="container">
        <div class="inner-banner-container">
            <div class="banner-image"><img src="{{url('assets/images/banner-pricing.svg')}}" alt="" /></div>
            <h1>Pricing</h1>
        </div>
    </div>
</div>
<!--- Banner -->
<!--- Middle -->
<div id="middle">
    <section class="pricing-data-section">
        <div class="pricing-top">
            <div class="container">
                <div class="row justify-content-md-center align-items-end">
                    <?php $cnt = 1; ?>
                    <?php foreach ($products as $product) { ?>
                        <?php /*if($product->frquency == "Yearly") { ?>
                                <div class="col-md-6 col-lg-4">
                                    <div class="pricing-table agency">
                                        <div class="pricing-table-head">
                                            <h2>Agency</h2>
                                        </div>
                                        <div class="pricing-table-body">
                                            <p class="perkites"><span class="color-blue">Price per 10 kits /</span> year</p>
                                            <div class="price"><sup>$</sup>17,880</div>
                                            <span>10 kits minimum order</span>
                                            <span>Yearly payment</span>
                                            <span>User <span class="color-blue">keeps</span> the hardware</span>
                                            <span><span class="color-blue">No deposit</span> required</span>
                                            <form action="{{ route('cart.store') }}" method="POST" enctype="multipart/form-data">
                                                @csrf
                                                <input type="hidden" value="{{ $product->id }}" name="id">
                                                <input type="hidden" value="{{ $product->title }}" name="name">
                                                <input type="hidden" value="{{ $product->price }}" name="price">
                                                <input type="hidden" value="{{ $product->mimumqty }}" name="quantity">
                                                <input type="hidden" value="{{ $product->softwareprice }}" name="softwareprice">
                                                <input type="hidden" value="{{ $product->deposite }}" name="deposite">
                                                <button class="btn-blue d-inline-block">ORDER NOW</button>
                                            </form>
                                            <!--button class="btn-blue d-inline-block">ORDER NOW</button-->
                                        </div>
                                    </div>
                                </div>
                            <?php } else { ?>
                                <div class="col-md-6 col-lg-4">
                                    <div class="pricing-table individual">
                                        <div class="pricing-table-head">
                                            <h2>Individual</h2>
                                        </div>
                                        <div class="pricing-table-body">
                                            <p class="perkites"><span class="color-blue">Price per kit / month</p>
                                            <div class="price"><sup>$</sup>149</div>
                                            <span>Perfect for 1-9 kits</span>
                                            <span>Monthly payment</span>
                                            <span>User returns the hardware</span>
                                            <span>$500 deposit per kit</span>
                                            <span>Deposit is returned when hardware is returned</span>
                                            <form action="{{ route('cart.store') }}" method="POST" enctype="multipart/form-data">
                                                @csrf
                                                <input type="hidden" value="{{ $product->id }}" name="id">
                                                <input type="hidden" value="{{ $product->title }}" name="name">
                                                <input type="hidden" value="{{ $product->price }}" name="price">
                                                <input type="hidden" value="{{ $product->mimumqty }}" name="quantity">
                                                <input type="hidden" value="{{ $product->softwareprice }}" name="softwareprice">
                                                <input type="hidden" value="{{ $product->deposite }}" name="deposite">
                                                <button class="btn-blue d-inline-block">ORDER NOW</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            <?php } */ ?>
                        <div class="col-md-6 col-lg-4">
                            <div class="pricing-table agency main-pricing-table-<?php echo $cnt; ?>">
                                <div class="pricing-table-head pricing-table-<?php echo $cnt; ?>">
                                    <h2>{{$product->subtitle}}</h2>
                                </div>
                                <div class="pricing-table-body">
                                    <div class="price"><sup>$</sup>{{$product->price}}<sup class="color-blue montly-sup">/<?php if ($product->frquency == "Monthly") echo "month"; ?></sup></div>
                                    <?php if ($cnt == 3) { ?>
                                        <span class="hardware-inc">COMPLETE KIT INCLUDED</span>
                                    <?php } else { ?>
                                        <span class="hardware-inc">HARDWARE INCLUDED</span>
                                    <?php } ?>
                                    <span class="color-blue"> {!!$product->hardware_included!!}</span>
                                    <hr style="width:100%;text-align:left;margin-left:0">
                                    <div class="list-features">
                                        {!!$product->description!!}
                                    </div>
                                    <form action="{{ route('cart.store') }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <input type="hidden" value="{{ $product->id }}" name="id">
                                        <input type="hidden" value="{{ $product->title }}" name="name">
                                        <input type="hidden" value="{{ $product->subtitle }}" name="subtitle">
                                        <input type="hidden" value="{{ $product->price }}" name="price">
                                        <input type="hidden" value="{{ $product->mimumqty }}" name="quantity">
                                        <input type="hidden" value="{{ $product->softwareprice }}" name="softwareprice">
                                        <input type="hidden" value="{{ $product->deposite }}" name="deposite">
                                        <button class="btn-blue d-inline-block">ADD TO CART</button>
                                    </form>
                                    <!--button class="btn-blue d-inline-block">ORDER NOW</button-->
                                </div>
                            </div>
                        </div>
                    <?php $cnt++;
                    } ?>
                </div>
            </div>
        </div>

        <div class="pricing-bottom">
            <div class="container">
                <h3>What does the system kit contain?</h3>
                <p>The system kit includes one Delet communication monitor, three Delet surveillance cameras and one Delet smart lock that will easily attach to your current lock and does not require any additional installation.</p>
            </div>
            <div class="kit-image"><img src="{{url('assets/images/system-kit-updated.svg')}}" alt="" class="" />
                <img src="{{url('assets/images/system-kit-mobile.svg')}}" alt="" class="d-none" />
            </div>
        </div>
    </section>
	@include('template-parts.common')
    <!--section class="column-box-row">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <h4>500% more showings</h4>
                    <p>Our current approximation when using the Delet software is 450%-550% more property showings.
                        Delet’s system is here to ensure a quick and easy turnaround when it comes to apartment tours.
                        Imagine your agency’s abilities if you no longer require travel to give a showing to a
                        prospective client.</p>
                </div>
                <div class="col-md-6">
                    <h4>Higher conversion rate</h4>
                    <p>Prospective tenants tend to feel more comfortable in their decision to move forward with their
                        lease when there is no agent present. Delet alleviates the pressure for your client and offers a
                        more enjoyable and relaxed showing.</p>
                </div>
            </div>
        </div>
    </section-->
    <section class="inner-bottom-image"><img src="{{url('assets/images/bottom-image-pricing.svg')}}" alt="" /></section>
    <!--section class="cta-section">
        <div class="container large-container w-100">
            <p>We offer a money-back guarantee if you choose to opt out of the Delet systems. You may request a refund
                or credit of your service charges and system kits. This guarantee applies to all accounts, commercial
                and residential, and in all 50 states.</p>
            <div class="btn-box"><a href="{{route('contactus')}}" class="btn-blue">order your kits now</a></div>
        </div>
    </section-->
	  
	@include('template-parts.tryit')
</div>
<!--- /Middle -->

@endsection
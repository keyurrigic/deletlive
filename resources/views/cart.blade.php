@extends('main')
@section('content')

<div class="main-container">
    <!--- Banner -->
    <div class="inner-banner">
        <div class="container">
            <div class="inner-banner-container">
                <div class="banner-image"><img src="{{url('assets/images/cart-illustration.svg')}}" alt="" /></div>
                <h1>Cart</h1>
            </div>
        </div>
    </div>
    <!--- Banner -->
    <div class="clearfix"></div>
    <div class="cart-empty" style="<?php echo ($cartItems->count()!=0) ? 'display:none' : ''; ?>">
        <div class="container">
            <div class="cart-empty-inner text-center">
                <img src="{{url('assets/images/empty-cart.svg')}}" alt="" width="244" height="343" />

                <h2 class="h1">Your cart is empty</h2>

                <a href="{{route('pricing')}}" class="btn-blue">order kits now</a>
            </div>

        </div>
    </div>
    <div class="clearfix"></div>
    <div class="cart-list" style="<?php echo ($cartItems->count()==0) ? 'display:none' : ''; ?>">
        <div class="container">
            <div class="tab-content" id="nav-tabContent">
                <div class="tab-pane fade show active">
                    <div class="table-responsive">
                        <i class="fa fa-refresh fa-spin loader-spin" style="display:none;"></i>
                        <div id="updatecartcontent">
                            <table id="updatetable" class="table">
                                <thead>
                                    <tr>
                                        <th width="232">ITEM</th>
                                        <th width="220">PRICE PER PACKAGE/MONTH</th>
                                        <th width="160">NUMBER OF KITS</th>
                                        <th width="80">TOTAL</th>
                                        <th width="50">&nbsp;</th>
                                    </tr>
                                </thead>
                                <?php //echo "<pre>";print_r($cartItems);die; ?>
                                <tbody>

                                    <form id="frmcart" name="updatecart" action="{{ route('cart.update') }}" method="post">
                                            @foreach ($cartItems as $item)
                                            <tr>
                                                <td colspan="5">
                                                    <div class="t-cell">
                                                        <table class="table">
                                                            <tr>
                                                                <td width="232">{{ $item->name }}</td>
                                                                <td width="220" class="individual-price" id="individual-price-<?php echo $item->attributes->subtitle; ?>"> ${{ $item->price }}</td>
                                                                <td width="160">
                                                                    <div class="input-group input-group-number">
                                                                        <span class="input-group-btn">
                                                                            <button type="button" class="cart-qty btn btn-default btn-number" data-item="{{ $item->attributes->subtitle }}" data-type="minus" data-field="qty_{{ $item->id }}" data-id="{{$item->id}}">
                                                                                <i class="far fa-minus"></i>
                                                                            </button>
                                                                        </span>
                                                                        <input type="text" id="qty_{{ $item->id }}" name="qty[{{ $item->id }}]" class="form-control input-number updateqtytxt" value="{{ $item->quantity }}"  data-item="{{ $item->attributes->subtitle }}" data-price="{{  $item->price }}" max="30" >
                                                                        <span class="input-group-btn">
                                                                            <button type="button" class="cart-qty btn btn-default btn-number" data-item="{{ $item->attributes->subtitle }}" data-type="plus" data-field="qty_{{ $item->id }}" data-id="{{$item->id}}">
                                                                                <i class="far fa-plus"></i>
                                                                            </button>
                                                                        </span>
                                                                    </div>
                                                                </td>
                                                                <td width="80" class="individual-total" id="individual-total-<?php echo $item->attributes->subtitle; ?>">${{ ($item->price*$item->quantity) }}
                                                                </td>
                                                                <input type="hidden" id="individual-total-<?php echo $item->attributes->subtitle; ?>-hidden" value="{{ ($item->price*$item->quantity) }}"/>
                                                                <td width="50">
                                                                    <a href="javascript:void(0);"  class="removepackage" data-bs-toggle="modal" data-cartid="{{ $item->id }}" data-title="{{ $item->attributes->subtitle }}" data-bs-target="#removepackagemodal"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
                                                                </td>
                                                            </tr>
                                                        </table>
                                                    </div>
                                                </td>
                                            </tr>
                                            @endforeach
                                    </form>
                                    
                                    <tr>
                                        <td colspan="5">
                                            <div class="t-cell">
                                                <table class="table">
                                                    <tr>
                                                        <td Colspan="4" width="950">Access to the Delet state-of-the-art CRM,for multiple users</td>
                                                        <td>INCLUDED</td>
                                                    </tr>
                                                </table>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="5">
                                            <div class="t-cell">
                                                <table class="table">
                                                    <tr>
                                                        <td Colspan="4" width="950">Shipping</td>
                                                        <td>INCLUDED</td>
                                                    </tr>
                                                </table>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="5">
                                            <div class="t-cell activate-discount-cell">
                                                <table class="table">
                                                    <tr>
                                                        <td Colspan="4"><button onclick="window.location.href='{{  route('pricing'); }}'" class="activate-discount">CONTINUE SHOPPING</button><span>Need other products? Browse more...</span></td>
                                                    </tr>
                                                </table>
                                            </div>
                                        </td>
                                    </tr>
                                    
                                        <tr>
                                            <td colspan="5">
                                                <div class="t-cell total">
                                                    <table class="table">
                                                        <tr>
                                                            <td colspan="4">
                                                                <img src="{{url('assets/images/table-logo.png')}}">
                                                            </td>
                                                            <td width="400">
                                                                <div class="total-wrapper">
                                                                <form name="frmcouponcode" method="post" id="frmcouponcode">
                                                                    <div class="total-amount">
                                                                        <p>TOTAL</p>
                                                                        <p class="all-total">${{ Cart::getTotal() }}</p>
                                                                    </div>
                                                                    <div class="discount-wrapper">
                                                                        <p>have a discount code?</p>
                                                                        <input type="text" name="couponcode" id="couponcode" required>
                                                                        
                                                                        <button class="activate-discount coupon-code" id="activatediscount" style="opacity:0.5">Activate Discount</button>
                                                                        <input type="hidden" name="coupon-discount" id="coupon-discount" value=""/>
                                                                    </div>
                                                                    </form>
                                                                    <div class="activatecoupon"></div>
                                                                    <div>
                                                                        @auth('customer')
                                                                        <button type="button" class="btn-blue total-btn" data-bs-toggle="modal" data-bs-target="#paymentmodal">pay
                                                                            now
                                                                            ${{ Cart::getTotal() }}</button>
                                                                        @endauth
                                                                        @guest('customer')
                                                                        <button class="btn-blue total-btn" data-bs-toggle="modal" data-bs-target="#loginModel">pay
                                                                            now
                                                                            ${{ Cart::getTotal() }}</button>
                                                                        @endunless
                                                                    </div>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </div>
                                            </td>
                                        </tr>
                                    
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="removepackagemodal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <form role="form" action="{{ route('stripe.post') }}" method="post" class="require-validation" data-cc-on-file="false" data-stripe-publishable-key="{{ env('STRIPE_KEY') }}" id="payment-form">
        @csrf
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Remove Product</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <span class="payment-errors"></span>
                    <div class="row">
                        <p> You are about to remove "<span class="selectpackage"></span>" from your shopping cart.</p>
                    </div>
                </div>
                <div class="modal-footer">
				<button type="button" class="activate-discount" data-bs-dismiss="modal" aria-label="Close">Close</button>
                    <button type="button" id="btnremoveproduct" class="btn-blue">REMOVE PRODUCT</button>
                </div>
            </div>
        </div>
    </form>
</div>


<div class="modal fade" id="paymentmodal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <form role="form" action="{{ route('stripe.post') }}" method="post" class="require-validation" data-cc-on-file="false" data-stripe-publishable-key="{{ env('STRIPE_KEY') }}" id="payment-form">
        @csrf
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Payment</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <span class="payment-errors"></span>
                    <div class="form-group required">
                        <label for="nameCard" class="form-label">NAME ON CARD</label>
                        <input type="text" name="fullname" class="form-control" id="nameCard" placeholder="" value="Keyur Patel" required>
                    </div>
                    <div class="form-group required">
                        <label for="cardNumber" class="form-label">CARD NUMBER</label>
                        <input type="text" name="email" class="form-control card-number" id="cardNumber" placeholder="" autocomplete='off' size='20' value="" required>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group required">
                                <label for="expiry" class="form-label">MONTH</label>
                                <input type="text" name="password" class="form-control mb-0 card-expiry-month" id="expiry_month" placeholder="MM" size='2' value="" required>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group required">
                                <label for="expiry" class="form-label">YEAR</label>
                                <input type="text" name="password" class="form-control mb-0 card-expiry-year" id="expiry_year" placeholder="YYYY" size='4' value="" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group required">
                                <label for="cvv" class="form-label">CVV</label>
                                <input type="text" name="confirmpassword" class="form-control mb-0 card-cvc" id="cvv" placeholder="" size='4' value="" required>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" id="btnsubmitpayment" class="btn-blue w-100">PAY NOW</button>
                </div>
            </div>
        </div>
    </form>
</div>


<div class="modal fade" id="paymentThankyou" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Payment received</h5>
                <button type="button" class="btn-close redirecttoorder" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <h6 class="follow-instruction">Thank you for your payment. We have sent you the invoice via email.</h6>
            </div>
            <div class="modal-footer bg-none">
                <button type="button" class="btn-blue ms-auto redirecttoorder">OK</button>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript" src="https://js.stripe.com/v2/"></script>
<script type="text/javascript">
    $(function() {
        var removeitemid=0;
        function stripeResponseHandler(status, response) {
            if (response.error) {
                // re-enable the submit button
                $("#btnsubmitpayment").removeAttr("disabled");
                $("#btnsubmitpayment").html('PAY NOW');
                // show the errors on the form
                $(".payment-errors").html(response.error.message);
            } else {
                var form$ = $("#payment-form");
                // token contains id, last4, and card type
                var token = response['id'];
                // insert the token into the form so it gets submitted to the server
                form$.append("<input type='hidden' id='stripeToken' name='stripeToken' value='" + token + "' />");
                // and submit
                //form$.get(0).submit();
                //ajax Call Here 
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    url: ajaxCallURL + '/stripe',
                    method: "POST",
                    data: {
                        stripeToken: $("#stripeToken").val()
                    },
                    dataType: "json",
                    headers: {
                        Accept: "application/json",
                    },
                    statusCode: {
                        422: function(responseObject, textStatus, jqXHR) {
                            console.log('object', responseObject.responseJSON.message);
                            $(".payment-errors").html(responseObject.responseJSON.message);
                            $("#btnsubmitpayment").html('PAY NOW');
                            $("#btnsubmitpayment").prop('disabled', false);
                        },
                        200: function(responseObject, textStatus, jqXHR) {
                            // console.log('object', responseObject.responseJSON.message);
                            $('#paymentmodal').modal('hide');
                            $('#paymentThankyou').modal('show');
                        },
                    },
                });
            }
        }

        $("#btnsubmitpayment").click(function() {
            //now call ajax here 
            $("#btnsubmitpayment").html('<i class="fa fa-refresh fa-spin"></i>');
            $("#btnsubmitpayment").prop('disabled', true);

            Stripe.setPublishableKey($("#payment-form").data('stripe-publishable-key'));

            Stripe.createToken({
                number: $('#cardNumber').val(),
                cvc: $('#cvv').val(),
                exp_month: $("#expiry_month").val(),
                exp_year: $('#expiry_year').val()
            }, stripeResponseHandler);


        });
        $(".redirecttoorder").click(function() {
            window.location.href = "/my-account/orders";
        });


        //$(".removepackage").click(function() {
        $("#updatecartcontent").on("click",".removepackage",function(){
            var title = $(this).attr('data-title');
            removeitemid = $(this).attr('data-cartid');
            $(".selectpackage").html(title);
        });
        $("#btnremoveproduct").click(function(){
            $("#qty_"+removeitemid).val(0);
            $('#removepackagemodal').modal('hide');
            updateCart();
        });
        function updateCart(){
            var FRMcart = new FormData();
            var cartitemdata="";
            $(".updateqtytxt").each(function(){
                FRMcart.append($(this).attr('name'),$(this).val());
                //cartitemdata+=$(this).attr('name')+"="+$(this).val();
                //cartitemdata+="&";
            });
            FRMcart.append('coupon',$("#couponcode").val());
            //alert(cartitemdata);
            //console.log(FRMcart.serialize());
            //var cartdata=encodeURIComponent(cartitemdata);
           // cartdata+="coupon="+$("#couponcode").val();
           //cartdata=FRMcart.serialize();
            $(".table").css("opacity", 0.6);
            $(".loader-spin").show();
            $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    url: ajaxCallURL + '/update-cart',
                    method: "POST",
                    data: FRMcart,
                    processData: false,
                    contentType: false,
                    dataType: "json",
                    headers: {
                        Accept: "application/json",
                    },
                    statusCode: {
                        422: function(responseObject, textStatus, jqXHR) {
                            console.log('object', responseObject.responseJSON.message);
                            $(".table").css("opacity", 1);
                            $(".loader-spin").hide();
                        },
                        200: function(responseObject, textStatus, jqXHR) {
                            console.log(responseObject);
                            if(responseObject.items==0)
                            {
                                $(".cart-list").hide();
                                $(".cart-empty").show();

                            }else{
                                $("#updatecartcontent").html(responseObject.html);
                                $(".table").css("opacity", 1);
                                $(".loader-spin").hide();
                            }

                        },
                    },
                });

        }
        
        $("#updatecartcontent").on("click","#activatediscount",function(){
            updateCart();
        });

        $("#updatecartcontent").on("change",".updateqtytxt",function(){
            updateCart();
        });
        $("#updatecartcontent").on("click",".cart-qty",function(e) {
            e.preventDefault();
            var field = $(this).attr('data-field');
            var type = $(this).attr('data-type');
            var qty = parseInt($("#" + field).val());
            if (type == "plus"){
                qty += 1;
            }
            else if (type == "minus"){
                if(qty==0)
                    qty=0;
                else
                    qty -= 1;
            }
            $("#"+field).val(qty);
            updateCart();
        });
    });
</script>
@endsection

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
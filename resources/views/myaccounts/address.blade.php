@extends('main')
@section('content')
<div class="main-container">
    <!--- Banner -->
    <div class="inner-banner">
        <div class="container">
            <div class="inner-banner-container">
                <h1>My Account</h1>
            </div>
        </div>
    </div>
    <!--- Banner -->
    <div class="clearfix"></div>
    <div class="myaccount-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="d-flex align-items-start  row">
                        @include('myaccounts.parts.navigation')

                        <div class="tab-content col-md-8" id="v-pills-tabContent">

                            <div class="tab-pane show active" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">

                                <div class="myaccount-card">
                                    <p class="myaccount-label">SHIPPING ADDRESS</p>
                                    <h5>
                                        <?php echo (!empty($customer->shipping->fullname)) ? $customer->shipping->fullname : ''; ?><br />
                                        <?php echo (!empty($customer->shipping->phonenumber)) ? $customer->shipping->phonenumber : ''; ?><br />
                                        <?php echo (!empty($customer->shipping->address1)) ?
                                            $customer->shipping->address1 : ''; ?><br />
                                        <?php echo (!empty($customer->shipping->address2)) ? $customer->shipping->address2 : ''; ?><br />
                                        <?php echo (!empty($customer->shipping->state)) ? $customer->shipping->state : ''; ?>
                                        <?php echo (!empty($customer->shipping->country->name)) ? $customer->shipping->country->name . ',' : ''; ?>
                                        <?php echo (!empty($customer->shipping->postalcode)) ? $customer->shipping->postalcode : ''; ?>
                                    </h5>
                                    <button class="btn-blue" data-bs-toggle="modal" data-bs-target="#change-shippingadd">CHANGE SHIPPING ADDRESS</button>
                                </div>

                                <div class="myaccount-card">
                                    <p class="myaccount-label">BILLING ADDRESS</p>
                                    <label for="sameadd" class="custom-checbox">
                                        <input type="checkbox" id="sameadd" checked>
                                        <span class="check-icon"><i class="fal fa-check"></i></span>
                                        SAME AS SHIPPING ADDRESS
                                    </label>
                                    <h5>
                                        <?php echo (!empty($customer->billing->fullname)) ? $customer->billing->fullname : ''; ?><br />
                                        <?php echo (!empty($customer->billing->phonenumber)) ? $customer->billing->phonenumber : ''; ?><br />
                                        <?php echo (!empty($customer->billing->address1)) ?
                                            $customer->billing->address1 : ''; ?><br />
                                        <?php echo (!empty($customer->billing->address2)) ? $customer->billing->address2 : ''; ?><br />
                                        <?php echo (!empty($customer->billing->state)) ? $customer->billing->state : ''; ?>
                                        <?php echo (!empty($customer->billing->country->name)) ? $customer->billing->country->name . ',' : ''; ?>
                                        <?php echo (!empty($customer->billing->postalcode)) ? $customer->billing->postalcode : ''; ?>
                                    </h5>
                                    <button class="btn-blue" data-bs-toggle="modal" data-bs-target="#change-billingadd">CHANGE BILLING ADDRESS</button>
                                </div>
                            </div>

                        </div>

                    </div>
                </div>

            </div>
        </div>
    </div>
</div>


<div class="modal fade modal-lg-custom" id="change-shippingadd" data-bs-backdrop="static" data-bs-keyboard="false" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <form name="frmshipping" id="frmshipping" method="post">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Change shipping address</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="nameCard" class="form-label">full name or company</label>
                                <input type="text" name="fullname" class="form-control" id="shippingfullname" placeholder="" value="<?php echo (!empty($customer->shipping->fullname)) ? $customer->shipping->fullname : ''; ?>">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="nameCard" class="form-label">phone number</label>
                                <input type="text" name="phonenumber" class="form-control" id="shippingphonenumber" placeholder="" value="<?php echo (!empty($customer->shipping->phonenumber)) ? $customer->shipping->phonenumber : ''; ?>">
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="nameCard" class="form-label">address</label>
                                <input type="text" name="address1" class="form-control" id="shippingaddress1" placeholder="" value="<?php echo (!empty($customer->shipping->address1)) ? $customer->shipping->address1 : ''; ?>">
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="nameCard" class="form-label">address line 2 (optional)</label>
                                <input type="text" name="address2" class="form-control" id="shippingaddress2" placeholder="" value="<?php echo (!empty($customer->shipping->address2)) ? $customer->shipping->address2 : ''; ?>">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="nameCard" class="form-label">country</label>
                                <select name="country" id="shippingcountry" class="select2">
                                    <option value="">Select Country</option>
                                    @foreach ($countries as $country)
                                    <?php if (!empty($customer->shipping->country->id)) { ?>
                                        <option value="{{ $country->id }}" <?php echo ($country->id == $customer->shipping->country->id) ? "selected=''" : ""; ?>>{{ $country->name }}</option>
                                    <?php } else { ?>
                                        <option value="{{ $country->id }}">{{ $country->name }}</option>
                                    <?php } ?>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="nameCard" class="form-label">state / region</label>
                                <input type="text" name="state" class="form-control" id="shippingstate" placeholder="" value="<?php echo (!empty($customer->shipping->state)) ? $customer->shipping->state : ''; ?>">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="nameCard" class="form-label">city</label>
                                <input type="text" name="city" class="form-control" id="shippingcity" placeholder="" value="<?php echo (!empty($customer->shipping->city)) ? $customer->shipping->city : ''; ?>">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="nameCard" class="form-label">postal code</label>
                                <input type="text" name="postalcode" class="form-control" id="shippingpostalcode" value="<?php echo (!empty($customer->shipping->postalcode)) ? $customer->shipping->postalcode : ''; ?>">
                            </div>
                        </div>

                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn-gray" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn-blue" id="btnchangeshipping">SAVE</button>
                </div>
            </div>
        </div>
    </form>
</div>

<div class="modal fade modal-lg-custom" id="change-billingadd" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <form name="frmbilling" id="frmbilling" method="post">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Change billing address</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="nameCard" class="form-label">full name or company</label>
                                <input type="text" name="fullname" class="form-control" id="billingfullname" placeholder="" value="<?php echo (!empty($customer->billing->fullname)) ? $customer->billing->fullname : ''; ?>">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="nameCard" class="form-label">phone number</label>
                                <input type="text" name="phonenumber" class="form-control" id="billingphonenumber" placeholder="" value="<?php echo (!empty($customer->billing->phonenumber)) ? $customer->billing->phonenumber : ''; ?>">
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="nameCard" class="form-label">address</label>
                                <input type="text" name="address1" class="form-control" id="billingaddress1" placeholder="" value="<?php echo (!empty($customer->billing->address1)) ? $customer->billing->address1 : ''; ?>">
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="nameCard" class="form-label">address line 2 (optional)</label>
                                <input type="text" name="address2" class="form-control" id="billingaddress2" placeholder="" value="<?php echo (!empty($customer->billing->address2)) ? $customer->billing->address2 : ''; ?>">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="nameCard" class="form-label">country</label>
                                <select name="country" id="billingcountry" class="select2">
                                    <option value="">Select Country</option>
                                    @foreach ($countries as $country)
                                    <?php if (!empty($customer->billing->country->id)) { ?>
                                        <option value="{{ $country->id }}" <?php echo ($country->id == $customer->billing->country->id) ? "selected=''" : ""; ?>>{{ $country->name }}</option>
                                    <?php } else { ?>
                                        <option value="{{ $country->id }}">{{ $country->name }}</option>
                                    <?php } ?>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="nameCard" class="form-label">state / region</label>
                                <input type="text" name="state" class="form-control" id="billingstate" placeholder="" value="<?php echo (!empty($customer->billing->state)) ? $customer->billing->state : ''; ?>">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="nameCard" class="form-label">city</label>
                                <input type="text" name="city" class="form-control" id="billingcity" placeholder="" value="<?php echo (!empty($customer->billing->city)) ? $customer->billing->city : ''; ?>">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="nameCard" class="form-label">postal code</label>
                                <input type="text" name="billingpostalcode" class="form-control" id="billingpostalcode" value="<?php echo (!empty($customer->billing->postalcode)) ? $customer->billing->postalcode : ''; ?>">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <label for="sameadd2" class="custom-checbox mb-0">
                                <input type="checkbox" id="sameadd2">
                                <span class="check-icon"><i class="fal fa-check"></i></span>
                                SAME AS SHIPPING ADDRESS
                            </label>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn-gray" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn-blue" id="btnchangebilling">SAVE</button>
                </div>
            </div>
        </div>
    </form>
</div>


@endsection
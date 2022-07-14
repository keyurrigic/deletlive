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
                            <div class="tab-pane active" id="v-pills-messages" role="tabpanel" aria-labelledby="v-pills-messages-tab">
                                <nav>
                                    <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                        <a class="nav-link active" id="nav-home-tab" data-bs-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Order
                                            history</a>
                                        <a class="nav-link" id="nav-profile-tab" data-bs-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Billing</a>

                                    </div>
                                </nav>
                                <div class="tab-content" id="nav-tabContent">
                                    <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">

                                        <?php foreach ($customer->orders as $order) { ?>
                                            <div class="myaccount-card order-history-card-wrapper">
                                                <div class="d-flex justify-content-between align-items-center order-history-card">
                                                    <div class="order-history-card-left">
                                                        <p class="order-history-number">Order no. {{$order->id}}</p>
                                                        <p><em>Placed on {{ date('F jS, Y, h:i A', strtotime($order->created_at)) }}</em></p>
                                                    </div>
                                                    <div class="order-history-card-right">
                                                        <span class="order-history-status <?php echo ($order->status == "delivered") ? 'delivered' : 'order-placed'; ?>">{{$order->status}}</span>
                                                    </div>
                                                </div>
                                                <?php foreach ($order->orderItems as $item) { ?>
                                                    <div class="d-flex justify-content-between align-items-center order-history-detail">
                                                        <div class="order-history-detail-left">
                                                            <p>{{$item->qty}} x {{$item->title}}</p>
                                                        </div>
                                                        <div class="order-history-detail-right">
                                                            <p>${{$item->total}}</p>
                                                        </div>

                                                    </div>
                                                <?php } ?>
                                                <div class="d-flex justify-content-between align-items-center order-history-detail">
                                                    <div class="order-history-detail-left">
                                                        <p>TOTAL</p>
                                                    </div>
                                                    <div class="order-history-detail-right">
                                                        <p>${{ $order->total }}</p>
                                                    </div>
                                                </div>
                                                <p class="order-history-info">This is a recurring payment that will take place on the {{ date('jS', strtotime($order->created_at)) }} of each month.</p>
                                            </div>
                                        <?php } ?>

                                    </div>


                                    <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                                        <div class="custom-table-responsive">
                                            <div class="custom-table">
                                                <div class="custom-table-head d-flex">
                                                    <div class="custom-table-head-th thorder">ORDER NO.</div>
                                                    <div class="custom-table-head-th thdate">DATE</div>
                                                    <div class="custom-table-head-th thamount">AMOUNT</div>
                                                    <div class="custom-table-head-th thstatus">STATUS</div>
                                                    <div class="custom-table-head-th thdownload"></div>
                                                </div>
                                                <div class="custom-table-body">
                                                    <?php foreach ($customer->subscriptions as $sub) { ?>
                                                        <div class="custom-table-tr d-flex">
                                                            <div class="custom-table-head-td tdorder">{{ $sub->order_id }}</div>
                                                            <div class="custom-table-head-td tddate"><?php echo date('M d, Y', strtotime($sub->created_at)); ?></div>
                                                            <div class="custom-table-head-td tdamount">
                                                                ${{ $sub->subscription_amount }}
                                                            </div>
                                                            <div class="custom-table-head-td tdstatus">Paid</div>
                                                            <div class="custom-table-head-td tddownload">
                                                                <a target="_blank" href="/invoice/{{$sub->latest_invoice}}">
                                                                    <svg xmlns=" http://www.w3.org/2000/svg" width="16" height="17" viewBox="0 0 16 17">
                                                                        <path id="Icon" d="M7,9.076Q7,9.038,7,9V1A1,1,0,0,1,9,1V9l2.4-1.8a1,1,0,0,1,1.2,1.6l-4,3a1,1,0,0,1-1.175.018L3.425,9a1,1,0,1,1,1.15-1.636ZM2,14v1H14V14a1,1,0,0,1,2,0v2a1,1,0,0,1-1,1H1a1,1,0,0,1-1-1V14a1,1,0,0,1,2,0Z" fill="#5271ff" fill-rule="evenodd" />
                                                                    </svg>
                                                                </a>
                                                            </div>
                                                        </div>
                                                    <?php } ?>

                                                </div>
                                            </div>
                                        </div>

                                    </div>

                                </div>



                            </div>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

@endsection
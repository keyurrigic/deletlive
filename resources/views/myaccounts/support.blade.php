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

                        <div class="tab-pane active" id="v-pills-settings" role="tabpanel"
                                aria-labelledby="v-pills-settings-tab">
                                <nav class="position-relative ticket-tab">
                                    <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                        <a class="nav-link active" id="nav-Open-tab" data-bs-toggle="tab"
                                            href="#nav-Open" role="tab" aria-controls="nav-Open"
                                            aria-selected="true">Open tickets</a>
                                        <a class="nav-link" id="nav-Closed-tab" data-bs-toggle="tab" href="#nav-Closed"
                                            role="tab" aria-controls="nav-Closed" aria-selected="false">Closed
                                            tickets</a>
                                    </div>
                                    <button class="btn-blue new-ticket-btn btn-blue-small" data-bs-toggle="modal" data-bs-target="#newTicketModel">New ticket</button>
                                </nav>

                                <div class="tab-content" id="nav-tabContent">
                                    <div class="tab-pane fade show active" id="nav-Open" role="tabpanel"
                                        aria-labelledby="nav-Open-tab">
                                        @foreach($tickets['open'] as $ticket)
                                        <div class="myaccount-card order-history-card-wrapper open-ticket-wrapper">
                                            <div
                                                class="d-flex justify-content-between align-items-center order-history-card">
                                                <div class="order-history-card-left">
                                                    <p class="order-history-number"><a href="{{ URL('/my-account/support/'.$ticket->id )}}">Ticket #{{$ticket->id}}</a></p>
                                                    <?php $time=strtotime($ticket->created_at); ?>
                                                    <p><em>Opened on <?php echo date("F",$time).' '.date("d",$time).', '.date("Y",$time); ?></em></p>
                                                    
                                                        
                                                </div>
                                                <div class="order-history-card-right d-flex">
                                                    <span class="order-history-status delivered">Open</span>
                                                </div>
                                            </div>

                                            <h6>{{$ticket->subject}}</h6>
                                            <p>{!! $ticket->description !!}</p>

                                            <p class="l-reply text-end">
                                                Last reply from Delet, 4 hours ago
                                            </p>

                                        </div>
                                        @endforeach
                                    </div>
                                    <div class="tab-pane fade" id="nav-Closed" role="tabpanel"
                                        aria-labelledby="nav-Closed-tab">
                                        @foreach($tickets['close'] as $ticket)
                                        <div class="myaccount-card order-history-card-wrapper open-ticket-wrapper">
                                            <div
                                                class="d-flex justify-content-between align-items-center order-history-card">
                                                <div class="order-history-card-left">
                                                    <p class="order-history-number"><a href="{{ URL('/my-account/support/'.$ticket->id )}}">Ticket #{{$ticket->id}}</a></p>
                                                    <?php $time=strtotime($ticket->created_at); ?>
                                                    <p><em>Opened on <?php echo date("F",$time).' '.date("d",$time).', '.date("Y",$time); ?></em></p>
                                                </div>
                                                <div class="order-history-card-right d-flex">
                                                    <span class="order-history-status delivered">Close</span>
                                                </div>
                                            </div>

                                            <h6>{{$ticket->subject}}</h6>
                                            <p>{{$ticket->description}}</p>

                                            <p class="l-reply text-end">
                                                Last reply from Delet, 4 hours ago
                                            </p>

                                        </div>
                                        @endforeach
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
<div class="modal fade" id="newTicketModel" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form name="frmcreateticketname" id="frmcreateticketname" method="post"> 
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Create Ticket</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="nameCard" class="form-label">Subject</label>
                            <input type="text" name="subject" class="form-control mb-0" id="subject">
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="nameCard" class="form-label">Description</label>
                            <textarea id="description" name="description" class="form-control" rows="3"></textarea>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn-gray" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn-blue" id="btncreateticket">SAVE</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection

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
                               
                                <div class="myaccount-card order-history-card-wrapper open-ticket-wrapper position-relative">
                                    <a href="{{ url('/my-account/support')}}" class="back-btn"><i
                                            class="fa-light fa-long-arrow-left"></i>Back</a>
                                    <div
                                        class="d-flex justify-content-between align-items-center order-history-card">
                                        <div class="order-history-card-left">
                                            <p class="order-history-number">Ticket #{{$ticket->id}}</p>
                                            <?php $timeC=strtotime($ticket->created_at); ?>
                                            <p><em>Opened on <?php echo date("F",$timeC).' '.date("d",$timeC).', '.date("Y",$timeC); ?></em></p>
                                             
                                        </div>
                                        <div class="order-history-card-right d-flex">
                                            <span class="order-history-status delivered">Open</span>
                                        </div>
                                    </div>

                                    <h6>{{$ticket->subject}}</h6>
                                            <p>{!! $ticket->description !!}</p>
                                    <!--div class="d-flex img-thumb-wrapper">
                                        <img src="{{url('assets/images/ticket-img-1.png')}}" alt="" width="130"
                                            height="87" />
                                        <img src="{{url('assets/images/ticket-img-2.png')}}" alt="" width="130"
                                            height="87" />
                                        <img src="{{url('assets/images/ticket-img-3.png')}}" alt="" width="130"
                                            height="87" />
                                    </div-->
                                    <?php if(count($ticketReplies)){ ?>
                                    <ul class="list-unstyle ticket-more-list">
                                        @foreach($ticketReplies as $ticketreply)
                                            <li>
                                                <span class="avatar-wrapper d-flex  position-relative">
                                                    <span class="avatar">
                                                       <?php if($ticketreply->commented_by=="admin"){ ?> 
                                                        <img src="{{url('assets/images/Avatar.png')}}" alt="" width="40" height="40" />
                                                       <?php } else{ ?>
                                                        <img src="{{url('assets/images/Avatar-jd.png')}}" alt="" width="40" height="40" />
                                                       <?php } ?> 
                                                    </span>
                                                    <span class="avatar-more-info">
                                                    <?php if($ticketreply->commented_by=="admin"){ ?> 
                                                        <span class="avatar-name">Delet</span>
                                                    <?php } else{ ?>
                                                        <span class="avatar-name">{{$name}}</span>
                                                    <?php } ?> 
                                                    <?php $time=strtotime($ticketreply->created_at); ?>
                                                        <span class="avatar-time">on <?php echo date("F",$time).' '.date("d",$time).', '.date("Y",$time); ?></span>
                                                    </span>
                                                </span>
                                                {!! $ticketreply->comment !!}
                                                <?php if(!empty($ticketreply->images)){ ?>
                                                    
                                                    <div class="d-flex img-thumb-wrapper">
                                                        <?php for($i=0;$i<count($ticketreply->images);$i++){
                                                            if(empty($ticketreply->images[$i]["image"])) continue;  ?>        
                                                        <img src="{{url('uploads/'.$ticketreply->images[$i]["image"].'')}}" alt="" width="130" height="87" />
                                                        <?php } ?>    
                                                    </div>
                                                <?php } ?>
                                            </li>
                                            @endforeach
                                            <!--li>
                                                <span class="avatar-wrapper d-flex  position-relative">
                                                    <span class="avatar">
                                                        <img src="{{url('assets/images/Avatar-jd.png')}}" alt=""
                                                            width="40" height="40" />
                                                    </span>
                                                    <span class="avatar-more-info">
                                                        <span class="avatar-name">James Donovan</span>
                                                        <span class="avatar-time">yesterday at 10:16 AM</span>
                                                    </span>
                                                </span>
                                                <p>Cras tincidunt urna eu est maximus feugiat in ut nisl. Duis
                                                    pulvinar nisi quis erat aliquet blandit. Phasellus aliquam
                                                    turpis ligula, at elementum dui.</p>
                                            </li-->
                                    </ul>
                                    <?php } ?>
                                    <div class="reply-form">
                                        <form name="frmreplyticket" action="{{ route('myaccount.replyticket') }}" id="frmreplyticket" method="post" enctype="multipart/form-data"> 
                                        @csrf
                                            <label>REPLY</label>
                                            <input type="hidden" name="ticket_id" value="{{$ticket->id}}"/>
                                            <textarea name="comment" id="comment" required></textarea>
                                            <div class="reply-form-bottom d-flex justify-content-between">
                                                <div class="d-flex">
                                                    <label for="reply-form-file" class="reply-form-file">
                                                        <input type="file" name="images[]"  id="reply-form-file" multiple accept="image/*">
                                                        <span></span>
                                                    </label>
                                                    <div class="images-preview-div"> </div>
                                                    <div class="d-flex img-thumb-wrapper">
                                                        <img id="preview-image-before-upload" src="{{url('assets/images/ticket-img-1.png')}}"
                                                            alt="" width="80" height="53" />
                                                    </div>
                                                </div>
                                                <div>
                                                    <button class="btn-blue" type="submit" id="btnreplyticket">SEND</button>
                                                </div>
                                            </div>
                                        </form>
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

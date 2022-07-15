@component('mail::message')
# Order No. {{ $order->id }}
Placed on <?php echo date('M d, Y', strtotime($order->created_at)); ?>

@component('mail::table')
    |     |     |
    | ------------- |:-------------:|
    @foreach($order->orderItems as $item)
    | {{$item->qty}} X {{$item->title}}   |  ${{$item->total}}   |
    @endforeach
    |  TOTAL | ${{ $order->total }} |
@endcomponent

<?php $invoice_url=URL::to('/').'/invoice/'.$order->subscription->latest_invoice; ?>
<a href="{{$invoice_url}}">Receipt</a>
@endcomponent
@component('mail::message')
Hi {{ $payment->details->full_name }},

Your order for {{ $payment->order->product->name }} ({{$payment->order->quantity}}) is now confirmed.

@if ( $payment->order->product->id == 1 )
<img src="http://sinulogfyre.com/products/images/81463729_377066763142641_7711675575957454848_n.jpg">
@else
<img src="http://sinulogfyre.com/products/images/81327007_607665803322647_1180082083217801216_n.jpg">
@endif
<br><br>

<p> Order Number: <small> {{ $payment->order->order_number }}</small></p>

@component('mail::table')
| Serial Numbers|
| --------------|
@foreach( $payment->serials as $serials )
|{{ $serials->number }}|
@endforeach
@endcomponent


Thanks,<br>
Sinulog Fyre Team
@endcomponent

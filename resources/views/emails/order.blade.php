@component('mail::message')
Hi {{ $payment->details->full_name }},

We have received your order for {{ $payment->order->product->name }} ({{$payment->order->quantity}} pc/s).

Your order will be confirmed within 6 to 12 hours through email.

Order number: {{ $payment->order->order_number }}

Thanks,<br>
Sinulog Fyre Team
@endcomponent

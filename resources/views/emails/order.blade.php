@component('mail::message')
Hi {{ $payment->details->full_name }}

We have received your order for {{ $payment->order->product->name }}.

Please wait for 6-8 hours for verification.

Order number: {{ $payment->order->order_number }}

Thanks,<br>
Sinulog Fyre Team
@endcomponent

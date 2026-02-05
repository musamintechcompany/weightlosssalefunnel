<x-mail::message>
# New Order Received! 🛒

You have a new order from your sales funnel.

## Customer Information

**Name:** {{ $order['name'] }}  
**Email:** {{ $order['email'] }}  
**Phone:** {{ $order['phone'] }}

## Shipping Address

{{ $order['address'] }}  
{{ $order['city'] }}, {{ $order['state'] }} {{ $order['zip'] }}

## Order Details

**Product:** {{ $order['product_name'] }}  
**Total:** ₦{{ number_format($order['total'], 0) }}  
**Order Date:** {{ now()->format('M d, Y h:i A') }}

<x-mail::button :url="config('app.url')">
View Dashboard
</x-mail::button>

Process this order and ship within 24 hours.

Thanks,<br>
{{ config('app.name') }} System
</x-mail::message>

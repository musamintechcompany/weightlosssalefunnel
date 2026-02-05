<x-mail::message>
# Order Confirmed! 🎉

Hi {{ $order['name'] }},

Thank you for your order! We're excited to help you on your weight loss journey.

## Order Details

**Product:** {{ $order['product_name'] }}  
**Total:** ₦{{ number_format($order['total'], 0) }}  
**Order Number:** #{{ strtoupper(substr(md5($order['email'] . time()), 0, 8)) }}

## Shipping Address

{{ $order['name'] }}  
{{ $order['address'] }}  
{{ $order['city'] }}, {{ $order['state'] }} {{ $order['zip'] }}

## What's Next?

- ✅ Your order will ship within 24 hours
- 📦 You'll receive tracking information via email
- 🚚 Delivery in 3-5 business days

<x-mail::button :url="config('app.url')">
Visit Our Store
</x-mail::button>

If you have any questions, feel free to reply to this email.

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>

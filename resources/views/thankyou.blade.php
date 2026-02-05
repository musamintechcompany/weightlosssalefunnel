<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Confirmed!</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
    <!-- TikTok Pixel Code Start -->
    <script>
    !function (w, d, t) {
    w.TiktokAnalyticsObject=t;var ttq=w[t]=w[t]||[];ttq.methods=["page","track","identify","instances","debug","on","off","once","ready","alias","group","enableCookie","disableCookie","holdConsent","revokeConsent","grantConsent"],ttq.setAndDefer=function(t,e){t[e]=function(){t.push([e].concat(Array.prototype.slice.call(arguments,0)))}};for(var i=0;i<ttq.methods.length;i++)ttq.setAndDefer(ttq,ttq.methods[i]);ttq.instance=function(t){for(
    var e=ttq._i[t]||[],n=0;n<ttq.methods.length;n++)ttq.setAndDefer(e,ttq.methods[n]);return e},ttq.load=function(e,n){var r="https://analytics.tiktok.com/i18n/pixel/events.js",o=n&&n.partner;ttq._i=ttq._i||{},ttq._i[e]=[],ttq._i[e]._u=r,ttq._t=ttq._t||{},ttq._t[e]=+new Date,ttq._o=ttq._o||{},ttq._o[e]=n||{};n=document.createElement("script")
    ;n.type="text/javascript",n.async=!0,n.src=r+"?sdkid="+e+"&lib="+t;e=document.getElementsByTagName("script")[0];e.parentNode.insertBefore(n,e)};

    ttq.load('D62DBD3C77U8OPSUBONG');
    ttq.page();
    
    // Track purchase conversion
    ttq.track('CompletePayment', {
        content_type: 'product',
        currency: 'USD'
    });
    }(window, document, 'ttq');
    </script>
    <!-- TikTok Pixel Code End -->
</head>
<body class="bg-gradient-to-b from-green-50 to-blue-50">
    
    <div class="min-h-screen flex items-center justify-center py-12 px-4">
        <div class="max-w-2xl w-full">
            
            <div class="bg-white rounded-3xl p-12 shadow-xl text-center">
                
                <!-- Success Icon -->
                <div class="mb-8">
                    <div class="w-20 h-20 bg-green-100 rounded-full flex items-center justify-center mx-auto">
                        <span class="text-5xl">✓</span>
                    </div>
                </div>

                <h1 class="text-3xl md:text-4xl font-bold text-gray-800 mb-4">Order Confirmed!</h1>
                <p class="text-lg md:text-xl text-gray-600 mb-8">Thank you for your purchase. Your order has been received.</p>

                <div class="bg-gradient-to-br from-purple-50 to-pink-50 rounded-2xl p-6 mb-8">
                    <p class="text-gray-700 mb-2">Order Number</p>
                    <p class="text-xl md:text-2xl font-bold text-purple-600 mb-2 break-all">#{{ strtoupper(uniqid()) }}</p>
                    <p class="text-sm text-gray-600">Please save this order number for tracking</p>
                </div>

                <div class="space-y-4 text-left mb-8">
                    <div class="flex items-start gap-3">
                        <span class="text-2xl">📧</span>
                        <div>
                            <p class="font-semibold text-gray-800">Confirmation Email Sent</p>
                            <p class="text-gray-600 text-sm">Check your inbox for order details</p>
                        </div>
                    </div>
                    <div class="flex items-start gap-3">
                        <span class="text-2xl">📦</span>
                        <div>
                            <p class="font-semibold text-gray-800">Ships Within 24 Hours</p>
                            <p class="text-gray-600 text-sm">You'll receive tracking information soon</p>
                        </div>
                    </div>
                </div>

                <a href="/" class="bg-gradient-to-r from-purple-500 to-pink-500 text-white px-8 py-4 rounded-full font-semibold hover:from-purple-600 hover:to-pink-600 transition inline-block">
                    Back to Home
                </a>

            </div>

        </div>
    </div>

</body>
</html>

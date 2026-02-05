<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Confirmed!</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
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

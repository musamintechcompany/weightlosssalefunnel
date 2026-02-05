<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Select Payment Method</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gradient-to-b from-blue-50 to-purple-50">
    
    <div class="min-h-screen py-12 px-4">
        <div class="max-w-3xl mx-auto">
            
            <div class="text-center mb-8">
                <h1 class="text-4xl font-bold text-gray-800 mb-2">Choose Payment Method</h1>
                <p class="text-gray-600">Select your preferred payment gateway</p>
            </div>

            <div class="bg-white rounded-3xl p-8 shadow-lg mb-6">
                <div class="mb-6">
                    <h3 class="text-xl font-bold text-gray-800 mb-2">Order Summary</h3>
                    <p class="text-gray-600">{{ $order->product_name }}</p>
                    <p class="text-3xl font-bold text-purple-600 mt-2">₦{{ number_format($order->total, 0) }}</p>
                </div>

                <div class="space-y-4">
                    <!-- Paystack -->
                    <form action="{{ route('payment.paystack') }}" method="POST">
                        @csrf
                        <input type="hidden" name="order_id" value="{{ $order->id }}">
                        <button type="submit" class="w-full bg-white border-2 border-gray-200 p-6 rounded-2xl hover:border-blue-400 hover:shadow-lg transition flex items-center justify-between">
                            <div class="flex items-center gap-4">
                                <div class="bg-blue-50 rounded-lg p-3">
                                    <img src="{{ asset('images/logos/paystack-logo.png') }}" alt="Paystack" class="w-12 h-12 object-contain">
                                </div>
                                <div class="text-left">
                                    <p class="font-bold text-lg text-gray-800">Pay with Paystack</p>
                                    <p class="text-sm text-gray-500">Card, Bank Transfer, USSD</p>
                                </div>
                            </div>
                            <svg class="w-6 h-6 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                            </svg>
                        </button>
                    </form>

                    <!-- Flutterwave -->
                    <form action="{{ route('payment.flutterwave') }}" method="POST">
                        @csrf
                        <input type="hidden" name="order_id" value="{{ $order->id }}">
                        <button type="submit" class="w-full bg-white border-2 border-gray-200 p-6 rounded-2xl hover:border-orange-400 hover:shadow-lg transition flex items-center justify-between">
                            <div class="flex items-center gap-4">
                                <div class="bg-orange-50 rounded-lg p-3">
                                    <img src="https://flutterwave.com/images/logo/full.svg" alt="Flutterwave" class="w-12 h-12">
                                </div>
                                <div class="text-left">
                                    <p class="font-bold text-lg text-gray-800">Pay with Flutterwave</p>
                                    <p class="text-sm text-gray-500">Card, Bank, Mobile Money</p>
                                </div>
                            </div>
                            <svg class="w-6 h-6 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                            </svg>
                        </button>
                    </form>
                </div>
            </div>

            <div class="text-center">
                <div class="flex justify-center gap-6 text-gray-500 text-sm">
                    <span>🔒 Secure Payment</span>
                    <span>✓ SSL Encrypted</span>
                    <span>💳 Safe & Fast</span>
                </div>
            </div>

        </div>
    </div>

</body>
</html>

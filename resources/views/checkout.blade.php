<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gradient-to-b from-blue-50 to-purple-50">
    
    <div class="min-h-screen py-12 px-4">
        <div class="max-w-5xl mx-auto">
            
            <!-- Header -->
            <div class="text-center mb-8">
                <h1 class="text-4xl font-bold text-gray-800 mb-2">Complete Your Order</h1>
                <p class="text-gray-600">Just one step away from your transformation!</p>
            </div>

            <div class="grid md:grid-cols-2 gap-8">
                
                <!-- Order Form -->
                <div class="bg-white rounded-3xl p-8 shadow-lg">
                    <h2 class="text-2xl font-bold text-gray-800 mb-6">Shipping Information</h2>
                    
                    <form action="/process-order" method="POST">
                        @csrf
                        
                        <div class="space-y-4">
                            <div>
                                <label class="block text-gray-700 font-semibold mb-2">Full Name</label>
                                <input type="text" name="name" required class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:border-purple-500 focus:ring-2 focus:ring-purple-200 outline-none transition" placeholder="Your full name">
                            </div>

                            <div>
                                <label class="block text-gray-700 font-semibold mb-2">Email Address</label>
                                <input type="email" name="email" required class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:border-purple-500 focus:ring-2 focus:ring-purple-200 outline-none transition" placeholder="Your email address">
                            </div>

                            <div>
                                <label class="block text-gray-700 font-semibold mb-2">Phone Number</label>
                                <input type="tel" name="phone" required class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:border-purple-500 focus:ring-2 focus:ring-purple-200 outline-none transition" placeholder="Your phone number">
                            </div>

                            <div>
                                <label class="block text-gray-700 font-semibold mb-2">Street Address</label>
                                <input type="text" name="address" required class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:border-purple-500 focus:ring-2 focus:ring-purple-200 outline-none transition" placeholder="Your street address">
                            </div>

                            <div class="grid grid-cols-2 gap-4">
                                <div>
                                    <label class="block text-gray-700 font-semibold mb-2">City</label>
                                    <input type="text" name="city" required class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:border-purple-500 focus:ring-2 focus:ring-purple-200 outline-none transition" placeholder="Your city">
                                </div>
                                <div>
                                    <label class="block text-gray-700 font-semibold mb-2">Postal Code</label>
                                    <input type="text" name="zip" required class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:border-purple-500 focus:ring-2 focus:ring-purple-200 outline-none transition" placeholder="Postal code">
                                </div>
                            </div>

                            <div>
                                <label class="block text-gray-700 font-semibold mb-2">State</label>
                                <input type="text" name="state" required class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:border-purple-500 focus:ring-2 focus:ring-purple-200 outline-none transition" placeholder="Your state">
                            </div>

                            <input type="hidden" name="product" value="{{ request('product', 'slim-tea') }}">
                            <input type="hidden" name="quantity" id="quantityInput" value="1">
                        </div>

                        <button type="submit" class="w-full mt-8 bg-gradient-to-r from-purple-500 to-pink-500 text-white py-4 rounded-xl font-bold text-lg hover:from-purple-600 hover:to-pink-600 transition shadow-lg">
                            Submit and Continue
                        </button>
                    </form>

                    <div class="mt-6 flex items-center justify-center gap-4 text-gray-500 text-sm">
                        <span>🔒 Secure Checkout</span>
                        <span>|</span>
                        <span>✓ SSL Encrypted</span>
                    </div>
                </div>

                <!-- Order Summary -->
                <div>
                    <div class="bg-white rounded-3xl p-8 shadow-lg sticky top-8">
                        <h2 class="text-2xl font-bold text-gray-800 mb-6">Order Summary</h2>
                        
                        @php
                            $product = request('product', 'flat-tummy-tea');
                            $quantity = request('quantity', 1);
                            $products = [
                                'fat-burner-coffee' => ['name' => 'Fat Burner Coffee', 'price' => 35000, 'image' => 'fat-bunner-coffee.jpeg'],
                                'fat-supplement-pill' => ['name' => 'Fat Supplement Pill', 'price' => 35000, 'image' => 'Fat-suppliment-pill.jpeg'],
                                'flat-tummy-tea' => ['name' => 'Flat Tummy Tea', 'price' => 35000, 'image' => 'flat-tummy-tea.jpeg'],
                                'bundle' => ['name' => 'Complete Bundle (All 3)', 'price' => 90000, 'image' => 'bundle'],
                                'combo-coffee-pill' => ['name' => 'Combo: Coffee + Pill', 'price' => 65000, 'image' => 'combo'],
                                'combo-coffee-tea' => ['name' => 'Combo: Coffee + Tea', 'price' => 65000, 'image' => 'combo'],
                                'combo-pill-tea' => ['name' => 'Combo: Pill + Tea', 'price' => 65000, 'image' => 'combo']
                            ];
                            $selectedProduct = $products[$product] ?? $products['flat-tummy-tea'];
                        @endphp

                        <div class="bg-gradient-to-br from-purple-50 to-pink-50 rounded-2xl p-6 mb-6">
                            <div class="flex items-center gap-4 mb-4">
                                @if($selectedProduct['image'] === 'bundle')
                                    <div class="w-20 h-20 rounded-xl overflow-hidden flex-shrink-0">
                                        <div class="grid grid-cols-3 h-full">
                                            <img src="{{ asset('images/products/fat-bunner-coffee.jpeg') }}" alt="Coffee" class="w-full h-full object-cover">
                                            <img src="{{ asset('images/products/Fat-suppliment-pill.jpeg') }}" alt="Pill" class="w-full h-full object-cover">
                                            <img src="{{ asset('images/products/flat-tummy-tea.jpeg') }}" alt="Tea" class="w-full h-full object-cover">
                                        </div>
                                    </div>
                                @elseif($selectedProduct['image'] === 'combo')
                                    <div class="w-20 h-20 rounded-xl overflow-hidden flex-shrink-0">
                                        <div class="grid grid-cols-2 h-full">
                                            @if(str_contains($product, 'coffee'))
                                                <img src="{{ asset('images/products/fat-bunner-coffee.jpeg') }}" alt="Coffee" class="w-full h-full object-cover">
                                            @endif
                                            @if(str_contains($product, 'pill'))
                                                <img src="{{ asset('images/products/Fat-suppliment-pill.jpeg') }}" alt="Pill" class="w-full h-full object-cover">
                                            @endif
                                            @if(str_contains($product, 'tea'))
                                                <img src="{{ asset('images/products/flat-tummy-tea.jpeg') }}" alt="Tea" class="w-full h-full object-cover">
                                            @endif
                                        </div>
                                    </div>
                                @else
                                    <div class="w-20 h-20 rounded-xl overflow-hidden border-2 border-purple-300 flex-shrink-0">
                                        <img src="{{ asset('images/products/' . $selectedProduct['image']) }}" alt="{{ $selectedProduct['name'] }}" class="w-full h-full object-cover">
                                    </div>
                                @endif
                                <div class="flex-1">
                                    <h3 class="font-bold text-gray-800 text-lg">{{ $selectedProduct['name'] }}</h3>
                                    <div class="flex items-center gap-2 mt-2">
                                        <button type="button" id="decreaseQty" class="w-8 h-8 rounded-lg bg-gray-200 hover:bg-gray-300 flex items-center justify-center font-bold text-gray-700 transition">
                                            -
                                        </button>
                                        <input type="text" id="quantity" value="{{ $quantity }}" readonly class="w-12 text-center border border-gray-300 rounded-lg py-1 font-semibold">
                                        <button type="button" id="increaseQty" class="w-8 h-8 rounded-lg bg-purple-500 hover:bg-purple-600 flex items-center justify-center font-bold text-white transition">
                                            +
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="space-y-3 mb-6">
                            <div class="flex justify-between text-gray-700">
                                <span>Subtotal</span>
                                <span id="subtotal">₦{{ number_format($selectedProduct['price'], 0) }}</span>
                            </div>
                            <div class="border-t border-gray-200 pt-3 flex justify-between text-xl font-bold text-gray-800">
                                <span>Total</span>
                                <span id="total">₦{{ number_format($selectedProduct['price'], 0) }}</span>
                            </div>
                        </div>

                        <script>
                            const basePrice = {{ $selectedProduct['price'] }};
                            const quantityInput = document.getElementById('quantity');
                            const decreaseBtn = document.getElementById('decreaseQty');
                            const increaseBtn = document.getElementById('increaseQty');
                            const subtotalEl = document.getElementById('subtotal');
                            const totalEl = document.getElementById('total');

                            function updateTotal() {
                                const qty = parseInt(quantityInput.value);
                                const newTotal = basePrice * qty;
                                const formatted = '₦' + newTotal.toLocaleString('en-NG');
                                subtotalEl.textContent = formatted;
                                totalEl.textContent = formatted;
                                document.getElementById('quantityInput').value = qty;
                            }

                            decreaseBtn.addEventListener('click', function() {
                                let qty = parseInt(quantityInput.value);
                                if (qty > 1) {
                                    quantityInput.value = qty - 1;
                                    updateTotal();
                                }
                            });

                            increaseBtn.addEventListener('click', function() {
                                let qty = parseInt(quantityInput.value);
                                quantityInput.value = qty + 1;
                                updateTotal();
                            });
                        </script>

                        <div class="space-y-2 text-sm text-gray-600">
                            <div class="flex items-center gap-2">
                                <span>✓</span>
                                <span>Ships within 24 hours</span>
                            </div>
                            <div class="flex items-center gap-2">
                                <span>✓</span>
                                <span>Secure payment processing</span>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <!-- Trust Badges -->
            <div class="mt-12 text-center">
                <p class="text-gray-600 mb-4">Trusted by thousands of customers</p>
                <div class="flex justify-center gap-8 text-gray-400">
                    <span>🔒 SSL Secure</span>
                    <span>💳 Safe Payment</span>
                    <span>📦 Fast Delivery</span>
                    <span>↩️ Easy Returns</span>
                </div>
            </div>

        </div>
    </div>

</body>
</html>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Premium Weight Loss Products</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gradient-to-b from-pink-50 to-blue-50">
    
    <!-- Hero Section -->
    <section class="py-20 px-4">
        <div class="max-w-6xl mx-auto text-center">
            <h1 class="text-5xl md:text-6xl font-bold text-gray-800 mb-6">Transform Your Body Today</h1>
            <p class="text-xl text-gray-600 mb-8">Natural, Effective Weight Loss Solutions</p>
            <a href="#products" class="bg-pink-500 text-white px-8 py-4 rounded-full text-lg font-semibold hover:bg-pink-600 transition">Shop Now</a>
        </div>
    </section>

    <!-- Products Section -->
    <section id="products" class="py-16 px-4 bg-white">
        <div class="max-w-6xl mx-auto">
            <h2 class="text-4xl font-bold text-center text-gray-800 mb-12">Our Products</h2>
            
            <div class="grid md:grid-cols-3 gap-8 max-w-4xl mx-auto">
                <!-- Fat Burner Coffee -->
                <div>
                    <div class="border-4 border-orange-500 rounded-2xl mb-4 overflow-hidden" style="aspect-ratio: 9/16;">
                        <img src="{{ asset('images/products/fat-bunner-coffee.jpeg') }}" alt="Fat Burner Coffee" class="w-full h-full object-cover">
                    </div>
                    <div class="flex items-center justify-between mb-3">
                        <h3 class="text-lg font-bold text-gray-800">Fat Burner Coffee</h3>
                        <span class="text-xl font-bold text-orange-600">₦35,000</span>
                    </div>
                    <div class="flex items-center justify-center gap-2 mb-3">
                        <button onclick="decreaseQty('coffee')" class="w-8 h-8 rounded-lg bg-gray-200 hover:bg-gray-300 flex items-center justify-center font-bold text-gray-700 transition">-</button>
                        <input type="text" id="qty-coffee" value="1" readonly class="w-12 text-center border border-gray-300 rounded-lg py-1 font-semibold">
                        <button onclick="increaseQty('coffee')" class="w-8 h-8 rounded-lg bg-orange-500 hover:bg-orange-600 flex items-center justify-center font-bold text-white transition">+</button>
                    </div>
                    <a href="#" onclick="buyNow('fat-burner-coffee', 'coffee')" class="block w-full bg-orange-500 text-white text-center py-3 rounded-full font-semibold hover:bg-orange-600 transition">Buy Now</a>
                </div>

                <!-- Fat Supplement Pill -->
                <div>
                    <div class="border-4 border-purple-500 rounded-2xl mb-4 overflow-hidden" style="aspect-ratio: 9/16;">
                        <img src="{{ asset('images/products/Fat-suppliment-pill.jpeg') }}" alt="Fat Supplement Pill" class="w-full h-full object-cover">
                    </div>
                    <div class="flex items-center justify-between mb-3">
                        <h3 class="text-lg font-bold text-gray-800">Fat Supplement Pill</h3>
                        <span class="text-xl font-bold text-purple-600">₦35,000</span>
                    </div>
                    <div class="flex items-center justify-center gap-2 mb-3">
                        <button onclick="decreaseQty('pill')" class="w-8 h-8 rounded-lg bg-gray-200 hover:bg-gray-300 flex items-center justify-center font-bold text-gray-700 transition">-</button>
                        <input type="text" id="qty-pill" value="1" readonly class="w-12 text-center border border-gray-300 rounded-lg py-1 font-semibold">
                        <button onclick="increaseQty('pill')" class="w-8 h-8 rounded-lg bg-purple-500 hover:bg-purple-600 flex items-center justify-center font-bold text-white transition">+</button>
                    </div>
                    <a href="#" onclick="buyNow('fat-supplement-pill', 'pill')" class="block w-full bg-purple-500 text-white text-center py-3 rounded-full font-semibold hover:bg-purple-600 transition">Buy Now</a>
                </div>

                <!-- Flat Tummy Tea -->
                <div>
                    <div class="border-4 border-green-500 rounded-2xl mb-4 overflow-hidden" style="aspect-ratio: 9/16;">
                        <img src="{{ asset('images/products/flat-tummy-tea.jpeg') }}" alt="Flat Tummy Tea" class="w-full h-full object-cover">
                    </div>
                    <div class="flex items-center justify-between mb-3">
                        <h3 class="text-lg font-bold text-gray-800">Flat Tummy Tea</h3>
                        <span class="text-xl font-bold text-green-600">₦35,000</span>
                    </div>
                    <div class="flex items-center justify-center gap-2 mb-3">
                        <button onclick="decreaseQty('tea')" class="w-8 h-8 rounded-lg bg-gray-200 hover:bg-gray-300 flex items-center justify-center font-bold text-gray-700 transition">-</button>
                        <input type="text" id="qty-tea" value="1" readonly class="w-12 text-center border border-gray-300 rounded-lg py-1 font-semibold">
                        <button onclick="increaseQty('tea')" class="w-8 h-8 rounded-lg bg-green-500 hover:bg-green-600 flex items-center justify-center font-bold text-white transition">+</button>
                    </div>
                    <a href="#" onclick="buyNow('flat-tummy-tea', 'tea')" class="block w-full bg-green-500 text-white text-center py-3 rounded-full font-semibold hover:bg-green-600 transition">Buy Now</a>
                </div>
            </div>

            <script>
                function decreaseQty(product) {
                    const input = document.getElementById('qty-' + product);
                    let qty = parseInt(input.value);
                    if (qty > 1) {
                        input.value = qty - 1;
                    }
                }

                function increaseQty(product) {
                    const input = document.getElementById('qty-' + product);
                    let qty = parseInt(input.value);
                    input.value = qty + 1;
                }

                function buyNow(productName, productId) {
                    const qty = document.getElementById('qty-' + productId).value;
                    window.location.href = '/checkout?product=' + productName + '&quantity=' + qty;
                    return false;
                }
            </script>

            <!-- Pick Any 2 Bundle -->
            <div class="mt-12 bg-gradient-to-r from-blue-100 to-green-100 rounded-2xl p-6 shadow-xl max-w-3xl mx-auto">
                <div class="text-center mb-4">
                    <span class="bg-blue-500 text-white px-3 py-1 rounded-full text-xs font-bold">SAVE ₦5,000</span>
                    <h3 class="text-xl md:text-2xl font-bold text-gray-800 mt-3 mb-2">Pick Any 2 Products</h3>
                    <p class="text-gray-600 text-sm mb-4">Choose any 2 products and save!</p>
                </div>
                <div class="grid grid-cols-3 gap-3 max-w-md mx-auto mb-4">
                    <label class="cursor-pointer">
                        <input type="checkbox" id="combo-coffee" class="hidden combo-checkbox" onchange="updateCombo()">
                        <div class="border-4 border-gray-300 rounded-xl overflow-hidden hover:border-orange-500 transition combo-box" data-product="coffee">
                            <img src="{{ asset('images/products/fat-bunner-coffee.jpeg') }}" alt="Coffee" class="w-full h-24 object-cover">
                            <p class="text-xs text-center py-1 font-semibold">Coffee</p>
                        </div>
                    </label>
                    <label class="cursor-pointer">
                        <input type="checkbox" id="combo-pill" class="hidden combo-checkbox" onchange="updateCombo()">
                        <div class="border-4 border-gray-300 rounded-xl overflow-hidden hover:border-purple-500 transition combo-box" data-product="pill">
                            <img src="{{ asset('images/products/Fat-suppliment-pill.jpeg') }}" alt="Pill" class="w-full h-24 object-cover">
                            <p class="text-xs text-center py-1 font-semibold">Pill</p>
                        </div>
                    </label>
                    <label class="cursor-pointer">
                        <input type="checkbox" id="combo-tea" class="hidden combo-checkbox" onchange="updateCombo()">
                        <div class="border-4 border-gray-300 rounded-xl overflow-hidden hover:border-green-500 transition combo-box" data-product="tea">
                            <img src="{{ asset('images/products/flat-tummy-tea.jpeg') }}" alt="Tea" class="w-full h-24 object-cover">
                            <p class="text-xs text-center py-1 font-semibold">Tea</p>
                        </div>
                    </label>
                </div>
                <div class="text-center">
                    <div class="flex items-center justify-center gap-3 mb-4">
                        <span class="text-lg text-gray-400 line-through">₦70,000</span>
                        <span class="text-3xl font-bold text-blue-600">₦65,000</span>
                    </div>
                    <button id="combo-btn" onclick="buyCombo()" disabled class="bg-gray-400 text-white px-6 py-3 rounded-full font-semibold cursor-not-allowed inline-block">Select 2 Products</button>
                    <p id="combo-msg" class="text-sm text-gray-500 mt-2">Please select exactly 2 products</p>
                </div>
            </div>

            <script>
                function updateCombo() {
                    const checkboxes = document.querySelectorAll('.combo-checkbox');
                    const boxes = document.querySelectorAll('.combo-box');
                    const btn = document.getElementById('combo-btn');
                    const msg = document.getElementById('combo-msg');
                    
                    let selected = [];
                    checkboxes.forEach((cb, index) => {
                        if (cb.checked) {
                            selected.push(cb.id.replace('combo-', ''));
                            boxes[index].classList.remove('border-gray-300');
                            boxes[index].classList.add('border-blue-500');
                        } else {
                            boxes[index].classList.remove('border-blue-500', 'border-orange-500', 'border-purple-500', 'border-green-500');
                            boxes[index].classList.add('border-gray-300');
                        }
                    });

                    if (selected.length === 2) {
                        btn.disabled = false;
                        btn.classList.remove('bg-gray-400', 'cursor-not-allowed');
                        btn.classList.add('bg-blue-500', 'hover:bg-blue-600', 'cursor-pointer');
                        btn.textContent = 'Buy Combo Now';
                        msg.textContent = 'Great choice! Click to proceed';
                        msg.classList.remove('text-gray-500');
                        msg.classList.add('text-green-600');
                    } else if (selected.length > 2) {
                        checkboxes.forEach(cb => {
                            if (!cb.checked) cb.disabled = true;
                        });
                        msg.textContent = 'Maximum 2 products selected';
                        msg.classList.remove('text-green-600');
                        msg.classList.add('text-red-500');
                    } else {
                        btn.disabled = true;
                        btn.classList.add('bg-gray-400', 'cursor-not-allowed');
                        btn.classList.remove('bg-blue-500', 'hover:bg-blue-600', 'cursor-pointer');
                        btn.textContent = 'Select 2 Products';
                        msg.textContent = 'Please select exactly 2 products';
                        msg.classList.remove('text-green-600', 'text-red-500');
                        msg.classList.add('text-gray-500');
                        checkboxes.forEach(cb => cb.disabled = false);
                    }
                }

                function buyCombo() {
                    const selected = [];
                    document.querySelectorAll('.combo-checkbox:checked').forEach(cb => {
                        selected.push(cb.id.replace('combo-', ''));
                    });
                    if (selected.length === 2) {
                        window.location.href = '/checkout?product=combo-' + selected.join('-');
                    }
                }
            </script>

            <!-- Bundle Offer -->
            <div class="mt-12 bg-gradient-to-r from-purple-100 to-pink-100 rounded-2xl p-6 shadow-xl max-w-3xl mx-auto">
                <div class="text-center mb-4">
                    <span class="bg-red-500 text-white px-3 py-1 rounded-full text-xs font-bold">SAVE ₦15,000</span>
                    <h3 class="text-xl md:text-2xl font-bold text-gray-800 mt-3 mb-2">Complete Weight Loss Bundle</h3>
                    <p class="text-gray-600 text-sm mb-4">Get all three products and save big!</p>
                </div>
                <div class="border-4 border-purple-500 rounded-xl overflow-hidden max-w-xl mx-auto mb-4">
                    <div class="grid grid-cols-3">
                        <img src="{{ asset('images/products/fat-bunner-coffee.jpeg') }}" alt="Fat Burner Coffee" class="w-full h-full object-cover">
                        <img src="{{ asset('images/products/Fat-suppliment-pill.jpeg') }}" alt="Fat Supplement Pill" class="w-full h-full object-cover">
                        <img src="{{ asset('images/products/flat-tummy-tea.jpeg') }}" alt="Flat Tummy Tea" class="w-full h-full object-cover">
                    </div>
                </div>
                <div class="text-center">
                    <div class="flex items-center justify-center gap-3 mb-4">
                        <span class="text-lg text-gray-400 line-through">₦105,000</span>
                        <span class="text-3xl font-bold text-purple-600">₦90,000</span>
                    </div>
                    <a href="/checkout?product=bundle" class="bg-purple-500 text-white px-6 py-3 rounded-full font-semibold hover:bg-purple-600 transition inline-block">Get Bundle Now</a>
                </div>
            </div>
        </div>
    </section>

    <!-- Benefits Section -->
    <section class="py-16 px-4 bg-gradient-to-b from-blue-50 to-purple-50">
        <div class="max-w-6xl mx-auto">
            <h2 class="text-4xl font-bold text-center text-gray-800 mb-12">Why Choose Us?</h2>
            <div class="grid md:grid-cols-3 gap-8">
                <div class="text-center">
                    <div class="text-5xl mb-4">🌿</div>
                    <h3 class="text-xl font-bold text-gray-800 mb-2">100% Natural</h3>
                    <p class="text-gray-600">All ingredients are natural and safe</p>
                </div>
                <div class="text-center">
                    <div class="text-5xl mb-4">⚡</div>
                    <h3 class="text-xl font-bold text-gray-800 mb-2">Fast Results</h3>
                    <p class="text-gray-600">See results in just 2 weeks</p>
                </div>
                <div class="text-center">
                    <div class="text-5xl mb-4">💯</div>
                    <h3 class="text-xl font-bold text-gray-800 mb-2">Money Back Guarantee</h3>
                    <p class="text-gray-600">30-day satisfaction guarantee</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Reviews Section -->
    <section class="py-16 px-4 bg-white">
        <div class="max-w-6xl mx-auto">
            <h2 class="text-4xl font-bold text-center text-gray-800 mb-12">What Our Customers Say</h2>
            <div class="grid md:grid-cols-3 gap-8">
                <div class="bg-gray-50 rounded-2xl p-6">
                    <div class="w-16 h-16 rounded-full bg-gray-300 mb-4 mx-auto overflow-hidden">
                        <img src="https://ui-avatars.com/api/?name=Sarah+M&background=ec4899&color=fff&size=128" alt="Sarah M" class="w-full h-full object-cover">
                    </div>
                    <div class="text-yellow-400 text-2xl mb-4 text-center">⭐⭐⭐⭐⭐</div>
                    <p class="text-gray-700 mb-4 text-center">"Lost 15 pounds in just one month! The Slim Tea is amazing!"</p>
                    <p class="font-semibold text-gray-800 text-center">- Sarah M.</p>
                </div>
                <div class="bg-gray-50 rounded-2xl p-6">
                    <div class="w-16 h-16 rounded-full bg-gray-300 mb-4 mx-auto overflow-hidden">
                        <img src="https://ui-avatars.com/api/?name=Jessica+L&background=8b5cf6&color=fff&size=128" alt="Jessica L" class="w-full h-full object-cover">
                    </div>
                    <div class="text-yellow-400 text-2xl mb-4 text-center">⭐⭐⭐⭐⭐</div>
                    <p class="text-gray-700 mb-4 text-center">"The Fat Burner gave me so much energy and I'm seeing real results!"</p>
                    <p class="font-semibold text-gray-800 text-center">- Jessica L.</p>
                </div>
                <div class="bg-gray-50 rounded-2xl p-6">
                    <div class="w-16 h-16 rounded-full bg-gray-300 mb-4 mx-auto overflow-hidden">
                        <img src="https://ui-avatars.com/api/?name=Maria+K&background=10b981&color=fff&size=128" alt="Maria K" class="w-full h-full object-cover">
                    </div>
                    <div class="text-yellow-400 text-2xl mb-4 text-center">⭐⭐⭐⭐⭐</div>
                    <p class="text-gray-700 mb-4 text-center">"Best investment I made for my health. Highly recommend the bundle!"</p>
                    <p class="font-semibold text-gray-800 text-center">- Maria K.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- FAQ Section -->
    <section class="py-16 px-4 bg-gradient-to-b from-pink-50 to-blue-50">
        <div class="max-w-4xl mx-auto">
            <h2 class="text-4xl font-bold text-center text-gray-800 mb-12">Frequently Asked Questions</h2>
            <div class="space-y-4">
                <details class="bg-white rounded-2xl p-6 cursor-pointer group">
                    <summary class="font-bold text-gray-800 flex justify-between items-center list-none">
                        How long does shipping take?
                        <span class="text-2xl transition-transform duration-300 group-open:rotate-90">&gt;</span>
                    </summary>
                    <p class="text-gray-600 mt-4 animate-fadeIn">We ship within 24 hours. Delivery takes 3-5 business days.</p>
                </details>
                <details class="bg-white rounded-2xl p-6 cursor-pointer group">
                    <summary class="font-bold text-gray-800 flex justify-between items-center list-none">
                        Are there any side effects?
                        <span class="text-2xl transition-transform duration-300 group-open:rotate-90">&gt;</span>
                    </summary>
                    <p class="text-gray-600 mt-4 animate-fadeIn">Our products are 100% natural with no known side effects.</p>
                </details>
                <details class="bg-white rounded-2xl p-6 cursor-pointer group">
                    <summary class="font-bold text-gray-800 flex justify-between items-center list-none">
                        How do I use these products?
                        <span class="text-2xl transition-transform duration-300 group-open:rotate-90">&gt;</span>
                    </summary>
                    <p class="text-gray-600 mt-4 animate-fadeIn">Detailed usage instructions are included with each product. Generally, take as directed daily for best results.</p>
                </details>
            </div>
        </div>
    </section>

    <style>
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(-10px); }
            to { opacity: 1; transform: translateY(0); }
        }
        .animate-fadeIn {
            animation: fadeIn 0.3s ease-out;
        }
    </style>

    <!-- Final CTA -->
    <section class="py-20 px-4 bg-gradient-to-r from-purple-500 to-pink-500 text-white">
        <div class="max-w-4xl mx-auto text-center">
            <h2 class="text-4xl font-bold mb-4">Ready to Transform Your Body?</h2>
            <p class="text-xl mb-8">Limited time offer - Order now and get FREE shipping!</p>
            <a href="#products" class="bg-white text-purple-600 px-8 py-4 rounded-full text-lg font-semibold hover:bg-gray-100 transition inline-block">Shop Now</a>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-gray-800 text-white py-8 px-4">
        <div class="max-w-6xl mx-auto text-center">
            <p class="mb-2">© 2026 Weight Loss Products. All rights reserved.</p>
            <p class="text-gray-400 text-sm">Contact: +2347031454959</p>
        </div>
    </footer>

    <!-- WhatsApp Floating Button -->
    <a href="https://wa.me/2347031454959" target="_blank" class="fixed bottom-6 right-6 bg-green-500 text-white p-4 rounded-full shadow-lg hover:bg-green-600 transition-all hover:scale-110 z-50">
        <svg class="w-8 h-8" fill="currentColor" viewBox="0 0 24 24">
            <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413Z"/>
        </svg>
    </a>

</body>
</html>

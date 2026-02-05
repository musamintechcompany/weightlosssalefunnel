<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Mail;
use App\Models\Order;
use App\Mail\OrderConfirmation;
use App\Mail\NewOrderNotification;
use App\Http\Controllers\PaymentController;

Route::get('/', function () {
    return view('landing');
});

Route::get('/checkout', function () {
    return view('checkout');
});

Route::post('/process-order', function () {
    $validated = request()->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email',
        'phone' => 'required|string',
        'address' => 'required|string',
        'city' => 'required|string',
        'state' => 'required|string',
        'zip' => 'required|string',
        'product' => 'required|string',
        'quantity' => 'nullable|integer|min:1'
    ]);

    // Product prices
    $products = [
        'fat-burner-coffee' => ['name' => 'Fat Burner Coffee', 'price' => 35000],
        'fat-supplement-pill' => ['name' => 'Fat Supplement Pill', 'price' => 35000],
        'flat-tummy-tea' => ['name' => 'Flat Tummy Tea', 'price' => 35000],
        'bundle' => ['name' => 'Complete Bundle (All 3)', 'price' => 90000],
        'combo-coffee-pill' => ['name' => 'Combo: Coffee + Pill', 'price' => 65000],
        'combo-coffee-tea' => ['name' => 'Combo: Coffee + Tea', 'price' => 65000],
        'combo-pill-tea' => ['name' => 'Combo: Pill + Tea', 'price' => 65000]
    ];

    $selectedProduct = $products[$validated['product']] ?? $products['flat-tummy-tea'];
    $quantity = $validated['quantity'] ?? 1;
    $total = $selectedProduct['price'] * $quantity;

    // Save order to database
    $order = Order::create([
        'name' => $validated['name'],
        'email' => $validated['email'],
        'phone' => $validated['phone'],
        'address' => $validated['address'],
        'city' => $validated['city'],
        'state' => $validated['state'],
        'zip' => $validated['zip'],
        'product' => $validated['product'],
        'total' => $total,
        'payment_status' => 'pending'
    ]);

    // Add product name to order for display
    $order->product_name = $selectedProduct['name'];

    // Redirect to payment selection page
    return view('payment', ['order' => $order]);
});

// Paystack Routes
Route::post('/payment/paystack', [PaymentController::class, 'initializePaystack'])->name('payment.paystack');
Route::get('/payment/paystack/callback', [PaymentController::class, 'paystackCallback'])->name('paystack.callback');

// Flutterwave Routes
Route::post('/payment/flutterwave', [PaymentController::class, 'initializeFlutterwave'])->name('payment.flutterwave');
Route::get('/payment/flutterwave/callback', [PaymentController::class, 'flutterwaveCallback'])->name('flutterwave.callback');

Route::get('/thankyou', function () {
    return view('thankyou');
});

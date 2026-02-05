<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Mail;
use App\Models\Order;
use App\Mail\OrderConfirmation;
use App\Mail\NewOrderNotification;

class PaymentController extends Controller
{
    private function getPaystackSecretKey()
    {
        // Use live key in production, test key otherwise
        return config('app.env') === 'production' 
            ? env('PAYSTACK_SECRET_KEY_LIVE') 
            : env('PAYSTACK_SECRET_KEY_TEST');
    }

    private function getFlutterwaveSecretKey()
    {
        // Use live key in production, test key otherwise
        return config('app.env') === 'production' 
            ? env('FLUTTERWAVE_SECRET_KEY_LIVE') 
            : env('FLUTTERWAVE_SECRET_KEY_TEST');
    }

    public function initializePaystack(Request $request)
    {
        $order = Order::findOrFail($request->order_id);
        
        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . $this->getPaystackSecretKey(),
            'Content-Type' => 'application/json',
        ])->post('https://api.paystack.co/transaction/initialize', [
            'email' => $order->email,
            'amount' => $order->total * 100, // Paystack uses kobo
            'reference' => 'ORD-' . $order->id . '-' . time(),
            'callback_url' => route('paystack.callback'),
            'metadata' => [
                'order_id' => $order->id,
                'customer_name' => $order->name,
            ]
        ]);

        if ($response->successful()) {
            $data = $response->json();
            return redirect($data['data']['authorization_url']);
        }

        return back()->with('error', 'Payment initialization failed');
    }

    public function paystackCallback(Request $request)
    {
        $reference = $request->reference;
        
        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . $this->getPaystackSecretKey(),
        ])->get("https://api.paystack.co/transaction/verify/{$reference}");

        if ($response->successful()) {
            $data = $response->json();
            
            if ($data['data']['status'] === 'success') {
                $orderId = $data['data']['metadata']['order_id'];
                $order = Order::find($orderId);
                
                if ($order) {
                    $order->update([
                        'payment_status' => 'paid',
                        'payment_method' => 'paystack',
                        'payment_reference' => $reference
                    ]);

                    // Get product name
                    $products = [
                        'slim-tea' => 'Slim Tea',
                        'fat-burner' => 'Fast Fat Burner',
                        'bundle' => 'Complete Bundle'
                    ];

                    // Send emails
                    $orderData = [
                        'name' => $order->name,
                        'email' => $order->email,
                        'phone' => $order->phone,
                        'address' => $order->address,
                        'city' => $order->city,
                        'state' => $order->state,
                        'zip' => $order->zip,
                        'product_name' => $products[$order->product] ?? $order->product,
                        'total' => $order->total
                    ];

                    Mail::to($order->email)->send(new OrderConfirmation($orderData));
                    Mail::to(env('ADMIN_EMAIL'))->send(new NewOrderNotification($orderData));
                }
                
                return redirect('/thankyou');
            }
        }

        return redirect('/checkout')->with('error', 'Payment verification failed');
    }

    public function initializeFlutterwave(Request $request)
    {
        $order = Order::findOrFail($request->order_id);
        
        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . $this->getFlutterwaveSecretKey(),
            'Content-Type' => 'application/json',
        ])->post('https://api.flutterwave.com/v3/payments', [
            'tx_ref' => 'FLW-' . $order->id . '-' . time(),
            'amount' => $order->total,
            'currency' => 'NGN',
            'redirect_url' => route('flutterwave.callback'),
            'customer' => [
                'email' => $order->email,
                'name' => $order->name,
                'phonenumber' => $order->phone,
            ],
            'customizations' => [
                'title' => 'Weight Loss Products',
                'description' => $order->product,
            ],
            'meta' => [
                'order_id' => $order->id,
            ]
        ]);

        if ($response->successful()) {
            $data = $response->json();
            return redirect($data['data']['link']);
        }

        return back()->with('error', 'Payment initialization failed');
    }

    public function flutterwaveCallback(Request $request)
    {
        $transactionId = $request->transaction_id;
        
        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . $this->getFlutterwaveSecretKey(),
        ])->get("https://api.flutterwave.com/v3/transactions/{$transactionId}/verify");

        if ($response->successful()) {
            $data = $response->json();
            
            if ($data['data']['status'] === 'successful') {
                $orderId = $data['data']['meta']['order_id'];
                $order = Order::find($orderId);
                
                if ($order) {
                    $order->update([
                        'payment_status' => 'paid',
                        'payment_method' => 'flutterwave',
                        'payment_reference' => $transactionId
                    ]);

                    // Get product name
                    $products = [
                        'slim-tea' => 'Slim Tea',
                        'fat-burner' => 'Fast Fat Burner',
                        'bundle' => 'Complete Bundle'
                    ];

                    // Send emails
                    $orderData = [
                        'name' => $order->name,
                        'email' => $order->email,
                        'phone' => $order->phone,
                        'address' => $order->address,
                        'city' => $order->city,
                        'state' => $order->state,
                        'zip' => $order->zip,
                        'product_name' => $products[$order->product] ?? $order->product,
                        'total' => $order->total
                    ];

                    Mail::to($order->email)->send(new OrderConfirmation($orderData));
                    Mail::to(env('ADMIN_EMAIL'))->send(new NewOrderNotification($orderData));
                }
                
                return redirect('/thankyou');
            }
        }

        return redirect('/checkout')->with('error', 'Payment verification failed');
    }
}

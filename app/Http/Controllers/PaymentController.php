<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Deal;
use Stripe\Stripe;
use Stripe\Checkout\Session;

class PaymentController extends Controller
{
    public function checkout($dealId){

        $deal = Deal::findOrFail($dealId);
        
        Stripe::setApiKey(config('services.stripe.secret'));

        $session = Session::create([
            'payment_method_types' => ['card'],
            'line_items' => [[
                'price_data' => [
                    'currency' => 'inr',
                    'product_data' => [
                        'name' => $deal->title,
                    ],
                    'unit_amount' => $deal->amount * 100,
                ],
                'quantity' => 1,
            ]],
            'mode' => 'payment',
            'success_url' => route('payment.success', ['deal' => $dealId]),
            'cancel_url' => route('payment.cancel'),
        ]);
        return redirect($session->url);
    }

    public function success(Request $request, $dealId)
    {
        $deal = Deal::findOrFail($dealId);

        // update to won when payment is successful
        $deal->update(['status' => 'won']);

        return redirect('/deals')->with('success', 'Payment successful!');
    }

    // when cancelled from stripe checkout page
    public function cancel()
    {
        return redirect('/deals')->with('error', 'Payment cancelled.');
    }
}

<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Stripe\Stripe;
use Stripe\Charge;
use Session;

class PaymentController extends Controller
{
    public function index(Request $request)
    {

        return view('frontend.payment_function');
    }

    public function post_getway(Request $request)
    {

            Stripe::setApiKey(env('STRIPE_SECRET'));
            Charge::create ([
                "amount" => $request->package,
                "currency" => "usd",
                "source" => $request->stripeToken,
                "description" => "Test payment from itsolutionstuff.com."
            ]);


            return redirect()->route('frontend.dashboard.donation_complete',$request->receiver_id);





    }
}

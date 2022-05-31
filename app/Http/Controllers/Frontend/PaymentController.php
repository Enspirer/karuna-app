<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Stripe\Stripe;
use Stripe\Charge;
use Session;
use App\Models\Receivers;
use Carbon\Carbon;

class PaymentController extends Controller
{
    public function index(Request $request)
    {

        return view('frontend.payment_function');
    }

    public function post_getway(Request $request)
    {

        try{
            Stripe::setApiKey(env('STRIPE_SECRET'));
            Charge::create ([
                "amount" => $request->package * 100,
                "currency" => "usd",
                "source" => $request->stripeToken,
                "description" => "Donation Payment."
            ]);
        }catch (\Exception $exception){
            if(is_mobile(request()->header('user-agent')) == true){
                return redirect()->route('frontend.user.dashboard');
            }else{
                return redirect()->route('frontend.user.dashboard');
            }

        }


        $receiver = Receivers::where('id',$request->receiver_id)->first();

        $update = new Receivers;        
        $update->paid_at = Carbon::now();
        $update->donor_id = auth()->user()->id;            
        $update->amount = $request->package;
        $update->payment_status = 'Payment Completed';
        $update->status = 'Agent Not Responded';
        Receivers::whereId($receiver->id)->update($update->toArray());

        if(is_mobile(request()->header('user-agent')) == true){
            return redirect()->route('frontend.user.mobile.success',$request->package);
        }

        return redirect()->route('frontend.user.dashboard.donation_complete',$request->receiver_id);

        $receiver = Receivers::where('id',$request->receiver_id)->first();


    }
}

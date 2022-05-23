<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Receivers;
use App\Models\Packages;
use App\Models\Auth\User;

class MobileController extends Controller
{
    public function splash()
    {
        return view('frontend.mobile.splash');
    }

    public function login()
    {
        if(!empty( auth()->user()->id) === true ){
            return redirect()->route('frontend.mobile.index');
        }

        return view('frontend.mobile.login');
    }

    public function register()
    {
        if(!empty( auth()->user()->id) === true ){
            return redirect()->route('frontend.mobile.index');
        }

        return view('frontend.mobile.register');
    }

    public function index()
    {
        if(!empty( auth()->user()->id) === false ){
            return redirect()->route('frontend.mobile.login');
        }

        return view('frontend.mobile.index');
    }

    public function donation_info($id)
    {
        $receiver = Receivers::where('id',$id)->first();
        $agent = User::where('id',$receiver->assigned_agent)->first();

        return view('frontend.mobile.donation_info',[
            'receiver' => $receiver,
            'agent' => $agent
        ]);
    }

    public function donation_list()
    {
        $receivers = Receivers::where('assigned_agent',auth()->user()->id)->orderBy('id','desc')->paginate(6);

        return view('frontend.mobile.donation_list',[
            'receivers' => $receivers
        ]);
    }

    public function payment($receiver_id)
    {
        $receiverDetails = Receivers::where('id',$receiver_id)->first();
        $agentDetails = User::where('id',$receiverDetails->assigned_agent)->first();


        if($receiverDetails->requirement == 'Other'){
            $packageDetails = null;
        }else{
            $packageDetails = Packages::where('id',$receiverDetails->requirement)->first();
        }

        return view('frontend.mobile.payment',[
            'agentDetails' => $agentDetails,
            'packageDetails' => $packageDetails,
            'receiverDetails' => $receiverDetails
        ]);
    }

    public function success()
    {
        return view('frontend.mobile.success');
    }

    public function profile_menu()
    {
        return view('frontend.mobile.profile_menu');
    }

    public function donation()
    {
        return view('frontend.mobile.donation');
    }

    public function profile()
    {
        return view('frontend.mobile.profile');
    }

    public function donation_history()
    {
        return view('frontend.mobile.donation_history');
    }

    public function notification()
    {
        return view('frontend.mobile.notification');
    }

    public function thanks()
    {
        return view('frontend.mobile.thanks');
    }

    public function payment_history()
    {
        return view('frontend.mobile.payment_history');
    }

    public function receivers_list()
    {
        return view('frontend.mobile.receivers_list');
    }

    public function receiver()
    {
        return view('frontend.mobile.receiver');
    }

    public function receiver_edit()
    {
        return view('frontend.mobile.receiver_edit');
    }

    public function receiver_request_list()
    {
        return view('frontend.mobile.receiver_request_list');
    }

    public function receiver_request_approve()
    {
        return view('frontend.mobile.receiver_request_approve');
    }

    public function confirmation()
    {
        return view('frontend.mobile.confirmation');
    }

    public function view_profile()
    {
        return view('frontend.mobile.view_profile');
    }
}

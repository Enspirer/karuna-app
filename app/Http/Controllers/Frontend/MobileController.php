<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Receivers;
use App\Models\Packages;
use App\Models\Notification;
use App\Models\ReceiversRequest;
use App\Models\Auth\User;
use Illuminate\Support\Facades\Hash;


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
        $receivers_for_donor = Receivers::where('payment_status',null)->orderBy('id','desc')->paginate(6);

        return view('frontend.mobile.donation_list',[
            'receivers' => $receivers,
            'receivers_for_donor' => $receivers_for_donor
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

    public function success($amount)
    {
        return view('frontend.mobile.success',[
            'amount' => $amount
        ]);
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

    public function thanks($id)
    {
        $notification = Notification::where('id',$id)->first();
        // dd($notification);

        $receiver = Receivers::where('id',$notification->link)->first();
        // dd($receiver);

        $update = new Notification;        
        $update->status = 'Seen';
        Notification::whereId($notification->id)->update($update->toArray());


        return view('frontend.mobile.thanks',[
            'receiver' => $receiver
        ]);
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

    public function receiver_agent($id)
    {
        $receiver = Receivers::where('id',$id)->first();

        return view('frontend.mobile.receiver_agent',[
            'receiver' => $receiver
        ]);
    }

    public function receiver_edit()
    {
        return view('frontend.mobile.receiver_edit');
    }

    public function receiver_edit_agent($id)
    {
        $receiver = Receivers::where('id',$id)->first();

        return view('frontend.mobile.receiver_edit_agent',[
            'receiver' => $receiver
        ]);
    }

    public function receiver_request_list()
    {
        return view('frontend.mobile.receiver_request_list');
    }

    public function receiver_request_approve($id)
    {
        $receiver_request = ReceiversRequest::where('id',$id)->first();
        $receiver = Receivers::where('id',$receiver_request->receiver_id)->first();

        return view('frontend.mobile.receiver_request_approve',[
            'receiver' => $receiver,
            'receiver_request' => $receiver_request
        ]);
    }

    public function agent_confirmation($id)
    {
        $notification = Notification::where('id',$id)->first();
        // dd($notification);

        $receiver = Receivers::where('id',$notification->link)->first();
        // dd($receiver);

        $update = new Notification;        
        $update->status = 'Seen';
        Notification::whereId($notification->id)->update($update->toArray());

        return view('frontend.mobile.agent_confirmation',[
            'receiver' => $receiver
        ]);
    }

    public function receiver_confirmation()
    {
        return view('frontend.mobile.receiver_confirmation');
    }

    public function view_profile_agent()
    {
        return view('frontend.mobile.view_profile');
    }

    public function view_profile_donor()
    {
        return view('frontend.mobile.view_profile_donor');
    }

    public function view_profile_receiver($id)
    {
        $receiver = Receivers::where('id',$id)->first();
        
        return view('frontend.mobile.view_profile_receiver',[
            'receiver' => $receiver
        ]);
    }


    public function mobile_receiver_request_update(Request $request)
    {
        $update = new ReceiversRequest;
        $update->status=$request->status;
        ReceiversRequest::whereId($request->hidden_id)->update($update->toArray());

        if($request->status == 'Approved'){

            $rec_req = ReceiversRequest::where('id',$request->hidden_id)->first();

            $update = new Receivers;
            $update->profile_image=$rec_req->profile_image;
            $update->cover_image=$rec_req->cover_image;
            $update->name=$rec_req->name;
            if(isset($rec_req->name_toggle)){
                $update->name_toggle=$rec_req->name_toggle;
            }
            $update->nick_name=$rec_req->nick_name;
            $update->age=$rec_req->age;
            $update->gender=$rec_req->gender;
            $update->country=$rec_req->country;
            $update->city=$rec_req->city;
            $update->nic_number=$rec_req->nic_number;
            $update->address=$rec_req->address;
            $update->phone_number=$rec_req->phone_number;
            $update->occupation=$rec_req->occupation;
            $update->bio=$rec_req->bio;
            $update->images=$rec_req->images;
            $update->videos=$rec_req->videos;
            $update->audios=$rec_req->audios;
            $update->about_donation=$rec_req->about_donation;
            $update->account_number=$rec_req->account_number;
            $update->requirement=$rec_req->requirement;
            $update->other_description=$rec_req->other_description;
            $update->account_details=$rec_req->account_details;
            $update->assigned_agent = auth()->user()->id;
            $update->status='Approved';
            Receivers::whereId($rec_req->receiver_id)->update($update->toArray());

        }

        return redirect()->route('frontend.mobile.receiver_request_list');

    }





    
}

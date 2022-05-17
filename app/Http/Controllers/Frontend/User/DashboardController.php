<?php

namespace App\Http\Controllers\Frontend\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Receivers;
/**
 * Class DashboardController.
 */
class DashboardController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('frontend.user.dashboard');
    }

    public function receiver()
    {
        return view('frontend.user.receiver');
    }

    public function receiver_request_list()
    {
        return view('frontend.user.receiver_request_list');
    }

    public function receiver_request()
    {
        return view('frontend.user.receiver_request');
    }

    public function agent_profile()
    {
        return view('frontend.user.agent_profile');
    }

    public function notification()
    {
        return view('frontend.user.notification');
    }

    public function notification_submit()
    {
        return view('frontend.user.notification_submit');
    }

    public function payment_history()
    {
        return view('frontend.user.payment_history');
    }

    public function donation_complete()
    {
        return view('frontend.user.donation_complete');
    }

    public function create_receiver(Request $request)
    {        
        // dd($request);
       
        $account_details = [
            'account_number' => $request->account_number,
            'bank_name' => $request->bank_name,
            'branch_name' => $request->branch_name
        ];

        $add = new Receivers;

        $add->profile_image=$request->profile_image;
        $add->cover_image=$request->cover_image;
        $add->name=$request->name; 
        $add->name_toggle=$request->name_toggle; 
        $add->nick_name=$request->nick_name; 
        $add->age=$request->age; 
        $add->gender=$request->gender; 
        $add->country=$request->country; 
        $add->city=$request->city; 
        $add->nic_number=$request->nic_number; 
        $add->address=$request->address; 
        $add->phone_number=$request->phone_number; 
        $add->occupation=$request->occupation; 
        $add->bio=$request->bio; 
        $add->images=$request->images; 
        $add->videos=$request->videos; 
        $add->audios=$request->audios; 
        $add->about_donation=$request->about_donation; 
        $add->account_number=$request->account_number; 
        $add->requirement=$request->requirement;
        $add->other_description=$request->other_description;
        if($request->account_number != null){
            $add->account_details=json_encode($account_details);  
        }
        $add->assigned_agent = auth()->user()->id;
        $add->status='Approved';
        $add->save();

        return back()->withFlashSuccess('Added Successfully');

    }


}

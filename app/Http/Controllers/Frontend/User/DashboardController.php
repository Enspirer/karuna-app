<?php

namespace App\Http\Controllers\Frontend\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Receivers;
use App\Models\ReceiversRequest;
use App\Models\Auth\User;
use DB;

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

    public function receiver($id)
    {
        // dd($id);
        $receiver = Receivers::where('id',$id)->first();

        return view('frontend.user.receiver',[
            'receiver' => $receiver
        ]);
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

    public function settings()
    {
        return view('frontend.user.settings');
    }

    public function help()
    {
        return view('frontend.user.help');
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

    public function update_agent(Request $request) {   

        $email = $request->email;             
        $hidden_id = $request->hidden_id;     

        $user = User::where('id',$hidden_id)->first();  
        // dd($user);
   
           
        if($request->city != null){
            $city = $request->city;     
        }
        else{
            $city = $user->city;     
        }

        $users = DB::table('users') ->where('id', '=', $user->id)->update(
            [
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'email' => $request->email,
                'country' => $request->country,
                'city' => $city,
                'nic_number' => $request->nic_number,
                'occupation' => $request->occupation,
                'contact_number' => $request->contact_number,
                'contact_number_two' => $request->contact_number_two,
                'address' => $request->address
            ]    
        );

        return back()->withFlashSuccess('Updated Successfully');                                
       
    }


    public function update_receiver(Request $request)
    {        
        // dd($request);
       
        $account_details = [
            'account_number' => $request->account_number,
            'bank_name' => $request->bank_name,
            'branch_name' => $request->branch_name
        ];

        $update = new Receivers;

        $update->profile_image=$request->profile_image;
        $update->cover_image=$request->cover_image;
        $update->name=$request->name; 
        if(isset($request->name_toggle)){
            $update->name_toggle=$request->name_toggle; 
        }else{
            $update->name_toggle='no'; 
        }
        $update->nick_name=$request->nick_name; 
        $update->age=$request->age; 
        $update->gender=$request->gender; 
        $update->country=$request->country; 
        $update->city=$request->city; 
        $update->nic_number=$request->nic_number; 
        $update->address=$request->address; 
        $update->phone_number=$request->phone_number; 
        $update->occupation=$request->occupation; 
        $update->bio=$request->bio; 
        $update->images=$request->images; 
        $update->videos=$request->videos; 
        $update->audios=$request->audios; 
        $update->about_donation=$request->about_donation; 
        $update->account_number=$request->account_number; 
        $update->requirement=$request->requirement;
        $update->other_description=$request->other_description;
        if($request->account_number != null){
            $update->account_details=json_encode($account_details);  
        }
        $update->assigned_agent = auth()->user()->id;
        $update->status='Approved';

        Receivers::whereId($request->hidden_id)->update($update->toArray());
        
        return back();


    }
    
    public function receiver_request_update(Request $request)
    {    
        // dd($request);

        $update = new ReceiversRequest;
        $update->status=$request->status;
        
        ReceiversRequest::whereId($request->hidden_id)->update($update->toArray());

        return redirect()->route('frontend.dashboard.receiver_request_list');                      

    }
    

}

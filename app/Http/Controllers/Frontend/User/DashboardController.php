<?php

namespace App\Http\Controllers\Frontend\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Receivers;
use App\Models\Notification;
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

    public function receiver_request($id)
    {
        $receiver_request = ReceiversRequest::where('id',$id)->first();
        $receiver = Receivers::where('id',$receiver_request->receiver_id)->first();

        return view('frontend.user.receiver_request',[
            'receiver' => $receiver,
            'receiver_request' => $receiver_request
        ]);
    }

    public function profile_edit()
    {
        return view('frontend.user.agent_profile');
    }

    public function notification()
    {
        return view('frontend.user.notification');
    }

    public function notification_submit($id)
    {
        $notification = Notification::where('id',$id)->first();
        // dd($notification);

        $receiver = Receivers::where('id',$notification->link)->first();
        // dd($receiver);

        $update = new Notification;        
        $update->status = 'Seen';
        Notification::whereId($notification->id)->update($update->toArray());
        
        return view('frontend.user.notification_submit',[
            'receiver' => $receiver
        ]);
    }

    public function payment_history()
    {
        return view('frontend.user.payment_history');
    }

    public function donation_complete($receiver_id)
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

        if(is_mobile(request()->header('user-agent')) == true){
            return redirect()->route('frontend.user.mobile.index');
        }

        return back()->withFlashSuccess('Added Successfully');

    }

    public function update_agent(Request $request) {

        dd($request);
        if($request->id_photo == null){
            if(auth()->user()->id_photo == null){
                return back()->withErrors('Please add an ID Card Photo');
            }
        }

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

        if($request->file('id_photo'))
        {            
            $preview_file_name = time().'_'.rand(1000,10000).'.'.$request->id_photo->getClientOriginalExtension();
            $fullurls_preview_file = $request->id_photo->move(public_path('files/agents_id'), $preview_file_name);
            $image_url = $preview_file_name;
        }else{
            $image_url = auth()->user()->id_photo;
        } 

        $users = DB::table('users') ->where('id', '=', $user->id)->update(
            [
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'email' => $request->email,
                'country' => $request->country,
                'city' => $city,
                'nic_number' => $request->nic_number,
                'id_photo' => $image_url,
                'occupation' => $request->occupation,
                'contact_number' => $request->contact_number,
                'contact_number_two' => $request->contact_number_two,
                'address' => $request->address,
                'profile_image' => $request->profile_image,
                'bio' => $request->bio
            ]
        );

        return back()->with([
            'success' => 'Updated Successfully.'
        ]); 

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

        if(is_mobile(request()->header('user-agent')) == true){
            return redirect()->route('frontend.user.mobile.receiver_agent',$request->hidden_id);
        }

        return back();


    }

    public function receiver_request_update(Request $request)
    {
        // dd($request);

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

        return redirect()->route('frontend.user.dashboard.receiver_request_list');

    }

    public function notification_store(Request $request)
    {
        // dd($request);

        $update = new Receivers;
        $update->thankyou_message=$request->thankyou_message;
        $update->proof_images=$request->proof_images;
        $update->status='Task Success';
        Receivers::whereId($request->hidden_id)->update($update->toArray());


        $rec = Receivers::where('id',$request->hidden_id)->first();
        $donor = User::where('id',$rec->donor_id)->first();
    
        create_notification($rec->donor_id, 'Donation Successful. Thanks for your support', $donor->first_name.' '.$donor->last_name.' donated USD '.$rec->amount.' to '.$rec->name, $rec->id);

        if(is_mobile(request()->header('user-agent')) == true){
            return redirect()->route('frontend.user.mobile.index');
        }

        return redirect()->route('frontend.user.dashboard.notification');
        
    }
        


}

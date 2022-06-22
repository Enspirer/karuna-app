<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Receivers;
use Composer\Package\Package;
use Illuminate\Http\Request;
use DataTables;
use DB;
use App\Models\Auth\User;
use App\Models\DonateGigs;
use App\Events\Frontend\Auth\UserRegistered;
use App\Http\Requests\Frontend\Auth\RegisterRequest;
use App\Repositories\Frontend\Auth\UserRepository;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use App\Models\Packages;

class ListController extends Controller
{
    public function agent()
    {
        return view('backend.user_list.agent');
    }

    public function agent_create()
    {
        return view('backend.user_list.agent_create');
    }

    public function agent_edit($id)
    {
        $agent = User::where('user_type','Agent')->where('id',$id)->first();

        return view('backend.user_list.agent_edit',[
            'agent' => $agent
        ]);
    }

    public function agent_show($id)
    {
        $agent = User::where('user_type','Agent')->where('id',$id)->first();

        return view('backend.user_list.agent_show',[
            'agent' => $agent
        ]);
    }

    public function agent_store(RegisterRequest $request)
    {
        // dd($request);

        $password = $request->password;
        $password_confirmation = $request->password_confirmation;

        if($password != $password_confirmation){
            return back()->withErrors('The password confirmation does not match.');
        }

        $password_count = strlen($password);

        if($password_count < 8){
            return back()->withErrors('The password must be at least 8 characters.');
        }

        if($request->file('id_photo'))
        {            
            $preview_file_name = time().'_'.rand(1000,10000).'.'.$request->id_photo->getClientOriginalExtension();
            $fullurls_preview_file = $request->id_photo->move(public_path('files/agents_id'), $preview_file_name);
            $image_url = $preview_file_name;
        }else{
            $image_url = null;
        } 

        $hashed_password = Hash::make($password);

        $user_number = User::where('user_type','Agent')->where('agent_number','!=',null)->latest()->first();
        if($user_number == null){
            $user_agent_number = 1;
        }
        else{
            $user_agent_number = $user_number->agent_number + 1;
        }

        $add = new User;

        $add->first_name=$request->first_name;
        $add->last_name=$request->last_name;
        $add->email=$request->email;
        $add->bio=$request->bio;
        $add->profile_image=$request->profile_image;
        $add->user_type=$request->user_type;
        $add->country=$request->country;
        $add->district=$request->district;
        $add->city=$request->city;
        $add->nic_number=$request->nic_number;
        $add->id_photo=$image_url;
        $add->occupation=$request->occupation;
        $add->contact_number=$request->contact_number;
        $add->contact_number_two=$request->contact_number_two;
        $add->agent_number=$request->user_agent_number;
        $add->level='Level 1';
        $add->address=$request->address;
        $add->password=$hashed_password;
        $add->confirmed=1;

        $add->save();

        return redirect()->route('admin.agent.index')->withFlashSuccess('Added Successfully');
    }

    
    public function agent_update(Request $request) 
    {
        $email = $request->email;
        $hidden_id = $request->hidden_id;

        $user = User::where('id',$hidden_id)->first();
        // dd($user);

        if($request->id_photo == null){
            if(auth()->user()->id_photo == null){
                return back()->withErrors('Please add an ID Card Photo');
            }
        }
      
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
                'district' => $request->district,
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

        return redirect()->route('admin.agent.index')->withFlashSuccess('Updated Successfully');

    }


    public function agent_status_update(Request $request)
    {
        // dd($request);

        $update = new DonateGigs;
        $update->confirmed=$request->confirmed;
        $update->level=$request->level;

        User::whereId($request->hidden_id)->update($update->toArray());

        return redirect()->route('admin.agent.index')->withFlashSuccess('Updated Successfully');

    }


    public function get_agent_details(Request $request)
    {
        if($request->ajax())
        {
            $data = User::where('user_type','Agent')->get();
            return DataTables::of($data)

            ->addColumn('action', function($data){
                $button = '<a href="'.route('admin.agent.show',$data->id).'" name="show" id="'.$data->id.'" class="edit btn btn-primary btn-sm ml-3" style="margin-right: 10px"><i class="fas fa-list"></i> View </a>';
                $button .= '<a href="'.route('admin.agent_edit',$data->id).'" name="agent_edit" id="'.$data->id.'" class="edit btn btn-secondary btn-sm ml-3" style="margin-right: 10px"><i class="fas fa-edit"></i> Edit </a>';
                $button .= '<a href="'.route('admin.receivers_list',$data->id).'" name="edit" id="'.$data->id.'" class="edit btn btn-warning btn-sm ml-3 mr-3"><i class="fas fa-user-friends"></i> Receivers ('.count(Receivers::where('assigned_agent',$data->id)->get()).')</a>';
                return $button;
            })
            ->addColumn('name', function($data){
                $name = $data->first_name.' '.$data->last_name ;
                return $name;
            })
            ->addColumn('confirmed', function($data){
                if($data->confirmed == 'true'){
                    $confirmed = '<span class="badge badge-success">Enabled</span>';
                }
                else{
                    $confirmed = '<span class="badge badge-danger">Disabled</span>';
                }
                return $confirmed;
            })
          
            ->rawColumns(['action','name','confirmed'])
            ->make(true);
        }
        return back();
    }



    // **********************************************************************************************

    public function donor()
    {
        return view('backend.user_list.donor');
    }

    public function donor_edit($id)
    {
        $donor_edit = User::where('id',$id)->first();

        return view('backend.user_list.donor_edit',[
            'donor_edit' => $donor_edit
        ]);

    }

    public function donor_status_edit($id)
    {
        $donor_details = User::where('id',$id)->first();

        return view('backend.user_list.donor_details',[
            'donor_details' => $donor_details
        ]);

    }


    public function donor_status_update(Request $request)
    {
        // dd($request);

        $update = new DonateGigs;
        $update->confirmed=$request->confirmed;

        User::whereId($request->hidden_id)->update($update->toArray());

        return redirect()->route('admin.donor.index')->withFlashSuccess('Updated Successfully');

    }

    public function donor_update(Request $request)
    {
        // dd($request);

        $users = DB::table('users') ->where('id', '=', $request->hidden_id)->update(
            [
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'email' => $request->email,
                'profile_image' => $request->profile_image,
                'bio' => $request->bio
            ]
        );

        return redirect()->route('admin.donor.index')->withFlashSuccess('Updated Successfully');

    }

    public function get_donor_details(Request $request)
    {
        if($request->ajax())
        {
            $data = User::where('user_type','Donor')->get();
            return DataTables::of($data)

            ->addColumn('action', function($data){
                $button = '<a href="'.route('admin.donor_status.edit',$data->id).'" name="donate_gigs" id="'.$data->id.'" class="edit btn btn-info btn-sm ml-3" style="margin-right: 10px"><i class="fas fa-list"></i> View </a>';
                $button .= '<a href="'.route('admin.donor_edit',$data->id).'" name="donor_edit" id="'.$data->id.'" class="edit btn btn-secondary btn-sm ml-3" style="margin-right: 10px"><i class="fas fa-edit"></i> Edit </a>';
                return $button;
            })
            ->addColumn('confirmed', function($data){
                if($data->confirmed == 'true'){
                    $confirmed = '<span class="badge badge-success">Enabled</span>';
                }
                else{
                    $confirmed = '<span class="badge badge-danger">Disabled</span>';
                }
                return $confirmed;
            })

            ->rawColumns(['action','confirmed'])
            ->make(true);
        }
        return back();
    }



    public function donate_gigs($id)
    {
        $agent = User::where('user_type','Agent')->where('id',$id)->first();

        return view('backend.user_list.donate_gigs',[
            'agent' => $agent
        ]);
    }

    public function donate_gigs_details(Request $request,$id)
    {
        if($request->ajax())
        {
            $data = DonateGigs::where('agent_id',$id)->get();
            return DataTables::of($data)

            ->addColumn('action', function($data){
                $button = '<a href="'.route('admin.donate_gigs_view',$data->id).'" name="show" id="'.$data->id.'" class="edit btn btn-primary btn-sm ml-3" style="margin-right: 10px"><i class="fas fa-list"></i> View </a>';
                return $button;
            })
            ->addColumn('is_paid', function($data){
                if($data->is_paid == 'Yes'){
                    $is_paid = '<span class="badge badge-success">Yes</span>';
                }
                else{
                    $is_paid = '<span class="badge badge-danger">No</span>';
                }
                return $is_paid;
            })
            ->addColumn('status', function($data){
                if($data->status == 'Pending'){
                    $status = '<span class="badge badge-warning">Enabled</span>';
                }
                elseif($data->status == 'Approved'){
                    $status = '<span class="badge badge-success">Approved</span>';
                }
                else{
                    $status = '<span class="badge badge-danger">Disapproved</span>';
                }
                return $status;
            })
            ->rawColumns(['action','is_paid','status'])
            ->make(true);
        }
        return back();
    }

    public function donate_gigs_view($id)
    {
        $donate_gigs = DonateGigs::where('id',$id)->first();
        $agent = User::where('user_type','Agent')->where('id',$donate_gigs->agent_id)->first();

        return view('backend.user_list.donate_gigs_view',[
            'agent' => $agent,
            'donate_gigs' => $donate_gigs
        ]);
    }


    public function donate_gigs_update(Request $request)
    {
        // dd($request);

        $update = new DonateGigs;
        $update->status=$request->status;

        DonateGigs::whereId($request->hidden_id)->update($update->toArray());

        return redirect()->route('admin.donate_gigs',$request->hidden_agent_id)->withFlashSuccess('Updated Successfully');

    }





// *******************************************************************************************



    public function receivers_list($id)
    {
        $agent = User::where('user_type','Agent')->where('id',$id)->first();

        return view('backend.user_list.receivers.receivers',[
            'agent' => $agent
        ]);
    }

    public function receivers_details(Request $request,$id)
    {
        if($request->ajax())
        {
            $data = Receivers::where('assigned_agent',$id)->get();
            return DataTables::of($data)
            ->editColumn('requirement',function ($data){
                if($data->requirement == 'Other'){
                    return 'Other';
                }else{
                    $packageDetails = Packages::where('id',$data->requirement)->first();
                    return $packageDetails->name;
                }
            })
            ->addColumn('action', function($data){
                $button = '<a href="'.route('admin.receiver.edit',$data->id).'" name="donate_gigs" id="'.$data->id.'" class="edit btn btn-info btn-sm ml-3" style="margin-right: 10px"><i class="fas fa-edit"></i> View </a>';
                return $button;
            })
            ->addColumn('featured', function($data){
                if($data->featured == 'Enabled'){
                    $featured = '<span class="badge badge-success">Enabled</span>';
                }
                else{
                    $featured = '<span class="badge badge-warning">Disabled</span>';
                }
                return $featured;
            })
            ->addColumn('status', function($data){
                if($data->status == 'Approved'){
                    $status = '<span class="badge badge-success">Approved</span>';
                }
                else{
                    $status = '<span class="badge badge-warning">Pending</span>';
                }
                return $status;
            })
            ->rawColumns(['action','featured','status'])
            ->make(true);
        }
        return back();
    }

    public function receivers_create($id)
    {
        // dd($id);
        $agent = User::where('user_type','Agent')->where('id',$id)->first();
        // dd($agent);

        return view('backend.user_list.receivers.create',[
            'agent' => $agent
        ]);
    }

    public function receivers_edit($id)
    {
        $receiver = Receivers::where('id',$id)->first();
        $agent = User::where('id',$receiver->assigned_agent)->first();

        return view('backend.user_list.receivers.edit',[
            'receiver' => $receiver,
            'agent' => $agent
        ]);
    }


    public function register(Request $request)
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
        $add->assigned_agent = $request->assigned_agent;
        $add->featured = $request->featured;        
        $add->status=$request->status;
        $add->save();


        return redirect()->route('admin.receivers_list',$request->assigned_agent)->withFlashSuccess('Added Successfully');
    }

    public function receivers_update(Request $request) {

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
        $update->assigned_agent = $request->assigned_agent;
        $update->featured = $request->featured;        
        $update->status=$request->status;

        Receivers::whereId($request->hidden_id)->update($update->toArray());

        return redirect()->route('admin.receivers_list',$request->assigned_agent)->withFlashSuccess('Updated Successfully');
      
    }




}



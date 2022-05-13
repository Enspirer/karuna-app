<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
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


class ListController extends Controller
{
    public function agent()
    {
        return view('backend.user_list.agent');
    }

    public function agent_show($id)
    {
        $agent = User::where('user_type','Agent')->where('id',$id)->first();

        return view('backend.user_list.agent_show',[
            'agent' => $agent
        ]);
    }

    public function agent_status_update(Request $request)
    {    
        // dd($request);

        $update = new DonateGigs;
        $update->confirmed=$request->confirmed;
        
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
                $button = '<a href="'.route('admin.donate_gigs',$data->id).'" name="donate_gigs" id="'.$data->id.'" class="edit btn btn-success btn-sm ml-3" style="margin-right: 10px"><i class="fas fa-funnel-dollar"></i> Donate Gigs ('.count(DonateGigs::where('agent_id',$data->id)->get()).')</a>';
                $button .= '<a href="'.route('admin.agent.show',$data->id).'" name="show" id="'.$data->id.'" class="edit btn btn-primary btn-sm ml-3" style="margin-right: 10px"><i class="fas fa-list"></i> View </a>';
                $button .= '<a href="'.route('admin.receivers_list',$data->id).'" name="edit" id="'.$data->id.'" class="edit btn btn-warning btn-sm ml-3 mr-3"><i class="fas fa-user-friends"></i> Receivers ('.count(User::where('assigned_agent_id',$data->id)->where('user_type','Receiver')->get()).')</a>';
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

    public function donor()
    {
        return view('backend.user_list.donor');
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

    public function get_donor_details(Request $request)
    {
        if($request->ajax())
        {
            $data = User::where('user_type','Donor')->get();
            return DataTables::of($data)  

            ->addColumn('action', function($data){
                $button = '<a href="'.route('admin.donor_status.edit',$data->id).'" name="donate_gigs" id="'.$data->id.'" class="edit btn btn-info btn-sm ml-3" style="margin-right: 10px"><i class="fas fa-list"></i> View </a>';
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
            $data = User::where('assigned_agent_id',$id)->where('user_type','Receiver')->get();
            return DataTables::of($data)                           
                    
            ->addColumn('action', function($data){
                $button = '<a href="'.route('admin.receiver.edit',$data->id).'" name="donate_gigs" id="'.$data->id.'" class="edit btn btn-info btn-sm ml-3" style="margin-right: 10px"><i class="fas fa-edit"></i> View </a>';
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

    public function receivers_create($id)
    {
        $agent = User::where('user_type','Agent')->where('id',$id)->first();

        return view('backend.user_list.receivers.create',[
            'agent' => $agent
        ]);
    }  

    public function receivers_edit($id)
    {
        $receiver = User::where('id',$id)->first();
        $agent = User::where('id',$receiver->assigned_agent_id)->first();

        return view('backend.user_list.receivers.edit',[
            'receiver' => $receiver,
            'agent' => $agent
        ]);
    } 


    public function register(RegisterRequest $request)
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

        $hashed_password = Hash::make($password);
       
        $add = new User;

        $add->first_name=$request->first_name;
        $add->last_name=$request->last_name;
        $add->email=$request->email;
        $add->user_type=$request->user_type;
        $add->country=$request->country;
        $add->city=$request->city;
        $add->assigned_agent_id=$request->assigned_agent_id;
        $add->password=$hashed_password;
        $add->confirmed=1; 

        $add->save();

        return redirect()->route('admin.receivers_list',$request->assigned_agent_id)->withFlashSuccess('Added Successfully');
    }

    public function receivers_update(Request $request) {   

        $email = $request->email;  
        $password = $request->password;     
        $hidden_id = $request->hidden_id;     

        $user = User::where('id',$hidden_id)->first();  
        // dd($user);

        if($user == null){           
            return back()->withErrors('No any record.'); 
        }
        else{
            $hash_pw = Hash::check($password, $user->password);
            // dd($hash_pw);

            if($hash_pw === true){              

                $users = DB::table('users') ->where('id', '=', $user->id)->update(
                    [
                        'first_name' => $request->first_name,
                        'last_name' => $request->last_name,
                        'email' => $request->email,
                        'country' => $request->country,
                        'city' => $request->city,
                        'confirmed' => $request->confirmed
                    ]
                );

                return redirect()->route('admin.receivers_list',$request->agent_hidden_id)->withFlashSuccess('Updated Successfully');
            }
            else{
                return back()->withErrors('These credentials do not match our records.');
            }                      
        }   

    }


    

}



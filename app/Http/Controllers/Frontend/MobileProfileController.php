<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\Receivers;
use App\Models\Packages;
use App\Models\Auth\User;
use DB;

class MobileProfileController extends Controller
{
    public function update_donor_mobile(Request $request) 
    {
        // dd($request);

        $first_name = request('first_name');
        $last_name = request('last_name');
        $profile_image = request('profile_image');
        $email = request('email');
        $bio = request('bio');
        // $pw = request('password');
        // $password_confirmation = request('password_confirmation');        

        // if($pw == null){
        //     $password = auth()->user()->password;
        // }
        // else{

        //     if($pw != $password_confirmation){
        //         return back()->with([
        //             'error_pw' => 'Password does not match'
        //         ]);             
        //     }

        //     $password_count = strlen($pw);
        //     if($password_count < 8){
        //         return back()->with([
        //             'error_pw' => 'The password must be at least 8 characters.'
        //         ]);             
        //     }
        //     $password = Hash::make($pw);        
        // }
        
        $users = DB::table('users')->where('id', '=', request('hidden_id'))->update(
            [
                'first_name' => $first_name,
                'last_name' => $last_name,
                'email' => $email,
                'profile_image' => $profile_image, 
                'bio' => $bio,
                // 'password' => $password
            ]
        );

        return back()->with([
            'success' => 'Updated Successfully.'
        ]); 

    }


    public function update_agent_mobile(Request $request) {

        if($request->user_type == 'Agent'){
            if($request->id_photo == null){
                if(auth()->user()->id_photo == null){
                    return back()->withErrors('Please add an ID Card Photo');
                }
            }
        }

        
        $email = $request->email;
        $hidden_id = $request->hidden_id;

        $user = User::where('id',$hidden_id)->first();
        // dd($user);

        if($request->test_city != null){
            $city = $request->test_city;
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

        return back()->with([
            'success' => 'Updated Successfully.'
        ]); 

    }




}

<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Auth\User;
use App\Models\Packages;
use App\Models\Receivers;
use Composer\Package\Package;
use Modules\Blog\Entities\Post;

/**
 * Class HomeController.
 */
class HomeController extends Controller
{
    /**
     * @return \Illuminate\View\View
     */
    public function index()
    {
        if(is_mobile(request()->header('user-agent')) == true){

            return redirect()->route('frontend.mobile.splash');
        }

        $events = Post::where('featured','Enabled')->orderBy('order','asc')->get();

        return view('frontend.index',[
            'events' => $events
        ]);
    }

    public function receivers()
    {
        return view('frontend.receivers');
    }

    public function support()
    {
        return view('frontend.support');
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

        return view('frontend.payment',[
            'agentDetails' => $agentDetails,
            'packageDetails' => $packageDetails,
            'receiverDetails' => $receiverDetails
        ]);
    }

    public function payment_status()
    {
        return view('frontend.payment_status');
    }

    public function campaigns()
    {
        $completed_receivers = Receivers::where('payment_status','Payment Completed')->orderby('id','desc')->paginate(6);

        return view('frontend.campaigns',[
            'completed_receivers' => $completed_receivers
        ]);
    }

    public function about_us()
    {
        return view('frontend.about_us');
    }

    public function terms_and_conditions()
    {
        return view('frontend.terms_and_conditions');
    }

    public function privacy_policy()
    {
        return view('frontend.privacy_policy');
    }
    

    public function donor_profile($id)
    {
        $donor = User::where('id',$id)->first();

        return view('frontend.donor_profile',[
            'donor' => $donor
        ]);
    }

    public function agent_profile($id)
    {
        $agent = User::where('id',$id)->first();

        return view('frontend.agent_profile',[
            'agent' => $agent
        ]);
    }

    public function receiver_profile($id)
    {
        $receiver = Receivers::where('id',$id)->first();

        return view('frontend.receiver_profile',[
            'receiver' => $receiver
        ]);
    }

    public function find_agent_details($city)
    {
        // dd($city);
        $agent_details = User::where('city',$city)->where('user_type','Agent')->get();

        $output_array = [];

        foreach($agent_details as $key => $agent_detail){

            $array_out = [
                'agent_user_id' => $agent_detail->id,
                'agent_user_name' => $agent_detail->name
            ];

            array_push($output_array,$array_out);
        }

        // dd($output_array);

        return response()->json($output_array);

    }

    public function events()
    {
        $events = Post::where('status','Enabled')->orderBy('order','asc')->paginate(6);

        return view('frontend.events',[
            'events' => $events
        ]);
    }

    public function help()
    {
        return view('frontend.help');
    }

    public function individual_event()
    {
        return view('frontend.individual_event');
    }
}

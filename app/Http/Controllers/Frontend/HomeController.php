<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Auth\User;
use App\Models\Packages;
use App\Models\Receivers;
use Composer\Package\Package;
use Modules\Blog\Entities\Post;
use App\Models\HelpSupport;
use App\Models\Country;
use App\Models\City;


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

    public function find_cities($country)
    {
        $country = Country::where('name',$country)->first();
        $cities = City::where('country',$country->id)->get();
        
        $output_array = [];

        foreach($cities as $key => $city){

            $array_out = [
                'city_id' => $city->id,
                'city_name' => $city->name
            ];

            array_push($output_array,$array_out);
        }

        return response()->json($output_array);

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

    public function individual_event($id)
    {
        $event = Post::where('id',$id)->first();

        return view('frontend.individual_event',[
            'event' => $event
        ]);
    }

    public function help_support_store(Request $request)
    {        
        // dd($request); 

        if($request->get('g-recaptcha-response') == null){
            return back()->with('error', 'Error!.....Please fill reCAPTCHA!');
        }  
   
        $add = new HelpSupport;

        $add->name=$request->name;
        $add->email=$request->email;
        $add->title=$request->title;
        $add->message=$request->message;
        $add->status='Pending'; 

        $add->save();

        if(is_mobile(request()->header('user-agent')) == true){
            return redirect()->route('frontend.user.mobile.index');
        }
       
        return back()->with([
            'success' => 'success'
        ]);   
    }

}

<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Auth\User;

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
        return view('frontend.index');
    }

    public function receivers()
    {
        return view('frontend.receivers');
    }

    public function support()
    {
        return view('frontend.support');
    }

    public function payment()
    {
        return view('frontend.payment');
    }

    public function payment_status()
    {
        return view('frontend.payment_status');
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



}

<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DataTables;
use DB;
use App\Models\Auth\User;

class ListController extends Controller
{
    public function agent()
    {
        return view('backend.user_list.agent');
    }

    public function donor()
    {
        return view('backend.user_list.donor');
    }


    public function get_agent_details(Request $request)
    {
        if($request->ajax())
        {
            $data = User::where('user_type','Agent')->get();
            return DataTables::of($data)                            
                    
                ->rawColumns([])
                ->make(true);
        }
        return back();
    }

    public function get_donor_details(Request $request)
    {
        if($request->ajax())
        {
            $data = User::where('user_type','Donor')->get();
            return DataTables::of($data)                           
                    
                ->rawColumns([])
                ->make(true);
        }
        return back();
    }

}

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

    public function get_agent_details(Request $request)
    {
        if($request->ajax())
        {
            $data = User::where('user_type','Agent')->get();
            return DataTables::of($data)     
            
            ->addColumn('action', function($data){
                       
                $button = '<a href="'.route('admin.receivers_list',$data->id).'" name="edit" id="'.$data->id.'" class="edit btn btn-primary btn-sm ml-3 mr-3"><i class="fas fa-user-friends"></i> Receivers </a>';
                return $button;
            })
                    
            ->rawColumns(['action'])
            ->make(true);
        }
        return back();
    }

    public function donor()
    {
        return view('backend.user_list.donor');
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


    public function receivers_list($id)
    {
        $agent = User::where('user_type','Agent')->first();

        return view('backend.user_list.receivers',[
            'agent' => $agent
        ]);
    }

    public function receivers_details(Request $request,$id)
    {
        if($request->ajax())
        {
            $data = User::where('assigned_agent_id',$id)->where('user_type','Receiver')->get();
            return DataTables::of($data)                           
                    
            ->rawColumns([])
            ->make(true);
        }
        return back();
    }

}

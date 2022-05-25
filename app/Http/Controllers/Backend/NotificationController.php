<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DataTables;
use DB;
use App\Models\Receivers;
use App\Models\Auth\User;

class NotificationController extends Controller
{
    
    public function index()
    {
        return view('backend.donate_notification.index');
    }    

    public function getdetails(Request $request)
    {
        if($request->ajax())
        {
            $data = Receivers::where('status','!=','Approved')->get();
            return DataTables::of($data)

            ->addColumn('action', function($data){                       
                $button = '<a href="'.route('admin.donate_notification.edit',$data->id).'" name="edit" id="'.$data->id.'" class="edit btn btn-secondary btn-sm ml-3 mr-3"><i class="fas fa-edit"></i> Edit </a>';
                return $button;
            })

            ->addColumn('status', function($data){
                if($data->status == 'Agent Not Responded'){
                    $status = '<span class="badge badge-warning">Not Transferred</span>';
                }
                else{
                    $status = '<span class="badge badge-success">Payment Transferred to Agent</span>';
                }   
                return $status;
            })
                
            ->rawColumns(['action','status'])
            ->make(true);
        }
        return back();
    }

   

    public function edit($id)
    {
        $receiver = Receivers::where('id',$id)->first();              

        return view('backend.donate_notification.edit',[
            'receiver' => $receiver
        ]);  
    }


    public function update(Request $request)
    {    
        // dd($request);

        $update = new Receivers;

        $update->status=$request->status;

        Receivers::whereId($request->hidden_id)->update($update->toArray());


        if($request->status == 'Payment Transferred to Agent'){
            $rec = Receivers::where('id',$request->hidden_id)->first();
            $donor = User::where('id',$rec->donor_id)->first();
    
            create_notification($rec->assigned_agent, 'Donation Transferred to your account', $donor->first_name.' '.$donor->last_name.' donated USD '.$rec->amount.' to '.$rec->name, $rec->id);
        }
      
        return redirect()->route('admin.donate_notification.index')->withFlashSuccess('Updated Successfully');                      

    }


}

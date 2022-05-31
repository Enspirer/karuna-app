<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Auth\User;
use App\Models\Packages;
use App\Models\Receivers;
use Illuminate\Http\Request;
use DataTables;

class PaymentController extends Controller
{
    public function index()
    {

        return view('backend.payments.index');
    }

    public function show($id)
    {
        $recerDetails = Receivers::where('id',$id)->first();
        $donorDetials = User::where('id',$recerDetails->donor_id)->first();
        $agentDetails = User::where('id',$recerDetails->assigned_agent)->first();

        return view('backend.payments.show',[
            'agent_details' => $agentDetails,
            'donor_details' => $donorDetials,
            'r_details' => $recerDetails
        ]);

    }

    public function store(Request $request)
    {

    }

    public function destroy($id)
    {

    }


    public function getDetails(Request $request)
    {
        if($request->ajax())
        {
            $data = Receivers::where('payment_status','Payment Completed')->get();
            return DataTables::of($data)
                ->addColumn('action', function($data){

                    $button = '<a href="'.route('admin.payment.show',$data->id).'" name="conm"  class="btn btn-primary btn-sm"><i class="fas fa-eye"></i> View</a>';
                    return $button;
                })
                ->addColumn('agent_name',function ($data){
                   $agentDetails = User::where('id',$data->assigned_agent)->first();
                   return '<a href="'.url('profile/agent',$data->assigned_agent).'">'.$agentDetails->first_name .' '. $agentDetails->last_name.'</a>';
                })
                ->addColumn('donor_name',function ($data){
                    $donorDetails = User::where('id',$data->donor_id)->first();
                    return '<a href="'.url('profile/donor',$data->donor_id).'">'.$donorDetails->first_name .' '. $donorDetails->last_name.'</a>';
                })
                ->addColumn('receiver_name', function ($data){
                    return '<a href="'.url('profile/receiver',$data->id).'">'.$data->name .'</a>';
                })
                ->editColumn('amount',function ($data){
                    return 'USD '.number_format($data->amount,2);
                })
                ->editColumn('requirement',function ($data){
                    $packgeDetails = Packages::where('id',$data->requirement)->first();

                    if($packgeDetails){
                        return $packgeDetails->name;
                    }else{
                        return 'Other';
                    }


                })
                ->rawColumns(['action','agent_name','donor_name','receiver_name'])
                ->make(true);
        }
        return back();
    }
}

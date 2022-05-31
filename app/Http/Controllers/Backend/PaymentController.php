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

    public function show()
    {
        return view('frontend.payment.show');

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

                    $button = '<button type="button" name="conm"  class="btn btn-primary btn-sm"><i class="fas fa-eye"></i> View</button>';
                    return $button;
                })
                ->addColumn('agent_name',function ($data){
                   $agentDetails = User::where('id',$data->assigned_agent)->first();
                   return $agentDetails->first_name .' '. $agentDetails->last_name;
                })
                ->addColumn('donor_name',function ($data){
                    $donorDetails = User::where('id',$data->donor_id)->first();
                    return $donorDetails->first_name .' '. $donorDetails->last_name;
                })
                ->addColumn('receiver_name', function ($data){
                    return $data->name;
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
                ->rawColumns(['action'])
                ->make(true);
        }
        return back();
    }
}

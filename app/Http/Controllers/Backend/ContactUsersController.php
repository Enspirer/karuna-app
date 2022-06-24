<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DataTables;
use App\Models\ContactNow;
use Mail;
use \App\Mail\ContactUsersMail;

class ContactUsersController extends Controller
{    
    public function index()
    {
        return view('backend.contact_users.index');
    }

    public function getDetails(Request $request)
    {
        if($request->ajax())
        {
            $data = ContactNow::get();
            return DataTables::of($data)            
                ->addColumn('action', function($data){
                    
                    $button = '<a href="'.route('admin.contact_users.edit',$data->id).'" name="edit" id="'.$data->id.'" class="edit btn btn-secondary btn-sm ml-3" style="margin-right: 10px"><i class="fas fa-info-circle"></i> View </a>';
                    $button .= '<button type="button" name="delete" id="'.$data->id.'" class="delete btn btn-danger btn-sm"><i class="fas fa-trash"></i> Delete</button>';
                    return $button;
                })
                
                ->editColumn('status', function($data){
                    if($data->status == 'Pending'){
                        $status = '<span class="badge badge-warning">Pending</span>';
                    }
                    else{
                        $status = '<span class="badge badge-success">Seen</span>';
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
        $contact_users = ContactNow::where('id',$id)->first();                 
        
        return view('backend.contact_users.edit',[
            'contact_users' => $contact_users         
        ]);  
    }

    public function update(Request $request)
    {    
        // dd($request);     
   
        $up_contactus = new ContactNow;

        $up_contactus->status='Seen';        
        
        ContactNow::whereId($request->hidden_id)->update($up_contactus->toArray());

        $details = [
            'email' => $request->email,
            'reply' => $request->reply
        ];

        \Mail::to($request->email)->send(new ContactUsersMail($details));

        return redirect()->route('admin.contact_users.index')->withFlashSuccess('Updated Successfully');                             

    }

    public function destroy($id)
    {        
        $data = ContactNow::findOrFail($id);
        $data->delete();   
    }

}

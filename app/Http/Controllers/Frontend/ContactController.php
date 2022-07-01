<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Frontend\Contact\SendContactRequest;
use App\Mail\Frontend\Contact\SendContact;
// use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;
use DB;
use App\Models\ContactUs;
use App\Models\ContactNow;
use Mail;
use \App\Mail\ContactUsMail;
use App\Models\Auth\User;


/**
 * Class ContactController.
 */
class ContactController extends Controller
{
    /**
     * @return \Illuminate\View\View
     */
    public function index()
    {
        return view('frontend.contact');
    }

    public function store(Request $request)
    {        
        // dd($request); 

        if($request->get('g-recaptcha-response') == null){
            return back()->with('error', 'Error!.....Please fill reCAPTCHA!');
        }  
   
        $contactus = new ContactUs;

        $contactus->name=$request->name;
        $contactus->email=$request->email;
        $contactus->title=$request->title;
        $contactus->message=$request->message;
        $contactus->status='Pending'; 

        $contactus->save();

        $details = [
            'name' => $request->name,
            'email' => $request->email,
            'title' => $request->title,
            'message' => $request->message
        ];

        \Mail::to([$request->email,'admin@karunaa.org.uk'])->send(new ContactUsMail($details));
       
        session()->flash('message','Thanks!');

        return back()->with([
            'success' => 'success'
        ]);   
    }

    public function contact_now(Request $request)
    {        
        // dd($request); 

        // if($request->get('g-recaptcha-response') == null){
        //     return back()->with('error', 'Error!.....Please fill reCAPTCHA!');
        // }  
   
        $add = new ContactNow;

        $add->email=$request->email;
        $add->message=$request->message;
        $add->user_id=$request->hidden_id_contact;
        $add->status='Pending'; 

        $add->save();

        return back()->with([
            'success' => 'success'
        ]);   
    }

    /**
     * @param SendContactRequest $request
     *
     * @return mixed
     */
    public function send(SendContactRequest $request)
    {
        Mail::send(new SendContact($request));

        return redirect()->back()->withFlashSuccess(__('alerts.frontend.contact.sent'));
    }
}

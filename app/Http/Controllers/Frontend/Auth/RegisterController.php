<?php

namespace App\Http\Controllers\Frontend\Auth;

use App\Events\Frontend\Auth\UserRegistered;
use App\Http\Controllers\Controller;
use App\Http\Requests\Frontend\Auth\RegisterRequest;
use App\Repositories\Frontend\Auth\UserRepository;
use Illuminate\Foundation\Auth\RegistersUsers;
use App\Models\Auth\User;
use Mail;
use \App\Mail\UserRegisterAdminMail;
use \App\Mail\UserRegisterUserMail;


/**
 * Class RegisterController.
 */
class RegisterController extends Controller
{
    use RegistersUsers;

    /**
     * @var UserRepository
     */
    protected $userRepository;

    /**
     * RegisterController constructor.
     *
     * @param UserRepository $userRepository
     */
    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    /**
     * Where to redirect users after login.
     *
     * @return string
     */
    public function redirectPath()
    {
        return route(home_route());
    }

    /**
     * Show the application registration form.
     *
     * @return \Illuminate\Http\Response
     */
    public function showRegistrationForm()
    {
        abort_unless(config('access.registration'), 404);

        return view('frontend.auth.register');
    }

    /**
     * @param RegisterRequest $request
     *
     * @throws \Throwable
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function register(RegisterRequest $request)
    {

      
        if($request->user_type == 'Agent'){
            
            $user_agent = User::where('email', $request->referral_email)->first();
            // dd($user_agent);
    
            if($user_agent == null){
                return back()->withInput()->with([
                    'error_incorrect_referrel' => 'Incorrect Referral'
                ]);
            }          
            elseif(sprintf("%03d",$user_agent->agent_number) != $request->referral_agent_number){
                return back()->withInput()->with([
                    'error_incorrect_referrel' => 'Incorrect Referral'
                ]);
            }
        }


        abort_unless(config('access.registration'), 404);

        $user = $this->userRepository->create($request->only('first_name', 'last_name', 'email', 'password', 'user_type', 'country', 'district', 'city', 'assigned_agent_id', 'contact_number', 'contact_number_two', 'address', 'occupation', 'nic_number','id_photo','referral_email','referral_agent_number'));
        // dd($user);

        // If the user must confirm their email or their account requires approval,
        // create the account but don't log them in.
        if (config('access.users.confirm_email') || config('access.users.requires_approval')) {
            event(new UserRegistered($user));

            $details_admin = [
                'name' => $request->first_name
            ];    
            $details_user = [
                'name' => $request->first_name
            ];
    
            \Mail::to('admin@karunaa.org.uk')->send(new UserRegisterAdminMail($details_admin));
            \Mail::to($request->email)->send(new UserRegisterUserMail($details_user));
    

            return redirect($this->redirectPath())->withFlashSuccess(
                config('access.users.requires_approval') ?
                    __('exceptions.frontend.auth.confirmation.created_pending') :
                    __('exceptions.frontend.auth.confirmation.created_confirm')
            );
        }

        
        auth()->login($user);

        event(new UserRegistered($user));

        return redirect($this->redirectPath());
    }
}

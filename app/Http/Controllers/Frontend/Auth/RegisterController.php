<?php

namespace App\Http\Controllers\Frontend\Auth;

use App\Events\Frontend\Auth\UserRegistered;
use App\Http\Controllers\Controller;
use App\Http\Requests\Frontend\Auth\RegisterRequest;
use App\Repositories\Frontend\Auth\UserRepository;
use Illuminate\Foundation\Auth\RegistersUsers;
use App\Models\Auth\User;

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
        // dd($request);

        $user_agent = User::where('first_name', 'like', '%'.$request->referral_name.'%')->orWhere('last_name', 'like', '%'.$request->referral_name.'%')->where('nic_number',$request->referral_nic_number)->first();
        // dd($user_agent);

        if($user_agent == null){
            return back()->withErrors('Incorrect Referrel');
        }

        abort_unless(config('access.registration'), 404);

        $user = $this->userRepository->create($request->only('first_name', 'last_name', 'email', 'password', 'user_type', 'country', 'city', 'assigned_agent_id', 'contact_number', 'contact_number_two', 'address', 'occupation', 'nic_number','id_photo','referral_name','referral_nic_number'));
        // dd($user);

        // If the user must confirm their email or their account requires approval,
        // create the account but don't log them in.
        if (config('access.users.confirm_email') || config('access.users.requires_approval')) {
            event(new UserRegistered($user));

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

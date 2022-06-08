<?php

namespace App\Http\Controllers\Frontend\Auth;

use App\Http\Controllers\Controller;
use App\Notifications\Frontend\Auth\UserNeedsConfirmation;
use App\Repositories\Frontend\Auth\UserRepository;

/**
 * Class ConfirmAccountController.
 */
class ConfirmAccountController extends Controller
{
    /**
     * @var UserRepository
     */
    protected $user;

    /**
     * ConfirmAccountController constructor.
     *
     * @param UserRepository $user
     */
    public function __construct(UserRepository $user)
    {
        $this->user = $user;
    }

    /**
     * @param $token
     *
     * @throws \App\Exceptions\GeneralException
     * @return mixed
     */
    public function confirm($token)
    {
        $this->user->confirm($token);

        if(is_mobile(request()->header('user-agent')) == true){
            return redirect()->route('frontend.mobile.login')->withFlashSuccess(__('exceptions.frontend.auth.confirmation.success'));
        }else{
            return redirect()->route('frontend.auth.login')->withFlashSuccess(__('exceptions.frontend.auth.confirmation.success'));
        }


    }

    /**
     * @param $uuid
     *
     * @throws \App\Exceptions\GeneralException
     * @return mixed
     */
    public function sendConfirmationEmail($uuid)
    {
        $user = $this->user->findByUuid($uuid);

        if ($user->isConfirmed()) {

            if(is_mobile(request()->header('user-agent')) == true){
                return redirect()->route('frontend.mobile.login')->withFlashSuccess(__('exceptions.frontend.auth.confirmation.already_confirmed'));
            }else{
                return redirect()->route('frontend.auth.login')->withFlashSuccess(__('exceptions.frontend.auth.confirmation.already_confirmed'));
            }


        }

        $user->notify(new UserNeedsConfirmation($user->confirmation_code));

        if(is_mobile(request()->header('user-agent')) == true){
            return redirect()->route('frontend.mobile.login')->withFlashSuccess(__('exceptions.frontend.auth.confirmation.resent'));
        }else{
            return redirect()->route('frontend.auth.login')->withFlashSuccess(__('exceptions.frontend.auth.confirmation.resent'));

        }
    }
}

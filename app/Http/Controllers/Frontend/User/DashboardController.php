<?php

namespace App\Http\Controllers\Frontend\User;

use App\Http\Controllers\Controller;

/**
 * Class DashboardController.
 */
class DashboardController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('frontend.user.dashboard');
    }

    public function receiver()
    {
        return view('frontend.user.receiver');
    }

    public function receiver_request_list()
    {
        return view('frontend.user.receiver_request_list');
    }

    public function receiver_request()
    {
        return view('frontend.user.receiver_request');
    }

    public function agent_profile()
    {
        return view('frontend.user.agent_profile');
    }

    public function notification()
    {
        return view('frontend.user.notification');
    }

    public function notification_submit()
    {
        return view('frontend.user.notification_submit');
    }

    public function payment_history()
    {
        return view('frontend.user.payment_history');
    }

    public function donation_complete()
    {
        return view('frontend.user.donation_complete');
    }
}

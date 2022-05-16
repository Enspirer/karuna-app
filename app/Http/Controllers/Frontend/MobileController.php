<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MobileController extends Controller
{
    public function splash()
    {
        return view('frontend.mobile.splash');
    }

    public function login()
    {
        return view('frontend.mobile.login');
    }

    public function register()
    {
        return view('frontend.mobile.register');
    }

    public function index()
    {
        return view('frontend.mobile.index');
    }

    public function donation_info()
    {
        return view('frontend.mobile.donation_info');
    }

    public function donation_list()
    {
        return view('frontend.mobile.donation_list');
    }

    public function payment()
    {
        return view('frontend.mobile.payment');
    }
}

@extends('frontend.layouts.mobile_app')

@section('title', app_name() . ' | ' . __('navs.general.home'))

@section('content')

@include('frontend.mobile.includes.top_nav')

<section class="profile-menu-section">
    <div class="mobile-container">
        <div class="inner-wrapper">
            <div class="header">
                <img src="{{url('images/landing-page/nav/profile.png')}}" alt="">
                <div class="text-block">
                    <div class="text">Welcome</div>
                    <div class="name">Mis. Inoka Perera</div>
                </div>
                <a href="#" class="btn-sign-out">
                    <i class="bi bi-box-arrow-right"></i>
                </a>
            </div>
            <ul class="profile-menu">
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="bi bi-arrow-left-right"></i>
                        <div class="text">Donation History</div>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="bi bi-person"></i>
                        <div class="text">Profile</div>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="bi bi-bell"></i>
                        <div class="text">Notification</div>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="bi bi-credit-card"></i>
                        <div class="text">Payment History</div>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="bi bi-gear"></i>
                        <div class="text">Settings</div>
                    </a>
                </li>
            </ul>
            <a href="#" class="help-btn">
                <i class="bi bi-headset"></i>
                <div class="btn-text">How can we help you?</div>
            </a>
        </div>
    </div>
</section>

@include('frontend.mobile.includes.bottom_nav')

@endsection

@push('after-scripts')

@endpush
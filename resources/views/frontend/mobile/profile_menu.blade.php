@extends('frontend.layouts.mobile_app')

@section('title', app_name() . ' | ' . __('navs.general.home'))

@section('content')

<!-- ======== Top Nav ======== -->
<section class="app-bar-section">
    <div class="mobile-container">
        <div class="inner-wrapper">
            <!-- <a href="{{route('frontend.user.mobile.index')}}" class="back-btn"> -->
            <a href="#" onclick="history.back()" class="back-btn">
                <i class="fa-solid fa-arrow-left"></i>
            </a>
            <div class="title">Menu</div>
        </div>
    </div>
</section>
<!-- ======== Top Nav End ======== -->

<section class="profile-menu-section">
    <div class="mobile-container">
        <div class="inner-wrapper">
            <div class="header">
                @if(auth()->user()->profile_image == null)
                    <img src="{{url('images/landing-page/nav/profile.png')}}" alt="">
                @else
                    <img src="{{uploaded_asset(auth()->user()->profile_image)}}" width="20%" alt="">
                @endif
                <div class="text-block">
                    <div class="text">Welcome</div>
                    <div class="name">{{auth()->user()->first_name}} {{auth()->user()->last_name}}</div>
                </div>
                <a href="{{url('logout')}}" class="btn-sign-out">
                    <i class="bi bi-box-arrow-right"></i>
                </a>
            </div>
            <ul class="profile-menu">
                @if(auth()->user()->user_type == 'Donor')
                    <li class="nav-item">
                        <a href="{{route('frontend.user.mobile.donation_history')}}" class="nav-link">
                            <i class="bi bi-arrow-left-right"></i>
                            <div class="text">Donation History</div>
                        </a>
                    </li>
                @endif
                @if(auth()->user()->user_type == 'Agent')
                    <li class="nav-item">
                        <a href="{{route('frontend.user.mobile.receivers_list')}}" class="nav-link">
                            <i class="bi bi-people"></i>
                            <div class="text">My Receivers</div>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('frontend.user.mobile.receiver_request_list')}}" class="nav-link">
                            <i class="bi bi-person-plus"></i>
                            <div class="text">Receiver Requests</div>
                        </a>
                    </li>
                @endif
                <!-- <li class="nav-item">
                    <a href="{{route('frontend.user.mobile.profile')}}" class="nav-link">
                        <i class="bi bi-person"></i>
                        <div class="text">Profile</div>
                    </a>
                </li> -->
                <li class="nav-item">
                    <a href="{{route('frontend.user.mobile.notification')}}" class="nav-link">
                        <i class="bi bi-bell"></i>
                        <div class="text">Notification</div>
                    </a>
                </li>
                <!-- <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="bi bi-credit-card"></i>
                        <div class="text">Payment History</div>
                    </a>
                </li> -->
                <li class="nav-item">
                    <a href="{{route('frontend.user.mobile.profile')}}" class="nav-link">
                        <i class="bi bi-gear"></i>
                        <div class="text">Settings</div>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('frontend.user.mobile.events')}}" class="nav-link">
                        <i class="bi bi-balloon-heart"></i>
                        <div class="text">Events</div>
                    </a>
                </li>
            </ul>
            <a href="{{route('frontend.user.mobile.help')}}" class="help-btn">
                <i class="bi bi-headset"></i>
                <div class="btn-text">How can we help you?</div>
            </a>
        </div>
    </div>
</section>

@endsection

@push('after-scripts')

@endpush
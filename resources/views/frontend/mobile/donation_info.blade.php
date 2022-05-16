@extends('frontend.layouts.mobile_app')

@section('title', app_name() . ' | ' . __('navs.general.home'))

@section('content')

@include('frontend.mobile.includes.top_nav')

<section class="donation-info-section">
    <div class="mobile-container">
        <div class="inner-wrapper">
            <div class="profile-block">
                <div class="title">Agent Profile</div>
                <div class="profile-info">
                    <img src="{{url('images/landing-page/nav/profile.png')}}" alt="" class="dp">
                    <ul>
                        <li>
                            <span class="th">Name :</span>
                            <span class="td">Kamal</span>
                        </li>
                        <li>
                            <span class="th">Area :</span>
                            <span class="td">Colombo</span>
                        </li>
                        <li>
                            <span class="th">ID :</span>
                            <span class="td">45784154545</span>
                        </li>
                    </ul>
                </div>
                <a class="cta-link" href="#">View  History of this Agent</a>
            </div>
            <div class="profile-block">
                <div class="title">Receiver's Profile</div>
                <div class="profile-info">
                    <img src="{{url('images/landing-page/nav/profile.png')}}" alt="" class="dp">
                    <ul>
                        <li>
                            <span class="th">Name :</span>
                            <span class="td">Kamal</span>
                        </li>
                        <li>
                            <span class="th">Area :</span>
                            <span class="td">Colombo</span>
                        </li>
                        <li>
                            <span class="th">ID :</span>
                            <span class="td">45784154545</span>
                        </li>
                    </ul>
                </div>
                <a class="cta-link" href="#">View  History of this Receiver</a>
                <div class="cat-icon blue">S</div>
                <a href="{{route('frontend.mobile.payment')}}" class="cta-btn btn-fill">
                    <div class="btn-text">Donate Now</div>
                </a>
            </div>
        </div>
    </div>
</section>

@include('frontend.mobile.includes.bottom_nav')

@endsection

@push('after-scripts')

@endpush
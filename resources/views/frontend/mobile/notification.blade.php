
@extends('frontend.layouts.mobile_app')

@section('title', app_name() . ' | ' . __('navs.general.home'))

@section('content')

@include('frontend.mobile.includes.top_nav')

<section class="notification-section">
    <div class="mobile-container">
        <ul class="list-group">
            <li class="list-group-item">
                <a href="#" class="nav-link">
                    <img src="{{url('images/dashboard/donate.png')}}" alt="">
                    <div class="text-block">
                        <div class="subject red">Thank you for your support</div>
                        <div class="text">Lorem Ipsum is simply dummy text of the printing and typesetting industry.  industry's standard dummy text ever since the 1500s</div>
                    </div>
                    <i class="bi bi-bookmark-fill"></i>
                </a>
            </li>
            <li class="list-group-item">
                <a href="#" class="nav-link">
                    <img src="{{url('images/dashboard/donate.png')}}" alt="">
                    <div class="text-block">
                        <div class="subject green">Thank you for your support</div>
                        <div class="text">Lorem Ipsum is simply dummy text of the printing and typesetting industry.  industry's standard dummy text ever since the 1500s</div>
                    </div>
                    <i class="bi bi-bookmark"></i>
                </a>
            </li>
            <li class="list-group-item">
                <a href="#" class="nav-link">
                    <img src="{{url('images/dashboard/donate.png')}}" alt="">
                    <div class="text-block">
                        <div class="subject green">Thank you for your support</div>
                        <div class="text">Lorem Ipsum is simply dummy text of the printing and typesetting industry.  industry's standard dummy text ever since the 1500s</div>
                    </div>
                    <i class="bi bi-bookmark"></i>
                </a>
            </li>
        </ul>
    </div>
</section>

@include('frontend.mobile.includes.bottom_nav')

@endsection

@push('after-scripts')

@endpush
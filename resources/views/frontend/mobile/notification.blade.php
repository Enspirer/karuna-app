
@extends('frontend.layouts.mobile_app')

@section('title', app_name() . ' | ' . __('navs.general.home'))

@section('content')

<!-- ======== Top Nav ======== -->
<section class="app-bar-section">
    <div class="mobile-container">
        <div class="inner-wrapper">
            <a href="{{route('frontend.mobile.index')}}" class="back-btn">
                <i class="fa-solid fa-arrow-left"></i>
            </a>
            <div class="title">Notification</div>
        </div>
    </div>
</section>
<!-- ======== Top Nav End ======== -->

<section class="notification-section">
    <div class="mobile-container">
        <ul class="list-group">
            <li class="list-group-item">
                <a href="{{route('frontend.mobile.thanks')}}" class="nav-link">
                    <img src="{{url('images/dashboard/donate.png')}}" alt="">
                    <div class="text-block">
                        <div class="subject red">Thank you for your support</div>
                        <div class="text">Lorem Ipsum is simply dummy text of the printing and typesetting industry.  industry's standard dummy text ever since the 1500s</div>
                    </div>
                    <i class="bi bi-bookmark-fill"></i>
                </a>
            </li>
            <li class="list-group-item">
                <a href="{{route('frontend.mobile.agent_confirmation')}}" class="nav-link">
                    <div class="text-block">
                        <div class="subject red">Waiting for you confirmation</div>
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

@endsection

@push('after-scripts')

@endpush
@extends('frontend.layouts.mobile_app')

@section('title', app_name() . ' | ' . __('navs.general.home'))

@section('content')

<!-- ======== Top Nav ======== -->
<section class="app-bar-section">
    <div class="mobile-container">
        <div class="inner-wrapper">
            <!-- <a href="{{route('frontend.user.mobile.index')}}" class="back-btn"> -->
            <a href="{{route('frontend.user.mobile.index')}}" class="back-btn">
                <i class="fa-solid fa-arrow-left"></i>
            </a>
            <div class="title">Notification</div>
        </div>
    </div>
</section>
<!-- ======== Top Nav End ======== -->

<section class="success-msg-section">
    <div class="inner-wrapper">
        <i class="bi bi-check-circle-fill"></i>
        <div class="title">Payment Successful</div>
        <div class="amount"><span>USD</span> {{$amount}}</div>
        <div class="text">Transaction successfully processed and you will be notified when the your parcel is received to volunteer or receiver</div>
        <a href="{{route('frontend.user.mobile.index')}}" class="cta-btn btn-fill">
            <div class="btn-text">Ok</div>
        </a>
    </div>
</section>

<!-- <section class="success-msg-section">
    <div class="inner-wrapper">
        <i class="bi bi-check-circle-fill"></i>
        <div class="title">Payment Successful</div>
        <div class="amount"><span>USD</span> {{$amount}}</div>
        <div class="text">Transaction successfully processed and you will be notified when the your parcel is received to agent or receiver</div>
        <a href="{{route('frontend.user.mobile.index')}}" class="cta-btn btn-fill">
            <div class="btn-text">Ok</div>
        </a>
    </div>
</section> -->

@endsection

@push('after-scripts')

@endpush
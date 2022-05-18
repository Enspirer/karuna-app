@extends('frontend.layouts.mobile_app')

@section('title', app_name() . ' | ' . __('navs.general.home'))

@section('content')

@include('frontend.mobile.includes.top_nav')

<section class="success-msg-section">
    <div class="inner-wrapper">
        <i class="bi bi-check-circle-fill"></i>
        <div class="title">Payment Successful</div>
        <div class="amount"><span>Rs.</span> 5000</div>
        <div class="text">Transaction successfully processed and you will be notified when the your parcel is received to agent or receiver</div>
        <a href="#" class="cta-btn btn-fill">
            <div class="btn-text">Ok</div>
        </a>
    </div>
</section>

@include('frontend.mobile.includes.bottom_nav')

@endsection

@push('after-scripts')

@endpush
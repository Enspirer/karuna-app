@extends('frontend.layouts.app')

@section('title', app_name() . ' | ' . __('navs.general.home'))

@section('content')

<section class="payment-status-section">
    <div class="container">
        <div class="inner-wrapper">
            <img src="{{url('images/landing-page/payment/particles-left.svg')}}" alt="" class="img-left">
            <img src="{{url('images/landing-page/payment/particles-right.svg')}}" alt="" class="img-right">
            <div class="status-block">
                <i class="fa-solid fa-circle-check"></i>
                <div class="title">Payment Successful</div>
                <div class="amount"><span>Rs. </span> 5000</div>
                <div class="text">Transaction successfully processed and you will be notified when the your parcel is received to agent or receiver</div>
                <a href="#" class="cta-btn btn-fill">
                    <div class="btn-text">OK</div>
                </a>
            </div>
        </div>
    </div>
</section>

@endsection

@push('after-scripts')

@endpush
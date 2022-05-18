@extends('frontend.layouts.dashboard_app')

@section('title', app_name() . ' | ' . __('navs.general.home'))

@section('content')

<section class="donation-complete-section">
    <div class="inner-wrapper">
        <div class="thank-block">
            <img src="{{url('images/dashboard/thanks.png')}}" alt="">
            <div class="title">Special Thanks for You</div>
            <div class="text">When you give joy to other people, you get more joy in return. You should give a good thought to happiness that you can give out.</div>
            <a href="#" class="cta-btn btn-fill">
                <div class="btn-text">Cheers</div>
            </a>
        </div>
        <div class="content-block">
            <div class="title">Thank you For your support</div>
            <div class="text">Lorem Ipsum is simply dummy text of the printing and typesetting industry.  industry's standard dummy text ever since the 1500s</div>
            <div class="media">
                <img src="{{url('images/dashboard/placeholder.png')}}" alt="">
                <img src="{{url('images/dashboard/placeholder.png')}}" alt="">
                <img src="{{url('images/dashboard/placeholder.png')}}" alt="">
                <img src="{{url('images/dashboard/placeholder.png')}}" alt="">
                <img src="{{url('images/dashboard/placeholder.png')}}" alt="">
                <img src="{{url('images/dashboard/placeholder.png')}}" alt="">
            </div>
        </div>
    </div>
</section>

@endsection

@push('after-scripts')

@endpush
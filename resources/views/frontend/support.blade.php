@extends('frontend.layouts.app')

@section('title', app_name() . ' | ' . __('navs.general.home'))

@section('content')

<div class="support-hero-section">
    <div class="container">
        <div class="inner-wrapper">
            <div class="content-block">
                <div class="title-block">
                    <div class="title">Make someone's <span>Life</span></div>
                    <div class="title">by <span>giving</span> of yours</div>
                    <img src="{{url('images/landing-page/home/brush.svg')}}" alt="">
                </div>
                <div class="text">Lorem Ipsum is simply dummy text of the printing and typesetting industry.  industry's standard dummy text ever since the 1500s</div>
                <div class="button-block">
                    <a href="#" class="cta-btn btn-fill">
                        <div class="btn-text">Donate Now</div>
                    </a>
                    <a href="#" class="cta-btn btn-outline">
                        <div class="btn-text">Discover More</div>
                        <i class="bi bi-arrow-down"></i>
                    </a>
                </div>
            </div>
            <div class="image-block">
                <img src="{{url('images/landing-page/support/hero-img.png')}}" alt="">
            </div>
        </div>
    </div>
</div>

@endsection

@push('after-scripts')



@endpush
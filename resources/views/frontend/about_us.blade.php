@extends('frontend.layouts.app')

@section('title', app_name() . ' | ' . __('navs.general.home'))

@section('content')

<section class="about-hero-section">
    <div class="container">
       <div class="inner-wrapper">
            <div class="title-block">
                <div class="title">About<br>Karunaa</div>
                <img src="{{url('images/landing-page/home/brush.svg')}}" alt="">
            </div>
            <div class="text">A UK Based Charity Organization that Digitalizes Donation Process With Transparency & Efficiency to struggling Sri Lankans.</div>
       </div>        
    </div>
</section>

<section class="hero-img-section">
    <div class="container">
        <div class="image-block">
            <img src="{{url('images/landing-page/about/hero-img-1.png')}}" alt="">
            <img src="{{url('images/landing-page/about/hero-img-2.png')}}" alt="">
        </div>
    </div>
</section>

<section class="mission-section">
    <div class="container">
        <div class="inner-wrapper">
            <div class="title">Our Mission</div>
            <div class="subtitle">Karuna Mission is - </div>
            <div class="text">Encourage Donation, Through Enhancing Visibility, Stability & Self-Reliance in Sri Lanka.</div>
        </div>
    </div>
</section>

<section class="text-section">
    <div class="container">
        <div class="inner-wrapper">
            <div class="title">Who we are</div>
            <div class="text">Named After a Kind Sri Lankan Mother, Karunaa is a Digital Platform that enables donors from around the globe to contribute to struggling families & children in Sri Lanka.</div>
            <div class="text">Based In the UK, We oversee a transparent process where donations from various parts of the world; are distributed to families affected in poverty; through our incorporated volunteers.</div>
        </div>
    </div>
</section>

<section class="about-feature-section">
    <div class="image-block">
        <img src="{{url('images/landing-page/about/feature-img.png')}}" alt="" class="main">
        <img src="{{url('images/landing-page/about/grid.png')}}" alt="" class="grid-img top">
        <img src="{{url('images/landing-page/about/grid.png')}}" alt="" class="grid-img bottom">
    </div>
    <div class="content-block">
        <div class="content-wrapper">
            <div class="title">What's Our Story</div>
            <div class="text">We are a collection of Expat Sri Lankans living in the UK with various backgrounds, joined together with a mutual cause.</div>
            <div class="text">We operate with a network of volunteers; that have dedicated their time and efforts to ensure that every donation is made impactful. Karunaa is a passionate endeavour to help Our Home-Sri Lanka; overcome the hardships & poverty afflicting our nation.</div>
        </div>
    </div>
</section>

<section class="agent-section">
    <div class="container">
        <div class="title-block">
            <div class="title">Whish to join as an Volunteer?</div>
            <img src="{{url('images/landing-page/home/brush.svg')}}" alt="">
        </div>
        <div class="text">Join our network of Volunteers that have volunteered to make this pursuit a success. Note that we conduct a detailed systemized Selection Process.</div>
        <div class="cta-btn btn-fill">
            <a href="{{route('frontend.auth.register')}}" class="btn-fill">
                <div class="btn-text">Register as an Volunteer</div>
            </a>
        </div>
        
    </div>
</section>

@endsection

@push('after-scripts')

@endpush
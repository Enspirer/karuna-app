@extends('frontend.layouts.app')

@section('title', app_name() . ' | ' . 'About Us')

@section('content')

<section class="about-hero-section">
    <div class="container">
       <div class="inner-wrapper">
            <div class="title-block">
                <div class="title"><span>About</span><br>Karunaa</div>
                <img src="{{url('images/landing-page/home/brush.svg')}}" alt="">
            </div>
            <div class="text">We are a UK-based non for profit  organization that links the neediest Sri Lankans & expat donors through a digitalized donation process with transparency & efficiency. We are in the process of becoming a registered charity in England and Wales.</div>
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
            <div class="content-block">
                <div class="title"><span>Our</span> Vision</div>
                <div class="text">Provide a light of hope to needy Sri Lankans.</div>
            </div>
            <div class="content-block">
                <div class="title"><span>Our</span> Mission</div>
                <div class="text">Encourage donation through enhanced visibility, stability in the process to empower self-reliance in Sri Lanka.</div>
            </div>
        </div>
    </div>
</section>

<section class="text-section">
    <div class="container">
        <div class="inner-wrapper">
            <div class="title"><span>Who</span> we are</div>
            <div class="text">Named after a kind Sri Lankan mother, “Karunaa” is a digital platform that enables donors from around the globe to contribute to struggling families & children in Sri Lanka.</div>
            <div class="text">Lead by, Mr. Vajira Dhanapala, we oversee a transparent process where donations from various parts of the world are distributed to identified Sri Lankans facing poverty through our incorporated Karunaa angels.</div>
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
            <div class="title"><span>What's</span> Our Story</div>
            <div class="text">We are a group of expat Sri Lankans living in the UK with various backgrounds, joined together with a common cause.</div>
            <div class="text">We operate with a network of voluntary agents, whom we call as angels readily dedicating their time and efforts to ensure every donation is made impactful. Karunaa is a passionate endeavour to help our Home-Sri Lanka to overcome the hardships & poverty afflicting our nation.</div>
        </div>
    </div>
</section>

<section class="agent-section">
    <div class="container">
        <div class="title-block">
            <div class="title"><span>Wish to join as a</span> Volunteer ?</div>
            <img src="{{url('images/landing-page/home/brush.svg')}}" alt="">
        </div>
        <div class="text">Be an angel: join our network of agents that have volunteered to make this great attempt a success. Note that we conduct a detailed systemized selection process.</div>
        <div class="cta-btn btn-fill">
            <a href="{{route('frontend.auth.register')}}" class="btn-fill">
                <div class="btn-text">Register as a Volunteer</div>
            </a>
        </div>
        
    </div>
</section>

@endsection

@push('after-scripts')

@endpush
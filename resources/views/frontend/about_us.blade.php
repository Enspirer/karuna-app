@extends('frontend.layouts.app')

@section('title', app_name() . ' | ' . __('navs.general.home'))

@section('content')

<section class="about-hero-section">
    <div class="container">
       <div class="inner-wrapper">
            <div class="title-block">
                <div class="title">About<br>Karuna</div>
                <img src="{{url('images/landing-page/home/brush.svg')}}" alt="">
            </div>
            <div class="text">Lorem Ipsum is simply dummy text of the printing and typesetting industry.  industry's standard dummy text ever since the 1500s</div>
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
            <div class="text">Karuna project is a digital platform for collecting donations to be distributed to people in need. We build strength, stability, and self-reliance through shelter.</div>
        </div>
    </div>
</section>

<section class="text-section">
    <div class="container">
        <div class="inner-wrapper">
            <div class="title">Who we are</div>
            <div class="text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Corrupti, similique numquam quo eaque at sed!</div>
            <div class="text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Cumque commodi dolorem quibusdam, iusto tempore ipsa nostrum reprehenderit quasi distinctio sapiente, quo aut! Debitis, voluptas quos?</div>
            <div class="text">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Velit, vitae. Magnam veniam dignissimos mollitia placeat similique omnis tempore?</div>
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
            <div class="title">Who we are</div>
            <div class="text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Harum cupiditate quas, fugiat quibusdam nemo nostrum fugit iste perferendis distinctio labore.</div>
            <div class="text">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Accusamus, obcaecati sunt pariatur eaque est accusantium optio, vitae ipsa qui a quia quaerat quasi repudiandae iste ab. Ab voluptates iusto id.</div>
        </div>
    </div>
</section>

<section class="agent-section">
    <div class="container">
        <div class="title-block">
            <div class="title">Whish to join as an Agent?</div>
            <img src="{{url('images/landing-page/home/brush.svg')}}" alt="">
        </div>
        <div class="text">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Debitis laboriosam eveniet doloribus distinctio quae iste, neque voluptatum mollitia sequi sint, alias vitae numquam suscipit saepe!</div>
        <div class="cta-btn btn-fill">
            <a href="{{route('frontend.auth.register')}}" class="btn-fill">
                <div class="btn-text">Register as an Agent</div>
            </a>
        </div>
        
    </div>
</section>

@endsection

@push('after-scripts')

@endpush
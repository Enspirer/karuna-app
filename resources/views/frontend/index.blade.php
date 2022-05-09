@extends('frontend.layouts.app')

@section('title', app_name() . ' | ' . __('navs.general.home'))

@section('content')

<section class="hero-section">
    <div class="splide hero-slider" id="heroSlider">
        <div class="splide__arrows slide-arrows">
            <button class="splide__arrow slide-arrow slide-arrow-prev splide__arrow--prev">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-right" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8z"/>
                </svg>
            </button>
            <button class="splide__arrow slide-arrow slide-arrow-next splide__arrow--next">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-right" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8z"/>
                </svg>
            </button>
        </div>
        <div class="splide__track">
            <ul class="splide__list">
                <li class="splide__slide">
                    <div class="slide slide-1">
                        <img src="{{url('images/landing-page/home/hero-slide-1.png')}}" alt="" class="hero-img">
                        <div class="content-block">
                            <div class="title-block">
                                <div class="title"><span class="dc">w</span>ms Tn fjkqfjka</div>
                                <div class="subtitle subtitle-1">Helping hand to</div>
                                <div class="subtitle subtitle-2">Sri Lankans</div>
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
                    </div>
                </li>
                <li class="splide__slide">Slide 02</li>
                <li class="splide__slide">Slide 03</li>
            </ul>
        </div>
    </div>
</section>

<section class="feature-section">
    <div class="container">
        <div class="title-block">
            <div class="title">Bring <span>JOY</span> to those around you</div>
            <img src="{{url('images/landing-page/home/brush.svg')}}" alt="">
        </div>
        <div class="content">
            <div class="feature-block">
                <img src="{{url('images/landing-page/home/food-icon.png')}}" alt="" class="feature-icon">
                <div class="title-block">
                    <div class="text">Food</div>
                    <div class="icon blue">F</div>
                </div>
                <div class="text">Lorem Ipsum is simply dummy text of the printing and typesetting industry.  industry's standard dummy text ever</div>
            </div>
            <div class="feature-block">
                <img src="{{url('images/landing-page/home/medic-icon.png')}}" alt="" class="feature-icon">
                <img src="{{url('images/landing-page/home/medic-background.svg')}}" alt="" class="feature-back">
                <div class="title-block">
                    <div class="text">Medicine</div>
                    <div class="icon purple">M</div>
                </div>
                <div class="text">Lorem Ipsum is simply dummy text of the printing and typesetting industry.  industry's standard dummy text ever</div>
            </div>
            <div class="feature-block">
                <img src="{{url('images/landing-page/home/school-icon.png')}}" alt="" class="feature-icon">
                <div class="title-block">
                    <div class="text">School Items</div>
                    <div class="icon green">S</div>
                </div>
                <div class="text">Lorem Ipsum is simply dummy text of the printing and typesetting industry.  industry's standard dummy text ever</div>
            </div>
        </div>
    </div>
</section>

<section class="gratitude-section">
    <div class="container">
        <div class="inner-wrapper">
            <div class="image-block">
                <img src="{{url('images/landing-page/home/gratitude.png')}}" alt="">
            </div>
            <div class="content-block">
                <div class="title-block">
                    <div class="title">lD;.=K</div>
                    <div class="subtitle">i,luq ,laujg</div>
                    <img src="{{url('images/landing-page/home/brush.svg')}}" alt="">
                </div>
                <div class="text">Lorem Ipsum is simply dummy text of the printing and typesetting industry.  industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum</div>
            </div>
        </div>
    </div>
</section>

<section class="kindness-section">
    <div class="container">
        <div class="title-block">
            <div class="title">lreKdfõ flakaøh</div>
            <div class="subtitle">The Center for <span>Kindness</span></div>
            <img src="{{url('images/landing-page/home/brush.svg')}}" alt="">
        </div>
        <div class="card-block">
            <div class="card">
                <div class="icon purple">M</div>
                <div class="name">Kasun Jayathilaka</div>
                <div class="location">Anuradapura</div>
                <div class="text">Lorem Ipsum is simply dummy text of the printing and typesetting industry.  industry's</div>
                <a href="#" class="btn-fill">
                    <div class="btn-text">Donate Now</div>
                </a>
            </div>
            <div class="card active">
                <div class="icon blue">F</div>
                <div class="name">Kasun Jayathilaka</div>
                <div class="location">Anuradapura</div>
                <div class="text">Lorem Ipsum is simply dummy text of the printing and typesetting industry.  industry's</div>
                <a href="#" class="btn-fill">
                    <div class="btn-text">Donate Now</div>
                </a>
            </div>
            <div class="card">
                <div class="icon green">S</div>
                <div class="name">Kasun Jayathilaka</div>
                <div class="location">Anuradapura</div>
                <div class="text">Lorem Ipsum is simply dummy text of the printing and typesetting industry.  industry's</div>
                <a href="#" class="btn-fill">
                    <div class="btn-text">Donate Now</div>
                </a>
            </div>
            <div class="card">
                <div class="icon purple">M</div>
                <div class="name">Kasun Jayathilaka</div>
                <div class="location">Anuradapura</div>
                <div class="text">Lorem Ipsum is simply dummy text of the printing and typesetting industry.  industry's</div>
                <a href="#" class="btn-fill">
                    <div class="btn-text">Donate Now</div>
                </a>
            </div>
            <div class="card">
                <div class="icon blue">F</div>
                <div class="name">Kasun Jayathilaka</div>
                <div class="location">Anuradapura</div>
                <div class="text">Lorem Ipsum is simply dummy text of the printing and typesetting industry.  industry's</div>
                <a href="#" class="btn-fill">
                    <div class="btn-text">Donate Now</div>
                </a>
            </div>
            <div class="card">
                <div class="icon green">S</div>
                <div class="name">Kasun Jayathilaka</div>
                <div class="location">Anuradapura</div>
                <div class="text">Lorem Ipsum is simply dummy text of the printing and typesetting industry.  industry's</div>
                <a href="#" class="btn-fill">
                    <div class="btn-text">Donate Now</div>
                </a>
            </div>
        </div>
    </div>
</section>

<section class="news-section">
    <div class="container">
        <div class="title-block">
            <div class="title">j¾;udkfha igyka</div>
            <div class="subtitle">Latest Event</div>
            <img src="{{url('images/landing-page/home/brush.svg')}}" alt="">
        </div>
        <div class="content-block">
            <div class="feature-news"></div>
            <div class="news-list">
                <div class="news-item">
                    <a href="#" class="news-link">
                        <img src="" alt="" class="news-img">
                        <div class="content">
                            <div class="date">02 nd January 2022</div>
                            <div class="title">Latest event topic here</div>
                            <div class="text">Lorem Ipsum is simply dummy text of the printing and typesetting industry.  industry's standard</div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection

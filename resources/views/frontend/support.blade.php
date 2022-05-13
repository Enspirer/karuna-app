@extends('frontend.layouts.app')

@section('title', app_name() . ' | ' . __('navs.general.home'))

@section('content')

<section class="support-hero-section" style="background: url('{{url('images/landing-page/support/hero-back.png')}}');">
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
                    <a href="{{route('frontend.payment')}}" class="cta-btn btn-fill">
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
</section>

<section class="campaign-section">
    <div class="container">
        <div class="title-block">
            <div class="title">Bring <span>JOY</span> to those around you</div>
            <img src="{{url('images/landing-page/home/brush.svg')}}" alt="">
        </div>
        <div class="splide campaign-slider" id="campaignSlider">
            <div class="splide__track">
                <ul class="splide__list">
                    <li class="splide__slide">
                        <div class="campaign-slide">
                            <div class="circle purple">M</div>
                            <div class="campaign-card">
                                <div class="title">Campaign title here</div>
                                <div class="text">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Odio commodi nisi fugit molestias quidem maiores!</div>
                                <div class="range-bar" data-width="85%">
                                    <div class="range"></div>
                                </div>
                                <div class="campaign-info">
                                    <div class="info-block green">
                                        <div class="title">Goals</div>
                                        <div class="amount"><span class="currency">Rs.</span>15000</div>
                                    </div>
                                    <div class="info-block blue">
                                        <div class="title">Found</div>
                                        <div class="amount"><span class="currency">Rs.</span>15000</div>
                                    </div>
                                    <div class="info-block gray">
                                        <div class="title">Target</div>
                                        <div class="amount"><span class="currency">Rs.</span>15000</div>
                                    </div>
                                </div>
                                <a href="#" class="btn-fill cta-btn">
                                    <div class="btn-text">Donate Now</div>
                                </a>
                            </div>
                        </div>
                    </li>
                    <li class="splide__slide">
                        <div class="campaign-slide">
                            <div class="circle blue">F</div>
                            <div class="campaign-card">
                                <div class="title">Campaign title here</div>
                                <div class="text">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Odio commodi nisi fugit molestias quidem maiores!</div>
                                <div class="range-bar" data-width="85%">
                                    <div class="range"></div>
                                </div>
                                <div class="campaign-info">
                                    <div class="info-block green">
                                        <div class="title">Goals</div>
                                        <div class="amount"><span class="currency">Rs.</span>15000</div>
                                    </div>
                                    <div class="info-block blue">
                                        <div class="title">Found</div>
                                        <div class="amount"><span class="currency">Rs.</span>15000</div>
                                    </div>
                                    <div class="info-block gray">
                                        <div class="title">Target</div>
                                        <div class="amount"><span class="currency">Rs.</span>15000</div>
                                    </div>
                                </div>
                                <a href="#" class="btn-fill cta-btn">
                                    <div class="btn-text">Donate Now</div>
                                </a>
                            </div>
                        </div>
                    </li>
                    <li class="splide__slide">
                        <div class="campaign-slide">
                            <div class="circle green">S</div>
                            <div class="campaign-card">
                                <div class="title">Campaign title here</div>
                                <div class="text">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Odio commodi nisi fugit molestias quidem maiores!</div>
                                <div class="range-bar" data-width="85%">
                                    <div class="range"></div>
                                </div>
                                <div class="campaign-info">
                                    <div class="info-block green">
                                        <div class="title">Goals</div>
                                        <div class="amount"><span class="currency">Rs.</span>15000</div>
                                    </div>
                                    <div class="info-block blue">
                                        <div class="title">Found</div>
                                        <div class="amount"><span class="currency">Rs.</span>15000</div>
                                    </div>
                                    <div class="info-block gray">
                                        <div class="title">Target</div>
                                        <div class="amount"><span class="currency">Rs.</span>15000</div>
                                    </div>
                                </div>
                                <a href="#" class="btn-fill cta-btn">
                                    <div class="btn-text">Donate Now</div>
                                </a>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
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
        </div>
        <div class="button-block">
            <a href="#" class="cta-btn btn-outline">
                <div class="btn-text">View All</div>
            </a>
        </div>
    </div>
</section>

<section class="package-section">
    <div class="container">
        <div class="inner-wrapper">
            <div class="content-block">
                <div class="subtitle">PACKAGES</div>
                <div class="title">This is Karuna <span>Packages</span><br>that you can give</div>
                <div class="text">Karuna project is a digital platform for collecting donations to be distributed to people in need. We build strength, stability, and self-reliance through shelter.</div>
                <a href="#" class="cta-btn btn-fill">
                    <div class="btn-text">Donate Now</div>
                </a>
            </div>
            <div class="package-block">
                <div class="package-card card-1">
                    <div class="icon blue">F</div>
                    <div class="title">Healthy Food</div>
                    <div class="text">The assistance provided is healthy food used for cooking and eating</div>
                </div>
                <div class="package-card card-2">
                    <div class="icon purple">M</div>
                    <div class="title">Medicine</div>
                    <div class="text">The assistance provided is healthy food used for cooking and eating</div>
                </div>
                <div class="package-card card-3">
                    <div class="icon green">S</div>
                    <div class="title">School Items</div>
                    <div class="text">The assistance provided is healthy food used for cooking and eating</div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection

@push('after-scripts')

<script>
    // Campaign Slider
    var campaignSlider = new Splide('#campaignSlider', {
        type   : 'loop',
        perPage: 3,
        focus  : 'center',
        pagination: false,
        breakpoints: {
            991: {
                perPage: 2,
            },
            767: {
                perPage: 1,
            },
        },
    });

    campaignSlider.mount();
</script>

@endpush
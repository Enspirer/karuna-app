@extends('frontend.layouts.mobile_app')

@section('title', app_name() . ' | ' . __('navs.general.home'))

@section('content')

<section class="splash-hero-section">
    <div class="splide splash-slider" id="splashSlider">
        <div class="splide__track">
            <ul class="splide__list">
                <li class="splide__slide">
                    <div class="slide" style="background: url('{{url('images/mobile/splash/slide-1.png')}}')">
                        <div class="caption">
                            <div class="subtitle">Helping hand to</div>
                            <div class="title">Sri Lankans</div>
                        </div>
                    </div>
                </li>
                <li class="splide__slide">
                    <div class="slide" style="background: url('{{url('images/mobile/splash/slide-1.png')}}')">
                        <div class="caption">
                            <div class="subtitle">Helping hand to</div>
                            <div class="title">Sri Lankans</div>
                        </div>
                    </div>
                </li>
                <li class="splide__slide">
                    <div class="slide" style="background: url('{{url('images/mobile/splash/slide-1.png')}}')">
                        <div class="caption">
                            <div class="subtitle">Helping hand to</div>
                            <div class="title">Sri Lankans</div>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</section>

<section class="splash-body-section">
    <div class="mobile-container">
        <div class="text-block">
            <div class="subtitle">Discover your</div>
            <div class="title">Donor and Receiver</div>
            <div class="text">Explore all the existing donor lists and receivers based on your interest.</div>
        </div>
        <div class="button-block">
            <a href="#" class="cta-btn btn-fill">
                <div class="btn-text">Sign in</div>
            </a>
            <a href="#" class="cta-btn btn-outline">
                <div class="btn-text">Register</div>
            </a>
        </div>
    </div>
</section>

@endsection

@push('after-scripts')

<script>
    // Hero Slider
    var splashSlider = new Splide('#splashSlider', {
        type: 'loop',
        arrows: false,
        classes: {
		    pagination: 'splide__pagination pagination',
		    page      : 'splide__pagination__page indicator',
        },
    });

    splashSlider.mount();
</script>

@endpush
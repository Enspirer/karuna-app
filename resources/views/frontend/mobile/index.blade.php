@extends('frontend.layouts.mobile_app')

@section('title', app_name() . ' | ' . __('navs.general.home'))

@section('content')

<section class="top-nav-section">
    <div class="mobile-container">
      <div class="inner-wrapper">
            <a href="{{route('frontend.mobile.index')}}" class="brand">
                <img src="{{url('images/mobile/logo/karuna-logo.svg')}}" alt="">
            </a>
            <a href="#" class="profile">
                <i class="bi bi-suit-heart-fill"></i>
                <div class="text">1578</div>
                <img src="{{url('images/landing-page/nav/profile.png')}}" alt="">
            </a>
      </div>
    </div>
</section>

<section class="filter-section">
    <div class="mobile-container">
        <div class="inner-wrapper">
            <i class="bi bi-search"></i>
            <input type="text" class="form-control" placeholder="Search">
            <a href="#" class="btn-filter">
                <i class="bi bi-filter"></i>
            </a>
        </div>
    </div>
</section>

<section class="home-slider-section">
    <div class="mobile-container">
        <div class="splide home-slider" id="homeSlider">
            <div class="splide__track">
                <ul class="splide__list">
                    <li class="splide__slide">
                        <div class="slide">
                            <a href="#">
                                <img src="{{url('images/mobile/home/slide-1.png')}}" alt="">
                            </a>
                        </div>
                    </li>
                    <li class="splide__slide">
                        <div class="slide">
                            <a href="#">
                                <img src="{{url('images/mobile/home/slide-2.png')}}" alt="">
                            </a>
                        </div>
                    </li>
                    <li class="splide__slide">
                        <div class="slide">
                            <a href="#">
                                <img src="{{url('images/mobile/home/slide-3.png')}}" alt="">
                            </a>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</section>

@endsection

@push('after-scripts')

<script>
    // Hero Slider
    var heroSlider = new Splide('#heroSlider', {
        type: 'loop',
    });

    heroSlider.mount();
</script>

@endpush
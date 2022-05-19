@extends('frontend.layouts.app')

@section('title', app_name() . ' | ' . __('navs.general.home'))

@section('content')

<section class="profile-section">
    <div class="container">
        <div class="inner-wrapper">
            <div class="info-block">
                <div class="receiver-header">
                    <div class="image-block">
                        <img src="{{url('images/dashboard/receiver-back.png')}}" alt="" class="cover">
                        <img src="{{url('images/landing-page/nav/profile.png')}}" alt="" class="dp">
                    </div>
                    <div class="title">Mrs. Inoka Perera</div>
                    <div class="status">Receiver</div>
                    <div class="text">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Expedita ex dolore veniam libero atque</div>
                    <a href="#" class="cta-btn btn-fill">
                        <div class="btn-text">Donate Now</div>
                    </a>
                </div>
            </div>
            <div class="content-block">
                <div class="header">
                    <div class="title">Receiver Information</div>
                    <a href="#" class="cta-link">Go Agent Details</a>
                </div>
                <div class="info">
                    <div class="row g-0">
                        <div class="col-sm-6">
                            <div class="label">Nick Name</div>
                            <div class="text">Inoka Perera</div>
                        </div>
                        <div class="col-sm-6">
                            <div class="label">Age</div>
                            <div class="text">50 Years Old</div>
                        </div>
                        <div class="col-sm-6">
                            <div class="label">Address</div>
                            <div class="text">54/B Kadana, Kotugoda.</div>
                        </div>
                        <div class="col-sm-6">
                            <div class="label">City</div>
                            <div class="text">Ja-Ela</div>
                        </div>
                        <div class="col-sm-6">
                            <div class="label">Phone Number</div>
                            <div class="text">+94 77 44 25 235</div>
                        </div>
                    </div>
                </div>
                <div class="splide profile-slider" id="profileSlider">
                    <div class="splide__track">
                            <ul class="splide__list">
                                <li class="splide__slide">
                                    <a href="#" class="slider-link">
                                        <img src="{{url('images/dashboard/placeholder.png')}}" alt="" class="slide-img">
                                    </a>
                                </li>
                                <li class="splide__slide">
                                    <a href="#" class="slider-link">
                                        <img src="{{url('images/dashboard/placeholder.png')}}" alt="" class="slide-img">
                                    </a>
                                </li>
                                <li class="splide__slide">
                                    <a href="#" class="slider-link">
                                        <img src="{{url('images/dashboard/placeholder.png')}}" alt="" class="slide-img">
                                    </a>
                                </li>
                            </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection

@push('after-scripts')

<script>
    // Hero Slider
    var profileSlider = new Splide('#profileSlider', {
        arrows: false,
        pagination: false,
        perPage: 3,
        rewind : true,
        perMove: 1,
        autoWidth: true,
    });

    profileSlider.mount();
</script>

@endpush
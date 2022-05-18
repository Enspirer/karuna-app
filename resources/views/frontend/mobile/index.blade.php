@extends('frontend.layouts.mobile_app')

@section('title', app_name() . ' | ' . __('navs.general.home'))

@section('content')

<section class="thank-section">
    <div class="mobile-container">
        <div class="inner-wrapper">
            <a href="{{route('frontend.mobile.index')}}" class="brand">
                <img src="{{url('images/mobile/logo/karuna-logo-white.svg')}}" alt="">
            </a>
            @if(App\Models\Auth\User::where('id',auth()->user()->id)->first()->user_type == 'Donor')
                <a href="#" class="profile">
                    <i class="bi bi-suit-heart-fill"></i>
                    <div class="text">1578</div>
                    <img src="{{url('images/landing-page/nav/profile.png')}}" alt="">
                </a>
            @endif
        </div>
        <div class="title">Receive a small thank<br>for your efforts!</div>
        <div class="thank-block">
            <div class="text">Your package sent successfully and Saman reacted your support</div>
            <div class="image-block">
                <img src="{{url('images/landing-page/nav/profile.png')}}" alt="">
                <i class="bi bi-suit-heart-fill"></i>
            </div>
        </div>
    </div>
</section>

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

@if(App\Models\Auth\User::where('id',auth()->user()->id)->first()->user_type != 'Receiver')
    <section class="donate-list-section">
        <div class="mobile-container">
            <div class="header">
                <div class="title">Donate List</div>
                <a href="{{route('frontend.mobile.donation_list')}}">See All <i class="bi bi-chevron-right"></i></a>
            </div>
            <ul class="list-group">

                @if(count(App\Models\Receivers::where('assigned_agent',auth()->user()->id)->get()) != 0)
                    @foreach(App\Models\Receivers::where('assigned_agent',auth()->user()->id)->take(3)->latest()->get() as $receiver)
                        <li class="list-group-item">
                            <div class="receiver">
                                <div class="content-block">
                                    @if($receiver->requirement == 'Other')
                                        <div class="icon blue">O</div>
                                    @else
                                        @if(App\Models\Packages::where('id',$receiver->requirement)->first() != null)
                                            <img src="{{uploaded_asset(App\Models\Packages::where('id',$receiver->requirement)->first()->image)}}" width="35px" style="border-radius: 50%; height: 35px;" alt="">
                                        @endif
                                    @endif
                                    <div class="text-block">
                                        <div class="name">{{$receiver->name}}</div>
                                        <div class="location">{{$receiver->city}}</div>
                                    </div>
                                </div>
                                <div class="button-block">
                                    <a href="{{route('frontend.mobile.donation_info')}}" class="cta-btn btn-fill">
                                        <div class="btn-text">Donate</div>
                                    </a>
                                    <a href="#" class="cta-link">View more</a>
                                </div>
                            </div>
                        </li>
                    @endforeach
                @endif
                <!-- <li class="list-group-item">
                    <div class="receiver">
                        <div class="content-block">
                            <div class="icon purple">M</div>
                            <div class="text-block">
                                <div class="name">Amila Nandiak</div>
                                <div class="location">Ampara</div>
                            </div>
                        </div>
                        <div class="button-block">
                            <a href="#" class="cta-btn btn-fill">
                                <div class="btn-text">Donate</div>
                            </a>
                            <a href="#" class="cta-link">View more</a>
                        </div>
                    </div>
                </li>
                <li class="list-group-item">
                    <div class="receiver">
                        <div class="content-block">
                            <div class="icon green">S</div>
                            <div class="text-block">
                                <div class="name">Amila Nandiak</div>
                                <div class="location">Ampara</div>
                            </div>
                        </div>
                        <div class="button-block">
                            <a href="#" class="cta-btn btn-fill">
                                <div class="btn-text">Donate</div>
                            </a>
                            <a href="#" class="cta-link">View more</a>
                        </div>
                    </div>
                </li> -->
            </ul>
        </div>
    </section>
@endif

@if(App\Models\Auth\User::where('id',auth()->user()->id)->first()->user_type == 'Agent')
    @include('frontend.mobile.includes.agent_bottom_nav')
@else
    @include('frontend.mobile.includes.bottom_nav')
@endif

@endsection

@push('after-scripts')

<script>
    // Hero Slider
    var homeSlider = new Splide('#homeSlider', {
        type: 'loop',
        arrows: false,
        autoplay: true,
    });

    homeSlider.mount();
</script>

@endpush
@extends('frontend.layouts.mobile_app')

@section('title', app_name() . ' | ' . __('navs.general.home'))

@section('content')


@if(App\Models\Auth\User::where('id',auth()->user()->id)->first()->user_type == 'Donor')
    @if(App\Models\Notification::where('user_id',auth()->user()->id)->where('status','Pending')->first() != null)
   
        <section class="thank-section">
            <div class="mobile-container">
                <div class="inner-wrapper">
                    <a href="{{route('frontend.user.mobile.index')}}" class="brand">
                        <img src="{{url('images/mobile/logo/karuna-logo-english.svg')}}" alt="">
                    </a>            
                    <a href="#" class="profile"> 
                        <i class="bi bi-suit-heart-fill"></i>
                        <div class="text">{{count(App\Models\Receivers::where('donor_id',auth()->user()->id)->get())}}</div>
                        <img src="{{url('images/landing-page/nav/profile.png')}}" alt="">
                    </a>            
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
       
    @endif
@endif

<section class="top-nav-section">
    <div class="mobile-container">
      <div class="inner-wrapper">
            <a href="{{route('frontend.user.mobile.index')}}" class="brand">
                <img src="{{url('images/mobile/logo/karuna-logo-english.svg')}}" alt="">
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

<!-- <section class="section-no-data">
    <div class="mobile-container">
        <div class="inner-wrapper">
            <img src="{{url('images/not-found.png')}}" alt="">
            <div class="text">No data foud</div>
        </div>
    </div>
</section> -->

@if(App\Models\Auth\User::where('id',auth()->user()->id)->first()->user_type == 'Receiver')

<section class="request-list-section">
    <div class="mobile-container">
        <div class="header">
            <div class="title">Donate List</div>
            <a href="#">See All <i class="bi bi-chevron-right"></i></a>
        </div>
        <div class="accordion" id="requestList">
            <div class="accordion-item">
                <h2 class="accordion-header" id="reqHead1">
                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#req1"
                        aria-expanded="true" aria-controls="req1">
                        <div class="header-block">
                            <div class="no">1</div>
                            <div class="text">Pending Request</div>
                            <div class="indicator orange"></div>
                        </div>
                    </button>
                </h2>
                <div id="req1" class="accordion-collapse collapse show" aria-labelledby="reqHead1"
                    data-bs-parent="#requestList">
                    <div class="accordion-body">
                        <div class="title">Description</div>
                        <div class="text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Fugiat soluta iusto
                            exercitationem aliquam alias aliquid, voluptatum quibusdam, ex fugit illum est praesentium
                            reprehenderit laudantium deserunt! Hic quia numquam atque necessitatibus.</div>
                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header" id="reqHead2">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                        data-bs-target="#req2" aria-expanded="false" aria-controls="req2">
                        <div class="header-block">
                            <div class="no">2</div>
                            <div class="text">Approved Request</div>
                            <div class="indicator green"></div>
                        </div>
                    </button>
                </h2>
                <div id="req2" class="accordion-collapse collapse" aria-labelledby="reqHead2"
                    data-bs-parent="#requestList">
                    <div class="accordion-body">
                        <div class="title">Description</div>
                        <div class="text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Fugiat soluta iusto
                            exercitationem aliquam alias aliquid, voluptatum quibusdam, ex fugit illum est praesentium
                            reprehenderit laudantium deserunt! Hic quia numquam atque necessitatibus.</div>
                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header" id="reqHead3">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                        data-bs-target="#req3" aria-expanded="false" aria-controls="req3">
                        <div class="header-block">
                            <div class="no">3</div>
                            <div class="text">Canceled Request</div>
                            <div class="indicator red"></div>
                        </div>
                    </button>
                </h2>
                <div id="req3" class="accordion-collapse collapse" aria-labelledby="reqHead3"
                    data-bs-parent="#requestList">
                    <div class="accordion-body">
                        <div class="title">Description</div>
                        <div class="text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Fugiat soluta iusto
                            exercitationem aliquam alias aliquid, voluptatum quibusdam, ex fugit illum est praesentium
                            reprehenderit laudantium deserunt! Hic quia numquam atque necessitatibus.</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endif

@if(App\Models\Auth\User::where('id',auth()->user()->id)->first()->user_type == 'Agent')
    <section class="donate-list-section">
        <div class="mobile-container">
            <div class="header">
                <div class="title">Donate List</div>
                <a href="{{route('frontend.user.mobile.donation_list')}}">See All <i class="bi bi-chevron-right"></i></a>
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
                                        <div class="name">
                                            @if($receiver->name_toggle == 'yes')
                                                {{$receiver->nick_name}}
                                            @else
                                                {{$receiver->name}}
                                            @endif
                                        </div>
                                        <div class="location">{{$receiver->city}}</div>
                                    </div>
                                </div>
                                <div class="button-block">
                                    <a href="{{route('frontend.user.mobile.view_profile_receiver',$receiver->id)}}" class="cta-link">View more</a>
                                </div>
                            </div>
                        </li>
                    @endforeach
                @else
                    <section class="section-no-data">
                        <div class="mobile-container">
                            <div class="inner-wrapper">
                                <img src="{{url('images/not-found.png')}}" alt="">
                                <div class="text">No data foud</div>
                            </div>
                        </div>
                    </section>
                @endif
               
            </ul>
        </div>
    </section>
@endif


@if(App\Models\Auth\User::where('id',auth()->user()->id)->first()->user_type == 'Donor')
    <section class="donate-list-section">
        <div class="mobile-container">
            <div class="header">
                <div class="title">Donate List</div>
                <a href="{{route('frontend.user.mobile.donation_list')}}">See All <i class="bi bi-chevron-right"></i></a>
            </div>
            <ul class="list-group">

                @if(count(App\Models\Receivers::get()) != 0)
                    @foreach(App\Models\Receivers::take(3)->where('payment_status',null)->latest()->get() as $receiver)
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
                                        <div class="name">
                                            @if($receiver->name_toggle == 'yes')
                                                {{$receiver->nick_name}}
                                            @else
                                                {{$receiver->name}}
                                            @endif
                                        </div>
                                        <div class="location">{{$receiver->city}}</div>
                                    </div>
                                </div>
                                <div class="button-block">
                                    @if($receiver->requirement != 'Other')
                                        <a href="{{route('frontend.user.mobile.donation_info',$receiver->id)}}" class="cta-btn btn-fill">
                                            <div class="btn-text">Donate</div>
                                        </a>
                                    @else
                                        <button href="{{route('frontend.user.mobile.donation_info',$receiver->id)}}" class="cta-btn btn-fill" disabled>
                                            <div class="btn-text">Donate</div>
                                        </button>
                                    @endif
                                    <a href="{{route('frontend.user.mobile.view_profile_receiver',$receiver->id)}}" class="cta-link">View more</a>
                                </div>
                            </div>
                        </li>
                    @endforeach
                @else
                    <section class="section-no-data">
                        <div class="mobile-container">
                            <div class="inner-wrapper">
                                <img src="{{url('images/not-found.png')}}" alt="">
                                <div class="text">No data foud</div>
                            </div>
                        </div>
                    </section>
                @endif
               
            </ul>
        </div>
    </section>
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
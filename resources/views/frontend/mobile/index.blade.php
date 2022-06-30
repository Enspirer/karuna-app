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
                    <a href="{{route('frontend.user.mobile.profile_menu')}}" class="profile"> 
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
            <a href="{{route('frontend.user.mobile.profile_menu')}}" class="profile">
                <i class="bi bi-suit-heart-fill"></i>
                <div class="text">0</div>
                @if(auth()->user()->profile_image != null)
                    <img src="{{uploaded_asset(auth()->user()->profile_image)}}" alt="">
                @else
                    <img src="{{url('images/landing-page/nav/profile.png')}}" alt="">
                @endif
            </a>
      </div>
    </div>
</section>

<!-- <section class="filter-section">
    <div class="mobile-container">
        <div class="inner-wrapper">
            <i class="bi bi-search"></i>
            <input type="text" class="form-control" placeholder="Search">
            <a href="#" class="btn-filter">
                <i class="bi bi-filter"></i>
            </a>
        </div>
    </div>
</section> -->

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
            <div class="title">Receiver List</div>
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
                <div class="title">Receiver List</div>
                <a href="{{route('frontend.user.mobile.donation_list')}}">See All <i class="bi bi-chevron-right"></i></a>
            </div>
            <ul class="list-group">

                @if(count(App\Models\Receivers::where('status','!=','Pending')->where('assigned_agent',auth()->user()->id)->get()) != 0)
                    @foreach(App\Models\Receivers::where('status','!=','Pending')->where('assigned_agent',auth()->user()->id)->take(3)->latest()->get() as $receiver)
                        <li class="list-group-item">
                            <div class="receiver">
                                <div class="content-block">
                                    @if($receiver->requirement == 'Other')
                                        <div class="icon blue">O</div>
                                    @else
                                        @if(App\Models\Packages::where('id',$receiver->requirement)->first() != null)
                                            <img src="{{uploaded_asset(App\Models\Packages::where('id',$receiver->requirement)->first()->image)}}" width="35px" style="border-radius: 50%; height: 35px;" alt="">
                                        @else
                                            <img src="{{url('img/default_cover.png')}}" width="35px" style="border-radius: 50%; height: 35px;" alt="">
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
                                <div class="text">No data found</div>
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
                <div class="title">Receiver List</div>
                <a href="{{route('frontend.user.mobile.donation_list')}}">See All <i class="bi bi-chevron-right"></i></a>
            </div>
            <ul class="list-group">

                @if(count(App\Models\Receivers::where('status','!=','Pending')->get()) != 0)
                    @foreach(App\Models\Receivers::take(3)->where('payment_status',null)->where('status','!=','Pending')->latest()->get() as $receiver)
                        @if(App\Models\Auth\User::where('id',$receiver->assigned_agent)->first() != null)
                            <li class="list-group-item">
                                <div class="receiver">
                                    <div class="content-block">
                                        @if($receiver->requirement == 'Other')
                                            <div class="icon blue">O</div>
                                        @else
                                            @if(App\Models\Packages::where('id',$receiver->requirement)->first() != null)
                                                <img src="{{uploaded_asset(App\Models\Packages::where('id',$receiver->requirement)->first()->image)}}" width="35px" style="border-radius: 50%; height: 35px;" alt="">
                                            @else
                                                <img src="{{url('img/default_cover.png')}}" width="35px" style="border-radius: 50%; height: 35px;" alt="">
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
                                        <a href="{{route('frontend.user.mobile.donation_info',$receiver->id)}}" class="cta-btn btn-fill">
                                            <div class="btn-text">Donate</div>
                                        </a>
                                        <a href="{{route('frontend.user.mobile.view_profile_receiver',$receiver->id)}}" class="cta-link">View more</a>
                                    </div>
                                </div>
                            </li>
                        @endif
                    @endforeach
                @else
                    <section class="section-no-data">
                        <div class="mobile-container">
                            <div class="inner-wrapper">
                                <img src="{{url('images/not-found.png')}}" alt="">
                                <div class="text">No data found</div>
                            </div>
                        </div>
                    </section>
                @endif
               
            </ul>
        </div>
    </section>
@endif


@if(auth()->user()->nic_number == null || auth()->user()->id_photo == null)
    @if(auth()->user()->user_type == 'Agent')

        <!-- NIC modal -->
        <div class="modal fade nic-modal" id="nicModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="nicModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <div class="title">Update NIC Details</div>
                        <p>Please enter your NIC details to continue</p>
                    </div>
                    <form action="{{route('frontend.user.update_nic_details')}}" method="post" enctype="multipart/form-data">
                        {{csrf_field()}}
                        <div class="modal-body">
                            <div class="row g-3">
                                <div class="col-12">
                                    <label for="nic_no" class="form-label">NIC Number</label>
                                    <input type="text" class="form-control" value="{{auth()->user()->nic_number}}" name="nic_number" id="nic_number" required>
                                </div>
                                <div class="col-12">
                                    <label for="nic_img" class="form-label">NIC Photo</label>
                                    <div class="input-group">
                                        @if(auth()->user()->id_photo != null)
                                            <div class="row">
                                                <div class="col-10">
                                                    <input type="file" class="form-control" name="id_photo" id="id_photo" accept="image/png, image/jpeg"  multiple="multiple" required>
                                                </div>
                                                <div class="col-2">
                                                    <img src="{{url('files/agents_id/',auth()->user()->id_photo)}}" style="width: 100%;" alt="" >
                                                </div>
                                            </div>
                                        @else
                                            <input type="file" class="form-control" name="id_photo" id="id_photo" accept="image/png, image/jpeg"  multiple="multiple" required>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <div class="row">
                                <div class="col-12">
                                    <button type="submit" class="cta-btn btn-fill">
                                        <div class="btn-text">Submit</div>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endif

@endif


@if(\Session::has('success_nic'))

<div class="modal fade form-submit-modal" id="overlay" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog" style="width: 90%; max-width: 600px; margin: 0; top: 50%; left: 50%; transform: translate(-50%, -50%) !important;">
        <div class="modal-content" style="background: linear-gradient(60deg, #E4F2FB, #9ACDFF); border: 2px solid #0C75FF; border-radius: 15px;">
            <div class="modal-body" style="display: flex; flex-direction: row; align-items: center; justify-content: center; gap: 30px;">
                <i class="bi bi-x-lg" data-bs-dismiss="modal" style="position: absolute; top: 5px; right: 5px; color: #fff; font-size: 16px; background-color: rgba(255, 255, 255, 0.5); width: 35px; height: 35px; border-radius: 50%; display: flex; flex-direction: row; justify-content: center; align-items: center; backdrop-filter: blur(5px);"></i>
                <!-- <div class="image-block">
                    <img src="{{url('images/success.png')}}" alt="">
                </div> -->
                <div class="content-block">
                    <div class="title" style="font-size: 40px; color: #0C75FF; font-weight: 400; margin-bottom: 10px;">Success !</div>
                    <p class="text" style="font-size: 16px; ont-weight 300; margin: 0; color: #333;">Submitted Successfully.</p>
                    <button type="button" class="btn btn-primary px-4 mt-4" style="margin-left:60px;" data-bs-dismiss="modal">OK</button>
                </div>
            </div>
        </div>
    </div>
</div>

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

<script>
    $(window).on('load', function () {
        $('#nicModal').modal('show');
    });
    $("#close-btn").click(function () {
        $('#nicModal').modal('hide');
    });
</script>


<script>
    $(window).on('load', function () {
        $('#overlay').modal('show');
    });
    $("#close-btn").click(function () {
        $('#overlay').modal('hide');
    });
</script>



@endpush
@extends('frontend.layouts.app')

@section('title', app_name() . ' | ' . __('navs.general.home'))

@section('content')

<section class="profile-section">
    <div class="container">
        <div class="inner-wrapper">
            <div class="info-block">
                <div class="receiver-header">
                    <div class="image-block">

                        @if($receiver->cover_image == null)
                            <img src="{{url('images/landing-page/nav/profile.png')}}" alt="" class="cover">
                        @else
                            <img src="{{ uploaded_asset($receiver->cover_image) }}" alt="" class="cover">
                        @endif
                        @if($receiver->profile_image == null)
                            <img src="{{url('images/landing-page/nav/profile.png')}}" alt="" class="dp">
                        @else
                            <img src="{{ uploaded_asset($receiver->profile_image) }}" alt="" class="dp">
                        @endif

                    </div>
                    @if($receiver->name_toggle != 'yes')
                        <div class="title">{{$receiver->name}}</div>
                    @else
                        <div class="title">{{$receiver->nick_name}}</div>
                    @endif
                    <div class="status">Receiver</div>
                    <div class="text" style="overflow: hidden; text-overflow: ellipsis; display: -webkit-box; -webkit-line-clamp: 8; -webkit-box-orient: vertical;">{{$receiver->bio}}</div>
                    <a href="{{route('frontend.payment',$receiver->id)}}" class="cta-btn btn-fill">
                        <div class="btn-text">Donate Now</div>
                    </a>
                </div>
            </div>
            <div class="content-block">
                <div class="header">
                    <div class="title">Receiver Information</div>
                    <a href="{{route('frontend.agent_profile',$receiver->assigned_agent)}}" class="cta-link">Go Agent Details</a>
                </div>
                <div class="info">
                    <div class="row g-0">
                        <div class="col-sm-6">
                            <div class="label">Nick Name</div>
                            <div class="text">{{$receiver->nick_name}}</div>
                        </div>
                        <div class="col-sm-6">
                            <div class="label">Age</div>
                            <div class="text">{{$receiver->age}}</div>
                        </div>
                        <div class="col-sm-6">
                            <div class="label">Address</div>
                            <div class="text">{{$receiver->address}}</div>
                        </div>
                        <div class="col-sm-6">
                            <div class="label">City</div>
                            <div class="text">{{$receiver->city}}</div>
                        </div>
                        {{--<div class="col-sm-6">--}}
                            {{--<div class="label">Phone Number</div>--}}
                            {{--<div class="text">{{$receiver->phone_number}}</div>--}}
                        {{--</div>--}}
                        <div class="col-12">
                            <div class="label"><b>Bio</b></div>
                            @if($receiver->big)
                                <div class="text">{{$receiver->bio}}</div>
                            @else
                                <div class="text" style="color:gray">Bio not updated</div>
                            @endif
                        </div>
                        <div class="col-12">
                            <div class="label"><b>About Donation</b></div>
                            @if($receiver->about_donation)
                                <div class="text">{{$receiver->about_donation}}</div>
                            @else
                                <div class="text" style="color:gray">Donation description not updated</div>
                            @endif
                        </div>
                    </div>
                </div>
                <!-- <div class="splide profile-slider" id="profileSlider">
                    <div class="splide__track">
                        <ul class="splide__list">
                            @if($receiver->images != null)
                                @php
                                    $req_images = preg_split ("/\,/", $receiver->images);
                                @endphp
                                    @foreach($req_images as $key=> $req_image)
                                        <li class="splide__slide">
                                            <img src="{{uploaded_asset($req_image)}}" ach-img-view="true">
                                        </li>
                                    @endforeach
                            @endif                            
                        </ul>
                    </div>
                </div> -->
                <div class="gallery">
                    @if($receiver->images != null)
                        @php
                            $req_images = preg_split ("/\,/", $receiver->images);
                        @endphp
                            @foreach($req_images as $key=> $req_image)
                                    <img src="{{uploaded_asset($req_image)}}" ach-img-view="true">
                            @endforeach
                    @endif

                    @if($receiver->videos != null)
                    <div class="ach-video-thumbnail">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-play-circle" viewBox="0 0 16 16">
                            <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                            <path d="M6.271 5.055a.5.5 0 0 1 .52.038l3.5 2.5a.5.5 0 0 1 0 .814l-3.5 2.5A.5.5 0 0 1 6 10.5v-5a.5.5 0 0 1 .271-.445z"/>
                        </svg>
                        <video>
                            <source src="{{uploaded_asset($receiver->videos)}}" ach-video-view="true" type="video/mp4">
                        </video>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>

@endsection

@push('after-scripts')

@endpush
@extends('frontend.layouts.mobile_app')

@section('title', app_name() . ' | ' . __('navs.general.home'))

@section('content')

<!-- ======== Top Nav ======== -->
<section class="app-bar-section">
    <div class="mobile-container">
        <div class="inner-wrapper">
            <!-- <a href="{{route('frontend.user.mobile.index')}}" class="back-btn"> -->
            <a href="{{route('frontend.user.mobile.index')}}" class="back-btn">
                <i class="fa-solid fa-arrow-left"></i>
            </a>
            <div class="title">
                @if($receiver->name_toggle == 'yes')
                    {{$receiver->nick_name}}
                @else
                    {{$receiver->name}}
                @endif
                's Profile</div>
        </div>
    </div>
</section>
<!-- ======== Top Nav End ======== -->

<section class="profile-section">
    <div class="mobile-container">
        <div class="inner-wrapper">
            <div class="header" style="background: url('{{uploaded_asset($receiver->cover_image)}}')">
                <div class="dp-block">
                    @if($receiver->profile_image)
                        <img src="{{uploaded_asset($receiver->profile_image)}}" alt="">
                    @else
                        <img src="{{url('images/landing-page/nav/profile.png')}}" alt="">
                    @endif
                </div>
            </div>
            <div class="name">
                @if($receiver->name_toggle == 'yes')
                    {{$receiver->nick_name}}
                @else
                    {{$receiver->name}}
                @endif
            </div>
            <!-- <div class="star-rating">
                <i class="bi bi-star-fill"></i>
                <i class="bi bi-star-fill"></i>
                <i class="bi bi-star-fill"></i>
                <i class="bi bi-star-half"></i>
                <i class="bi bi-star"></i>
            </div> -->
            <div class="status yellow">Receiver</div>
            <div class="profile-info">{{$receiver->about_donation}}</div>
            <div class="info-table-wrapper">
                <table class="info-table">
                    <tbody>
                        <tr>
                            <td>Nick Name</td>
                            <td>{{$receiver->nick_name}}</td>
                        </tr>
                        <tr>
                            <td>Age</td>
                            <td>{{$receiver->age}}</td>
                        </tr>
                        <tr>
                            <td>Gender</td>
                            <td>{{$receiver->gender}}</td>
                        </tr>
                        <tr>
                            <td>Address</td>
                            <td>{{$receiver->address}}</td>
                        </tr>
                        {{--<tr>--}}
                            {{--<td>Phone Number</td>--}}
                            {{--<td>{{$receiver->phone_number}}</td>--}}
                        {{--</tr>--}}
                        <tr>
                            <td>City</td>
                            <td>{{$receiver->city}}</td>
                        </tr>
                        {{--<tr>--}}
                            {{--<td>NIC</td>--}}
                            {{--<td>{{$receiver->nic_number}}</td>--}}
                        {{--</tr>--}}
                    </tbody>
                </table>
            </div>
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

            @auth                
                @if(auth()->user()->user_type == 'Donor')
                    <a href="{{route('frontend.user.mobile.payment',$receiver->id)}}" class="cta-btn btn-fill mt-3">
                        <div class="btn-text">Donate Now</div>
                    </a>
                @endif
            @endauth
        </div>
    </div>
</section>

@endsection

@push('after-scripts')

@endpush
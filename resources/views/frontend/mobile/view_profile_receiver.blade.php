@extends('frontend.layouts.mobile_app')

@section('title', app_name() . ' | ' . __('navs.general.home'))

@section('content')

<!-- ======== Top Nav ======== -->
<section class="app-bar-section">
    <div class="mobile-container">
        <div class="inner-wrapper">
            <a href="{{route('frontend.mobile.index')}}" class="back-btn">
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
            <div class="header">
                <div class="dp-block">
                    <img src="{{url('images/landing-page/nav/profile.png')}}" alt="">
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
                        <tr>
                            <td>Phone Number</td>
                            <td>{{$receiver->phone_number}}</td>
                        </tr>
                        <tr>
                            <td>City</td>
                            <td>{{$receiver->city}}</td>
                        </tr>
                        <tr>
                            <td>NIC</td>
                            <td>{{$receiver->nic_number}}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="gallery">
                @if($receiver->images != null)
                    @php
                        $req_images = preg_split ("/\,/", $receiver->images);
                    @endphp
                    <div class="row">
                        @foreach($req_images as $key=> $req_image)
                            <div class="col-4">
                                <img src="{{uploaded_asset($req_image)}}" class="mb-3" style="height:70px; object-fit:cover" width="100%" alt="">
                            </div>
                        @endforeach
                    </div>
                @endif
            </div>
            <a href="#" class="cta-btn btn-fill mt-3">
                <div class="btn-text">Donate Now</div>
            </a>
        </div>
    </div>
</section>

@endsection

@push('after-scripts')

@endpush
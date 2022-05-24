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
            <div class="title">Kamani's Profile</div>
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
            <div class="name">Mis. Kamani Jayathilaka</div>
            <div class="star-rating">
                <i class="bi bi-star-fill"></i>
                <i class="bi bi-star-fill"></i>
                <i class="bi bi-star-fill"></i>
                <i class="bi bi-star-half"></i>
                <i class="bi bi-star"></i>
            </div>
            <div class="status yellow">Receiver</div>
            <div class="profile-info">Lorem ipsum dolor sit amet consectetur adipisicing elit. Provident optio atque quibusdam, excepturi laboriosam mollitia quos sequi nobis quidem ex!</div>
            <div class="info-table-wrapper">
                <table class="info-table">
                    <tbody>
                        <tr>
                            <td>Nick Name</td>
                            <td>Kamani Jayanthi</td>
                        </tr>
                        <tr>
                            <td>Age</td>
                            <td>50</td>
                        </tr>
                        <tr>
                            <td>Gender</td>
                            <td>Female</td>
                        </tr>
                        <tr>
                            <td>Address</td>
                            <td>584/C, Colombo Rd, Wattala.</td>
                        </tr>
                        <tr>
                            <td>Phone Number</td>
                            <td>+94 77 44 25 235</td>
                        </tr>
                        <tr>
                            <td>Account Number</td>
                            <td>*************584</td>
                        </tr>
                        <tr>
                            <td>City</td>
                            <td>Waththala</td>
                        </tr>
                        <tr>
                            <td>ID</td>
                            <td>541248742#</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="gallery">
                <a href="#"><img src="{{url('images/dashboard/placeholder.png')}}" alt=""></a>
                <a href="#"><img src="{{url('images/dashboard/placeholder.png')}}" alt=""></a>
                <a href="#"><img src="{{url('images/dashboard/placeholder.png')}}" alt=""></a>
                <a href="#"><img src="{{url('images/dashboard/placeholder.png')}}" alt=""></a>
                <a href="#"><img src="{{url('images/dashboard/placeholder.png')}}" alt=""></a>
                <a href="#"><img src="{{url('images/dashboard/placeholder.png')}}" alt=""></a>
            </div>
            <a href="#" class="cta-btn btn-fill">
                <div class="btn-text">Donate Now</div>
            </a>
        </div>
    </div>
</section>

@endsection

@push('after-scripts')

@endpush
@extends('frontend.layouts.mobile_app')

@section('title', app_name() . ' | ' . __('navs.general.home'))

@section('content')

@include('frontend.mobile.includes.top_nav')

<section class="profile-section">
    <div class="mobile-container">
        <div class="inner-wrapper">
            <div class="header">
                <a href="#" class="back-edit">
                    <i class="bi bi-camera"></i>
                </a>
                <div class="dp-block">
                    <img src="{{url('images/landing-page/nav/profile.png')}}" alt="">
                    <a href="#" class="dp-edit">
                        <i class="bi bi-camera"></i>
                    </a>
                </div>
            </div>
            <div class="name">Mis. Kamani Jayathilaka</div>
            <div class="status">Receiver</div>
            <a href="#" class="btn-edit">
                <i class="bi bi-pencil-fill"></i>
                Edit
            </a>
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
        </div>
    </div>
</section>

@include('frontend.mobile.includes.agent_bottom_nav')

@endsection

@push('after-scripts')

@endpush
@extends('frontend.layouts.mobile_app')

@section('title', app_name() . ' | ' . __('navs.general.home'))

@section('content')

@include('frontend.mobile.includes.top_nav')

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
            <div class="charity-block">
                <div class="title">Donate List</div>
                <div class="accordion" id="charityList">
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="charHead1">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#char1"
                                aria-expanded="true" aria-controls="char1">
                                <div class="header-block">
                                    <div class="no">1</div>
                                    <div class="text">Pending Request</div>
                                    <div class="indicator orange"></div>
                                </div>
                            </button>
                        </h2>
                        <div id="char1" class="accordion-collapse collapse show" aria-labelledby="charHead1"
                            data-bs-parent="#charityList">
                            <div class="accordion-body">
                                <div class="title">Description</div>
                                <div class="text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Fugiat soluta iusto
                                    exercitationem aliquam alias aliquid, voluptatum quibusdam, ex fugit illum est praesentium
                                    reprehenderit laudantium deserunt! Hic quia numquam atque necessitatibus.</div>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="charHead2">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#char2" aria-expanded="false" aria-controls="char2">
                                <div class="header-block">
                                    <div class="no">2</div>
                                    <div class="text">Approved Request</div>
                                    <div class="indicator green"></div>
                                </div>
                            </button>
                        </h2>
                        <div id="char2" class="accordion-collapse collapse" aria-labelledby="charHead2"
                            data-bs-parent="#charityList">
                            <div class="accordion-body">
                                <div class="title">Description</div>
                                <div class="text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Fugiat soluta iusto
                                    exercitationem aliquam alias aliquid, voluptatum quibusdam, ex fugit illum est praesentium
                                    reprehenderit laudantium deserunt! Hic quia numquam atque necessitatibus.</div>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="charHead3">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#char3" aria-expanded="false" aria-controls="char3">
                                <div class="header-block">
                                    <div class="no">3</div>
                                    <div class="text">Canceled Request</div>
                                    <div class="indicator red"></div>
                                </div>
                            </button>
                        </h2>
                        <div id="char3" class="accordion-collapse collapse" aria-labelledby="charHead3"
                            data-bs-parent="#charityList">
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
            <a href="#" class="cta-btn btn-fill">
                <div class="btn-text">Donate Now</div>
            </a>
        </div>
    </div>
</section>

@include('frontend.mobile.includes.agent_bottom_nav')

@endsection

@push('after-scripts')

@endpush
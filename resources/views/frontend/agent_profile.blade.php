@extends('frontend.layouts.app')

@section('title', app_name() . ' | ' . __('navs.general.home'))

@section('content')

<section class="profile-section">
    <div class="container">
        <div class="inner-wrapper">
            <div class="info-block">
                <div class="header">
                    <img src="{{url('images/landing-page/nav/profile.png')}}" alt="" class="dp">
                    <div class="title">Mrs. Inoka Perera</div>
                    <div class="star-rating">
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-half"></i>
                        <i class="bi bi-star"></i>
                    </div>
                    <div class="status agent">Agent</div>
                    <div class="text">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Expedita ex dolore veniam libero atque</div>
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
            </div>
            <div class="content-block">
                <div class="header">
                    <div class="title">Her Charity Works</div>
                    <a href="#" class="cta-link">Back to Dashboard</a>
                </div>
                <div class="accordion" id="charityList">
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="charHead1">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#char1"
                                aria-expanded="true" aria-controls="char1">
                                <div class="header-block">
                                    <div class="no">1</div>
                                    <div class="text">Donation Title here</div>
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
                                    <div class="text">Donation Title here</div>
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
                                    <div class="text">Donation Title here</div>
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
                                <div class="media">
                                    <img src="{{url('images/dashboard/placeholder.png')}}" alt="">
                                    <img src="{{url('images/dashboard/placeholder.png')}}" alt="">
                                    <img src="{{url('images/dashboard/placeholder.png')}}" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection

@push('after-scripts')

@endpush
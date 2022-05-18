@extends('frontend.layouts.mobile_app')

@section('title', app_name() . ' | ' . __('navs.general.home'))

@section('content')

@include('frontend.mobile.includes.top_nav')

<section class="donation-history-section">
    <div class="mobile-container">
        <div class="accordion" id="donationHistory">
            <div class="accordion-item">
                <h2 class="accordion-header" id="donationHead1">
                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#donation1" aria-expanded="true" aria-controls="donation1">
                    <div class="header-block">
                        <div class="no">1</div>
                        <div class="text">Kamala's Packages</div>
                    </div>
                </button>
                </h2>
                <div id="donation1" class="accordion-collapse collapse show" aria-labelledby="donationHead1" data-bs-parent="#donationHistory">
                    <div class="accordion-body">
                        <div class="row g-0">
                            <div class="col-6">
                                <label>Agent Name</label>
                                <div class="text">Mr. Kamal Kusum</div>
                            </div>
                            <div class="col-6">
                                <label>Package</label>
                                <div class="text">School Items</div>
                            </div>
                            <div class="col-6">
                                <label>Receiver Name</label>
                                <div class="text">Mr. Amila Nandika </div>
                            </div>
                            <div class="col-6">
                                <label>Donation Status</label>
                                <div class="text completed"><i class="bi bi-check-circle-fill"></i> Completed</div>
                            </div>
                            <div class="col-6">
                                <label>Date</label>
                                <div class="text">22/05/2022</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header" id="donationHead2">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#donation2" aria-expanded="false" aria-controls="donation2">
                    <div class="header-block">
                        <div class="no">2</div>
                        <div class="text">Kamala's Packages</div>
                    </div>
                </button>
                </h2>
                <div id="donation2" class="accordion-collapse collapse" aria-labelledby="donationHead2" data-bs-parent="#donationHistory">
                    <div class="accordion-body">
                        <div class="row g-0">
                            <div class="col-6">
                                <label>Agent Name</label>
                                <div class="text">Mr. Kamal Kusum</div>
                            </div>
                            <div class="col-6">
                                <label>Package</label>
                                <div class="text">School Items</div>
                            </div>
                            <div class="col-6">
                                <label>Receiver Name</label>
                                <div class="text">Mr. Amila Nandika </div>
                            </div>
                            <div class="col-6">
                                <label>Donation Status</label>
                                <div class="text pending"><i class="bi bi-exclamation-circle-fill"></i> Pending</div>
                            </div>
                            <div class="col-6">
                                <label>Date</label>
                                <div class="text">22/05/2022</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header" id="donationHead3">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#donation3" aria-expanded="false" aria-controls="donation3">
                    <div class="header-block">
                        <div class="no">3</div>
                        <div class="text">Kamala's Packages</div>
                    </div>
                </button>
                </h2>
                <div id="donation3" class="accordion-collapse collapse" aria-labelledby="donationHead3" data-bs-parent="#donationHistory">
                    <div class="accordion-body">
                        <div class="row g-0">
                            <div class="col-6">
                                <label>Agent Name</label>
                                <div class="text">Mr. Kamal Kusum</div>
                            </div>
                            <div class="col-6">
                                <label>Package</label>
                                <div class="text">School Items</div>
                            </div>
                            <div class="col-6">
                                <label>Receiver Name</label>
                                <div class="text">Mr. Amila Nandika </div>
                            </div>
                            <div class="col-6">
                                <label>Donation Status</label>
                                <div class="text pending"><i class="bi bi-exclamation-circle-fill"></i> Pending</div>
                            </div>
                            <div class="col-6">
                                <label>Date</label>
                                <div class="text">22/05/2022</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            </div>
        </div>
</section>

@include('frontend.mobile.includes.bottom_nav')

@endsection

@push('after-scripts')

@endpush
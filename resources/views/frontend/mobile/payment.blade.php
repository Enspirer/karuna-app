@extends('frontend.layouts.mobile_app')

@section('title', app_name() . ' | ' . __('navs.general.home'))

@section('content')

@include('frontend.mobile.includes.top_nav')

<section class="mobile-payment-section">
    <div class="mobile-container">
        <form action="">
            <div class="package-block">
                <div class="title">Package</div>
                <div class="splide package-slider" role="group" id="packageSlider">
                    <div class="splide__track">
                        <ul class="splide__list">
                            <li class="splide__slide">
                                <div class="package">
                                    <input type="radio" class="form-check-input" name="package" value="5000">
                                    <div class="header">
                                        <div class="amount"><span>Rs.</span> 5000</div>
                                    </div>
                                    <div class="body">Donate</div>
                                </div>
                            </li>
                            <li class="splide__slide">
                                <div class="package">
                                    <input type="radio" class="form-check-input" name="package" value="10000">
                                    <div class="header">
                                        <div class="amount"><span>Rs.</span> 10000</div>
                                    </div>
                                    <div class="body">Donate</div>
                                </div>
                            </li>
                            <li class="splide__slide">
                                <div class="package">
                                    <input type="radio" class="form-check-input" name="package" value="15000">
                                    <div class="header">
                                        <div class="amount"><span>Rs.</span> 15000</div>
                                    </div>
                                    <div class="body">Donate</div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="payment-block">
                <div class="title">Payment Details</div>
                <div class="card-row">
                    <label class="form-label">Card Number</label>
                    <input type="text" class="form-control">
                </div>
                <div class="card-row">
                    <div class="card-col">
                        <label class="form-label">Expiry Date</label>
                        <input type="text" class="form-control">
                    </div>
                    <div class="card-col">
                        <label class="form-label">CVC</label>
                        <input type="text" class="form-control">
                    </div>
                </div>
                <div class="card-row">
                    <label class="form-label">Card Holder Name</label>
                    <input type="text" class="form-control">
                </div>
                <div class="card-row">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="crdSave">
                        <label class="form-check-label" for="crdSave">Save Card <span>(Optional)</span></label>
                    </div>
                </div>
                <div class="card-row">
                    <div class="footer-text">Approved by Central Bank of Sri Lanka</div>
                </div>
            </div>
        </form>
        <div class="exp-timer">14m : 52s</div>
        <a href="#" class="cta-btn btn-fill">
            <div class="btn-text">Continue</div>
        </a>
    </div>
</section>

@include('frontend.mobile.includes.bottom_nav')

@endsection

@push('after-scripts')

<script>
    // Package Slider
    var packageSlider = new Splide('#packageSlider', {
        type: 'loop',
        pagination: false,
        arrows: false,
        autoWidth: true,
    });

    packageSlider.mount();
</script>

@endpush
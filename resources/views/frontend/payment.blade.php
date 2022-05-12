@extends('frontend.layouts.app')

@section('title', app_name() . ' | ' . __('navs.general.home'))

@section('content')

<section class="section-payment">
    <div class="container">
        <div class="inner-wrapper">
            <div class="title">Payment Details</div>
            <div class="content-block">
                <div class="card-block">
                   <form action="">
                        <div class="row-wrapper">
                            <div class="card-row">
                                <div class="label-group">
                                    <div class="label">Card Number</div>
                                    <div class="sub-label">Enter the 16-digit card number on the card</div>
                                </div>
                                <input type="text" name="card-number" class="form-control">
                            </div>
                            <div class="card-row">
                                <div class="label-group">
                                    <div class="label">CVS Number</div>
                                    <div class="sub-label">Enter the 3 or 4 digit number on the card</div>
                                </div>
                                <input type="text" name="cvs-number" class="form-control">
                            </div>
                            <div class="card-row">
                                <div class="label-group">
                                    <div class="label">Expiry Date</div>
                                    <div class="sub-label">Enter the expiration date of the card</div>
                                </div>
                                <div class="card-input-group">
                                    <input type="text" name="exp-month" class="form-control">
                                    <span>/</span>
                                    <input type="text" name="exp-year" class="form-control">
                                </div>
                            </div>
                            <div class="card-row">
                                <div class="label-group">
                                    <div class="label">Package</div>
                                    <div class="sub-label">Choose package you hope to donate</div>
                                </div>
                                <div class="splide package-slider" role="group" id="packageSlider">
                                    <div class="splide__track">
                                        <ul class="splide__list">
                                            <li class="splide__slide">
                                                <div class="package">
                                                    <div class="header">
                                                        <div class="indicator"></div>
                                                        <div class="amount"><span>Rs.</span> 5000</div>
                                                    </div>
                                                    <div class="body">Donate</div>
                                                </div>
                                            </li>
                                            <li class="splide__slide">Slide 02</li>
                                            <li class="splide__slide">Slide 03</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="card-row">
                                <button type="submit" class="cta-btn btn-fill">
                                    <div class="btn-text">Donate Now</div>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="info-block">
                    <div class="info-card">
                        <div class="profile-block">
                            <div class="title">Agent Profile</div>
                            <div class="profile-info">
                                <img src="" alt="" class="dp">
                                <ul class="thead">
                                    <li>Name :</li>
                                    <li>Area :</li>
                                    <li>ID :</li>
                                </ul>
                                <ul class="tbody">
                                    <li>Kamal</li>
                                    <li>Colombo</li>
                                    <li>45784154545</li>
                                </ul>
                            </div>
                            <a href="#">View  History of this Agent</a>
                        </div>
                        <div class="profile-block">
                            <div class="title">Receiver's Profile</div>
                            <div class="profile-info">
                                <img src="" alt="" class="dp">
                                <ul class="thead">
                                    <li>Name :</li>
                                    <li>Area :</li>
                                    <li>ID :</li>
                                </ul>
                                <ul class="tbody">
                                    <li>Kamal</li>
                                    <li>Colombo</li>
                                    <li>45784154545</li>
                                </ul>
                            </div>
                            <a href="#">View  History of this Receiver</a>
                            <div class="cat-icon">S</div>
                        </div>
                        <div class="footer">
                            <div class="text-block">
                                <div class="text">Your Donate amount is</div>
                                <div class="amount"><span>Rs.</span> 5000</div>
                            </div>
                            <img src="" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection

@push('after-scripts')

<script>
    // Hero Slider
    var packageSlider = new Splide('#packageSlider', {
        type: 'loop',
        perPage: 3,
        pagination: false,
        arrows: false,
    });

    packageSlider.mount();
</script>

@endpush
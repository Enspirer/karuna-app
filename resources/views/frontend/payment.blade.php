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
                                <img src="{{url('images/landing-page/nav/profile.png')}}" alt="" class="dp">
                                <ul>
                                    <li>
                                        <span class="th">Name :</span>
                                        <span class="td">Kamal</span>
                                    </li>
                                    <li>
                                        <span class="th">Area :</span>
                                        <span class="td">Colombo</span>
                                    </li>
                                    <li>
                                        <span class="th">ID :</span>
                                        <span class="td">45784154545</span>
                                    </li>
                                </ul>
                            </div>
                            <a href="#">View  History of this Agent</a>
                        </div>
                        <div class="profile-block">
                            <div class="title">Receiver's Profile</div>
                            <div class="profile-info">
                                <img src="{{url('images/landing-page/nav/profile.png')}}" alt="" class="dp">
                                <ul>
                                    <li>
                                        <span class="th">Name :</span>
                                        <span class="td">Kamal</span>
                                    </li>
                                    <li>
                                        <span class="th">Area :</span>
                                        <span class="td">Colombo</span>
                                    </li>
                                    <li>
                                        <span class="th">ID :</span>
                                        <span class="td">45784154545</span>
                                    </li>
                                </ul>
                            </div>
                            <a href="#">View  History of this Receiver</a>
                            <div class="cat-icon blue">S</div>
                        </div>
                        <div class="footer">
                            <div class="text-block">
                                <div class="text">Your Donate amount is</div>
                                <div class="amount"><span>Rs.</span> 5000</div>
                            </div>
                            <img src="{{url('images/landing-page/payment/payment.svg')}}" alt="">
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
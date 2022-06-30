@extends('frontend.layouts.mobile_app')

@section('title', app_name() . ' | ' . '')

@section('content')

@if(session()->get('flash_success'))
    <div class="modal fade signup-success-modal" id="signUpSuccessModal" tabindex="-1" aria-labelledby="signUpSuccessModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
            <div class="inner-wrapper">
                <i class="bi bi-x-lg" data-bs-dismiss="modal"></i>
                <div class="title">Success !</div>
                <p>Your account was successfully created and is pending approval.</p>
                <p>An e-mail will be sent when your account is approved.</p>
            </div>
            </div>
        </div>
    </div>
@endif


<section class="splash-hero-section">
    <div class="splide splash-slider" id="splashSlider">
        <div class="splide__track">
            <ul class="splide__list">
                <li class="splide__slide">
                    <div class="slide" style="background: url('{{url('images/mobile/splash/slide-1.png')}}')">
                        <div class="caption">
                            <div class="subtitle">Helping hand to</div>
                            <div class="title">Sri Lankans</div>
                        </div>
                    </div>
                </li>
                <li class="splide__slide">
                    <div class="slide" style="background: url('{{url('images/mobile/splash/slide-1.png')}}')">
                        <div class="caption">
                            <div class="subtitle">Helping hand to</div>
                            <div class="title">Sri Lankans</div>
                        </div>
                    </div>
                </li>
                <li class="splide__slide">
                    <div class="slide" style="background: url('{{url('images/mobile/splash/slide-1.png')}}')">
                        <div class="caption">
                            <div class="subtitle">Helping hand to</div>
                            <div class="title">Sri Lankans</div>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</section>

<section class="splash-body-section">
    <div class="mobile-container">
        <div class="text-block">
            <div class="subtitle">Choose your package and</div>
            <div class="title">Make a donation</div>
            <div class="text">Become a donor to help Sri Lankans <br> or a Karunaa Angel to find receivers</div>
        </div>
        <div class="button-block">
            <a href="{{route('frontend.mobile.login')}}" class="cta-btn btn-fill">
                <div class="btn-text">Sign in</div>
            </a>
            <a href="{{route('frontend.mobile.register')}}" class="cta-btn btn-outline">
                <div class="btn-text">Register</div>
            </a>
        </div>
    </div>
</section>

@endsection

@push('after-scripts')

<script>
    // Hero Slider
    var splashSlider = new Splide('#splashSlider', {
        type: 'loop',
        arrows: false,
        classes: {
		    pagination: 'splide__pagination pagination',
		    page      : 'splide__pagination__page indicator',
        },
    });

    splashSlider.mount();
</script>


<script>
    $(window).on('load', function () {
        $('#signUpSuccessModal').modal('show');
    });
    $("#close-btn").click(function () {
        $('#signUpSuccessModal').modal('hide');
    });
</script>

@endpush
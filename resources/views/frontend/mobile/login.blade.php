@extends('frontend.layouts.mobile_app')

@section('title', app_name() . ' | ' . 'Login')

@section('content')

<section class="join-header-section">
    <div class="mobile-container">
        <img src="{{url('images/mobile/logo/karuna-logo-english.svg')}}" alt="" class="logo">
        <div class="title">Hello Again !</div>
        <div class="text">Welcome back to Karunaa</div>
    </div>
</section>


<section class="join-form-section">
    <div class="mobile-container">
        {{ html()->form('POST', route('frontend.auth.login.post'))->open() }}
            <div class="join-form">
                <div class="join-form-row">
                    <input type="email" name="email" maxlength="191" class="form-control" value="{{old('email')}}" id="email" placeholder="Enter email" required>
                </div>
                <div class="join-form-row">
                    <input type="password" name="password" class="form-control" id="password" placeholder="Password" required>
                </div>
                @include('includes.partials.messages')
                <div class="join-form-row">
                    <button type="submit" class="cta-btn btn-fill pull-right">
                        <div class="btn-text">Sign In</div>
                    </button>
                </div>
                <div class="join-form-row">
                    <div class="wrapper">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="remember">
                            <label class="form-check-label" for="remember">Remember me</label>
                        </div>
                        <a href="{{ route('frontend.auth.password.reset') }}">Forgot Password?</a>
                    </div>
                </div>
            </div>
        {{ html()->form()->close() }}



        <!-- <div class="devider">
            <div class="text">Or continue with</div>
        </div>
        <div class="social-login">
            <a href="#">
                <img src="{{url('images/mobile/join/facebook.png')}}" alt="">
                <div class="text">Facebook</div>
            </a>
            <a href="#">
                <img src="{{url('images/mobile/join/google.png')}}" alt="">
                <div class="text">Google</div>
            </a>
        </div> -->
        <div class="not-join">Not a member? <a href="{{route('frontend.mobile.register')}}">Register now</a></div>
    </div>
</section>

@endsection

@push('after-scripts')



@endpush
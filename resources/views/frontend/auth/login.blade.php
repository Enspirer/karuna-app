@extends('frontend.layouts.app')

@section('title', app_name() . ' | ' . __('labels.frontend.auth.login_box_title'))

@section('content')

<!-- <div class="row justify-content-center align-items-center">
    <div class="col col-sm-8 align-self-center">
        <div class="card">
            <div class="card-header">
                <strong>
                    @lang('labels.frontend.auth.login_box_title')
                </strong>
            </div>

            <div class="card-body">
                {{ html()->form('POST', route('frontend.auth.login.post'))->open() }}
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                {{ html()->label(__('validation.attributes.frontend.email'))->for('email') }}

                                {{ html()->email('email')
                                    ->class('form-control')
                                    ->placeholder(__('validation.attributes.frontend.email'))
                                    ->attribute('maxlength', 191)
                                    ->required() }}
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                {{ html()->label(__('validation.attributes.frontend.password'))->for('password') }}

                                {{ html()->password('password')
                                    ->class('form-control')
                                    ->placeholder(__('validation.attributes.frontend.password'))
                                    ->required() }}
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <div class="checkbox">
                                    {{ html()->label(html()->checkbox('remember', true, 1) . ' ' . __('labels.frontend.auth.remember_me'))->for('remember') }}
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col">
                            <div class="form-group clearfix">
                                {{ form_submit(__('labels.frontend.auth.login_button')) }}
                            </div>
                        </div>
                    </div>

                    @if(config('access.captcha.login'))
                        <div class="row">
                            <div class="col">
                                @captcha
                                {{ html()->hidden('captcha_status', 'true') }}
                            </div>
                        </div>
                    @endif

                    <div class="row">
                        <div class="col">
                            <div class="form-group text-right">
                                <a href="{{ route('frontend.auth.password.reset') }}">@lang('labels.frontend.passwords.forgot_password')</a>
                            </div>
                        </div>
                    </div>
                {{ html()->form()->close() }}

                <div class="row">
                    <div class="col">
                        <div class="text-center">
                            @include('frontend.auth.includes.socialite')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> -->

<section class="section-join">
    <div class="container">
        <div class="inner-wrapper">
            <div class="content-block">
                <img src="{{url('images/logo/karuna-logo-english.svg')}}" alt="" class="logo">
                {{ html()->form('POST', route('frontend.auth.login.post'))->open() }}
                    <div class="join-form no-scroll">
                        <div class="join-form-row">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" name="email" maxlength="191" class="form-control" value="{{old('email')}}" id="email" placeholder="Email" required>
                        </div>
                        <div class="join-form-row">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" name="password" class="form-control" id="password" placeholder="Password" required>
                        </div>
                        <div class="join-form-row">
                            <button type="submit" class="cta-btn btn-fill pull-right">
                                <div class="btn-text">Sign In</div>
                            </button>
                        </div>
                        <div class="join-form-row">
                            @include('includes.partials.messages')
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
                <div class="not-join">New to Karunaa? <a href="{{url('register')}}">Sign up now</a></div>
            </div>
            <div class="image-block">
                <img src="{{url('images/landing-page/join/join.png')}}" alt="">
            </div>                          
        </div>
    </div>
</section>

@endsection

@push('after-scripts')
    @if(config('access.captcha.login'))
        @captchaScripts
    @endif
@endpush

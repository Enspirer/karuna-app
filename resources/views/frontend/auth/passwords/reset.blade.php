@extends('frontend.layouts.app')

@section('title', app_name() . ' | ' . __('labels.frontend.passwords.reset_password_box_title'))

@section('content')

    <!-- <div class="row justify-content-center align-items-center">
        <div class="col col-sm-6 align-self-center">
            <div class="card">
                <div class="card-header">
                    <strong>
                        @lang('labels.frontend.passwords.reset_password_box_title')
                    </strong>
                </div><

                <div class="card-body">

                    @if(session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ html()->form('POST', route('frontend.auth.password.reset'))->class('form-horizontal')->open() }}
                        {{ html()->hidden('token', $token) }}

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
                        </div><

                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    {{ html()->label(__('validation.attributes.frontend.password_confirmation'))->for('password_confirmation') }}

                                    {{ html()->password('password_confirmation')
                                        ->class('form-control')
                                        ->placeholder(__('validation.attributes.frontend.password_confirmation'))
                                        ->required() }}
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col">
                                <div class="form-group mb-0 clearfix">
                                    {{ form_submit(__('labels.frontend.passwords.reset_password_button')) }}
                                </div>
                            </div>
                        </div>
                    {{ html()->form()->close() }}
                </div>
            </div>
        </div>
    </div> -->

<section class="section-join">
    <div class="container">
        <div class="inner-wrapper">
            <div class="content-block">
                <img src="{{url('images/logo/karuna-logo-english.svg')}}" alt="" class="logo">
                {{ html()->form('POST', route('frontend.auth.password.reset'))->class('form-horizontal')->open() }}
                    {{ html()->hidden('token', $token) }}
                    <div class="join-form no-scroll">
                        <div class="join-form-row">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" name="email" maxlength="191" class="form-control" id="email" placeholder="Email" required>
                        </div>
                        <div class="join-form-row">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" name="password" class="form-control" id="password" placeholder="Password" required>
                        </div>
                        <div class="join-form-row">
                            <label for="password_confirmation" class="form-label">Password Confirmation</label>
                            <input type="password" name="password_confirmation" class="form-control" id="password_confirmation" placeholder="Password Confirmation" required>
                        </div>
                        <div class="join-form-row">
                            <button type="submit" class="cta-btn btn-fill pull-right">
                                <div class="btn-text">Reset Password</div>
                            </button>
                        </div>
                        <div class="join-form-row">
                            @include('includes.partials.messages')
                        </div>
                    </div>
                {{ html()->form()->close() }}
            </div>
            <div class="image-block">
                <img src="{{url('images/landing-page/join/join.png')}}" alt="">
            </div>                          
        </div>
    </div>
</section>
@endsection

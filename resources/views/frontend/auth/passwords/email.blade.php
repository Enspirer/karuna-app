@extends('frontend.layouts.app')

@section('title', app_name() . ' | ' . __('labels.frontend.passwords.reset_password_box_title'))

@section('content')
       
<section class="section-join">
    <div class="container">
        <div class="inner-wrapper">
            <div class="content-block">
                <img src="{{url('images/logo/karuna-logo-english.svg')}}" alt="" class="logo">
                {{ html()->form('POST', route('frontend.auth.password.email.post'))->open() }}
                    <div class="join-form no-scroll">
                        <div class="join-form-row">
                        {{ html()->label(__('validation.attributes.frontend.email'))->for('email') }}

                        {{ html()->email('email')
                            ->class('form-control')
                            ->placeholder(__('validation.attributes.frontend.email'))
                            ->attribute('maxlength', 191)
                            ->required()
                            ->autofocus() }}
                        </div>
                        <div class="join-form-row">
                            <button type="submit" class="cta-btn btn-fill pull-right">
                                <div class="btn-text">Send Password Reset Link</div>
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

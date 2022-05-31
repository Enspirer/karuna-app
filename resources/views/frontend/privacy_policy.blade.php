@extends('frontend.layouts.app')

@section('title', app_name() . ' | ' . __('navs.general.home'))

@section('content')

<section class="support-hero-section" style="background: url('{{url('images/landing-page/support/hero-back.png')}}');">
    <div class="container">
        <div class="inner-wrapper">
            <div class="content-block">
                <div class="title-block">
                    <div class="title">Privacy <span>Policy</span></div>
                </div>
                <div class="text">{!!get_settings('privacy_policy_content')!!}</div>
            </div>
        </div>
    </div>
</section>


@endsection

@push('after-scripts')

@endpush
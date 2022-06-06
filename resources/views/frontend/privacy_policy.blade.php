@extends('frontend.layouts.app')

@section('title', app_name() . ' | ' . __('navs.general.home'))

@section('content')

<section class="terms-section">
    <div class="container">
        <div class="title-block">
            <div class="title">Privacy Policy for <span>Karunaa</span></div>
            <img src="{{url('images/landing-page/home/brush.svg')}}" alt="">
        </div>
        <div class="text-area">{!!get_settings('privacy_policy_content')!!}</div>
    </div>
</section>


@endsection

@push('after-scripts')

@endpush
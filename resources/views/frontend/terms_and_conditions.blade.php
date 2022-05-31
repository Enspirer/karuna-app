@extends('frontend.layouts.app')

@section('title', app_name() . ' | ' . __('navs.general.home'))

@section('content')

<section class="terms-section">
    <div class="container">
        <div class="title-block">
            <div class="title">Terms and <span>Conditions</span></div>
            <img src="{{url('images/landing-page/home/brush.svg')}}" alt="">
        </div>
        <div class="text-area">{!!get_settings('terms_and_conditions_content')!!}</div>
    </div>
</section>

@endsection

@push('after-scripts')

@endpush
@extends('frontend.layouts.mobile_app')

@section('title', app_name() . ' | ' . __('navs.general.home'))

@section('content')

@include('frontend.mobile.includes.top_nav')

<section class="table-section">
    <div class="mobile-container">
        <table class="mobile-table payment-history-table">
            <tbody>
                <tr class="m-tr clickable-tr" data-href="#">
                    <td class="m-td">
                        <img src="{{url('images/landing-page/nav/profile.png')}}" alt="">
                    </td>
                    <td class="m-td">
                        <div class="name">Nadika Perera</div>
                        <div class="text">Ask to change the profile picture and Bio</div>
                    </td>
                </tr>
                <tr class="m-tr clickable-tr" data-href="#">
                    <td class="m-td">
                        <img src="{{url('images/landing-page/nav/profile.png')}}" alt="">
                    </td>
                    <td class="m-td">
                        <div class="name">Nadika Perera</div>
                        <div class="text">Ask to change the profile picture and Bio</div>
                    </td>
                </tr>
                <tr class="m-tr clickable-tr" data-href="#">
                    <td class="m-td">
                        <img src="{{url('images/landing-page/nav/profile.png')}}" alt="">
                    </td>
                    <td class="m-td">
                        <div class="name">Nadika Perera</div>
                        <div class="text">Ask to change the profile picture and Bio</div>
                    </td>
                </tr>
                <tr class="m-tr clickable-tr" data-href="#">
                    <td class="m-td">
                        <img src="{{url('images/landing-page/nav/profile.png')}}" alt="">
                    </td>
                    <td class="m-td">
                        <div class="name">Nadika Perera</div>
                        <div class="text">Ask to change the profile picture and Bio</div>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</section>

@include('frontend.mobile.includes.agent_bottom_nav')

@endsection

@push('after-scripts')

@endpush
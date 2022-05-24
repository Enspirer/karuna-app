@extends('frontend.layouts.mobile_app')

@section('title', app_name() . ' | ' . __('navs.general.home'))

@section('content')

<!-- ======== Top Nav ======== -->
<section class="app-bar-section">
    <div class="mobile-container">
        <div class="inner-wrapper">
            <a href="{{route('frontend.mobile.index')}}" class="back-btn">
                <i class="fa-solid fa-arrow-left"></i>
            </a>
            <div class="title">My Receivers</div>
        </div>
    </div>
</section>
<!-- ======== Top Nav End ======== -->

<section class="table-section">
    <div class="mobile-container">
        <table class="mobile-table payment-history-table">
            <tbody>
                <tr class="m-tr clickable-tr" data-href="{{route('frontend.mobile.receiver')}}">
                    <td class="m-td">
                        <img src="{{url('images/landing-page/nav/profile.png')}}" alt="">
                    </td>
                    <td class="m-td">
                        <div class="name">Nadika Perera</div>
                    </td>
                    <td class="m-td">
                        <div class="indicator orange"></div>
                    </td>
                </tr>
                <tr class="m-tr clickable-tr" data-href="#">
                    <td class="m-td">
                        <img src="{{url('images/landing-page/nav/profile.png')}}" alt="">
                    </td>
                    <td class="m-td">
                        <div class="name">Nadika Perera</div>
                    </td>
                    <td class="m-td">
                        <div class="indicator green"></div>
                    </td>
                </tr>
                <tr class="m-tr clickable-tr" data-href="#">
                    <td class="m-td">
                        <img src="{{url('images/landing-page/nav/profile.png')}}" alt="">
                    </td>
                    <td class="m-td">
                        <div class="name">Nadika Perera</div>
                    </td>
                    <td class="m-td">
                        <div class="indicator red"></div>
                    </td>
                </tr>
                <tr class="m-tr clickable-tr" data-href="#">
                    <td class="m-td">
                        <img src="{{url('images/landing-page/nav/profile.png')}}" alt="">
                    </td>
                    <td class="m-td">
                        <div class="name">Nadika Perera</div>
                    </td>
                    <td class="m-td">
                        <div class="indicator black"></div>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</section>

@endsection

@push('after-scripts')

@endpush
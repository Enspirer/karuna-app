@extends('frontend.layouts.mobile_app')

@section('title', app_name() . ' | ' . __('navs.general.home'))

@section('content')

@include('frontend.mobile.includes.top_nav')

<section class="table-section">
    <div class="mobile-container">
        <table class="mobile-table payment-history-table">
            <tbody>
                <tr class="m-tr">
                    <td class="m-td">
                        <i class="bi orange bi-arrow-down-up"></i>
                    </td>
                    <td class="m-td">
                        <img src="{{url('images/landing-page/nav/profile.png')}}" alt="">
                    </td>
                    <td class="m-td">
                        <div class="name">Nadika Perera</div>
                        <div class="text">25/05</div>
                    </td>
                    <td class="m-td">
                        <div class="text">Rs. 5000.00</div>
                    </td>
                </tr>
                <tr class="m-tr">
                    <td class="m-td">
                        <i class="bi orange bi-arrow-down-up"></i>
                    </td>
                    <td class="m-td">
                        <img src="{{url('images/landing-page/nav/profile.png')}}" alt="">
                    </td>
                    <td class="m-td">
                        <div class="name">Nadika Perera</div>
                        <div class="text">25/05</div>
                    </td>
                    <td class="m-td">
                        <div class="text">Rs. 5000.00</div>
                    </td>
                </tr>
                <tr class="m-tr">
                    <td class="m-td">
                        <i class="bi orange bi-arrow-down-up"></i>
                    </td>
                    <td class="m-td">
                        <img src="{{url('images/landing-page/nav/profile.png')}}" alt="">
                    </td>
                    <td class="m-td">
                        <div class="name">Nadika Perera</div>
                        <div class="text">25/05</div>
                    </td>
                    <td class="m-td">
                        <div class="text">Rs. 5000.00</div>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</section>

@include('frontend.mobile.includes.bottom_nav')

@endsection

@push('after-scripts')

@endpush
@extends('frontend.layouts.dashboard_app')

@section('title', app_name() . ' | ' . __('navs.general.home'))

@section('content')

<div class="table-container">
    <table class="db-table paymetn-history-table">
        <thead>
            <tr class="db-tr">
                <th class="db-th"></th>
                <th class="db-th"></th>
                <th class="db-th">Donor</th>
                <th class="db-th">Date</th>
                <th class="db-th">To Whom</th>
                <th class="db-th">Requirement</th>
                <th class="db-th">Amount</th>
                <th class="db-th"></th>
            </tr>
        </thead>
        <tbody>
            <tr class="db-tr">
                <td class="db-td">
                    <i class="bi bi-arrow-down-up"></i>
                </td>
                <td class="db-td">
                    <img src="{{url('images/landing-page/nav/profile.png')}}" alt="" class="db-timg">
                </td>
                <td class="db-td">
                    <div class="text">Kamani Jayathilaka</div>
                </td>
                <td class="db-td">25/05/2022</td>
                <td class="db-td">Inoka Perera</td>
                <td class="db-td">Health Food</td>
                <td class="db-td">Rs. 5000.00</td>
                <td class="db-td">
                    <a href="#" class="db-tbtn btn-outline">
                        <div class="btn-text">View Donation</div>
                    </a>
                </td>
            </tr>
            <tr class="db-tr">
                <td class="db-td">
                    <i class="bi bi-arrow-down-up"></i>
                </td>
                <td class="db-td">
                    <img src="{{url('images/landing-page/nav/profile.png')}}" alt="" class="db-timg">
                </td>
                <td class="db-td">
                    <div class="text">Kamani Jayathilaka</div>
                </td>
                <td class="db-td">25/05/2022</td>
                <td class="db-td">Inoka Perera</td>
                <td class="db-td">Health Food</td>
                <td class="db-td">Rs. 5000.00</td>
                <td class="db-td">
                    <a href="#" class="db-tbtn btn-outline">
                        <div class="btn-text">View Donation</div>
                    </a>
                </td>
            </tr>
            <tr class="db-tr">
                <td class="db-td">
                    <i class="bi bi-arrow-down-up"></i>
                </td>
                <td class="db-td">
                    <img src="{{url('images/landing-page/nav/profile.png')}}" alt="" class="db-timg">
                </td>
                <td class="db-td">
                    <div class="text">Kamani Jayathilaka</div>
                </td>
                <td class="db-td">25/05/2022</td>
                <td class="db-td">Inoka Perera</td>
                <td class="db-td">Health Food</td>
                <td class="db-td">Rs. 5000.00</td>
                <td class="db-td">
                    <a href="#" class="db-tbtn btn-outline">
                        <div class="btn-text">View Donation</div>
                    </a>
                </td>
            </tr>
        </tbody>
    </table>
</div>

@endsection

@push('after-scripts')

@endpush
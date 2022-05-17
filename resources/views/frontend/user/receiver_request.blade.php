@extends('frontend.layouts.dashboard_app')

@section('title', app_name() . ' | ' . __('navs.general.home'))

@section('content')

<div class="table-container">
    <table class="db-table receiver-table">
        <thead>
            <tr class="db-tr">
                <th class="db-th"></th>
                <th class="db-th">Name</th>
                <th class="db-th">Request</th>
                <th class="db-th"></th>
                <th class="db-th"></th>
            </tr>
        </thead>
        <tbody>
            <tr class="db-tr">
                <td class="db-td">
                    <img src="{{url('images/landing-page/nav/profile.png')}}" alt="" class="db-timg">
                </td>
                <td class="db-td">
                    <div class="text">Kamani Jayathilaka</div>
                </td>
                <td class="db-td">
                    <div class="text">Ask to change the profile picture and Bio</div>
                </td>
                <td class="db-td">
                    <a href="#" class="db-tlink">View Changes</a>
                </td>
                <td class="db-td">
                    <select class="form-select">
                        <option selected disabled>Choose...</option>
                        <option>Approve</option>
                        <option>Cancel</option>
                    </select>
                </td>
            </tr>
            <tr class="db-tr">
                <td class="db-td">
                    <img src="{{url('images/landing-page/nav/profile.png')}}" alt="" class="db-timg">
                </td>
                <td class="db-td">
                    <div class="text">Kamani Jayathilaka</div>
                </td>
                <td class="db-td">
                    <div class="text">Ask to change the profile picture and Bio</div>
                </td>
                <td class="db-td">
                    <a href="#" class="db-tlink">View Changes</a>
                </td>
                <td class="db-td">
                    <select class="form-select">
                        <option selected disabled>Choose...</option>
                        <option>Approve</option>
                        <option>Cancel</option>
                    </select>
                </td>
            </tr>
            <tr class="db-tr">
                <td class="db-td">
                    <img src="{{url('images/landing-page/nav/profile.png')}}" alt="" class="db-timg">
                </td>
                <td class="db-td">
                    <div class="text">Kamani Jayathilaka</div>
                </td>
                <td class="db-td">
                    <div class="text">Ask to change the profile picture and Bio</div>
                </td>
                <td class="db-td">
                    <a href="#" class="db-tlink">View Changes</a>
                </td>
                <td class="db-td">
                    <select class="form-select">
                        <option selected disabled>Choose...</option>
                        <option>Approve</option>
                        <option>Cancel</option>
                    </select>
                </td>
            </tr>
            <tr class="db-tr">
                <td class="db-td">
                    <img src="{{url('images/landing-page/nav/profile.png')}}" alt="" class="db-timg">
                </td>
                <td class="db-td">
                    <div class="text">Kamani Jayathilaka</div>
                </td>
                <td class="db-td">
                    <div class="text">Ask to change the profile picture and Bio</div>
                </td>
                <td class="db-td">
                    <a href="#" class="db-tlink">View Changes</a>
                </td>
                <td class="db-td">
                    <select class="form-select">
                        <option selected disabled>Choose...</option>
                        <option>Approve</option>
                        <option>Cancel</option>
                    </select>
                </td>
            </tr>
            <tr class="db-tr">
                <td class="db-td">
                    <img src="{{url('images/landing-page/nav/profile.png')}}" alt="" class="db-timg">
                </td>
                <td class="db-td">
                    <div class="text">Kamani Jayathilaka</div>
                </td>
                <td class="db-td">
                    <div class="text">Ask to change the profile picture and Bio</div>
                </td>
                <td class="db-td">
                    <a href="#" class="db-tlink">View Changes</a>
                </td>
                <td class="db-td">
                    <select class="form-select">
                        <option selected disabled>Choose...</option>
                        <option>Approve</option>
                        <option>Cancel</option>
                    </select>
                </td>
            </tr>
        </tbody>
    </table>
</div>

@endsection

@push('after-scripts')

@endpush
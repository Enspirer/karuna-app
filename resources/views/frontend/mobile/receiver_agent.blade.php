@extends('frontend.layouts.mobile_app')

@section('title', app_name() . ' | ' . __('navs.general.home'))

@section('content')

<!-- ======== Top Nav ======== -->
<section class="app-bar-section">
    <div class="mobile-container">
        <div class="inner-wrapper">
            <!-- <a href="{{route('frontend.user.mobile.index')}}" class="back-btn"> -->
            <a href="#" onclick="history.back()" class="back-btn">
                <i class="fa-solid fa-arrow-left"></i>
            </a>
            @if($receiver->name_toggle == 'yes')
                <div class="title">{{$receiver->nick_name}}'s profile</div>
            @else
                <div class="title">{{$receiver->name}}'s profile</div>
            @endif
        </div>
    </div>
</section>
<!-- ======== Top Nav End ======== -->

<section class="profile-section">
    <div class="mobile-container">
        <div class="inner-wrapper">
            <div class="header" style="background-image: url('{{uploaded_asset($receiver->cover_image)}}');">

                <div class="dp-block">
                    <img src="{{ uploaded_asset($receiver->profile_image) }}" alt="">
                </div>
            </div>
            @if($receiver->name_toggle == 'yes')
                <div class="name">{{$receiver->nick_name}}</div>
            @else
                <div class="name">{{$receiver->name}}</div>
            @endif
            <div class="status yellow">Receiver</div>
            <a href="{{route('frontend.user.mobile.receiver_edit_agent',$receiver->id)}}" class="btn-edit">
                <i class="bi bi-pencil-fill"></i>
                Edit
            </a>
            <div class="info-table-wrapper">
                <table class="info-table">
                    <tbody>
                        <tr>
                            <td>Nick Name</td>
                            <td>{{$receiver->nick_name}}</td>
                        </tr>
                        <tr>
                            <td>Age</td>
                            <td>{{$receiver->age}}</td>
                        </tr>
                        <tr>
                            <td>Gender</td>
                            <td>{{$receiver->gender}}</td>
                        </tr>
                        <tr>
                            <td>Address</td>
                            <td>{{$receiver->address}}</td>
                        </tr>
                        <tr>
                            <td>Phone Number</td>
                            <td>{{$receiver->phone_number}}</td>
                        </tr>
                        @if($receiver->requirement == 'Other')
                            <tr>
                                <td>Account Number</td>
                                <td>{{json_decode($receiver->account_details)->account_number}}</td>
                            </tr>
                        @endif
                        <tr>
                            <td>City</td>
                            <td>{{$receiver->city}}</td>
                        </tr>
                        <tr>
                            <td>NIC</td>
                            <td>{{$receiver->nic_number}}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="gallery">
                @if($receiver->images != null)
                    @php
                        $req_images = preg_split ("/\,/", $receiver->images);
                    @endphp
                    <div class="row">
                        @foreach($req_images as $key=> $req_image)
                            <div class="col-4">
                                <img src="{{uploaded_asset($req_image)}}" class="mb-3" style="height:80px; object-fit:cover" width="100%" alt="">
                            </div>
                        @endforeach
                    </div>
                @endif
            </div>
        </div>
    </div>
</section>

@endsection

@push('after-scripts')

@endpush
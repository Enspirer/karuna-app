@extends('frontend.layouts.mobile_app')

@section('title', app_name() . ' | ' . __('navs.general.home'))

@section('content')

@include('frontend.mobile.includes.top_nav')

<section class="donation-info-section">
    <div class="mobile-container">
        <div class="inner-wrapper">
            <div class="profile-block">
                <div class="title">Agent Profile</div>
                <div class="profile-info">
                    <img src="{{url('images/landing-page/nav/profile.png')}}" alt="" class="dp">
                    <ul>
                        <li>
                            <span class="th">Name :</span>
                            <span class="td">{{$agent->first_name}} {{$agent->lasst_name}}</span>
                        </li>
                        <li>
                            <span class="th">Area :</span>
                            <span class="td">{{$agent->city}} {{$agent->country}}</span>
                        </li>
                        <li>
                            <span class="th">NIC :</span>
                            <span class="td">{{$agent->nic_number}}</span>
                        </li>
                    </ul>
                </div>
                <a class="cta-link" href="{{route('frontend.mobile.view_profile',$agent->id)}}">View  History of this Agent</a>
            </div>

            
            <div class="profile-block">
                <div class="title">Receiver's Profile</div>
                <div class="profile-info">
                    <img src="{{url('images/landing-page/nav/profile.png')}}" alt="" class="dp">
                    <ul>
                        <li>
                            <span class="th">Name :</span>
                            <span class="td">{{$receiver->name}}</span>
                        </li>
                        <li>
                            <span class="th">Area :</span>
                            <span class="td">{{$receiver->city}} {{$receiver->country}}</span>
                        </li>
                        <li>
                            <span class="th">NIC :</span>
                            <span class="td">{{$receiver->nic_number}}</span>
                        </li>
                    </ul>
                </div>
                <a class="cta-link" href="{{route('frontend.mobile.view_profile_receiver',$receiver->id)}}">View  History of this Receiver</a>
                @if($receiver->requirement == 'Other')
                    <div class="cat-icon blue">O</div>
                @else
                    @if(App\Models\Packages::where('id',$receiver->requirement)->first() != null)
                    <p><img src="{{uploaded_asset(App\Models\Packages::where('id',$receiver->requirement)->first()->image)}}" width="35px" style="border-radius: 50%; height: 35px;" class="ml-4 mt-3 mb-3" alt="">
                        {{App\Models\Packages::where('id',$receiver->requirement)->first()->name}}</p>
                    @endif
                @endif
                <a href="{{route('frontend.mobile.payment',$receiver->id)}}" class="cta-btn btn-fill">
                    <div class="btn-text">Donate Now</div>
                </a>
            </div>
        </div>
    </div>
</section>

@include('frontend.mobile.includes.bottom_nav')

@endsection

@push('after-scripts')

@endpush
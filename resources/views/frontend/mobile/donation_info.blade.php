@extends('frontend.layouts.mobile_app')

@section('title', app_name() . ' | ' . 'Donation Info')

@section('content')

@include('frontend.mobile.includes.top_nav')

<section class="donation-info-section">
    <div class="mobile-container">
        <div class="inner-wrapper">

            <div class="profile-block">
                <div class="title" style="font-size: 1.5rem;">Receiver's Profile</div>
                <div class="profile-info">
                    @if($receiver->profile_image)
                        <img src="{{uploaded_asset($receiver->profile_image)}}" alt="" class="dp">
                    @else
                        <img src="{{url('images/landing-page/nav/profile.png')}}" alt="" class="dp">
                    @endif
                    <ul>
                        <li>
                            <span class="th">Name :</span>
                            @if($receiver->name_toggle == 'yes')
                                <span class="td">{{$receiver->nick_name}}</span>
                            @else
                                <span class="td">{{$receiver->name}}</span>
                            @endif
                        </li>
                        <li>
                            <span class="th">Area :</span>
                            <span class="td">{{$receiver->city}} {{$receiver->country}}</span>
                        </li>
                        <li>
                            <span class="th">Occupation :</span>
                            <span class="td">{{$receiver->occupation}}</span>
                        </li>
                        
                    </ul>
                </div>
                <a class="cta-link" href="{{route('frontend.user.mobile.view_profile_receiver',$receiver->id)}}">View  History of this Receiver</a>
                @if($receiver->requirement == 'Other')
                    <div class="cat-icon blue">O</div>
                @else
                    @if(App\Models\Packages::where('id',$receiver->requirement)->first() != null)
                    <p><img src="{{uploaded_asset(App\Models\Packages::where('id',$receiver->requirement)->first()->image)}}" width="35px" style="border-radius: 50%; height: 35px;" class="ml-4 mt-3 mb-3" alt="">
                        {{App\Models\Packages::where('id',$receiver->requirement)->first()->name}}</p>
                    @endif
                @endif

                            
            </div>

            <div class="profile-block">
                @if($agent != null)
                    <div class="title">Volunteer Profile</div>
                    <div class="profile-info">
                        <img src="{{url('images/landing-page/nav/profile.png')}}" alt="" class="dp">
                        <ul>
                            <li>
                                <span class="th">Name :</span>
                                <span class="td">{{$agent->first_name}} {{$agent->lasst_name}}</span>
                            </li>
                            <li>
                                <span class="th">Area :</span>
                                <span class="td">{{get_city_details($agent->id,'city')}} {{get_city_details($agent->id,'country')}}</span>
                            </li>
                            <li>
                                <span class="th">Occupation :</span>
                                <span class="td">{{$agent->occupation}}</span>
                            </li>
                        </ul>
                    </div>
                    <a class="cta-link" href="{{route('frontend.user.mobile.view_profile',$agent->id)}}">View  History of this Volunteer</a>
                @else
                    <div class="title">Deleted Account</div>
                @endif

                @if($receiver->requirement != 'Other')
                    <a href="{{route('frontend.user.mobile.payment',$receiver->id)}}" class="mt-5 cta-btn btn-fill">
                        <div class="btn-text">Donate Now</div>
                    </a>
                @else
                    <a href="{{route('frontend.user.mobile.payment_other',$receiver->id)}}" class="mt-5 cta-btn btn-fill">
                        <div class="btn-text">Donate Now</div>
                    </a>
                @endif  
                
            </div>
           
            
        </div>
    </div>
</section>

@include('frontend.mobile.includes.bottom_nav')

@endsection

@push('after-scripts')

@endpush
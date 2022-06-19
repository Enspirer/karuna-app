@extends('frontend.layouts.mobile_app')

@section('title', app_name() . ' | ' . __('navs.general.home'))

@section('content')

<!-- ======== Top Nav ======== -->
<section class="app-bar-section">
    <div class="mobile-container">
        <div class="inner-wrapper">
            <!-- <a href="{{route('frontend.user.mobile.index')}}" class="back-btn"> -->
            <a href="{{route('frontend.user.mobile.index')}}" class="back-btn">
                <i class="fa-solid fa-arrow-left"></i>
            </a>
            <div class="title">{{$agent->first_name}}'s Profile</div>
        </div>
    </div>
</section>
<!-- ======== Top Nav End ======== -->

<section class="profile-section">
    <div class="mobile-container">
        <div class="inner-wrapper">
            <div class="dp-block">
                @if($agent->profile_image == null)
                    <img src="{{url('images/landing-page/nav/profile.png')}}" alt="" class="dp">
                @else
                    <img src="{{ uploaded_asset($agent->profile_image) }}" alt="" class="dp">
                @endif
            </div>
            <div class="name">{{$agent->first_name}} {{$agent->last_name}}</div>
            @if($agent->level != null)
                <div class="star-rating">
                    @if($agent->level == 'Level 1')
                        <div style="background: rgb(255, 186, 12); padding:5px 20px 5px 20px; width:fit-content; margin: 10px auto 0; border-radius: 40px;">Level 1</div>
                    @elseif($agent->level == 'Level 2')
                        <div style="background: rgb(255, 186, 12); padding:5px 20px 5px 20px; width:fit-content; margin: 10px auto 0; border-radius: 40px;">Level 2</div>
                    @elseif($agent->level == 'Level 3')
                        <div style="background: rgb(255, 186, 12); padding:5px 20px 5px 20px; width:fit-content; margin: 10px auto 0; border-radius: 40px;">Level 2</div>
                    @elseif($agent->level == 'Level 4')
                        <div style="background: rgb(255, 186, 12); padding:5px 20px 5px 20px; width:fit-content; margin: 10px auto 0; border-radius: 40px;">Level 4</div>
                    @endif
                </div>
            @endif
            <div class="status maroon">Volunteer</div>
            <div class="profile-info">{{$agent->about_donation}}</div>
            <div class="info-table-wrapper">
                <table class="info-table">
                    <tbody>
                        <tr>
                            <td>Name</td>
                            <td>{{$agent->first_name}} {{$agent->last_name}}</td>
                        </tr>
                        <tr>
                            <td>Age</td>
                            <td>
                                <a href="mailto:{{$agent->email}}"> {{$agent->email}}</a>
                            </td>
                        </tr>
                        <tr>
                            <td>Address</td>
                            <td>{{$agent->address}}td>
                        </tr>
                        <tr>
                            <td>City</td>
                            <td>{{get_city_details($agent->id,'city')}}</td>
                        </tr>
                        <tr>
                            <td>NIC Number</td>
                            <td>{{$agent->email}}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="gallery">
                <!-- <a href="#"><img src="{{url('images/dashboard/placeholder.png')}}" alt=""></a>
                <a href="#"><img src="{{url('images/dashboard/placeholder.png')}}" alt=""></a>
                <a href="#"><img src="{{url('images/dashboard/placeholder.png')}}" alt=""></a>
                <a href="#"><img src="{{url('images/dashboard/placeholder.png')}}" alt=""></a>
                <a href="#"><img src="{{url('images/dashboard/placeholder.png')}}" alt=""></a>
                <a href="#"><img src="{{url('images/dashboard/placeholder.png')}}" alt=""></a> -->
            </div>
            <div class="charity-block">
                @if(count(App\Models\Receivers::where('assigned_agent',$agent->id)->get()) == 0)                  
                    <img src="{{url('images/not-found.png')}}" alt="">
                    <div class="text" style="margin-left: 100px;">No data found</div>
                @else
                    <div class="title">Donate List</div>
                        <div class="accordion" id="charityList">
                            @foreach(App\Models\Receivers::where('assigned_agent',$agent->id)->orderby('id','desc')->get() as $key => $receiver)
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="charHead{{$receiver->id}}">
                                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#char{{$receiver->id}}"
                                            aria-expanded="true" aria-controls="char1">
                                            <div class="header-block">
                                                <div class="no">{{$key + 1}}</div>
                                                <div class="text">
                                                    @if($receiver->requirement != 'Other')
                                                        @if(App\Models\Packages::where('id',$receiver->requirement)->first() != null)
                                                            <div class="icon purple">{{App\Models\Packages::where('id',$receiver->requirement)->first()->name }}</div>                                     
                                                        @else
                                                            <div class="name">Package not found</div>
                                                        @endif
                                                    @else
                                                        <div class="icon purple">Other Requirements</div>
                                                    @endif
                                                </div>
                                            </div>
                                        </button>
                                    </h2>
                                    <div id="char{{$receiver->id}}" class="accordion-collapse collapse" aria-labelledby="charHead{{$receiver->id}}"
                                        data-bs-parent="#charityList">
                                        <div class="accordion-body">
                                            <div>
                                                Receiver Name: <a href="{{route('frontend.user.mobile.view_profile_receiver',$receiver->id)}}"> {{$receiver->name}}</a>
                                            </div>
                                            <div class="title">Description</div>
                                            <div class="text">{{$receiver->about_donation}}</div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach 
                        </div>
                    </div>
                @endif

            </div>
            <a href="#" class="cta-btn btn-fill">
                <div class="btn-text">Contact Now</div>
            </a>
        </div>
    </div>
</section>

@endsection

@push('after-scripts')

@endpush
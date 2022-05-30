@extends('frontend.layouts.mobile_app')

@section('title', app_name() . ' | ' . __('navs.general.home'))

@section('content')

<!-- ======== Top Nav ======== -->
<section class="app-bar-section">
    <div class="mobile-container">
        <div class="inner-wrapper">
            <a href="{{route('frontend.user.mobile.index')}}" class="back-btn">
                <i class="fa-solid fa-arrow-left"></i>
            </a>
            <div class="title">Kamani's Profile</div>
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
            <div class="star-rating">
                @if($agent->level == 'Level 1')
                    <i class="bi bi-star-fill"></i>
                    <i class="bi bi-star"></i>
                    <i class="bi bi-star"></i>
                    <i class="bi bi-star"></i>
                @elseif($agent->level == 'Level 2')
                    <i class="bi bi-star-fill"></i>
                    <i class="bi bi-star-fill"></i>
                    <i class="bi bi-star"></i>
                    <i class="bi bi-star"></i>
                @elseif($agent->level == 'Level 3')
                    <i class="bi bi-star-fill"></i>
                    <i class="bi bi-star-fill"></i>
                    <i class="bi bi-star-fill"></i>
                    <i class="bi bi-star"></i>
                @elseif($agent->level == 'Level 4')
                    <i class="bi bi-star-fill"></i>
                    <i class="bi bi-star-fill"></i>
                    <i class="bi bi-star-fill"></i>
                    <i class="bi bi-star-fill"></i>
                @endif
            </div>
            <div class="status maroon">Agent</div>
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
                            <td>{{$agent->email}}</td>
                        </tr>
                        <tr>
                            <td>Address</td>
                            <td>{{$agent->address}}td>
                        </tr>
                        <tr>
                            <td>Phone Number</td>
                            <td>{{$agent->contact_number}}</td>
                        </tr>
                        <tr>
                            <td>City</td>
                            <td>{{$agent->city}}</td>
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
                    <div class="text" style="margin-left: 100px;">No data foud</div>
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
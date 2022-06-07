@extends('frontend.layouts.app')

@section('title', app_name() . ' | ' . __('navs.general.home'))

@section('content')

<section class="profile-section">
    <div class="container">
        <div class="inner-wrapper">
            <div class="info-block">
                <div class="header">
                    @if($agent->profile_image == null)
                        <img src="{{url('images/landing-page/nav/profile.png')}}" alt="" class="dp">
                    @else
                        <img src="{{ uploaded_asset($agent->profile_image) }}" alt="" class="dp">
                    @endif
                    <div class="title">{{$agent->first_name}} {{$agent->last_name}}</div>
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
                    <div class="status agent">Agent</div>
                    <div class="text">{{$agent->bio}}</div>
                </div>
                <div class="info">
                    <div class="row g-0">
                        <div class="col-sm-6">
                            <div class="label">Name</div>
                            <div class="text">{{$agent->first_name}} {{$agent->last_name}}</div>
                        </div>
                        <div class="col-sm-6">
                            <div class="label">Email</div>
                            <div class="text">{{$agent->email}}</div>
                        </div>
                        <div class="col-sm-6">
                            <div class="label">Address</div>
                            <div class="text">{{$agent->address}}</div>
                        </div>
                        <div class="col-sm-6">
                            <div class="label">City</div>
                            <div class="text">{{$agent->city}}</div>
                        </div>
                        <div class="col-sm-6">
                            <div class="label">Phone Number</div>
                            <div class="text">{{$agent->contact_number}}</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content-block">
                @if(count(App\Models\Receivers::where('assigned_agent',$agent->id)->get()) == 0)                  
                    <img src="{{url('images/not-found.png')}}" alt="">
                    <div class="text" style="margin-left: 100px;">No data foud</div>
                @else
                    <div class="header">
                        <div class="title">Charity Works</div>
                        <a href="{{'/'}}" class="cta-link">Back</a>
                    </div>
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
                                            Name: <a href="{{url('')}}">{{$receiver->name}}</a> <br>
                                        </div> <br>
                                        <div class="title">Description</div>
                                        <div class="text">{{$receiver->about_donation}}</div>
                                    </div>
                                </div>
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
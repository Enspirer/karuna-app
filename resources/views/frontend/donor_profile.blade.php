@extends('frontend.layouts.app')

@section('title', app_name() . ' | ' . __('navs.general.home'))

@section('content')

@if($donor)
    <section class="profile-section">
        <div class="container">
            <div class="inner-wrapper">
                <div class="info-block">
                    <div class="header">
                        @if($donor->profile_picture != null)
                            <img src="{{uploaded_asset($donor->profile_picture)}}" alt="" class="dp">
                        @else
                            <img src="{{url('images/landing-page/nav/profile.png')}}" alt="" class="dp">
                        @endif
                        <div class="title">{{$donor->first_name}} {{$donor->last_name}}</div>
                        <!-- <div class="star-rating">
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-half"></i>
                            <i class="bi bi-star"></i>
                        </div> -->
                        <div class="status donor">Donor</div>
                        <div class="text">{{$donor->bio}}</div>
                    </div>
                    <div class="info">
                        <div class="row g-0">
                            <div class="col-sm-12">
                                <div class="label">Email</div>
                                <div class="text">{{$donor->email}}</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="content-block">
                    <div class="header">
                        <div class="title">Charity Works</div>
                        <a href="{{'/'}}" class="cta-link">Back</a>
                    </div>
                    <div class="accordion" id="charityList">

                        @if(count(App\Models\Receivers::where('donor_id',$donor->id)->get()) != 0)
                            @foreach(App\Models\Receivers::where('donor_id',$donor->id)->orderby('id','desc')->get() as $key => $donor)
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="charHead1">
                                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#char{{$donor->id}}"
                                                aria-expanded="true" aria-controls="char1">
                                            <div class="header-block">
                                                <div class="no">{{$key+1}}</div>
                                                @if($donor->status == 'Agent Not Responded')
                                                    <div class="text">Pending</div>
                                                    <div class="indicator orange"></div>
                                                @elseif($donor->status == 'Approved')
                                                    <div class="text">Pending</div>
                                                    <div class="indicator orange"></div>
                                                @elseif($donor->status == 'Task Success')
                                                    <div class="text">Task Success</div>
                                                    <div class="indicator green"></div>
                                                @elseif($donor->status == 'Payment Transferred to Agent')
                                                    <div class="text">Payment Transferred</div>
                                                    <div class="indicator orange"></div>
                                                @endif
                                            </div>
                                        </button>
                                    </h2>
                                    <div id="char{{$donor->id}}" class="accordion-collapse collapse" aria-labelledby="charHead1"
                                         data-bs-parent="#charityList">
                                        <div class="accordion-body">
                                            <div class="title">Receiver Name: <a href="{{url('profile/receiver',$donor->id)}}">{{$donor->name}}</a> </div>
                                            <div class="text">{{$donor->thankyou_message}}</div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @endif


                    </div>
                </div>
            </div>
        </div>
    </section>
@else
    <section>
        <div style="padding-top: 200px;padding-bottom: 100px;">
            <h3 style="text-align: center">Your Volunteer Profile is Not Available </h3>
        </div>
    </section>
@endif

@endsection

@push('after-scripts')

@endpush
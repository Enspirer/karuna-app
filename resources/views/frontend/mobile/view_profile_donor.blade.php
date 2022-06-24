@extends('frontend.layouts.mobile_app')

@section('title', app_name() . ' | ' . 'Donor Profile')

@section('content')

<!-- ======== Top Nav ======== -->
<section class="app-bar-section">
    <div class="mobile-container">
        <div class="inner-wrapper">
            <!-- <a href="{{route('frontend.user.mobile.index')}}" class="back-btn"> -->
            <a href="{{route('frontend.user.mobile.index')}}" class="back-btn">
                <i class="fa-solid fa-arrow-left"></i>
            </a>
            <div class="title">{{auth()->user()->first_name}}'s Profile</div>
        </div>
    </div>
</section>
<!-- ======== Top Nav End ======== -->

<section class="profile-section">
    <div class="mobile-container">
        <div class="inner-wrapper">

            @if(App\Models\Auth\User::where('id',auth()->user()->id)->first()->profile_picture != null)
                <div class="dp-block">
                    <img src="{{uploaded_asset(auth()->user()->profile_picture)}}" alt="">
                </div>
            @else
                <div class="dp-block">
                    <img src="{{url('images/landing-page/nav/profile.png')}}" alt="">
                </div>
            @endif

            <div class="name">{{auth()->user()->first_name}} {{auth()->user()->last_name}}</div>
            <!-- <div class="star-rating">
                <i class="bi bi-star-fill"></i>
                <i class="bi bi-star-fill"></i>
                <i class="bi bi-star-fill"></i>
                <i class="bi bi-star-half"></i>
                <i class="bi bi-star"></i>
            </div> -->
            <div class="status green">Donor</div>
            <!-- <div class="profile-info">Lorem ipsum dolor sit amet consectetur adipisicing elit. Provident optio atque quibusdam, excepturi laboriosam mollitia quos sequi nobis quidem ex!</div> -->
            <div class="info-table-wrapper">
                <table class="info-table">
                    <tbody>
                        <tr>
                            <td>Name</td>
                            <td>{{auth()->user()->first_name}} {{auth()->user()->last_name}}</td>
                        </tr>
                        <tr>
                            <td>Email</td>
                            <td>{{auth()->user()->email}}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="gallery">
                @if(App\Models\Receivers::where('donor_id',auth()->user()->id)->first() != null)
                    @if(App\Models\Receivers::where('donor_id',auth()->user()->id)->latest()->first()->images != null)
                        @php
                            $req_images = preg_split ("/\,/", App\Models\Receivers::where('donor_id',auth()->user()->id)->latest()->first()->images);
                        @endphp
                            @foreach($req_images as $key=> $req_image)
                                    <img src="{{uploaded_asset($req_image)}}" ach-img-view="true">
                            @endforeach
                    @endif
                @endif
            </div>
            <div class="charity-block">
                <div class="title">Donate List</div>
                <div class="accordion" id="charityList">
                    @if(count(App\Models\Receivers::where('donor_id',auth()->user()->id)->get()) != 0)
                        @foreach(App\Models\Receivers::where('donor_id',auth()->user()->id)->orderby('id','desc')->get() as $key => $donor)
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
                                <div id="char{{$donor->id}}" class="accordion-collapse collapse show" aria-labelledby="charHead1"
                                    data-bs-parent="#charityList">
                                    <div class="accordion-body">
                                        <div class="title">Description</div>
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

@endsection

@push('after-scripts')

@endpush
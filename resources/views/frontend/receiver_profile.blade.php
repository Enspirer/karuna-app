@extends('frontend.layouts.app')

@section('title', app_name() . ' | ' . __('navs.general.home'))

@section('content')

<section class="profile-section">
    <div class="container">
        <div class="inner-wrapper">
            <div class="info-block">
                <div class="receiver-header">
                    <div class="image-block">

                        @if($receiver->cover_image == null)
                            <img src="{{url('images/landing-page/nav/profile.png')}}" alt="" class="cover">
                        @else
                            <img src="{{ uploaded_asset($receiver->cover_image) }}" alt="" class="cover">
                        @endif
                        @if($receiver->profile_image == null)
                            <img src="{{url('images/landing-page/nav/profile.png')}}" alt="" class="dp">
                        @else
                            <img src="{{ uploaded_asset($receiver->profile_image) }}" alt="" class="dp">
                        @endif

                    </div>
                    @if($receiver->name_toggle != 'yes')
                        <div class="title">{{$receiver->name}}</div>
                    @else
                        <div class="title">{{$receiver->nick_name}}</div>
                    @endif
                    <div class="status">Receiver</div>
                    <div class="title">{{$receiver->about_donation}}</div>
                    <a href="{{route('frontend.payment',$receiver->id)}}" class="cta-btn btn-fill">
                        <div class="btn-text">Donate Now</div>
                    </a>
                </div>
            </div>
            <div class="content-block">
                <div class="header">
                    <div class="title">Receiver Information</div>
                    <a href="{{route('frontend.agent_profile',$receiver->assigned_agent)}}" class="cta-link">Go Agent Details</a>
                </div>
                <div class="info">
                    <div class="row g-0">
                        <div class="col-sm-6">
                            <div class="label">Nick Name</div>
                            <div class="text">{{$receiver->nick_name}}</div>
                        </div>
                        <div class="col-sm-6">
                            <div class="label">Age</div>
                            <div class="text">{{$receiver->age}}</div>
                        </div>
                        <div class="col-sm-6">
                            <div class="label">Address</div>
                            <div class="text">{{$receiver->address}}</div>
                        </div>
                        <div class="col-sm-6">
                            <div class="label">City</div>
                            <div class="text">{{$receiver->city}}</div>
                        </div>
                        <div class="col-sm-6">
                            <div class="label">Phone Number</div>
                            <div class="text">{{$receiver->phone_number}}</div>
                        </div>
                    </div>
                </div>
                <div class="splide profile-slider" id="profileSlider">
                    <div class="splide__track">
                        <ul class="splide__list">
                            @if($receiver->images != null)
                                @php
                                    $req_images = preg_split ("/\,/", $receiver->images);
                                @endphp
                                <div class="row">
                                    @foreach($req_images as $key=> $req_image)
                                        <div class="col-4">
                                            <img src="{{uploaded_asset($req_image)}}" class="mb-3" style="height:100px; object-fit:cover" width="100%" alt="">
                                        </div>
                                    @endforeach
                                </div>
                            @endif
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection

@push('after-scripts')

<script>
    // Hero Slider
    var profileSlider = new Splide('#profileSlider', {
        arrows: false,
        pagination: false,
        perPage: 3,
        rewind : true,
        perMove: 1,
        autoWidth: true,
    });

    profileSlider.mount();
</script>

@endpush
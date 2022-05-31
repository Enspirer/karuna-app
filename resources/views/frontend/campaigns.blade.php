@extends('frontend.layouts.app')

@section('title', app_name() . ' | ' . __('navs.general.home'))

@section('content')

<section class="campaign-section py-5">
    <div class="container">
        <div class="title-block">
            <div class="title">Bring <span>JOY</span> to those around you</div>
            <img src="{{url('images/landing-page/home/brush.svg')}}" alt="">
        </div>
        <div class="campaign-block">
            <!-- <div class="campaign-card">
                <div class="header">
                    <img src="{{url('images/landing-page/support/campaign.png')}}" alt="">
                    <div class="cta-btn btn-fill">
                        <div class="btn-text">Education</div>
                    </div>
                </div>
                <div class="title">Campaign title here</div>
                <div class="text">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Odio commodi nisi fugit molestias quidem maiores!</div>
                <div class="range-bar" data-width="85%">
                    <div class="range"></div>
                </div>
                <div class="campaign-info">
                    <div class="info-block green">
                        <div class="title">Goals</div>
                        <div class="amount"><span class="currency">Rs.</span>15000</div>
                    </div>
                    <div class="info-block blue">
                        <div class="title">Found</div>
                        <div class="amount"><span class="currency">Rs.</span>15000</div>
                    </div>
                    <div class="info-block gray">
                        <div class="title">Target</div>
                        <div class="amount"><span class="currency">Rs.</span>15000</div>
                    </div>
                </div>
                <a href="#" class="btn-fill cta-btn">
                    <div class="btn-text">Donate Now</div>
                </a>
            </div> -->
            @if(count($completed_receivers) != 0)
                @foreach($completed_receivers as $receivers)
                    <div class="campaign-card">
                        <div class="header">
                            @if($receivers->proof_images != null)
                                @php
                                    $req_images = preg_split ("/\,/", $receivers->proof_images);
                                @endphp
                                @foreach($req_images as $key=> $req_image)
                                    <img src="{{uploaded_asset($req_image)}}" alt="">
                                    @break
                                @endforeach
                            @else
                                <img src="{{url('images/landing-page/support/campaign.png')}}" alt="">
                            @endif
                            @if($receivers->requirement != 'Other')
                                @if(App\Models\Packages::where('id',$receivers->requirement)->first() != null)
                                    <div class="cta-btn btn-fill">
                                        <div class="btn-text">{{ App\Models\Packages::where('id',$receivers->requirement)->first()->name }}</div>
                                    </div>
                                @else
                                    <div class="cta-btn btn-fill">
                                        <div class="btn-text">Package not found</div>
                                    </div>
                                @endif
                            @else
                                <div class="cta-btn btn-fill">
                                    <div class="btn-text">Other</div>
                                </div>
                            @endif
                        </div>
                        <a href="{{route('frontend.donor_profile',$receivers->donor_id)}}">
                            @if(App\Models\Auth\User::where('id',$receivers->donor_id)->first() != null)
                                <div class="">Donated By: {{App\Models\Auth\User::where('id',$receivers->donor_id)->first()->first_name}} {{App\Models\Auth\User::where('id',$receivers->donor_id)->first()->last_name}}</div>
                            @endif
                        </a>
                        <a href="{{route('frontend.receiver_profile',$receivers->id)}}">
                            @if($receivers->name_toggle == 'yes')
                                <div class="title">{{$receivers->nick_name}}</div>
                            @else
                                <div class="title">{{$receivers->name}}</div>
                            @endif
                        </a>
                        <div class="text">{{$receivers->about_donation}}</div>
                    </div>
                @endforeach
            @endif

        </div>
        <nav class="pagination-block">
            <ul class="pagination justify-content-end">
                <li class="page-item">{{ $completed_receivers->links() }}</li>
            </ul>
        </nav>
    </div>
</section>

@endsection
@extends('frontend.layouts.app')

@section('title', app_name() . ' | ' . 'Support Us')

@section('content')

<section class="support-hero-section" style="background: url('{{url('images/landing-page/support/hero-back.png')}}');">
    <div class="container">
        <div class="inner-wrapper">
            <div class="content-block">
                <div class="title-block">
                    <div class="title">Small Good <span>Deed,</span></div>
                    <div class="title">Goes a Long <span>Way!</span></div>
                    <img src="{{url('images/landing-page/home/brush.svg')}}" alt="">
                </div>
                <div class="text">You Can Help Our Humble Sri Lanka In Many Essential Avenues.</div>
                <div class="button-block">
                    <a href="#" class="cta-btn btn-fill" onClick="window.scroll(0, 900)">
                        <div class="btn-text">Donate Now</div>
                    </a>
                    <a href="{{route('frontend.about_us')}}" class="cta-btn btn-outline">
                        <div class="btn-text">Discover More</div>
                        <!-- <i class="bi bi-arrow-down"></i> -->
                    </a>
                </div>
            </div>
            <div class="image-block">
                <img src="{{url('images/landing-page/support/hero-img.png')}}" alt="">
            </div>
        </div>
    </div>
</section>

<!-- <section class="campaign-section">
    <div class="container">
        <div class="title-block">
            <div class="title">Bring <span>JOY</span> to those around you</div>
            <img src="{{url('images/landing-page/home/brush.svg')}}" alt="">
        </div>
        <div class="campaign-block">
            <div class="campaign-card">
                <div class="header">
                    <img src="{{url('images/landing-page/support/campaign.png')}}" alt="">
                    <a class="cta-btn btn-fill">
                        <div class="btn-text">Education</div>
                    </a>
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
            </div>
            <div class="campaign-card  feature">
                <div class="header">
                    <img src="{{url('images/landing-page/support/campaign.png')}}" alt="">
                    <a class="cta-btn btn-fill">
                        <div class="btn-text">Education</div>
                    </a>
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
            </div>
            <div class="campaign-card">
                <div class="header">
                    <img src="{{url('images/landing-page/support/campaign.png')}}" alt="">
                    <a class="cta-btn btn-fill">
                        <div class="btn-text">Education</div>
                    </a>
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
            </div>
        </div>
        <div class="button-block">
            <a href="{{route('frontend.campaigns')}}" class="cta-btn btn-outline">
                <div class="btn-text">View All</div>
            </a>
        </div>
    </div>
</section> -->

@if(count($receivers_list) != 0)

<section class="kindness-section py-5">
    <div class="container">
        <div class="title-block">
            <div class="title">lreKdfõ flakaøh</div>
            <div class="subtitle">The Center for <span>Kindness</span></div>
            <img src="{{url('images/landing-page/home/brush.svg')}}" alt="">
        </div>
        <div class="card-block">
                @foreach($receivers_list as $receivers)
                    @if($receivers->requirement == 'Other')
                        <div class="card">
                            @if($receivers->cover_image != null)
                                <img src="{{uploaded_asset($receivers->cover_image)}}" alt="">
                            @else
                                <img src="{{url('img/default_cover.png')}}" alt="">
                            @endif
                            <div class="cta-btn btn-fill">{{$receivers->requirement}}</div>
                            @if($receivers->name_toggle == 'yes')
                                <div class="name">{{$receivers->nick_name}}</div>
                            @else
                                <div class="name">{{$receivers->name}}</div>
                            @endif
                            <div class="location">{{$receivers->city}}</div>
                            <div class="text">{{$receivers->about_donation}}</div>
                            @auth()
                            <a href="{{route('frontend.payment_other',$receivers->id)}}" class="btn-fill">
                                <div class="btn-text">Donate Now</div>
                            </a>
                            @else
                                <a href="{{route('frontend.auth.register')}}" class="btn-fill">
                                    <div class="btn-text">Donate Now</div>
                                </a>
                                @endauth
                                <a href="{{route('frontend.receiver_profile',$receivers->id)}}" class="view-more">View More</a>
                        </div>
                    @else
                        <div class="card">
                            @if($receivers->cover_image != null)
                                <img src="{{uploaded_asset($receivers->cover_image)}}" alt="">
                            @else
                                <img src="{{url('img/default_cover.png')}}" alt="">
                            @endif
                            @if(App\Models\Packages::where('id',$receivers->requirement)->first() != null)
                                <div class="cta-btn btn-fill">{{ App\Models\Packages::where('id',$receivers->requirement)->first()->name}}</div>
                            @else
                                <div class="name">Package not found</div>
                            @endif
                            @if($receivers->name_toggle == 'yes')
                                <div class="name">{{$receivers->nick_name}}</div>
                            @else
                                <div class="name">{{$receivers->name}}</div>
                            @endif
                            <div class="location">{{$receivers->city}}</div>
                            <div class="text">{{$receivers->about_donation}}</div>
                            @auth()
                            <a href="{{route('frontend.payment',$receivers->id)}}" class="btn-fill">
                                <div class="btn-text">Donate Now</div>
                            </a>
                            @else
                                <a href="{{route('frontend.auth.register')}}" class="btn-fill">
                                    <div class="btn-text">Donate Now</div>
                                </a>
                                @endauth
                                <a href="{{route('frontend.receiver_profile',$receivers->id)}}" class="view-more">View More</a>
                        </div>
                    @endif
                @endforeach

        </div>
        
    </div>
</section>


<div class="campaign-section">
    <div class="container">
        <nav class="pagination-block">
            <ul class="pagination justify-content-end">
                <li class="page-item">{{ $receivers_list->links() }}</li>
            </ul>
        </nav>
    </div>
</div>

@endif



@endsection

@push('after-scripts')

@endpush
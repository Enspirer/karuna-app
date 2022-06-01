@extends('frontend.layouts.app')

@section('title', app_name() . ' | ' . __('navs.general.home'))

@section('content')

<section class="support-hero-section" style="background: url('{{url('images/landing-page/support/hero-back.png')}}');">
    <div class="container">
        <div class="inner-wrapper">
            <div class="content-block">
                <div class="title-block">
                    <div class="title">Make someone's <span>Life</span></div>
                    <div class="title">by <span>giving</span> of yours</div>
                    <img src="{{url('images/landing-page/home/brush.svg')}}" alt="">
                </div>
                <div class="text">Lorem Ipsum is simply dummy text of the printing and typesetting industry.  industry's standard dummy text ever since the 1500s</div>
                <div class="button-block">
                    <a href="{{route('frontend.receivers')}}" class="cta-btn btn-fill">
                        <div class="btn-text">Donate Now</div>
                    </a>
                    <a href="{{route('frontend.campaigns')}}" class="cta-btn btn-outline">
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

@if(count(App\Models\Receivers::where('featured','Enabled')->get()) != 0)
    <section class="kindness-section">
        <div class="container">
            <div class="title-block">
                <div class="title">lreKdfõ flakaøh</div>
                <div class="subtitle">The Center for <span>Kindness</span></div>
                <img src="{{url('images/landing-page/home/brush.svg')}}" alt="">
            </div>
            <div class="card-block">
            
                @foreach(App\Models\Receivers::where('featured','Enabled')->get() as $receivers)
                    @if($receivers->payment_status != 'Payment Completed')
                        @if($receivers->requirement == 'Other')
                            <div class="card">
                                <div class="icon purple">{{substr( $receivers->requirement, 0, 1)}}</div>
                                @if($receivers->name_toggle == 'yes')
                                    <div class="name">{{$receivers->nick_name}}</div>
                                @else
                                    <div class="name">{{$receivers->name}}</div>
                                @endif
                                <div class="location">{{$receivers->city}}</div>
                                <div class="text">{{$receivers->about_donation}}</div>
                                @auth()
                                    <button href="{{route('frontend.payment',$receivers->id)}}" class="btn-fill" disabled>
                                        <div class="btn-text">Donate Now</div>
                                    </button>
                                @else
                                    <button href="{{route('frontend.auth.register')}}" class="btn-fill" disabled>
                                        <div class="btn-text">Donate Now</div>
                                    </button>
                                @endauth
                            </div>
                        @else
                            <div class="card">
                                @if(App\Models\Packages::where('id',$receivers->requirement)->first() != null)
                                    <div class="icon purple">{{substr( App\Models\Packages::where('id',$receivers->requirement)->first()->name, 0, 1)}}</div>
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
                            </div>
                        @endif
                    @endif
                @endforeach
                
            </div>
            <div class="button-block">
                <a href="{{route('frontend.receivers')}}" class="cta-btn btn-outline">
                    <div class="btn-text">View All</div>
                </a>
            </div>
        </div>
    </section>
@endif


<section class="feature-section">
    <div class="container">
        <div class="inner-wrapper">
            <div class="content-block">
                <div class="content-wrapper">
                    <div class="title-block">
                        <div class="subtitle">Packages</div>
                        <div class="title">This is Karuna <span>Packages</span><br>that you can give</div>
                        <img src="{{url('images/landing-page/home/brush.svg')}}" alt="">
                    </div>
                    <div class="text">Karuna project is a digital platform for collecting donations to be distributed to people in need. We build strength, stability, and self-reliance through shelter.</div>
                    @auth
                        @if(auth()->user()->user_type == 'Agent')
                            <a href="{{route('frontend.user.dashboard')}}" class="cta-btn btn-fill">
                                <div class="btn-text">Visit Dashboard</div>
                            </a>
                        @elseif(auth()->user()->user_type == 'Donor')
                            <a href="{{route('frontend.receivers')}}" class="cta-btn btn-fill">
                                <div class="btn-text">Donate Now</div>
                            </a>
                        @endif
                    @else
                        <a href="{{route('frontend.auth.register')}}" class="cta-btn btn-fill">
                            <div class="btn-text">Donate Now</div>
                        </a>
                    @endauth
                </div>
            </div>
            <div class="card-block">
                <div class="package-card">
                    <img src="{{url('images/landing-page/home/food-icon.png')}}" alt="">
                    <div class="title">Healthy Food</div>
                    <div class="text">The assistance provided ishealthy food used for cooking and eating</div>
                </div>
                <div class="package-card">
                    <img src="{{url('images/landing-page/home/medic-icon.png')}}" alt="">
                    <div class="title">Medicine</div>
                    <div class="text">The assistance provided is some of medicine for various diseases</div>
                </div>
                <div class="package-card">
                    <img src="{{url('images/landing-page/home/school-icon.png')}}" alt="">
                    <div class="title">School Items</div>
                    <div class="text">The assistance provided is School Items for poor family.</div>
                </div>
                <div class="package-card">
                    <img src="{{url('images/landing-page/home/other-icon.png')}}" alt="">
                    <div class="title">Other</div>
                    <div class="text">The assistance provided is any other product if you can</div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection

@push('after-scripts')

@endpush
@extends('frontend.layouts.app')

@section('title', app_name() . ' | ' . __('navs.general.home'))

@section('content')


@if(session()->get('flash_success'))
    <div class="modal fade form-submit-modal" id="overlay" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog" style="width: 90%; max-width: 600px; margin: 0; top: 50%; left: 50%; transform: translate(-50%, -50%) !important;">
            <div class="modal-content" style="background: linear-gradient(60deg, #E4F2FB, #9ACDFF); border: 2px solid #0C75FF; border-radius: 15px;">
                <div class="modal-body" style="display: flex; flex-direction: row; align-items: center; justify-content: center; gap: 30px;">
                    <i class="bi bi-x-lg" data-bs-dismiss="modal" style="position: absolute; top: -15px; right: -15px; color: #fff; font-size: 16px; background-color: rgba(255, 255, 255, 0.5); width: 35px; height: 35px; border-radius: 50%; display: flex; flex-direction: row; justify-content: center; align-items: center; backdrop-filter: blur(5px);"></i>
                    <div class="image-block">
                        <img src="{{url('images/success.png')}}" alt="">
                    </div>
                    <div class="content-block">
                        <div class="title" style="font-size: 40px; color: #0C75FF; font-weight: 400; margin-bottom: 10px;">Success !</div>
                        <p class="text" style="font-size: 16px; ont-weight 300; margin: 0; color: #333;">Your account was successfully created and is pending approval.</p>
                        <p class="text" style="font-size: 16px; ont-weight 300; margin: 0; color: #333;">An e-mail will be sent when your account is approved.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endif

<section class="hero-section">
    <div class="splide hero-slider" id="heroSlider">
        <div class="splide__arrows slide-arrows">
            <button class="splide__arrow slide-arrow slide-arrow-prev splide__arrow--prev">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-right" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8z"/>
                </svg>
            </button>
            <button class="splide__arrow slide-arrow slide-arrow-next splide__arrow--next">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-right" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8z"/>
                </svg>
            </button>
        </div>
        <div class="splide__track">
            <ul class="splide__list">
                <li class="splide__slide">
                    <div class="slide slide-1" style="background: url('{{url('images/landing-page/home/hero-slide-back-1.png')}}');">
                        <div class="content-block">
                            <div class="title-block">
                                <div class="title"><span class="dc">T</span>n fjkqfjka wms</div>
                                <div class="subtitle subtitle-1">,la uj</div>
                                <div class="subtitle subtitle-2">fjkqfjka</div>
                                <img src="{{url('images/landing-page/home/brush.svg')}}" alt="">
                            </div>
                            <div class="text">We Empower Kindness From Across The Globe To Our Humble Sri Lanka. To Feed, Educate & Heal The Underprivileged. </div>
                            <div class="button-block">
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

                                <a href="{{route('frontend.campaigns')}}" class="cta-btn btn-outline">
                                    <div class="btn-text">Discover More</div>
                                    <!-- <i class="bi bi-arrow-down"></i> -->
                                </a>
                            </div>
                        </div>
                        <img src="{{url('images/landing-page/home/hero-slide-1.png')}}" alt="" class="hero-img">
                    </div>
                </li>
            </ul>
        </div>
        <div class="splide__progress">
            <div class="splide__progress__bar">
            </div>
        </div>
    </div>
</section>

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
                    <div class="text">We Crowdfund, Purchase & Supply To Underpriveldged Families In Sri Lanka Through Our Agent Network. We Provide Exclusive Transparency To Your Kind Donation.</div>
                   
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
                    <div class="text">We Provide Groceries That Feed A Household Or Orphanage.</div>
                </div>
                <div class="package-card">
                    <img src="{{url('images/landing-page/home/medic-icon.png')}}" alt="">
                    <div class="title">Medicine</div>
                    <div class="text">Essential Medicine That Are Critical For Survival of Any Age.</div>
                </div>
                <div class="package-card">
                    <img src="{{url('images/landing-page/home/school-icon.png')}}" alt="">
                    <div class="title">School Items</div>
                    <div class="text">Stationaries, Books, Pens & Pencils for Children in Schools. </div>
                </div>
                <div class="package-card">
                    <img src="{{url('images/landing-page/home/other-icon.png')}}" alt="">
                    <div class="title">Other</div>
                    <div class="text">Clothes, Or Any Specified Goods That You Suggest.</div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="gratitude-section">
    <div class="container">
        <div class="inner-wrapper">
            <div class="image-block">
                <img src="{{url('images/landing-page/home/gratitude.png')}}" alt="">
            </div>
            <div class="content-block">
                <div class="title-block">
                    <div class="title">lD;.=K</div>
                    <div class="subtitle">i,luq ,laujg</div>
                    <img src="{{url('images/landing-page/home/brush.svg')}}" alt="">
                </div>
                <div class="text">In Your Time of Need, Wherever in the World, You May be, You Always Remember the Struggles in Our Beautiful Island Home. Karunaa Focuses on Digitalizing, Simplifying & Enhancing Limpidity In Your efforts to Contribute And Be a Helping Hand to Struggling Families of Sri Lanka.</div>
                <div class="text">We Focus on Supplying Essential Items In the Pressing Needs of The Underprivileged areas, such as Medicine, Healthy Food, Stationery & Similar Critical Items. Sri Lanka Is Home To Many and is a Mother For All. We Do Our Best To Play Our Part. </div>
            </div>
        </div>
    </div>
</section>

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


@if(count($events) != 0)
    <section class="news-section">
        <div class="container">
            <div class="title-block">
                <div class="title">j¾;udkfha igyka</div>
                <div class="subtitle">Latest Event</div>
                <img src="{{url('images/landing-page/home/brush.svg')}}" alt="">
            </div>
            <div class="content-block">
                @foreach($events as $key => $event)
                    @if($key == 0)
                        <div class="feature-news">
                            <div class="splide news-slider" id="newsSlider">
                                <div class="splide__track">
                                    <ul class="splide__list">
                                        <li class="splide__slide">
                                            <div class="news-slide">
                                                <a href="#" class="slide-link">
                                                    <img src="{{uploaded_asset($event->image)}}" alt="" class="feature-img">
                                                    <div class="content">
                                                        <div class="title">{{$event->name}}</div>
                                                        <div class="date">{{ date('d M Y', strtotime($event->date)) }}</div>
                                                        <div class="text">{!!$event->description!!}</div>
                                                    </div>
                                                </a>
                                            </div>
                                        </li>
                                        <!-- <li class="splide__slide">Slide 02</li>
                                        <li class="splide__slide">Slide 03</li> -->
                                    </ul>
                                </div>
                            </div>
                        </div>
                    @endif
                @endforeach  
                
                <div class="news-list">
                    @foreach($events as $key => $event)
                        @if($key != 0)
                            <div class="news-item">
                                <a href="#" class="news-link">
                                    <img src="{{uploaded_asset($event->image)}}" alt="" class="news-img" style="height:130px;">
                                    <div class="content">
                                        <div class="date">{{ date('d M Y', strtotime($event->date)) }}</div>
                                        <div class="title">{{$event->name}}</div>
                                        <div class="text">{!!$event->description!!}</div>
                                    </div>
                                </a>
                            </div>  
                        @endif
                    @endforeach                       
                </div>
                  
            </div>
        </div>
    </section>
@endif

@endsection

@push('after-scripts')

<script>
    // Hero Slider
    var heroSlider = new Splide('#heroSlider', {
        type: 'loop',
        width: '100%',
        autoplay: true,
        breakpoints: {
            991: {
                arrows: false,
            },
        },
    });

    heroSlider.mount();

    // News Slider
    var newsSlider = new Splide('#newsSlider', {
        type: 'loop',
        pagination: false,
    });

    newsSlider.mount();
</script>


<script>
    $(window).on('load', function () {
        $('#overlay').modal('show');
    });
    $("#close-btn").click(function () {
        $('#overlay').modal('hide');
    });
</script>


@endpush

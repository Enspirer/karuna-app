@extends('frontend.layouts.app')

@section('title', app_name() . ' | ' . __('navs.general.home'))

@section('content')


@if(session()->get('flash_success'))
    <div class="modal fade form-submit-modal" id="overlay" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body">
                    <i class="bi bi-x-lg" data-bs-dismiss="modal"></i>
                    <div class="image-block">
                        <img src="{{url('images/landing_page/contact_us/success.png')}}" alt="">
                    </div>
                    <div class="content-block">
                        <div class="title">Success !</div>
                        <p class="text">Your account was successfully created and is pending approval.</p>
                        <p class="text">An e-mail will be sent when your account is approved.</p>
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
                                <div class="title"><span class="dc">w</span>ms Tn fjkqfjka</div>
                                <div class="subtitle subtitle-1">Helping hand to</div>
                                <div class="subtitle subtitle-2">Sri Lankans</div>
                                <img src="{{url('images/landing-page/home/brush.svg')}}" alt="">
                            </div>
                            <div class="text">Lorem Ipsum is simply dummy text of the printing and typesetting industry.  industry's standard dummy text ever since the 1500s</div>
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

                                <a href="#" class="cta-btn btn-outline">
                                    <div class="btn-text">Discover More</div>
                                    <i class="bi bi-arrow-down"></i>
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
                <div class="text">Lorem Ipsum is simply dummy text of the printing and typesetting industry.  industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum</div>
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

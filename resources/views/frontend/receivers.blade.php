@extends('frontend.layouts.app')

@section('title', app_name() . ' | ' . __('navs.general.home'))

@section('content')

<section class="kindness-section py-5">
    <div class="container">
        <div class="title-block">
            <div class="title">lreKdfõ flakaøh</div>
            <div class="subtitle">The Center for <span>Kindness</span></div>
            <img src="{{url('images/landing-page/home/brush.svg')}}" alt="">
        </div>
        <div class="card-block">
            @if(count(App\Models\Receivers::orderby('id','desc')->get()) != 0)
                @foreach(App\Models\Receivers::orderby('id','desc')->get() as $receivers)
                    @if($receivers->payment_status != 'Payment Completed')
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
                            </div>
                        @endif
                    @endif

                @endforeach
            @endif

        </div>
{{--        <nav class="pagination-block">--}}
{{--            <ul class="pagination justify-content-end">--}}
{{--                <li class="page-item disabled">--}}
{{--                <a class="page-link">Previous</a>--}}
{{--                </li>--}}
{{--                <li class="page-item disabled"><a class="page-link" href="#">1</a></li>--}}
{{--                <li class="page-item"><a class="page-link" href="#">2</a></li>--}}
{{--                <li class="page-item"><a class="page-link" href="#">3</a></li>--}}
{{--                <li class="page-item">--}}
{{--                <a class="page-link" href="#">Next</a>--}}
{{--                </li>--}}
{{--            </ul>--}}
{{--        </nav>--}}
    </div>
</section>

@endsection


@extends('frontend.layouts.mobile_app')

@section('title', app_name() . ' | ' . __('navs.general.home'))

@section('content')

<!-- ======== Top Nav ======== -->
<section class="app-bar-section">
    <div class="mobile-container">
        <div class="inner-wrapper">
            <a href="{{route('frontend.user.mobile.index')}}" class="back-btn">
                <i class="fa-solid fa-arrow-left"></i>
            </a>
            <div class="title">Notification</div>
        </div>
    </div>
</section>
<!-- ======== Top Nav End ======== -->

<section class="notification-section">
    <div class="mobile-container">
        <ul class="list-group">

            @if(auth()->user()->user_type == 'Donor')
                @if(\App\Models\Notification::where('user_id',auth()->user()->id)->count() == 0)                  
                    <section class="section-no-data">
                        <div class="mobile-container">
                            <div class="inner-wrapper">
                                <img src="{{url('images/not-found.png')}}" alt="">
                                <div class="text">No data found</div>
                            </div>
                        </div>
                    </section>
                @else
                    @foreach(\App\Models\Notification::where('user_id',auth()->user()->id)->orderby('id','desc')->get() as $notificatiosn)
                        @if($notificatiosn->status == 'Pending')
                            <li class="list-group-item">
                                <a href="{{route('frontend.user.mobile.thanks',$notificatiosn->id)}}" class="nav-link">
                                    @if(auth()->user()->profile_image != null)
                                        <img src="{{uploaded_asset(auth()->user()->profile_image)}}" alt="" width="140px">
                                    @else
                                        <img src="{{url('images/dashboard/donate.png')}}" alt="">
                                    @endif
                                    <div class="text-block">
                                        <div class="subject red">{{$notificatiosn->title}}</div>
                                        <div class="text">{{$notificatiosn->content}}</div>
                                    </div>
                                    <i class="bi bi-bookmark-fill"></i>
                                </a>
                            </li>
                        @else
                            <li class="list-group-item">
                                <a href="{{route('frontend.user.mobile.thanks',$notificatiosn->id)}}" class="nav-link">
                                    @if(auth()->user()->profile_image != null)
                                        <img src="{{uploaded_asset(auth()->user()->profile_image)}}" alt="" width="140px">
                                    @else
                                        <img src="{{url('images/dashboard/donate.png')}}" alt="">
                                    @endif
                                    <div class="text-block">
                                        <div class="subject text-secondary">{{$notificatiosn->title}}</div>
                                        <div class="text text-secondary">{{$notificatiosn->content}}</div>
                                    </div>
                                    <i class="bi bi-bookmark-fill"></i>
                                </a>
                            </li>
                        @endif
                    @endforeach
                @endif
            @endif

            @if(auth()->user()->user_type == 'Agent')
                @if(\App\Models\Notification::where('user_id',auth()->user()->id)->count() == 0)
                    <section class="section-no-data">
                        <div class="mobile-container">
                            <div class="inner-wrapper">
                                <img src="{{url('images/not-found.png')}}" alt="">
                                <div class="text">No data found</div>
                            </div>
                        </div>
                    </section>
                @else
                    @foreach(\App\Models\Notification::where('user_id',auth()->user()->id)->orderby('id','desc')->get() as $notificatiosn)
                        @if($notificatiosn->status == 'Pending')
                            <li class="list-group-item">
                                <a href="{{route('frontend.user.mobile.agent_confirmation',$notificatiosn->id)}}" class="nav-link">
                                    <div class="text-block">
                                        <div class="subject red">{{$notificatiosn->title}}</div>
                                        <div class="text">{{$notificatiosn->content}}</div>
                                    </div>
                                    <i class="bi bi-bookmark"></i>
                                </a>
                            </li>
                        @else
                            <li class="list-group-item">
                                <a href="{{route('frontend.user.mobile.agent_confirmation',$notificatiosn->id)}}" class="nav-link">
                                    <div class="text-block">
                                        <div class="subject text-secondary">{{$notificatiosn->title}}</div>
                                        <div class="text text-secondary">{{$notificatiosn->content}}</div>
                                    </div>
                                    <i class="bi bi-bookmark"></i>
                                </a>
                            </li>
                        @endif
                    @endforeach
                @endif
            @endif

           
        </ul>
    </div>
</section>

@endsection

@push('after-scripts')

@endpush
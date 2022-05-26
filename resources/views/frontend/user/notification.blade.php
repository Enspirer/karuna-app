@extends('frontend.layouts.dashboard_app')

@section('title', app_name() . ' | ' . __('navs.general.home'))

@section('content')

    @if(auth()->user()->user_type == 'Donor')
    
        @if(\App\Models\Notification::where('user_id',auth()->user()->id)->count() == 0)
            <div class="table-container">
                <div class="row" style="margin: 50px 0px;">
                    <div class="container">
                        <div style="text-align: center;">
                            <div style="background-image: url(&quot;http://localhost:8000/img/no_data.png&quot;); height: 300px; background-position: center center; background-repeat: no-repeat; background-size: contain;"></div>
                            <h3>No any Notification found</h3>
                        </div>
                    </div>
                </div>
            </div>
        @else
            <section class="notification-section">
                <ul class="list-group list-group-flush">
                    @foreach(\App\Models\Notification::where('user_id',auth()->user()->id)->orderby('id','desc')->first()->get() as $notificatiosn)
                        @if($notificatiosn->status == 'Pending')
                            <li class="list-group-item">
                                <a href="{{route('frontend.dashboard.notification_submit',$notificatiosn->id)}}" class="not-item">
                                    <i class="bi bi-x-circle-fill"></i>
                                    <div class="image-block">
                                        @if(auth()->user()->profile_image != null)
                                            <img src="{{uploaded_asset(auth()->user()->profile_image)}}" alt="" width="140px">
                                        @else
                                            <img src="{{url('images/dashboard/donate.png')}}" alt="">
                                        @endif
                                    </div>
                                    <div class="text-block">
                                        <div class="subject red">{{$notificatiosn->title}}</div>
                                        <div class="text">{{$notificatiosn->content}}</div>
                                    </div>
                                    <div class="time-block">
                                        <i class="bi bi-clock"></i>
                                        <div class="text">{{$notificatiosn->created_at}}</div>
                                    </div>
                                </a>
                            </li>
                        @else
                            <li class="list-group-item">
                                <a href="{{route('frontend.dashboard.notification_submit',$notificatiosn->id)}}" class="not-item">
                                    <i class="bi bi-x-circle-fill"></i>
                                    <div class="image-block">
                                        @if(auth()->user()->profile_image != null)
                                            <img src="{{uploaded_asset(auth()->user()->profile_image)}}" alt="" width="140px">
                                        @else
                                            <img src="{{url('images/dashboard/donate.png')}}" alt="">
                                        @endif
                                    </div>
                                    <div class="text-block">
                                        <div class="subject text-secondary">{{$notificatiosn->title}}</div>
                                        <div class="text text-secondary">{{$notificatiosn->content}}</div>
                                    </div>
                                    <div class="time-block">
                                        <i class="bi bi-clock"></i>
                                        <div class="text">{{$notificatiosn->created_at}}</div>
                                    </div>
                                </a>
                            </li>
                        @endif
                    @endforeach
{{--                    <li class="list-group-item">--}}
{{--                        <a href="#" class="not-item">--}}
{{--                            <i class="bi bi-x-circle-fill"></i>--}}
{{--                            <div class="image-block">--}}
{{--                                <img src="{{url('images/dashboard/donate.png')}}" alt="">--}}
{{--                            </div>--}}
{{--                            <div class="text-block">--}}
{{--                                <div class="subject green">Waiting for you confirmation</div>--}}
{{--                                <div class="text">Lorem Ipsum is simply dummy text of the printing and typesetting industry.  industry's standard dummy text ever since the 1500s</div>--}}
{{--                            </div>--}}
{{--                            <div class="time-block">--}}
{{--                                <i class="bi bi-clock"></i>--}}
{{--                                <div class="text">24 Apr 2022 at 9.30 AM</div>--}}
{{--                            </div>--}}
{{--                        </a>--}}
{{--                    </li>--}}
                </ul>
            </section>
        @endif


    @elseif(auth()->user()->user_type == 'Agent')
        <section class="notification-section">
            @if(\App\Models\Notification::where('user_id',auth()->user()->id)->count() == 0)
                <div class="table-container">
                    <div class="row" style="margin: 50px 0px;">
                        <div class="container">
                            <div style="text-align: center;">
                                <div style="background-image: url(&quot;http://localhost:8000/img/no_data.png&quot;); height: 300px; background-position: center center; background-repeat: no-repeat; background-size: contain;"></div>
                                <h3>No any Notification found</h3>
                            </div>
                        </div>
                    </div>
                </div>
            @else
                <ul class="list-group list-group-flush">
                    @foreach(\App\Models\Notification::where('user_id',auth()->user()->id)->orderby('id','desc')->get() as $notificatiosn)
                        @if($notificatiosn->status == 'Pending')
                            <li class="list-group-item">
                                <a href="{{route('frontend.dashboard.notification_submit',$notificatiosn->id)}}" class="not-item">
                                    <i class="bi bi-x-circle-fill"></i>
                                    <div class="text-block">
                                        <div class="subject red">{{$notificatiosn->title}}</div>
                                        <div class="text">{{$notificatiosn->content}}</div>
                                    </div>
                                    <div class="time-block">
                                        <i class="bi bi-clock"></i>
                                        <div class="text">{{$notificatiosn->created_at}}</div>
                                    </div>
                                </a>
                            </li>
                            @else
                                <li class="list-group-item">
                                    <a href="{{route('frontend.dashboard.notification_submit',$notificatiosn->id)}}" class="not-item">
                                        <i class="bi bi-x-circle-fill"></i>
                                        <div class="text-block">
                                            <div class="subject text-secondary">{{$notificatiosn->title}}</div>
                                            <div class="text text-secondary">{{$notificatiosn->content}}</div>
                                        </div>
                                        <div class="time-block">
                                            <i class="bi bi-clock"></i>
                                            <div class="text">{{$notificatiosn->created_at}}</div>
                                        </div>
                                    </a>
                                </li>
                            @endif
                    @endforeach


                </ul>
            @endif

        </section>
    @endif



@endsection

@push('after-scripts')

@endpush

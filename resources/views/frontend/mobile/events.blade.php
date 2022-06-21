@extends('frontend.layouts.mobile_app')

@section('title', app_name() . ' | ' . 'Events')

@section('content')

<section class="event-header-section">
    <div class="mobile-container">
        <div class="inner-wrapper">
            <a href="{{route('frontend.user.mobile.index')}}" class="brand">
                <img src="{{url('images/mobile/logo/karuna-logo-english.svg')}}" alt="">
            </a>            
            <a href="#" class="profile"> 
                <i class="bi bi-suit-heart-fill"></i>
                <div class="text">0</div>
                <img src="{{url('images/landing-page/nav/profile.png')}}" alt="">
            </a>            
        </div>
        <div class="title">Events at Karunaa</div>
        <div class="text">We Organize Specialised Events Focusing on Various Parts of the Country. Browse Our Event Calendar! </div>
    </div>
</section>

<section class="events-section">
    <div class="container">

        @if(count($events) != 0)
            <div class="events-block">
                @foreach($events as $event)
                    <div class="event-card">
                        <img src="{{uploaded_asset($event->image)}}" alt="">
                        <div class="event-card-body">
                            <div class="title" style="overflow: hidden; text-overflow: ellipsis; display: -webkit-box; -webkit-line-clamp: 1; -webkit-box-orient: vertical;">{{$event->name}}</div>
                            <div class="location">{{$event->place}}</div>
                            <div class="info-block">
                                <div class="date-block">
                                    <div class="date">{{ date('d', strtotime($event->date)) }}</div>
                                    <div class="month">{{ date('M', strtotime($event->date)) }}</div>
                                </div>
                                <div class="time-block">
                                    <div class="text">{{$event->time}}</div>
                                </div>
                            </div>
                            <div class="text">{!!$event->description!!}</div>
                            <a href="{{route('frontend.user.mobile.individual_event',$event->id)}}" class="cta-btn btn-fill">
                                <span class="btn-text">View More</span>
                            </a>
                        </div>
                    </div>
                @endforeach            
            </div>
        @else
            <section class="section-no-data">
                <div class="mobile-container">
                    <div class="inner-wrapper">
                        <img src="{{url('images/not-found.png')}}" alt="">
                        <div class="text">No data found</div>
                    </div>
                </div>
            </section>         
        @endif

        @if(count($events) != 0)
            <nav class="pagination-block">
                <ul class="pagination justify-content-end">
                    <li class="page-item">{{ $events->links() }}</li>
                </ul>
            </nav>
        @endif
    </div>
</section>

@endsection

@push('after-scripts')

@endpush
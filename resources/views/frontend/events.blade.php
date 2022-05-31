@extends('frontend.layouts.app')

@section('title', app_name() . ' | ' . __('navs.general.home'))

@section('content')

<section class="events-hero-section">
    <div class="container">
       <div class="inner-wrapper">
            <div class="title-block">
                <div class="title">Events<br>at Karuna</div>
                <img src="{{url('images/landing-page/home/brush.svg')}}" alt="">
            </div>
            <div class="text">Lorem Ipsum is simply dummy text of the printing and typesetting industry.  industry's standard dummy text ever since the 1500s</div>
       </div>        
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
                            <a href="#" class="cta-btn btn-fill">
                                <span class="btn-text">View More</span>
                            </a>
                        </div>
                    </div>
                @endforeach            
            </div>
        @else
            <div class="ml-3 mt-5 pt-5">
                @include('frontend.includes.not_found',[
                    'not_found_title' => 'No any events found',
                    'not_found_description' => null,
                    'not_found_button_caption' => null
                ])
            </div>               
        @endif

        <nav class="pagination-block">
            <ul class="pagination justify-content-end">
                <li class="page-item">{{ $events->links() }}</li>
            </ul>
        </nav>
    </div>
</section>

@endsection

@push('after-scripts')

@endpush
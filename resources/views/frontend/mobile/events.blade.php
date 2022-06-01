@extends('frontend.layouts.mobile_app')

@section('title', app_name() . ' | ' . __('navs.general.home'))

@section('content')

<section class="event-header-section">
    <div class="mobile-container">
        <div class="inner-wrapper">
            <a href="{{route('frontend.user.mobile.index')}}" class="brand">
                <img src="{{url('images/mobile/logo/karuna-logo-english.svg')}}" alt="">
            </a>            
            <a href="#" class="profile"> 
                <i class="bi bi-suit-heart-fill"></i>
                <div class="text">1250</div>
                <img src="{{url('images/landing-page/nav/profile.png')}}" alt="">
            </a>            
        </div>
        <div class="title">Events at Karuna</div>
        <div class="text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolorem architecto labore pariatur</div>
    </div>
</section>

<section class="events-section">
    <div class="container">
        <div class="events-block">
            <div class="event-card">
                <img src="{{url('images/landing-page/events/event.png')}}" alt="">
                <div class="event-card-body">
                    <div class="title">Event name</div>
                    <div class="location">Colombo 05 - Nugegoda</div>
                    <div class="info-block">
                        <div class="date-block">
                            <div class="date">10</div>
                            <div class="month">Jun</div>
                        </div>
                        <div class="time-block">
                            <div class="text">7:30 AM to 12.00 PM</div>
                        </div>
                    </div>
                    <div class="text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Nam minus ducimus excepturi inventore hic quas quos vel nisi, quaerat maxime! Veritatis quasi suscipit enim excepturi.</div>
                    <a href="{{route('frontend.user.mobile.individual_event')}}" class="cta-btn btn-fill">
                        <span class="btn-text">View More</span>
                    </a>
                </div>
            </div>
            <div class="event-card">
                <img src="{{url('images/landing-page/events/event.png')}}" alt="">
                <div class="event-card-body">
                    <div class="title">Event name</div>
                    <div class="location">Colombo 05 - Nugegoda</div>
                    <div class="info-block">
                        <div class="date-block">
                            <div class="date">10</div>
                            <div class="month">Jun</div>
                        </div>
                        <div class="time-block">
                            <div class="text">7:30 AM to 12.00 PM</div>
                        </div>
                    </div>
                    <div class="text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Nam minus ducimus excepturi inventore hic quas quos vel nisi, quaerat maxime! Veritatis quasi suscipit enim excepturi.</div>
                    <a href="#" class="cta-btn btn-fill">
                        <span class="btn-text">View More</span>
                    </a>
                </div>
            </div>
            <div class="event-card">
                <img src="{{url('images/landing-page/events/event.png')}}" alt="">
                <div class="event-card-body">
                    <div class="title">Event name</div>
                    <div class="location">Colombo 05 - Nugegoda</div>
                    <div class="info-block">
                        <div class="date-block">
                            <div class="date">10</div>
                            <div class="month">Jun</div>
                        </div>
                        <div class="time-block">
                            <div class="text">7:30 AM to 12.00 PM</div>
                        </div>
                    </div>
                    <div class="text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Nam minus ducimus excepturi inventore hic quas quos vel nisi, quaerat maxime! Veritatis quasi suscipit enim excepturi.</div>
                    <a href="#" class="cta-btn btn-fill">
                        <span class="btn-text">View More</span>
                    </a>
                </div>
            </div>
            <div class="event-card">
                <img src="{{url('images/landing-page/events/event.png')}}" alt="">
                <div class="event-card-body">
                    <div class="title">Event name</div>
                    <div class="location">Colombo 05 - Nugegoda</div>
                    <div class="info-block">
                        <div class="date-block">
                            <div class="date">10</div>
                            <div class="month">Jun</div>
                        </div>
                        <div class="time-block">
                            <div class="text">7:30 AM to 12.00 PM</div>
                        </div>
                    </div>
                    <div class="text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Nam minus ducimus excepturi inventore hic quas quos vel nisi, quaerat maxime! Veritatis quasi suscipit enim excepturi.</div>
                    <a href="#" class="cta-btn btn-fill">
                        <span class="btn-text">View More</span>
                    </a>
                </div>
            </div>
            <div class="event-card">
                <img src="{{url('images/landing-page/events/event.png')}}" alt="">
                <div class="event-card-body">
                    <div class="title">Event name</div>
                    <div class="location">Colombo 05 - Nugegoda</div>
                    <div class="info-block">
                        <div class="date-block">
                            <div class="date">10</div>
                            <div class="month">Jun</div>
                        </div>
                        <div class="time-block">
                            <div class="text">7:30 AM to 12.00 PM</div>
                        </div>
                    </div>
                    <div class="text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Nam minus ducimus excepturi inventore hic quas quos vel nisi, quaerat maxime! Veritatis quasi suscipit enim excepturi.</div>
                    <a href="#" class="cta-btn btn-fill">
                        <span class="btn-text">View More</span>
                    </a>
                </div>
            </div>
        </div>
        <nav class="pagination-block">
            <ul class="pagination justify-content-end">
                <li class="page-item disabled">
                <a class="page-link">Previous</a>
                </li>
                <li class="page-item disabled"><a class="page-link" href="#">1</a></li>
                <li class="page-item"><a class="page-link" href="#">2</a></li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
                <li class="page-item">
                <a class="page-link" href="#">Next</a>
                </li>
            </ul>
        </nav>
    </div>
</section>

@endsection

@push('after-scripts')

@endpush
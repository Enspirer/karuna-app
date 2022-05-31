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
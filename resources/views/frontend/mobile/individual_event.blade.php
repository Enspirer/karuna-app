@extends('frontend.layouts.mobile_app')

@section('title', app_name() . ' | ' . 'Event')

@section('content')

<section class="top-nav-section">
    <div class="mobile-container">
      <div class="inner-wrapper">
            <a href="{{route('frontend.user.mobile.index')}}" class="brand">
                <img src="{{url('images/mobile/logo/karuna-logo-english.svg')}}" alt="">
            </a>
            <a href="#" class="profile">
                <i class="bi bi-suit-heart-fill"></i>
                <div class="text">1578</div>
                <img src="{{url('images/landing-page/nav/profile.png')}}" alt="">
            </a>
      </div>
    </div>
</section>

<section class="event-hero">
    <div class="container">
        <img src="{{uploaded_asset($event->image)}}" alt="">
    </div>
</section>

<section class="event-info">
    <div class="container">
        <div class="content-block">
            <div class="title-block">
                <div class="title">{{$event->name}}</div>
                <div class="location"><i class="bi bi-geo-alt-fill"></i>{{$event->place}}</div>
            </div>
            <div class="info-block">
                <div class="date-block">
                    <div class="date">{{ date('d', strtotime($event->date)) }}</div>
                    <div class="month">{{ date('M', strtotime($event->date)) }}</div>
                </div>
                <div class="time-block">
                    <div class="text">{{$event->time}}</div>
                </div>
            </div>
        </div>
        <div class="info">{!!$event->description!!}</div>
    </div>
</section>


<!-- 
<section class="event-gallery">
    <div class="container">
        <div class="title">Memories</div>
        <div class="inner-wrapper">
            <img src="https://via.placeholder.com/300x200" alt="" class="event-img">
            <img src="https://via.placeholder.com/300x200" alt="" class="event-img">
            <img src="https://via.placeholder.com/300x200" alt="" class="event-img">
            <img src="https://via.placeholder.com/300x200" alt="" class="event-img">
            <img src="https://via.placeholder.com/300x200" alt="" class="event-img">
            <img src="https://via.placeholder.com/300x200" alt="" class="event-img">
        </div>
    </div>
</section> -->

@endsection

@push('after-scripts')

@endpush
@extends('frontend.layouts.app')

@section('title', app_name() . ' | ' . __('navs.general.home'))

@section('content')

<section class="event-hero">
    <div class="container">
        <img src="https://via.placeholder.com/1200x400" alt="">
    </div>
</section>

<section class="event-info">
    <div class="container">
        <div class="content-block">
            <div class="title-block">
                <div class="title">Event name - Karuna Event</div>
                <div class="location"><i class="bi bi-geo-alt-fill"></i> Colombo 05 - Nugegoda</div>
            </div>
            <div class="info-block">
                <div class="date-block">
                    <div class="date">10</div>
                    <div class="month">Jun</div>
                </div>
                <div class="time-block">
                    <div class="text">7:30 AM to 12.00 PM</div>
                </div>
            </div>
        </div>
        <div class="info">Lorem ipsum dolor sit amet consectetur adipisicing elit. Excepturi magnam nesciunt nostrum quos hic quam quis culpa ex neque temporibus, nobis omnis et! Accusamus, possimus voluptate! Quo eos tenetur ut. Reiciendis ducimus ipsam nemo magnam enim, animi culpa deserunt cupiditate officiis placeat, a labore exercitationem dolorum assumenda quidem at facilis!</div>
    </div>
</section>

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
</section>


@endsection

@push('after-scripts')

@endpush
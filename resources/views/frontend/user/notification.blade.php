@extends('frontend.layouts.dashboard_app')

@section('title', app_name() . ' | ' . __('navs.general.home'))

@section('content')

<section class="notification-section">
    <ul class="list-group list-group-flush">
        <li class="list-group-item">
            <a href="{{route('frontend.dashboard.notification_submit')}}" class="not-item">
                <i class="bi bi-x-circle-fill"></i>
                <div class="text-block">
                    <div class="subject red">Waiting for you confirmation</div>
                    <div class="text">Lorem Ipsum is simply dummy text of the printing and typesetting industry.  industry's standard dummy text ever since the 1500s</div>
                </div>
                <div class="time-block">
                    <i class="bi bi-clock"></i>
                    <div class="text">24 Apr 2022 at 9.30 AM</div>
                </div>
            </a>
        </li>
        <li class="list-group-item">
            <a href="#" class="not-item">
                <i class="bi bi-x-circle-fill"></i>
                <div class="text-block">
                    <div class="subject green">Waiting for you confirmation</div>
                    <div class="text">Lorem Ipsum is simply dummy text of the printing and typesetting industry.  industry's standard dummy text ever since the 1500s</div>
                </div>
                <div class="time-block">
                    <i class="bi bi-clock"></i>
                    <div class="text">24 Apr 2022 at 9.30 AM</div>
                </div>
            </a>
        </li>
    </ul>
</section>

<section class="notification-section">
    <ul class="list-group list-group-flush">
        <li class="list-group-item">
            <a href="{{route('frontend.dashboard.notification_submit')}}" class="not-item">
                <i class="bi bi-x-circle-fill"></i>
                <div class="image-block">
                    <img src="{{url('images/dashboard/donate.png')}}" alt="">
                </div>
                <div class="text-block">
                    <div class="subject red">Waiting for you confirmation</div>
                    <div class="text">Lorem Ipsum is simply dummy text of the printing and typesetting industry.  industry's standard dummy text ever since the 1500s</div>
                </div>
                <div class="time-block">
                    <i class="bi bi-clock"></i>
                    <div class="text">24 Apr 2022 at 9.30 AM</div>
                </div>
            </a>
        </li>
        <li class="list-group-item">
            <a href="#" class="not-item">
                <i class="bi bi-x-circle-fill"></i>
                <div class="image-block">
                    <img src="{{url('images/dashboard/donate.png')}}" alt="">
                </div>
                <div class="text-block">
                    <div class="subject green">Waiting for you confirmation</div>
                    <div class="text">Lorem Ipsum is simply dummy text of the printing and typesetting industry.  industry's standard dummy text ever since the 1500s</div>
                </div>
                <div class="time-block">
                    <i class="bi bi-clock"></i>
                    <div class="text">24 Apr 2022 at 9.30 AM</div>
                </div>
            </a>
        </li>
    </ul>
</section>

@endsection

@push('after-scripts')

@endpush
@extends('frontend.layouts.dashboard_app')

@section('title', app_name() . ' | ' . __('navs.general.home'))

@section('content')

<section class="notification-submit-section">
    <form action="">
        <div class="notification-block">
            <div class="text-block">
                <div class="subject red">Waiting for you confirmation</div>
                <div class="text">Lorem Ipsum is simply dummy text of the printing and typesetting industry.  industry's standard dummy text ever since the 1500s</div>
            </div>
            <div class="time-block">
                <i class="bi bi-clock"></i>
                <div class="text">24 Apr 2022 at 9.30 AM</div>
            </div>
        </div>
        <div class="media-upload-block">
            <div class="media-block">
                <div class="header">
                    <div class="title">Proof Images</div>
                    <div class="text">(Optional)</div>
                </div>
                <div class="body">
                    <a href="#"><img src="{{url('images/dashboard/placeholder.png')}}" alt=""></a>
                    <a href="#"><img src="{{url('images/dashboard/placeholder.png')}}" alt=""></a>
                    <a href="#"><img src="{{url('images/dashboard/placeholder.png')}}" alt=""></a>
                </div>
            </div>
            <div class="media-block">
                <div class="header">
                    <div class="title">Proof Images</div>
                    <div class="text">(Optional)</div>
                </div>
                <div class="body">
                    <a href="#"><img src="{{url('images/dashboard/placeholder.png')}}" alt=""></a>
                    <a href="#"><img src="{{url('images/dashboard/placeholder.png')}}" alt=""></a>
                    <a href="#"><img src="{{url('images/dashboard/placeholder.png')}}" alt=""></a>
                </div>
            </div>
            <div class="media-block">
                <div class="header">
                    <div class="title">Proof Images</div>
                    <div class="text">(Optional)</div>
                </div>
                <div class="body">
                    <a href="#"><img src="{{url('images/dashboard/placeholder.png')}}" alt=""></a>
                    <a href="#"><img src="{{url('images/dashboard/placeholder.png')}}" alt=""></a>
                    <a href="#"><img src="{{url('images/dashboard/placeholder.png')}}" alt=""></a>
                </div>
            </div>
        </div>
        <div class="comment-block">
            <div class="comment-input">
                <label>Special Note</label>
                <textarea class="form-control" rows="5"></textarea>
            </div>
            <a href="#" class="cta-btn btn-fill">
                <div class="btn-text">Submit</div>
            </a>
        </div>
    </form>
</section>

@endsection

@push('after-scripts')

@endpush
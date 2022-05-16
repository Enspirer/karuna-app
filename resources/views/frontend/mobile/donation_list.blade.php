@extends('frontend.layouts.mobile_app')

@section('title', app_name() . ' | ' . __('navs.general.home'))

@section('content')

@include('frontend.mobile.includes.top_nav')

<section class="donate-list-section">
    <div class="mobile-container">
        <ul class="list-group">
            <li class="list-group-item">
                <div class="receiver">
                    <div class="content-block">
                        <div class="icon blue">F</div>
                        <div class="text-block">
                            <div class="name">Amila Nandiak</div>
                            <div class="location">Ampara</div>
                        </div>
                    </div>
                    <div class="button-block">
                        <a href="{{route('frontend.mobile.donation_info')}}" class="cta-btn btn-fill">
                            <div class="btn-text">Donate</div>
                        </a>
                        <a href="#" class="cta-link">View more</a>
                    </div>
                </div>
            </li>
            <li class="list-group-item">
                <div class="receiver">
                    <div class="content-block">
                        <div class="icon purple">M</div>
                        <div class="text-block">
                            <div class="name">Amila Nandiak</div>
                            <div class="location">Ampara</div>
                        </div>
                    </div>
                    <div class="button-block">
                        <a href="#" class="cta-btn btn-fill">
                            <div class="btn-text">Donate</div>
                        </a>
                        <a href="#" class="cta-link">View more</a>
                    </div>
                </div>
            </li>
            <li class="list-group-item">
                <div class="receiver">
                    <div class="content-block">
                        <div class="icon green">S</div>
                        <div class="text-block">
                            <div class="name">Amila Nandiak</div>
                            <div class="location">Ampara</div>
                        </div>
                    </div>
                    <div class="button-block">
                        <a href="#" class="cta-btn btn-fill">
                            <div class="btn-text">Donate</div>
                        </a>
                        <a href="#" class="cta-link">View more</a>
                    </div>
                </div>
            </li>
        </ul>
    </div>
</section>

<nav class="pagination-nav">
    <ul class="pagination">
        <li class="page-item disabled">
            <a class="page-link">Previous</a>
        </li>
        <li class="page-item disabled">
            <a class="page-link">1</a>
        </li>
        <li class="page-item active">
            <a class="page-link" href="#">2</a>
        </li>
        <li class="page-item">
            <a class="page-link" href="#">3</a>
        </li>
        <li class="page-item">
            <a class="page-link" href="#">Next</a>
        </li>
    </ul>
</nav>

@include('frontend.mobile.includes.bottom_nav')

@endsection

@push('after-scripts')

@endpush
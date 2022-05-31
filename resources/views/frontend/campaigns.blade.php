@extends('frontend.layouts.app')

@section('title', app_name() . ' | ' . __('navs.general.home'))

@section('content')

<section class="campaign-section py-5">
    <div class="container">
        <div class="title-block">
            <div class="title">Bring <span>JOY</span> to those around you</div>
            <img src="{{url('images/landing-page/home/brush.svg')}}" alt="">
        </div>
        <div class="campaign-block">
            <!-- <div class="campaign-card">
                <div class="header">
                    <img src="{{url('images/landing-page/support/campaign.png')}}" alt="">
                    <div class="cta-btn btn-fill">
                        <div class="btn-text">Education</div>
                    </div>
                </div>
                <div class="title">Campaign title here</div>
                <div class="text">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Odio commodi nisi fugit molestias quidem maiores!</div>
                <div class="range-bar" data-width="85%">
                    <div class="range"></div>
                </div>
                <div class="campaign-info">
                    <div class="info-block green">
                        <div class="title">Goals</div>
                        <div class="amount"><span class="currency">Rs.</span>15000</div>
                    </div>
                    <div class="info-block blue">
                        <div class="title">Found</div>
                        <div class="amount"><span class="currency">Rs.</span>15000</div>
                    </div>
                    <div class="info-block gray">
                        <div class="title">Target</div>
                        <div class="amount"><span class="currency">Rs.</span>15000</div>
                    </div>
                </div>
                <a href="#" class="btn-fill cta-btn">
                    <div class="btn-text">Donate Now</div>
                </a>
            </div> -->
            <a href="#" class="campaign-card">
                <div class="header">
                    <img src="{{url('images/landing-page/support/campaign.png')}}" alt="">
                    <div class="cta-btn btn-fill">
                        <div class="btn-text">Education</div>
                    </div>
                </div>
                <div class="title">Campaign title here</div>
                <div class="text">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Odio commodi nisi fugit molestias quidem maiores!</div>
                <!-- <div class="range-bar" data-width="85%">
                    <div class="range"></div>
                </div> -->
                <!-- <div class="campaign-info">
                    <div class="info-block green">
                        <div class="title">Goals</div>
                        <div class="amount"><span class="currency">Rs.</span>15000</div>
                    </div>
                    <div class="info-block blue">
                        <div class="title">Found</div>
                        <div class="amount"><span class="currency">Rs.</span>15000</div>
                    </div>
                    <div class="info-block gray">
                        <div class="title">Target</div>
                        <div class="amount"><span class="currency">Rs.</span>15000</div>
                    </div>
                </div> -->
                <!-- <a href="#" class="btn-fill cta-btn">
                    <div class="btn-text">Donate Now</div>
                </a> -->
            </a>
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
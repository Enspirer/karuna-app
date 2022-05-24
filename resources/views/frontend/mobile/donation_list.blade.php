@extends('frontend.layouts.mobile_app')

@section('title', app_name() . ' | ' . __('navs.general.home'))

@section('content')

<!-- ======== Top Nav ======== -->
<section class="app-bar-section">
    <div class="mobile-container">
        <div class="inner-wrapper">
            <a href="{{route('frontend.mobile.index')}}" class="back-btn">
                <i class="fa-solid fa-arrow-left"></i>
            </a>
            <div class="title">Donation List</div>
        </div>
    </div>
</section>
<!-- ======== Top Nav End ======== -->

<section class="donate-list-section">
    <div class="mobile-container">
        <ul class="list-group">

        @if(count($receivers) == 0)
			@include('frontend.includes.not_found',[
				'not_found_title' => 'No any receivers found',
				'not_found_description' => null,
				'not_found_button_caption' => null
			])
        @else
            @foreach($receivers as $key => $receiver)
                <li class="list-group-item">
                    <div class="receiver">
                        <div class="content-block">
                            @if($receiver->requirement == 'Other')
                                <div class="icon blue">O</div>
                            @else
                                @if(App\Models\Packages::where('id',$receiver->requirement)->first() != null)
                                    <img src="{{uploaded_asset(App\Models\Packages::where('id',$receiver->requirement)->first()->image)}}" width="35px" style="border-radius: 50%; height: 35px;" class="ml-4 mt-3 mb-3" alt="">
                                @endif
                            @endif
                            <div class="text-block">
                                <div class="name">{{$receiver->name}}</div>
                                <div class="location">{{$receiver->city}} {{$receiver->country}}</div>
                            </div>
                        </div>
                        <div class="button-block">
                            <a href="{{route('frontend.mobile.donation_info',$receiver->id)}}" class="cta-btn btn-fill">
                                <div class="btn-text">Donate</div>
                            </a>
                            <!-- <a href="{{route('frontend.mobile.payment',$receiver->id)}}" class="cta-link">View more</a> -->
                        </div>
                    </div>
                </li>
           @endforeach
        @endif


        </ul>
    </div>
</section>

<nav class="pagination-nav">
    <ul class="pagination">
        <li class="page-item">
            {{ $receivers->links() }}
        </li>
    </ul>
</nav>

@endsection

@push('after-scripts')

@endpush
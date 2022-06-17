@extends('frontend.layouts.mobile_app')

@section('title', app_name() . ' | ' . __('navs.general.home'))

@section('content')

<!-- ======== Top Nav ======== -->
<section class="app-bar-section">
    <div class="mobile-container">
        <div class="inner-wrapper">
            <!-- <a href="{{route('frontend.user.mobile.index')}}" class="back-btn"> -->
            <a href="{{route('frontend.user.mobile.index')}}" class="back-btn">
                <i class="fa-solid fa-arrow-left"></i>
            </a>
            <div class="title">Donation List</div>
        </div>
    </div>
</section>
<!-- ======== Top Nav End ======== -->


@if(App\Models\Auth\User::where('id',auth()->user()->id)->first()->user_type == 'Agent')

    <section class="donate-list-section">
        <div class="mobile-container">
            <ul class="list-group">

            @if(count($receivers) == 0)
                <section class="section-no-data">
                    <div class="mobile-container">
                        <div class="inner-wrapper">
                            <img src="{{url('images/not-found.png')}}" alt="">
                            <div class="text">No data found</div>
                        </div>
                    </div>
                </section>
            @else
                @foreach($receivers as $key => $receiver)
                    <li class="list-group-item">
                        <div class="receiver">
                            <div class="content-block">
                                @if($receiver->requirement == 'Other')
                                    <div class="icon blue">O</div>
                                @else
                                    @if(App\Models\Packages::where('id',$receiver->requirement)->first() != null)
                                        <img src="{{uploaded_asset(App\Models\Packages::where('id',$receiver->requirement)->first()->image)}}" width="35px" style="border-radius: 50%; height: 35px;" alt="">
                                    @endif
                                @endif
                                <div class="text-block">
                                    <div class="name">
                                        @if($receiver->name_toggle == 'yes')
                                            {{$receiver->nick_name}}
                                        @else
                                            {{$receiver->name}}
                                        @endif
                                    </div>
                                    <div class="location">{{$receiver->city}} {{$receiver->country}}</div>
                                </div>
                            </div>
                            <div class="button-block">
                                <a href="{{route('frontend.user.mobile.view_profile_receiver',$receiver->id)}}" class="cta-link">View more</a>
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
@endif

@if(App\Models\Auth\User::where('id',auth()->user()->id)->first()->user_type == 'Donor')

    <section class="donate-list-section">
        <div class="mobile-container">
            <ul class="list-group">

            @if(count($receivers_for_donor) == 0)
                <section class="section-no-data">
                    <div class="mobile-container">
                        <div class="inner-wrapper">
                            <img src="{{url('images/not-found.png')}}" alt="">
                            <div class="text">No data found</div>
                        </div>
                    </div>
                </section>
            @else
                @foreach($receivers_for_donor as $key => $receivers_for_don)
                    @if(App\Models\Auth\User::where('id',$receivers_for_don->assigned_agent)->first() != null)
                        <li class="list-group-item">
                            <div class="receiver">
                                <div class="content-block">
                                    @if($receivers_for_don->requirement == 'Other')
                                        <div class="icon blue">O</div>
                                    @else
                                        @if(App\Models\Packages::where('id',$receivers_for_don->requirement)->first() != null)
                                            <img src="{{uploaded_asset(App\Models\Packages::where('id',$receivers_for_don->requirement)->first()->image)}}" width="35px" style="border-radius: 50%; height: 35px;" alt="">
                                        @endif
                                    @endif
                                    <div class="text-block">
                                        <div class="name">
                                            @if($receivers_for_don->name_toggle == 'yes')
                                                {{$receivers_for_don->nick_name}}
                                            @else
                                                {{$receivers_for_don->name}}
                                            @endif
                                        </div>                                   
                                        <div class="location">{{$receivers_for_don->city}} {{$receivers_for_don->country}}</div>
                                    </div>
                                </div>
                                <div class="button-block">
                                    <a href="{{route('frontend.user.mobile.donation_info',$receivers_for_don->id)}}" class="cta-btn btn-fill">
                                        <div class="btn-text">Donate</div>
                                    </a>
                                    <a href="{{route('frontend.user.mobile.view_profile_receiver',$receivers_for_don->id)}}" class="cta-link">View more</a>
                                </div>
                            </div>
                        </li>
                    @endif
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

@endif



@endsection

@push('after-scripts')

@endpush
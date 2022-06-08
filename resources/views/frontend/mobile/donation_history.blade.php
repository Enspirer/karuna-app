@extends('frontend.layouts.mobile_app')

@section('title', app_name() . ' | ' . __('navs.general.home'))

@section('content')

<!-- ======== Top Nav ======== -->
<section class="app-bar-section">
    <div class="mobile-container">
        <div class="inner-wrapper">
            <!-- <a href="{{route('frontend.user.mobile.profile_menu')}}" class="back-btn"> -->
            <a href="{{route('frontend.user.mobile.index')}}" class="back-btn">
                <i class="fa-solid fa-arrow-left"></i>
            </a>
            <div class="title">Donation History</div>
        </div>
    </div>
</section>
<!-- ======== Top Nav End ======== -->

<section class="donation-history-section">
    <div class="mobile-container">
        <div class="accordion" id="donationHistory">

            @if(count(App\Models\Receivers::where('donor_id',auth()->user()->id)->get()) == 0)
                <section class="section-no-data">
                    <div class="mobile-container">
                        <div class="inner-wrapper">
                            <img src="{{url('images/not-found.png')}}" alt="">
                            <div class="text">No data foud</div>
                        </div>
                    </div>
                </section>
            @else
                @foreach(App\Models\Receivers::where('donor_id',auth()->user()->id)->orderBy('id','desc')->get() as $key => $donation)
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="donationHead{{$donation->id}}">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#donation{{$donation->id}}" aria-expanded="true" aria-controls="donation1">
                            <div class="header-block">
                                <div class="no">{{$key + 1}}</div>
                                <div class="text">
                                    @if($donation->name_toggle == 'yes')
                                        {{$donation->nick_name}}'s Packages
                                    @else
                                        {{$donation->name}}'s Packages
                                    @endif
                                </div>
                            </div>
                        </button>
                        </h2>
                        <div id="donation{{$donation->id}}" class="accordion-collapse collapse" aria-labelledby="donationHead{{$donation->id}}" data-bs-parent="#donationHistory">
                            <div class="accordion-body">
                                <div class="row g-0">
                                    <div class="col-6">
                                        <label>Agent Name</label>
                                        <div class="text">{{App\Models\Auth\User::where('id',$donation->assigned_agent)->first()->first_name}} {{App\Models\Auth\User::where('id',$donation->assigned_agent)->first()->last_name}}</div>
                                    </div>
                                    <div class="col-6">
                                        <label>Package</label>
                                        @if($donation->requirement == 'Other')
                                            <div class="text">Other</div>
                                        @else
                                            @if(App\Models\Packages::where('id',$donation->requirement)->first() != null)
                                                <div class="text">{{App\Models\Packages::where('id',$donation->requirement)->first()->name}}</div>
                                            @endif
                                        @endif
                                    </div>
                                    <div class="col-6">
                                        <label>Receiver Name</label>
                                        @if($donation->name_toggle == 'yes')
                                            <div class="text">{{$donation->nick_name}}</div>
                                        @else
                                            <div class="text">{{$donation->name}}</div>
                                        @endif
                                    </div>
                                    <div class="col-6">
                                        <label>Donation Status</label>
                                        @if($donation->status == 'Task Success')
                                            <div class="text completed"><i class="bi bi-check-circle-fill"></i> Task Success</div>
                                        @else
                                            <div class="text completed">{{$donation->status}}</div>
                                        @endif
                                    </div>
                                    <div class="col-6">
                                        <label>Date</label>
                                        <div class="text">{{ $donation->created_at->format('d M Y') }}</div>
                                    </div>
                                    <div class="col-6">
                                        <label>Amount</label>
                                        <div class="text">USD {{$donation->amount}}</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            @endif
            
        </div>
</section>

@endsection

@push('after-scripts')

@endpush
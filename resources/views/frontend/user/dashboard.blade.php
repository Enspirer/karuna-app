@extends('frontend.layouts.dashboard_app')

@section('title', app_name() . ' | ' . __('navs.general.home'))

@section('content')

<!-- <div class="row mb-4">
    <div class="col">
        <div class="card">
            <div class="card-header">
                <strong>
                    <i class="fas fa-tachometer-alt"></i> @lang('navs.frontend.dashboard')
                </strong>
            </div>

            <div class="card-body">
                <div class="row">
                    <div class="col col-sm-4 order-1 order-sm-2  mb-4">
                        <div class="card mb-4 bg-light">
                            <img class="card-img-top" src="{{ $logged_in_user->picture }}" alt="Profile Picture">

                            <div class="card-body">
                                <h4 class="card-title">
                                    {{ $logged_in_user->name }}<br/>
                                </h4>

                                <p class="card-text">
                                    <small>
                                        <i class="fas fa-envelope"></i> {{ $logged_in_user->email }}<br/>
                                        <i class="fas fa-calendar-check"></i> @lang('strings.frontend.general.joined') {{ timezone()->convertToLocal($logged_in_user->created_at, 'F jS, Y') }}
                                    </small>
                                </p>

                                <p class="card-text">

                                    <a href="{{ route('frontend.user.account')}}" class="btn btn-info btn-sm mb-1">
                                        <i class="fas fa-user-circle"></i> @lang('navs.frontend.user.account')
                                    </a>

                                    @can('view backend')
                                        &nbsp;<a href="{{ route('admin.dashboard')}}" class="btn btn-danger btn-sm mb-1">
                                            <i class="fas fa-user-secret"></i> @lang('navs.frontend.user.administration')
                                        </a>
                                    @endcan
                                </p>
                            </div>
                        </div>

                        <div class="card mb-4">
                            <div class="card-header">Header</div>
                            <div class="card-body">
                                <h4 class="card-title">Info card title</h4>
                                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-8 order-2 order-sm-1">
                        <div class="row">
                            <div class="col">
                                <div class="card mb-4">
                                    <div class="card-header">
                                        Item
                                    </div>

                                    <div class="card-body">
                                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Non qui facilis deleniti expedita fuga ipsum numquam aperiam itaque cum maxime.
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col">
                                <div class="card mb-4">
                                    <div class="card-header">
                                        Item
                                    </div>

                                    <div class="card-body">
                                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Non qui facilis deleniti expedita fuga ipsum numquam aperiam itaque cum maxime.
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col">
                                <div class="card mb-4">
                                    <div class="card-header">
                                        Item
                                    </div>

                                    <div class="card-body">
                                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Non qui facilis deleniti expedita fuga ipsum numquam aperiam itaque cum maxime.
                                    </div>
                                </div>
                            </div>

                            <div class="col">
                                <div class="card mb-4">
                                    <div class="card-header">
                                        Item
                                    </div>

                                    <div class="card-body">
                                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Non qui facilis deleniti expedita fuga ipsum numquam aperiam itaque cum maxime.
                                    </div>
                                </div>
                            </div>

                            <div class="w-100"></div>

                            <div class="col">
                                <div class="card mb-4">
                                    <div class="card-header">
                                        Item
                                    </div>

                                    <div class="card-body">
                                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Non qui facilis deleniti expedita fuga ipsum numquam aperiam itaque cum maxime.
                                    </div>
                                </div>
                            </div>

                            <div class="col">
                                <div class="card mb-4">
                                    <div class="card-header">
                                        Item
                                    </div>

                                    <div class="card-body">
                                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Non qui facilis deleniti expedita fuga ipsum numquam aperiam itaque cum maxime.
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> -->

@if(App\Models\Auth\User::where('id',auth()->user()->id)->first()->user_type == 'Agent')
<div class="table-container">
    <table class="db-table receiver-table">
        <thead>
            <tr class="db-tr">
                <th class="db-th"></th>
                <th class="db-th">Name</th>
                <th class="db-th">Age</th>
                <th class="db-th">Address</th>
                <th class="db-th">Requirement</th>
                <th class="db-th">Status</th>
            </tr>
        </thead>
        <tbody>

        @if(count(App\Models\Receivers::where('assigned_agent',auth()->user()->id)->get()) == 0)
			@include('frontend.includes.not_found',[
				'not_found_title' => 'No any receivers found',
				'not_found_description' => null,
				'not_found_button_caption' => null
			])
        @else
            @foreach(App\Models\Receivers::where('assigned_agent',auth()->user()->id)->orderBy('id','desc')->get() as $key => $receiver)
                <tr class="db-tr clickable-tr" data-href="{{route('frontend.user.dashboard.receiver',$receiver->id)}}">
                    <td class="db-td">
                        <img src="{{url('images/landing-page/nav/profile.png')}}" alt="" class="db-timg">
                    </td>
                    <td class="db-td">
                        <div class="text">{{$receiver->name}}</div>
                    </td>
                    <td class="db-td">{{$receiver->age}}</td>
                    <td class="db-td">
                        <div class="text">{{$receiver->address}}</div>
                    </td>
                    <td class="db-td">
                        @if(App\Models\Packages::where('id',$receiver->requirement)->first() != null)
                            {{App\Models\Packages::where('id',$receiver->requirement)->first()->name}}
                        @else
                            Other
                        @endif
                    </td>
                    <td class="db-td">
                        <div class="status-block">
                            @if($receiver->status == 'Payment Transferred to Agent')
                                <div class="indicator green"></div>
                                <div class="status">{{$receiver->status}}</div>
                            @else
                                <div class="indicator orange"></div>
                                <div class="status">{{$receiver->status}}</div>
                            @endif
                        </div>
                    </td>
                </tr>
            @endforeach
		@endif



        </tbody>
    </table>
</div>
@endif


@if(App\Models\Auth\User::where('id',auth()->user()->id)->first()->user_type == 'Donor')

    @if(count(App\Models\Receivers::orderBy('id','desc')->where('donor_id',auth()->user()->id)->get()) == 0)
        @include('frontend.includes.not_found',[
            'not_found_title' => 'No any receivers found',
            'not_found_description' => null,
            'not_found_button_caption' => null
        ])
    @else
        <div class="table-container">
            <table class="db-table doner-table">
                <thead>
                    <tr class="db-tr">
                        <th class="db-th">Agent Name</th>
                        <th class="db-th">Receiver Name</th>
                        <th class="db-th">Date</th>
                        <th class="db-th">Package</th>
                        <th class="db-th">Donation Status</th>
                        <th class="db-th">Status</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach(App\Models\Receivers::orderBy('id','desc')->where('donor_id',auth()->user()->id)->get() as $key => $receiver)
                        <tr class="db-tr">
                            <td class="db-td">
                                @if(App\Models\Auth\User::where('id',$receiver->assigned_agent)->first() != null)
                                    <div class="text">{{App\Models\Auth\User::where('id',$receiver->assigned_agent)->first()->first_name}}
                                        {{App\Models\Auth\User::where('id',$receiver->assigned_agent)->first()->last_name}}</div>
                                @else
                                    <div class="text">Agent Not Found</div>
                                @endif
                            </td>
                            <td class="db-td">
                                <div class="text">{{$receiver->name}}</div>
                            </td>
                            <td class="db-td">{{$receiver->created_at}}</td>
                            <td class="db-td">
                                @if(App\Models\Packages::where('id',$receiver->requirement)->first() != null)
                                    <div class="">{{App\Models\Packages::where('id',$receiver->requirement)->first()->name}}</div>
                                    <!-- <div class="package medicine"> -->
                                @else
                                    Other
                                @endif
                            </td>
                            <td class="db-td">
                                <div class="status-block">
                                    <i class="bi completed bi-check-circle-fill"></i>
                                    <div class="status">{{$receiver->payment_status}}</div>
                                    <!-- <i class="bi pending bi-exclamation-circle-fill"></i>
                                    <div class="status">Pending</div> -->
                                </div>
                            </td>
                            <td class="db-td">
                                <div class="status-block">
                                    @if($receiver->status == 'Payment Transferred to Agent')
                                        <i class="bi completed bi-check-circle-fill"></i>
                                        <div class="status">{{$receiver->status}}</div>
                                    @else
                                        <i class="bi pending bi-exclamation-circle-fill"></i>
                                        <div class="status">{{$receiver->status}}</div>
                                    @endif
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

    @endif

@endif

@if(App\Models\Auth\User::where('id',auth()->user()->id)->first()->user_type == 'Receiver')

<section class="receiver-dashboard-section">
    <div class="accordion">
        <div class="accordion-item">
            <h2 class="accordion-header">
            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#pendingReq" aria-expanded="true" aria-controls="pendingReq">
                <div class="header-block">
                    <div class="no">1</div>
                    <div class="text">Pending Request</div>
                    <div class="indicator orange"></div>
                </div>
            </button>
            </h2>
            <div id="pendingReq" class="accordion-collapse collapse show">
            <div class="accordion-body">
                <div class="title">Description</div>
                <div class="text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Fugiat soluta iusto exercitationem aliquam alias aliquid, voluptatum quibusdam, ex fugit illum est praesentium reprehenderit laudantium deserunt! Hic quia numquam atque necessitatibus.</div>
            </div>
            </div>
        </div>
        <div class="accordion-item">
            <h2 class="accordion-header">
            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#approvedReq" aria-expanded="true" aria-controls="approvedReq">
                <div class="header-block">
                    <div class="no">2</div>
                    <div class="text">Approved Request</div>
                    <div class="indicator green"></div>
                </div>
            </button>
            </h2>
            <div id="approvedReq" class="accordion-collapse collapse">
            <div class="accordion-body">
                <div class="title">Description</div>
                <div class="text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Fugiat soluta iusto exercitationem aliquam alias aliquid, voluptatum quibusdam, ex fugit illum est praesentium reprehenderit laudantium deserunt! Hic quia numquam atque necessitatibus.</div>
            </div>
            </div>
        </div>
        <div class="accordion-item">
            <h2 class="accordion-header">
            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#cancelReq" aria-expanded="true" aria-controls="cancelReq">
                <div class="header-block">
                    <div class="no">3</div>
                    <div class="text">Canceled  Request</div>
                    <div class="indicator red"></div>
                </div>
            </button>
            </h2>
            <div id="cancelReq" class="accordion-collapse collapse">
            <div class="accordion-body">
                <div class="title">Description</div>
                <div class="text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Fugiat soluta iusto exercitationem aliquam alias aliquid, voluptatum quibusdam, ex fugit illum est praesentium reprehenderit laudantium deserunt! Hic quia numquam atque necessitatibus.</div>
            </div>
            </div>
        </div>
    </div>
</section>
@endif


@endsection

@push('after-scripts')

@endpush

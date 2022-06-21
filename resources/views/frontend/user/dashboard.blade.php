@extends('frontend.layouts.dashboard_app')

@section('title', app_name() . ' | ' . 'Dashboard')

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

@if(auth()->user()->user_type == 'Agent')
    <div class="header-button-block">
        <a href="{{url('dashboard/index')}}" class="nav-btn {{Request::segment(2)=='index' ? 'active' :null }}">
            <div class="btn-text">My Receivers</div>
        </a>
        <a href="{{route('frontend.user.dashboard.receiver_request_list')}}" class="nav-btn {{Request::segment(2)=='receiver-request-list' ? 'active' :null }}">
            <div class="btn-text">Receivers Request</div>
            <div class="status">{{App\Models\ReceiversRequest::where('assigned_agent',auth()->user()->id)->count()}}</div>
        </a>
    </div>
@else

@endif

@if(App\Models\Auth\User::where('id',auth()->user()->id)->first()->user_type == 'Agent')
<div class="table-container">
    @if(count(App\Models\Receivers::where('assigned_agent',auth()->user()->id)->get()) == 0)
        @include('frontend.includes.not_found',[
            'not_found_title' => 'No any receivers found',
            'not_found_description' => null,
            'not_found_button_caption' => null
        ])
    @else
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
    @foreach(App\Models\Receivers::where('assigned_agent',auth()->user()->id)->orderBy('id','desc')->get() as $key => $receiver)
            <tr class="db-tr clickable-tr" data-href="{{route('frontend.user.dashboard.receiver',$receiver->id)}}">
                <td class="db-td">
                    @if($receiver->profile_image)
                        <img src="{{uploaded_asset($receiver->profile_image)}}" alt="" class="db-timg">

                    @else
                        <img src="{{url('images/landing-page/nav/profile.png')}}" alt="" class="db-timg">

                    @endif
                </td>
                <td class="db-td">
                    @if($receiver->name_toggle == 'yes')
                        <div class="text">{{$receiver->nick_name}}</div>
                    @else
                        <div class="text">{{$receiver->name}}</div>
                    @endif
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
                        @if($receiver->status == 'Task Success')
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
<div class="table-container">
        @if(count(App\Models\Receivers::orderBy('id','desc')->where('donor_id',auth()->user()->id)->get()) == 0)
            @include('frontend.includes.not_found',[
                'not_found_title' => 'No any receivers found',
                'not_found_description' => null,
                'not_found_button_caption' => null
            ])
        @else        
    <table class="db-table doner-table">
        <thead>
            <tr class="db-tr">
                <th class="db-th">Volunteer Name</th>
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
                        <div class="text">Volunteer Not Found</div>
                    @endif
                </td>
                <td class="db-td">
                    @if($receiver->name_toggle == 'yes')
                        <div class="text">{{$receiver->nick_name}}</div>
                    @else
                        <div class="text">{{$receiver->name}}</div>
                    @endif
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
                        @if($receiver->status == 'Task Success')
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
        @endif
        </tbody>
    </table>
</div>   
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

@if(auth()->user()->nic_number == null || auth()->user()->id_photo == null)
    @if(auth()->user()->user_type == 'Agent')
        <!-- NIC modal -->
        <div class="modal fade nic-modal" id="nicModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="nicModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <div class="title">Update NIC Details</div>
                        <p>Please enter your NIC details to continue</p>
                    </div>
                    <form action="{{route('frontend.user.update_nic_details')}}" method="post" enctype="multipart/form-data">
                    {{csrf_field()}}
                        <div class="modal-body">
                            <div class="row g-3">
                                <div class="col-12">
                                    <label for="nic_no" class="form-label">NIC Number</label>
                                    <input type="text" class="form-control" value="{{auth()->user()->nic_number}}" name="nic_number" id="nic_number" required>
                                </div>
                                <div class="col-12">
                                    <label for="nic_img" class="form-label">NIC Photo</label>
                                    <div class="input-group">
                                        @if(auth()->user()->id_photo != null)
                                            <div class="row">
                                                <div class="col-10">
                                                    <input type="file" class="form-control" name="id_photo" id="id_photo" accept="image/png, image/jpeg"  multiple="multiple" required>
                                                </div>
                                                <div class="col-2">
                                                    <img src="{{url('files/agents_id/',auth()->user()->id_photo)}}" style="width: 100%;" alt="" >
                                                </div>
                                            </div>
                                        @else
                                            <input type="file" class="form-control" name="id_photo" id="id_photo" accept="image/png, image/jpeg"  multiple="multiple" required>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <div class="row">
                                <div class="col-12">
                                    <button type="submit" class="cta-btn btn-fill">
                                        <div class="btn-text">Submit</div>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endif
@endif


@if(\Session::has('success_nic'))

<div class="modal fade form-submit-modal" id="overlay" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog" style="width: 90%; max-width: 600px; margin: 0; top: 50%; left: 50%; transform: translate(-50%, -50%) !important;">
        <div class="modal-content" style="background: linear-gradient(60deg, #E4F2FB, #9ACDFF); border: 2px solid #0C75FF; border-radius: 15px;">
            <div class="modal-body" style="display: flex; flex-direction: row; align-items: center; justify-content: center; gap: 30px;">
                <i class="bi bi-x-lg" data-bs-dismiss="modal" style="position: absolute; top: 5px; right: 5px; color: #fff; font-size: 16px; background-color: rgba(255, 255, 255, 0.5); width: 35px; height: 35px; border-radius: 50%; display: flex; flex-direction: row; justify-content: center; align-items: center; backdrop-filter: blur(5px);"></i>
                <!-- <div class="image-block">
                    <img src="{{url('images/success.png')}}" alt="">
                </div> -->
                <div class="content-block">
                    <div class="title" style="font-size: 40px; color: #0C75FF; font-weight: 400; margin-bottom: 10px;">Success !</div>
                    <p class="text" style="font-size: 16px; ont-weight 300; margin: 0; color: #333;">Submitted Successfully.</p>
                </div>
            </div>
        </div>
    </div>
</div>

@endif

@endsection

@push('after-scripts')

<script>
    $(window).on('load', function () {
        $('#nicModal').modal('show');
    });
    $("#close-btn").click(function () {
        $('#nicModal').modal('hide');
    });
</script>


<script>
    $(window).on('load', function () {
        $('#overlay').modal('show');
    });
    $("#close-btn").click(function () {
        $('#overlay').modal('hide');
    });
</script>

@endpush

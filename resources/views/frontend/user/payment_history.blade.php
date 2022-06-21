@extends('frontend.layouts.dashboard_app')

@section('title', app_name() . ' | ' . 'Payment History')

@section('content')



@if(App\Models\Auth\User::where('id',auth()->user()->id)->first()->user_type == 'Agent')

    @if(count(App\Models\Receivers::orderBy('id','desc')->where('donor_id','!=',null)->where('assigned_agent',auth()->user()->id)->get()) == 0)
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
                        <th class="db-th">Volunteer Name</th>
                        <th class="db-th">Receiver Name</th>
                        <th class="db-th">Date</th>
                        <th class="db-th">Package</th>
                        <th class="db-th">Donation Status</th>
                        <th class="db-th">Status</th>
                        <th class="db-th"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach(App\Models\Receivers::orderBy('id','desc')->where('donor_id','!=',null)->where('assigned_agent',auth()->user()->id)->get() as $key => $receiver)
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
                            <td class="db-td">
                                <a href="#" class="cta-btn btn-outline" data-bs-toggle="modal" data-bs-target="#paymentInfoModal{{$receiver->id}}">
                                    <div class="btn-text">View Donation</div>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

    @endif

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
                        <th class="db-th">Volunteer Name</th>
                        <th class="db-th">Receiver Name</th>
                        <th class="db-th">Date</th>
                        <th class="db-th">Package</th>
                        <th class="db-th">Donation Status</th>
                        <th class="db-th">Status</th>
                        <th class="db-th"></th>
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
                                    @if($receiver->status == 'Payment Transferred to Agent')
                                        <i class="bi completed bi-check-circle-fill"></i>
                                        <div class="status">{{$receiver->status}}</div>
                                    @else
                                        <i class="bi pending bi-exclamation-circle-fill"></i>
                                        <div class="status">{{$receiver->status}}</div>
                                    @endif
                                </div>
                            </td>
                            <td class="db-td">
                                <a href="{{route('frontend.receiver_profile',$receiver->id)}}" class="cta-btn btn-outline">
                                    <div class="btn-text">View Donation</div>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

    @endif

@endif



@if(App\Models\Auth\User::where('id',auth()->user()->id)->first()->user_type == 'Agent')
    @if(count(App\Models\Receivers::orderBy('id','desc')->where('assigned_agent',auth()->user()->id)->get()) != 0)
        @foreach(App\Models\Receivers::orderBy('id','desc')->where('assigned_agent',auth()->user()->id)->where('payment_status','Payment Completed')->get() as $key => $receiver)

            <!-- Payment Info Modal -->
            <div class="modal fade payment-info-modal" id="paymentInfoModal{{$receiver->id}}" tabindex="-1" aria-labelledby="paymentInfoModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg modal-dialog-centered">
                    <div class="modal-content">
                    <div class="modal-header">
                        <div class="image-block">
                            <img src="{{url('images/dashboard/modal-header.png')}}" alt="">
                        </div>
                        <div class="title-block">
                            <div class="title">Thank you for your support</div>
                            <div class="text">Transaction successfully processed and you will be notified when the your parcel is received to volunteer or receiver</div>
                        </div>
                        <i class="bi bi-x" data-bs-dismiss="modal" aria-label="Close"></i>
                    </div>
                    <div class="modal-body">
                        <table class="payment-info-table">
                            <tbody>
                                <tr>
                                    <td>
                                        <div class="text">NI2345627245</div>
                                    </td>
                                    <td>
                                        <div class="text text-right">Date:</div>
                                    </td>
                                    <td>
                                        <div class="text max-width">{{ $receiver->created_at->format('M d Y') }}</div>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2" class="border-bottom">
                                        <div class="header">Donation Details</div>
                                    </td>
                                    <td colspan="2" class="border-bottom mobile-hide">
                                        <div class="header text-right">Price</div>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="border-bottom mobile-border-none">
                                        <div class="image-block">
                                            @if($receiver->profile_image)
                                                <img src="{{uploaded_asset($receiver->profile_image)}}" alt="">

                                            @else
                                                <img src="{{url('images/landing-page/nav/profile.png')}}" alt="">

                                            @endif
                                        </div>
                                    </td>
                                    <td colspan="2" class="border-bottom mobile-border-none py-3">
                                        <div class="title">Receiver</div>
                                        @if($receiver->name_toggle == 'yes')
                                            <div class="name">{{$receiver->nick_name}}</div>
                                        @else
                                            <div class="name">{{$receiver->name}}</div>
                                        @endif
                                        <div class="info">{{$receiver->about_donation}}</div>
                                        <div class="cat">
                                            @if($receiver->requirement == 'Other')
                                                {{$receiver->requirement}}
                                            @else
                                                @if(App\Models\Packages::where('id',$receiver->requirement)->first() != null)
                                                    {{App\Models\Packages::where('id',$receiver->requirement)->first()->name}}
                                                @endif
                                            @endif
                                        </div>
                                    </td>
                                    <td class="border-bottom mobile-border-none">
                                        <div class="text gray text-right">USD {{$receiver->amount}}</div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="text">Donation Status :</div>
                                    </td>
                                    <td>
                                        <div class="text green">{{$receiver->status}}</div>
                                    </td>
                                    <td>
                                        <div class="text">Other</div>
                                    </td>
                                    <td>
                                        <div class="text gray text-right">-</div>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2" class="border-bottom mobile-border-none"></td>
                                    <td class="border-bottom mobile-border-none">
                                        <div class="text">Total Donation</div>
                                    </td>
                                    <td class="border-bottom">
                                        <div class="text text-right">USD {{$receiver->amount}}</div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="modal-footer">
                        <div class="text-block">
                            <div class="title">Receiver</div>
                            @if($receiver->name_toggle == 'yes')
                                <div class="name">{{$receiver->nick_name}}</div>
                            @else
                                <div class="name">{{$receiver->name}}</div>
                            @endif
                            <div class="text">{{$receiver->about_donation}}</div>
                        </div>

                        @if(auth()->user()->user_type == 'Agent')

                        @else
                            <a href="#" class="cta-btn btn-fill">
                                <div class="btn-text">Contact Volunteer</div>
                            </a>
                        @endif

                    </div>
                    </div>
                </div>
            </div>


        @endforeach
    @endif
@endif




@endsection

@push('after-scripts')

@endpush
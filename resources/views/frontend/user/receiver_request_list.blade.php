@extends('frontend.layouts.dashboard_app')

@section('title', app_name() . ' | ' . 'Receiver Requests')

@section('content')

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

<div class="table-container">            
                @if(count(App\Models\ReceiversRequest::where('assigned_agent',auth()->user()->id)->get()) == 0)
                    @include('frontend.includes.not_found',[
                        'not_found_title' => 'No any request found',
                        'not_found_description' => null,
                        'not_found_button_caption' => null
                    ])
                @else
    <table class="db-table receiver-list-table">
        <thead>
            <tr class="db-tr">
                <th class="db-th"></th>
                <th class="db-th">Name</th>
                <th class="db-th">Request</th>
                <th class="db-th">View</th>
                <th class="db-th">Status</th>
            </tr>
        </thead>
        <tbody>
                @foreach(App\Models\ReceiversRequest::where('assigned_agent',auth()->user()->id)->orderBy('id','desc')->get() as $key => $receiver)
                    <tr class="db-tr">
                        <td class="db-td">
                            @if($receiver->profile_image == null)
                                <img src="{{url('images/landing-page/nav/profile.png')}}" alt="">
                            @else
                                <img src="{{uploaded_asset($receiver->profile_image)}}" alt="" style="width:110px;">
                            @endif
                        </td>
                        <td class="db-td">
                            @if($receiver->name_toggle == 'yes')
                                <div class="text">{{$receiver->nick_name}}</div>
                            @else
                                <div class="text">{{$receiver->name}}</div>
                            @endif
                        </td>
                        <td class="db-td">
                            <div class="text">{{$receiver->request}}</div>
                        </td>
                        <td class="db-td">
                            <a href="{{route('frontend.user.dashboard.receiver_request',$receiver->id)}}" class="db-tlink">View Changes</a>
                        </td>

                        @if($receiver->status != 'Approved')
                            <td class="db-td">
                            <form action="{{route('frontend.user.receiver_request_update')}}" method="post" enctype="multipart/form-data">
                            {{csrf_field()}}
                                <select class="form-select" name="status" onchange="this.form.submit()">
                                    <option selected disabled>Pending...</option>
                                    <option value="Approved" {{$receiver->status == 'Approved' ? "selected" : ""}}>Approve</option>
                                    <option value="Cancel" {{$receiver->status == 'Cancel' ? "selected" : ""}}>Cancel</option>
                                </select>
                                <input type="hidden" name="hidden_id" value="{{$receiver->id}}">
                            </td>
                        @else
                            <td class="db-td">
                                <div class="text">{{$receiver->status}}</div>
                            </td>
                        @endif

                    </tr>
                @endforeach
            @endif                      
           
        </tbody>
    </table>
</div>

@endsection

@push('after-scripts')

@endpush
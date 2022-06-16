@extends('backend.layouts.app')

@section('title', __('Status'))

@section('content')
    <form action="{{route('admin.donate_notification.update')}}" method="post" enctype="multipart/form-data">
        {{csrf_field()}}

        <div class="row">    
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">                            
                      
                        <table class="table table-hover table-borderless">
                            <tbody>
                                <tr>
                                    <td width="24%" style="font-weight: 600; font-size:16px;">Receiver Name:</td>
                                    <td style="font-size:16px;">{{ $receiver->name }}</td>
                                </tr>
                                <tr>
                                    <td style="font-weight: 600; font-size:16px;">Amount:</td>
                                    <td style="font-size:16px;">{{ $receiver->amount }}</td>
                                </tr>
                                <tr>
                                    <td style="font-weight: 600; font-size:16px;">Paid At:</td>
                                    <td style="font-size:16px;">{{ $receiver->paid_at }}</td>
                                </tr>
                                <tr>
                                    <td style="font-weight: 600; font-size:16px;">Age:</td>
                                    <td style="font-size:16px;">{{ $receiver->age }}</td>
                                </tr>
                                <tr>
                                    <td style="font-weight: 600; font-size:16px;">Country:</td>
                                    <td style="font-size:16px;">{{ $receiver->country }}</td>
                                </tr>
                                <tr>
                                    <td style="font-weight: 600; font-size:16px;">City:</td>
                                    <td style="font-size:16px;">{{ $receiver->city }}</td>
                                </tr>
                                @if(App\Models\Auth\User::where('id',$receiver->donor_id)->first() != null)
                                    <tr>
                                        <td style="font-weight: 600; font-size:16px;">Donor Name:</td>
                                        <td style="font-size:16px;">{{ App\Models\Auth\User::where('id',$receiver->donor_id)->first()->first_name }} {{ App\Models\Auth\User::where('id',$receiver->donor_id)->first()->last_name }}</td>
                                    </tr>
                                @endif
                                @if(App\Models\Auth\User::where('id',$receiver->assigned_agent)->first() != null)
                                    <tr>
                                        <td style="font-weight: 600; font-size:16px;">Agent Name:</td>
                                        <td style="font-size:16px;">{{ App\Models\Auth\User::where('id',$receiver->assigned_agent)->first()->first_name }} {{ App\Models\Auth\User::where('id',$receiver->assigned_agent)->first()->last_name }}</td>
                                    </tr>
                                @endif
                            </tbody>                                            
                        </table>

                            
                    </div>
                </div>

              

            </div><br> 

            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">    
                                             
                        <div class="form-group p-2">
                            <label>Status <span style="color:red">*<span></label>
                            <select class="form-control custom-select" name="status" required>
                                <option value="Approved" {{$receiver->status == 'Not transferred' ? "selected":"" }}>Not transferred</option>   
                                <option value="Payment Transferred to Agent" {{$receiver->status == 'Payment Transferred to Agent' ? "selected":"" }}>Payment Transferred to Volunteer</option>                                
                            </select>
                        </div>
                            
                    </div>
                </div>

                <div class="mt-5 text-right">
                    <input type="hidden" name="hidden_id" value="{{ $receiver->id }}"/>
                    <a href="{{route('admin.donate_notification.index')}}" type="button" class="btn rounded-pill px-4 py-2 me-2 btn-warning">Back</a>    
                    <input type="submit" class="btn rounded-pill text-light px-4 py-2 ml-2 ms-2 btn-success" value="Update" />
                </div>

            </div><br> 
    
        </div>

    </form>

    
<br><br>
@endsection

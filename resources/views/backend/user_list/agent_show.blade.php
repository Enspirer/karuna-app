@extends('backend.layouts.app')

@section('title', __('Show'))

@section('content')
    
    
        <div class="row">
            <div class="col-6 p-1">
                <div class="card">
                    <div class="card-body">
                        <div class="" style="border-style: ridge;border-width: 3px;padding: 20px;">
                        
                            <table class="table table-hover table-borderless">
                                <tbody>
                                    <tr>
                                        <td width="14%" style="font-weight: 600; font-size:16px;">Name:</td>
                                        <td style="font-size:16px;">{{ $agent->first_name }} {{ $agent->last_name }}</td>
                                    </tr>
                                    <tr>
                                        <td width="14%" style="font-weight: 600; font-size:16px;">Email:</td>
                                        <td style="font-size:16px;">{{ $agent->email }}</td>
                                    </tr>
                                    <tr>
                                        <td style="font-weight: 600; font-size:16px;">Country:</td>
                                        <td style="font-size:16px;">{{ $agent->country }}</td>
                                    </tr>
                                    <tr>
                                        <td style="font-weight: 600; font-size:16px;">City:</td>
                                        <td style="font-size:16px;">{{ $agent->city }}</td>
                                    </tr>
                                    <tr>
                                        <td style="font-weight: 600; font-size:16px;">Contact Number:</td>
                                        <td style="font-size:16px;">{{ $agent->contact_number }} / {{ $agent->contact_number_two }}</td>
                                    </tr>
                                    <tr>
                                        <td style="font-weight: 600; font-size:16px;">Address:</td>
                                        <td style="font-size:16px;">{{ $agent->address }}</td>
                                    </tr>
                                    <tr>
                                        <td style="font-weight: 600; font-size:16px;">Occupation:</td>
                                        <td style="font-size:16px;">{{ $agent->occupation }}</td>
                                    </tr>
                                    <tr>
                                        <td style="font-weight: 600; font-size:16px;">NIC Number:</td>
                                        <td style="font-size:16px;">{{ $agent->nic_number }}</td>
                                    </tr>
                                </tbody>                                            
                            </table>                                                      
                            
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-6 p-1">
                <div class="card">
                    <div class="card-body">
                        <div class="" style="border-style: ridge;border-width: 3px;padding: 20px;">                            
                        
                            <form action="{{route('admin.agent_status.update')}}" method="post" enctype="multipart/form-data">
                            {{csrf_field()}}
                                <div class="form-group">
                                    <label>Status</label>
                                    <select class="form-control" name="confirmed" required>
                                        <option value="1" {{$agent->confirmed == '1' ? "selected" : ""}}>Enable</option>   
                                        <option value="0" {{$agent->confirmed == '0' ? "selected" : ""}}>Disable</option>                  
                                        
                                    </select>
                                </div>

                                <div class="row">
                                    <div class="col-6 mt-5 text-left">
                                        <a href="{{route('admin.agent.index')}}" type="button" class="btn rounded-pill text-light px-4 py-2 me-2 btn-primary">Back</a>
                                    </div>
                                    <div class="col-6 mt-5 text-right">
                                        <input type="hidden" name="hidden_id" value="{{$agent->id}}">
                                        <button type="submit" class="btn rounded-pill text-light px-4 py-2 me-2 btn-success">Submit</button>
                                    </div>
                                </div>
                            </form>
                            
                        </div>
                    </div>
                </div>
            </div>


        </div>
  

<br><br>
@endsection

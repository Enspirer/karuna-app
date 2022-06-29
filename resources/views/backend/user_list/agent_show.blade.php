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
                                    
                                    @if(App\Models\Country::where('id',$agent->country)->first() != null)
                                        <tr>
                                            <td style="font-weight: 600; font-size:16px;">Country:</td>
                                            <td style="font-size:16px;">{{App\Models\Country::where('id',$agent->country)->first()->name}}</td>
                                        </tr>
                                    @endif
                                    @if(App\Models\District::where('id',$agent->district)->first() != null)
                                        <tr>
                                            <td style="font-weight: 600; font-size:16px;">District:</td>
                                            <td style="font-size:16px;">{{App\Models\District::where('id',$agent->district)->first()->name}}</td>
                                        </tr>
                                    @endif
                                    @if(App\Models\City::where('id',$agent->city)->first() != null)
                                        <tr>
                                            <td style="font-weight: 600; font-size:16px;">City:</td>
                                            <td style="font-size:16px;">{{App\Models\City::where('id',$agent->city)->first()->name}}</td>
                                        </tr>
                                    @endif                                    
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
                                        @if($agent->nic_number == null)
                                            <td style="font-size:16px;"><span class="badge badge-warning">Not Set</span></td>
                                        @else
                                            <td style="font-size:16px;">{{ $agent->nic_number }}</td>
                                        @endif
                                    </tr>
                                    @if($agent->id_photo != null)
                                        <tr>
                                            <td style="font-weight: 600;">ID Photo:</td>
                                            <td><img src="{{url('files/agents_id/',$agent->id_photo)}}" style="width: 40%;" alt="" ></td>
                                        </tr>
                                    @endif
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
                        
                            <table class="table table-hover table-borderless">
                                <tbody>
                                    <h4 class="text-center">Volunteer ID</h4>
                                    <tr>
                                        <td width="40%" style="font-weight: 600; font-size:16px;">Referral Email:</td>
                                        <td style="font-size:16px;">{{ $agent->email }}</td>
                                    </tr>
                                    <tr>
                                        <td width="40%" style="font-weight: 600; font-size:16px;">Referral Volunteer Number:</td>
                                        <td style="font-size:16px;">{{ sprintf("%03d",$agent->agent_number) }}</td>
                                    </tr>
                                </tbody>                                            
                            </table>  
                            
                        </div>
                    </div>
                </div>

                @if($agent->referral_name != null)
                    <div class="card">
                        <div class="card-body">
                            <div class="" style="border-style: ridge;border-width: 3px;padding: 20px;">                            
                            
                                <table class="table table-hover table-borderless">
                                    <tbody>
                                        <h4 class="text-center">Volunteer Referral Details</h4>
                                        <tr>
                                            <td width="40%" style="font-weight: 600; font-size:16px;">Referral Email:</td>
                                            <td style="font-size:16px;">{{ $agent->referral_name }}</td>
                                        </tr>
                                        <tr>
                                            <td width="40%" style="font-weight: 600; font-size:16px;">Referral Volunteer Number:</td>
                                            <td style="font-size:16px;">{{  sprintf("%03d",$agent->referral_nic_number) }}</td>
                                        </tr>
                                    </tbody>                                            
                                </table>  
                                
                            </div>
                        </div>
                    </div>
                @endif

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

                                <div class="form-group">
                                    <label>Level</label>
                                    <select class="form-control" name="level" required>
                                        <option value="Level 1" {{$agent->level == 'Level 1' ? "selected" : ""}}>Level 1</option>   
                                        <option value="Level 2" {{$agent->level == 'Level 2' ? "selected" : ""}}>Level 2</option>               
                                        <option value="Level 3" {{$agent->level == 'Level 3' ? "selected" : ""}}>Level 3</option>               
                                        <option value="Level 4" {{$agent->level == 'Level 4' ? "selected" : ""}}>Level 4</option>
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

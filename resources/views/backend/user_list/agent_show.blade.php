@extends('backend.layouts.app')

@section('title', __('Show'))

@section('content')
    
    
        <div class="row">
            <div class="col-12 p-1">
                <div class="card">
                    <div class="card-body">
                        <div class="" style="border-style: ridge;border-width: 3px;padding: 20px;">

                            <div class="row">
                                        
                                <div class="row pe-0">
                                    <div class="col-12">
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

                            <div class="mt-5 text-right">
                                <a href="{{route('admin.agent.index')}}" type="button" class="btn rounded-pill text-light px-4 py-2 me-2 btn-primary">Back</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
  

<br><br>
@endsection

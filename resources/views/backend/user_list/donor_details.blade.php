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
                                        <td width="16%" style="font-weight: 600; font-size:16px;">Name:</td>
                                        <td style="font-size:16px;">{{ $donor_details->first_name }} {{ $donor_details->last_name }}</td>
                                    </tr>
                                    <tr>
                                        <td width="16%" style="font-weight: 600; font-size:16px;">Email:</td>
                                        <td style="font-size:16px;">
                                            <a href="mailto:{{$donor_details->email}}">{{ $donor_details->email }}</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td width="16%" style="font-weight: 600; font-size:16px;">User Type:</td>
                                        <td style="font-size:16px;">{{ $donor_details->user_type }}</td>
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
                        
                            <form action="{{route('admin.donor_status.update')}}" method="post" enctype="multipart/form-data">
                            {{csrf_field()}}
                                <div class="form-group">
                                    <label>Status</label>
                                    <select class="form-control" name="confirmed" required>
                                        <option value="1" {{$donor_details->confirmed == '1' ? "selected" : ""}}>Enable</option>   
                                        <option value="0" {{$donor_details->confirmed == '0' ? "selected" : ""}}>Disable</option>                  
                                        
                                    </select>
                                </div>

                                <div class="row">
                                    <div class="col-6 mt-5 text-left">
                                        <a href="{{route('admin.donor.index')}}" type="button" class="btn rounded-pill text-light px-4 py-2 me-2 btn-primary">Back</a>
                                    </div>
                                    <div class="col-6 mt-5 text-right">
                                        <input type="hidden" name="hidden_id" value="{{$donor_details->id}}">
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

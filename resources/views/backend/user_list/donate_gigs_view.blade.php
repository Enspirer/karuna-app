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
                                        <td width="14%" style="font-weight: 600; font-size:16px;">Title:</td>
                                        <td style="font-size:16px;">{{ $donate_gigs->title }}</td>
                                    </tr>
                                    <tr>
                                        <td width="14%" style="font-weight: 600; font-size:16px;">Description:</td>
                                        <td style="font-size:16px;">{{ $donate_gigs->description }}</td>
                                    </tr>
                                    <tr>
                                        <td width="14%" style="font-weight: 600; font-size:16px;">Fund:</td>
                                        <td style="font-size:16px;">{{ $donate_gigs->fund }}</td>
                                    </tr>
                                    <tr>
                                        <td width="14%" style="font-weight: 600; font-size:16px;">Otp Code:</td>
                                        <td style="font-size:16px;">{{ $donate_gigs->otp_code }}</td>
                                    </tr>
                                    <tr>
                                        <td width="14%" style="font-weight: 600; font-size:16px;">Thanks Message:</td>
                                        <td style="font-size:16px;">{{ $donate_gigs->thanks_message }}</td>
                                    </tr>
                                    <tr>
                                        <td width="14%" style="font-weight: 600; font-size:16px;">Is Paid:</td>
                                        <td style="font-size:16px;">{{ $donate_gigs->is_paid }}</td>
                                    </tr>
                                    <tr>
                                        <td width="14%" style="font-weight: 600; font-size:16px;">Status:</td>
                                        <td style="font-size:16px;">{{ $donate_gigs->status }}</td>
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
                        
                            <form action="{{route('admin.donate_gigs.update')}}" method="post" enctype="multipart/form-data">
                            {{csrf_field()}}
                                <div class="form-group">
                                    <label>Status</label>
                                    <select class="form-control" name="status" required>
                                        <option value="Approved" {{$donate_gigs->status == 'Approved' ? "selected" : ""}}>Approved</option>   
                                        <option value="Disapproved" {{$donate_gigs->status == 'Disapproved' ? "selected" : ""}}>Disapproved</option>                                
                                        <option value="Pending" {{$donate_gigs->status == 'Pending' ? "selected" : ""}}>Pending</option>                                
                                    </select>
                                </div>

                                <div class="row">
                                    <div class="col-6 mt-5 text-left">
                                        <a href="{{route('admin.donate_gigs',$agent->id)}}" type="button" class="btn rounded-pill text-light px-4 py-2 me-2 btn-primary">Back</a>
                                    </div>
                                    <div class="col-6 mt-5 text-right">
                                        <input type="hidden" name="hidden_id" value="{{$donate_gigs->id}}">
                                        <input type="hidden" name="hidden_agent_id" value="{{$agent->id}}">
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

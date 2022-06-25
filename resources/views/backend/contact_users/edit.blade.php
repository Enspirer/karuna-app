@extends('backend.layouts.app')

@section('title', __('Send Email'))

@section('content')
    
    <form action="{{route('admin.contact_users.update')}}" method="post" enctype="multipart/form-data">
        {{csrf_field()}}
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
                                                    <td width="14%" style="font-weight: 600; font-size:16px;">Volunteer Name:</td>
                                                    <td style="font-size:16px;">{{ App\Models\Auth\User::where('id',$contact_users->user_id)->first()->name }}</td>
                                                </tr>
                                                <tr>
                                                    <td width="14%" style="font-weight: 600; font-size:16px;">Email:</td>
                                                    <td style="font-size:16px;">{{ $contact_users->email }}</td>
                                                </tr>
                                                <tr>
                                                    <td style="font-weight: 600; font-size:16px;">Message:</td>
                                                    <td style="font-size:16px;">{{ $contact_users->message }}</td>
                                                </tr>
                                            </tbody>                                            
                                        </table>
                                    </div>                                            
                                            
                                </div>
                            </div>                            
                            
                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-body">
                        <div class="" style="border-style: ridge;border-width: 3px;padding: 20px;">
                            <div class="row">                                        
                                <div class="row pe-0">
                                    <div class="col-12">

                                        <div class="form-group">
                                            <label>Reply <span style="color:red">*</span></label>                                       
                                            <textarea class="form-control" name="reply" rows="6" required></textarea>
                                        </div>                                            
                                    </div>                                            
                                            
                                </div>
                            </div>                            

                            <div class="mt-5 text-right">
                                <input type="hidden" name="hidden_id" value="{{ $contact_users->id }}"/>
                                <input type="hidden" name="email" value="{{ $contact_users->email }}"/>
                                <a href="{{route('admin.contact_users.index')}}" type="button" class="btn rounded-pill text-light px-4 py-2 me-2 btn-primary">Back</a>
                                <input type="submit" class="btn rounded-pill text-light px-4 py-2 ms-2 btn-success" value="Send Email" />
                            </div>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
    </form>






<br><br>
@endsection

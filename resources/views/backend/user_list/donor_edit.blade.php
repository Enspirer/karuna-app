@extends('backend.layouts.app')

@section('title', __('Edit'))

@section('content')

<form action="{{route('admin.donor_update')}}" method="post" enctype="multipart/form-data">
{{csrf_field()}}

    <div class="row">    
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                        
                    <div class="form-group">
                        <label>First Name <span style="color:red">*</span></label>
                        <input type="text" class="form-control" value="{{$donor_edit->first_name}}" name="first_name" required>
                    </div>

                    <div class="form-group">
                        <label>Last Name <span style="color:red">*</span></label>
                        <input type="text" class="form-control" value="{{$donor_edit->last_name}}" name="last_name" required>
                    </div>

                    <div class="form-group">
                        <label>Email <span style="color:red">*</span></label>
                        <input type="email" class="form-control" name="email" value="{{$donor_edit->email}}" required>
                    </div>

                    <div class="form-group">
                        <label>Bio</label>
                        <textarea name="bio" id="bio" class="form-control" style="height:150px">{{$donor_edit->bio}}</textarea>
                    </div>

                    <div class="form-group">
                        <label>Profile Image</label>
                        <div class="input-group" data-toggle="aizuploader" data-type="image">
                            <div class="input-group-prepend">
                                <div class="input-group-text bg-soft-secondary font-weight-medium">Browse</div>
                            </div>
                            <div class="form-control file-amount">Choose File</div>
                            <input type="hidden" value="{{$donor_edit->profile_image}}" name="profile_image" class="selected-files" >
                        </div>
                        <div class="file-preview box sm">
                        </div>
                    </div> 

                </div>
            </div>

            <div class="mt-5 text-right">
                <input type="hidden" name="hidden_id" value="{{ $donor_edit->id }}"/>
                <a href="{{route('admin.donor.index')}}" type="button" class="btn rounded-pill px-4 py-2 me-2 btn-warning">Back</a>    
                <input type="submit" class="btn rounded-pill text-light px-4 py-2 ml-2 ms-2 btn-success" value="Update" />
            </div>

        </div><br> 
    
    </div>
  
     
</form>  

<br><br>
@endsection

@extends('backend.layouts.app')

@section('title', __('Edit'))

@section('content')

<form action="{{route('admin.package.update')}}" method="post" enctype="multipart/form-data">
{{csrf_field()}}


    <div class="row">
    
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                        
                    <div class="form-group">
                        <label>Name <span style="color:red">*</span></label>
                        <input type="text" class="form-control" value="{{$package->name}}" name="name" required>
                    </div>

                    <div class="form-group">
                        <label>Price <span style="color:red">*</span></label>
                        <input type="text" class="form-control" name="price" value="{{$package->price}}" required>
                    </div>

                    <div class="form-group">
                        <label>Image<span class="text-danger">*</span></label>
                        <div class="input-group" data-toggle="aizuploader" data-type="image">
                            <div class="input-group-prepend">
                                <div class="input-group-text bg-soft-secondary font-weight-medium">Browse</div>
                            </div>
                            <div class="form-control file-amount">Choose File</div>
                            <input type="hidden" value="{{$package->image}}" name="image" class="selected-files" >
                        </div>
                        <div class="file-preview box sm">
                        </div>
                    </div> 

                    <div class="form-group">
                        <label>Order <span style="color:red">*<span></label>
                        <input type="number" class="form-control" name="order" value="{{$package->order}}" required>
                    </div>

                    <div class="form-group">
                        <label>Status <span style="color:red">*<span></label>
                        <select class="form-control custom-select" name="status" required>
                            <option value="Enabled" {{$package->status == 'Enabled' ? "selected":"" }}>Enable</option>   
                            <option value="Disabled" {{$package->status == 'Disabled' ? "selected":"" }}>Disable</option>                                
                        </select>
                    </div>
                        
                </div>
            </div>

            <div class="mt-5 text-right">
                <input type="hidden" name="hidden_id" value="{{ $package->id }}"/>
                <a href="{{route('admin.package.index')}}" type="button" class="btn rounded-pill px-4 py-2 me-2 btn-warning">Back</a>    
                <input type="submit" class="btn rounded-pill text-light px-4 py-2 ml-2 ms-2 btn-success" value="Update" />
            </div>

        </div><br> 
    
    </div>
  
     
</form>
<br><br>

  


@endsection

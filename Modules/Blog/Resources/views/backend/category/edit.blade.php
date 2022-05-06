@extends('backend.layouts.app')

@section('title', __('Edit'))

@section('content')

<link rel="stylesheet" href="{{url('css/vendors.css')}}">

    <form action="{{route('admin.category.update')}}" method="post" enctype="multipart/form-data">
        {{csrf_field()}}
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        
                        <div class="form-group">
                            <label>Name <span style="color:red">*<span></label>
                            <input type="text" class="form-control" value="{{ $categories->name }}" id="name" name="name" required>
                        </div>    

                        <div class="form-group">
                            <label>Slug <span style="color:red">*<span></label>
                            <input type="text" class="form-control" value="{{ $categories->slug }}" name="slug" id="slug" required>
                        </div>

                        <div class="form-group">
                            <label>Description</label>
                            <textarea type="text" class="form-control" name="description" rows="2"> {{ $categories->description }} </textarea>
                        </div> 
                        
                        <div class="form-group">
                            <label>Image</label>
                            <div class="input-group" data-toggle="aizuploader" data-type="image">
                                <div class="input-group-prepend">
                                    <div class="input-group-text bg-soft-secondary font-weight-medium">Browse</div>
                                </div>
                                <div class="form-control file-amount">Choose File</div>
                                <input type="hidden" name="image" value="{{ $categories->image }}" class="selected-files" >
                            </div>
                            <div class="file-preview box sm">
                            </div>
                        </div> 

                        <div class="form-group">
                            <label>Status <span style="color:red">*<span></label>
                            <select class="form-control" name="status" required>
                                <option value="Enabled" {{ $categories->status == 'Enabled' ? "selected" : "" }}>Enable</option>   
                                <option value="Disabled" {{ $categories->status == 'Disabled' ? "selected" : "" }}>Disable</option>                                
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Order <span style="color:red">*<span></label>
                            <input type="text" class="form-control" name="order" value="{{ $categories->order }}" required>
                        </div>
                        
                    </div>
                </div>
                <input type="hidden" name="hidden_id" value="{{ $categories->id }}"/>
                <a href="{{route('admin.category.index')}}" class="btn btn-primary pull-right ml-4">Back</a>&nbsp;&nbsp;&nbsp;
                <button type="submit" class="btn btn-success pull-right">Update</button><br>
            </div><br>                       

        </div>

    </form>

<br><br>

<script>

	$("#name").keyup(function(){
    	var str = $(this).val();
    	var trims = $.trim(str)
    	var slug = trims.replace(/[^a-z0-9]/gi, '-').replace(/-+/g, '-').replace(/^-|-$/g, '')
    	$("#slug").val(slug.toLowerCase()) 
	});    

</script>


@endsection

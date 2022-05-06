@extends('backend.layouts.app')

@section('title', __('Create New'))

@section('content')

<link rel="stylesheet" href="{{url('css/vendors.css')}}">

    <form action="{{route('admin.category.store')}}" method="post" enctype="multipart/form-data">
        {{csrf_field()}}
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">

                        <div class="form-group">
                            <label>Name <span style="color:red">*<span></label>
                            <input type="text" class="form-control" id="name" name="name" required>
                        </div>     
                        
                        <div class="form-group">
                            <label>Slug <span style="color:red">*<span></label>
                            <input type="text" class="form-control" name="slug" id="slug" required>
                        </div>

                        <label>Description</label>
                        <textarea class="form-control" name="description" rows="2"></textarea>
                        <br>

                        <div class="form-group">
                            <label>Image</label>
                            <div class="input-group" data-toggle="aizuploader" data-type="image">
                                <div class="input-group-prepend">
                                    <div class="input-group-text bg-soft-secondary font-weight-medium">Browse</div>
                                </div>
                                <div class="form-control file-amount">Choose File</div>
                                <input type="hidden" name="image" class="selected-files" >
                            </div>
                            <div class="file-preview box sm">
                            </div>
                        </div> 
                        
                        <div class="form-group">
                            <label>Order <span style="color:red">*<span></label>
                            <input type="number" class="form-control" name="order" required>
                        </div>

                        <div class="form-group">
                            <label>Status <span style="color:red">*<span></label>
                            <select class="form-control" name="status" required>
                                <option value="Enabled">Enable</option>   
                                <option value="Disabled">Disable</option>                                
                            </select>
                        </div>

                    </div>
                </div>
                <button type="submit" class="btn btn-success pull-right">Create New Category</button><br>
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

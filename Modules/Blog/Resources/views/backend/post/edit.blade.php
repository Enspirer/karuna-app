@extends('backend.layouts.app')

@section('title', __('Edit'))

@section('content')

<link rel="stylesheet" href="{{url('css/vendors.css')}}">

<script src="https://cdn.ckeditor.com/ckeditor5/29.0.0/classic/ckeditor.js"></script>

    <form action="{{route('admin.post.update')}}" method="post" enctype="multipart/form-data">
        {{csrf_field()}}
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="form-group">
                            <label>Title <span style="color:red">*</span></label>
                            <input type="text" id="title" value="{{ $post->title }}" class="form-control" name="title" required>
                        </div>

                        <div class="form-group">
                            <label>Slug <span style="color:red">*<span></label>
                            <input type="text" class="form-control" value="{{ $post->slug }}" name="slug" id="slug" required>
                        </div>

                        <div class="form-group">
                            <label>Category <span style="color:red">*<span></label>
                            <select class="form-control" name="category" required>
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}" {{ $post->category == $category->id ? "selected" : ""}}>{{ $category->name }}</option>                    
                                @endforeach             
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Description <span style="color:red">*</span></label>
                            <textarea class="form-control" id="editor" name="description" rows="4">{!! $post->description !!}</textarea>
                        </div>
                        
                        <div class="form-group">
                            <label>Feature Image
                                <span class="text-danger">*</span>
                            </label>
                            <div class="input-group" data-toggle="aizuploader" data-type="image">
                                <div class="input-group-prepend">
                                    <div class="input-group-text bg-soft-secondary font-weight-medium">Browse</div>
                                </div>
                                <div class="form-control file-amount">Choose File</div>
                                <input type="hidden" name="feature_image" value="{{ $post->feature_image }}" class="selected-files" >
                            </div>
                            <div class="file-preview box sm">
                            </div>
                        </div> 

                        <div class="form-group">
                            <label>Status <span style="color:red">*<span></label>
                            <select class="form-control" name="status" required>
                                <option value="Enabled" {{ $post->status == 'Enabled' ? "selected" : "" }}>Enable</option>   
                                <option value="Disabled" {{ $post->status == 'Disabled' ? "selected" : "" }}>Disable</option>                                
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Order <span style="color:red">*<span></label>
                            <input type="number" class="form-control" value="{{ $post->order }}" name="order" required>
                        </div>                       
                        
                    </div>
                </div>
                <input type="hidden" name="hidden_id" value="{{ $post->id }}"/>
                <a href="{{route('admin.post.index')}}" class="btn btn-info pull-right ml-4">Back</a>&nbsp;&nbsp;
                <button type="submit" class="btn btn-success pull-right">Update</button><br>
            </div><br>
            
            

        </div>

    </form>


<script>
	$("#title").keyup(function(){
    	var str = $(this).val();
    	var trims = $.trim(str)
    	var slug = trims.replace(/[^a-z0-9]/gi, '-').replace(/-+/g, '-').replace(/^-|-$/g, '')
    	$("#slug").val(slug.toLowerCase()) 
	});    
</script>

<script>
	ClassicEditor
		.create( document.querySelector( '#editor' ), {
			// toolbar: [ 'heading', '|', 'bold', 'italic', 'link' ]
		} )
		.then( editor => {
			window.editor = editor;
		} )
		.catch( err => {
			console.error( err.stack );
		} );
</script>


<br><br>
@endsection

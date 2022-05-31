@extends('backend.layouts.app')

@section('title', __('Edit Event'))

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
                            <label>Name <span style="color:red">*</span></label>
                            <input type="text" id="name" class="form-control" value="{{ $post->name }}" name="name" required>
                        </div>

                        <div class="form-group">
                            <label>Description <span style="color:red">*</span></label>
                            <textarea class="form-control" id="editor" name="description" rows="4">{!! $post->description !!}</textarea>
                        </div>

                        <div class="form-group">
                            <label>Place <span style="color:red">*</span></label>
                            <input type="text" id="place" class="form-control" name="place" value="{{ $post->place }}" required>
                        </div>

                        <div class="form-group">
                            <label>Date <span style="color:red">*</span></label>
                            <input type="date" id="date" class="form-control" name="date" value="{{ $post->date }}" required>
                        </div>

                        <div class="form-group">
                            <label>Time <span style="color:red">*</span></label>
                            <input type="text" id="time" class="form-control" name="time" value="{{ $post->time }}" required>
                        </div>
                       
                                              
                        <div class="form-group">
                            <label>Image <span style="color:red">*<span></label>
                            <div class="input-group" data-toggle="aizuploader" data-type="image">
                                <div class="input-group-prepend">
                                    <div class="input-group-text bg-soft-secondary font-weight-medium">Browse</div>
                                </div>
                                <div class="form-control file-amount">Choose File</div>
                                <input type="hidden" name="image" value="{{ $post->image }}" class="selected-files" >
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
                   

                        @if(count(Modules\Blog\Entities\Post::where('featured','Enabled')->get()) < 4 )
                            <div class="form-group">
                                <label>Featured <span style="color:red">*<span></label>
                                <select class="form-control" name="featured" required>
                                    <option value="Enabled" {{ $post->featured == 'Enabled' ? "selected" : "" }}>Enable</option>   
                                    <option value="Disabled" {{ $post->featured == 'Disabled' ? "selected" : "" }}>Disable</option>                                
                                </select>
                            </div>
                        @else
                            <div class="form-group">
                                <label>Featured <span style="color:red">*<span></label>
                                <select class="form-control" name="featured" required>
                                    <option value="Enabled" {{ $post->featured == 'Enabled' ? "selected" : "" }} disabled>Enable</option>   
                                    <option value="Disabled" {{ $post->featured == 'Disabled' ? "selected" : "" }}>Disable</option>                                
                                </select>
                            </div>
                        @endif

                        <div class="form-group">
                            <label>Order <span style="color:red">*<span></label>
                            <input type="number" class="form-control" name="order" value="{{ $post->order }}" required>
                        </div>


                    </div>
                </div>

                <div class="mt-5 text-right">
                    <input type="hidden" name="hidden_id" value="{{ $post->id }}"/>
                    <a href="{{route('admin.post.index')}}" class="btn rounded-pill text-light px-4 py-2 ms-2 btn-info ml-4">Back</a>
                    <input type="submit" class="btn rounded-pill text-light px-4 py-2 ms-2 btn-success" value="Update" />
                </div>

                
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

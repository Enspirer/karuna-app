@extends('backend.layouts.app')

@section('title', __('Create New'))

@section('content')


    <form action="{{route('admin.city.store')}}" method="post" enctype="multipart/form-data">
        {{csrf_field()}}

        <div class="row">    
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        
                        <div class="form-group">
                            <label>Name <span style="color:red">*</span></label>
                            <input type="text" class="form-control" name="name" required>
                        </div>

                        <div class="form-group">
                            <label>Country <span class="text-danger">*</span></label>
                            <select name="country" class="form-control custom-select" id="country" required>
                                <option value="" selected disabled>-- Select Country --</option>
                                @foreach ($countries as $country)
                                    <option value="{{ $country->id }}">{{ $country->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    
                        <div class="form-group">
                            <label>Status <span style="color:red">*<span></label>
                            <select class="form-control custom-select" name="status" required>
                                <option value="Enabled">Enable</option>   
                                <option value="Disabled">Disable</option>                                
                            </select>
                        </div>
                        
                    </div>
                </div>

                <div class="mt-5 text-right">
                    <input type="submit" class="btn rounded-pill text-light px-4 py-2 ms-2 btn-success" value="Submit" />
                </div>
        </div><br>

    </form>

     


<br><br>
@endsection

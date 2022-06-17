@extends('backend.layouts.app')

@section('title', __('Edit'))

@section('content')
    <form action="{{route('admin.city.update')}}" method="post" enctype="multipart/form-data">
        {{csrf_field()}}

        <div class="row">    
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">   

                        <div class="form-group">
                            <label>Country <span class="text-danger">*</span></label>
                            <select name="country" class="form-control custom-select" id="country" required>
                                <option value="" selected disabled>-- Select Country --</option>
                                @foreach ($countries as $country)
                                    <option value="{{ $country->id }}" {{$country->id == $city->country ? "selected" : ""}}>{{ $country->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <input type="hidden" class="form-control" value="{{ $city->district }}" id="district_received" >

                        <div class="form-group">
                            <label>District</label>
                            <select name="district" class="form-control" id="district" required>

                            </select>
                        </div>

                        <div class="form-group">
                            <label>Name <span style="color:red">*</span></label>
                            <input type="text" class="form-control" value="{{$city->name}}" name="name" required>
                        </div>

                        <div class="form-group">
                            <label>Status <span style="color:red">*<span></label>
                            <select class="form-control custom-select" name="status" required>
                                <option value="Enabled" {{$city->status == 'Enabled' ? "selected":"" }}>Enable</option>   
                                <option value="Disabled" {{$city->status == 'Disabled' ? "selected":"" }}>Disable</option>                                
                            </select>
                        </div>
                            
                    </div>
                </div>

                <div class="mt-5 text-right">
                    <input type="hidden" name="hidden_id" value="{{ $city->id }}"/>
                    <a href="{{route('admin.city.index')}}" type="button" class="btn rounded-pill px-4 py-2 me-2 btn-warning">Back</a>    
                    <input type="submit" class="btn rounded-pill text-light px-4 py-2 ml-2 ms-2 btn-success" value="Update" />
                </div>

            </div><br> 
    
        </div>

    </form>

    
<br><br>

<script>
    $(document).ready(function() {
        $('#country').on('change', function() {
            var country_id = $(this).val();
            // console.log(country_id);

            $.ajax({
                
                url: "{{url('/')}}/admin/find_district_back/" + country_id,
                method: "GET",
                dataType: "json",
                success:function(data) {
                    // console.log(data);
                if(data){
                    $('#district').empty();
                    $('#district').focus;
                    $('#district').append('<option value="" selected disabled>-- Select District --</option>'); 
                    $.each(data, function(key, value){
                        // console.log(value);
                    $('select[name="district"]').append('<option value="'+ value.district_id +'">' + value.district_name+ '</option>');
                    
                });

                }else{
                    $('#district').empty();
                }
                }
            });            
        });
    });
</script>

<script>
    $(document).ready(function() {
        // $('#category').on('change', function() {

            var country_id = $('#country').val();
            // console.log(country_id);
            var DisID = $('#district_received').val();
            // console.log(DisID);
            

                $.ajax({
                    
                    url: "{{url('/')}}/admin/find_district_back/" + country_id,
                    method: "GET",
                    dataType: "json",
                    success:function(data) {
                        // console.log(data);
                    if(data){
                        $('#district').empty();
                        $('#district').focus;
                        // $('#district').append('<option value="" selected disabled>-- Select District --</option>'); 
                        $.each(data, function(key, value){
                            // console.log(value);
                            if(DisID == value.district_id){                                       
                                $('#district').append('<option value="'+ value.district_id +'" selected>' + value.district_name+ '</option>');
                            }
                            else{
                                $('#district').append('<option value="'+ value.district_id +'">' + value.district_name+ '</option>');
                            }
                        
                        });

                    }else{
                        $('#district').empty();
                    }
                }
                });
            
        // });
    });



    </script>

@endsection

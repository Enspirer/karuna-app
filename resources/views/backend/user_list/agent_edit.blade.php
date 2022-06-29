@extends('backend.layouts.app')

@section('title', __('Edit'))

@section('content')

<form action="{{route('admin.agent_update')}}" method="post" enctype="multipart/form-data">
{{csrf_field()}}

    <div class="row">    
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                        
                    <div class="form-group">
                        <label>First Name <span style="color:red">*</span></label>
                        <input type="text" class="form-control" value="{{$agent->first_name}}" name="first_name" required>
                    </div>

                    <div class="form-group">
                        <label>Last Name <span style="color:red">*</span></label>
                        <input type="text" class="form-control" value="{{$agent->last_name}}" name="last_name" required>
                    </div>

                    <div class="form-group">
                        <label>Email <span style="color:red">*</span></label>
                        <input type="email" class="form-control" name="email" value="{{$agent->email}}" required>
                    </div>

                    <div class="form-group">
                        <label>Bio</label>
                        <textarea name="bio" id="bio" class="form-control" style="height:150px">{{$agent->bio}}</textarea>
                    </div>

                    <div class="form-group">
                        <label>Profile Image</label>
                        <div class="input-group" data-toggle="aizuploader" data-type="image">
                            <div class="input-group-prepend">
                                <div class="input-group-text bg-soft-secondary font-weight-medium">Browse</div>
                            </div>
                            <div class="form-control file-amount">Choose File</div>
                            <input type="hidden" value="{{$agent->profile_image}}" name="profile_image" class="selected-files" >
                        </div>
                        <div class="file-preview box sm">
                        </div>
                    </div> 

                    <div class="row">
                        <div class="col-12 col-md-12">
                            <div class="form-group">
                                <label>Country</label>
                                <select name="country" class="form-control custom-select" id="country" required>
                                    <option value="" selected disabled>-- Select Country --</option>
                                    @foreach(App\Models\Country::where('status','Enabled')->get() as $country)
                                        <option value="{{ $country->id }}" {{ $agent->country == $country->id ? "selected" : "" }}>{{ $country->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>

                    <input type="hidden" class="form-control" value="{{ $agent->district }}" id="district_received" >
                    <input type="hidden" class="form-control" value="{{ $agent->city }}" id="city_received" >

                    <div class="row">
                        <div class="col-12 col-md-12">
                            <div class="form-group">
                                <label>District</label>
                                <select name="district" class="form-control custom-select" id="district" required>
                                </select>
                            </div> 
                        </div> 
                    </div> 

                    <div class="row">
                        <div class="col-12 col-md-12">
                            <div class="form-group">
                                <label>City</label>
                                <select name="city" class="form-control custom-select" id="city" required>
                                </select>
                            </div> 
                        </div> 
                    </div> 

                    <div class="row">
                        <div class="col-12 col-md-12">
                            <div class="form-group">
                                <label>NIC Number</label>
                                <input type="text" name="nic_number" maxlength="191" class="form-control" value="{{$agent->nic_number}}" id="nic_number" placeholder="NIC Number" required>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12 col-md-12">
                            <div class="form-group">
                                <label>NIC Photo</label>
                                <input type="file" name="id_photo" class="form-control" id="id_photo" value="{{$agent->id_photo}}" placeholder="NIC Photo">
                                <br>
                                @if($agent->id_photo != null)
                                    <img src="{{url('files/agents_id/',$agent->id_photo)}}" style="width: 25%;" alt="" >
                                @endif
                            </div>
                        </div>
                    </div>

                
                    <div class="row">
                        <div class="col-12 col-md-12">
                            <div class="form-group">
                                <label>Occupation</label>
                                <input type="text" name="occupation" maxlength="191" class="form-control" value="{{$agent->occupation}}" id="occupation" placeholder="Occupation" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 col-md-12">
                            <div class="form-group">
                                <label>Contact Number</label>
                                <input type="text" name="contact_number" maxlength="191" class="form-control" value="{{$agent->contact_number}}" id="contact_number" placeholder="Contact Number" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 col-md-12">
                            <div class="form-group">
                                <label>Alternative Contact Number</label>
                                <input type="text" name="contact_number_two" maxlength="191" class="form-control" value="{{$agent->contact_number_two}}" id="contact_number_two" placeholder="Alternative Contact Number" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 col-md-12">
                            <div class="form-group">
                                <label>Address</label>
                                <input type="text" name="address" maxlength="191" class="form-control" id="address" value="{{$agent->address}}" placeholder="Address" required>
                            </div>
                        </div>
                    </div>



                </div>
            </div>

            <div class="mt-5 text-right">
                <input type="hidden" name="hidden_id" value="{{ $agent->id }}"/>
                <a href="{{route('admin.agent.index')}}" type="button" class="btn rounded-pill px-4 py-2 me-2 btn-warning">Back</a>    
                <input type="submit" class="btn rounded-pill text-light px-4 py-2 ml-2 ms-2 btn-success" value="Update" />
            </div>

        </div><br> 
    
    </div>
  
     
</form>  



    
<script>
    $(document).ready(function() {
        $('#country').on('change', function() {
            var country_id = $(this).val();
            // console.log(country_id);

            $.ajax({
                
                url: "{{url('/')}}/api/find_district_front/" + country_id,
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
                    
                    url: "{{url('/')}}/api/find_district_front/" + country_id,
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

<script>
    $(document).ready(function() {
        $('#district').on('change', function() {
            var district_id = $(this).val();
            // console.log(district_id);

            $.ajax({
                
                url: "{{url('/')}}/api/find_city_front/" + district_id,
                method: "GET",
                dataType: "json",
                success:function(data) {
                    // console.log(data);
                if(data){
                    $('#city').empty();
                    $('#city').focus;
                    $('#city').append('<option value="" selected disabled>-- Select City --</option>'); 
                    $.each(data, function(key, value){
                        // console.log(value);
                    $('select[name="city"]').append('<option value="'+ value.city_id +'">' + value.city_name+ '</option>');
                    
                });

                }else{
                    $('#city').empty();
                }
                }
            });            
        });
    });
</script>


<script>
    $(document).ready(function() {
        // $('#category').on('change', function() {

            setTimeout(() => {

                var district_id = $('#district').val();
                // console.log(district_id);

                var city_id_normal = $('#city_received').val();
                // console.log(city_id_normal);            

                    $.ajax({
                        
                        url: "{{url('/')}}/api/find_city_front/" + district_id,
                        method: "GET",
                        dataType: "json",
                        success:function(data) {
                            // console.log(data);
                        if(data){
                            $('#city').empty();
                            $('#city').focus;
                            // $('#city').append('<option value="" selected disabled>-- Select City --</option>'); 
                            $.each(data, function(key, value){
                                // console.log(value);

                                if(city_id_normal == value.city_id){                                       
                                    $('#city').append('<option value="'+ value.city_id +'" selected>' + value.city_name+ '</option>');
                                }
                                else{
                                    $('#city').append('<option value="'+ value.city_id +'">' + value.city_name+ '</option>');
                                }
                            
                            });

                        }else{
                            $('#city').empty();
                        }
                    }
                    });
                
            }, 3000);

           
            
        // });
    });

</script>




<br><br>


@endsection

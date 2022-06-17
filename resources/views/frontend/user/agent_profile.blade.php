@extends('frontend.layouts.dashboard_app')

@section('title', app_name() . ' | ' . __('navs.general.home'))

@section('content')

<section class="receiver-profile-section">
    <div class="profile-summery-block">
        <div class="dp-block">
            @if(auth()->user()->profile_image == null)
                <img src="{{url('images/landing-page/nav/profile.png')}}" alt="">
            @else
                <img src="{{uploaded_asset(auth()->user()->profile_image)}}" width="20%" alt="">
            @endif
          
        </div>
        <div class="name">{{auth()->user()->first_name}} {{auth()->user()->last_name}}</div>
        @if(auth()->user()->level != null)
            <div class="star-rating">
                @if(auth()->user()->level == 'Level 1')
                    <div style="background: rgb(255, 186, 12); padding:5px 20px 5px 20px; width:fit-content; margin: 10px auto 0; border-radius: 40px;">Level 1</div>
                @elseif(auth()->user()->level == 'Level 2')
                    <div style="background: rgb(255, 186, 12); padding:5px 20px 5px 20px; width:fit-content; margin: 10px auto 0; border-radius: 40px;">Level 2</div>
                @elseif(auth()->user()->level == 'Level 3')
                    <div style="background: rgb(255, 186, 12); padding:5px 20px 5px 20px; width:fit-content; margin: 10px auto 0; border-radius: 40px;">Level 2</div>
                @elseif(auth()->user()->level == 'Level 4')
                    <div style="background: rgb(255, 186, 12); padding:5px 20px 5px 20px; width:fit-content; margin: 10px auto 0; border-radius: 40px;">Level 4</div>
                @endif
            </div>
        @endif    
        <div class="info-table-wrapper">
            <table class="info-table">
                <tbody>
                    <tr>
                        <td>Name</td>
                        <td>{{auth()->user()->first_name}} {{auth()->user()->last_name}}</td>
                    </tr>
                    <tr>
                        <td>Email</td>
                        <td>{{auth()->user()->email}}</td>
                    </tr>   
                    @if(auth()->user()->user_type == 'Donor')  
                        <tr>
                            <td>Bio</td>
                            <td>{{auth()->user()->bio}}</td>
                        </tr>  
                    @endif
                    @if(auth()->user()->user_type == 'Agent')  
                        <tr>
                            <td>Country</td>
                            <td>{{get_city_details( auth()->user()->id,'country')}}</td>
                        </tr>   
                        <tr>
                            <td>City</td>
                            <td>{{get_city_details( auth()->user()->id,'city')}}</td>
                        </tr>   
                        <tr>
                            <td>Contact Number</td>
                            <td>{{auth()->user()->contact_number}}</td>
                        </tr>   
                        <tr>
                            <td>Alternate Contact Number</td>
                            <td>{{auth()->user()->contact_number_two}}</td>
                        </tr>   
                        <tr>
                            <td>Address</td>
                            <td>{{auth()->user()->address}}</td>
                        </tr>   
                        <tr>
                            <td>Cccupation</td>
                            <td>{{auth()->user()->occupation}}</td>
                        </tr>  
                        <tr>
                            <td>NIC Number</td>
                            <td>{{auth()->user()->nic_number}}</td>
                        </tr>  
                    @endif            
                </tbody>
            </table>
        </div>
        <a href="{{url('logout')}}" class="sign-out-btn">
            <i class="bi bi-box-arrow-right"></i>
            <div class="btn-text">Sign Out</div>
        </a>
    </div>
    <div class="edit-profile-block">
        <form action="{{route('frontend.user.update_agent')}}" method="post" enctype="multipart/form-data">
        {{csrf_field()}}
            <div class="inner-wrapper db-form">

                @if(session()->has('success'))
                    <div class="alert alert-success">
                        {{ session()->get('success') }}
                    </div>
                @endif

                @include('includes.partials.messages')

                <div class="row g-0">
                    <div class="col">
                        <div class="title">Edit your profile</div>
                    </div>
                </div>
                <!-- Name -->
                <div class="row g-0">
                    <div class="col-md-11">
                        <label class="pro-label">First Name</label>
                    </div>
                </div>
                <div class="row g-0 mb-3">
                    <div class="col-md-11">
                        <input type="text" class="form-control" name="first_name" value="{{auth()->user()->first_name}}" required>
                    </div>
                </div>
                <!-- Nick Name -->
                <div class="row g-0">
                    <div class="col-md-11">
                        <label class="pro-label">Last Name</label>
                    </div>
                </div>
                <div class="row g-0 mb-3">
                    <div class="col-md-11">                        
                        <input type="text" class="form-control" name="last_name" value="{{auth()->user()->last_name}}" required>
                    </div>
                </div>                
              
                <div class="row g-0 mb-3">
                    <div class="col-md-11">
                        <div class="join-form-row hidden-row field-agent" id="agent_contact_number_two">
                            <label class="pro-label">Email</label>
                            <input type="email" name="email" maxlength="191" class="form-control" value="{{auth()->user()->email}}" placeholder="Email">
                        </div>
                    </div>
                </div>

                <div class="row g-0 mb-3">
                    <div class="col-md-11">  
                        <label class="pro-label">Bio</label>
                        <textarea name="bio" id="bio" class="form-control" style="height:150px">{{auth()->user()->bio}}</textarea>
                    </div>
                </div>   

                <div class="row g-0 mb-3">
                    <div class="col-md-11">  
                        <label class="pro-label">Profile Image</label>
                        <div class="form-group">
                            <div class="input-group" data-toggle="aizuploader" data-type="image">
                                <div class="input-group-prepend">
                                    <div class="input-group-text bg-soft-secondary font-weight-medium">Browse</div>
                                </div>
                                <div class="form-control file-amount">Choose File</div>
                                <input type="hidden" name="profile_image" value="{{auth()->user()->profile_image}}" class="selected-files" >
                            </div>
                            <div class="file-preview box sm">
                            </div>
                        </div>
                    </div>
                </div>  

                @if(auth()->user()->user_type == 'Agent')

                 
                    <div class="row g-0 mb-3">
                        <div class="col-md-11">
                            <div class="join-form-row hidden-row field-receiver field-agent" >
                                <label class="pro-label">Country</label>
                                <select name="country" class="form-control custom-select" id="country" required>
                                    <option value="" selected disabled>-- Select Country --</option>
                                    @foreach(App\Models\Country::where('status','Enabled')->get() as $country)
                                        <option value="{{ $country->id }}" {{ auth()->user()->country == $country->id ? "selected" : "" }}>{{ $country->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>

                    <input type="hidden" class="form-control" value="{{ auth()->user()->district }}" id="district_received" >
                    <input type="hidden" class="form-control" value="{{ auth()->user()->city }}" id="city_received" >
                    
                    <div class="row g-0 mb-3">
                        <div class="col-md-11">
                            <div class="join-form-row hidden-row field-receiver field-agent" >
                                <label class="pro-label">District</label>
                                <select name="district" class="form-control custom-select" id="district" required>
                                  
                                </select>
                            </div> 
                        </div> 
                    </div> 
                        
                    <div class="row g-0 mb-3">
                        <div class="col-md-11">
                            <div class="join-form-row hidden-row field-receiver field-agent" >
                                <label class="pro-label">City</label>
                                <select name="test_city" class="form-control custom-select" id="test_city" required>
                                
                                </select>
                            </div> 
                        </div> 
                    </div> 
                    
                    <div class="row g-0 mb-3">
                        <div class="col-md-11">
                            <div class="join-form-row hidden-row field-agent" id="agent_nic">
                                <label class="pro-label">NIC Number</label>
                                <input type="text" name="nic_number" maxlength="191" class="form-control" value="{{auth()->user()->nic_number}}" id="nic_number" placeholder="NIC Number">
                            </div>
                        </div>
                    </div>

                    <div class="row g-0 mb-3">
                        <div class="col-md-11">
                            <div class="join-form-row hidden-row field-agent" id="agent_nic">
                                <label class="pro-label">ID Card Photo</label>
                                <input type="file" name="id_photo" value="{{auth()->user()->id_photo}}" class="form-control" id="id_photo" placeholder="NIC Photo">
                                <br>
                                @if(auth()->user()->id_photo != null)
                                    <img src="{{url('files/agents_id/',auth()->user()->id_photo)}}" style="width: 25%;" alt="" >
                                @endif
                            </div>
                        </div>
                    </div>

                    <div class="row g-0 mb-3">
                        <div class="col-md-11">
                            <div class="join-form-row hidden-row field-agent" id="agent_occupation">
                                <label class="pro-label">Occupation</label>
                                <input type="text" name="occupation" maxlength="191" class="form-control" value="{{auth()->user()->occupation}}" id="occupation" placeholder="Occupation">
                            </div>
                        </div>
                    </div>
                    <div class="row g-0 mb-3">
                        <div class="col-md-11">
                            <div class="join-form-row hidden-row field-agent" id="agent_contact_number">
                                <label class="pro-label">Contact Number</label>
                                <input type="number" name="contact_number" maxlength="191" class="form-control" value="{{auth()->user()->contact_number}}" id="contact_number" placeholder="Contact Number">
                            </div>
                        </div>
                    </div>
                    <div class="row g-0 mb-3">
                        <div class="col-md-11">
                            <div class="join-form-row hidden-row field-agent" id="agent_contact_number_two">
                                <label class="pro-label">Alternate Contact Number</label>
                                <input type="number" name="contact_number_two" maxlength="191" class="form-control" value="{{auth()->user()->contact_number_two}}" id="contact_number_two" placeholder="Alternative Contact Number">
                            </div>
                        </div>
                    </div>
                    <div class="row g-0 mb-3">
                        <div class="col-md-11">
                            <div class="join-form-row hidden-row field-agent" id="agent_address">
                                <label class="pro-label">Address</label>
                                <input type="text" name="address" maxlength="191" class="form-control" value="{{auth()->user()->address}}" id="address" placeholder="Address">
                            </div>
                        </div>
                    </div>

                @endif
                
                
                <div class="row g-0">
                    <div class="col-md-11">
                        <input type="hidden" name="hidden_id" class="form-control" value="{{auth()->user()->id}}" >
                        <button type="submit" class="cta-btn btn-fill">
                            <div class="btn-text">Update</div>
                        </button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</section>

@endsection

@push('after-scripts')



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
                            $('#test_city').empty();
                            $('#test_city').focus;
                            // $('#city').append('<option value="" selected disabled>-- Select City --</option>'); 
                            $.each(data, function(key, value){
                                // console.log(value);

                                if(city_id_normal == value.city_id){                                       
                                    $('#test_city').append('<option value="'+ value.city_id +'" selected>' + value.city_name+ '</option>');
                                }
                                else{
                                    $('#test_city').append('<option value="'+ value.city_id +'">' + value.city_name+ '</option>');
                                }
                            
                            });

                        }else{
                            $('#test_city').empty();
                        }
                    }
                    });
                
            }, 3000);

           
            
        // });
    });

</script>

<!-- <script>

    $(document).on('change','#countries',function(){

        let country = $('#countries').val();
            // alert(country);

        let name;
        let template;
       
        if(country.includes('-')){
            name = country.replace("-", " ");
        } else {
            name = country;
        }
        

        $.ajax({
            "type": "POST",
            "url": "https://countriesnow.space/api/v0.1/countries/cities",
            "data": {
                "country": name
            }
        }).done(function (d) {

            for(let i = 0; i < d['data'].length; i++) {
                template+= `
                    <option value="${d['data'][i]}">${d['data'][i]}</option>
                `
            }

            $(".areas").html(template);
            // console.log(d);
        });
    });
    
</script>

<script>

    $(document).ready(function(){
       
        let country = $('#countries').val();
            // alert(country);

        let name;
        let template;
       
        if(country.includes('-')){
            name = country.replace("-", " ");
        } else {
            name = country;
        }
        

        $.ajax({
            "type": "POST",
            "url": "{{url('api/get_cities_function')}}",
            "data": {
                "country": name
            }
        }).done(function (d) {

            for(let i = 0; i < d['data'].length; i++) {
                
                if(d['data'][i] == '{{auth()->user()->city}}'){
                    template+= `
                        <option value="${d['data'][i]}" selected>${d['data'][i]}</option>
                    `
                }
                else{
                    template+= `
                        <option value="${d['data'][i]}">${d['data'][i]}</option>
                    `
                }
            }

            $(".areas").html(template);
            
            // $city = $('#city').val('Apple').change();
            // console.log(d);

            // $('#city').attr('selected','selected');


        });        

    });


</script> -->





@endpush
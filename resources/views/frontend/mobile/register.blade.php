@extends('frontend.layouts.mobile_app')

@section('title', app_name() . ' | ' . 'Register')

@section('content')

<section class="join-header-section">
    <div class="mobile-container">
        <img src="{{url('images/mobile/logo/karuna-logo-english.svg')}}" alt="" class="logo">
        <div class="title">Hello Newcomer !</div>
        <div class="text">Welcome to the Karuna. Please register.</div>
    </div>
</section>

<section class="join-form-section">
    <div class="mobile-container">
        <form action="{{route('frontend.auth.register.post')}}" method="post" enctype="multipart/form-data">
        {{csrf_field()}}
          

            <div class="join-form">

                @if(session()->has('error_incorrect_referrel'))
                    <div class="alert alert-danger">
                        {{ session()->get('error_incorrect_referrel') }}
                    </div>
                @endif

                <div class="join-form-row">
                    <input type="text" name="first_name" maxlength="191" class="form-control" value="{{old('first_name')}}" id="first_name" placeholder="First Name" required>
                    @if($errors->has('first_name'))
                        <p style="color: red;font-size: 13px;padding-top: 7px;">{{$errors->first('first_name')}}</p>
                    @endif
                </div>
                <div class="join-form-row">
                    <input type="text" name="last_name" maxlength="191" class="form-control" value="{{old('last_name')}}" id="last_name" placeholder="Last Name" required>
                    @if($errors->has('last_name'))
                        <p style="color: red;font-size: 13px;padding-top: 7px;">{{$errors->first('last_name')}}</p>
                    @endif
                </div>
                <div class="join-form-row">
                    <input type="email" name="email" maxlength="191" class="form-control" value="{{old('email')}}" id="email" placeholder="Email" required>
                    @if($errors->has('email'))
                        <p style="color: red;font-size: 13px;padding-top: 7px;">{{$errors->first('email')}}</p>
                    @endif
                </div>

                <div class="join-form-row">
                    <select class="form-control custom-select" name="user_type" id="user_type" onchange="user_type_check(this);" required>
                        <!-- <option value="" selected disabled>User Type</option>  -->
                        <option value="Receiver" disabled>Receiver</option>
                        @if(old('user_type'))
                            <option value="Agent" {{ old('user_type') == 'Agent' ? "selected":"" }}>Volunteer</option>
                            <option value="Donor" {{ old('user_type') == 'Donor' ? "selected":"" }} >Donor</option>
                        @else
                            <option value="Agent">Volunteer</option>
                            <option value="Donor" selected>Donor</option>
                        @endif
                    </select>
                    @if($errors->has('user_type'))
                        <p style="color: red;font-size: 13px;padding-top: 7px;">{{$errors->first('user_type')}}</p>
                    @endif
                </div>

                <!-- <div class="join-form-row {{ old('user_type') == 'Agent' ? "":"hidden-row" }}  field-receiver field-agent" id="agent_country">
                    <select id="country" class="form-control custom-select" name="country">
                        <option value="" selected disabled>Select Here</option>
                        <option value="Sri Lanka" {{ old('country') === 'Sri Lanka' ? "selected" : "" }}>Sri Lanka</option>
                    </select>
                    @if($errors->has('country'))
                        <p style="color: red;font-size: 13px;padding-top: 7px;">{{$errors->first('country')}}</p>
                    @endif
                </div>
                <div class="join-form-row {{ old('user_type') == 'Agent' ? "":"hidden-row" }}  field-receiver field-agent" id="agent_city">
                    <select class="form-control areas custom-select" id="city" value="{{old('city')}}" name="city">
                        @if(old('city'))
                            <option value="{{old('city')}}" selected>{{old('city')}}</option>
                        @endif
                    </select>
                    @if($errors->has('city'))
                        <p style="color: red;font-size: 13px;padding-top: 7px;">{{$errors->first('city')}}</p>
                    @endif
                </div> -->

                <input type="hidden" class="form-control" value="{{ old('district') }}" id="district_received" >
                <input type="hidden" class="form-control" value="{{ old('city') }}" id="city_received" >


                <div class="join-form-row {{ old('user_type') == 'Agent' ? "":"hidden-row" }}  field-receiver field-agent" id="agent_country">
                   <select name="country" class="form-control custom-select" id="country">
                        <option value="" selected disabled>-- Select Country --</option>
                        @foreach(App\Models\Country::where('status','Enabled')->get() as $country)
                            <option value="{{ $country->id }}" {{ old('country') == $country->id ? "selected" : "" }}>{{ $country->name }}</option>
                        @endforeach
                    </select>
                    @if($errors->has('country'))
                        <p style="color: red;font-size: 13px;padding-top: 7px;">{{$errors->first('country')}}</p>
                    @endif
                </div>

                <div class="join-form-row {{ old('user_type') == 'Agent' ? "":"hidden-row" }}  field-receiver field-agent" id="agent_district">              
                    <select name="district" class="form-control custom-select" id="district">
                        <option value="" selected disabled>-- Select District --</option>                        
                        @if(old('district'))
                            <option value="{{App\Models\District::where('id',old('district'))->first()->name}}" selected>{{App\Models\District::where('id',old('district'))->first()->name}}</option>
                        @endif
                    </select>
                    @if($errors->has('district'))
                        <p style="color: red;font-size: 13px;padding-top: 7px;">{{$errors->first('district')}}</p>
                    @endif
                </div> 

                <div class="join-form-row {{ old('user_type') == 'Agent' ? "":"hidden-row" }}  field-receiver field-agent" id="agent_city">                   
                    <select name="city" class="form-control custom-select" id="city">
                        <option value="" selected disabled>-- Select City --</option>                        
                        @if(old('city'))
                            <option value="{{App\Models\City::where('id',old('city'))->first()->name}}" selected>{{App\Models\City::where('id',old('city'))->first()->name}}</option>
                        @endif
                    </select>
                    @if($errors->has('city'))
                        <p style="color: red;font-size: 13px;padding-top: 7px;">{{$errors->first('city')}}</p>
                    @endif
                </div> 

           
                <div class="join-form-row {{ old('user_type') == 'Agent' ? "":"hidden-row" }} field-agent" id="agent_occupation">
                    <input type="text" name="occupation" maxlength="191" class="form-control" value="{{old('occupation')}}" id="occupation" placeholder="Occupation">
                    @if($errors->has('occupation'))
                        <p style="color: red;font-size: 13px;padding-top: 7px;">{{$errors->first('occupation')}}</p>
                    @endif
                </div>
                <div class="join-form-row {{ old('user_type') == 'Agent' ? "":"hidden-row" }}  field-agent" id="agent_contact_number">
                    <input type="text" name="contact_number" maxlength="191" class="form-control" value="{{old('contact_number')}}" id="contact_number" placeholder="Contact Number">
                    @if($errors->has('contact_number'))
                        <p style="color: red;font-size: 13px;padding-top: 7px;">{{$errors->first('contact_number')}}</p>
                    @endif
                </div>
                <div class="join-form-row {{ old('user_type') == 'Agent' ? "":"hidden-row" }}  field-agent" id="agent_contact_number_two">
                    <input type="text" name="contact_number_two" maxlength="191" class="form-control" value="{{old('contact_number_two')}}" id="contact_number_two" placeholder="Alternative Contact Number">
                    @if($errors->has('contact_number_two'))
                        <p style="color: red;font-size: 13px;padding-top: 7px;">{{$errors->first('contact_number_two')}}</p>
                    @endif
                </div>
                <div class="join-form-row {{ old('user_type') == 'Agent' ? "":"hidden-row" }} {{ old('user_type') == 'Agent' ? "":"hidden-row" }}  field-agent" id="agent_address">
                    <input type="text" name="address" maxlength="191" class="form-control" value="{{old('address')}}" id="address" placeholder="Address">
                    @if($errors->has('address'))
                        <p style="color: red;font-size: 13px;padding-top: 7px;">{{$errors->first('address')}}</p>
                    @endif
                </div>
                <div class="join-form-row">
                    <input type="password" name="password" class="form-control" id="password" placeholder="Password" required>
                    @if($errors->has('password'))
                        <p style="color: red;font-size: 13px;padding-top: 7px;">{{$errors->first('password')}}</p>
                    @endif
                </div>
                <div class="join-form-row">
                    <input type="password" name="password_confirmation" class="form-control" id="password_confirmation" placeholder="Confirm Password" required>
                    @if($errors->has('password_confirmation'))
                        <p style="color: red;font-size: 13px;padding-top: 7px;">{{$errors->first('password_confirmation')}}</p>
                    @endif
                </div>
                <div class="card" style="display: none;" id="referral_details">
                    <h5 class="card-header">Referral Details</h5>
                    <div class="card-body">
                        <div class="row g-0 mb-4">
                            <div class="col-md-12">
                                <label class="pro-label">Referral Email</label>
                                <input type="email" class="form-control" id="referral_email" name="referral_email" value="{{old('referral_email')}}">
                            </div>                           
                        </div>
                        <div class="row g-0 mb-5">                                    
                            <div class="col-md-12">
                                <label class="pro-label">Referral Agent Number</label>
                                <input type="text" class="form-control" id="referral_agent_number" name="referral_agent_number" value="{{old('referral_agent_number')}}">
                            </div>                          
                        </div>                                
                    </div>
                </div>
               

                <div class="join-form-row">
                    <button type="submit" class="cta-btn btn-fill pull-right">
                        <div class="btn-text">Register</div>
                    </button>
                </div>
            </div>
        </form>

        <div class="not-join">Are you member? <a href="{{route('frontend.mobile.login')}}">Sign in now</a></div>
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



<script>
    // on load
    window.addEventListener('load', () => {

        const userType = document.getElementById('user_type')
        const agentReqFields = ['agent_country', 'agent_district', 'agent_city', 'agent_occupation', 'agent_contact_number', 'agent_contact_number_two', 'agent_address', 'referral_details']

        const ReqFields = ['country', 'district', 'city', 'occupation', 'contact_number', 'contact_number_two', 'address', 'referral_email', 'referral_agent_number']

        if (userType.value == 'Agent') {
            agentReqFields.forEach((input) => {
                document.getElementById(input).style.display = 'block'
            })

            ReqFields.forEach((field) => {
                document.getElementById(field).setAttribute('required', '')
            })
        } 
    } )

    function user_type_check(that) {
        // if (that.value == 'Agent') {
        //     document.getElementById("agent_nic").style.display = "block";
        // } else {
        //     document.getElementById("agent_nic").style.display = "none";
        // }

        // if (that.value == 'Agent') {
        //     document.getElementById("agent_id_photo").style.display = "block";
        //     document.getElementById("agent_id_photo").required = true;
        // } else {
        //     document.getElementById("agent_id_photo").style.display = "none";
        // }  

        if (that.value == 'Agent') {
            document.getElementById("referral_details").style.display = "block";
        } else {
            document.getElementById("referral_details").style.display = "none";
        }  
        
        if (that.value == 'Agent') {
            document.getElementById("agent_contact_number").style.display = "block";
        } else {
            document.getElementById("agent_contact_number").style.display = "none";
        }

        if (that.value == 'Agent') {
            document.getElementById("agent_country").style.display = "block";
        } else {
            document.getElementById("agent_country").style.display = "none";
        }

        if (that.value == 'Agent') {
            document.getElementById("agent_district").style.display = "block";
        } else {
            document.getElementById("agent_district").style.display = "none";
        }   

        if (that.value == 'Agent') {
            document.getElementById("agent_city").style.display = "block";
        } else {
            document.getElementById("agent_city").style.display = "none";
        }

        if (that.value == 'Agent') {
            document.getElementById("agent_contact_number_two").style.display = "block";
        } else {
            document.getElementById("agent_contact_number_two").style.display = "none";
        }
        

        if (that.value == 'Agent') {
            document.getElementById("agent_occupation").style.display = "block";
        } else {
            document.getElementById("agent_occupation").style.display = "none";
        }

        if (that.value == 'Agent') {
            document.getElementById("agent_address").style.display = "block";
        } else {
            document.getElementById("agent_address").style.display = "none";
        }


        if (that.value == 'Receiver') {
            document.getElementById("receiver_assigned_agent").style.display = "block";
        } else {
            document.getElementById("receiver_assigned_agent").style.display = "none";
        }      
        
    }
</script> 

<!-- <script>
   const tel1 = document.getElementById("contact_number");
   const tel2 = document.getElementById("contact_number_two");
   const telInput1 = window.intlTelInput(tel1);
   const telInput2 = window.intlTelInput(tel2);
</script>    -->


<!-- <script>

    $(document).on('change','#country',function(){

        let country = $('#country').val();
            // console.log(country);

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
    
</script> -->


<!-- <script>
         $(document).ready(function() {
        $('#city').on('change', function() {
            var City = $(this).val();
            // console.log(City);

                $.ajax({
                    
                    url: "{{url('/')}}/api/find_agent_details/" + City,
                    method: "GET",
                    dataType: "json",
                    success:function(data) {
                        // console.log(data);
                    if(data){
                        $('#assigned_agent_id').empty();
                        $('#assigned_agent_id').focus;
                        $('#assigned_agent_id').append('<option value="" selected disabled>-- Select An Agent --</option>'); 
                        $.each(data, function(key, value){
                            // console.log(key);
                            // console.log(value);
                        $('select[name="assigned_agent_id"]').append('<option value="'+ value.agent_user_id +'">' + value.agent_user_name+ '</option>');
                        
                    });

                    }else{
                        $('#assigned_agent_id').empty();
                    }
                  }
                });
            
        });
    });
</script> -->

<script>
const userType = document.getElementById('user_type')
const agentReqFields = ['country', 'district', 'city', 'occupation', 'contact_number', 'contact_number_two', 'address', 'referral_email', 'referral_agent_number']

userType.addEventListener('change', () => {
    if (userType.value == 'Agent') {
        agentReqFields.forEach((field) => {
            document.getElementById(field).setAttribute('required', '')
        })
    }
})
</script>


@endpush
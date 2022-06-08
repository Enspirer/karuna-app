@extends('frontend.layouts.mobile_app')

@section('title', app_name() . ' | ' . __('navs.general.home'))

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
                <div class="join-form-row">
                    <input type="text" name="first_name" maxlength="191" class="form-control" value="{{old('first_name')}}" id="first_name" placeholder="First Name" required>
                </div>
                <div class="join-form-row">
                    <input type="text" name="last_name" maxlength="191" class="form-control" value="{{old('last_name')}}" id="last_name" placeholder="Last Name" required>
                </div>
                <div class="join-form-row">
                    <input type="email" name="email" maxlength="191" class="form-control" value="{{old('email')}}" id="email" placeholder="Email" required>
                </div>
                <div class="join-form-row">
                    <select class="form-control custom-select" name="user_type" id="user_type" onchange="user_type_check(this);" required>
                        <!-- <option value="" selected disabled>User Type</option>  -->
                        <option value="Receiver" disabled>Receiver</option>
                        @if(old('user_type'))
                            <option value="Agent" {{ old('user_type') == 'Agent' ? "selected":"" }}>Agent</option>
                            <option value="Donor" {{ old('user_type') == 'Donor' ? "selected":"" }} >Donor</option>
                        @else
                            <option value="Agent">Agent</option>
                            <option value="Donor" selected>Donor</option>
                        @endif

                    </select>
                </div>



                <div class="join-form-row {{ old('user_type') == 'Agent' ? "":"hidden-row" }}  field-receiver field-agent" id="agent_country">
                    <select id="country" class="form-control custom-select" name="country">
                        <option value="" selected disabled>Select Here</option>
                        <option value="Sri Lanka" {{ old('country') === 'Sri Lanka' ? "selected" : "" }}>Sri Lanka</option>
                    </select>
                </div>
                <div class="join-form-row {{ old('user_type') == 'Agent' ? "":"hidden-row" }}  field-receiver field-agent" id="agent_city">
                    <select class="form-control areas custom-select" id="city" value="{{old('city')}}" name="city">
                        @if(old('city'))
                            <option value="{{old('city')}}" selected>{{old('city')}}</option>
                        @endif
                    </select>
                </div>
           
                <div class="join-form-row {{ old('user_type') == 'Agent' ? "":"hidden-row" }}  field-agent" id="agent_nic">
                    <input type="text" name="nic_number" maxlength="191" class="form-control" value="{{old('nic_number')}}" id="nic_number" placeholder="NIC Number">
                </div>
                <div class="join-form-row {{ old('user_type') == 'Agent' ? "":"hidden-row" }}  field-agent" id="agent_id_photo">
                    <label style="font-size: 11px;padding-left: 10px;">ID Card Photo</label>
                    <input type="file" name="id_photo" maxlength="191" class="form-control" value="" id="id_photo" placeholder="NIC Photo">
                </div>
                <div class="join-form-row {{ old('user_type') == 'Agent' ? "":"hidden-row" }} field-agent" id="agent_occupation">
                    <input type="text" name="occupation" maxlength="191" class="form-control" value="{{old('occupation')}}" id="occupation" placeholder="Occupation">
                </div>
                <div class="join-form-row {{ old('user_type') == 'Agent' ? "":"hidden-row" }}  field-agent" id="agent_contact_number">
                    <input type="number" name="contact_number" maxlength="191" class="form-control" value="{{old('contact_number')}}" id="contact_number" placeholder="Contact Number">
                </div>
                <div class="join-form-row {{ old('user_type') == 'Agent' ? "":"hidden-row" }}  field-agent" id="agent_contact_number_two">
                    <input type="number" name="contact_number_two" maxlength="191" class="form-control" value="{{old('contact_number_two')}}" id="contact_number_two" placeholder="Alternative Contact Number">
                </div>
                <div class="join-form-row {{ old('user_type') == 'Agent' ? "":"hidden-row" }} {{ old('user_type') == 'Agent' ? "":"hidden-row" }}  field-agent" id="agent_address">
                    <input type="text" name="address" maxlength="191" class="form-control" value="{{old('address')}}" id="address" placeholder="Address">
                </div>
                <div class="join-form-row">
                    <input type="password" name="password" class="form-control" id="password" placeholder="Password" required>
                </div>
                <div class="join-form-row">
                    <input type="password" name="password_confirmation" class="form-control" id="password_confirmation" placeholder="Confirm Password" required>
                </div>
                <div class="card" style="display: none;" id="referral_details">
                    <h5 class="card-header">Referral Details</h5>
                    <div class="card-body">
                        <div class="row g-0 mb-4">
                            <div class="col-md-12">
                                <label class="pro-label">Referral Name</label>
                                <input type="text" class="form-control" id="referral_name" name="referral_name" value="{{old('referral_name')}}">
                            </div>                           
                        </div>
                        <div class="row g-0 mb-5">                                    
                            <div class="col-md-12">
                                <label class="pro-label">Referral NIC Number</label>
                                <input type="text" class="form-control" id="referral_nic_number" name="referral_nic_number" value="{{old('referral_nic_number')}}">
                            </div>                          
                        </div>                                
                    </div>
                </div>
                @include('includes.partials.messages')

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
    window.addEventListener('DOMContentLoaded', () => {

        const userType = document.getElementById('user_type')
        const agentReqFields = ['agent_country', 'agent_city', 'agent_nic', 'agent_id_photo', 'agent_occupation', 'agent_contact_number', 'agent_contact_number_two', 'agent_address', 'referral_details']

        const ReqFields = ['country', 'city', 'nic_number', 'id_photo', 'occupation', 'contact_number', 'contact_number_two', 'address', 'referral_name', 'referral_nic_number']

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
        if (that.value == 'Agent') {
            document.getElementById("agent_nic").style.display = "block";
        } else {
            document.getElementById("agent_nic").style.display = "none";
        }

        if (that.value == 'Agent') {
            document.getElementById("agent_id_photo").style.display = "block";
            document.getElementById("agent_id_photo").required = true;
        } else {
            document.getElementById("agent_id_photo").style.display = "none";
        }  

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

        if (that.value == 'Agent' || that.value == 'Receiver') {
            document.getElementById("agent_country").style.display = "block";
        } else {
            document.getElementById("agent_country").style.display = "none";
        }

        if (that.value == 'Agent' || that.value == 'Receiver') {
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

<script>
   const tel1 = document.getElementById("contact_number");
   const tel2 = document.getElementById("contact_number_two");
   const telInput1 = window.intlTelInput(tel1);
   const telInput2 = window.intlTelInput(tel2);
</script>   


<script>

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
    
</script>


<script>
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
</script>

<script>
const userType = document.getElementById('user_type')
const agentReqFields = ['country', 'city', 'nic_number', 'id_photo', 'occupation', 'contact_number', 'contact_number_two', 'address', 'referral_name', 'referral_nic_number']

userType.addEventListener('change', () => {
    if (userType.value == 'Agent') {
        agentReqFields.forEach((field) => {
            document.getElementById(field).setAttribute('required', '')
        })
    }
})
</script>


@endpush
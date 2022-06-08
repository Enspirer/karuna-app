@extends('frontend.layouts.mobile_app')

@section('title', app_name() . ' | ' . __('navs.general.home'))

@section('content')

<!-- ======== Top Nav ======== -->
<section class="app-bar-section">
    <div class="mobile-container">
        <div class="inner-wrapper">
            <!-- <a href="{{route('frontend.user.mobile.index')}}" class="back-btn"> -->
            <a href="{{route('frontend.user.mobile.index')}}" class="back-btn">
                <i class="fa-solid fa-arrow-left"></i>
            </a>
            <div class="title">Profile</div>
        </div>
    </div>
</section>
<!-- ======== Top Nav End ======== -->


@if(App\Models\Auth\User::where('id',auth()->user()->id)->first()->user_type == 'Donor')

<section class="form-section">
    <div class="mobile-container">

        @if(session()->has('error_pw'))
            <div class="alert alert-danger">
                {{ session()->get('error_pw') }}
            </div>
        @endif
        @if(session()->has('success'))
            <div class="alert alert-success">
                {{ session()->get('success') }}
            </div>
        @endif


        <form action="{{route('frontend.user.update_donor_mobile')}}" method="post" enctype="multipart/form-data">
        {{csrf_field()}}
            <!-- Profile Picture -->
           
            <div class="frm-row">
                <div class="frm-col">
                    <div class="name">{{auth()->user()->first_name}} {{auth()->user()->last_name}}</div>
                    <div class="star-rating">
                        @if(auth()->user()->level == 'Level 1')
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star"></i>
                            <i class="bi bi-star"></i>
                            <i class="bi bi-star"></i>
                        @elseif(auth()->user()->level == 'Level 2')
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star"></i>
                            <i class="bi bi-star"></i>
                        @elseif(auth()->user()->level == 'Level 3')
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star"></i>
                        @elseif(auth()->user()->level == 'Level 4')
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                        @endif
                    </div>                        
                </div>
            </div>
                        
            <div class="frm-row">
                <label for="first_name" class="form-label">First Name</label>
                <input type="text" name="first_name" maxlength="191" class="form-control" value="{{auth()->user()->first_name}}" id="first_name" required>
            </div>
            <div class="frm-row">
                <label for="last_name" class="form-label">Last Name</label>
                <input type="text" name="last_name" maxlength="191" class="form-control" value="{{auth()->user()->last_name}}" id="last_name" required>
            </div>
            <div class="frm-row">
                <label for="email" class="form-label">Email</label>
                <input type="email" name="email" maxlength="191" class="form-control" value="{{auth()->user()->email}}" id="email" required>
            </div>

            <div class="frm-row">
                <label class="form-label">Upload Profile Picture <span>(Optional)</span></label>
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

            <div class="frm-row">  
                <label class="form-label">Bio</label>
                <textarea name="bio" id="bio" class="form-control" style="height:180px">{{auth()->user()->bio}}</textarea>
            </div>   

            <!-- <div class="frm-row">
                <label for="password" class="form-label">Password</label>
                <input type="password" name="password" class="form-control" id="password">
            </div>
            <div class="frm-row">
                <label for="password_confirmation" class="form-label">Confirm Password</label>
                <input type="password" name="password_confirmation" class="form-control" id="password_confirmation" >
            </div> -->

            <!-- Submit Button -->
            <div class="frm-row">
                <input type="hidden" name="hidden_id" class="data-input" value="{{auth()->user()->id}}">
                <button type="submit" class="cta-btn btn-fill">
                    <div class="btn-text">Submit</div>
                </button>
            </div>
        </form>
    </div>
</section>

@else

    <section class="form-section">
        <div class="mobile-container">

            @if(session()->has('error_pw'))
                <div class="alert alert-danger">
                    {{ session()->get('error_pw') }}
                </div>
            @endif
            @if(session()->has('success'))
                <div class="alert alert-success">
                    {{ session()->get('success') }}
                </div>
            @endif

            @include('includes.partials.messages')

            <form action="{{route('frontend.user.update_agent_mobile')}}" method="post" enctype="multipart/form-data">
            {{csrf_field()}}
            

                <div class="frm-row">
                    <div class="frm-col">
                        <div class="name">{{auth()->user()->first_name}} {{auth()->user()->last_name}}</div>
                        <div class="star-rating">
                            @if(auth()->user()->level == 'Level 1')
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star"></i>
                                <i class="bi bi-star"></i>
                                <i class="bi bi-star"></i>
                            @elseif(auth()->user()->level == 'Level 2')
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star"></i>
                                <i class="bi bi-star"></i>
                            @elseif(auth()->user()->level == 'Level 3')
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star"></i>
                            @elseif(auth()->user()->level == 'Level 4')
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                            @endif
                        </div>
                    </div>
                </div>
                                               

                <!-- Name -->
                <div class="frm-row">
                    <label class="form-label">First Name</label>
                    <input type="text" class="form-control" name="first_name" value="{{auth()->user()->first_name}}" required>
                </div>
                <!-- Nick Name -->
                <div class="frm-row">
                    <label class="form-label">Last Name</label>                       
                    <input type="text" class="form-control" name="last_name" value="{{auth()->user()->last_name}}" required>
                </div>                
              
                <div class="frm-row">
                    <label class="form-label">Email</label>
                    <input type="email" name="email" maxlength="191" class="form-control" value="{{auth()->user()->email}}">
                </div>

                <div class="frm-row">
                    <label class="form-label">Country</label>
                    <select id="countries" class="form-control custom-select" name="country" required>
                        <option value="" selected disabled>Select Here</option>
                        <option value="Sri Lanka" {{ auth()->user()->country === 'Sri Lanka' ? "selected" : "" }}>Sri Lanka</option>
                    </select>
                </div>

                <div class="frm-row">
                    <label class="form-label">City</label>
                    <select class="form-control areas custom-select" id="city" name="city" >
                        @if(auth()->user()->city)
                            <option value="{{auth()->user()->city}}" selected>{{auth()->user()->city}}</option>
                        @endif
                    </select>
                </div>

                <div class="frm-row">
                    <label class="form-label">Upload Profile Picture <span>(Optional)</span></label>
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

                <div class="frm-row">  
                    <label class="form-label">Bio</label>
                    <textarea name="bio" id="bio" class="form-control" style="height:180px">{{auth()->user()->bio}}</textarea>
                </div> 
                
                <div class="frm-row">  
                    <label class="form-label">ID Card Photo</label>
                    <input type="file" name="id_photo" value="{{auth()->user()->id_photo}}" class="form-control" id="id_photo" placeholder="NIC Photo">
                    <br>
                    @if(auth()->user()->id_photo != null)
                        <img src="{{url('files/agents_id/',auth()->user()->id_photo)}}" style="width: 25%;" alt="" >
                    @endif
                </div> 

                <div class="frm-row">
                    <label class="form-label">NIC Number</label>
                    <input type="text" name="nic_number" maxlength="191" class="form-control" value="{{auth()->user()->nic_number}}" id="nic_number" placeholder="NIC Number">
                </div>
                <div class="frm-row">
                    <label class="form-label">Occupation</label>
                    <input type="text" name="occupation" maxlength="191" class="form-control" value="{{auth()->user()->occupation}}" id="occupation" placeholder="Occupation">
                </div>
                <div class="frm-row">
                    <label class="form-label">Contact Number</label>
                    <input type="number" name="contact_number" maxlength="191" class="form-control" value="{{auth()->user()->contact_number}}" id="contact_number" placeholder="Contact Number">
                </div>
                <div class="frm-row">
                    <label class="form-label">Alternate Contact Number</label>
                    <input type="number" name="contact_number_two" maxlength="191" class="form-control" value="{{auth()->user()->contact_number_two}}" id="contact_number_two" placeholder="Alternative Contact Number">
                </div>
                <div class="frm-row">
                    <label class="form-label">Address</label>
                    <input type="text" name="address" maxlength="191" class="form-control" value="{{auth()->user()->address}}" id="address" placeholder="Address">
                </div>                
                
                <div class="frm-row">
                    <input type="hidden" name="hidden_id" class="form-control" value="{{auth()->user()->id}}" >
                    <button type="submit" class="cta-btn btn-fill">
                        <div class="btn-text">Update</div>
                    </button>
                </div>

               
            </form>
        </div>
    </section>
@endif



@endsection

@push('after-scripts')



<script>

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
            
        });        

    });


</script>

<script>
    $(document).ready(function() {
        let country = <?php echo json_encode (auth()->user()->country) ?>

        $('#countries option').each(function(i){
            if($(this).val() == country) {
                $(this).attr('selected', 'selected');
            }
        });                      

    });
</script>


@endpush
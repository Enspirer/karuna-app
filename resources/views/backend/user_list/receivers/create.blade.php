@extends('backend.layouts.app')

@section('title', __('Create New'))

@section('content')

<form action="{{route('admin.receiver.store')}}" method="post" enctype="multipart/form-data">
{{csrf_field()}}

        <div class="row">    
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">                               
                       
                        <div class="row g-0">
                            <div class="col-md-11">
                                <label class="pro-label">Name <span>(Optional)</span></label>
                                <input type="text" class="form-control" name="name" value="{{old('name')}}">
                            </div>
                            <div class="col-md-1">
                                <div class="form-check form-switch">
                                    <input class="form-check-input mt-3" type="checkbox" name="name_toggle" value="yes" role="switch">
                                </div>
                            </div>                           
                        </div>
                        
                        <div class="row g-0">
                            <div class="col-md-11 mt-3">
                                <label class="pro-label">Nick Name</label>
                                <input type="text" class="form-control" name="nick_name" value="{{old('nick_name')}}" required>
                            </div>                            
                        </div>
                        
                        <div class="row g-3 mt-1">
                            <div class="col-md-6">
                                <label class="pro-label">Age</label>
                                <select class="form-select" name="age" required>
                                    <option selected disabled>Choose...</option>
                                    <option value="15 - 18">15 - 18</option>
                                    <option value="18 - 25">18 - 25</option>
                                    <option value="25 - 30">25 - 30</option>
                                    <option value="30 - 35">30 - 35</option>
                                    <option value="35 - 45">35 - 45</option>
                                    <option value="45 - 55">45 - 55</option>
                                    <option value="55 - 60">55 - 60</option>
                                    <option value="65 - 70">65 - 70</option>
                                    <option value="70 - 75">70 - 75</option>
                                    <option value="75 - 18">75 - 18</option>
                                </select>
                            </div>
                            <!-- Gender -->
                            <div class="col-md-5">
                                <label class="pro-label">Gender</label>
                                <select class="form-select" name="gender" required>
                                    <option selected disabled>Choose...</option>
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                </select>
                            </div>
                        </div>

                        <div class="row g-3 mt-1">
                            <div class="col-12 col-md-6">
                                <div class="form-group">
                                    <label class="pro-label">Country</label>
                                    <input type="text" name="country" maxlength="191" class="form-control" value="{{get_city_details($agent->id,'country')}}" id="country" readonly>
                                </div>
                            </div>
                            <div class="col-12 col-md-5">
                                <div class="form-group">
                                    <label class="pro-label">City</label>
                                    <input type="text" name="city" maxlength="191" class="form-control" value="{{get_city_details($agent->id,'city')}}" id="city" readonly>
                                </div>
                            </div>
                        </div>


                        <!-- NIC -->
                        <div class="row g-0 mb-3">
                            <div class="col-md-11">
                                <label class="pro-label">NIC</label>
                                <input type="text" class="form-control" name="nic_number" value="{{old('nic_number')}}" required>
                            </div>
                        </div>

                        <div class="row g-0 mb-3">
                            <div class="col-md-11">
                                <label class="pro-label">NIC Photo</label>
                                <input type="file" name="nic_photo" class="form-control" id="nic_photo" placeholder="NIC Photo">
                            </div>
                        </div>
                        
                        <!-- Address -->
                        <div class="row g-0 mb-3">
                            <div class="col-md-11">
                                <label class="pro-label">Address</label>
                                <input type="text" class="form-control" name="address" value="{{old('address')}}" required>
                            </div>
                        </div>
                        <!-- Phone, Job -->
                        <div class="row g-0 mb-3">
                            <!-- Phone -->
                            <div class="col-md-5">
                                <label class="pro-label">Phone Number</label>
                                <input type="number" class="form-control" name="phone_number" value="{{old('phone_number')}}">
                            </div>
                            <!-- Job -->
                            <div class="col-md-6">
                                <label class="pro-label">Job</label>
                                <input type="text" class="form-control" name="occupation" value="{{old('occupation')}}">
                            </div>
                        </div>
                        <!-- Bio -->
                        <div class="row g-0">
                            <div class="col-md-11">
                                <label class="pro-label">Bio</label>
                            </div>
                        </div>
                        <div class="row g-0 mb-3">
                            <div class="col-md-11">
                                <textarea class="form-control" style="height:150px;" name="bio">{{old('bio')}}</textarea>
                            </div>
                        </div>
                        
                        <div class="row g-0">
                            <div class="col-md-6">
                                <label class="pro-label">Add Profile Image</label>
                            </div>
                        </div>
                        <div class="row g-0 mb-3">
                            <div class="col-md-11">
                                <div class="form-group">
                                    <div class="input-group" data-toggle="aizuploader" data-type="image">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text bg-soft-secondary font-weight-medium">Browse</div>
                                        </div>
                                        <div class="form-control file-amount">Choose File</div>
                                        <input type="hidden" name="profile_image" value="{{old('profile_image')}}" class="selected-files" >
                                    </div>
                                    <div class="file-preview box sm">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row g-0">
                            <div class="col-md-6">
                                <label class="pro-label">Add Cover Image</label>
                            </div>
                        </div>
                        <div class="row g-0 mb-3">
                            <div class="col-md-11">
                                <div class="form-group">
                                    <div class="input-group" data-toggle="aizuploader" data-type="image">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text bg-soft-secondary font-weight-medium">Browse</div>
                                        </div>
                                        <div class="form-control file-amount">Choose File</div>
                                        <input type="hidden" name="cover_image" value="{{old('cover_image')}}" class="selected-files" >
                                    </div>
                                    <div class="file-preview box sm">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <h4 class="py-4 text-center">Donation related media files</h4>

                        <div class="row g-0">
                            <div class="col-md-6">
                                <label class="pro-label">Add Images <span>(Optional)</span></label>
                            </div>
                            <div class="col-md-5 text-md-end">
                                <label class="pro-label">Add 3 or more </label>
                            </div>
                        </div>
                        <div class="row g-0 mb-3">
                            <div class="col-md-11">
                                <div class="form-group">
                                    <div class="input-group" data-multiple="true" data-toggle="aizuploader" data-type="image">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text bg-soft-secondary font-weight-medium">Browse</div>
                                        </div>
                                        <div class="form-control file-amount">Choose File</div>
                                        <input type="hidden" name="images" value="{{old('images')}}" class="selected-files" >
                                    </div>
                                    <div class="file-preview box sm">
                                    </div>
                                </div>
                            </div>                         
                        </div>
                        <!-- Add videos -->
                        <div class="row g-0">
                            <div class="col-md-6">
                                <label class="pro-label">Add short video clips<span>(Optional)</span></label>
                            </div>
                            <div class="col-md-5 text-md-end">
                                <label class="pro-label">Add 3 or more </label>
                            </div>
                        </div>
                        <div class="row g-0 mb-3">
                            <div class="col-md-11">                                
                                <div class="form-group">
                                    <div class="input-group" data-toggle="aizuploader" data-type="video">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text bg-soft-secondary font-weight-medium">Browse</div>
                                        </div>
                                        <div class="form-control file-amount">Choose File</div>
                                        <input type="hidden" name="videos" value="{{old('videos')}}" class="selected-files" >
                                    </div>
                                    <div class="file-preview box sm">
                                    </div>
                                </div>
                            </div>
                        </div>
                        

                        <div class="row g-0">
                            <div class="col-md-11">
                                <label class="pro-label">Add Voice cut<span>(Optional)</span></label>
                            </div>
                        </div>
                        <div class="row g-0 mb-3">
                            <div class="col-md-11">
                                <div class="form-group">
                                    <div class="input-group" data-toggle="aizuploader" data-type="audio">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text bg-soft-secondary font-weight-medium">Browse</div>
                                        </div>
                                        <div class="form-control file-amount">Choose File</div>
                                        <input type="hidden" name="audios" value="{{old('audios')}}" class="selected-files" >
                                    </div>
                                    <div class="file-preview box sm">
                                    </div>
                                </div>
                            </div>
                        </div>
                        

                        <div class="row g-0">
                            <div class="col-md-11">
                                <label class="pro-label">Requirement</label>
                            </div>
                        </div>
                        <div class="row g-0 mb-3">
                            <div class="col-md-11">
                                <select class="form-select" aria-label="Default select example" name="requirement" onchange="package_type(this);" required>
                                    <option value="" selected disabled>Choose...</option>
                                    @if(count(App\Models\Packages::where('status','Enabled')->get()) != 0)
                                        @foreach(App\Models\Packages::where('status','Enabled')->get() as $package)
                                            <option value="{{$package->id}}">{{$package->name}}</option>
                                        @endforeach
                                    @endif
                                    <option value="Other">Other</option>
                                </select>
                            </div>
                        </div>

                        <!-- About the donation -->

                        <div class="row g-0 mb-3" id="other_description_hide" style="display: none;">
                            <div class="col-md-11">
                                <label class="pro-label">Other Description</label>
                                <textarea class="form-control" style="height:150px;" name="other_description">{{old('other_description')}}</textarea>
                            </div>
                        </div>


                        <!-- About the donation -->
                        <div class="row g-0">
                            <div class="col-md-11">
                                <label class="pro-label">About the donation</label>
                            </div>
                        </div>
                        <div class="row g-0 mb-3">
                            <div class="col-md-11">
                                <textarea class="form-control" style="height:150px;" name="about_donation" required>{{old('about_donation')}}</textarea>
                            </div>
                        </div>

                        <div class="card" style="border-style: dotted;border-width: 3px; padding: 20px; " id="account_details">
                            <h5 class="card-header">Account Details</h5>
                            <div class="card-body">
                                <div class="row g-0 mb-4">
                                    <div class="col-md-6">
                                        <label class="pro-label">Account Name</label>
                                        <input type="text" class="form-control" id="account_name" name="account_name">
                                    </div>
                                    <div class="col-md-5">
                                        <label class="pro-label">Account Number</label>
                                        <input type="text" class="form-control" id="account_number" name="account_number">
                                    </div>
                                </div>
                                <div class="row g-0 mb-4">
                                    <div class="col-md-6">
                                        <label class="pro-label">Bank Name</label>
                                        <input type="text" class="form-control" id="bank_name" name="bank_name">
                                    </div>
                                    <div class="col-md-5">
                                        <label class="pro-label">Branch Name</label>
                                        <input type="text" class="form-control" id="branch_name" name="branch_name">
                                    </div>
                                </div>
                            </div>
                        </div>
                        

                        <div class="row g-0">
                            <div class="col-md-11">
                                @if(count(App\Models\Receivers::where('featured','Enabled')->where('payment_status',null)->get()) < 6 )
                                    <div class="form-group">
                                        <label>Featured <span style="color:red">*<span></label>
                                        <select class="form-control custom-select" name="featured" required>
                                            <option value="Enabled">Enable</option>   
                                            <option value="Disabled" selected>Disable</option>                                
                                        </select>
                                    </div>
                                @else
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label>Featured <span style="color:red">*<span></label>
                                                <select class="form-control custom-select" name="featured" required>
                                                    <option value="Enabled" disabled>Enable</option>   
                                                    <option value="Disabled">Disable</option>                                
                                                </select>
                                            </div>
                                        </div>                                
                                        <div class="col-6">
                                            <h5 class="text-danger" style="margin-top:37px;">* Maximum 6 featured receivers only.</h5>
                                        </div>
                                    </div>
                                @endif
                            </div>
                        </div>


                        <div class="row g-0">
                            <div class="col-md-11">
                                <div class="row">
                                    <div class="col-6">

                                        <div class="form-group">
                                            <label>Status <span style="color:red">*<span></label>
                                            <select class="form-control custom-select" name="status" required>
                                                <option value="Approved">Approve</option>   
                                                <option value="Pending">Pending</option>                                
                                            </select>
                                        </div>
                                        
                                    </div>
                                    <div class="col-6">
                                        <h5 class="text-danger" style="margin-top:37px;">* Please approve the receiver to be active on the system.</h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                </div>
                

                <div class="mt-5 text-right">
                    <input type="hidden" class="form-control mb-3" name="assigned_agent" value="{{$agent->id}}">
                    <input type="submit" class="btn rounded-pill text-light px-4 py-2 ms-2 btn-success" value="Submit" />
                </div>
        </div><br> 
    
    </div>
</form>
<br><br>

  
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
    function package_type(that) {
        
        if (that.value == 'Other') {
            document.getElementById("other_description_hide").style.display = "block";
        } else {
            document.getElementById("other_description_hide").style.display = "none";
        }
    
        // if (that.value == 'Other') {
        //     document.getElementById("account_details").style.display = "block";
        // } else {
        //     document.getElementById("account_details").style.display = "none";
        // }
        
    }
</script> 



@endsection

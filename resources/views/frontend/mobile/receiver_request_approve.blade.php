@extends('frontend.layouts.mobile_app')

@section('title', app_name() . ' | ' . __('navs.general.home'))

@section('content')

<!-- ======== Top Nav ======== -->
<section class="app-bar-section">
    <div class="mobile-container">
        <div class="inner-wrapper">
            <!-- <a href="{{route('frontend.user.mobile.index')}}" class="back-btn"> -->
            <a href="#" onclick="history.back()" class="back-btn">
                <i class="fa-solid fa-arrow-left"></i>
            </a>
            <div class="title"> Edit {{$receiver->name}}'s profile</div>
        </div>
    </div>
</section>
<!-- ======== Top Nav End ======== -->

<section class="form-section">
    <div class="mobile-container">
        <form action="{{route('frontend.user.mobile_receiver_request_update')}}" method="post" enctype="multipart/form-data">
        {{csrf_field()}}
            <!-- Name -->
            <div class="frm-row">
                <div class="frm-col-10">
                    <label class="form-label">Name <span>(Optional)</span></label>
                    @if($receiver_request->name == $receiver->name)
                        <input type="text" class="form-control" name="name" value="{{$receiver_request->name}}" disabled>
                    @else
                        <input type="text" class="form-control" style="border-color:red;" name="name" value="{{$receiver_request->name}}" disabled>
                    @endif
                </div>
                <div class="frm-col-2">
                    <label class="form-label"></label>
                    <div class="form-switch">
                        @if($receiver_request->name_toggle == 'yes')
                            @if($receiver_request->name_toggle == $receiver->name_toggle)
                                <input class="form-check-input" type="checkbox" name="name_toggle" value="yes" role="switch" disabled checked>
                            @else
                                <input class="form-check-input" type="checkbox" name="name_toggle" style="border-color:red; border-width: 3px;" value="yes" role="switch" disabled checked>
                            @endif
                        @else
                            @if($receiver_request->name_toggle == $receiver->name_toggle)
                                <input class="form-check-input" type="checkbox" name="name_toggle" value="yes" role="switch" disabled>
                            @else
                                <input class="form-check-input" type="checkbox" style="border-color:red; border-width: 3px;" name="name_toggle" value="yes" role="switch" disabled>
                            @endif
                        @endif
                    </div>
                </div>
            </div>
            <!-- Nick Name -->
            <div class="frm-row">
                <label class="form-label">Nick Name</label>
                @if($receiver_request->nick_name == $receiver->nick_name)
                    <input type="text" class="form-control" name="nick_name" value="{{$receiver_request->nick_name}}" disabled>
                @else
                    <input type="text" class="form-control" name="nick_name" style="border-color:red;" value="{{$receiver_request->nick_name}}" disabled>
                @endif
            </div>


            <div class="frm-row">    
                <label class="form-label">Age</label>
                @if($receiver_request->age == $receiver->age)
                    <select class="form-select" name="age" disabled>
                        <option selected disabled>Choose...</option>
                        <option value="15 - 18" {{$receiver_request->age == '15 - 18' ? "selected" : ""}}>15 - 18</option>
                        <option value="18 - 25" {{$receiver_request->age == '18 - 25' ? "selected" : ""}}>18 - 25</option>
                        <option value="25 - 30" {{$receiver_request->age == '25 - 30' ? "selected" : ""}}>25 - 30</option>
                        <option value="30 - 35" {{$receiver_request->age == '30 - 35' ? "selected" : ""}}>30 - 35</option>
                        <option value="35 - 45" {{$receiver_request->age == '35 - 45' ? "selected" : ""}}>35 - 45</option>
                        <option value="45 - 55" {{$receiver_request->age == '45 - 55' ? "selected" : ""}}>45 - 55</option>
                        <option value="55 - 60" {{$receiver_request->age == '55 - 60' ? "selected" : ""}}>55 - 60</option>
                        <option value="65 - 70" {{$receiver_request->age == '65 - 70' ? "selected" : ""}}>65 - 70</option>
                        <option value="70 - 75" {{$receiver_request->age == '70 - 75' ? "selected" : ""}}>70 - 75</option>
                        <option value="75 - 18" {{$receiver_request->age == '75 - 18' ? "selected" : ""}}>75 - 18</option>
                    </select>
                @else
                    <select class="form-select" name="age" style="border-color:red;" disabled>
                        <option selected disabled>Choose...</option>
                        <option value="15 - 18" {{$receiver_request->age == '15 - 18' ? "selected" : ""}}>15 - 18</option>
                        <option value="18 - 25" {{$receiver_request->age == '18 - 25' ? "selected" : ""}}>18 - 25</option>
                        <option value="25 - 30" {{$receiver_request->age == '25 - 30' ? "selected" : ""}}>25 - 30</option>
                        <option value="30 - 35" {{$receiver_request->age == '30 - 35' ? "selected" : ""}}>30 - 35</option>
                        <option value="35 - 45" {{$receiver_request->age == '35 - 45' ? "selected" : ""}}>35 - 45</option>
                        <option value="45 - 55" {{$receiver_request->age == '45 - 55' ? "selected" : ""}}>45 - 55</option>
                        <option value="55 - 60" {{$receiver_request->age == '55 - 60' ? "selected" : ""}}>55 - 60</option>
                        <option value="65 - 70" {{$receiver_request->age == '65 - 70' ? "selected" : ""}}>65 - 70</option>
                        <option value="70 - 75" {{$receiver_request->age == '70 - 75' ? "selected" : ""}}>70 - 75</option>
                        <option value="75 - 18" {{$receiver_request->age == '75 - 18' ? "selected" : ""}}>75 - 18</option>
                    </select>
                @endif
            </div>
                
            <div class="frm-row">
                <label class="form-label">Gender</label>
                @if($receiver_request->gender == $receiver->gender)
                    <select class="form-select" name="gender" disabled>
                        <option selected disabled>Choose...</option>
                        <option value="Male" {{$receiver_request->gender == 'Male' ? "selected" : ""}}>Male</option>
                        <option value="Female" {{$receiver_request->gender == 'Female' ? "selected" : ""}}>Female</option>
                    </select>
                @else
                    <select class="form-select" name="gender" style="border-color:red;" disabled>
                        <option selected disabled>Choose...</option>
                        <option value="Male" {{$receiver_request->gender == 'Male' ? "selected" : ""}}>Male</option>
                        <option value="Female" {{$receiver_request->gender == 'Female' ? "selected" : ""}}>Female</option>
                    </select>
                @endif                        
            </div>

            <div class="frm-row">
                <div class="frm-col">
                    <label class="form-label">Country</label>
                    <input type="text" name="country" maxlength="191" class="form-control" value="{{auth()->user()->country}}" id="country" disabled>
                </div>
                <div class="frm-col">
                    <label class="form-label">City</label>
                    <input type="text" name="city" maxlength="191" class="form-control" value="{{auth()->user()->city}}" id="city" disabled>                                                 
                </div>
            </div>
            
            
            <div class="frm-row">
                <label class="form-label">NIC</label>
                @if($receiver_request->nic_number == $receiver->nic_number)
                    <input type="text" class="form-control" value="{{$receiver_request->nic_number}}" name="nic_number" disabled>
                @else
                    <input type="text" class="form-control" style="border-color:red;" value="{{$receiver_request->nic_number}}" name="nic_number" disabled>
                @endif
            </div>
            
            <div class="frm-row">
                <label class="form-label">Address</label>
                @if($receiver_request->address == $receiver->address)
                    <input type="text" class="form-control" value="{{$receiver_request->address}}" name="address" disabled>
                @else
                    <input type="text" class="form-control" style="border-color:red;" value="{{$receiver_request->address}}" name="address" disabled>
                @endif
            </div>
            
            <div class="frm-row">
                <label class="form-label">Phone Number</label>
                @if($receiver_request->phone_number == $receiver->phone_number)
                    <input type="text" class="form-control" value="{{$receiver_request->phone_number}}" name="phone_number" disabled>
                @else
                    <input type="text" class="form-control" style="border-color:red;" value="{{$receiver_request->phone_number}}" name="phone_number" disabled>
                @endif
            </div>

            <div class="frm-row">                
                <label class="form-label">Job</label>
                @if($receiver_request->occupation == $receiver->occupation)
                    <input type="text" class="form-control" value="{{$receiver_request->occupation}}" name="occupation" disabled>
                @else
                    <input type="text" class="form-control" style="border-color:red;" value="{{$receiver_request->occupation}}" name="occupation" disabled>
                @endif
            </div>


            <!-- Bio -->
            <div class="frm-row">
                <label class="form-label">Bio</label>
                @if($receiver_request->bio == $receiver->bio)
                    <textarea class="form-control" style="height:150px;" name="bio" disabled>{{$receiver_request->bio}}</textarea>
                @else
                    <textarea class="form-control" style="height:150px; border-color:red;" name="bio" disabled>{{$receiver_request->bio}}</textarea>
                @endif
            </div>
            
            <div class="row g-0">
                <div class="col-md-6">
                    <label class="pro-label">Add Profile Image</label>
                </div>
            </div>
            <div class="g-0 mb-3">
                @if($receiver_request->profile_image == $receiver->profile_image)
                    <img src="{{uploaded_asset($receiver_request->profile_image)}}" width="25%" alt="">
                @else                                
                    <img src="{{uploaded_asset($receiver_request->profile_image)}}" style="border: 1px solid red;" width="25%" alt="">
                @endif
            </div>

            <div class="row g-0">
                <div class="col-md-6">
                    <label class="pro-label">Add Cover Image</label>
                </div>
            </div>
            <div class="g-0 mb-3">
                @if($receiver_request->cover_image == $receiver->cover_image)
                    <img src="{{uploaded_asset($receiver_request->cover_image)}}" width="25%" alt="">
                @else                                
                    <img src="{{uploaded_asset($receiver_request->cover_image)}}" style="border: 1px solid red;" width="25%" alt="">
                @endif
            </div>

            
            <div class="row g-0">
                <div class="col-md-6">
                    <label class="pro-label">Add Images <span>(Optional)</span></label>
                </div>
            </div>
            <div class="g-0 mb-3">
                @if($receiver_request->images != null)
                    @php
                        $req_images = preg_split ("/\,/", $receiver_request->images);
                    @endphp

                    @foreach($req_images as $key=> $req_image)
                        @if($receiver_request->images == $receiver->images)
                            <img src="{{uploaded_asset($req_image)}}" class="mb-3" style="height:100px; object-fit:cover" width="25%" alt="">
                        @else                                
                            <img src="{{uploaded_asset($req_image)}}" class="mb-3" style="border: 1px solid red; height:100px; object-fit:cover" width="25%" alt="">
                        @endif
                    @endforeach
                @endif
            </div>
            <!-- Add videos -->
            <div class="row g-0">
                <div class="col-md-6">
                    <label class="pro-label">Add short video clips<span>(Optional)</span></label>
                </div>
            </div>
                        
            <div class="row g-0 mb-3">
                <video width="320" height="240" controls>
                    <source src="{{uploaded_asset($receiver_request->videos)}}" type="video/mp4">
                    Your browser does not support the video tag.
                </video>
            </div>
            <!-- Add audios -->
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
                            <input type="hidden" name="audios" value="{{$receiver->audios}}" class="selected-files" >
                        </div>
                        <div class="file-preview box sm">
                        </div>
                    </div>
                </div>               
            </div>


            <div class="frm-row">
                <label class="form-label">Requirement</label>
                @if($receiver_request->requirement == $receiver->requirement)
                    <select class="form-select" aria-label="Default select example" id="requirement_edit" name="requirement" onchange="package_type_edit(this);" disabled>
                        <option selected disabled>Choose...</option>
                        @if(count(App\Models\Packages::where('status','Enabled')->get()) != 0)
                            @foreach(App\Models\Packages::where('status','Enabled')->get() as $package)
                                <option value="{{$package->id}}" {{$receiver_request->requirement == $package->id ? "selected" : ""}}>{{$package->name}}</option>
                            @endforeach
                        @endif
                        <option value="Other" {{$receiver_request->requirement == 'Other' ? "selected" : ""}}>Other</option>
                    </select>
                @else
                    <select class="form-select" style="border-color:red;" aria-label="Default select example" id="requirement_edit" name="requirement" onchange="package_type_edit(this);" disabled>
                        <option selected disabled>Choose...</option>
                        @if(count(App\Models\Packages::where('status','Enabled')->get()) != 0)
                            @foreach(App\Models\Packages::where('status','Enabled')->get() as $package)
                                <option value="{{$package->id}}" {{$receiver_request->requirement == $package->id ? "selected" : ""}}>{{$package->name}}</option>
                            @endforeach
                        @endif
                        <option value="Other" {{$receiver_request->requirement == 'Other' ? "selected" : ""}}>Other</option>
                    </select>
                @endif
            </div>


            <div class="frm-row" id="other_description_hide_edit" style="display: none;">
                <label class="form-label">Other Description</label>
                @if($receiver_request->other_description == $receiver->other_description)
                    <textarea class="form-control" style="height:150px;" name="other_description" disabled>{{$receiver_request->other_description}}</textarea>
                @else
                    <textarea class="form-control" style="height:150px; border-color:red;" name="other_description" disabled>{{$receiver_request->other_description}}</textarea>
                @endif
            </div>

            
            <div class="frm-row">
                <label class="form-label">About the donation</label>
                @if($receiver_request->about_donation == $receiver->about_donation)
                    <textarea class="form-control" style="height:150px;" name="about_donation" disabled>{{$receiver_request->about_donation}}</textarea>
                @else
                    <textarea class="form-control" style="height:150px; border-color:red;" name="about_donation" disabled>{{$receiver_request->about_donation}}</textarea>
                @endif
            </div>
            

            <div class="card" style="border-style: dotted;border-width: 3px; padding: 20px; display: none;" id="account_details_edit">
                <h5 class="card-header">Account Details</h5>
                <div class="card-body">
                    <div class="frm-row">
                        <label class="form-label">Account Number</label>
                        @if($receiver_request->account_details != null && $receiver->account_details != null)
                            @if(json_decode($receiver_request->account_details)->account_number == json_decode($receiver->account_details)->account_number)
                                <input type="text" class="form-control" name="account_number" value="{{json_decode($receiver_request->account_details)->account_number}}" disabled>
                            @else
                                <input type="text" class="form-control" style="border-color:red;" name="account_number" value="{{json_decode($receiver_request->account_details)->account_number}}" disabled>
                            @endif
                        @else
                            <input type="text" class="form-control" name="account_number" value="{{json_decode($receiver_request->account_details)->account_number}}" disabled>
                        @endif
                    </div>
                    <div class="frm-row">
                        <label class="form-label">Bank Name</label>
                        @if($receiver_request->account_details != null && $receiver->account_details != null)
                            @if(json_decode($receiver_request->account_details)->bank_name == json_decode($receiver->account_details)->bank_name)
                                <input type="text" class="form-control" name="bank_name" value="{{json_decode($receiver_request->account_details)->bank_name}}" disabled>
                            @else
                                <input type="text" class="form-control" style="border-color:red;" name="bank_name" value="{{json_decode($receiver_request->account_details)->bank_name}}" disabled>
                            @endif
                        @else
                            <input type="text" class="form-control" name="bank_name" value="{{json_decode($receiver_request->account_details)->bank_name}}" disabled>
                        @endif
                    </div>
                    <div class="frm-row">
                        <label class="form-label">Branch Name</label>
                        @if($receiver_request->account_details != null && $receiver->account_details != null)
                            @if(json_decode($receiver_request->account_details)->branch_name == json_decode($receiver->account_details)->branch_name)
                                <input type="text" class="form-control" name="branch_name" value="{{json_decode($receiver_request->account_details)->branch_name}}" disabled>
                            @else
                                <input type="text" class="form-control" style="border-color:red;" name="branch_name" value="{{json_decode($receiver_request->account_details)->branch_name}}" disabled>
                            @endif
                        @else
                            <input type="text" class="form-control" name="branch_name" value="{{json_decode($receiver_request->account_details)->branch_name}}" disabled>
                        @endif
                    </div>
                </div>
            </div>
            
            

            <div class="frm-row">
                <input type="hidden" name="hidden_id" value="{{$receiver_request->id}}">
                <input type="hidden" name="status" value="Approved">
                
                <button type="submit" class="cta-btn btn-fill">
                    <div class="btn-text">Approve</div>
                </button>
            </div>
        </form>
    </div>
</section>

@endsection

@push('after-scripts')

<script>
    function package_type_edit(that) {
        
        if (that.value == 'Other') {
            document.getElementById("other_description_hide_edit").style.display = "block";
        } else {
            document.getElementById("other_description_hide_edit").style.display = "none";
        }
    
        if (that.value == 'Other') {
            document.getElementById("account_details_edit").style.display = "block";
        } else {
            document.getElementById("account_details_edit").style.display = "none";
        }
        
    }
</script> 


<script>
    $(document).ready(function(){
        if($('#requirement_edit').val() == 'Other'){
            $('#other_description_hide_edit').css('display','block');
            $('#account_details_edit').css('display','block');
        }
        else{
            $('#other_description_hide_edit').css('display','none');
            $('#account_details_edit').css('display','none');
        }            
    });
</script>

@endpush
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
            @if($receiver->name_toggle == 'yes')
                <div class="title">Edit {{$receiver->nick_name}}'s profile</div>
            @else
                <div class="title">Edit {{$receiver->name}}'s profile</div>
            @endif
        </div>
    </div>
</section>
<!-- ======== Top Nav End ======== -->

<section class="form-section">
    <div class="mobile-container">
        <form action="{{route('frontend.user.update_receiver')}}" method="post" enctype="multipart/form-data">
        {{csrf_field()}}
            <!-- Name -->
            <div class="frm-row">
                <div class="frm-col-10">
                    <label class="form-label">Name <span>(Optional)</span></label>
                    <input type="text" class="form-control" name="name" value="{{$receiver->name}}">
                </div>
                <div class="frm-col-2">
                    <label class="form-label"></label>
                    <div class="form-switch">
                        @if($receiver->name_toggle == 'yes')
                            <input class="form-check-input" type="checkbox" name="name_toggle" value="yes" role="switch" checked>
                        @else
                            <input class="form-check-input" type="checkbox" name="name_toggle" value="yes" role="switch">
                        @endif
                    </div>
                </div>
            </div>
            <!-- Nick Name -->
            <div class="frm-row">
                <label class="form-label">Nick Name</label>
                <input type="text" class="form-control" name="nick_name" value="{{$receiver->nick_name}}" required>
            </div>


            <!-- Age, Gender, City -->
            <div class="frm-row">
                <label class="form-label">Age</label>
                <select class="form-select" name="age" required>
                    <option selected disabled>Choose...</option>
                    <option value="15 - 18" {{$receiver->age == '15 - 18' ? "selected" : ""}}>15 - 18</option>
                    <option value="18 - 25" {{$receiver->age == '18 - 25' ? "selected" : ""}}>18 - 25</option>
                    <option value="25 - 30" {{$receiver->age == '25 - 30' ? "selected" : ""}}>25 - 30</option>
                    <option value="30 - 35" {{$receiver->age == '30 - 35' ? "selected" : ""}}>30 - 35</option>
                    <option value="35 - 45" {{$receiver->age == '35 - 45' ? "selected" : ""}}>35 - 45</option>
                    <option value="45 - 55" {{$receiver->age == '45 - 55' ? "selected" : ""}}>45 - 55</option>
                    <option value="55 - 60" {{$receiver->age == '55 - 60' ? "selected" : ""}}>55 - 60</option>
                    <option value="65 - 70" {{$receiver->age == '65 - 70' ? "selected" : ""}}>65 - 70</option>
                    <option value="70 - 75" {{$receiver->age == '70 - 75' ? "selected" : ""}}>70 - 75</option>
                    <option value="75 - 18" {{$receiver->age == '75 - 18' ? "selected" : ""}}>75 - 18</option>
                </select>
            </div>
            
            <div class="frm-row">
                <label class="form-label">Gender</label>
                <select class="form-select" name="gender" required>
                    <option selected disabled>Choose...</option>
                    <option value="Male" {{$receiver->gender == 'Male' ? "selected" : ""}}>Male</option>
                    <option value="Female" {{$receiver->gender == 'Female' ? "selected" : ""}}>Female</option>
                </select>
            </div>

            <div class="frm-row">
                <div class="frm-col">
                    <label class="form-label">Country</label>
                    <input type="text" name="country" maxlength="191" class="form-control" value="{{auth()->user()->country}}" id="country" readonly>
                </div>
                <div class="frm-col">
                    <label class="form-label">City</label>
                    <input type="text" name="city" maxlength="191" class="form-control" value="{{auth()->user()->city}}" id="city" readonly>
                </div>               
            </div>
                        
            <div class="frm-row">
                <label class="form-label">NIC</label>
                <input type="text" class="form-control" value="{{$receiver->nic_number}}" name="nic_number" required>
            </div>
            
            <div class="frm-row">
                <label class="form-label">Address</label>
                <input type="text" class="form-control" value="{{$receiver->address}}" name="address" required>
            </div>
            
            <div class="frm-row">                
                <div class="frm-col">
                    <label class="form-label">Phone Number</label>
                    <input type="number" class="form-control" value="{{$receiver->phone_number}}" name="phone_number" required>
                </div>                
                <div class="frm-col">
                    <label class="form-label">Job</label>
                    <input type="text" class="form-control" value="{{$receiver->occupation}}" name="occupation" required>
                </div>
            </div>

            <!-- Bio -->
            <div class="frm-row">
                <label class="form-label">Bio</label>
                <textarea class="form-control" style="height:150px;" name="bio" required>{{$receiver->bio}}</textarea>
            </div>
            


            <!-- Add Images -->
            <div class="frm-row">
                <div class="border-wrappre">
                    <label class="pro-label">Add Profile Image</label>
                    <div class="form-group">
                        <div class="input-group" data-toggle="aizuploader" data-type="image">
                            <div class="input-group-prepend">
                                <div class="input-group-text bg-soft-secondary font-weight-medium">Browse</div>
                            </div>
                            <div class="form-control file-amount">Choose File</div>
                            <input type="hidden" name="profile_image" value="{{$receiver->profile_image}}" class="selected-files" >
                        </div>
                        <div class="file-preview box sm">
                        </div>
                    </div>
                </div>
            </div>
            <!-- Add short video clips -->
            <div class="frm-row">
                <div class="border-wrappre">
                    <label class="pro-label">Add Cover Image</label>
                    <div class="form-group">
                        <div class="input-group" data-toggle="aizuploader" data-type="image">
                            <div class="input-group-prepend">
                                <div class="input-group-text bg-soft-secondary font-weight-medium">Browse</div>
                            </div>
                            <div class="form-control file-amount">Choose File</div>
                            <input type="hidden" name="cover_image" value="{{$receiver->cover_image}}" class="selected-files" >
                        </div>
                        <div class="file-preview box sm">
                        </div>
                    </div>
                </div>
            </div>


            <!-- Add Images -->
            <div class="frm-row">
                <div class="border-wrappre">
                    <label class="form-label">Add Images <span>(Optional)</span></label>
                    <div class="form-group">
                        <div class="input-group" data-multiple="true" data-toggle="aizuploader" data-type="image">
                            <div class="input-group-prepend">
                                <div class="input-group-text bg-soft-secondary font-weight-medium">Browse</div>
                            </div>
                            <div class="form-control file-amount">Choose File</div>
                            <input type="hidden" name="images" value="{{$receiver->images}}" class="selected-files" >
                        </div>
                        <div class="file-preview box sm">
                        </div>
                    </div>
                </div>
            </div>
            <!-- Add short video clips -->
            <div class="frm-row">
                <div class="border-wrappre">
                    <label class="form-label">Add short video clips <span>(Optional)</span></label>
                    <div class="form-group">
                        <div class="input-group" data-toggle="aizuploader" data-type="video">
                            <div class="input-group-prepend">
                                <div class="input-group-text bg-soft-secondary font-weight-medium">Browse</div>
                            </div>
                            <div class="form-control file-amount">Choose File</div>
                            <input type="hidden" name="videos" value="{{$receiver->videos}}" class="selected-files" >
                        </div>
                        <div class="file-preview box sm">
                        </div>
                    </div>
                </div>
            </div>
            <!-- Add Voice Out -->
            <div class="frm-row">
                <div class="border-wrappre">
                    <label class="form-label">Add Voice Out <span>(Optional)</span></label>
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
            <!-- Requirement -->
            <div class="frm-row">
                <label class="form-label">Requirement</label>
                <select class="form-select" aria-label="Default select example" id="requirement_edit" name="requirement" onchange="package_type_edit(this);" required>
                    <option selected disabled>Choose...</option>
                    @if(count(App\Models\Packages::where('status','Enabled')->get()) != 0)
                        @foreach(App\Models\Packages::where('status','Enabled')->get() as $package)
                            <option value="{{$package->id}}" {{$receiver->requirement == $package->id ? "selected" : ""}}>{{$package->name}}</option>
                        @endforeach
                    @endif
                    <option value="Other" {{$receiver->requirement == 'Other' ? "selected" : ""}}>Other</option>
                </select>
            </div>

            <div class="frm-row" id="other_description_hide_edit" style="display: none;">
                <label class="form-label">Other Description</label>
                <textarea class="form-control" style="height:150px;" name="other_description">{{$receiver->other_description}}</textarea>
            </div>


            <!-- About the donation -->
            <div class="frm-row">
                <label class="form-label">About the donation</label>
                <textarea class="form-control" style="height:150px;" name="about_donation" required>{{$receiver->about_donation}}</textarea>
            </div>

            <div class="card" style="border-style: dotted;border-width: 3px; padding: 5px; display: none;" id="account_details_edit">
                <h5 class="card-header">Account Details</h5>
                <div class="card-body">
                    @if($receiver->account_details != null)
                        <div class="frm-row">
                            <div class="frm-col">
                                <label class="form-label">Account Number</label>
                                <input type="text" class="form-control" name="account_number" value="{{json_decode($receiver->account_details)->account_number}}">
                            </div>
                            <div class="frm-col">
                                <label class="form-label">Bank Name</label>
                                <input type="text" class="form-control" name="bank_name" value="{{json_decode($receiver->account_details)->bank_name}}">
                            </div>
                        </div>
                        <div class="frm-row">
                            <label class="pro-label">Branch Name</label>
                            <input type="text" class="form-control" name="branch_name" value="{{json_decode($receiver->account_details)->branch_name}}">
                        </div>
                    @else
                        <div class="frm-row">
                            <label class="form-label">Account Number</label>
                            <input type="text" class="form-control" name="account_number">
                        </div>
                        <div class="frm-row">
                            <label class="form-label">Bank Name</label>
                            <input type="text" class="form-control" name="bank_name">
                        </div>
                        <div class="frm-row">
                            <label class="form-label">Branch Name</label>
                            <input type="text" class="form-control" name="branch_name">
                        </div>
                    @endif
                </div>
            </div>

            <!-- Submit Button -->
            <div class="frm-row">
                <input type="hidden" class="form-control" name="hidden_id" value="{{$receiver->id}}">                
                <button type="submit" class="cta-btn btn-fill mt-4">
                    <div class="btn-text">Update</div>
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
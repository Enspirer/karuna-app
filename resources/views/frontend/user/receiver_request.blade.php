@extends('frontend.layouts.dashboard_app')

@section('title', app_name() . ' | ' . __('navs.general.home'))

@section('content')

<section class="receiver-profile-section">
    <div class="profile-summery-block">
        <div class="header" style="background-image: url('{{uploaded_asset($receiver->cover_image)}}');">
            
            <div class="dp-block">
                <img src="{{ uploaded_asset($receiver->profile_image) }}" alt="">
               
            </div>
        </div>
        <div class="name">{{$receiver->name}}</div>
        <div class="status">Receiver</div>
        <div class="info-table-wrapper">
            <table class="info-table">
                <tbody>
                <tr>
                        <td>Nick Name</td>
                        <td>{{$receiver->nick_name}}</td>
                    </tr>
                    <tr>
                        <td>Age</td>
                        <td>{{$receiver->age}}</td>
                    </tr>
                    <tr>
                        <td>Gender</td>
                        <td>{{$receiver->gender}}</td>
                    </tr>
                    <tr>
                        <td>Address</td>
                        <td>{{$receiver->address}}</td>
                    </tr>
                    <tr>
                        <td>Phone Number</td>
                        <td>{{$receiver->phone_number}}</td>
                    </tr>
                    @if($receiver->requirement == 'Other')
                        <tr>
                            <td>Account Number</td>
                            <td>{{json_decode($receiver->account_details)->account_number}}</td>
                        </tr>
                    @endif
                    <tr>
                        <td>City</td>
                        <td>{{$receiver->city}}</td>
                    </tr>
                    <tr>
                        <td>NIC</td>
                        <td>{{$receiver->nic_number}}</td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="gallery">
            @if($receiver->images != null)
                @php
                    $req_images = preg_split ("/\,/", $receiver->images);
                @endphp
                <div class="row">
                    @foreach($req_images as $key=> $req_image)
                        <div class="col-4">
                            <img src="{{uploaded_asset($req_image)}}" class="mb-3" style="height:80px; object-fit:cover" width="100%" alt="">
                        </div>
                    @endforeach
                </div>
            @endif
        </div>
    </div>
    <div class="edit-profile-block">
        <form action="">
            <div class="inner-wrapper db-form">
                <div class="row g-0">
                    <div class="col">
                        <div class="title">Edit this receiver profile</div>
                    </div>
                </div>
                <!-- Name -->
                <div class="row g-0">
                    <div class="col-md-11">
                        <label class="pro-label">Name <span>(Optional)</span></label>
                    </div>
                </div>
                <div class="row g-0 mb-3">
                    <div class="col-md-10">
                        @if($receiver_request->name == $receiver->name)
                            <input type="text" class="form-control" name="name" value="{{$receiver_request->name}}" disabled>
                        @else
                            <input type="text" class="form-control" style="border-color:red;" name="name" value="{{$receiver_request->name}}" disabled>
                        @endif
                    </div>
                    <div class="col-md-1">
                        <div class="form-check form-switch">
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
                    <div class="col-md-1">
                        <div class="tooltip-block">
                            <i class="bi bi-question-circle"></i>
                            <div class="pro-tooltip">
                                <div class="header">About toggle</div>
                                <div class="body">You can choose whether your name display everyone or not. If you want
                                    to hide your name and profile picture you must tick this toggle. After you tick this
                                    toggle your profile picture and name will hide from your listing.</div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Nick Name -->
                <div class="row g-0">
                    <div class="col-md-11">
                        <label class="pro-label">Nick Name</label>
                    </div>
                </div>
                <div class="row g-0 mb-3">
                    <div class="col-md-11">        
                        @if($receiver_request->nick_name == $receiver->nick_name)
                            <input type="text" class="form-control" name="nick_name" value="{{$receiver_request->nick_name}}" disabled>
                        @else
                            <input type="text" class="form-control" name="nick_name" style="border-color:red;" value="{{$receiver_request->nick_name}}" disabled>
                        @endif

                    </div>
                    <div class="col-md-1">
                        <div class="tooltip-block">
                            <i class="bi bi-question-circle"></i>
                            <div class="pro-tooltip">
                                <div class="header">About toggle</div>
                                <div class="body">You can choose whether your name display everyone or not. If you want
                                    to hide your name and profile picture you must tick this toggle. After you tick this
                                    toggle your profile picture and name will hide from your listing.</div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Age, Gender, City -->
                
                <div class="row g-3 mb-3">
                    <!-- Age -->
                    <div class="col-md-6">
                        <label class="pro-label">Age</label>
                        @if($receiver_request->age == $receiver->age)
                            <input type="number" class="form-control" value="{{$receiver_request->age}}" name="age" min="10" max="100" disabled>
                        @else
                            <input type="number" class="form-control" value="{{$receiver_request->age}}" style="border-color:red;" name="age" min="10" max="100" disabled>
                        @endif
                    </div>
                    <!-- Gender -->
                    <div class="col-md-5">
                        <label class="pro-label">Gender</label>
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
                </div>

                <div class="row g-3 mb-3">
                    <div class="col-12 col-md-6">
                        <div class="form-group">
                            <label class="pro-label">Country</label>
                            <input type="text" name="country" maxlength="191" class="form-control" value="{{auth()->user()->country}}" id="country" disabled>
                        </div>
                    </div>
                    <div class="col-12 col-md-5">
                        <div class="form-group">
                            <label class="pro-label">City</label>
                            <input type="text" name="city" maxlength="191" class="form-control" value="{{auth()->user()->city}}" id="city" disabled>                                                 
                        </div>
                    </div>
                </div>
                
                <!-- NIC -->
                <div class="row g-0 mb-3">
                    <div class="col-md-11">
                        <label class="pro-label">NIC</label>
                        @if($receiver_request->nic_number == $receiver->nic_number)
                            <input type="text" class="form-control" value="{{$receiver_request->nic_number}}" name="nic_number" disabled>
                        @else
                            <input type="text" class="form-control" style="border-color:red;" value="{{$receiver_request->nic_number}}" name="nic_number" disabled>
                        @endif
                    </div>
                </div>
                <!-- Address -->
                <div class="row g-0 mb-3">
                    <div class="col-md-11">
                        <label class="pro-label">Address</label>
                        @if($receiver_request->address == $receiver->address)
                            <input type="text" class="form-control" value="{{$receiver_request->address}}" name="address" disabled>
                        @else
                            <input type="text" class="form-control" style="border-color:red;" value="{{$receiver_request->address}}" name="address" disabled>
                        @endif
                    </div>
                </div>
                <!-- Phone, Job -->
                <div class="row g-0 mb-3">
                    <!-- Phone -->
                    <div class="col-md-5">
                        <label class="pro-label">Phone Number</label>
                        @if($receiver_request->phone_number == $receiver->phone_number)
                            <input type="text" class="form-control" value="{{$receiver_request->phone_number}}" name="phone_number" disabled>
                        @else
                            <input type="text" class="form-control" style="border-color:red;" value="{{$receiver_request->phone_number}}" name="phone_number" disabled>
                        @endif
                    </div>
                    <!-- Job -->
                    <div class="col-md-6">
                        <label class="pro-label">Job</label>
                        @if($receiver_request->occupation == $receiver->occupation)
                            <input type="text" class="form-control" value="{{$receiver_request->occupation}}" name="occupation" disabled>
                        @else
                            <input type="text" class="form-control" style="border-color:red;" value="{{$receiver_request->occupation}}" name="occupation" disabled>
                        @endif
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
                        @if($receiver_request->bio == $receiver->bio)
                            <textarea class="form-control" style="height:150px;" name="bio" disabled>{{$receiver_request->bio}}</textarea>
                        @else
                            <textarea class="form-control" style="height:150px; border-color:red;" name="bio" disabled>{{$receiver_request->bio}}</textarea>
                        @endif
                    </div>                    
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


                <!-- Add Images -->
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
                                <img src="{{uploaded_asset($req_image)}}" class="mb-3" style="height:100px; object-fit:cover" width="25%" alt="">
                        @endforeach
                    @endif
                </div>
                <!-- Add videos -->
                <div class="row g-0">
                    <div class="col-md-6">
                        <label class="pro-label">Add short video clips<span>(Optional)</span></label>
                    </div>
                    <div class="col-md-5 text-md-end">
                        <label class="pro-label">Add 1 </label>
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
                    <div class="col-md-1">
                        <div class="tooltip-block">
                            <i class="bi bi-question-circle"></i>
                            <div class="pro-tooltip">
                                <div class="header">About toggle</div>
                                <div class="body">You can choose whether your name display everyone or not. If you want
                                    to hide your name and profile picture you must tick this toggle. After you tick this
                                    toggle your profile picture and name will hide from your listing.</div>
                            </div>
                        </div>
                    </div>
                </div>



                <!-- Requirement -->
                <div class="row g-0">
                    <div class="col-md-11">
                        <label class="pro-label">Requirement</label>
                    </div>
                </div>
                
                
                <div class="row g-0 mb-3">
                    <div class="col-md-11">
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
                    <div class="col-md-1">
                        <div class="tooltip-block">
                            <i class="bi bi-question-circle"></i>
                            <div class="pro-tooltip">
                                <div class="header">About toggle</div>
                                <div class="body">You can choose whether your name display everyone or not. If you want
                                    to hide your name and profile picture you must tick this toggle. After you tick this
                                    toggle your profile picture and name will hide from your listing.</div>
                            </div>
                        </div>
                    </div>
                </div>


               
                <div class="row g-0 mb-3" id="other_description_hide_edit" style="display: none;">
                    <div class="col-md-11">
                        <label class="pro-label">Other Description</label>
                        @if($receiver_request->other_description == $receiver->other_description)
                            <textarea class="form-control" style="height:150px;" name="other_description" disabled>{{$receiver_request->other_description}}</textarea>
                        @else
                            <textarea class="form-control" style="height:150px; border-color:red;" name="other_description" disabled>{{$receiver_request->other_description}}</textarea>
                        @endif
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
                        @if($receiver_request->about_donation == $receiver->about_donation)
                            <textarea class="form-control" style="height:150px;" name="about_donation" disabled>{{$receiver_request->about_donation}}</textarea>
                        @else
                            <textarea class="form-control" style="height:150px; border-color:red;" name="about_donation" disabled>{{$receiver_request->about_donation}}</textarea>
                        @endif
                    </div>
                    <div class="col-md-1">
                        <div class="tooltip-block">
                            <i class="bi bi-question-circle"></i>
                            <div class="pro-tooltip">
                                <div class="header">About toggle</div>
                                <div class="body">You can choose whether your name display everyone or not. If you
                                    want to hide your name and profile picture you must tick this toggle. After you
                                    tick this toggle your profile picture and name will hide from your listing.
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                

                <div class="card" style="border-style: dotted;border-width: 3px; padding: 20px; display: none;" id="account_details_edit">
                    <h5 class="card-header">Account Details</h5>
                    @if($receiver->account_details != null)
                        <div class="card-body">
                            <div class="row g-0 mb-4">
                                <div class="col-md-6">
                                    <label class="pro-label">Account Number</label>
                                    @if(json_decode($receiver_request->account_details)->account_number == json_decode($receiver->account_details)->account_number)
                                        <input type="text" class="form-control" name="account_number" value="{{json_decode($receiver_request->account_details)->account_number}}" disabled>
                                    @else
                                        <input type="text" class="form-control" style="border-color:red;" name="account_number" value="{{json_decode($receiver_request->account_details)->account_number}}" disabled>
                                    @endif
                                </div>
                                <div class="col-md-4">
                                    <label class="pro-label">Bank Name</label>
                                    @if(json_decode($receiver_request->account_details)->bank_name == json_decode($receiver->account_details)->bank_name)
                                        <input type="text" class="form-control" name="bank_name" value="{{json_decode($receiver_request->account_details)->bank_name}}" disabled>
                                    @else
                                        <input type="text" class="form-control" style="border-color:red;" name="bank_name" value="{{json_decode($receiver_request->account_details)->bank_name}}" disabled>
                                    @endif
                                </div>
                            </div>
                            <div class="row g-0 mb-5">
                                <div class="col-md-11">
                                    <label class="pro-label">Branch Name</label>
                                    @if(json_decode($receiver_request->account_details)->branch_name == json_decode($receiver->account_details)->branch_name)
                                        <input type="text" class="form-control" name="branch_name" value="{{json_decode($receiver_request->account_details)->branch_name}}" disabled>
                                    @else
                                        <input type="text" class="form-control" style="border-color:red;" name="branch_name" value="{{json_decode($receiver_request->account_details)->branch_name}}" disabled>
                                    @endif
                                </div>
                            </div>
                        </div>
                    @endif
                </div>

                <!-- <div class="row g-0">
                    <div class="col-md-11">
                        <a href="#" class="cta-btn btn-fill">
                            <div class="btn-text">Approve</div>
                        </a>
                    </div>
                </div> -->
            </div>
        </form>
    </div>
</section>

@endsection

@push('after-scripts')

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
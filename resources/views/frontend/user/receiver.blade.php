@extends('frontend.layouts.dashboard_app')

@section('title', app_name() . ' | ' . __('navs.general.home'))

@section('content')

<section class="receiver-profile-section">
    <div class="profile-summery-block">
        <div class="header" style="background-image: url('{{uploaded_asset($receiver->cover_image)}}');">
            
            <div class="dp-block">
                @if($receiver->profile_image == null)
                    <img src="{{ url('img/default_cover.png') }}" alt="">
                @else
                    <img src="{{ uploaded_asset($receiver->profile_image) }}" alt="">
                @endif               
            </div>
        </div>
        @if($receiver->name_toggle == 'yes')
            <div class="name">{{$receiver->nick_name}}</div>
        @else
            <div class="name">{{$receiver->name}}</div>
        @endif
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
                    @foreach($req_images as $key=> $req_image)
                            <img src="{{uploaded_asset($req_image)}}" ach-img-view="true">
                    @endforeach
            @endif
        </div>
    </div>
    <div class="edit-profile-block">
        <form action="{{route('frontend.user.update_receiver')}}" method="post" enctype="multipart/form-data">
        {{csrf_field()}}
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
                        <input type="text" class="form-control" name="name" value="{{$receiver->name}}">
                    </div>
                    <div class="col-md-1">
                        <div class="form-check form-switch">
                            @if($receiver->name_toggle == 'yes')
                                <input class="form-check-input" type="checkbox" name="name_toggle" value="yes" role="switch" checked>
                            @else
                                <input class="form-check-input" type="checkbox" name="name_toggle" value="yes" role="switch">
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
                        <input type="text" class="form-control" name="nick_name" value="{{$receiver->nick_name}}" required>
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
                    <!-- Gender -->
                    <div class="col-md-5">
                        <label class="pro-label">Gender</label>
                        <select class="form-select" name="gender" required>
                            <option selected disabled>Choose...</option>
                            <option value="Male" {{$receiver->gender == 'Male' ? "selected" : ""}}>Male</option>
                            <option value="Female" {{$receiver->gender == 'Female' ? "selected" : ""}}>Female</option>
                        </select>
                    </div>
                </div>

                <div class="row g-3 mb-3">
                    <div class="col-12 col-md-6">
                        <div class="form-group">
                            <label class="pro-label">Country</label>
                            <input type="text" name="country" maxlength="191" class="form-control" value="{{get_city_details(auth()->user()->id,'country')}}" id="country" readonly>
                        </div>
                    </div>
                    <div class="col-12 col-md-5">
                        <div class="form-group">
                            <label class="pro-label">City</label>
                            <input type="text" name="city" maxlength="191" class="form-control" value="{{get_city_details(auth()->user()->id,'city')}}" id="city" readonly>
                        </div>
                    </div>
                </div>
                
                <!-- NIC -->
                <div class="row g-0 mb-3">
                    <div class="col-md-11">
                        <label class="pro-label">NIC</label>
                        <input type="text" class="form-control" value="{{$receiver->nic_number}}" name="nic_number" required>
                    </div>
                </div>
                <!-- Address -->
                <div class="row g-0 mb-3">
                    <div class="col-md-11">
                        <label class="pro-label">Address</label>
                        <input type="text" class="form-control" value="{{$receiver->address}}" name="address" required>
                    </div>
                </div>
                <!-- Phone, Job -->
                <div class="row g-0 mb-3">
                    <!-- Phone -->
                    <div class="col-md-5">
                        <label class="pro-label">Phone Number</label>
                        <input type="number" class="form-control" value="{{$receiver->phone_number}}" name="phone_number" required>
                    </div>
                    <!-- Job -->
                    <div class="col-md-6">
                        <label class="pro-label">Job</label>
                        <input type="text" class="form-control" value="{{$receiver->occupation}}" name="occupation" required>
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
                        <textarea class="form-control" style="height:150px;" name="bio" required>{{$receiver->bio}}</textarea>
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
                                <input type="hidden" name="profile_image" value="{{$receiver->profile_image}}" class="selected-files" >
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
                                <input type="hidden" name="cover_image" value="{{$receiver->cover_image}}" class="selected-files" >
                            </div>
                            <div class="file-preview box sm">
                            </div>
                        </div>
                    </div>
                </div>


                <!-- Add Images -->
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
                                <input type="hidden" name="images" value="{{$receiver->images}}" class="selected-files" >
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
                    <div class="col-md-11">
                        
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
                        <textarea class="form-control" style="height:150px;" name="other_description">{{$receiver->other_description}}</textarea>
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
                        <textarea class="form-control" style="height:150px;" name="about_donation" required>{{$receiver->about_donation}}</textarea>
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
                    <div class="card-body">
                        @if($receiver->account_details != null)
                            <div class="row g-0 mb-4">
                                <div class="col-md-6">
                                    <label class="pro-label">Account Number</label>
                                    <input type="text" class="form-control" name="account_number" value="{{json_decode($receiver->account_details)->account_number}}">
                                </div>
                                <div class="col-md-4">
                                    <label class="pro-label">Bank Name</label>
                                    <input type="text" class="form-control" name="bank_name" value="{{json_decode($receiver->account_details)->bank_name}}">
                                </div>
                            </div>
                            <div class="row g-0 mb-5">
                                <div class="col-md-11">
                                    <label class="pro-label">Branch Name</label>
                                    <input type="text" class="form-control" name="branch_name" value="{{json_decode($receiver->account_details)->branch_name}}">
                                </div>
                            </div>
                        @else
                            <div class="row g-0 mb-4">
                                <div class="col-md-6">
                                    <label class="pro-label">Account Number</label>
                                    <input type="text" class="form-control" name="account_number">
                                </div>
                                <div class="col-md-4">
                                    <label class="pro-label">Bank Name</label>
                                    <input type="text" class="form-control" name="bank_name">
                                </div>
                            </div>
                            <div class="row g-0 mb-5">
                                <div class="col-md-11">
                                    <label class="pro-label">Branch Name</label>
                                    <input type="text" class="form-control" name="branch_name">
                                </div>
                            </div>
                        @endif
                    </div>
                </div>

                <div class="row g-0">
                    <div class="col-md-11">
                        <input type="hidden" class="form-control" name="hidden_id" value="{{$receiver->id}}">
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


@endpush
@extends('frontend.layouts.mobile_app')

@section('title', app_name() . ' | ' . __('navs.general.home'))

@section('content')

@include('frontend.mobile.includes.top_nav')

<section class="form-section">
    <div class="mobile-container">
        <form action="{{route('frontend.user.create_receiver')}}" method="post" enctype="multipart/form-data">
        {{csrf_field()}}
            <!-- Profile Picture -->
            <div class="frm-row">
                <label class="form-label">Upload Profile Picture <span>(Optional)</span></label>                
                <div class="form-group">
                    <div class="input-group" data-toggle="aizuploader" data-type="image">
                        <div class="input-group-prepend">
                            <div class="input-group-text bg-soft-secondary font-weight-medium">Browse</div>
                        </div>
                        <div class="form-control file-amount">Choose File</div>
                        <input type="hidden" name="profile_image" class="selected-files" >
                    </div>
                    <div class="file-preview box sm">                                     
                    </div>
                </div>                 
            </div>        
            <!-- Cover Photo -->
            <div class="frm-row">
                <label class="form-label">Upload Cover Photo <span>(Optional)</span></label>
                <div class="form-group">
                    <div class="input-group" data-toggle="aizuploader" data-type="image">
                        <div class="input-group-prepend">
                            <div class="input-group-text bg-soft-secondary font-weight-medium">Browse</div>
                        </div>
                        <div class="form-control file-amount">Choose File</div>
                        <input type="hidden" name="cover_image" class="selected-files" >
                    </div>
                    <div class="file-preview box sm">                                     
                    </div>
                </div>
            </div>
            <!-- Name -->
            <div class="frm-row">
                <div class="frm-col-10">
                    <label class="form-label">Name <span>(Optional)</span></label>
                    <input type="text" class="form-control" name="name">
                </div>
                <div class="frm-col-2">
                    <label class="form-label"></label>
                    <div class="form-switch">
                        <input class="form-check-input" type="checkbox" name="name_toggle" value="yes" role="switch">
                    </div>
                </div>
            </div>
            <!-- Nick Name -->
            <div class="frm-row">
                <label class="form-label">Nick Name</label>
                <input type="text" class="form-control" name="nick_name" required>
            </div>
            
            <!-- Age, Gender -->

            <div class="frm-row">
                <div class="frm-col">
                    <label class="form-label">Age</label>
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
                <div class="frm-col">
                    <label class="form-label">Gender</label>
                    <select class="form-select" name="gender" required>
                        <option selected disabled>Choose...</option>
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                    </select>
                </div>
            </div>

            <div class="frm-row">
                <div class="frm-col">
                    <div class="form-group">
                        <label class="form-label">Country</label>
                        <input type="text" name="country" maxlength="191" class="form-control" value="{{auth()->user()->country}}" id="country" readonly>
                    </div>
                </div>
                <div class="frm-col">
                    <div class="form-group">
                        <label class="form-label">City</label>
                        <input type="text" name="city" maxlength="191" class="form-control" value="{{auth()->user()->city}}" id="city" readonly>
                    </div>
                </div>
            </div>
            
            <!-- NIC -->
            <div class="frm-row">
                <label class="form-label">NIC</label>
                <input type="text" class="form-control" name="nic_number" required>
            </div>
            <!-- Address -->
            <div class="frm-row">
                <label class="form-label">Address</label>
                <input type="text" class="form-control" name="address" required>
            </div>
         
            
            <div class="frm-row">
                <!-- Phone -->
                <div class="frm-col">
                    <label class="form-label">Phone Number</label>
                    <input type="text" class="form-control" name="phone_number" required>
                </div>
                <!-- Job -->
                <div class="frm-col">
                    <label class="form-label">Job</label>
                    <input type="text" class="form-control" name="occupation" required>
                </div>
            </div>
           
         
            <!-- Bio -->
            <div class="frm-row">
                <label class="form-label">Bio</label>
                <textarea class="form-control" style="height:150px;" name="bio" rows="3"></textarea>
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
                            <input type="hidden" name="images" class="selected-files" >
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
                            <input type="hidden" name="videos" class="selected-files" >
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
                            <input type="hidden" name="audios" class="selected-files" >
                        </div>
                        <div class="file-preview box sm">
                        </div>
                    </div>
                </div>
            </div>
            <!-- Requirement -->
            <div class="frm-row">
                <label class="form-label">Requirement</label>
                <select class="form-select" aria-label="Default select example" id="requirement" name="requirement" onchange="package_type(this);" required>
                    @if(count(App\Models\Packages::where('status','Enabled')->get()) != 0)
                        @foreach(App\Models\Packages::where('status','Enabled')->get() as $package)
                            <option value="{{$package->id}}">{{$package->name}}</option>
                        @endforeach
                    @endif
                    <option value="Other">Other</option>
                </select>
            </div>

                            
            <div class="frm-row" id="other_description_hide" style="display: none;">
                <label class="form-label">Other Description</label>
                <textarea class="form-control" style="height:150px;" id="other_description" name="other_description"></textarea>
            </div>

              <!-- About the donation -->
            <div class="frm-row">
                <label class="form-label">About the donation</label>
                <textarea class="form-control" style="height:150px;" name="about_donation" required></textarea>
            </div>

            <div class="card" style="border-style: dotted;border-width: 3px; padding: 8px; display: none;" id="account_details">
                <h5 class="card-header">Account Details</h5>
                <div class="card-body">
                   
                    <div class="frm-row">
                        <label class="form-label">Account Number</label>
                        <input type="text" class="form-control" id="account_number" name="account_number">
                    </div>
                    <div class="frm-row">
                        <label class="form-label">Bank Name</label>
                        <input type="text" class="form-control" id="bank_name" name="bank_name">
                    </div>
                    <div class="frm-row">
                        <label class="form-label">Branch Name</label>
                        <input type="text" class="form-control" id="branch_name" name="branch_name">
                    </div>
                </div>
            </div>

            <!-- Submit Button -->
            <div class="frm-row">
                <button type="submit" class="cta-btn btn-fill">
                    <div class="btn-text">Submit</div>
                </button>
            </div>
        </form>
    </div>
</section>

@include('frontend.mobile.includes.bottom_nav')

@endsection

@push('after-scripts')

<script>
    function package_type(that) {
        
        if (that.value == 'Other') {
            document.getElementById("other_description_hide").style.display = "block";
        } else {
            document.getElementById("other_description_hide").style.display = "none";
        }
    
        if (that.value == 'Other') {
            document.getElementById("account_details").style.display = "block";
        } else {
            document.getElementById("account_details").style.display = "none";
        }
        
    }
</script> 

<script>
const requirement = document.getElementById('requirement')
const RecReqFields = ['other_description', 'account_number', 'bank_name', 'branch_name']

requirement.addEventListener('change', () => {
    if (requirement.value == 'Other') {
        RecReqFields.forEach((field) => {
            document.getElementById(field).setAttribute('required', '')
        })
    }
})
</script>


@endpush
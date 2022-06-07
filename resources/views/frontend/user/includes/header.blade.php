<div class="dashboard-header">
    <a href="{{url('/')}}" class="back-to-karuna">
        <i class="fa-solid fa-house"></i>
        <div class="text">Back to Karuna</div>
    </a>
    <ul class="breadcrumb-nav">
        <li class="br-item">
            <a href="{{url('dashboard/index')}}" class="br-link">Home</a>
        </li>
        <li class="br-item">
            <a href="#" class="br-link active">current</a>
        </li>
    </ul>
    <div class="greating-block">
        <div class="message">Good Morning, {{auth()->user()->first_name}} {{auth()->user()->last_name}}</div>
        @if(auth()->user()->user_type == "Donor")
            <a  type="button" href="{{route('frontend.receivers')}}" class="cta-btn btn-fill">
                <div class="btn-text">Donate Now</div>
            </a>
        @elseif(auth()->user()->user_type == "Agent")
            <a  type="button" href="#" class="cta-btn btn-fill" data-bs-toggle="modal" data-bs-target="#createDonation">
                <div class="btn-text">Create Donation</div>
            </a>
        @endif

    </div>
</div>

<!-- Create Donation Modal -->
<div class="modal fade" id="createDonation" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-body">
                <form action="{{route('frontend.user.create_receiver')}}" method="post" enctype="multipart/form-data">
                {{csrf_field()}}
                    <div class="inner-wrapper db-form">
                        <div class="row g-0">
                            <div class="col">
                                <div class="title">Create new Donation</div>
                            </div>
                        </div>
                        <!-- DP & Cover -->
                        <div class="row g-0 mb-3">
                            <div class="col-md-5">
                                <label class="pro-label">Upload Profile Picture <span>(Optional)</span></label>
                                <div class="dp-block">
                                    <img src="{{url('images/landing-page/nav/profile.png')}}" alt="">

                                    <div class="form-group choose-dp">
                                        <div class="input-group" data-toggle="aizuploader" data-type="image">
                                            <button type="button" class="dp-edit">
                                                <i class="bi bi-camera"></i>
                                            </button>
                                            <input type="hidden" name="profile_image" class="selected-files" >
                                        </div>
                                        <div class="file-preview box sm">                                     
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div class="col-md-6">
                                <label class="pro-label">Upload Cover Picture <span>(Optional)</span></label>
                                <div class="cover-block">

                                    <div class="form-group choose-cover">
                                        <div class="input-group" data-toggle="aizuploader" data-type="image">
                                        <button type="button" class="back-edit">
                                            <i class="bi bi-camera"></i>
                                        </button>
                                            <input type="hidden" name="cover_image" class="selected-files" >
                                        </div>
                                        <div class="file-preview box sm">
                                        </div>
                                    </div>

                                </div>
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
                                <input type="text" class="form-control" name="name">
                            </div>
                            <div class="col-md-1">
                                <div class="form-check form-switch">
                                    <input class="form-check-input" type="checkbox" name="name_toggle" value="yes" role="switch">
                                </div>
                            </div>
                            <div class="col-md-1">
                                <div class="tooltip-block">
                                    <i class="bi bi-question-circle"></i>
                                    <div class="pro-tooltip">
                                        <div class="header">About toggle</div>
                                        <div class="body">You can choose whether your name display everyone or not. If
                                            you
                                            want
                                            to hide your name and profile picture you must tick this toggle. After you
                                            tick
                                            this
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
                                <input type="text" class="form-control" name="nick_name" required>
                            </div>
                            <div class="col-md-1">
                                <div class="tooltip-block">
                                    <i class="bi bi-question-circle"></i>
                                    <div class="pro-tooltip">
                                        <div class="header">About toggle</div>
                                        <div class="body">You can choose whether your name display everyone or not. If
                                            you
                                            want
                                            to hide your name and profile picture you must tick this toggle. After you
                                            tick
                                            this
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

                        <div class="row g-3 mb-3">
                            <div class="col-12 col-md-6">
                                <div class="form-group">
                                    <label class="pro-label">Country</label>
                                    <input type="text" name="country" maxlength="191" class="form-control" value="{{auth()->user()->country}}" id="country" readonly>
                                </div>
                            </div>
                            <div class="col-12 col-md-5">
                                <div class="form-group">
                                    <label class="pro-label">City</label>
                                    <input type="text" name="city" maxlength="191" class="form-control" value="{{auth()->user()->city}}" id="city" readonly>
                                </div>
                            </div>
                        </div>


                        <!-- NIC -->
                        <div class="row g-0 mb-3">
                            <div class="col-md-11">
                                <label class="pro-label">NIC</label>
                                <input type="text" class="form-control" name="nic_number" required>
                            </div>
                        </div>
                        <!-- Address -->
                        <div class="row g-0 mb-3">
                            <div class="col-md-11">
                                <label class="pro-label">Address</label>
                                <input type="text" class="form-control" name="address" required>
                            </div>
                        </div>
                        <!-- Phone, Job -->
                        <div class="row g-0 mb-3">
                            <!-- Phone -->
                            <div class="col-md-5">
                                <label class="pro-label">Phone Number</label>
                                <input type="text" class="form-control" name="phone_number" required>
                            </div>
                            <!-- Job -->
                            <div class="col-md-6">
                                <label class="pro-label">Job</label>
                                <input type="text" class="form-control" name="occupation" required>
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
                                <textarea class="form-control" style="height:150px;" name="bio" required></textarea>
                            </div>
                            <div class="col-md-1">
                                <div class="tooltip-block">
                                    <i class="bi bi-question-circle"></i>
                                    <div class="pro-tooltip">
                                        <div class="header">About toggle</div>
                                        <div class="body">You can choose whether your name display everyone or not. If
                                            you
                                            want
                                            to hide your name and profile picture you must tick this toggle. After you
                                            tick
                                            this
                                            toggle your profile picture and name will hide from your listing.</div>
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
                                <!-- <div class="media-block">
                                    <a href="#"><img src="{{url('images/dashboard/placeholder.png')}}" alt=""></a>
                                    <a href="#"><img src="{{url('images/dashboard/placeholder.png')}}" alt=""></a>
                                    <a href="#"><img src="{{url('images/dashboard/placeholder.png')}}" alt=""></a>
                                </div> -->
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
                            <div class="col-md-1">
                                <div class="tooltip-block">
                                    <i class="bi bi-question-circle"></i>
                                    <div class="pro-tooltip">
                                        <div class="header">About toggle</div>
                                        <div class="body">You can choose whether your name display everyone or not. If
                                            you
                                            want
                                            to hide your name and profile picture you must tick this toggle. After you
                                            tick
                                            this
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
                                <label class="pro-label">Add 3 or more </label>
                            </div>
                        </div>
                        <div class="row g-0 mb-3">
                            <div class="col-md-11">
                                <!-- <div class="media-block">
                                    <a href="#"><img src="{{url('images/dashboard/placeholder.png')}}" alt=""></a>
                                    <a href="#"><img src="{{url('images/dashboard/placeholder.png')}}" alt=""></a>
                                    <a href="#"><img src="{{url('images/dashboard/placeholder.png')}}" alt=""></a>
                                </div> -->

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
                            <div class="col-md-1">
                                <div class="tooltip-block">
                                    <i class="bi bi-question-circle"></i>
                                    <div class="pro-tooltip">
                                        <div class="header">About toggle</div>
                                        <div class="body">You can choose whether your name display everyone or not. If
                                            you
                                            want
                                            to hide your name and profile picture you must tick this toggle. After you
                                            tick
                                            this
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
                                <!-- <div class="media-block">
                                    <a href="#"><img src="{{url('images/dashboard/placeholder.png')}}" alt=""></a>
                                    <a href="#"><img src="{{url('images/dashboard/placeholder.png')}}" alt=""></a>
                                    <a href="#"><img src="{{url('images/dashboard/placeholder.png')}}" alt=""></a>
                                </div> -->
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
                            <div class="col-md-1">
                                <div class="tooltip-block">
                                    <i class="bi bi-question-circle"></i>
                                    <div class="pro-tooltip">
                                        <div class="header">About toggle</div>
                                        <div class="body">You can choose whether your name display everyone or not. If
                                            you
                                            want
                                            to hide your name and profile picture you must tick this toggle. After you
                                            tick
                                            this
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
                                <select class="form-select" aria-label="Default select example" name="requirement" onchange="package_type(this);" required>
                                    <option selected disabled>Choose...</option>
                                    @if(count(App\Models\Packages::where('status','Enabled')->get()) != 0)
                                        @foreach(App\Models\Packages::where('status','Enabled')->get() as $package)
                                            <option value="{{$package->id}}">{{$package->name}}</option>
                                        @endforeach
                                    @endif
                                    <option value="Other">Other</option>
                                </select>
                            </div>
                            <div class="col-md-1">
                                <div class="tooltip-block">
                                    <i class="bi bi-question-circle"></i>
                                    <div class="pro-tooltip">
                                        <div class="header">About toggle</div>
                                        <div class="body">You can choose whether your name display everyone or not. If
                                            you
                                            want
                                            to hide your name and profile picture you must tick this toggle. After you
                                            tick
                                            this
                                            toggle your profile picture and name will hide from your listing.</div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- About the donation -->

                        <div class="row g-0 mb-3" id="other_description_hide" style="display: none;">
                            <div class="col-md-11">
                                <label class="pro-label">Other Description</label>
                                <textarea class="form-control" style="height:150px;" name="other_description"></textarea>
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
                                <textarea class="form-control" style="height:150px;" name="about_donation" required></textarea>
                            </div>
                            <div class="col-md-1">
                                <div class="tooltip-block">
                                    <i class="bi bi-question-circle"></i>
                                    <div class="pro-tooltip">
                                        <div class="header">About toggle</div>
                                        <div class="body">You can choose whether your name display everyone or not. If
                                            you
                                            want to hide your name and profile picture you must tick this toggle. After
                                            you
                                            tick this toggle your profile picture and name will hide from your listing.
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="card" style="border-style: dotted;border-width: 3px; padding: 20px; display: none;" id="account_details">
                            <h5 class="card-header">Account Details</h5>
                            <div class="card-body">
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
                            </div>
                        </div>

                        <div class="row g-0">
                            <div class="col-md-11">
                                <button class="cta-btn btn-fill" type="submit">
                                    <div class="btn-text">Create</div>
                                </button>
                            </div>
                        </div>


                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


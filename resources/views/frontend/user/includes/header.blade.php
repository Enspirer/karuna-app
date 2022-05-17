<div class="dashboard-header">
    <a href="{{url('/')}}" class="back-to-karuna">
        <i class="fa-solid fa-house"></i>
        <div class="text">Back to Karuna</div>
    </a>
    <ul class="breadcrumb-nav">
        <li class="br-item">
            <a href="{{url('dashboard')}}" class="br-link">Home</a>
        </li>
        <li class="br-item">
            <a href="#" class="br-link active">current</a>
        </li>
    </ul>
    <div class="greating-block">
        <div class="message">Good Morning, Mr. Nadika</div>
        <a  type="button" href="#" class="cta-btn btn-fill" data-bs-toggle="modal" data-bs-target="#createDonation">
            <div class="btn-text">Create Donation</div>
        </a>
    </div>
    <div class="button-block">
        <a href="#" class="nav-btn active">
            <div class="btn-text">My Receivers</div>
        </a>
        <a href="#" class="nav-btn">
            <div class="btn-text">Receivers Request</div>
            <div class="status">75</div>
        </a>
    </div>
</div>

<!-- Create Donation Modal -->
<div class="modal fade" id="createDonation" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-lg">
        <div class="modal-content">
            <div class="modal-body">
                <form action="">
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
                                    <a href="#" class="dp-edit">
                                        <i class="bi bi-camera"></i>
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label class="pro-label">Upload Cover Picture <span>(Optional)</span></label>
                                <div class="cover-block">
                                    <a href="#" class="back-edit">
                                        <i class="bi bi-camera"></i>
                                    </a>
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
                                <input type="text" class="form-control">
                            </div>
                            <div class="col-md-1">
                                <div class="form-check form-switch">
                                    <input class="form-check-input" type="checkbox" role="switch">
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
                                <input type="text" class="form-control">
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
                            <div class="col-md-3">
                                <label class="pro-label">Age</label>
                                <select class="form-select">
                                    <option selected disabled>Choose...</option>
                                    <option>18</option>
                                    <option>19</option>
                                    <option>20</option>
                                </select>
                            </div>
                            <!-- Gender -->
                            <div class="col-md-3">
                                <label class="pro-label">Gender</label>
                                <select class="form-select">
                                    <option selected disabled>Choose...</option>
                                    <option>Male</option>
                                    <option>Female</option>
                                </select>
                            </div>
                            <!-- City -->
                            <div class="col-md-5">
                                <label class="pro-label">City</label>
                                <select class="form-select">
                                    <option selected disabled>Choose...</option>
                                    <option>Maharagama</option>
                                    <option>Nugegoda</option>
                                    <option>Kottawa</option>
                                </select>
                            </div>
                        </div>
                        <!-- NIC -->
                        <div class="row g-0 mb-3">
                            <div class="col-md-11">
                                <label class="pro-label">NIC</label>
                                <input type="text" class="form-control">
                            </div>
                        </div>
                        <!-- Address -->
                        <div class="row g-0 mb-3">
                            <div class="col-md-11">
                                <label class="pro-label">Address</label>
                                <input type="text" class="form-control">
                            </div>
                        </div>
                        <!-- Phone, Job -->
                        <div class="row g-0 mb-3">
                            <!-- Phone -->
                            <div class="col-md-5">
                                <label class="pro-label">Phone Number</label>
                                <input type="text" class="form-control">
                            </div>
                            <!-- Job -->
                            <div class="col-md-6">
                                <label class="pro-label">Job</label>
                                <input type="text" class="form-control">
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
                                <textarea class="form-control" rows="3"></textarea>
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
                                <div class="media-block">
                                    <a href="#"><img src="{{url('images/dashboard/placeholder.png')}}" alt=""></a>
                                    <a href="#"><img src="{{url('images/dashboard/placeholder.png')}}" alt=""></a>
                                    <a href="#"><img src="{{url('images/dashboard/placeholder.png')}}" alt=""></a>
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
                                <div class="media-block">
                                    <a href="#"><img src="{{url('images/dashboard/placeholder.png')}}" alt=""></a>
                                    <a href="#"><img src="{{url('images/dashboard/placeholder.png')}}" alt=""></a>
                                    <a href="#"><img src="{{url('images/dashboard/placeholder.png')}}" alt=""></a>
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
                                <div class="media-block">
                                    <a href="#"><img src="{{url('images/dashboard/placeholder.png')}}" alt=""></a>
                                    <a href="#"><img src="{{url('images/dashboard/placeholder.png')}}" alt=""></a>
                                    <a href="#"><img src="{{url('images/dashboard/placeholder.png')}}" alt=""></a>
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
                                <select class="form-select" aria-label="Default select example">
                                    <option selected disabled>Choose...</option>
                                    <option>One</option>
                                    <option>Two</option>
                                    <option>Three</option>
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
                        <div class="row g-0">
                            <div class="col-md-11">
                                <label class="pro-label">About the donation</label>
                            </div>
                        </div>
                        <div class="row g-0 mb-3">
                            <div class="col-md-11">
                                <textarea class="form-control" rows="3"></textarea>
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
                        <!-- Account Number -->
                        <div class="row g-0">
                            <div class="col-md-11">
                                <label class="pro-label">Account Number</label>
                            </div>
                        </div>
                        <div class="row g-0 mb-5">
                            <div class="col-md-11">
                                <input type="text" class="form-control">
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
                        <div class="row g-0">
                            <div class="col-md-11">
                                <a href="#" class="cta-btn btn-fill">
                                    <div class="btn-text">Create</div>
                                </a>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
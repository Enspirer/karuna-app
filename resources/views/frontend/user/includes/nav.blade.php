<div class="dashboard-nav">
    <div class="profile-block">
        @if(auth()->user()->profile_image != null)
            <img src="{{uploaded_asset(auth()->user()->profile_image)}}" alt="" class="dp">
        @else
            <img src="{{url('images/landing-page/nav/profile.png')}}" alt="" class="dp">
        @endif
        <div class="content-block">
            <div class="name">{{auth()->user()->first_name}} {{auth()->user()->last_name}}</div>
            @if(auth()->user()->user_type == 'Agent')
                <div class="status agent">Volunteer</div>
            @elseif(auth()->user()->user_type == 'Donor')
                <div class="status donor">{{auth()->user()->user_type}}</div>
            @endif
        </div>
    </div>
    <div class="nav-search">
        <!-- <i class="bi bi-search"></i>
        <input type="text" name="nav-search" class="form-control" placeholder="I'm looking for..."> -->
    </div>
    <div class="nav-block">
        <div class="title">Overview</div>
        <ul class="navbar-nav">
            <li class="nav-item">
                <a href="{{url('dashboard/index')}}" class="nav-link {{Request::segment(2)=='index' ? 'active' :(Request::segment(2)=='receiver' ? 'active' :null) }}">
                    <div class="nav-nav">
                        <i class="bi bi-grid"></i>
                        <i class="bi active bi-grid-fill"></i>
                        <div class="text">Dashboard</div>
                        <i class="bi flx active bi-chevron-right"></i>
                    </div>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{route('frontend.user.dashboard.profile_edit')}}" class="nav-link {{Request::segment(3)=='edit' ? 'active' :null }}">
                    <div class="nav-nav">
                        <i class="bi bi-person"></i>
                        <i class="bi active bi-person-fill"></i>
                        <div class="text">Profile</div>
                        <i class="bi flx active bi-chevron-right"></i>
                    </div>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{route('frontend.user.dashboard.notification')}}" class="nav-link {{Request::segment(2)=='notification' ? 'active' :null }}">
                    <div class="nav-nav">
                        <i class="bi bi-bell"></i>
                        <i class="bi active bi-bell-fill"></i>
                        <div class="text">Notification</div>
                        <div class="status">{{\App\Models\Notification::where('user_id',auth()->user()->id)->where('status','Pending')->count()}}</div>
                        <i class="bi flx active bi-chevron-right"></i>
                    </div>
                </a>
            </li>
            @if(auth()->user()->user_type == 'Donor')
            <li class="nav-item">
                <a href="{{route('frontend.user.dashboard.payment_history')}}" class="nav-link {{Request::segment(2)=='payment-history' ? 'active' :null }}">
                    <div class="nav-nav">
                        <i class="bi bi-credit-card"></i>
                        <i class="bi active bi-credit-card-fill"></i>
                        <div class="text">My Donations</div>
                        <i class="bi flx active bi-chevron-right"></i>
                    </div>
                </a>
            </li>
            @elseif(auth()->user()->user_type == 'Agent')
            <li class="nav-item">
                <a href="{{route('frontend.user.dashboard.payment_history')}}" class="nav-link {{Request::segment(2)=='payment-history' ? 'active' :null }}">
                    <div class="nav-nav">
                        <i class="bi bi-credit-card"></i>
                        <i class="bi active bi-credit-card-fill"></i>
                        <div class="text">Payment History</div>
                        <i class="bi flx active bi-chevron-right"></i>
                    </div>
                </a>
            </li>
            @endif
            <!-- <li class="nav-item">
                <a href="{{url('help-and-support')}}" class="nav-link">
                    <div class="nav-nav">
                        <i class="bi bi-question-circle"></i>
                        <i class="bi active bi-question-circle-fill"></i>
                        <div class="text">Help and Support</div>
                        <i class="bi flx active bi-chevron-right"></i>
                    </div>
                </a>
            </li> -->
        </ul>
    </div>
    <div class="nav-footer">
        <a href="{{route('frontend.auth.logout')}}" class="sign-out">
            <i class="bi bi-box-arrow-right"></i>
            <div class="text">Sign Out</div>
        </a>
        <div class="title">Onboarding</div>
        
        @if(auth()->user()->user_type == 'Donor')
            <a href="{{url('support')}}" type="button" class="create-donation">
                <i class="bi bi-plus-lg"></i>
                <div class="text">Donate Now</div>
            </a>
        @elseif (auth()->user()->user_type == 'Agent')
            <a href="#" type="button" class="create-donation" data-bs-toggle="modal" data-bs-target="#createDonation">
                <i class="bi bi-plus-lg"></i>
                <div class="text">Create Donation</div>
            </a>
        @endif

    </div>
</div>

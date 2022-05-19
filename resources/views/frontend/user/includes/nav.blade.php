<div class="dashboard-nav">
    <div class="profile-block">
        <img src="{{url('images/landing-page/nav/profile.png')}}" alt="" class="dp">
        <div class="content-block">
            <div class="name">{{auth()->user()->first_name}} {{auth()->user()->last_name}}</div>
            <div class="status agent">Agent</div>
        </div>
    </div>
    <div class="nav-search">
        <i class="bi bi-search"></i>
        <input type="text" name="nav-search" class="form-control" placeholder="I'm looking for...">
    </div>
    <div class="nav-block">
        <div class="title">Overview</div>
        <ul class="navbar-nav">
            <li class="nav-item">
                <a href="{{url('dashboard/index')}}" class="nav-link {{Request::segment(2)=='index' ? 'active' :null }}">
                    <div class="nav-nav">
                        <i class="bi bi-grid"></i>
                        <i class="bi active bi-grid-fill"></i>
                        <div class="text">Dashboard</div>
                        <i class="bi flx active bi-chevron-right"></i>
                    </div>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{route('frontend.dashboard.agent_profile')}}" class="nav-link {{Request::segment(3)=='agent' ? 'active' :null }}">
                    <div class="nav-nav">
                        <i class="bi bi-person"></i>
                        <i class="bi active bi-person-fill"></i>
                        <div class="text">Profile</div>
                        <i class="bi flx active bi-chevron-right"></i>
                    </div>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{route('frontend.dashboard.notification')}}" class="nav-link {{Request::segment(2)=='notification' ? 'active' :null }}">
                    <div class="nav-nav">
                        <i class="bi bi-bell"></i>
                        <i class="bi active bi-bell-fill"></i>
                        <div class="text">Notification</div>
                        <div class="status">15</div>
                        <i class="bi flx active bi-chevron-right"></i>
                    </div>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{route('frontend.dashboard.payment_history')}}" class="nav-link {{Request::segment(2)=='payment-history' ? 'active' :null }}">
                    <div class="nav-nav">
                        <i class="bi bi-credit-card"></i>
                        <i class="bi active bi-credit-card-fill"></i>
                        <div class="text">Payment History</div>
                        <i class="bi flx active bi-chevron-right"></i>
                    </div>
                </a>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link">
                    <div class="nav-nav">
                        <i class="bi bi-gear"></i>
                        <i class="bi active bi-gear-fill"></i>
                        <div class="text">Settings</div>
                        <i class="bi flx active bi-chevron-right"></i>
                    </div>
                </a>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link">
                    <div class="nav-nav">
                        <i class="bi bi-question-circle"></i>
                        <i class="bi active bi-question-circle-fill"></i>
                        <div class="text">Help and Support</div>
                        <i class="bi flx active bi-chevron-right"></i>
                    </div>
                </a>
            </li>
        </ul>
    </div>
    <div class="nav-footer">
        <a href="{{route('frontend.auth.logout')}}" class="sign-out">
            <i class="bi bi-box-arrow-right"></i>
            <div class="text">Sign Out</div>
        </a>
        <div class="title">Onboarding</div>
        <a href="#" class="create-donation">
            <i class="bi bi-plus-lg"></i>
            <div class="text">Create Donation</div>
        </a>
    </div>
</div>

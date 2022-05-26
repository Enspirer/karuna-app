<nav class="navbar navbar-expand-xl fixed-top navbar-light navigation-bar">
  <div class="container">
    <a class="navbar-brand" href="#">
        <img src="{{url('images/logo/logo.svg')}}" alt="" class="logo">
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navContent" aria-controls="navContent" aria-expanded="false">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navContent">
      <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link {{ Request::segment(1) == '' ? 'active' : null }}" href="{{route('frontend.index')}}">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ Request::segment(1) == 'about' ? 'active' : null }}" href="#">About</a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ Request::segment(1) == 'works' ? 'active' : null }}" href="#">Our Works</a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ Request::segment(1) == 'support' ? 'active' : null }}" href="{{route('frontend.support')}}">Support Us</a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ Request::segment(1) == 'contact' ? 'active' : null }}" href="#">Contact Us</a>
        </li>
        <li class="nav-item">
          @auth
            @if(auth()->user()->user_type == 'Agent')
              <a class="nav-link cta-btn btn-fill" href="{{route('frontend.user.dashboard')}}">
                <div class="btn-text">Let's Support them</div>
              </a>
            @elseif(auth()->user()->user_type == 'Donor')
              <a class="nav-link cta-btn btn-fill" href="{{route('frontend.receivers')}}">
                <div class="btn-text">Donate Now</div>
              </a>
            @endif
          @else
            <a class="nav-link cta-btn btn-fill" href="{{route('frontend.auth.register')}}">
              <div class="btn-text">Donate Now</div>
            </a>
          @endauth


        </li>
        <!-- <li class="nav-item dropdown nav-drop">
          <a class="nav-link" href="#" role="button" data-bs-toggle="dropdown">
            <img src="{{url('images/landing-page/nav/notification.png')}}" alt="">
          </a>
          <ul class="dropdown-menu dropdown-menu-end">
            <li><a class="dropdown-item" href="#">Action</a></li>
            <li><a class="dropdown-item" href="#">Another action</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="#">Something else here</a></li>
          </ul>
        </li> -->
        @auth()
          <li class="nav-item dropdown nav-drop">
            <a class="nav-link" href="#" role="button" data-bs-toggle="dropdown">
              <div class="drop-profile">
                <img src="{{auth()->user()->picture}}" alt="">
                <div class="name">{{auth()->user()->first_name}} {{auth()->user()->last_name}}</div>
                <i class="fa-solid fa-chevron-down"></i>
              </div>
            </a>
            <ul class="dropdown-menu dropdown-menu-end">
              <li><a class="dropdown-item" href="{{route('frontend.user.dashboard')}}"><div class="profile-link"><i class="bi bi-pc-display"></i> Dashboard</div></a></li>
              <li><a class="dropdown-item" href="#"><div class="profile-link"><i class="bi bi-arrow-left-right"></i> Donation History</div></a></li>
              <li><a class="dropdown-item" href="#"><div class="profile-link"><i class="bi bi-credit-card"></i> My Card</div></a></li>
              <li><a class="dropdown-item" href="#"><div class="profile-link"><i class="bi bi-person-fill"></i> Profile</div></a></li>
              <li><a class="dropdown-item" href="#"><div class="profile-link"><i class="bi bi-gear"></i> Settings</div></a></li>
              <li><hr class="dropdown-divider"></li>
              <li><a class="dropdown-item" href="{{url('logout')}}"><div class="profile-link"><i class="bi bi-box-arrow-right"></i> Sign Out</div></a></li>
            </ul>
          </li>
        @else
          <li class="nav-item dropdown nav-drop">
            <a class="nav-link" href="#" role="button" data-bs-toggle="dropdown">
              <div class="drop-profile">
                <div class="name">Login or Register</div>
                <i class="fa-solid fa-chevron-down"></i>
              </div>
            </a>
            <ul class="dropdown-menu dropdown-menu-end">
              <li><a class="dropdown-item" href="{{url('login')}}"><div class="profile-link"><i class="bi bi-arrow-left-right"></i> Login</div></a></li>
              <li><a class="dropdown-item" href="{{url('register')}}"><div class="profile-link"><i class="bi bi-credit-card"></i> Register</div></a></li>
            </ul>
          </li>
        @endif
      </ul>
    </div>
  </div>
</nav>

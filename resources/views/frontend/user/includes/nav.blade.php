<div class="dashboard-nav">
    <div class="profile-block">
        <img src="{{url('images/landing-page/nav/profile.png')}}" alt="" class="dp">
        <div class="content-block">
            <div class="name">{{auth()->user()->first_name}} {{auth()->user()->last_name}}</div>
            @if(auth()->user()->user_type == 'Agent')
                <div class="status agent">{{auth()->user()->user_type}}</div>
            @elseif(auth()->user()->user_type == 'Donor')
                <div class="status donor">{{auth()->user()->user_type}}</div>
            @endif
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
                        <div class="status">{{\App\Models\Notification::where('user_id',auth()->user()->id)->count()}}</div>
                        <i class="bi flx active bi-chevron-right"></i>
                    </div>
                </a>
            </li>
            @if(auth()->user()->user_type == 'Donor')
            <li class="nav-item">
                <a href="{{route('frontend.dashboard.payment_history')}}" class="nav-link {{Request::segment(2)=='payment-history' ? 'active' :null }}">
                    <div class="nav-nav">
                        <i class="bi bi-credit-card"></i>
                        <i class="bi active bi-credit-card-fill"></i>
                        <div class="text">My Donate History</div>
                        <i class="bi flx active bi-chevron-right"></i>
                    </div>
                </a>
            </li>
            @elseif(auth()->user()->user_type == 'Agent')
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
            @endif
            <li class="nav-item">
                <a href="#" class="nav-link" data-bs-toggle="modal" data-bs-target="#paymentInfoModal">
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
        
        @if(auth()->user()->user_type == 'Donor')
            <a href="#" type="button" class="create-donation">
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

<!-- Payment Info Modal -->
<div class="modal fade payment-info-modal" id="paymentInfoModal" tabindex="-1" aria-labelledby="paymentInfoModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
          <div class="image-block">
              <img src="{{url('images/dashboard/modal-header.png')}}" alt="">
          </div>
          <div class="title-block">
              <div class="title">Thank you for your support</div>
              <div class="text">Transaction successfully processed and you will be notified when the your parcel is received to agent or receiver</div>
          </div>
          <i class="bi bi-x" data-bs-dismiss="modal" aria-label="Close"></i>
      </div>
      <div class="modal-body">
          <table class="payment-info-table">
              <tbody>
                  <tr>
                      <td>
                          <div class="text max-width">Donation Number:</div>
                      </td>
                      <td>
                          <div class="text">NI2345627245</div>
                      </td>
                      <td>
                          <div class="text text-right">Date:</div>
                      </td>
                      <td>
                          <div class="text max-width">Nov 9, 2022</div>
                      </td>
                  </tr>
                  <tr>
                      <td colspan="2" class="border-bottom">
                          <div class="header">Donation Details</div>
                      </td>
                      <td colspan="2" class="border-bottom mobile-hide">
                          <div class="header text-right">Price</div>
                      </td>
                  </tr>
                  <tr>
                      <td class="border-bottom mobile-border-none">
                          <div class="image-block">
                              <img src="{{url('images/landing-page/nav/profile.png')}}" alt="">
                          </div>
                      </td>
                      <td colspan="2" class="border-bottom mobile-border-none py-3">
                          <div class="title">Receiver</div>
                          <div class="name">Kamani Jayathilaka</div>
                          <div class="info">Lorem ipsum dolor sit amet consectetur adipisicing elit. Nesciunt doloremque, excepturi iure dolorum animi consectetur.</div>
                          <div class="cat">Health Food</div>
                      </td>
                      <td class="border-bottom mobile-border-none">
                          <div class="text gray text-right">Rs. 5000</div>
                      </td>
                  </tr>
                  <tr>
                      <td>
                          <div class="text">Donation Status :</div>
                      </td>
                      <td>
                          <div class="text green">Completed</div>
                      </td>
                      <td>
                          <div class="text">Other</div>
                      </td>
                      <td>
                          <div class="text gray text-right">Rs. 00.00</div>
                      </td>
                  </tr>
                  <tr>
                      <td colspan="2" class="border-bottom mobile-border-none"></td>
                      <td class="border-bottom mobile-border-none">
                          <div class="text">Total Donation</div>
                      </td>
                      <td class="border-bottom">
                          <div class="text text-right">Rs. 5000.00</div>
                      </td>
                  </tr>
              </tbody>
          </table>
      </div>
      <div class="modal-footer">
          <div class="text-block">
              <div class="title">Receiver</div>
              <div class="name">Nadika Perera</div>
              <div class="text">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Officia ipsum, exercitationem nam perspiciatis itaque odit!</div>
          </div>
          <a href="#" class="cta-btn btn-fill">
              <div class="btn-text">Contact Agent</div>
          </a>
      </div>
    </div>
  </div>
</div>

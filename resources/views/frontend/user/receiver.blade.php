@extends('frontend.layouts.dashboard_app')

@section('title', app_name() . ' | ' . __('navs.general.home'))

@section('content')

<section class="receiver-profile-section">
    <div class="profile-summery-block">
        <div class="header">
            <a href="#" class="back-edit">
                <i class="bi bi-camera"></i>
            </a>
            <div class="dp-block">
                <img src="{{url('images/landing-page/nav/profile.png')}}" alt="">
                <a href="#" class="dp-edit">
                    <i class="bi bi-camera"></i>
                </a>
            </div>
        </div>
        <div class="name">Mis. Kamani Jayathilaka</div>
        <div class="status">Receiver</div>
        <div class="info-table-wrapper">
            <table class="info-table">
                <tbody>
                    <tr>
                        <td>Nick Name</td>
                        <td>Kamani Jayanthi</td>
                    </tr>
                    <tr>
                        <td>Age</td>
                        <td>50</td>
                    </tr>
                    <tr>
                        <td>Gender</td>
                        <td>Female</td>
                    </tr>
                    <tr>
                        <td>Address</td>
                        <td>584/C, Colombo Rd, Wattala.</td>
                    </tr>
                    <tr>
                        <td>Phone Number</td>
                        <td>+94 77 44 25 235</td>
                    </tr>
                    <tr>
                        <td>Account Number</td>
                        <td>*************584</td>
                    </tr>
                    <tr>
                        <td>City</td>
                        <td>Waththala</td>
                    </tr>
                    <tr>
                        <td>ID</td>
                        <td>541248742#</td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="gallery">
            <a href="#"><img src="{{url('images/dashboard/placeholder.png')}}" alt=""></a>
            <a href="#"><img src="{{url('images/dashboard/placeholder.png')}}" alt=""></a>
            <a href="#"><img src="{{url('images/dashboard/placeholder.png')}}" alt=""></a>
            <a href="#"><img src="{{url('images/dashboard/placeholder.png')}}" alt=""></a>
            <a href="#"><img src="{{url('images/dashboard/placeholder.png')}}" alt=""></a>
            <a href="#"><img src="{{url('images/dashboard/placeholder.png')}}" alt=""></a>
        </div>
    </div>
    <div class="edit-profile-block">
        <form action="">
            <div class="inner-wrapper">
                <div class="row g-0">
                    <div class="col">
                        <div class="title">Edit this receiver profile</div>
                    </div>
                </div>
                <div class="row g-0">
                    <div class="col">
                        <label class="pro-label">Name <span>(Optional)</span></label>
                    </div>
                </div>
                <div class="row g-0">
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
                                <div class="body">You can choose whether your name display everyone or not. If you want to hide your name and profile picture you must tick this toggle. After you tick this toggle your profile picture and name will hide from your listing.</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row g-0">
                    <div class="col">
                        <label class="pro-label">Nick Name</label>
                    </div>
                </div>
                <div class="row g-0">                    
                    <div class="col-md-11">
                        <input type="text" class="form-control">
                    </div>
                    <div class="col-md-1">
                        <div class="tooltip-block">
                            <i class="bi bi-question-circle"></i>
                            <div class="pro-tooltip">
                                <div class="header">About toggle</div>
                                <div class="body">You can choose whether your name display everyone or not. If you want to hide your name and profile picture you must tick this toggle. After you tick this toggle your profile picture and name will hide from your listing.</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row g-3">
                    <div class="col-md-3">
                        <label class="pro-label">Age</label>
                        <select class="form-select" >
                            <option selected disabled>Choose...</option>
                            <option>18</option>
                            <option>19</option>
                            <option>20</option>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <label class="pro-label">Gender</label>
                        <select class="form-select" >
                            <option selected disabled>Choose...</option>
                            <option>Male</option>
                            <option>Female</option>
                        </select>
                    </div>
                    <div class="col-md-5">
                        <label class="pro-label">City</label>
                        <select class="form-select" >
                            <option selected disabled>Choose...</option>
                            <option>Maharagama</option>
                            <option>Nugegoda</option>
                            <option>Kottawa</option>
                        </select>
                    </div>
                </div>
                <div class="row g-0">
                    <div class="col-md-11">
                        <label class="pro-label">Address</label>
                        <input type="text" class="form-control">
                    </div>
                </div>
                <div class="row g-0">
                    <div class="col-md-5">
                        <label class="pro-label">Phone Number</label>
                        <input type="text" class="form-control">
                    </div>
                    <div class="col-md-6">
                        <label class="pro-label">Job</label>
                        <input type="text" class="form-control">
                    </div>
                </div>
                <div class="row g-0">
                    <div class="col">
                        <label class="pro-label">Bio</label>
                    </div>
                </div>
                <div class="row g-0">
                    <div class="col-md-11">
                        <textarea class="form-control" rows="3"></textarea>
                    </div>
                    <div class="col-md-1">
                        <div class="tooltip-block">
                            <i class="bi bi-question-circle"></i>
                            <div class="pro-tooltip">
                                <div class="header">About toggle</div>
                                <div class="body">You can choose whether your name display everyone or not. If you want to hide your name and profile picture you must tick this toggle. After you tick this toggle your profile picture and name will hide from your listing.</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</section>

@endsection

@push('after-scripts')

@endpush
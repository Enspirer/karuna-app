@extends('frontend.layouts.mobile_app')

@section('title', app_name() . ' | ' . __('navs.general.home'))

@section('content')

<!-- ======== Top Nav ======== -->
<section class="app-bar-section">
    <div class="mobile-container">
        <div class="inner-wrapper">
            <a href="{{route('frontend.mobile.index')}}" class="back-btn">
                <i class="fa-solid fa-arrow-left"></i>
            </a>
            <div class="title">Profile</div>
        </div>
    </div>
</section>
<!-- ======== Top Nav End ======== -->

<section class="form-section">
    <div class="mobile-container">
        <form action="">
            <!-- Profile Picture -->
            <div class="frm-row">
                <label class="form-label">Upload Profile Picture <span>(Optional)</span></label>
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
            <div class="frm-row">
                <div class="frm-col">
                    <div class="name">Mis. Inoka Perera</div>
                    <div class="star-rating">
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-half"></i>
                        <i class="bi bi-star"></i>
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
                        <input class="form-check-input" type="checkbox" role="switch">
                    </div>
                </div>
            </div>
            <!-- Nick Name -->
            <div class="frm-row">
                <label class="form-label">Nick Name</label>
                <input type="text" class="form-control" name="nick_name">
            </div>
            <!-- Bio -->
            <div class="frm-row">
                <label class="form-label">Bio</label>
                <textarea class="form-control" name="bio" rows="3"></textarea>
            </div>
            <!-- Age, Gender -->
            <div class="frm-row">
                <div class="frm-col">
                    <label class="form-label">Age</label>
                    <select class="form-select">
                        <option selected disabled>Choose...</option>
                        <option>One</option>
                        <option>Two</option>
                        <option>Three</option>
                    </select>
                </div>
                <div class="frm-col">
                    <label class="form-label">Gender</label>
                    <select class="form-select">
                        <option selected disabled>Choose...</option>
                        <option>Male</option>
                        <option>Female</option>
                    </select>
                </div>
            </div>
            <!-- City -->
            <div class="frm-row">
                <label class="form-label">City</label>
                <select class="form-select">
                    <option selected disabled>Choose...</option>
                    <option>Colombo</option>
                    <option>Gampaha</option>
                </select>
            </div>
            <!-- Address -->
            <div class="frm-row">
                <label class="form-label">Address</label>
                <input type="text" class="form-control" name="address">
            </div>
            <!-- Phone Number -->
            <div class="frm-row">
                <label class="form-label">Phone Number</label>
                <input type="text" class="form-control" name="phone">
            </div>
            <!-- Job -->
            <div class="frm-row">
                <label class="form-label">Job</label>
                <input type="text" class="form-control" name="job">
            </div>
            <!-- Account Number -->
            <div class="frm-row">
                <label class="form-label">Account Number</label>
                <input type="text" class="form-control" name="account_number">
            </div>
            <!-- ID -->
            <div class="frm-row">
                <label class="form-label">ID</label>
                <input type="text" class="form-control" name="nic" value="541248742#" readonly>
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

@endsection

@push('after-scripts')

@endpush
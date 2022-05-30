@extends('frontend.layouts.mobile_app')

@section('title', app_name() . ' | ' . __('navs.general.home'))

@section('content')

<!-- ======== Top Nav ======== -->
<section class="app-bar-section">
    <div class="mobile-container">
        <div class="inner-wrapper">
            <a href="{{route('frontend.user.mobile.index')}}" class="back-btn">
                <i class="fa-solid fa-arrow-left"></i>
            </a>
            <div class="title">Confirmation</div>
        </div>
    </div>
</section>
<!-- ======== Top Nav End ======== -->

<section class="form-section">
    <div class="mobile-container">
        <form action="">
            <div class="frm-row">
                <div class="frm-col">
                    <div class="title red">Confirm Your Service</div>
                    <div class="text">Your account has been resaved Rs.5000 for Kamala's package.</div>
                </div>
            </div>
            <!-- Proof Images -->
            <div class="frm-row">
                <div class="border-wrappre">
                    <label class="form-label">Proof Images <span>(Optional)</span></label>
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
            </div>
            <!-- Proof video -->
            <div class="frm-row">
                <div class="border-wrappre">
                    <label class="form-label">Proof Video <span>(Optional)</span></label>
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
            </div>
            <!-- Proof Voice -->
            <div class="frm-row">
                <div class="border-wrappre">
                    <label class="form-label">Proof Voice <span>(Optional)</span></label>
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
            </div>
            <!-- Special Note -->
            <div class="frm-row">
                <label class="form-label">Special Note</label>
                <textarea class="form-control" name="donation_about" rows="3"></textarea>
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
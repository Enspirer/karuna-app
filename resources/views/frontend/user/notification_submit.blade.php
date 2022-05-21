@extends('frontend.layouts.dashboard_app')

@section('title', app_name() . ' | ' . __('navs.general.home'))

@section('content')

<section class="notification-submit-section">
    <form action="{{route('frontend.user.notification.submit.store')}}" method="post" enctype="multipart/form-data">
    {{csrf_field()}}
        <div class="notification-block">
            <div class="text-block">
                <div class="subject red">Waiting for you confirmation</div>
                <div class="text">Lorem Ipsum is simply dummy text of the printing and typesetting industry.  industry's standard dummy text ever since the 1500s</div>
            </div>
            <div class="time-block">
                <i class="bi bi-clock"></i>
                <div class="text">24 Apr 2022 at 9.30 AM</div>
            </div>
        </div>
        <div class="media-upload-block">
            <div class="media-block">
                <div class="header">
                    <div class="title">Proof Images</div>
                    <div class="text">(Optional)</div>
                </div>
                <div class="body">

                    <div class="form-group">
                        <div class="input-group" data-toggle="aizuploader" data-type="image" data-multiple="true">
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
        </div>
            
        <div class="comment-block">
            <div class="comment-input">
                <label>Special Note</label>
                <textarea class="form-control" rows="5" name="thankyou_message" required></textarea>
            </div>
            <input type="hidden" value="{{$receiver->id}}" name="hidden_id">
            <button type="submit" class="cta-btn btn-fill">
                <div class="btn-text">Submit</div>
            </button>
        </div>

    </form>
</section>

@endsection

@push('after-scripts')

@endpush
@extends('frontend.layouts.dashboard_app')

@section('title', app_name() . ' | ' . __('navs.general.home'))

@section('content')


@if(auth()->user()->user_type == 'Donor')
    <section class="notification-submit-section">

            <div class="notification-block">
                <div class="text-block">
                    <div class="subject red">Confirmation Details</div>
                </div>
                <div class="time-block">
                    @if(App\Models\Notification::where('user_id',auth()->user()->id)->first() != null)
                        <i class="bi bi-clock"></i>                    
                        <div class="text">{{ App\Models\Notification::where('user_id',auth()->user()->id)->first()->created_at->format('M d Y') }} {{date('h:i A', strtotime(App\Models\Notification::where('user_id',auth()->user()->id)->first()->created_at))}}</div>
                    @endif
                </div>
            </div>
            <div class="media-upload-block">
                <div class="media-block">
                    <div class="header">
                        <div class="title">Proof Images</div>
                    </div>

                    <div class="body">
                        @if($receiver->images != null)
                            @php
                                $req_images = preg_split ("/\,/", $receiver->images);
                            @endphp
                            <div class="row">
                                @foreach($req_images as $key=> $req_image)
                                    <div class="col-4">
                                        <img src="{{uploaded_asset($req_image)}}" class="mb-3" style="height:100px; object-fit:cover" width="100%" alt="">
                                    </div>
                                @endforeach
                            </div>
                        @endif

                    </div>

                </div>            
            </div>
                
            <div class="comment-block">
                <div class="comment-input">
                    <label>Special Note</label>
                    <textarea class="form-control" rows="7" name="thankyou_message" readonly>{{$receiver->thankyou_message}}</textarea>
                </div>
            </div>

        </form>
    </section>

@elseif(auth()->user()->user_type == 'Agent')
    <section class="notification-submit-section">
        <form action="{{route('frontend.user.notification.submit.store')}}" method="post" enctype="multipart/form-data">
        {{csrf_field()}}
            <div class="notification-block">
                <div class="text-block">
                    <div class="subject red">Waiting for you confirmation</div>
                </div>
                <div class="time-block">
                    @if(App\Models\Notification::where('user_id',auth()->user()->id)->first() != null)
                        <i class="bi bi-clock"></i>                    
                        <div class="text">{{ App\Models\Notification::where('user_id',auth()->user()->id)->first()->created_at->format('M d Y') }} {{date('h:i A', strtotime(App\Models\Notification::where('user_id',auth()->user()->id)->first()->created_at))}}</div>
                    @endif
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
                                <input type="hidden" name="images" value="{{App\Models\Receivers::where('assigned_agent',auth()->user()->id)->first()->images}}" class="selected-files" >
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
                    <textarea class="form-control" rows="5" name="thankyou_message" required>{{App\Models\Receivers::where('assigned_agent',auth()->user()->id)->first()->thankyou_message}}</textarea>
                </div>
                <input type="hidden" value="{{$receiver->id}}" name="hidden_id">
                <button type="submit" class="cta-btn btn-fill">
                    <div class="btn-text">Submit</div>
                </button>
            </div>

        </form>
    </section>
@endif

@endsection

@push('after-scripts')

@endpush
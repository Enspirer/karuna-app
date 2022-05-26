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
            <div class="title">Completed</div>
        </div>
    </div>
</section>
<!-- ======== Top Nav End ======== -->

<section class="thanks-section">
    <div class="inner-wrapper">
        <div class="title">Thank you For your support</div>
        <!-- <div class="text">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Animi, amet quas! Neque facere ad fugit aut! Aliquid, earum placeat soluta deserunt magni velit ut omnis accusantium, perspiciatis, hic dolore recusandae!</div> -->
        <div class="media">
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
   
</section>

    <div class="px-3">
        <label>Special Note</label>
        <textarea class="form-control" rows="7" name="thankyou_message" readonly>{{$receiver->thankyou_message}}</textarea>
    </div>
    
        
            

<!-- Thanks Modal -->
<div class="modal fade thanks-modal" id="thanksModal" tabindex="-1" aria-labelledby="thanksModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-body">
        <img src="{{url('images/mobile/thanks/thanks.png')}}" alt="">
        <div class="title">Special Thanks for You</div>
        <div class="text">When you give joy to other people, you get more joy in return. You should give a good thought to happiness that you can give out.</div>
        <a href="#" class="cta-btn btn-fill" data-bs-dismiss="modal" aria-label="Close">
            <div class="btn-text">Cheers</div>
        </a>
      </div>
    </div>
  </div>
</div>

@endsection

@push('after-scripts')

<script type="text/javascript">
    $(window).on('load', function() {
        $('#thanksModal').modal('show');
    });
</script>

@endpush
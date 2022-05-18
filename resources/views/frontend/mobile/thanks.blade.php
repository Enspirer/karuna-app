@extends('frontend.layouts.mobile_app')

@section('title', app_name() . ' | ' . __('navs.general.home'))

@section('content')

@include('frontend.mobile.includes.top_nav')

<section class="thanks-section">
    <div class="inner-wrapper">
        <div class="title">Thank you For your support</div>
        <div class="text">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Animi, amet quas! Neque facere ad fugit aut! Aliquid, earum placeat soluta deserunt magni velit ut omnis accusantium, perspiciatis, hic dolore recusandae!</div>
        <div class="media">
            <img src="{{url('images/dashboard/placeholder.png')}}" alt="">
            <img src="{{url('images/dashboard/placeholder.png')}}" alt="">
            <img src="{{url('images/dashboard/placeholder.png')}}" alt="">
            <img src="{{url('images/dashboard/placeholder.png')}}" alt="">
            <img src="{{url('images/dashboard/placeholder.png')}}" alt="">
            <img src="{{url('images/dashboard/placeholder.png')}}" alt="">
        </div>
    </div>
</section>

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

@include('frontend.mobile.includes.bottom_nav')

@endsection

@push('after-scripts')

<script type="text/javascript">
    $(window).on('load', function() {
        $('#thanksModal').modal('show');
    });
</script>

@endpush
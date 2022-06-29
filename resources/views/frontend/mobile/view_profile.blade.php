@extends('frontend.layouts.mobile_app')

@section('title', app_name() . ' | ' . 'Volunteer Profile')

@section('content')

<!-- ======== Top Nav ======== -->
<section class="app-bar-section">
    <div class="mobile-container">
        <div class="inner-wrapper">
            <!-- <a href="{{route('frontend.user.mobile.index')}}" class="back-btn"> -->
            <a href="{{route('frontend.user.mobile.index')}}" class="back-btn">
                <i class="fa-solid fa-arrow-left"></i>
            </a>
            <div class="title">{{$agent->first_name}}'s Profile</div>
        </div>
    </div>
</section>
<!-- ======== Top Nav End ======== -->

<section class="profile-section">
    <div class="mobile-container">
        <div class="inner-wrapper">
            <div class="dp-block">
                @if($agent->profile_image == null)
                    <img src="{{url('images/landing-page/nav/profile.png')}}" alt="" class="dp">
                @else
                    <img src="{{ uploaded_asset($agent->profile_image) }}" alt="" class="dp">
                @endif
            </div>
            <div class="name">{{$agent->first_name}} {{$agent->last_name}}</div>
            @if($agent->level != null)
                <div class="star-rating">
                    @if($agent->level == 'Level 1')
                        <div style="background: rgb(255, 186, 12); padding:5px 20px 5px 20px; width:fit-content; margin: 10px auto 0; border-radius: 40px;">Level 1</div>
                    @elseif($agent->level == 'Level 2')
                        <div style="background: rgb(255, 186, 12); padding:5px 20px 5px 20px; width:fit-content; margin: 10px auto 0; border-radius: 40px;">Level 2</div>
                    @elseif($agent->level == 'Level 3')
                        <div style="background: rgb(255, 186, 12); padding:5px 20px 5px 20px; width:fit-content; margin: 10px auto 0; border-radius: 40px;">Level 2</div>
                    @elseif($agent->level == 'Level 4')
                        <div style="background: rgb(255, 186, 12); padding:5px 20px 5px 20px; width:fit-content; margin: 10px auto 0; border-radius: 40px;">Level 4</div>
                    @endif
                </div>
            @endif
            <div class="status maroon">Volunteer</div>
            <div class="profile-info">{{$agent->about_donation}}</div>
            <div class="info-table-wrapper">
                <table class="info-table">
                    <tbody>
                        <tr>
                            <td>Name</td>
                            <td>{{$agent->first_name}} {{$agent->last_name}}</td>
                        </tr>
                        <tr>
                            <td>Age</td>
                            <td>
                                <a href="mailto:{{$agent->email}}"> {{$agent->email}}</a>
                            </td>
                        </tr>
                        <tr>
                            <td>Address</td>
                            <td>{{$agent->address}}td>
                        </tr>
                        <tr>
                            <td>City</td>
                            <td>{{get_city_details($agent->id,'city')}}</td>
                        </tr>
                        <tr>
                            <td>NIC Number</td>
                            <td>{{$agent->email}}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="gallery">
                <!-- <a href="#"><img src="{{url('images/dashboard/placeholder.png')}}" alt=""></a>
                <a href="#"><img src="{{url('images/dashboard/placeholder.png')}}" alt=""></a>
                <a href="#"><img src="{{url('images/dashboard/placeholder.png')}}" alt=""></a>
                <a href="#"><img src="{{url('images/dashboard/placeholder.png')}}" alt=""></a>
                <a href="#"><img src="{{url('images/dashboard/placeholder.png')}}" alt=""></a>
                <a href="#"><img src="{{url('images/dashboard/placeholder.png')}}" alt=""></a> -->
            </div>
            <div class="charity-block">
                @if(count(App\Models\Receivers::where('assigned_agent',$agent->id)->get()) == 0)                  
                    <img src="{{url('images/not-found.png')}}" alt="">
                    <div class="text" style="margin-left: 100px;">No data found</div>
                @else
                    <div class="title">Donate List</div>
                        <div class="accordion" id="charityList">
                            @foreach(App\Models\Receivers::where('assigned_agent',$agent->id)->orderby('id','desc')->get() as $key => $receiver)
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="charHead{{$receiver->id}}">
                                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#char{{$receiver->id}}"
                                            aria-expanded="true" aria-controls="char1">
                                            <div class="header-block">
                                                <div class="no">{{$key + 1}}</div>
                                                <div class="text">
                                                    @if($receiver->requirement != 'Other')
                                                        @if(App\Models\Packages::where('id',$receiver->requirement)->first() != null)
                                                            <div class="icon purple">{{App\Models\Packages::where('id',$receiver->requirement)->first()->name }}</div>                                     
                                                        @else
                                                            <div class="name">Package not found</div>
                                                        @endif
                                                    @else
                                                        <div class="icon purple">Other Requirements</div>
                                                    @endif
                                                </div>
                                            </div>
                                        </button>
                                    </h2>
                                    <div id="char{{$receiver->id}}" class="accordion-collapse collapse" aria-labelledby="charHead{{$receiver->id}}"
                                        data-bs-parent="#charityList">
                                        <div class="accordion-body">
                                            <div>
                                                Receiver Name: <a href="{{route('frontend.user.mobile.view_profile_receiver',$receiver->id)}}"> {{$receiver->name}}</a>
                                            </div>
                                            <div class="title">Description</div>
                                            <div class="text">{{$receiver->about_donation}}</div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach 
                        </div>
                    </div>
                @endif

            </div>
            <button class="cta-btn btn-fill w-100" data-bs-toggle="modal" data-bs-target="#contact_now_Modal">
                <div class="btn-text">Contact Now</div>
            </button>
        </div>
    </div>
</section>


<div class="modal fade" id="contact_now_Modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Contact Now</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
        <form action="{{route('frontend.contact_now')}}" method="post" enctype="multipart/form-data">
        {{csrf_field()}}
            <div class="modal-body">
                <div class="row g-0 mb-3">
                    <div class="col-md-11">
                        <label class="pro-label">Email</label>
                        <input type="email" class="form-control" name="email" required>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <label class="form-label">Message</label>
                        <textarea class="form-control" style="height:150px;" name="message" required></textarea>
                    </div>
                </div>    
            </div>
            <div class="modal-footer">
                <input type="hidden" name="hidden_id_contact" value="{{$agent->id}}">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-success">Submit</button>
            </div>
        </form>
    </div>
  </div>
</div>


@if(\Session::has('success'))

<div class="modal fade form-submit-modal" id="overlay_contact_now" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog" style="width: 90%; max-width: 600px; margin: 0; top: 50%; left: 50%; transform: translate(-50%, -50%) !important;">
        <div class="modal-content" style="background: linear-gradient(60deg, #E4F2FB, #9ACDFF); border: 2px solid #0C75FF; border-radius: 15px;">
            <div class="modal-body" style="display: flex; flex-direction: row; align-items: center; justify-content: center; gap: 30px;">
                <i class="bi bi-x-lg" data-bs-dismiss="modal" style="position: absolute; top: 5px; right: 5px; color: #fff; font-size: 10px; background-color: rgba(255, 255, 255, 0.5); width: 25px; height: 25px; border-radius: 50%; display: flex; flex-direction: row; justify-content: center; align-items: center; backdrop-filter: blur(5px);"></i>
                <!-- <div class="image-block">
                    <img src="{{url('images/success.png')}}" alt="">
                </div> -->
                <div class="content-block">
                    <div class="title" style="font-size: 18px; color: #0C75FF; font-weight: 400; margin-bottom: 10px;">Submitted Successfully !</div>
                    <p class="text" style="font-size: 16px; ont-weight 300; margin: 0; color: #333;">You will get an email.</p>
                    <button type="button" class="btn btn-primary px-4 mt-4" style="margin-left:60px;" data-bs-dismiss="modal">OK</button>
                </div>
            </div>
        </div>
    </div>
</div>

@endif

@endsection

@push('after-scripts')

<script>
    $(window).on('load', function () {
        $('#overlay_contact_now').modal('show');
    });
    $("#close-btn").click(function () {
        $('#overlay_contact_now').modal('hide');
    });
</script>

@endpush
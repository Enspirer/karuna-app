@extends('frontend.layouts.app')

@section('title', app_name() . ' | ' . __('labels.frontend.contact.box_title'))

@section('content')

<section class="help-section">
    <div class="header">
        <div class="container">
            <div class="text-block">
                <div class="title">Help and Support</div>
                <div class="text">At Karunaa, We Take All The Help We Can Get! Fill Out The Form Below & Discover How You Can Join Our Charity.</div>
            </div>
            <img src="{{url('images/landing-page/contact/grid.png')}}" alt="" class="grid-left">
            <img src="{{url('images/landing-page/contact/grid.png')}}" alt="" class="grid-right">
        </div>
    </div>
    <div class="body">
        <div class="container">
            <div class="contact-block">
                <div class="image-block">
                    <img src="{{url('images/landing-page/help/help.png')}}" alt="" class="help-img">
                </div>
                <div class="contact-form">
                    <form action="{{route('frontend.help_support.store')}}" method="post" class="pt-4 px-4 pb-3" style="background-color: white" enctype="multipart/form-data">
                    {{csrf_field()}}

                        @if(session()->has('error'))
                            <div class="alert alert-danger">
                                {{ session()->get('error') }}
                            </div>
                        @endif

                        <div class="row g-3">
                            <div class="col-md-6">
                                <label class="form-label">Your Name</label>
                                <input type="text" class="form-control" name="name" required>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Your Email</label>
                                <input type="email" class="form-control" name="email" required>
                            </div>
                            <div class="col-12">
                                <label class="form-label">Your Subject</label>
                                <input type="text" class="form-control" name="title" required>
                            </div>
                            <div class="col-12">
                                <label class="form-label message">Message</label>
                                <textarea class="form-control" name="message" rows="3" placeholder="Write your message here" required></textarea>
                            </div>
                            <div class="col-12">
                                <label class="form-label">Consent</label>
                            </div>

                            <div class="col-12">
                                <div class="g-recaptcha" data-callback="checked" data-sitekey="6Lel4Z4UAAAAAOa8LO1Q9mqKRUiMYl_00o5mXJrR" ></div>
                            </div>
                            <div class="col-12">
                                <button class="cta-btn btn-fill form-submit-btn" type="submit" disabled>
                                    <div class="btn-text">Send Message</div>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="faq-section">
    <div class="inner-wrapper">
        <div class="title">Quick Answers</div>
        <div class="accordion faq-accordion" id="faqAcc">
            <div class="accordion-item">
                <h2 class="accordion-header" id="faqHead1">
                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#faqCol1" aria-expanded="true" aria-controls="faqCol1">
                        <div class="header-block">
                            <div class="text">How Do I Join as an Volunteer?</div>
                            <img src="{{url('images/landing-page/help/open.svg')}}" alt="" class="img-open">
                            <img src="{{url('images/landing-page/help/close.png')}}" alt="" class="img-close">
                        </div>
                    </button>
                </h2>
                <div id="faqCol1" class="accordion-collapse collapse show" aria-labelledby="faqHead1" data-bs-parent="#faqAcc">
                    <div class="accordion-body">
                        <div class="text">Fill Out Our Registration form, and under the 'User Type' select: Volunteer. Providing a Referral Contact is a Critical Factor for our volunteer selection process. Once we have received and reviewed your request, we will provide; you with the proceeding steps via email.</div>
                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header" id="faqHead2">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faqCol2" aria-expanded="false" aria-controls="faqCol2">
                        <div class="header-block">
                            <div class="text">How Do I Operate Karunaa?</div>
                            <img src="{{url('images/landing-page/help/open.svg')}}" alt="" class="img-open">
                            <img src="{{url('images/landing-page/help/close.png')}}" alt="" class="img-close">
                        </div>
                    </button>
                </h2>
                <div id="faqCol2" class="accordion-collapse collapse" aria-labelledby="faqHead2" data-bs-parent="#faqAcc">
                    <div class="accordion-body">
                        <div class="text">Click the 'Donate Now' Button On The top of the page and fill out the details of the generous donation. Once You have created a profile with us, you can keep track; of your donation status. </div>
                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header" id="faqHead3">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faqCol3" aria-expanded="false" aria-controls="faqCol3">
                        <div class="header-block">
                            <div class="text">How Do I Encourage My Friends to use Karunaa? </div>
                            <img src="{{url('images/landing-page/help/open.svg')}}" alt="" class="img-open">
                            <img src="{{url('images/landing-page/help/close.png')}}" alt="" class="img-close">
                        </div>
                    </button>
                </h2>
                <div id="faqCol3" class="accordion-collapse collapse" aria-labelledby="faqHead3" data-bs-parent="#faqAcc">
                    <div class="accordion-body">
                        <div class="text">We welcome you to follow our social media and events. In addition, we always encourage personalized words of recommendation.</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@if(\Session::has('success'))

<div class="modal fade form-submit-modal" id="overlay" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog" style="width: 90%; max-width: 600px; margin: 0; top: 50%; left: 50%; transform: translate(-50%, -50%) !important;">
        <div class="modal-content" style="background: linear-gradient(60deg, #E4F2FB, #9ACDFF); border: 2px solid #0C75FF; border-radius: 15px;">
            <div class="modal-body" style="display: flex; flex-direction: row; align-items: center; justify-content: center; gap: 30px;">
                <i class="bi bi-x-lg" data-bs-dismiss="modal" style="position: absolute; top: -15px; right: -15px; color: #fff; font-size: 16px; background-color: rgba(255, 255, 255, 0.5); width: 35px; height: 35px; border-radius: 50%; display: flex; flex-direction: row; justify-content: center; align-items: center; backdrop-filter: blur(5px);"></i>
                <div class="image-block">
                    <img src="{{url('images/success.png')}}" alt="">
                </div>
                <div class="content-block">
                    <div class="title" style="font-size: 40px; color: #0C75FF; font-weight: 400; margin-bottom: 10px;">Success !</div>
                    <p class="text" style="font-size: 16px; ont-weight 300; margin: 0; color: #333;">Your message submitted successfully.</p>
                    <p class="text" style="font-size: 16px; ont-weight 300; margin: 0; color: #333;">One of our vlunteers will be in touch shortly.</p>
                </div>
            </div>
        </div>
    </div>
</div>

@endif



@endsection

@push('after-scripts')
    @if(config('access.captcha.contact'))
        @captchaScripts
    @endif

<script>
    window.oncontextmenu = () => {
        var captcha = grecaptcha.getResponse();
    };

    function checked() {
        $('.form-submit-btn').removeAttr('disabled');
    };
</script>


<script>
    $(window).on('load', function () {
        $('#overlay').modal('show');
    });
    $("#close-btn").click(function () {
        $('#overlay').modal('hide');
    });
</script>

@endpush
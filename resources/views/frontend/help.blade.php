@extends('frontend.layouts.app')

@section('title', app_name() . ' | ' . __('labels.frontend.contact.box_title'))

@section('content')

<section class="help-section">
    <div class="header">
        <div class="container">
            <div class="text-block">
                <div class="title">Help and Support</div>
                <div class="text">Lorem Ipsum is simply dummy text of the printing and typesetting industry.  industry's standard dummy text ever since the 1500s</div>
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
                    <form action="{{route('frontend.contact_us.store')}}" method="post" class="pt-4 px-4 pb-3" style="background-color: white" enctype="multipart/form-data">
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
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" name="newsletter">
                                    <label class="form-check-label">
                                        Acceptance * <br>
                                        I would like to receive information & updates from Trace Solutions in relation to my enquiry. <br>
                                        I understand that Trace will never share my information.
                                    </label>
                                </div>
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
                    {{ html()->form()->close() }}
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
                            <div class="text">How can I join as a agent ?</div>
                            <img src="{{url('images/landing-page/help/open.svg')}}" alt="" class="img-open">
                            <img src="{{url('images/landing-page/help/close.png')}}" alt="" class="img-close">
                        </div>
                    </button>
                </h2>
                <div id="faqCol1" class="accordion-collapse collapse show" aria-labelledby="faqHead1" data-bs-parent="#faqAcc">
                    <div class="accordion-body">
                        <div class="text">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Laudantium esse vitae praesentium suscipit officiis dolorum recusandae! Voluptatum est eaque delectus similique aspernatur nemo cupiditate blanditiis repellendus modi perspiciatis exercitationem laboriosam id ullam, mollitia fugiat inventore, dolore odit distinctio quo asperiores.</div>
                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header" id="faqHead2">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faqCol2" aria-expanded="false" aria-controls="faqCol2">
                        <div class="header-block">
                            <div class="text">How can I join as a agent (other question) ?</div>
                            <img src="{{url('images/landing-page/help/open.svg')}}" alt="" class="img-open">
                            <img src="{{url('images/landing-page/help/close.png')}}" alt="" class="img-close">
                        </div>
                    </button>
                </h2>
                <div id="faqCol2" class="accordion-collapse collapse" aria-labelledby="faqHead2" data-bs-parent="#faqAcc">
                    <div class="accordion-body">
                        <div class="text">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Laudantium esse vitae praesentium suscipit officiis dolorum recusandae! Voluptatum est eaque delectus similique aspernatur nemo cupiditate blanditiis repellendus modi perspiciatis exercitationem laboriosam id ullam, mollitia fugiat inventore, dolore odit distinctio quo asperiores.</div>
                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header" id="faqHead3">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faqCol3" aria-expanded="false" aria-controls="faqCol3">
                        <div class="header-block">
                            <div class="text">How can I join as a agent (other question) ?</div>
                            <img src="{{url('images/landing-page/help/open.svg')}}" alt="" class="img-open">
                            <img src="{{url('images/landing-page/help/close.png')}}" alt="" class="img-close">
                        </div>
                    </button>
                </h2>
                <div id="faqCol3" class="accordion-collapse collapse" aria-labelledby="faqHead3" data-bs-parent="#faqAcc">
                    <div class="accordion-body">
                        <div class="text">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Laudantium esse vitae praesentium suscipit officiis dolorum recusandae! Voluptatum est eaque delectus similique aspernatur nemo cupiditate blanditiis repellendus modi perspiciatis exercitationem laboriosam id ullam, mollitia fugiat inventore, dolore odit distinctio quo asperiores.</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@if(\Session::has('success'))

<div class="modal fade form-submit-modal" id="overlay" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <i class="bi bi-x-lg" data-bs-dismiss="modal"></i>
                <div class="image-block">
                    <img src="{{url('images/landing_page/contact_us/success.png')}}" alt="">
                </div>
                <div class="content-block">
                    <div class="title">Success !</div>
                    <p class="text">Your message submitted successfully.</p>
                    <p class="text">One of our agents will be in touch shortly.</p>
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
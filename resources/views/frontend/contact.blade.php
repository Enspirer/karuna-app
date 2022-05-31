@extends('frontend.layouts.app')

@section('title', app_name() . ' | ' . __('labels.frontend.contact.box_title'))

@section('content')

    <!-- <div class="row justify-content-center">
        <div class="col col-sm-8 align-self-center">
            <div class="card">
                <div class="card-header">
                    <strong>
                        @lang('labels.frontend.contact.box_title')
                    </strong>
                </div>

                <div class="card-body">
                    {{ html()->form('POST', route('frontend.contact.send'))->open() }}
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    {{ html()->label(__('validation.attributes.frontend.name'))->for('name') }}

                                    {{ html()->text('name', optional(auth()->user())->name)
                                        ->class('form-control')
                                        ->placeholder(__('validation.attributes.frontend.name'))
                                        ->attribute('maxlength', 191)
                                        ->required()
                                        ->autofocus() }}
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    {{ html()->label(__('validation.attributes.frontend.email'))->for('email') }}

                                    {{ html()->email('email', optional(auth()->user())->email)
                                        ->class('form-control')
                                        ->placeholder(__('validation.attributes.frontend.email'))
                                        ->attribute('maxlength', 191)
                                        ->required() }}
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    {{ html()->label(__('validation.attributes.frontend.phone'))->for('phone') }}

                                    {{ html()->text('phone')
                                        ->class('form-control')
                                        ->placeholder(__('validation.attributes.frontend.phone'))
                                        ->attribute('maxlength', 191)
                                        ->required() }}
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    {{ html()->label(__('validation.attributes.frontend.message'))->for('message') }}

                                    {{ html()->textarea('message')
                                        ->class('form-control')
                                        ->placeholder(__('validation.attributes.frontend.message'))
                                        ->attribute('rows', 3)
                                        ->required() }}
                                </div>
                            </div>
                        </div>

                        @if(config('access.captcha.contact'))
                            <div class="row">
                                <div class="col">
                                    @captcha
                                    {{ html()->hidden('captcha_status', 'true') }}
                                </div>
                            </div>
                        @endif

                        <div class="row">
                            <div class="col">
                                <div class="form-group mb-0 clearfix">
                                    {{ form_submit(__('labels.frontend.contact.button')) }}
                                </div>
                            </div>
                        </div>
                    {{ html()->form()->close() }}
                </div>
            </div>
        </div>
    </div> -->

<section class="contact-section">
    <div class="header">
        <div class="container">
            <div class="text-block">
                <div class="title">Get in Touch</div>
                <div class="text">Lorem Ipsum is simply dummy text of the printing and typesetting industry.  industry's standard dummy text ever since the 1500s</div>
            </div>
            <img src="{{url('images/landing-page/contact/grid.png')}}" alt="" class="grid-left">
            <img src="{{url('images/landing-page/contact/grid.png')}}" alt="" class="grid-right">
        </div>
    </div>
    <div class="body">
        <div class="container">
            <div class="contact-block">
                <div class="contact-info">
                    <div class="title">Contact Information</div>
                    <div class="text">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</div>
                    <ul class="contact-info">
                        <li>
                            <a href="tel:+947700000" class="contact-link">
                                <i class="fa-solid fa-phone"></i>
                                +94 77 00000
                            </a>
                        </li>
                        <li>
                            <a href="mailto:info@karuna.com" class="contact-link">
                                <i class="fa-solid fa-at"></i>
                                info@karuna.com
                            </a>
                        </li>
                    </ul>
                    <ul class="social-media">
                        <li>
                            <a href="#" class="social-link">
                                <i class="fa-brands fa-twitter"></i>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="social-link">
                                <i class="fa-brands fa-facebook-f"></i>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="social-link">
                                <i class="fa-brands fa-google-plus-g"></i>
                            </a>
                        </li>
                    </ul>
                    <img src="{{url('images/landing-page/contact/pattern.svg')}}" alt="">
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
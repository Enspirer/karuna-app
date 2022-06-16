@extends('frontend.layouts.mobile_app')

@section('title', app_name() . ' | ' . __('navs.general.home'))

@section('content')

<section class="help-header-section">
    <div class="mobile-container">
        <div class="inner-wrapper">
            <a href="{{route('frontend.user.mobile.index')}}" class="brand">
                <img src="{{url('images/mobile/logo/karuna-logo-english.svg')}}" alt="">
            </a>            
            <a href="#" class="profile"> 
                <i class="bi bi-suit-heart-fill"></i>
                <div class="text">0</div>
                <img src="{{url('images/landing-page/nav/profile.png')}}" alt="">
            </a>            
        </div>
        <div class="title">Help and Support</div>
        <div class="text">At Karunaa, We Take All The Help We Can Get! Fill Out The Form Below & Discover How You Can Join Our Charity.</div>
    </div>
</section>

<section class="form-section">
    <div class="mobile-container">
        <form action="{{route('frontend.help_support.store')}}" method="post" class="pt-4 px-4 pb-3" style="background-color: white" enctype="multipart/form-data">
        {{csrf_field()}}

            @if(session()->has('error'))
                <div class="alert alert-danger">
                    {{ session()->get('error') }}
                </div>
            @endif

            <div class="frm-row">
                <label class="form-label">Your Name</label>
                <input type="text" name="name" class="form-control" required>
            </div>
            <div class="frm-row">
                <label class="form-label">Your Email</label>
                <input type="email" name="email" class="form-control" required>
            </div>
            <div class="frm-row">
                <label class="form-label">Your Subject</label>
                <input type="text" name="title" class="form-control" required>
            </div>
            <div class="frm-row">
                <label class="form-label">Message</label>
                <textarea name="message" class="form-control" style="height:100px;padding: 0.75rem;" placeholder="Write here your message" required></textarea>
            </div>
            <div class="frm-row">
                <div class="g-recaptcha" data-callback="checked" data-sitekey="6Lel4Z4UAAAAAOa8LO1Q9mqKRUiMYl_00o5mXJrR" ></div>
            </div>
            <div class="frm-row">
                <button type="submit" class="cta-btn btn-fill form-submit-btn">
                    <div class="btn-text">Send Message</div>
                </button>
            </div>
        </form>
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
                            <div class="text">How Do I Encourage My Friends to use Karunaa?</div>
                            <img src="{{url('images/landing-page/help/open.svg')}}" alt="" class="img-open">
                            <img src="{{url('images/landing-page/help/close.png')}}" alt="" class="img-close">
                        </div>
                    </button>
                </h2>
                <div id="faqCol3" class="accordion-collapse collapse" aria-labelledby="faqHead3" data-bs-parent="#faqAcc">
                    <div class="accordion-body">
                        <div class="text">We welcome you to follow our social media and events. In addition, we always encourage personalized words of recommendation. </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection

@push('after-scripts')

<script>
    window.oncontextmenu = () => {
        var captcha = grecaptcha.getResponse();
    };

    function checked() {
        $('.form-submit-btn').removeAttr('disabled');
    };
</script>

@endpush
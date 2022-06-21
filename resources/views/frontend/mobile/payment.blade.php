@extends('frontend.layouts.mobile_app')

@section('title', app_name() . ' | ' . 'Payments')

@section('content')

@include('frontend.mobile.includes.top_nav')

<section class="mobile-payment-section">
    <div class="mobile-container">
        <form role="form" action="{{ route('frontend.post_getway') }}" method="post" class="require-validation"
            data-cc-on-file="false"
            data-stripe-publishable-key="{{ env('STRIPE_KEY') }}"
            id="payment-form">
        {{csrf_field()}}
            <!-- <div class="package-block">
                <div class="title">Package</div>
                <div class="splide package-slider" role="group" id="packageSlider">
                    <div class="splide__track">
                        <ul class="splide__list">
                            <li class="splide__slide">
                                <div class="package">
                                    <input type="radio" class="form-check-input" name="package" value="5000">
                                    <div class="header">
                                        <div class="amount"><span>Rs.</span> 5000</div>
                                    </div>
                                    <div class="body">Donate</div>
                                </div>
                            </li>
                            <li class="splide__slide">
                                <div class="package">
                                    <input type="radio" class="form-check-input" name="package" value="10000">
                                    <div class="header">
                                        <div class="amount"><span>Rs.</span> 10000</div>
                                    </div>
                                    <div class="body">Donate</div>
                                </div>
                            </li>
                            <li class="splide__slide">
                                <div class="package">
                                    <input type="radio" class="form-check-input" name="package" value="15000">
                                    <div class="header">
                                        <div class="amount"><span>Rs.</span> 15000</div>
                                    </div>
                                    <div class="body">Donate</div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div> -->
            <div class="payment-block" id="paymentBlock">
                <div class="title">Payment Details</div>

                <div class='card-row'>
                    <label class='form-label'>Name on Card</label>
                    <input class='form-control' name="card-name" size='4' type='text' required>
                </div>
                            
                <div class="card-row">
                    <label class="form-label">Card Number</label>
                    <input type="text" class="form-control card-number" name="card-number" size='20' required>
                </div>
                <div class="card-row">
                    <label class="form-label">CVC</label>
                    <input type="text" name="cvc-number" class="form-control card-cvc" size='4' required>
                </div>                
                <div class="card-row">
                <label class="form-label">Expiry Date</label>
                    <input type="text" name="exp-month" class="form-control card-expiry-month" placeholder='MM' size='2' required>
                    <span>/</span>
                    <input type="hidden" name="receiver_id" value="{{$receiverDetails->id}}">
                    <input type="text" name="exp-year" class="form-control card-expiry-year" placeholder='YYYY' size='4' required>
                </div>
                <!-- <div class="card-row">
                    <label class="form-label">Card Holder Name</label>
                    <input type="text" class="form-control">
                </div> -->
                <div class="card-row">
                    <div class="form-label">Package Type : {{$packageDetails->name}}</div>
                    <input type="text" class="form-control" name="package" value="{{$packageDetails->price}}" readonly required>
                </div>
                <!-- <div class="card-row">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="crdSave">
                        <label class="form-check-label" for="crdSave">Save Card <span>(Optional)</span></label>
                    </div>
                </div> -->
                <div class="card-row">
                    {{--<div class="footer-text">Approved by Central Bank of Sri Lanka</div>--}}
                </div>
                <button type="submit" class="cta-btn btn-fill">
                    <div class="btn-text">Continue</div>
                </button>
            </div>
            <!-- <div class="exp-timer">14m : 52s</div> -->
        </form>

    </div>
</section>

@include('frontend.mobile.includes.bottom_nav')

@endsection

@push('after-scripts')

<script>
    // Package Slider
    var packageSlider = new Splide('#packageSlider', {
        type: 'loop',
        pagination: false,
        arrows: false,
        autoWidth: true,
    });

    packageSlider.mount();
</script>

<script type="text/javascript" src="https://js.stripe.com/v2/"></script>

<script type="text/javascript">
    $(function() {
        var $form         = $(".require-validation");
        $('form.require-validation').bind('submit', function(e) {
            var $form         = $(".require-validation"),
                inputSelector = ['input[type=email]', 'input[type=password]',
                    'input[type=text]', 'input[type=file]',
                    'textarea'].join(', '),
                $inputs       = $form.find('.required').find(inputSelector),
                $errorMessage = $form.find('div.error'),
                valid         = true;
            $errorMessage.addClass('hide');

            $('.has-error').removeClass('has-error');
            $inputs.each(function(i, el) {
                var $input = $(el);
                if ($input.val() === '') {
                    $input.parent().addClass('has-error');
                    $errorMessage.removeClass('hide');
                    e.preventDefault();
                }
            });

            if (!$form.data('cc-on-file')) {
                e.preventDefault();
                Stripe.setPublishableKey($form.data('stripe-publishable-key'));
                Stripe.createToken({
                    number: $('.card-number').val(),
                    cvc: $('.card-cvc').val(),
                    exp_month: $('.card-expiry-month').val(),
                    exp_year: $('.card-expiry-year').val()
                }, stripeResponseHandler);
            }

        });

        function stripeResponseHandler(status, response) {
            if (response.error) {
                $('.error')
                    .removeClass('hide')
                    .find('.alert')
                    .text(response.error.message);
            } else {
                // token contains id, last4, and card type
                var token = response['id'];
                // insert the token into the form so it gets submitted to the server
                $form.find('input[type=text]').empty();
                $form.append("<input type='hidden' name='stripeToken' value='" + token + "'/>");
                $form.get(0).submit();
            }
        }

    });
</script>

<script>
window.addEventListener('DOMContentLoaded', () => {
    const paymentBlock = document.getElementById('paymentBlock')
    const subtBtn = paymentBlock.querySelector('button')
    const inputs = paymentBlock.querySelectorAll('input')

    inputs.forEach((input) => {

        input.addEventListener('keyup', function () {
            if (this.value == '') {
                this.classList.add('invalid')
            } else {
                this.classList.remove('invalid')
            } 
        })

        input.addEventListener('change', function () {
            if (this.value == '') {
                this.classList.add('invalid')
            } else {
                this.classList.remove('invalid')
            }   
        })

        input.addEventListener('focus', function () {
            if (this.value == '') {
                this.classList.add('invalid')
            } else {
                this.classList.remove('invalid')
            }  
        })
    })

    setInterval(() => {
        const values = []

        inputs.forEach((input) => {
            if(input.value) {
                values.push('true')
            }
        })

        if(values.length == 7) {
            subtBtn.classList.remove('disabled')
            subtBtn.removeAttribute('disabled')
        } else {
            subtBtn.classList.add('disabled')
        }
    },10)
})
</script>


@endpush
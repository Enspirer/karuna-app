@extends('frontend.layouts.app')

@section('title', app_name() . ' | ' . __('navs.general.home'))

@section('content')

<section class="section-payment">
    <div class="container">
        <div class="inner-wrapper">
            <div class="title">Payment Details</div>
            @if (Session::has('success'))
                <div class="alert alert-success text-center">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                    <p>{{ Session::get('success') }}</p>
                </div>
            @endif
            <div class="content-block">
                <div class="card-block">
                    <form role="form" action="{{ route('frontend.post_getway') }}" method="post" class="require-validation"
                          data-cc-on-file="false"
                          data-stripe-publishable-key="{{ env('STRIPE_KEY') }}"
                          id="payment-form">
                        {{csrf_field()}}
                        <div class="row-wrapper">
                            <div class='form-row row'>
                                <div class='col-xs-12 form-group required'>
                                    <label class='control-label'>Name on Card</label>
                                    <input class='form-control' size='4' type='text'>
                                </div>
                            </div>

                            <div class="card-row card required">
                                <div class="label-group">
                                    <div class="label">Card Number</div>
                                    <div class="sub-label">Enter the 16-digit card number on the card</div>
                                </div>
                                <input type="text" name="card-number" class="form-control card-number" size='20'>
                            </div>
                            <div class="card-row cvc required">
                                <div class="label-group">
                                    <div class="label">CVC Number</div>
                                    <div class="sub-label">Enter the 3 or 4 digit number on the card</div>
                                </div>
                                <input type="text" name="cvc-number" class="form-control card-cvc" size='4'>
                            </div>
                            <div class="card-row  expiration required">
                                <div class="label-group">
                                    <div class="label">Expiry Date</div>
                                    <div class="sub-label">Enter the expiration date of the card</div>
                                </div>
                                <div class="card-input-group">
                                    <input type="text" name="exp-month" class="form-control card-expiry-month" placeholder='MM' size='2'>
                                    <span>/</span>
                                    <input type="hidden" name="receiver_id" value="{{$receiverDetails->id}}">
                                    <input type="text" name="exp-year" class="form-control card-expiry-year" placeholder='YYYY' size='4'>
                                </div>
                            </div>
                            <div class="card-row">
                                <div class="label-group">
                                    <div class="label">Package Type : {{$packageDetails->name}}</div>
                                </div>
                                <input type="text" class="form-control" name="package" value="{{$packageDetails->price}}">
                            </div>
                            <div class="card-row">
                                <button type="submit" class="cta-btn btn-fill">
                                    <div class="btn-text">Donate Now</div>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="info-block">
                    <div class="info-card">
                        <div class="profile-block">
                            <div class="title">Agent Profile</div>
                            <div class="profile-info">
                                <img src="{{url('images/landing-page/nav/profile.png')}}" alt="" class="dp">
                                <ul>
                                    <li>
                                        <span class="th">Name :</span>
                                        <span class="td">{{$agentDetails->name}}</span>
                                    </li>
                                    <li>
                                        <span class="th">Area :</span>
                                        <span class="td">{{$agentDetails->city}}</span>
                                    </li>
                                    <li>
                                        <span class="th">ID :</span>
                                        <span class="td">{{$agentDetails->nic_number}}</span>
                                    </li>
                                </ul>
                            </div>
                            <a href="{{route('frontend.user.agent_profile',$agentDetails->id)}}">View  History of this Agent</a>
                        </div>
                        <div class="profile-block">
                            <div class="title">Receiver's Profile</div>
                            <div class="profile-info">
                                <img src="{{url('images/landing-page/nav/profile.png')}}" alt="" class="dp">
                                <ul>
                                    <li>
                                        <span class="th">Name :</span>
                                        <span class="td">{{$receiverDetails->name}}</span>
                                    </li>
                                    <li>
                                        <span class="th">Area :</span>
                                        <span class="td">{{$receiverDetails->city}}</span>
                                    </li>
                                    <li>
                                        <span class="th">ID :</span>
                                        <span class="td">{{$receiverDetails->nic_number}}</span>
                                    </li>
                                </ul>
                            </div>
                            <a href="{{route('frontend.user.receiver_profile',$receiverDetails->id)}}">View  History of this Receiver</a>
                            <div class="cat-icon blue">
                                @if($receiverDetails->requirement != 'Other')
                                    @if(App\Models\Packages::where('id',$receiverDetails->requirement)->first() != null)
                                        <div class="icon purple">{{substr( App\Models\Packages::where('id',$receiverDetails->requirement)->first()->name, 0, 1)}}</div>                                     
                                    @else
                                        <div class="name">Package not found</div>
                                    @endif
                                @else
                                    <div class="icon purple">O</div>
                                @endif
                            </div>
                        </div>
                        <div class="footer">
                            <div class="text-block">
                                <div class="text">Your Donate amount is</div>
                                <div class="amount">Rs.<span> {{number_format($packageDetails->price,2)}}</span></div>
                            </div>
                            <img src="{{url('images/landing-page/payment/payment.svg')}}" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

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

@endpush

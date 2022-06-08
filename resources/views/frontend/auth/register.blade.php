@extends('frontend.layouts.app')

@section('title', app_name() . ' | ' . __('labels.frontend.auth.register_box_title'))

@section('content')

<!-- <div class="row justify-content-center align-items-center">
    <div class="col col-sm-8 align-self-center">
        <div class="card" style="margin-top:150px; margin-bottom:100px;">
            <div class="card-header">
                <strong>
                    @lang('labels.frontend.auth.register_box_title')
                </strong>
            </div>

            <div class="card-body">
                {{ html()->form('POST', route('frontend.auth.register.post'))->open() }}
                <div class="row">
                    <div class="col-12 col-md-6">
                        <div class="form-group">
                            {{ html()->label(__('validation.attributes.frontend.first_name'))->for('first_name') }}

                            {{ html()->text('first_name')
                                ->class('form-control')
                                ->placeholder(__('validation.attributes.frontend.first_name'))
                                ->attribute('maxlength', 191)
                                ->required()}}
                        </div>
                    </div>

                    <div class="col-12 col-md-6">
                        <div class="form-group">
                            {{ html()->label(__('validation.attributes.frontend.last_name'))->for('last_name') }}

                            {{ html()->text('last_name')
                                ->class('form-control')
                                ->placeholder(__('validation.attributes.frontend.last_name'))
                                ->attribute('maxlength', 191)
                                ->required() }}
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            {{ html()->label(__('validation.attributes.frontend.email'))->for('email') }}

                            {{ html()->email('email')
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
                            <label>User Type</label>
                            <select class="form-control custom-select" name="user_type"
                                onchange="user_type_check(this);">
                                <option value="" selected disabled>Select...</option>
                                <option value="Receiver">Receiver</option>
                                <option value="Agent">Agent</option>
                                <option value="Donor">Donor</option>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12 col-md-6" id="agent_country" style="display: none;">
                        <div class="form-group">
                            <label>Country</label>
                            <select id="country" class="form-control custom-select" name="country" required>
                                <option value="" selected disabled hidden>Choose Country</option>
                                <option value="Afghanistan">Afghanistan</option>
                                <option value="Albania">Albania</option>
                                <option value="Algeria">Algeria</option>
                                <option value="American Samoa">American Samoa</option>
                                <option value="Andorra">Andorra</option>
                                <option value="Angola">Angola</option>
                                <option value="Anguilla">Anguilla</option>
                                <option value="Antigua & Barbuda">Antigua & Barbuda</option>
                                <option value="Argentina">Argentina</option>
                                <option value="Armenia">Armenia</option>
                                <option value="Aruba">Aruba</option>
                                <option value="Australia">Australia</option>
                                <option value="Austria">Austria</option>
                                <option value="Azerbaijan">Azerbaijan</option>
                                <option value="Bahamas">Bahamas</option>
                                <option value="Bahrain">Bahrain</option>
                                <option value="Bangladesh">Bangladesh</option>
                                <option value="Barbados">Barbados</option>
                                <option value="Belarus">Belarus</option>
                                <option value="Belgium">Belgium</option>
                                <option value="Belize">Belize</option>
                                <option value="Benin">Benin</option>
                                <option value="Bermuda">Bermuda</option>
                                <option value="Bhutan">Bhutan</option>
                                <option value="Bolivia">Bolivia</option>
                                <option value="Bonaire">Bonaire</option>
                                <option value="Bosnia & Herzegovina">Bosnia & Herzegovina</option>
                                <option value="Botswana">Botswana</option>
                                <option value="Brazil">Brazil</option>
                                <option value="British Indian Ocean Ter">British Indian Ocean Ter</option>
                                <option value="Brunei">Brunei</option>
                                <option value="Bulgaria">Bulgaria</option>
                                <option value="Burkina Faso">Burkina Faso</option>
                                <option value="Burundi">Burundi</option>
                                <option value="Cambodia">Cambodia</option>
                                <option value="Cameroon">Cameroon</option>
                                <option value="Canada">Canada</option>
                                <option value="Canary Islands">Canary Islands</option>
                                <option value="Cape Verde">Cape Verde</option>
                                <option value="Cayman Islands">Cayman Islands</option>
                                <option value="Central African Republic">Central African Republic</option>
                                <option value="Chad">Chad</option>
                                <option value="Channel Islands">Channel Islands</option>
                                <option value="Chile">Chile</option>
                                <option value="China">China</option>
                                <option value="Christmas Island">Christmas Island</option>
                                <option value="Cocos Island">Cocos Island</option>
                                <option value="Colombia">Colombia</option>
                                <option value="Comoros">Comoros</option>
                                <option value="Congo">Congo</option>
                                <option value="Cook Islands">Cook Islands</option>
                                <option value="Costa Rica">Costa Rica</option>
                                <option value="Cote DIvoire">Cote DIvoire</option>
                                <option value="Croatia">Croatia</option>
                                <option value="Cuba">Cuba</option>
                                <option value="Curaco">Curacao</option>
                                <option value="Cyprus">Cyprus</option>
                                <option value="Czech Republic">Czech Republic</option>
                                <option value="Denmark">Denmark</option>
                                <option value="Djibouti">Djibouti</option>
                                <option value="Dominica">Dominica</option>
                                <option value="Dominican Republic">Dominican Republic</option>
                                <option value="East Timor">East Timor</option>
                                <option value="Ecuador">Ecuador</option>
                                <option value="Egypt">Egypt</option>
                                <option value="El Salvador">El Salvador</option>
                                <option value="Equatorial Guinea">Equatorial Guinea</option>
                                <option value="Eritrea">Eritrea</option>
                                <option value="Estonia">Estonia</option>
                                <option value="Ethiopia">Ethiopia</option>
                                <option value="Falkland Islands">Falkland Islands</option>
                                <option value="Faroe Islands">Faroe Islands</option>
                                <option value="Fiji">Fiji</option>
                                <option value="Finland">Finland</option>
                                <option value="France">France</option>
                                <option value="French Guiana">French Guiana</option>
                                <option value="French Polynesia">French Polynesia</option>
                                <option value="French Southern Ter">French Southern Ter</option>
                                <option value="Gabon">Gabon</option>
                                <option value="Gambia">Gambia</option>
                                <option value="Georgia">Georgia</option>
                                <option value="Germany">Germany</option>
                                <option value="Ghana">Ghana</option>
                                <option value="Gibraltar">Gibraltar</option>
                                <option value="Great Britain">Great Britain</option>
                                <option value="Greece">Greece</option>
                                <option value="Greenland">Greenland</option>
                                <option value="Grenada">Grenada</option>
                                <option value="Guadeloupe">Guadeloupe</option>
                                <option value="Guam">Guam</option>
                                <option value="Guatemala">Guatemala</option>
                                <option value="Guinea">Guinea</option>
                                <option value="Guyana">Guyana</option>
                                <option value="Haiti">Haiti</option>
                                <option value="Hawaii">Hawaii</option>
                                <option value="Honduras">Honduras</option>
                                <option value="Hong Kong">Hong Kong</option>
                                <option value="Hungary">Hungary</option>
                                <option value="Iceland">Iceland</option>
                                <option value="Indonesia">Indonesia</option>
                                <option value="India">India</option>
                                <option value="Iran">Iran</option>
                                <option value="Iraq">Iraq</option>
                                <option value="Ireland">Ireland</option>
                                <option value="Isle of Man">Isle of Man</option>
                                <option value="Israel">Israel</option>
                                <option value="Italy">Italy</option>
                                <option value="Jamaica">Jamaica</option>
                                <option value="Japan">Japan</option>
                                <option value="Jordan">Jordan</option>
                                <option value="Kazakhstan">Kazakhstan</option>
                                <option value="Kenya">Kenya</option>
                                <option value="Kiribati">Kiribati</option>
                                <option value="Korea North">Korea North</option>
                                <option value="Korea Sout">Korea South</option>
                                <option value="Kuwait">Kuwait</option>
                                <option value="Kyrgyzstan">Kyrgyzstan</option>
                                <option value="Laos">Laos</option>
                                <option value="Latvia">Latvia</option>
                                <option value="Lebanon">Lebanon</option>
                                <option value="Lesotho">Lesotho</option>
                                <option value="Liberia">Liberia</option>
                                <option value="Libya">Libya</option>
                                <option value="Liechtenstein">Liechtenstein</option>
                                <option value="Lithuania">Lithuania</option>
                                <option value="Luxembourg">Luxembourg</option>
                                <option value="Macau">Macau</option>
                                <option value="Macedonia">Macedonia</option>
                                <option value="Madagascar">Madagascar</option>
                                <option value="Malaysia">Malaysia</option>
                                <option value="Malawi">Malawi</option>
                                <option value="Maldives">Maldives</option>
                                <option value="Mali">Mali</option>
                                <option value="Malta">Malta</option>
                                <option value="Marshall Islands">Marshall Islands</option>
                                <option value="Martinique">Martinique</option>
                                <option value="Mauritania">Mauritania</option>
                                <option value="Mauritius">Mauritius</option>
                                <option value="Mayotte">Mayotte</option>
                                <option value="Mexico">Mexico</option>
                                <option value="Midway Islands">Midway Islands</option>
                                <option value="Moldova">Moldova</option>
                                <option value="Monaco">Monaco</option>
                                <option value="Mongolia">Mongolia</option>
                                <option value="Montserrat">Montserrat</option>
                                <option value="Morocco">Morocco</option>
                                <option value="Mozambique">Mozambique</option>
                                <option value="Myanmar">Myanmar</option>
                                <option value="Nambia">Nambia</option>
                                <option value="Nauru">Nauru</option>
                                <option value="Nepal">Nepal</option>
                                <option value="Netherland Antilles">Netherland Antilles</option>
                                <option value="Netherlands">Netherlands (Holland, Europe)</option>
                                <option value="Nevis">Nevis</option>
                                <option value="New Caledonia">New Caledonia</option>
                                <option value="New Zealand">New Zealand</option>
                                <option value="Nicaragua">Nicaragua</option>
                                <option value="Niger">Niger</option>
                                <option value="Nigeria">Nigeria</option>
                                <option value="Niue">Niue</option>
                                <option value="Norfolk Island">Norfolk Island</option>
                                <option value="Norway">Norway</option>
                                <option value="Oman">Oman</option>
                                <option value="Pakistan">Pakistan</option>
                                <option value="Palau Island">Palau Island</option>
                                <option value="Palestine">Palestine</option>
                                <option value="Panama">Panama</option>
                                <option value="Papua New Guinea">Papua New Guinea</option>
                                <option value="Paraguay">Paraguay</option>
                                <option value="Peru">Peru</option>
                                <option value="Phillipines">Philippines</option>
                                <option value="Pitcairn Island">Pitcairn Island</option>
                                <option value="Poland">Poland</option>
                                <option value="Portugal">Portugal</option>
                                <option value="Puerto Rico">Puerto Rico</option>
                                <option value="Qatar">Qatar</option>
                                <option value="Republic of Montenegro">Republic of Montenegro</option>
                                <option value="Republic of Serbia">Republic of Serbia</option>
                                <option value="Reunion">Reunion</option>
                                <option value="Romania">Romania</option>
                                <option value="Russia">Russia</option>
                                <option value="Rwanda">Rwanda</option>
                                <option value="St Barthelemy">St Barthelemy</option>
                                <option value="St Eustatius">St Eustatius</option>
                                <option value="St Helena">St Helena</option>
                                <option value="St Kitts-Nevis">St Kitts-Nevis</option>
                                <option value="St Lucia">St Lucia</option>
                                <option value="St Maarten">St Maarten</option>
                                <option value="St Pierre & Miquelon">St Pierre & Miquelon</option>
                                <option value="St Vincent & Grenadines">St Vincent & Grenadines</option>
                                <option value="Saipan">Saipan</option>
                                <option value="Samoa">Samoa</option>
                                <option value="Samoa American">Samoa American</option>
                                <option value="San Marino">San Marino</option>
                                <option value="Sao Tome & Principe">Sao Tome & Principe</option>
                                <option value="Saudi Arabia">Saudi Arabia</option>
                                <option value="Senegal">Senegal</option>
                                <option value="Seychelles">Seychelles</option>
                                <option value="Sierra Leone">Sierra Leone</option>
                                <option value="Singapore">Singapore</option>
                                <option value="Slovakia">Slovakia</option>
                                <option value="Slovenia">Slovenia</option>
                                <option value="Solomon Islands">Solomon Islands</option>
                                <option value="Somalia">Somalia</option>
                                <option value="South Africa">South Africa</option>
                                <option value="Spain">Spain</option>
                                <option value="Sri Lanka">Sri Lanka</option>
                                <option value="Sudan">Sudan</option>
                                <option value="Suriname">Suriname</option>
                                <option value="Swaziland">Swaziland</option>
                                <option value="Sweden">Sweden</option>
                                <option value="Switzerland">Switzerland</option>
                                <option value="Syria">Syria</option>
                                <option value="Tahiti">Tahiti</option>
                                <option value="Taiwan">Taiwan</option>
                                <option value="Tajikistan">Tajikistan</option>
                                <option value="Tanzania">Tanzania</option>
                                <option value="Thailand">Thailand</option>
                                <option value="Togo">Togo</option>
                                <option value="Tokelau">Tokelau</option>
                                <option value="Tonga">Tonga</option>
                                <option value="Trinidad & Tobago">Trinidad & Tobago</option>
                                <option value="Tunisia">Tunisia</option>
                                <option value="Turkey">Turkey</option>
                                <option value="Turkmenistan">Turkmenistan</option>
                                <option value="Turks & Caicos Is">Turks & Caicos Is</option>
                                <option value="Tuvalu">Tuvalu</option>
                                <option value="Uganda">Uganda</option>
                                <option value="United Kingdom">United Kingdom</option>
                                <option value="Ukraine">Ukraine</option>
                                <option value="United Arab Erimates">United Arab Emirates</option>
                                <option value="United States of America">United States of America</option>
                                <option value="Uraguay">Uruguay</option>
                                <option value="Uzbekistan">Uzbekistan</option>
                                <option value="Vanuatu">Vanuatu</option>
                                <option value="Vatican City State">Vatican City State</option>
                                <option value="Venezuela">Venezuela</option>
                                <option value="Vietnam">Vietnam</option>
                                <option value="Virgin Islands (Brit)">Virgin Islands (Brit)</option>
                                <option value="Virgin Islands (USA)">Virgin Islands (USA)</option>
                                <option value="Wake Island">Wake Island</option>
                                <option value="Wallis & Futana Is">Wallis & Futana Is</option>
                                <option value="Yemen">Yemen</option>
                                <option value="Zaire">Zaire</option>
                                <option value="Zambia">Zambia</option>
                                <option value="Zimbabwe">Zimbabwe</option>
                            </select>
                        </div>
                    </div>

                    <div class="col-12 col-md-6" id="agent_city" style="display: none;">
                        <div class="form-group">
                            <label for="state" class="form-label">City</label>
                            <select class="form-control mb-2 areas custom-select" id="city"
                                aria-label="Default select example" name="city">

                            </select>
                        </div>
                    </div>
                </div>


                <div class="row">
                    <div class="col" id="receiver_assigned_agent" style="display: none;">
                        <div class="form-group">
                            <label>Agents</label>
                            <select class="form-control custom-select" name="assigned_agent_id" id="assigned_agent_id">

                            </select>
                        </div>
                    </div>
                </div>



                <div class="row">
                    <div class="col-12 col-md-6" id="agent_nic" style="display: none;">
                        <div class="form-group">
                            <label for="nic_number" style="margin-bottom:0.5rem">NIC Number</label>

                            {{ html()->text('nic_number')
                                ->class('form-control')
                                ->placeholder(__('NIC Number'))
                                ->attribute('maxlength', 191)
                                }}
                        </div>
                    </div>

                    <div class="col-12 col-md-6" id="agent_occupation" style="display: none;">
                        <div class="form-group">
                            <label for="occupation" style="margin-bottom:0.5rem">Occupation</label>

                            {{ html()->text('occupation')
                                ->class('form-control')
                                ->placeholder(__('Occupation'))
                                ->attribute('maxlength', 191)
                                }}
                        </div>
                    </div>
                </div>


                <div class="row">
                    <div class="col-12 col-md-6" id="agent_contact_number" style="display: none;">
                        <div class="form-group">
                            <label for="contact_number" style="margin-bottom:0.5rem">Contact Number</label>

                            {{ html()->text('contact_number')
                                ->class('form-control')
                                ->placeholder(__('Contact Number'))
                                ->attribute('maxlength', 191)
                                }}
                        </div>
                    </div>

                    <div class="col-12 col-md-6" id="agent_contact_number_two" style="display: none;">
                        <div class="form-group">
                            <label for="contact_number_two" style="margin-bottom:0.5rem">Contact Number Second</label>

                            {{ html()->text('contact_number_two')
                                ->class('form-control')
                                ->placeholder(__('Contact Number Second'))
                                ->attribute('maxlength', 191)
                                }}
                        </div>
                    </div>
                </div>


                <div class="row">
                    <div class="col" id="agent_address" style="display: none;">
                        <div class="form-group">
                            <label for="address" style="margin-bottom:0.5rem">Address</label>

                            {{ html()->text('address')
                                ->class('form-control')
                                ->placeholder(__('Address'))
                                ->attribute('maxlength', 191)
                                }}
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            {{ html()->label(__('validation.attributes.frontend.password'))->for('password') }}

                            {{ html()->password('password')
                                ->class('form-control')
                                ->placeholder(__('validation.attributes.frontend.password'))
                                ->required() }}
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            {{ html()->label(__('validation.attributes.frontend.password_confirmation'))->for('password_confirmation') }}

                            {{ html()->password('password_confirmation')
                                ->class('form-control')
                                ->placeholder(__('validation.attributes.frontend.password_confirmation'))
                                ->required() }}
                        </div>
                    </div>
                </div>

                @if(config('access.captcha.registration'))
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
                            {{ form_submit(__('labels.frontend.auth.register_button')) }}
                        </div>
                    </div>
                </div>

                {{ html()->form()->close() }}

                <div class="row">
                    <div class="col">
                        <div class="text-center">
                            @include('frontend.auth.includes.socialite')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> -->

<section class="section-join">
    <div class="container">
        <div class="inner-wrapper">
            <div class="content-block">
                <img src="{{url('images/logo/karuna-logo-english.svg')}}" alt="" class="logo">
                <form action="{{route('frontend.auth.register.post')}}" method="post" enctype="multipart/form-data">
                {{csrf_field()}}
                    <div class="join-form">
                        <div class="join-form-row">
                            <label for="first_name" class="form-label">First Name</label>
                            <input type="text" name="first_name" maxlength="191" class="form-control" value="{{old('first_name')}}" id="first_name" placeholder="First Name" required>
                        </div>
                        <div class="join-form-row">
                            <label for="last_name" class="form-label">Last Name</label>
                            <input type="text" name="last_name" maxlength="191" class="form-control" value="{{old('last_name')}}" id="last_name" placeholder="Last Name" required>
                        </div>
                        <div class="join-form-row">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" name="email" maxlength="191" class="form-control" value="{{old('email')}}" id="email" placeholder="Email" required>
                        </div>
                        <div class="join-form-row">
                            <label for="" class="form-label">User Type</label>
                            <select class="form-control custom-select" id="user_type" name="user_type" onchange="user_type_check(this);" required>
                                <!-- <option value="" selected disabled>Select...</option>  -->
                                <option value="Receiver" disabled>Receiver</option>                                
                                @if(old('user_type'))
                                    <option value="Agent" {{ old('user_type') == 'Agent' ? "selected":"" }}>Agent</option>
                                    <option value="Donor" {{ old('user_type') == 'Donor' ? "selected":"" }} >Donor</option>
                                @else
                                    <option value="Agent">Agent</option>
                                    <option value="Donor" selected>Donor</option>
                                @endif   
                            </select>
                        </div>
                        <div class="join-form-row hidden-row" id="agent_country">
                            <label for="country" class="form-label">Country</label>
                            <select id="country" class="form-control custom-select" name="country">
                                <option value="" selected disabled>Select Here</option>
                                <option value="Sri Lanka" {{ old('country') === 'Sri Lanka' ? "selected" : "" }}>Sri Lanka</option>
                            </select>
                        </div>
                        <div class="join-form-row hidden-row" id="agent_city">
                            <label for="city" class="form-label">City</label>
                            <select class="form-control areas custom-select" value="{{old('city')}}" id="city" name="city">
                                @if(old('city'))
                                    <option value="{{old('city')}}" selected>{{old('city')}}</option>
                                @endif
                            </select>
                        </div>
                        <div class="join-form-row hidden-row" id="receiver_assigned_agent">
                            <label for="assigned_agent_id" class="form-label">Agent</label>
                            <select class="form-control custom-select" name="assigned_agent_id" value="{{old('assigned_agent_id')}}" id="assigned_agent_id"></select>
                        </div>
                        <div class="join-form-row hidden-row" id="agent_nic">
                            <label for="nic_number" class="form-label">NIC Number</label>
                            <input type="text" name="nic_number" maxlength="191" class="form-control" value="{{old('nic_number')}}" id="nic_number" placeholder="NIC Number">
                        </div>
                        <div class="join-form-row hidden-row" id="agent_id_photo">
                            <label for="id_photo" class="form-label">NIC Photo</label>
                            <input type="file" name="id_photo" class="form-control" value="{{old('id_photo')}}" id="id_photo" placeholder="NIC Photo">
                        </div>
                        <div class="join-form-row hidden-row" id="agent_occupation">
                            <label for="occupation" class="form-label">Occupation</label>
                            <input type="text" name="occupation" maxlength="191" class="form-control" value="{{old('occupation')}}" id="occupation" placeholder="Occupation">
                        </div>
                        <div class="join-form-row hidden-row" id="agent_contact_number">
                            <label for="contact_number" class="form-label">Contact Number</label>
                            <input type="number" name="contact_number" maxlength="191" class="form-control" value="{{old('contact_number')}}" id="contact_number" placeholder="Contact Number">
                        </div>
                        <div class="join-form-row hidden-row" id="agent_contact_number_two">
                            <label for="contact_number_two" class="form-label">Alternative Contact Number</label>
                            <input type="number" name="contact_number_two" maxlength="191" class="form-control" value="{{old('contact_number_two')}}" id="contact_number_two" placeholder="Alternative Contact Number">
                        </div>
                        <div class="join-form-row hidden-row" id="agent_address">
                            <label for="address" class="form-label">Address</label>
                            <input type="text" name="address" maxlength="191" class="form-control" value="{{old('address')}}" id="address" placeholder="Address">
                        </div>
                        
                        <div class="join-form-row">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" name="password" class="form-control" id="password" placeholder="Password" required>
                        </div>
                        <div class="join-form-row">
                            <label for="password_confirmation" class="form-label">Confirm Password</label>
                            <input type="password" name="password_confirmation" class="form-control" id="password_confirmation" placeholder="Confirm Password" required>
                        </div>

                        <div class="card" id="referral_details" style="display: none;">
                            <h5 class="card-header">Referral Details</h5>
                            <div class="card-body">
                                <div class="row g-0 mb-4">
                                    <div class="col-md-12">
                                        <label class="pro-label">Referral Name</label>
                                        <input type="text"  id="referral_name" class="form-control" name="referral_name" value="{{old('referral_name')}}">
                                    </div>                           
                                </div>
                                <div class="row g-0 mb-5">                                    
                                    <div class="col-md-12">
                                        <label class="pro-label">Referral NIC Number</label>
                                        <input type="text" id="referral_nic_number" class="form-control" name="referral_nic_number" value="{{old('referral_nic_number')}}">
                                    </div>                          
                                </div>                                
                            </div>
                        </div>
                        @include('includes.partials.messages')


                        <div class="join-form-row">
                            <button type="submit" class="cta-btn btn-fill pull-right">
                                <div class="btn-text">Sign Up</div>
                            </button>
                        </div>
                        <div class="join-form-row">

                        </div>
                    </div>
                </form>
                <div class="not-join">Are you member? <a href="{{url('login')}}">Sign in now</a></div>
            </div>
            <div class="image-block">
                <img src="{{url('images/landing-page/join/join.png')}}" alt="">
            </div>                          
        </div>
    </div>
</section>

@endsection

@push('after-scripts')
    @if(config('access.captcha.registration'))
        @captchaScripts
    @endif

<script>
    window.addEventListener('DOMContentLoaded', () => {

        const userType = document.getElementById('user_type')
        const agentReqFields = ['agent_country', 'agent_city', 'agent_nic', 'agent_id_photo', 'agent_occupation', 'agent_contact_number', 'agent_contact_number_two', 'agent_address', 'referral_details'];

        const ReqFields = ['country', 'city', 'nic_number', 'id_photo', 'occupation', 'contact_number', 'contact_number_two', 'address', 'referral_name', 'referral_nic_number'];

        if (userType.value == 'Agent') {
            agentReqFields.forEach((input) => {

                document.getElementById(input).style.display = 'block'
            });

            ReqFields.forEach((field) => {
                document.getElementById(field).setAttribute('required', '');
            });
        } else{

        }
    } );

    function user_type_check(that) {
        if (that.value == 'Agent') {
            document.getElementById("agent_nic").style.display = "block";
        } else {
            document.getElementById("agent_nic").style.display = "none";
        }

        if (that.value == 'Agent') {
            document.getElementById("agent_id_photo").style.display = "block";
        } else {
            document.getElementById("agent_id_photo").style.display = "none";
        }        

        if (that.value == 'Agent') {
            document.getElementById("referral_details").style.display = "block";
        } else {
            document.getElementById("referral_details").style.display = "none";
        }        
    
        if (that.value == 'Agent') {
            document.getElementById("agent_contact_number").style.display = "block";
        } else {
            document.getElementById("agent_contact_number").style.display = "none";
        }

        if (that.value == 'Agent' || that.value == 'Receiver') {
            document.getElementById("agent_country").style.display = "block";
        } else {
            document.getElementById("agent_country").style.display = "none";
        }

        if (that.value == 'Agent' || that.value == 'Receiver') {
            document.getElementById("agent_city").style.display = "block";
        } else {
            document.getElementById("agent_city").style.display = "none";
        }

        if (that.value == 'Agent') {
            document.getElementById("agent_contact_number_two").style.display = "block";
        } else {
            document.getElementById("agent_contact_number_two").style.display = "none";
        }
        

        if (that.value == 'Agent') {
            document.getElementById("agent_occupation").style.display = "block";
        } else {
            document.getElementById("agent_occupation").style.display = "none";
        }

        if (that.value == 'Agent') {
            document.getElementById("agent_address").style.display = "block";
        } else {
            document.getElementById("agent_address").style.display = "none";
        }


        if (that.value == 'Receiver') {
            document.getElementById("receiver_assigned_agent").style.display = "block";
        } else {
            document.getElementById("receiver_assigned_agent").style.display = "none";
        }   
    }
</script> 


<script>

    $(document).on('change','#country',function(){

        let country = $('#country').val();
            // console.log(country);

        let name;
        let template;
       
        if(country.includes('-')){
            name = country.replace("-", " ");
        } else {
            name = country;
        }

        $.ajax({
            "type": "POST",
            "url": "https://countriesnow.space/api/v0.1/countries/cities",
            "data": {
                "country": name
            }
        }).done(function (d) {

            for(let i = 0; i < d['data'].length; i++) {
                template+= `
                    <option value="${d['data'][i]}">${d['data'][i]}</option>
                `
            }

            $(".areas").html(template);
            // console.log(d);
        });


        $.ajax({                    
            url: "{{url('/')}}/api/find_cities/" + country,
            method: "GET",
            dataType: "json",
            success:function(data) {
                console.log(data);
           

            }
        });
        
    });
    
</script>

<!-- 
<script>
         $(document).ready(function() {
        $('#city').on('change', function() {
            var City = $(this).val();
            // console.log(City);

                $.ajax({
                    
                    url: "{{url('/')}}/api/find_agent_details/" + City,
                    method: "GET",
                    dataType: "json",
                    success:function(data) {
                        // console.log(data);
                    if(data){
                        $('#assigned_agent_id').empty();
                        $('#assigned_agent_id').focus;
                        $('#assigned_agent_id').append('<option value="" selected disabled>-- Select An Agent --</option>'); 
                        $.each(data, function(key, value){
                            // console.log(key);
                            // console.log(value);
                        $('select[name="assigned_agent_id"]').append('<option value="'+ value.agent_user_id +'">' + value.agent_user_name+ '</option>');
                        
                    });

                    }else{
                        $('#assigned_agent_id').empty();
                    }
                  }
                });
            
        });
    });
</script> -->

<script>
   const tel1 = document.getElementById("contact_number");
   const tel2 = document.getElementById("contact_number_two");
   const telInput1 = window.intlTelInput(tel1);
   const telInput2 = window.intlTelInput(tel2);
</script>

<script>
const userType = document.getElementById('user_type')
const agentReqFields = ['country', 'city', 'nic_number', 'id_photo', 'occupation', 'contact_number', 'contact_number_two', 'address', 'referral_name', 'referral_nic_number']

userType.addEventListener('change', () => {
    if (userType.value == 'Agent') {
        agentReqFields.forEach((field) => {
            document.getElementById(field).setAttribute('required', '')
        })
    }
})
</script>
    
@endpush

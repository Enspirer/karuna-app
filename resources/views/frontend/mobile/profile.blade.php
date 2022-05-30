@extends('frontend.layouts.mobile_app')

@section('title', app_name() . ' | ' . __('navs.general.home'))

@section('content')

<!-- ======== Top Nav ======== -->
<section class="app-bar-section">
    <div class="mobile-container">
        <div class="inner-wrapper">
            <a href="{{route('frontend.user.mobile.index')}}" class="back-btn">
                <i class="fa-solid fa-arrow-left"></i>
            </a>
            <div class="title">Profile</div>
        </div>
    </div>
</section>
<!-- ======== Top Nav End ======== -->


@if(App\Models\Auth\User::where('id',auth()->user()->id)->first()->user_type == 'Donor')

<section class="form-section">
    <div class="mobile-container">

        @if(session()->has('error_pw'))
            <div class="alert alert-danger">
                {{ session()->get('error_pw') }}
            </div>
        @endif
        @if(session()->has('success'))
            <div class="alert alert-success">
                {{ session()->get('success') }}
            </div>
        @endif


        <form action="{{route('frontend.user.update_donor_mobile')}}" method="post" enctype="multipart/form-data">
        {{csrf_field()}}
            <!-- Profile Picture -->
           
            <div class="frm-row">
                <div class="frm-col">
                    <div class="name">{{auth()->user()->first_name}} {{auth()->user()->last_name}}</div>
                        @if(auth()->user()->level == 'Level 1')
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star"></i>
                            <i class="bi bi-star"></i>
                            <i class="bi bi-star"></i>
                        @elseif(auth()->user()->level == 'Level 2')
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star"></i>
                            <i class="bi bi-star"></i>
                        @elseif(auth()->user()->level == 'Level 3')
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star"></i>
                        @elseif(auth()->user()->level == 'Level 4')
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                        @endif
                </div>
            </div>
                        
            <div class="frm-row">
                <label for="first_name" class="form-label">First Name</label>
                <input type="text" name="first_name" maxlength="191" class="form-control" value="{{auth()->user()->first_name}}" id="first_name" required>
            </div>
            <div class="frm-row">
                <label for="last_name" class="form-label">Last Name</label>
                <input type="text" name="last_name" maxlength="191" class="form-control" value="{{auth()->user()->last_name}}" id="last_name" required>
            </div>
            <div class="frm-row">
                <label for="email" class="form-label">Email</label>
                <input type="email" name="email" maxlength="191" class="form-control" value="{{auth()->user()->email}}" id="email" required>
            </div>

            <div class="frm-row">
                <label class="form-label">Upload Profile Picture <span>(Optional)</span></label>
                <div class="form-group">
                    <div class="input-group" data-toggle="aizuploader" data-type="image">
                        <div class="input-group-prepend">
                            <div class="input-group-text bg-soft-secondary font-weight-medium">Browse</div>
                        </div>
                        <div class="form-control file-amount">Choose File</div>
                        <input type="hidden" name="profile_image" value="{{auth()->user()->profile_image}}" class="selected-files" >
                    </div>
                    <div class="file-preview box sm">
                    </div>
                </div> 
            </div>

            <div class="frm-row">  
                <label class="form-label">Bio</label>
                <textarea name="bio" id="bio" class="form-control" style="height:180px">{{auth()->user()->bio}}</textarea>
            </div>   

            <!-- <div class="frm-row">
                <label for="password" class="form-label">Password</label>
                <input type="password" name="password" class="form-control" id="password">
            </div>
            <div class="frm-row">
                <label for="password_confirmation" class="form-label">Confirm Password</label>
                <input type="password" name="password_confirmation" class="form-control" id="password_confirmation" >
            </div> -->

            <!-- Submit Button -->
            <div class="frm-row">
                <input type="hidden" name="hidden_id" class="data-input" value="{{auth()->user()->id}}">
                <button type="submit" class="cta-btn btn-fill">
                    <div class="btn-text">Submit</div>
                </button>
            </div>
        </form>
    </div>
</section>

@else

    <section class="form-section">
        <div class="mobile-container">

            @if(session()->has('error_pw'))
                <div class="alert alert-danger">
                    {{ session()->get('error_pw') }}
                </div>
            @endif
            @if(session()->has('success'))
                <div class="alert alert-success">
                    {{ session()->get('success') }}
                </div>
            @endif


            <form action="{{route('frontend.user.update_agent_mobile')}}" method="post" enctype="multipart/form-data">
            {{csrf_field()}}
            

                <div class="frm-row">
                    <div class="frm-col">
                        <div class="name">{{auth()->user()->first_name}} {{auth()->user()->last_name}}</div>
                        @if(auth()->user()->level == 'Level 1')
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star"></i>
                            <i class="bi bi-star"></i>
                            <i class="bi bi-star"></i>
                        @elseif(auth()->user()->level == 'Level 2')
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star"></i>
                            <i class="bi bi-star"></i>
                        @elseif(auth()->user()->level == 'Level 3')
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star"></i>
                        @elseif(auth()->user()->level == 'Level 4')
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                        @endif
                    </div>
                </div>
                                               

                <!-- Name -->
                <div class="frm-row">
                    <label class="form-label">First Name</label>
                    <input type="text" class="form-control" name="first_name" value="{{auth()->user()->first_name}}" required>
                </div>
                <!-- Nick Name -->
                <div class="frm-row">
                    <label class="form-label">Last Name</label>                       
                    <input type="text" class="form-control" name="last_name" value="{{auth()->user()->last_name}}" required>
                </div>                
              
                <div class="frm-row">
                    <label class="form-label">Email</label>
                    <input type="email" name="email" maxlength="191" class="form-control" value="{{auth()->user()->email}}">
                </div>

                <div class="frm-row">
                    <label class="form-label">Country</label>
                    <select id="countries" class="form-control custom-select" name="country" required>
                        <option value="" selected disabled hidden>Country</option>
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

                <div class="frm-row">
                    <label class="form-label">City ({{auth()->user()->city}})</label>
                    <select class="form-control areas custom-select" id="city" name="city" >

                    </select>
                </div>

                <div class="frm-row">
                    <label class="form-label">Upload Profile Picture <span>(Optional)</span></label>
                    <div class="form-group">
                        <div class="input-group" data-toggle="aizuploader" data-type="image">
                            <div class="input-group-prepend">
                                <div class="input-group-text bg-soft-secondary font-weight-medium">Browse</div>
                            </div>
                            <div class="form-control file-amount">Choose File</div>
                            <input type="hidden" name="profile_image" value="{{auth()->user()->profile_image}}" class="selected-files" >
                        </div>
                        <div class="file-preview box sm">
                        </div>
                    </div> 
                </div>

                <div class="frm-row">  
                    <label class="form-label">Bio</label>
                    <textarea name="bio" id="bio" class="form-control" style="height:180px">{{auth()->user()->bio}}</textarea>
                </div> 
                
                <div class="frm-row">
                    <label class="form-label">NIC Number</label>
                    <input type="text" name="nic_number" maxlength="191" class="form-control" value="{{auth()->user()->nic_number}}" id="nic_number" placeholder="NIC Number">
                </div>
                <div class="frm-row">
                    <label class="form-label">Occupation</label>
                    <input type="text" name="occupation" maxlength="191" class="form-control" value="{{auth()->user()->occupation}}" id="occupation" placeholder="Occupation">
                </div>
                <div class="frm-row">
                    <label class="form-label">Contact Number</label>
                    <input type="text" name="contact_number" maxlength="191" class="form-control" value="{{auth()->user()->contact_number}}" id="contact_number" placeholder="Contact Number">
                </div>
                <div class="frm-row">
                    <label class="form-label">Alternate Contact Number</label>
                    <input type="text" name="contact_number_two" maxlength="191" class="form-control" value="{{auth()->user()->contact_number_two}}" id="contact_number_two" placeholder="Alternative Contact Number">
                </div>
                <div class="frm-row">
                    <label class="form-label">Address</label>
                    <input type="text" name="address" maxlength="191" class="form-control" value="{{auth()->user()->address}}" id="address" placeholder="Address">
                </div>                
                
                <div class="frm-row">
                    <input type="hidden" name="hidden_id" class="form-control" value="{{auth()->user()->id}}" >
                    <button type="submit" class="cta-btn btn-fill">
                        <div class="btn-text">Update</div>
                    </button>
                </div>

               
            </form>
        </div>
    </section>
@endif



@endsection

@push('after-scripts')



<script>

    $(document).on('change','#countries',function(){

        let country = $('#countries').val();
            // alert(country);

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
    });
    
</script>

<script>
    $(document).ready(function() {
        let country = <?php echo json_encode (auth()->user()->country) ?>

        $('#countries option').each(function(i){
            if($(this).val() == country) {
                $(this).attr('selected', 'selected');
            }
        });                      

    });
</script>


@endpush
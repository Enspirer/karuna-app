<div class="dashboard-header">
    <a href="{{url('/')}}" class="back-to-karuna">
        <i class="fa-solid fa-house"></i>
        <div class="text">Back to Karuna</div>
    </a>
    <ul class="breadcrumb-nav">
        <li class="br-item">
            <a href="{{url('dashboard')}}" class="br-link">Home</a>
        </li>
        <li class="br-item">
            <a href="#" class="br-link active">current</a>
        </li>
    </ul>
    <div class="greating-block">
        <div class="message">Good Morning, Mr. Nadika</div>
        <a  type="button" href="#" class="cta-btn btn-fill" data-bs-toggle="modal" data-bs-target="#createDonation">
            <div class="btn-text">Create Donation</div>
        </a>
    </div>
    <div class="button-block">
        <a href="{{url('dashboard')}}" class="nav-btn active">
            <div class="btn-text">My Receivers</div>
        </a>
        <a href="{{route('frontend.dashboard.receiver_request_list')}}" class="nav-btn">
            <div class="btn-text">Receivers Request</div>
            <div class="status">75</div>
        </a>
    </div>
</div>

<!-- Create Donation Modal -->
<div class="modal fade" id="createDonation" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-lg">
        <div class="modal-content">
            <div class="modal-body">
                <form action="{{route('frontend.user.create_receiver')}}" method="post" enctype="multipart/form-data">
                {{csrf_field()}}
                    <div class="inner-wrapper db-form">
                        <div class="row g-0">
                            <div class="col">
                                <div class="title">Create new Donation</div>
                            </div>
                        </div>
                        <!-- DP & Cover -->
                        <div class="row g-0 mb-3">
                            <div class="col-md-5">
                                <label class="pro-label">Upload Profile Picture <span>(Optional)</span></label>
                                <div class="dp-block">
                                    <img src="{{url('images/landing-page/nav/profile.png')}}" alt="">
                                    <a href="#" class="dp-edit">
                                        <i class="bi bi-camera"></i>
                                    </a>

                                    <div class="form-group">
                                        <div class="input-group" data-toggle="aizuploader" data-type="image">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text bg-soft-secondary font-weight-medium">Browse</div>
                                            </div>
                                            <div class="form-control file-amount">Choose File</div>
                                            <input type="hidden" name="profile_image" class="selected-files" >
                                        </div>
                                        <div class="file-preview box sm">
                                        </div>
                                    </div> 

                                </div>
                            </div>
                            <div class="col-md-6">
                                <label class="pro-label">Upload Cover Picture <span>(Optional)</span></label>
                                <div class="cover-block">
                                    <a href="#" class="back-edit">
                                        <i class="bi bi-camera"></i>
                                    </a>

                                    <div class="form-group">
                                        <div class="input-group" data-toggle="aizuploader" data-type="image">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text bg-soft-secondary font-weight-medium">Browse</div>
                                            </div>
                                            <div class="form-control file-amount">Choose File</div>
                                            <input type="hidden" name="cover_image" class="selected-files" >
                                        </div>
                                        <div class="file-preview box sm">
                                        </div>
                                    </div> 

                                </div>
                            </div>
                        </div>
                        <!-- Name -->
                        <div class="row g-0">
                            <div class="col-md-11">
                                <label class="pro-label">Name <span>(Optional)</span></label>
                            </div>
                        </div>
                        <div class="row g-0 mb-3">
                            <div class="col-md-10">
                                <input type="text" class="form-control" name="name">
                            </div>
                            <div class="col-md-1">
                                <div class="form-check form-switch">
                                    <input class="form-check-input" type="checkbox" name="name_toggle" value="yes" role="switch">
                                </div>
                            </div>
                            <div class="col-md-1">
                                <div class="tooltip-block">
                                    <i class="bi bi-question-circle"></i>
                                    <div class="pro-tooltip">
                                        <div class="header">About toggle</div>
                                        <div class="body">You can choose whether your name display everyone or not. If
                                            you
                                            want
                                            to hide your name and profile picture you must tick this toggle. After you
                                            tick
                                            this
                                            toggle your profile picture and name will hide from your listing.</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Nick Name -->
                        <div class="row g-0">
                            <div class="col-md-11">
                                <label class="pro-label">Nick Name</label>
                            </div>
                        </div>
                        <div class="row g-0 mb-3">
                            <div class="col-md-11">
                                <input type="text" class="form-control" name="nick_name" required>
                            </div>
                            <div class="col-md-1">
                                <div class="tooltip-block">
                                    <i class="bi bi-question-circle"></i>
                                    <div class="pro-tooltip">
                                        <div class="header">About toggle</div>
                                        <div class="body">You can choose whether your name display everyone or not. If
                                            you
                                            want
                                            to hide your name and profile picture you must tick this toggle. After you
                                            tick
                                            this
                                            toggle your profile picture and name will hide from your listing.</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Age, Gender, City -->
                        <div class="row g-3 mb-3">
                            <!-- Age -->
                            <div class="col-md-6">
                                <label class="pro-label">Age</label>
                                <input type="number" class="form-control" name="age" min="10" max="100" required>
                            </div>
                            <!-- Gender -->
                            <div class="col-md-5">
                                <label class="pro-label">Gender</label>
                                <select class="form-select" name="gender" required>
                                    <option selected disabled>Choose...</option>
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                </select>
                            </div>
                        </div>

                        <div class="row g-3 mb-3">
                            <!-- City -->
                            <div class="col-md-5">
                                <label class="pro-label">Country</label>
                                <select class="form-select" name="country" id="country" required>
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

                            <div class="col-md-6">
                                <label class="pro-label">City</label>
                                <select class="form-select cities" name="city" id="city">
                                </select>
                            </div>
                        </div>

                        <!-- NIC -->
                        <div class="row g-0 mb-3">
                            <div class="col-md-11">
                                <label class="pro-label">NIC</label>
                                <input type="text" class="form-control" name="nic_number" required>
                            </div>
                        </div>
                        <!-- Address -->
                        <div class="row g-0 mb-3">
                            <div class="col-md-11">
                                <label class="pro-label">Address</label>
                                <input type="text" class="form-control" name="address" required>
                            </div>
                        </div>
                        <!-- Phone, Job -->
                        <div class="row g-0 mb-3">
                            <!-- Phone -->
                            <div class="col-md-5">
                                <label class="pro-label">Phone Number</label>
                                <input type="text" class="form-control" name="phone_number" required>
                            </div>
                            <!-- Job -->
                            <div class="col-md-6">
                                <label class="pro-label">Job</label>
                                <input type="text" class="form-control" name="occupation" required>
                            </div>
                        </div>
                        <!-- Bio -->
                        <div class="row g-0">
                            <div class="col-md-11">
                                <label class="pro-label">Bio</label>
                            </div>
                        </div>
                        <div class="row g-0 mb-3">
                            <div class="col-md-11">
                                <textarea class="form-control" style="height:150px;" name="bio" required></textarea>
                            </div>
                            <div class="col-md-1">
                                <div class="tooltip-block">
                                    <i class="bi bi-question-circle"></i>
                                    <div class="pro-tooltip">
                                        <div class="header">About toggle</div>
                                        <div class="body">You can choose whether your name display everyone or not. If
                                            you
                                            want
                                            to hide your name and profile picture you must tick this toggle. After you
                                            tick
                                            this
                                            toggle your profile picture and name will hide from your listing.</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Add Images -->
                        <div class="row g-0">
                            <div class="col-md-6">
                                <label class="pro-label">Add Images <span>(Optional)</span></label>
                            </div>
                            <div class="col-md-5 text-md-end">
                                <label class="pro-label">Add 3 or more </label>
                            </div>
                        </div>
                        <div class="row g-0 mb-3">
                            <div class="col-md-11">
                                <div class="media-block">
                                    <a href="#"><img src="{{url('images/dashboard/placeholder.png')}}" alt=""></a>
                                    <a href="#"><img src="{{url('images/dashboard/placeholder.png')}}" alt=""></a>
                                    <a href="#"><img src="{{url('images/dashboard/placeholder.png')}}" alt=""></a>
                                </div>
                                <div class="form-group">
                                        <div class="input-group" data-multiple="true" data-toggle="aizuploader" data-type="image">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text bg-soft-secondary font-weight-medium">Browse</div>
                                            </div>
                                            <div class="form-control file-amount">Choose File</div>
                                            <input type="hidden" name="images" class="selected-files" >
                                        </div>
                                        <div class="file-preview box sm">
                                        </div>
                                    </div> 
                            </div>
                            <div class="col-md-1">
                                <div class="tooltip-block">
                                    <i class="bi bi-question-circle"></i>
                                    <div class="pro-tooltip">
                                        <div class="header">About toggle</div>
                                        <div class="body">You can choose whether your name display everyone or not. If
                                            you
                                            want
                                            to hide your name and profile picture you must tick this toggle. After you
                                            tick
                                            this
                                            toggle your profile picture and name will hide from your listing.</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Add videos -->
                        <div class="row g-0">
                            <div class="col-md-6">
                                <label class="pro-label">Add short video clips<span>(Optional)</span></label>
                            </div>
                            <div class="col-md-5 text-md-end">
                                <label class="pro-label">Add 3 or more </label>
                            </div>
                        </div>
                        <div class="row g-0 mb-3">
                            <div class="col-md-11">
                                <div class="media-block">
                                    <a href="#"><img src="{{url('images/dashboard/placeholder.png')}}" alt=""></a>
                                    <a href="#"><img src="{{url('images/dashboard/placeholder.png')}}" alt=""></a>
                                    <a href="#"><img src="{{url('images/dashboard/placeholder.png')}}" alt=""></a>
                                </div>

                                <div class="form-group">
                                        <div class="input-group" data-toggle="aizuploader" data-type="video">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text bg-soft-secondary font-weight-medium">Browse</div>
                                            </div>
                                            <div class="form-control file-amount">Choose File</div>
                                            <input type="hidden" name="videos" class="selected-files" >
                                        </div>
                                        <div class="file-preview box sm">
                                        </div>
                                    </div> 
                            </div>
                            <div class="col-md-1">
                                <div class="tooltip-block">
                                    <i class="bi bi-question-circle"></i>
                                    <div class="pro-tooltip">
                                        <div class="header">About toggle</div>
                                        <div class="body">You can choose whether your name display everyone or not. If
                                            you
                                            want
                                            to hide your name and profile picture you must tick this toggle. After you
                                            tick
                                            this
                                            toggle your profile picture and name will hide from your listing.</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Add audios -->
                        <div class="row g-0">
                            <div class="col-md-11">
                                <label class="pro-label">Add Voice cut<span>(Optional)</span></label>
                            </div>
                        </div>
                        <div class="row g-0 mb-3">
                            <div class="col-md-11">
                                <div class="media-block">
                                    <a href="#"><img src="{{url('images/dashboard/placeholder.png')}}" alt=""></a>
                                    <a href="#"><img src="{{url('images/dashboard/placeholder.png')}}" alt=""></a>
                                    <a href="#"><img src="{{url('images/dashboard/placeholder.png')}}" alt=""></a>
                                </div>
                                <div class="form-group">
                                        <div class="input-group" data-toggle="aizuploader" data-type="audio">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text bg-soft-secondary font-weight-medium">Browse</div>
                                            </div>
                                            <div class="form-control file-amount">Choose File</div>
                                            <input type="hidden" name="audios" class="selected-files" >
                                        </div>
                                        <div class="file-preview box sm">
                                        </div>
                                    </div> 
                            </div>
                            <div class="col-md-1">
                                <div class="tooltip-block">
                                    <i class="bi bi-question-circle"></i>
                                    <div class="pro-tooltip">
                                        <div class="header">About toggle</div>
                                        <div class="body">You can choose whether your name display everyone or not. If
                                            you
                                            want
                                            to hide your name and profile picture you must tick this toggle. After you
                                            tick
                                            this
                                            toggle your profile picture and name will hide from your listing.</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Requirement -->
                        <div class="row g-0">
                            <div class="col-md-11">
                                <label class="pro-label">Requirement</label>
                            </div>
                        </div>
                        <div class="row g-0 mb-3">
                            <div class="col-md-11">
                                <select class="form-select" aria-label="Default select example" name="requirement" onchange="package_type(this);" required>
                                    <option selected disabled>Choose...</option>
                                    @if(count(App\Models\Packages::where('status','Enabled')->get()) != 0)
                                        @foreach(App\Models\Packages::where('status','Enabled')->get() as $package)
                                            <option value="{{$package->id}}">{{$package->name}}</option>
                                        @endforeach
                                    @endif
                                    <option value="Other">Other</option>
                                </select>
                            </div>
                            <div class="col-md-1">
                                <div class="tooltip-block">
                                    <i class="bi bi-question-circle"></i>
                                    <div class="pro-tooltip">
                                        <div class="header">About toggle</div>
                                        <div class="body">You can choose whether your name display everyone or not. If
                                            you
                                            want
                                            to hide your name and profile picture you must tick this toggle. After you
                                            tick
                                            this
                                            toggle your profile picture and name will hide from your listing.</div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- About the donation -->
                      
                        <div class="row g-0 mb-3" id="other_description_hide" style="display: none;">
                            <div class="col-md-11">
                                <label class="pro-label">Other Description</label>
                                <textarea class="form-control" style="height:150px;" name="other_description"></textarea>
                            </div>
                        </div>


                        <!-- About the donation -->
                        <div class="row g-0">
                            <div class="col-md-11">
                                <label class="pro-label">About the donation</label>
                            </div>
                        </div>
                        <div class="row g-0 mb-3">
                            <div class="col-md-11">
                                <textarea class="form-control" style="height:150px;" name="about_donation" required></textarea>
                            </div>
                            <div class="col-md-1">
                                <div class="tooltip-block">
                                    <i class="bi bi-question-circle"></i>
                                    <div class="pro-tooltip">
                                        <div class="header">About toggle</div>
                                        <div class="body">You can choose whether your name display everyone or not. If
                                            you
                                            want to hide your name and profile picture you must tick this toggle. After
                                            you
                                            tick this toggle your profile picture and name will hide from your listing.
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="card" style="border-style: dotted;border-width: 3px; padding: 20px; display: none;" id="account_details">
                            <h5 class="card-header">Account Details</h5>
                            <div class="card-body">
                                <div class="row g-0 mb-4">
                                    <div class="col-md-6">
                                        <label class="pro-label">Account Number</label>
                                        <input type="text" class="form-control" name="account_number">
                                    </div>
                                    <div class="col-md-4">
                                        <label class="pro-label">Bank Name</label>
                                        <input type="text" class="form-control" name="bank_name">
                                    </div>                            
                                </div>
                                <div class="row g-0 mb-5">
                                    <div class="col-md-11">
                                        <label class="pro-label">Branch Name</label>
                                        <input type="text" class="form-control" name="branch_name">
                                    </div>                          
                                </div>                                
                            </div>
                        </div>

                        <div class="row g-0">
                            <div class="col-md-11">
                                <button class="cta-btn btn-fill" type="submit">
                                    <div class="btn-text">Create</div>
                                </button>
                            </div>
                        </div>
                        

                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


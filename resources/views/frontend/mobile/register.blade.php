@extends('frontend.layouts.mobile_app')

@section('title', app_name() . ' | ' . __('navs.general.home'))

@section('content')

<section class="join-header-section">
    <div class="mobile-container">
        <img src="{{url('images/mobile/logo/karuna-logo-english.svg')}}" alt="" class="logo">
        <div class="title">Hello Newcomer !</div>
        <div class="text">Welcome to the Karuna. Please register.</div>
    </div>
</section>

<section class="join-form-section">
    <div class="mobile-container">
        <form action="{{route('frontend.auth.register.post')}}" method="post" enctype="multipart/form-data">
        {{csrf_field()}}
            <div class="join-form">
                <div class="join-form-row">
                    <input type="text" name="first_name" maxlength="191" class="form-control" value="{{old('first_name')}}" id="first_name" placeholder="First Name" required>
                </div>
                <div class="join-form-row">
                    <input type="text" name="last_name" maxlength="191" class="form-control" value="{{old('last_name')}}" id="last_name" placeholder="Last Name" required>
                </div>
                <div class="join-form-row">
                    <input type="email" name="email" maxlength="191" class="form-control" value="{{old('email')}}" id="email" placeholder="Email" required>
                </div>
                <div class="join-form-row">
                    <select class="form-control custom-select" name="user_type" id="user_type" onchange="user_type_check(this);" required>
                        <!-- <option value="" selected disabled>User Type</option>  -->
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



                <div class="join-form-row {{ old('user_type') == 'Agent' ? "":"hidden-row" }}  field-receiver field-agent" id="agent_country">
                    <select id="country" class="form-control custom-select" name="country">
                        <option value="" selected disabled hidden>Country</option>
                        <option value="Afghanistan" {{ old('country') === "Afghanistan" ? "selected" : "" }}>Afghanistan</option>
                        <option value="Albania" {{ old('country') === "Albania" ? "selected" : "" }}>Albania</option>
                        <option value="Algeria" {{ old('country') === "Algeria" ? "selected" : "" }}>Algeria</option>
                        <option value="American Samoa"  {{ old('country') === "American Samoa" ? "selected" : "" }}>American Samoa</option>
                        <option value="Andorra"  {{ old('country') === "Andorra" ? "selected" : "" }}>Andorra</option>
                        <option value="Angola"  {{ old('country') === "Angola" ? "selected" : "" }}>Angola</option>
                        <option value="Anguilla"  {{ old('country') === "Anguilla" ? "selected" : "" }}>Anguilla</option>
                        <option value="Antigua & Barbuda"  {{ old('country') === "Antigua & Barbuda" ? "selected" : "" }}>Antigua & Barbuda</option>
                        <option value="Argentina"  {{ old('country') === "Argentina" ? "selected" : "" }}>Argentina</option>
                        <option value="Armenia"  {{ old('country') === "Armenia" ? "selected" : "" }}>Armenia</option>
                        <option value="Aruba"  {{ old('country') === "Aruba" ? "selected" : "" }}>Aruba</option>
                        <option value="Australia"  {{ old('country') === "Australia" ? "selected" : "" }}>Australia</option>
                        <option value="Austria"  {{ old('country') === "Austria" ? "selected" : "" }}>Austria</option>
                        <option value="Azerbaijan"  {{ old('country') === "Azerbaijan" ? "selected" : "" }}>Azerbaijan</option>
                        <option value="Bahamas"  {{ old('country') === "Bahamas" ? "selected" : "" }}>Bahamas</option>
                        <option value="Bahrain"  {{ old('country') === "Bahrain" ? "selected" : "" }}>Bahrain</option>
                        <option value="Bangladesh"  {{ old('country') === "Bangladesh" ? "selected" : "" }}>Bangladesh</option>
                        <option value="Barbados"  {{ old('country') === "Barbados" ? "selected" : "" }}>Barbados</option>
                        <option value="Belarus"  {{ old('country') === "Belarus" ? "selected" : "" }}>Belarus</option>
                        <option value="Belgium"  {{ old('country') === "Belgium" ? "selected" : "" }}>Belgium</option>
                        <option value="Belize"  {{ old('country') === "Belize" ? "selected" : "" }}>Belize</option>
                        <option value="Benin"  {{ old('country') === "Benin" ? "selected" : "" }}>Benin</option>
                        <option value="Bermuda"  {{ old('country') === "Bermuda" ? "selected" : "" }}>Bermuda</option>
                        <option value="Bhutan"  {{ old('country') === "Bhutan" ? "selected" : "" }}>Bhutan</option>
                        <option value="Bolivia"  {{ old('country') === "Bolivia" ? "selected" : "" }}>Bolivia</option>
                        <option value="Bonaire"  {{ old('country') === "Bonaire" ? "selected" : "" }}>Bonaire</option>
                        <option value="Bosnia & Herzegovina"  {{ old('country') === "Bosnia & Herzegovina" ? "selected" : "" }}>Bosnia & Herzegovina</option>
                        <option value="Botswana"  {{ old('country') === "Botswana" ? "selected" : "" }}>Botswana</option>
                        <option value="Brazil"  {{ old('country') === "Brazil" ? "selected" : "" }}>Brazil</option>
                        <option value="British Indian Ocean Ter"  {{ old('country') === "British Indian Ocean Ter" ? "selected" : "" }}>British Indian Ocean Ter</option>
                        <option value="Brunei"  {{ old('country') === "Brunei" ? "selected" : "" }}>Brunei</option>
                        <option value="Bulgaria"  {{ old('country') === "Bulgaria" ? "selected" : "" }}>Bulgaria</option>
                        <option value="Burkina Faso"  {{ old('country') === "Burkina Faso" ? "selected" : "" }}>Burkina Faso</option>
                        <option value="Burundi"  {{ old('country') === "Burundi" ? "selected" : "" }}>Burundi</option>
                        <option value="Cambodia"  {{ old('country') === "Cambodia" ? "selected" : "" }}>Cambodia</option>
                        <option value="Cameroon"  {{ old('country') === "Cameroon" ? "selected" : "" }}>Cameroon</option>
                        <option value="Canada"  {{ old('country') === "Canada" ? "selected" : "" }}>Canada</option>
                        <option value="Canary Islands"  {{ old('country') === "Canary Islands" ? "selected" : "" }}>Canary Islands</option>
                        <option value="Cape Verde"  {{ old('country') === "Cape Verde" ? "selected" : "" }}>Cape Verde</option>
                        <option value="Cayman Islands"  {{ old('country') === "Cayman Islands" ? "selected" : "" }}>Cayman Islands</option>
                        <option value="Central African Republic"  {{ old('country') === "Central African Republic" ? "selected" : "" }}>Central African Republic</option>
                        <option value="Chad"  {{ old('country') === "Chad" ? "selected" : "" }}>Chad</option>
                        <option value="Channel Islands"  {{ old('country') === "Channel Islands" ? "selected" : "" }}>Channel Islands</option>
                        <option value="Chile"  {{ old('country') === "Chile" ? "selected" : "" }}>Chile</option>
                        <option value="China"  {{ old('country') === "China" ? "selected" : "" }}>China</option>
                        <option value="Christmas Island"  {{ old('country') === "Christmas Island" ? "selected" : "" }}>Christmas Island</option>
                        <option value="Cocos Island" {{ old('country') === "Cocos Island" ? "selected" : "" }}>Cocos Island</option>
                        <option value="Colombia" {{ old('country') === "Colombia" ? "selected" : "" }}>Colombia</option>
                        <option value="Comoros" {{ old('country') === "Comoros" ? "selected" : "" }}>Comoros</option>
                        <option value="Congo" {{ old('country') === "Congo" ? "selected" : "" }}>Congo</option>
                        <option value="Cook Islands" {{ old('country') === "Cook Islands" ? "selected" : "" }}>Cook Islands</option>
                        <option value="Costa Rica" {{ old('country') === "Costa Rica" ? "selected" : "" }}>Costa Rica</option>
                        <option value="Cote DIvoire" {{ old('country') === "Cote DIvoire" ? "selected" : "" }}>Cote DIvoire</option>
                        <option value="Croatia" {{ old('country') === "Croatia" ? "selected" : "" }}>Croatia</option>
                        <option value="Cuba" {{ old('country') === "Cuba" ? "selected" : "" }}>Cuba</option>
                        <option value="Curaco" {{ old('country') === "Curaco" ? "selected" : "" }}>Curacao</option>
                        <option value="Cyprus" {{ old('country') === "Cyprus" ? "selected" : "" }}>Cyprus</option>
                        <option value="Czech Republic" {{ old('country') === "Czech Republic" ? "selected" : "" }}>Czech Republic</option>
                        <option value="Denmark" {{ old('country') === "Denmark" ? "selected" : "" }}>Denmark</option>
                        <option value="Djibouti" {{ old('country') === "Djibouti" ? "selected" : "" }}>Djibouti</option>
                        <option value="Dominica" {{ old('country') === "Dominica" ? "selected" : "" }}>Dominica</option>
                        <option value="Dominican Republic" {{ old('country') === "Dominican Republic" ? "selected" : "" }}>Dominican Republic</option>
                        <option value="East Timor" {{ old('country') === "East Timor" ? "selected" : "" }}>East Timor</option>
                        <option value="Ecuador" {{ old('country') === "Ecuador" ? "selected" : "" }}>Ecuador</option>
                        <option value="Egypt" {{ old('country') === "Egypt" ? "selected" : "" }}>Egypt</option>
                        <option value="El Salvador" {{ old('country') === "El Salvador" ? "selected" : "" }}>El Salvador</option>
                        <option value="Equatorial Guinea" {{ old('country') === "Equatorial Guinea" ? "selected" : "" }}>Equatorial Guinea</option>
                        <option value="Eritrea" {{ old('country') === "Eritrea" ? "selected" : "" }}>Eritrea</option>
                        <option value="Estonia" {{ old('country') === "Estonia" ? "selected" : "" }}>Estonia</option>
                        <option value="Ethiopia" {{ old('country') === "Ethiopia" ? "selected" : "" }}>Ethiopia</option>
                        <option value="Falkland Islands" {{ old('country') === "Falkland Islands" ? "selected" : "" }}>Falkland Islands</option>
                        <option value="Faroe Islands" {{ old('country') === "Faroe Islands" ? "selected" : "" }}>Faroe Islands</option>
                        <option value="Fiji" {{ old('country') === "Fiji" ? "selected" : "" }}>Fiji</option>
                        <option value="Finland" {{ old('country') === "Finland" ? "selected" : "" }}>Finland</option>
                        <option value="France" {{ old('country') === "France" ? "selected" : "" }}>France</option>
                        <option value="French Guiana" {{ old('country') === "French Guiana" ? "selected" : "" }}>French Guiana</option>
                        <option value="French Polynesia" {{ old('country') === "French Polynesia" ? "selected" : "" }}>French Polynesia</option>
                        <option value="French Southern Ter" {{ old('country') === "French Southern Ter" ? "selected" : "" }}>French Southern Ter</option>
                        <option value="Gabon" {{ old('country') === "Gabon" ? "selected" : "" }}>Gabon</option>
                        <option value="Gambia" {{ old('country') === "Gambia" ? "selected" : "" }}>Gambia</option>
                        <option value="Georgia" {{ old('country') === "Georgia" ? "selected" : "" }}>Georgia</option>
                        <option value="Germany" {{ old('country') === "Germany" ? "selected" : "" }}>Germany</option>
                        <option value="Ghana" {{ old('country') === "Ghana" ? "selected" : "" }}>Ghana</option>
                        <option value="Gibraltar" {{ old('country') === "Gibraltar" ? "selected" : "" }}>Gibraltar</option>
                        <option value="Great Britain" {{ old('country') === "Great Britain" ? "selected" : "" }}>Great Britain</option>
                        <option value="Greece" {{ old('country') === "Greece" ? "selected" : "" }}>Greece</option>
                        <option value="Greenland" {{ old('country') === "Greenland" ? "selected" : "" }}>Greenland</option>
                        <option value="Grenada" {{ old('country') === "Grenada" ? "selected" : "" }}>Grenada</option>
                        <option value="Guadeloupe" {{ old('country') === "Guadeloupe" ? "selected" : "" }}>Guadeloupe</option>
                        <option value="Guam" {{ old('country') === "Guam" ? "selected" : "" }}>Guam</option>
                        <option value="Guatemala" {{ old('country') === "Guatemala" ? "selected" : "" }}>Guatemala</option>
                        <option value="Guinea" {{ old('country') === "Guinea" ? "selected" : "" }}>Guinea</option>
                        <option value="Guyana" {{ old('country') === "Guyana" ? "selected" : "" }}>Guyana</option>
                        <option value="Haiti" {{ old('country') === "Haiti" ? "selected" : "" }}>Haiti</option>
                        <option value="Hawaii" {{ old('country') === "Hawaii" ? "selected" : "" }}>Hawaii</option>
                        <option value="Honduras" {{ old('country') === "Honduras" ? "selected" : "" }}>Honduras</option>
                        <option value="Hong Kong" {{ old('country') === "Hong Kong" ? "selected" : "" }}>Hong Kong</option>
                        <option value="Hungary" {{ old('country') === "Hungary" ? "selected" : "" }}>Hungary</option>
                        <option value="Iceland" {{ old('country') === "Iceland" ? "selected" : "" }}>Iceland</option>
                        <option value="Indonesia" {{ old('country') === "Indonesia" ? "selected" : "" }}>Indonesia</option>
                        <option value="India" {{ old('country') === "India" ? "selected" : "" }}>India</option>
                        <option value="Iran" {{ old('country') === "Iran" ? "selected" : "" }}>Iran</option>
                        <option value="Iraq" {{ old('country') === "Iraq" ? "selected" : "" }}>Iraq</option>
                        <option value="Ireland" {{ old('country') === "Ireland" ? "selected" : "" }}>Ireland</option>
                        <option value="Isle of Man" {{ old('country') === "Isle of Man" ? "selected" : "" }}>Isle of Man</option>
                        <option value="Israel" {{ old('country') === "Israel" ? "selected" : "" }}>Israel</option>
                        <option value="Italy" {{ old('country') === "Italy" ? "selected" : "" }}>Italy</option>
                        <option value="Jamaica" {{ old('country') === "Jamaica" ? "selected" : "" }}>Jamaica</option>
                        <option value="Japan" {{ old('country') === "Japan" ? "selected" : "" }}>Japan</option>
                        <option value="Jordan" {{ old('country') === "Jordan" ? "selected" : "" }}>Jordan</option>
                        <option value="Kazakhstan" {{ old('country') === "Kazakhstan" ? "selected" : "" }}>Kazakhstan</option>
                        <option value="Kenya" {{ old('country') === "Kenya" ? "selected" : "" }}>Kenya</option>
                        <option value="Kiribati" {{ old('country') === "Kiribati" ? "selected" : "" }}>Kiribati</option>
                        <option value="Korea North" {{ old('country') === "Korea North" ? "selected" : "" }}>Korea North</option>
                        <option value="Korea Sout" {{ old('country') === "Korea Sout" ? "selected" : "" }}>Korea South</option>
                        <option value="Kuwait" {{ old('country') === "Kuwait" ? "selected" : "" }}>Kuwait</option>
                        <option value="Kyrgyzstan" {{ old('country') === "Kyrgyzstan" ? "selected" : "" }}>Kyrgyzstan</option>
                        <option value="Laos" {{ old('country') === "Laos" ? "selected" : "" }}>Laos</option>
                        <option value="Latvia" {{ old('country') === "Latvia" ? "selected" : "" }}>Latvia</option>
                        <option value="Lebanon" {{ old('country') === "Lebanon" ? "selected" : "" }}>Lebanon</option>
                        <option value="Lesotho" {{ old('country') === "Lesotho" ? "selected" : "" }}>Lesotho</option>
                        <option value="Liberia" {{ old('country') === "Liberia" ? "selected" : "" }}>Liberia</option>
                        <option value="Libya" {{ old('country') === "Libya" ? "selected" : "" }}>Libya</option>
                        <option value="Liechtenstein" {{ old('country') === "Liechtenstein" ? "selected" : "" }}>Liechtenstein</option>
                        <option value="Lithuania" {{ old('country') === "Lithuania" ? "selected" : "" }}>Lithuania</option>
                        <option value="Luxembourg" {{ old('country') === "Luxembourg" ? "selected" : "" }}>Luxembourg</option>
                        <option value="Macau" {{ old('country') === "Macau" ? "selected" : "" }}>Macau</option>
                        <option value="Macedonia" {{ old('country') === "Macedonia" ? "selected" : "" }}>Macedonia</option>
                        <option value="Madagascar" {{ old('country') === "Madagascar" ? "selected" : "" }}>Madagascar</option>
                        <option value="Malaysia" {{ old('country') === "Malaysia" ? "selected" : "" }}>Malaysia</option>
                        <option value="Malawi" {{ old('country') === "Malawi" ? "selected" : "" }}>Malawi</option>
                        <option value="Maldives" {{ old('country') === "Maldives" ? "selected" : "" }}>Maldives</option>
                        <option value="Mali" {{ old('country') === "Mali" ? "selected" : "" }}>Mali</option>
                        <option value="Malta" {{ old('country') === "Malta" ? "selected" : "" }}>Malta</option>
                        <option value="Marshall Islands" {{ old('country') === "Marshall" ? "selected" : "" }}>Marshall Islands</option>
                        <option value="Martinique" {{ old('country') === "Martinique" ? "selected" : "" }}>Martinique</option>
                        <option value="Mauritania" {{ old('country') === "Mauritania" ? "selected" : "" }}>Mauritania</option>
                        <option value="Mauritius" {{ old('country') === "Mauritius" ? "selected" : "" }}>Mauritius</option>
                        <option value="Mayotte" {{ old('country') === "Mayotte" ? "selected" : "" }}>Mayotte</option>
                        <option value="Mexico" {{ old('country') === "Mexico" ? "selected" : "" }}>Mexico</option>
                        <option value="Midway Islands" {{ old('country') === "Midway Islands" ? "selected" : "" }}>Midway Islands</option>
                        <option value="Moldova" {{ old('country') === "Moldova" ? "selected" : "" }}>Moldova</option>
                        <option value="Monaco" {{ old('country') === "Monaco" ? "selected" : "" }}>Monaco</option>
                        <option value="Mongolia" {{ old('country') === "Mongolia" ? "selected" : "" }}>Mongolia</option>
                        <option value="Montserrat" {{ old('country') === "Montserrat" ? "selected" : "" }}>Montserrat</option>
                        <option value="Morocco" {{ old('country') === "Morocco" ? "selected" : "" }}>Morocco</option>
                        <option value="Mozambique" {{ old('country') === "Mozambique" ? "selected" : "" }}>Mozambique</option>
                        <option value="Myanmar" {{ old('country') === "Myanmar" ? "selected" : "" }}>Myanmar</option>
                        <option value="Nambia" {{ old('country') === "Nambia" ? "selected" : "" }}>Nambia</option>
                        <option value="Nauru" {{ old('country') === "Nauru" ? "selected" : "" }}>Nauru</option>
                        <option value="Nepal" {{ old('country') === "Nepal" ? "selected" : "" }}>Nepal</option>
                        <option value="Netherland Antilles" {{ old('country') === "Netherland Antilles" ? "selected" : "" }}>Netherland Antilles</option>
                        <option value="Netherlands" {{ old('country') === "Netherlands" ? "selected" : "" }}>Netherlands (Holland, Europe)</option>
                        <option value="Nevis" {{ old('country') === "Nevis" ? "selected" : "" }}>Nevis</option>
                        <option value="New Caledonia" {{ old('country') === "New Caledonia" ? "selected" : "" }}>New Caledonia</option>
                        <option value="New Zealand" {{ old('country') === "New Zealand" ? "selected" : "" }}>New Zealand</option>
                        <option value="Nicaragua" {{ old('country') === "Nicaragua" ? "selected" : "" }}>Nicaragua</option>
                        <option value="Niger" {{ old('country') === "Niger" ? "selected" : "" }}>Niger</option>
                        <option value="Nigeria" {{ old('country') === "Nigeria" ? "selected" : "" }}>Nigeria</option>
                        <option value="Niue" {{ old('country') === "Niue" ? "selected" : "" }}>Niue</option>
                        <option value="Norfolk Island" {{ old('country') === "Norfolk Island" ? "selected" : "" }}>Norfolk Island</option>
                        <option value="Norway" {{ old('country') === "Norway" ? "selected" : "" }}>Norway</option>
                        <option value="Oman" {{ old('country') === "Oman" ? "selected" : "" }}>Oman</option>
                        <option value="Pakistan" {{ old('country') === "Pakistan" ? "selected" : "" }}>Pakistan</option>
                        <option value="Palau Island" {{ old('country') === "Palau Island" ? "selected" : "" }}>Palau Island</option>
                        <option value="Palestine" {{ old('country') === "Palestine" ? "selected" : "" }}>Palestine</option>
                        <option value="Panama" {{ old('country') === "Panama" ? "selected" : "" }}>Panama</option>
                        <option value="Papua New Guinea" {{ old('country') === "Papua New Guinea" ? "selected" : "" }}>Papua New Guinea</option>
                        <option value="Paraguay" {{ old('country') === "Paraguay" ? "selected" : "" }}>Paraguay</option>
                        <option value="Peru" {{ old('country') === "Peru" ? "selected" : "" }}>Peru</option>
                        <option value="Phillipines" {{ old('country') === "Phillipines" ? "selected" : "" }}>Philippines</option>
                        <option value="Pitcairn Island" {{ old('country') === "Pitcairn Island" ? "selected" : "" }}>Pitcairn Island</option>
                        <option value="Poland" {{ old('country') === "Poland" ? "selected" : "" }}>Poland</option>
                        <option value="Portugal" {{ old('country') === "Portugal" ? "selected" : "" }}>Portugal</option>
                        <option value="Puerto Rico" {{ old('country') === "Puerto Rico" ? "selected" : "" }}>Puerto Rico</option>
                        <option value="Qatar" {{ old('country') === "Qatar" ? "selected" : "" }}>Qatar</option>
                        <option value="Republic of Montenegro" {{ old('country') === "Republic of Montenegro" ? "selected" : "" }}>Republic of Montenegro</option>
                        <option value="Republic of Serbia" {{ old('country') === "Republic of Serbia" ? "selected" : "" }}>Republic of Serbia</option>
                        <option value="Reunion" {{ old('country') === "Reunion" ? "selected" : "" }}>Reunion</option>
                        <option value="Romania" {{ old('country') === "Romania" ? "selected" : "" }}>Romania</option>
                        <option value="Russia" {{ old('country') === "Russia" ? "selected" : "" }}>Russia</option>
                        <option value="Rwanda" {{ old('country') === "Rwanda" ? "selected" : "" }}>Rwanda</option>
                        <option value="St Barthelemy" {{ old('country') === "St Barthelemy" ? "selected" : "" }}>St Barthelemy</option>
                        <option value="St Eustatius" {{ old('country') === "St Eustatius" ? "selected" : "" }}>St Eustatius</option>
                        <option value="St Helena" {{ old('country') === "St Helena" ? "selected" : "" }}>St Helena</option>
                        <option value="St Kitts-Nevis" {{ old('country') === "St Kitts-Nevis" ? "selected" : "" }}>St Kitts-Nevis</option>
                        <option value="St Lucia" {{ old('country') === "St Lucia" ? "selected" : "" }}>St Lucia</option>
                        <option value="St Maarten" {{ old('country') === "St Maarten" ? "selected" : "" }}>St Maarten</option>
                        <option value="St Pierre & Miquelon" {{ old('country') === "St Pierre & Miquelon" ? "selected" : "" }}>St Pierre & Miquelon</option>
                        <option value="St Vincent & Grenadines" {{ old('country') === "St Vincent & Grenadines" ? "selected" : "" }}>St Vincent & Grenadines</option>
                        <option value="Saipan" {{ old('country') === "Saipan" ? "selected" : "" }}>Saipan</option>
                        <option value="Samoa" {{ old('country') === "Samoa" ? "selected" : "" }}>Samoa</option>
                        <option value="Samoa American" {{ old('country') === "Samoa American" ? "selected" : "" }}>Samoa American</option>
                        <option value="San Marino" {{ old('country') === "San Marino" ? "selected" : "" }}>San Marino</option>
                        <option value="Sao Tome & Principe" {{ old('country') === "Sao Tome & Principe" ? "selected" : "" }}>Sao Tome & Principe</option>
                        <option value="Saudi Arabia" {{ old('country') === "Saudi Arabia" ? "selected" : "" }}>Saudi Arabia</option>
                        <option value="Senegal" {{ old('country') === "Senegal" ? "selected" : "" }}>Senegal</option>
                        <option value="Seychelles" {{ old('country') === "Seychelles" ? "selected" : "" }}>Seychelles</option>
                        <option value="Sierra Leone" {{ old('country') === "Sierra Leone" ? "selected" : "" }}>Sierra Leone</option>
                        <option value="Singapore" {{ old('country') === "Singapore" ? "selected" : "" }}>Singapore</option>
                        <option value="Slovakia" {{ old('country') === "Slovakia" ? "selected" : "" }}>Slovakia</option>
                        <option value="Slovenia" {{ old('country') === "Slovenia" ? "selected" : "" }}>Slovenia</option>
                        <option value="Solomon Islands" {{ old('country') === "Solomon Islands" ? "selected" : "" }}>Solomon Islands</option>
                        <option value="Somalia" {{ old('country') === "Somalia" ? "selected" : "" }}>Somalia</option>
                        <option value="South Africa" {{ old('country') === "South Africa" ? "selected" : "" }}>South Africa</option>
                        <option value="Spain" {{ old('country') === "Spain" ? "selected" : "" }}>Spain</option>
                        <option value="Sri Lanka" {{ old('country') === "Sri Lanka" ? "selected" : "" }}>Sri Lanka</option>
                        <option value="Sudan" {{ old('country') === "Sudan" ? "selected" : "" }}>Sudan</option>
                        <option value="Suriname" {{ old('country') === "Suriname" ? "selected" : "" }}>Suriname</option>
                        <option value="Swaziland" {{ old('country') === "Swaziland" ? "selected" : "" }}>Swaziland</option>
                        <option value="Sweden" {{ old('country') === "Sweden" ? "selected" : "" }}>Sweden</option>
                        <option value="Switzerland" {{ old('country') === "Switzerland" ? "selected" : "" }}>Switzerland</option>
                        <option value="Syria" {{ old('country') === "Syria" ? "selected" : "" }}>Syria</option>
                        <option value="Tahiti" {{ old('country') === "Tahiti" ? "selected" : "" }}>Tahiti</option>
                        <option value="Taiwan" {{ old('country') === "Taiwan" ? "selected" : "" }}>Taiwan</option>
                        <option value="Tajikistan" {{ old('country') === "Tajikistan" ? "selected" : "" }}>Tajikistan</option>
                        <option value="Tanzania" {{ old('country') === "Tanzania" ? "selected" : "" }}>Tanzania</option>
                        <option value="Thailand" {{ old('country') === "Thailand" ? "selected" : "" }}>Thailand</option>
                        <option value="Togo" {{ old('country') === "Togo" ? "selected" : "" }}>Togo</option>
                        <option value="Tokelau" {{ old('country') === "Tokelau" ? "selected" : "" }}>Tokelau</option>
                        <option value="Tonga" {{ old('country') === "Tonga" ? "selected" : "" }}>Tonga</option>
                        <option value="Trinidad & Tobago" {{ old('country') === "Trinidad & Tobago" ? "selected" : "" }}>Trinidad & Tobago</option>
                        <option value="Tunisia" {{ old('country') === "Tunisia" ? "selected" : "" }}>Tunisia</option>
                        <option value="Turkey" {{ old('country') === "Turkey" ? "selected" : "" }}>Turkey</option>
                        <option value="Turkmenistan" {{ old('country') === "Turkmenistan" ? "selected" : "" }}>Turkmenistan</option>
                        <option value="Turks & Caicos Is" {{ old('country') === "v" ? "selected" : "" }}>Turks & Caicos Is</option>
                        <option value="Tuvalu" {{ old('country') === "Tuvalu" ? "selected" : "" }}>Tuvalu</option>
                        <option value="Uganda" {{ old('country') === "Uganda" ? "selected" : "" }}>Uganda</option>
                        <option value="United Kingdom" {{ old('country') === "United Kingdom" ? "selected" : "" }}>United Kingdom</option>
                        <option value="Ukraine" {{ old('country') === "Ukraine" ? "selected" : "" }}>Ukraine</option>
                        <option value="United Arab Erimates" {{ old('country') === "United Arab Erimates" ? "selected" : "" }}>United Arab Emirates</option>
                        <option value="United States of America" {{ old('country') === "United States of America" ? "selected" : "" }}>United States of America</option>
                        <option value="Uraguay" {{ old('country') === "Uraguay" ? "selected" : "" }}>Uruguay</option>
                        <option value="Uzbekistan" {{ old('country') === "Uzbekistan" ? "selected" : "" }}>Uzbekistan</option>
                        <option value="Vanuatu" {{ old('country') === "Vanuatu" ? "selected" : "" }}>Vanuatu</option>
                        <option value="Vatican City State" {{ old('country') === "Vatican City State" ? "selected" : "" }}>Vatican City State</option>
                        <option value="Venezuela" {{ old('country') === "Venezuela" ? "selected" : "" }}>Venezuela</option>
                        <option value="Vietnam" {{ old('country') === "Vietnam" ? "selected" : "" }}>Vietnam</option>
                        <option value="Virgin Islands (Brit)" {{ old('country') === "Virgin Islands (Brit)" ? "selected" : "" }}>Virgin Islands (Brit)</option>
                        <option value="Virgin Islands (USA)" {{ old('country') === "Virgin Islands (USA)" ? "selected" : "" }}>Virgin Islands (USA)</option>
                        <option value="Wake Island" {{ old('country') === "Wake Island" ? "selected" : "" }}>Wake Island</option>
                        <option value="Wallis & Futana Is" {{ old('country') === "Wallis & Futana Is" ? "selected" : "" }}>Wallis & Futana Is</option>
                        <option value="Yemen" {{ old('country') === "Honduras" ? "selected" : "" }}>Yemen</option>
                        <option value="Zaire" {{ old('country') === "Honduras" ? "selected" : "" }}>Zaire</option>
                        <option value="Zambia" {{ old('country') === "Honduras" ? "selected" : "" }}>Zambia</option>
                        <option value="Zimbabwe" {{ old('country') === "Honduras" ? "selected" : "" }}>Zimbabwe</option>
                    </select>
                </div>
                <div class="join-form-row {{ old('user_type') == 'Agent' ? "":"hidden-row" }}  field-receiver field-agent" id="agent_city">
                    <select class="form-control areas custom-select" id="city" value="{{old('city')}}" name="city">
                        @if(old('city'))
                            <option value="{{old('city')}}" selected>{{old('city')}}</option>
                        @endif
                    </select>
                </div>
           
                <div class="join-form-row {{ old('user_type') == 'Agent' ? "":"hidden-row" }}  field-agent" id="agent_nic">
                    <input type="text" name="nic_number" maxlength="191" class="form-control" value="{{old('nic_number')}}" id="nic_number" placeholder="NIC Number">
                </div>
                <div class="join-form-row {{ old('user_type') == 'Agent' ? "":"hidden-row" }}  field-agent" id="agent_id_photo">
                    <label style="font-size: 11px;padding-left: 10px;">ID Card Photo</label>
                    <input type="file" name="id_photo" maxlength="191" class="form-control" value="" id="id_photo" placeholder="NIC Photo">
                </div>
                <div class="join-form-row {{ old('user_type') == 'Agent' ? "":"hidden-row" }} field-agent" id="agent_occupation">
                    <input type="text" name="occupation" maxlength="191" class="form-control" value="{{old('occupation')}}" id="occupation" placeholder="Occupation">
                </div>
                <div class="join-form-row {{ old('user_type') == 'Agent' ? "":"hidden-row" }}  field-agent" id="agent_contact_number">
                    <input type="text" name="contact_number" maxlength="191" class="form-control" value="{{old('contact_number')}}" id="contact_number" placeholder="Contact Number">
                </div>
                <div class="join-form-row {{ old('user_type') == 'Agent' ? "":"hidden-row" }}  field-agent" id="agent_contact_number_two">
                    <input type="text" name="contact_number_two" maxlength="191" class="form-control" value="{{old('contact_number_two')}}" id="contact_number_two" placeholder="Alternative Contact Number">
                </div>
                <div class="join-form-row {{ old('user_type') == 'Agent' ? "":"hidden-row" }} {{ old('user_type') == 'Agent' ? "":"hidden-row" }}  field-agent" id="agent_address">
                    <input type="text" name="address" maxlength="191" class="form-control" value="{{old('address')}}" id="address" placeholder="Address">
                </div>
                <div class="join-form-row">
                    <input type="password" name="password" class="form-control" id="password" placeholder="Password" required>
                </div>
                <div class="join-form-row">
                    <input type="password" name="password_confirmation" class="form-control" id="password_confirmation" placeholder="Confirm Password" required>
                </div>
                <div class="card" style="display: none;" id="referral_details">
                    <h5 class="card-header">Referral Details</h5>
                    <div class="card-body">
                        <div class="row g-0 mb-4">
                            <div class="col-md-12">
                                <label class="pro-label">Referral Name</label>
                                <input type="text" class="form-control" id="referral_name" name="referral_name" value="{{old('referral_name')}}">
                            </div>                           
                        </div>
                        <div class="row g-0 mb-5">                                    
                            <div class="col-md-12">
                                <label class="pro-label">Referral NIC Number</label>
                                <input type="text" class="form-control" id="referral_nic_number" name="referral_nic_number" value="{{old('referral_nic_number')}}">
                            </div>                          
                        </div>                                
                    </div>
                </div>
                @include('includes.partials.messages')

                <div class="join-form-row">
                    <button type="submit" class="cta-btn btn-fill pull-right">
                        <div class="btn-text">Register</div>
                    </button>
                </div>
            </div>
        </form>

        <div class="not-join">Are you member? <a href="{{route('frontend.mobile.login')}}">Sign in now</a></div>
    </div>
</section>

@endsection

@push('after-scripts')

<script>
    window.addEventListener('DOMContentLoaded', () => {

        const userType = document.getElementById('user_type')
        const agentReqFields = ['agent_country', 'agent_city', 'agent_nic', 'agent_id_photo', 'agent_occupation', 'agent_contact_number', 'agent_contact_number_two', 'agent_address', 'referral_details']

        if (userType.value == 'Agent') {
            agentReqFields.forEach((input) => {
                input.style.display = 'block'
            })
        } 
    } )
    
    function user_type_check(that) {
        if (that.value == 'Agent') {
            document.getElementById("agent_nic").style.display = "block";
        } else {
            document.getElementById("agent_nic").style.display = "none";
        }

        if (that.value == 'Agent') {
            document.getElementById("agent_id_photo").style.display = "block";
            document.getElementById("agent_id_photo").required = true;
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
   const tel1 = document.getElementById("contact_number");
   const tel2 = document.getElementById("contact_number_two");
   const telInput1 = window.intlTelInput(tel1);
   const telInput2 = window.intlTelInput(tel2);
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
    });
    
</script>


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
</script>

<script>
const userType = document.getElementById('user_type')
const agentReqFields = ['country', 'city', 'nic_number', 'id_photo', 'occupation', 'contact_number', 'contact_number_two', 'address', 'referral_name', 'referral_nic_number']

userType.addEventListener('change', () => {
    if (userType.value == 'Agent') {
        agentReqFields.forEach((field) => {
            document.getElementById(field).setAttribute('required', 'required')
        })
    }
})
</script>


@endpush
@if(App\Models\Auth\User::where('id',auth()->user()->id)->first()->user_type == 'Agent')

<section class="agent-bottom-nav-section">
    <div class="inner-wrapper">
        <a href="{{route('frontend.mobile.donation')}}" class="add-btn">
            <i class="bi bi-plus-lg"></i>
        </a>
        <div class="nav-container">
            <div class="nav-block">
                <div class="navs navs-L">
                    <a href="{{route('frontend.mobile.index')}}" class="nav-link active">
                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 14 14">
                            <path id="Path_7670" data-name="Path 7670" d="M5,3A2,2,0,0,0,3,5V7A2,2,0,0,0,5,9H7A2,2,0,0,0,9,7V5A2,2,0,0,0,7,3Zm0,8a2,2,0,0,0-2,2v2a2,2,0,0,0,2,2H7a2,2,0,0,0,2-2V13a2,2,0,0,0-2-2Zm6-6a2,2,0,0,1,2-2h2a2,2,0,0,1,2,2V7a2,2,0,0,1-2,2H13a2,2,0,0,1-2-2Zm0,8a2,2,0,0,1,2-2h2a2,2,0,0,1,2,2v2a2,2,0,0,1-2,2H13a2,2,0,0,1-2-2Z" transform="translate(-3 -3)"/>
                        </svg>
                    </a>
                    <a href="{{route('frontend.mobile.notification')}}" class="nav-link">
                        <svg xmlns="http://www.w3.org/2000/svg" width="15.918" height="16" viewBox="0 0 15.918 16">
                                <path id="Path_1" data-name="Path 1" d="M15,14H10a2,2,0,0,1-4,0H1a.961.961,0,0,1-.9-.7,1.068,1.068,0,0,1,.3-1.1A4.026,4.026,0,0,0,2,9V6A6,6,0,0,1,14,6V9a4.026,4.026,0,0,0,1.6,3.2.947.947,0,0,1,.3,1.1A.961.961,0,0,1,15,14Z" transform="translate(-0.063)" fill-rule="evenodd"/>
                        </svg>
                    </a>
                </div>
                <div class="navs navs-R">
                    <a href="{{route('frontend.mobile.profile_menu')}}" class="nav-link">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16">
                                <path id="Union_1" data-name="Union 1" d="M0,16V14c0-2.2,3.6-4,8-4s8,1.8,8,4v2ZM4,4A4,4,0,1,1,8,8,4,4,0,0,1,4,4Z" transform="translate(0 0)" />
                        </svg>
                    </a>
                    <a href="{{route('frontend.mobile.profile')}}" class="nav-link">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16.2" height="16" viewBox="0 0 16.2 16">
                            <path id="Path_104" data-name="Path 104" d="M267.5,10a2,2,0,1,0-2-2A2.006,2.006,0,0,0,267.5,10Zm-4.1-6.4a5.64,5.64,0,0,1,2.4-1.3l.8-2.3h2l.8,2.3a6.983,6.983,0,0,1,2.4,1.3l2.4-.5,1,1.8-1.6,1.8a5.7,5.7,0,0,1,.1,1.3c0,.4-.1.9-.1,1.3l1.6,1.8-1,1.8-2.4-.5a5.64,5.64,0,0,1-2.4,1.3l-.8,2.3h-2l-.8-2.3a6.983,6.983,0,0,1-2.4-1.3l-2.4.5-1-1.8,1.6-1.8a5.7,5.7,0,0,1-.1-1.3c0-.4.1-.9.1-1.3L260,4.9l1-1.8Z" transform="translate(-259)" fill-rule="evenodd"/>
                        </svg>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

@elseif(App\Models\Auth\User::where('id',auth()->user()->id)->first()->user_type == 'Donor')

<section class="bottom-nav-section">
    <div class="inner-wrapper">
        <div class="mobile-container">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a href="{{route('frontend.mobile.index')}}" class="nav-link active">
                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 14 14">
                            <path id="Path_7670" data-name="Path 7670" d="M5,3A2,2,0,0,0,3,5V7A2,2,0,0,0,5,9H7A2,2,0,0,0,9,7V5A2,2,0,0,0,7,3Zm0,8a2,2,0,0,0-2,2v2a2,2,0,0,0,2,2H7a2,2,0,0,0,2-2V13a2,2,0,0,0-2-2Zm6-6a2,2,0,0,1,2-2h2a2,2,0,0,1,2,2V7a2,2,0,0,1-2,2H13a2,2,0,0,1-2-2Zm0,8a2,2,0,0,1,2-2h2a2,2,0,0,1,2,2v2a2,2,0,0,1-2,2H13a2,2,0,0,1-2-2Z" transform="translate(-3 -3)"/>
                        </svg>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('frontend.mobile.notification')}}" class="nav-link">
                        <svg xmlns="http://www.w3.org/2000/svg" width="15.918" height="16" viewBox="0 0 15.918 16">
                                <path id="Path_1" data-name="Path 1" d="M15,14H10a2,2,0,0,1-4,0H1a.961.961,0,0,1-.9-.7,1.068,1.068,0,0,1,.3-1.1A4.026,4.026,0,0,0,2,9V6A6,6,0,0,1,14,6V9a4.026,4.026,0,0,0,1.6,3.2.947.947,0,0,1,.3,1.1A.961.961,0,0,1,15,14Z" transform="translate(-0.063)" fill-rule="evenodd"/>
                        </svg>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('frontend.mobile.donation_list')}}" class="nav-link">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16.002" viewBox="0 0 16 16.002">
                            <g id="Group_1106" data-name="Group 1106" transform="translate(-2 -1.998)">
                                <path id="Path_7668" data-name="Path 7668" d="M5,5a3,3,0,0,1,5-2.236A3,3,0,0,1,14.83,6H16a2,2,0,0,1,0,4H11V9A1,1,0,0,0,9,9v1H4A2,2,0,0,1,4,6H5.17A3.013,3.013,0,0,1,5,5ZM9,6V5A1,1,0,1,0,8,6Zm3,0a1,1,0,1,0-1-1V6Z" fill-rule="evenodd"/>
                                <path id="Path_7669" data-name="Path 7669" d="M9,11H3v5a2,2,0,0,0,2,2H9Zm2,7h4a2,2,0,0,0,2-2V11H11Z" />
                            </g>
                        </svg>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('frontend.mobile.profile_menu')}}" class="nav-link">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16">
                                <path id="Union_1" data-name="Union 1" d="M0,16V14c0-2.2,3.6-4,8-4s8,1.8,8,4v2ZM4,4A4,4,0,1,1,8,8,4,4,0,0,1,4,4Z" transform="translate(0 0)" />
                        </svg>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('frontend.mobile.profile')}}" class="nav-link">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16.2" height="16" viewBox="0 0 16.2 16">
                            <path id="Path_104" data-name="Path 104" d="M267.5,10a2,2,0,1,0-2-2A2.006,2.006,0,0,0,267.5,10Zm-4.1-6.4a5.64,5.64,0,0,1,2.4-1.3l.8-2.3h2l.8,2.3a6.983,6.983,0,0,1,2.4,1.3l2.4-.5,1,1.8-1.6,1.8a5.7,5.7,0,0,1,.1,1.3c0,.4-.1.9-.1,1.3l1.6,1.8-1,1.8-2.4-.5a5.64,5.64,0,0,1-2.4,1.3l-.8,2.3h-2l-.8-2.3a6.983,6.983,0,0,1-2.4-1.3l-2.4.5-1-1.8,1.6-1.8a5.7,5.7,0,0,1-.1-1.3c0-.4.1-.9.1-1.3L260,4.9l1-1.8Z" transform="translate(-259)" fill-rule="evenodd"/>
                        </svg>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</section>

@else

<section class="bottom-nav-section">
    <div class="inner-wrapper">
        <div class="mobile-container">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a href="{{route('frontend.mobile.index')}}" class="nav-link active">
                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 14 14">
                            <path id="Path_7670" data-name="Path 7670" d="M5,3A2,2,0,0,0,3,5V7A2,2,0,0,0,5,9H7A2,2,0,0,0,9,7V5A2,2,0,0,0,7,3Zm0,8a2,2,0,0,0-2,2v2a2,2,0,0,0,2,2H7a2,2,0,0,0,2-2V13a2,2,0,0,0-2-2Zm6-6a2,2,0,0,1,2-2h2a2,2,0,0,1,2,2V7a2,2,0,0,1-2,2H13a2,2,0,0,1-2-2Zm0,8a2,2,0,0,1,2-2h2a2,2,0,0,1,2,2v2a2,2,0,0,1-2,2H13a2,2,0,0,1-2-2Z" transform="translate(-3 -3)"/>
                        </svg>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('frontend.mobile.notification')}}" class="nav-link">
                        <svg xmlns="http://www.w3.org/2000/svg" width="15.918" height="16" viewBox="0 0 15.918 16">
                                <path id="Path_1" data-name="Path 1" d="M15,14H10a2,2,0,0,1-4,0H1a.961.961,0,0,1-.9-.7,1.068,1.068,0,0,1,.3-1.1A4.026,4.026,0,0,0,2,9V6A6,6,0,0,1,14,6V9a4.026,4.026,0,0,0,1.6,3.2.947.947,0,0,1,.3,1.1A.961.961,0,0,1,15,14Z" transform="translate(-0.063)" fill-rule="evenodd"/>
                        </svg>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('frontend.mobile.donation_list')}}" class="nav-link">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16.002" viewBox="0 0 16 16.002">
                            <g id="Group_1106" data-name="Group 1106" transform="translate(-2 -1.998)">
                                <path id="Path_7668" data-name="Path 7668" d="M5,5a3,3,0,0,1,5-2.236A3,3,0,0,1,14.83,6H16a2,2,0,0,1,0,4H11V9A1,1,0,0,0,9,9v1H4A2,2,0,0,1,4,6H5.17A3.013,3.013,0,0,1,5,5ZM9,6V5A1,1,0,1,0,8,6Zm3,0a1,1,0,1,0-1-1V6Z" fill-rule="evenodd"/>
                                <path id="Path_7669" data-name="Path 7669" d="M9,11H3v5a2,2,0,0,0,2,2H9Zm2,7h4a2,2,0,0,0,2-2V11H11Z" />
                            </g>
                        </svg>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('frontend.mobile.profile_menu')}}" class="nav-link">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16">
                                <path id="Union_1" data-name="Union 1" d="M0,16V14c0-2.2,3.6-4,8-4s8,1.8,8,4v2ZM4,4A4,4,0,1,1,8,8,4,4,0,0,1,4,4Z" transform="translate(0 0)" />
                        </svg>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('frontend.mobile.profile')}}" class="nav-link">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16.2" height="16" viewBox="0 0 16.2 16">
                            <path id="Path_104" data-name="Path 104" d="M267.5,10a2,2,0,1,0-2-2A2.006,2.006,0,0,0,267.5,10Zm-4.1-6.4a5.64,5.64,0,0,1,2.4-1.3l.8-2.3h2l.8,2.3a6.983,6.983,0,0,1,2.4,1.3l2.4-.5,1,1.8-1.6,1.8a5.7,5.7,0,0,1,.1,1.3c0,.4-.1.9-.1,1.3l1.6,1.8-1,1.8-2.4-.5a5.64,5.64,0,0,1-2.4,1.3l-.8,2.3h-2l-.8-2.3a6.983,6.983,0,0,1-2.4-1.3l-2.4.5-1-1.8,1.6-1.8a5.7,5.7,0,0,1-.1-1.3c0-.4.1-.9.1-1.3L260,4.9l1-1.8Z" transform="translate(-259)" fill-rule="evenodd"/>
                        </svg>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</section>

@endif
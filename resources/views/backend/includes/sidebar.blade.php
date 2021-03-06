<style>
    body {
    font-family: Arial, Helvetica, sans-serif;
    }

    .notification {
    background-color: red;
    color: white;
    text-decoration: none;
    position: relative;
    display: inline-block;
    border-radius: 2px;
    }

    .notification:hover {
    background: red;
    }

    .notification .badge {
    position: absolute;
    padding: 5px 10px;
    border-radius: 50%;
    background-color: red;
    color: white;
    }
</style>


<div class="sidebar">
    <nav class="sidebar-nav">
        <ul class="nav">
            <li class="nav-title">
                @lang('menus.backend.sidebar.general')
            </li>
            <li class="nav-item">
                <a class="nav-link {{
                    active_class(Route::is('admin/dashboard'))
                }}" href="{{ route('admin.dashboard') }}">
                    <i class="nav-icon fas fa-tachometer-alt"></i>
                    @lang('menus.backend.sidebar.dashboard')
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link {{
                    active_class(Route::is('admin/payment'))
                }}" href="{{ route('admin.payment.index') }}">
                    <i class="nav-icon fas fa-money-check-alt"></i>
                    Payments
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link {{active_class(Route::is('admin/donate_notification'))}}" href="{{ route('admin.donate_notification.index') }}">
                <i class="nav-icon fas fa-bell"></i>
                    Notifications 
                    @if(count(App\Models\Receivers::where('status','Agent Not Responded')->get()) != 0)
                        <span class="notification badge">{{App\Models\Receivers::where('status','Agent Not Responded')->get()->count()}}</span>
                    @endif
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link {{ active_class(Route::is('admin/module-explorer'))}}" href="{{ route('admin.module.index') }}">
                    <i class="nav-icon fa fa-box"></i>
                    Module Explorer
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link {{active_class(Route::is('admin/file_manager'))}}" href="{{ route('admin.file_manager.index') }}">
                <i class="nav-icon fas fa-folder-open"></i>
                    File Manager
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link {{active_class(Route::is('admin/package'))}}" href="{{ route('admin.package.index') }}">
                <i class="nav-icon fas fa-archive"></i>
                    Packages
                </a>
            </li>

           

            <li class="nav-item nav-dropdown ">
                <a class="nav-link nav-dropdown-toggle " href="#">
                    <i class="nav-icon fas fa-flag"></i> 
                    Countries
                </a>
                <ul class="nav-dropdown-items">
                    <li class="nav-item">
                        <a class="nav-link {{active_class(Route::is('admin/country'))}}" href="{{ route('admin.country.index') }}">
                            Countries
                        </a>
                    </li>     
                    <li class="nav-item">
                        <a class="nav-link {{active_class(Route::is('admin/district'))}}" href="{{ route('admin.district.index') }}">
                            District
                        </a>
                    </li>   
                    <li class="nav-item">
                        <a class="nav-link {{active_class(Route::is('admin/city'))}}" href="{{ route('admin.city.index') }}">
                            City
                        </a>
                    </li>                 
                </ul>
            </li>

            @if(Module::has('Blog'))
                @if(Module::find('Blog')->isStatus(1))

                    <li class="nav-item nav-dropdown ">
                        <a class="nav-link nav-dropdown-toggle " href="#">
                            <i class="nav-icon fas fa-newspaper"></i>
                            Events
                        </a>

                        <ul class="nav-dropdown-items">

                            <!-- @if(auth()->user()->can('view blog category'))
                                <li class="nav-item">
                                    <a class="nav-link {{active_class(Route::is('admin/category'))}}" href="{{ route('admin.category.index') }}">                            
                                        Category
                                    </a>
                                </li>  
                            @endif -->

                            @if(auth()->user()->can('view blog posts'))
                                <li class="nav-item">
                                    <a class="nav-link {{active_class(Route::is('admin/post'))}}" href="{{ route('admin.post.index') }}">                            
                                        Events
                                    </a>
                                </li>  
                            @endif

                        </ul>
                    </li>  

                @endif
            @endif

            <li class="nav-item">
                <a class="nav-link {{active_class(Route::is('admin/help_and_support'))}}" href="{{ route('admin.help_and_support.index') }}">
                    <i class="nav-icon fas fa-hands-helping"></i>
                    Help And Support
                    @if(count(App\Models\HelpSupport::where('status','Pending')->get()) != 0)
                       <span class="notification badge">{{App\Models\HelpSupport::where('status','Pending')->get()->count()}}</span>
                    @endif
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link {{active_class(Route::is('admin/contact_users'))}}" href="{{ route('admin.contact_users.index') }}">
                    <i class="nav-icon fas fa-comment"></i>
                    Contact Users
                    @if(count(App\Models\ContactNow::where('status','Pending')->get()) != 0)                    
                        <span class="notification badge">{{App\Models\ContactNow::where('status','Pending')->get()->count()}}</span>
                    @endif               
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link {{active_class(Route::is('admin/contact_us'))}}" href="{{ route('admin.contact_us.index') }}">
                    <i class="nav-icon fas fa-comments"></i>
                    Contact Us 
                    @if(count(App\Models\ContactUs::where('status','Pending')->get()) != 0)                    
                        <span class="notification badge">{{App\Models\ContactUs::where('status','Pending')->get()->count()}}</span>
                    @endif               
                </a>
            </li>

            

            @if ($logged_in_user->isAdmin())
                <li class="nav-title">
                    @lang('menus.backend.sidebar.system')
                </li>

                <li class="nav-item nav-dropdown ">
                    <a class="nav-link nav-dropdown-toggle " href="#">
                        <i class="nav-icon fas fa-cog"></i>
                        Settings
                    </a>

                    <ul class="nav-dropdown-items">
                        <li class="nav-item">
                            <a class="nav-link {{active_class(Route::is('admin/settings'))}}" href="{{ route('admin.settings.index') }}">                        
                                General Settings
                            </a>  
                        </li>  
                        <li class="nav-item">
                            <a class="nav-link {{active_class(Route::is('admin/about_us'))}}" href="{{ route('admin.about_us') }}">
                                About Us
                            </a>
                        </li>                    
                        <li class="nav-item">
                            <a class="nav-link {{active_class(Route::is('admin/privacy_policy'))}}" href="{{ route('admin.privacy_policy') }}">
                                Privacy Policy
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{active_class(Route::is('admin/terms_and_conditions'))}}" href="{{ route('admin.terms_and_conditions') }}">
                                Terms and Conditions
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link {{active_class(Route::is('admin/contactus_thanks'))}}" href="{{ route('admin.contactus_thanks') }}">
                                Contact Us Thanks Email
                            </a>
                        </li>                   
                    </ul>
                </li>

                <li class="nav-item nav-dropdown {{
                    active_class(Route::is('admin/auth*'), 'open')
                }}">
                    <a class="nav-link nav-dropdown-toggle {{
                        active_class(Route::is('admin/auth*'))
                    }}" href="#">
                        <i class="nav-icon far fa-user"></i>
                        @lang('menus.backend.access.title')

                        @if ($pending_approval > 0)
                            <span class="badge badge-danger">{{ $pending_approval }}</span>
                        @endif
                    </a>

                    <ul class="nav-dropdown-items">
                        <li class="nav-item">
                            <a class="nav-link {{
                                active_class(Route::is('admin/auth/user*'))
                            }}" href="{{ route('admin.auth.user.index') }}">
                                @lang('labels.backend.access.users.management')

                                @if ($pending_approval > 0)
                                    <span class="badge badge-danger">{{ $pending_approval }}</span>
                                @endif
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{
                                active_class(Route::is('admin/auth/role*'))
                            }}" href="{{ route('admin.auth.role.index') }}">
                                @lang('labels.backend.access.roles.management')
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link {{active_class(Route::is('admin/agent'))}}" href="{{ route('admin.agent.index') }}">                        
                                Volunteer List 
                                @if(count(App\Models\Auth\User::where('user_type','Agent')->get()) != 0) 
                                    <span class="notification badge">{{App\Models\Auth\User::where('user_type','Agent')->get()->count()}}</span>
                                @endif                           
                            </a>  
                        </li>  
                        <li class="nav-item">
                            <a class="nav-link {{active_class(Route::is('admin/donor'))}}" href="{{ route('admin.donor.index') }}">
                                Donar List 
                                @if(count(App\Models\Auth\User::where('user_type','Donor')->get()) != 0)   
                                    <span class="notification badge">{{App\Models\Auth\User::where('user_type','Donor')->get()->count()}}</span>
                                @endif
                            </a>
                        </li>    

                    </ul>
                </li>

                <li class="divider"></li>

                <li class="nav-item nav-dropdown {{
                    active_class(Route::is('admin/log-viewer*'), 'open')
                }}">
                        <a class="nav-link nav-dropdown-toggle {{
                            active_class(Route::is('admin/log-viewer*'))
                        }}" href="#">
                        <i class="nav-icon fas fa-list"></i> @lang('menus.backend.log-viewer.main')
                    </a>

                    <ul class="nav-dropdown-items">
                        <li class="nav-item">
                            <a class="nav-link {{
                            active_class(Route::is('admin/log-viewer'))
                        }}" href="{{ route('log-viewer::dashboard') }}">
                                @lang('menus.backend.log-viewer.dashboard')
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{
                            active_class(Route::is('admin/log-viewer/logs*'))
                        }}" href="{{ route('log-viewer::logs.list') }}">
                                @lang('menus.backend.log-viewer.logs')
                            </a>
                        </li>
                    </ul>
                </li>
            @endif
        </ul>
    </nav>

    <button class="sidebar-minimizer brand-minimizer" type="button"></button>
</div><!--sidebar-->

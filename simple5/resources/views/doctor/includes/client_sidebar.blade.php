            <div class="sidebar" id="sidebar">
                <div class="sidebar-inner slimscroll">
                    <div id="sidebar-menu" class="sidebar-menu">
                        <ul>
                            <li class="menu-title">
                                <span>Main</span>
                            </li>
                            <li class="submenu">
                                <a href="#"><i class="la la-dashboard"></i> <span> Dashboard</span> <span
                                        class="menu-arrow"></span></a>
                                <ul style="display: none;">
                                    <li><a href="{{ route('doctor.appoi_list') }}">Dashboard</a></li>
                                </ul>
                            </li>
                            <!-- Appoinemets -->
                            <li class="submenu">
                                <a href="#"><i class="la la-users"></i>
                                    <span>{{ __('messages.appointment') }}</span><span class="menu-arrow"></span></a>
                                <ul style="display: none;">
                                    <li><a href="#">{{ __('messages.appoinemetlist') }} </a></li>
                                    <li><a href="#">{{ __('messages.addappoinemet') }}</a></li>
                                </ul>
                            </li>
                            <!-- /Appoinemets -->

                            <!-- Profile -->
                            <li class="submenu">
                                <a href="#"><i class="la la-user"></i> <span>{{ __('profile') }}</span><span
                                        class="menu-arrow"></span></a>
                                <ul style="display: none;">
                                    <li><a href="#">{{ __('editprofile') }} </a></li>
                                    <li><a href="#">{{ __('changepassword') }} </a></li>
                                </ul>
                            </li>
                            <!-- /profile -->
                        </ul>
                    </div>
                </div>
            </div>
s

            <div class="sidebar" id="sidebar">
                <div class="sidebar-inner slimscroll">
                    <div id="sidebar-menu" class="sidebar-menu">
                        <ul>
                            <li class="menu-title">
                                <span>Main</span>
                            </li>

                            <li class="submenu">
                                <a href="#"><i class="la la-dashboard"></i> <span> {{ __('messages.dashboard') }}</span> <span
                                        class="menu-arrow"></span></a>
                                <ul style="display: none;">
                                    <li><a href="{{ route('accountant.dash') }}">{{ __('messages.dashboard') }}</a></li>
                                </ul>
                            </li>
                            <!-- patients -->
                            <li class="submenu">
                                <a href="#"><i class="la la-users"></i>
                                    <span>{{ __('messages.patients') }}</span><span class="menu-arrow"></span></a>
                                <ul style="display: none;">
                                    <li><a
                                            href="{{ route('accountant.patientlist') }}">{{ __('messages.patientlist') }}</a>
                                    </li>
                                    <li><a href={{ route('accountant.createpatient') }}><i class="la la-user-plus"></i>
                                            <span>{{ __('messages.addpatient') }}</span></a></li>
                                </ul>
                            </li>
                            <!-- /patients -->
                            <!-- Appoinemets -->
                            <li class="submenu">
                                <a href="#"><i class="la la-users"></i>
                                    <span>{{ __('messages.appointment') }}</span><span class="menu-arrow"></span></a>
                                <ul style="display: none;">
                                    <li><a href="{{ route('accountant.dash') }}">{{ __('messages.appoinemetlist') }}
                                        </a></li>
                                    <li><a
                                            href="{{ route('accountant.createappoi') }}">{{ __('messages.addappoinemet') }}</a>
                                    </li>
                                </ul>
                            </li>
                            <!-- /Appoinemets -->


                            <!-- Profile -->
                            <li class="submenu">
                                <a href="#"><i class="la la-users"></i> <span>{{ __('messages.profile') }}</span><span
                                        class="menu-arrow"></span></a>
                                <ul style="display: none;">
                                    <li><a href="#">{{ __('messages.editprofile') }} </a></li>
                                    <li><a href="#">{{ __('messages.changepassword') }} </a></li>
                                </ul>
                            </li>
                            <!-- /profile -->


                        </ul>
                    </div>
                </div>
            </div>

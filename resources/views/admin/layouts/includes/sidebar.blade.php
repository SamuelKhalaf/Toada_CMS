<div id="kt_app_sidebar" class="app-sidebar flex-column" data-kt-drawer="true" data-kt-drawer-name="app-sidebar"
     data-kt-drawer-activate="{default: true, lg: false}" data-kt-drawer-overlay="true" data-kt-drawer-width="225px"
     data-kt-drawer-direction="start" data-kt-drawer-toggle="#kt_app_sidebar_mobile_toggle">
    <!--begin::Logo-->
    <div class="app-sidebar-logo px-6" id="kt_app_sidebar_logo">
        <!--begin::Logo image-->
        <a href="{{ route('admin.users.index') }}">
            <img alt="Toada Logo" src="{{asset('images/toada-white.png')}}"
                 class="app-sidebar-logo-default" style="width: 230px !important; max-height: 60px; object-fit: contain;"/>
            <img alt="Toada Logo" src="{{asset('images/toada-white.png')}}"
                 class="h-50px app-sidebar-logo-minimize" style="max-width: 50px; object-fit: contain;"/>
        </a>
        <!--end::Logo image-->
        <!--begin::Sidebar toggle-->
        <div id="kt_app_sidebar_toggle"
             class="app-sidebar-toggle btn btn-icon btn-shadow btn-sm btn-color-muted btn-active-color-primary body-bg h-30px w-30px position-absolute top-50 start-100 translate-middle rotate"
             data-kt-toggle="true" data-kt-toggle-state="active" data-kt-toggle-target="body"
             data-kt-toggle-name="app-sidebar-minimize">
            <span class="svg-icon svg-icon-2 rotate-180">
                <i class="fa-solid fa-angles-left"></i>
            </span>
        </div>
        <!--end::Sidebar toggle-->
    </div>
    <!--end::Logo-->
    <!--begin::sidebar menu-->
    <div class="app-sidebar-menu overflow-hidden flex-column-fluid">
        <!--begin::Menu wrapper-->
        <div id="kt_app_sidebar_menu_wrapper" class="app-sidebar-wrapper hover-scroll-overlay-y my-5"
             data-kt-scroll="true" data-kt-scroll-activate="true" data-kt-scroll-height="auto"
             data-kt-scroll-dependencies="#kt_app_sidebar_logo, #kt_app_sidebar_footer"
             data-kt-scroll-wrappers="#kt_app_sidebar_menu" data-kt-scroll-offset="5px"
             data-kt-scroll-save-state="true">
            <!--begin::Menu-->
            <div class="menu menu-column menu-rounded menu-sub-indention px-3" id="#kt_app_sidebar_menu"
                 data-kt-menu="true" data-kt-menu-expand="false">
                <!--begin:Menu item-->
                <div class="menu-item {{setMenuOpenClass(['admin.users.index'])}}">
                    <!--begin:Menu link-->
                    <a class="menu-link {{setActiveClass('admin.users.index')}}" href="{{route('admin.users.index')}}">
                        <span class="menu-icon">
                            <span class="svg-icon svg-icon-2">
                                <i class="fa-solid fa-users"></i>
                            </span>
                        </span>
                        <span class="menu-title">@lang('navigation.users')</span>
                    </a>
                    <!--end:Menu link-->
                </div>
                <!--end:Menu item-->
                
                <!--begin:Menu item-->
                <div class="menu-item {{setMenuOpenClass(['admin.pages.index', 'admin.pages.edit'])}}">
                    <!--begin:Menu link-->
                    <a class="menu-link {{setActiveClass(['admin.pages.index', 'admin.pages.edit'])}}" href="{{route('admin.pages.index')}}">
                        <span class="menu-icon">
                            <span class="svg-icon svg-icon-2">
                                <i class="fa-solid fa-file-lines"></i>
                            </span>
                        </span>
                        <span class="menu-title">@lang('navigation.pages')</span>
                    </a>
                    <!--end:Menu link-->
                </div>
                <!--end:Menu item-->
                
                <!--begin:Menu item-->
                <div class="menu-item {{setMenuOpenClass(['admin.social-media.index'])}}">
                    <!--begin:Menu link-->
                    <a class="menu-link {{setActiveClass('admin.social-media.index')}}" href="{{route('admin.social-media.index')}}">
                        <span class="menu-icon">
                            <span class="svg-icon svg-icon-2">
                                <i class="fa-solid fa-share-nodes"></i>
                            </span>
                        </span>
                        <span class="menu-title">@lang('navigation.social_media')</span>
                    </a>
                    <!--end:Menu link-->
                </div>
                <!--end:Menu item-->
                
                <!--begin:Menu item-->
                <div class="menu-item {{setMenuOpenClass(['admin.insights.index', 'admin.insights.create', 'admin.insights.edit'])}}">
                    <!--begin:Menu link-->
                    <a class="menu-link {{setActiveClass(['admin.insights.index', 'admin.insights.create', 'admin.insights.edit'])}}" href="{{route('admin.insights.index')}}">
                        <span class="menu-icon">
                            <span class="svg-icon svg-icon-2">
                                <i class="fa-solid fa-lightbulb"></i>
                            </span>
                        </span>
                        <span class="menu-title">@lang('navigation.insights')</span>
                    </a>
                    <!--end:Menu link-->
                </div>
                <!--end:Menu item-->
                
                <!--begin:Menu item-->
                <div class="menu-item {{setMenuOpenClass(['admin.stories.index', 'admin.stories.create', 'admin.stories.edit'])}}">
                    <!--begin:Menu link-->
                    <a class="menu-link {{setActiveClass(['admin.stories.index', 'admin.stories.create', 'admin.stories.edit'])}}" href="{{route('admin.stories.index')}}">
                        <span class="menu-icon">
                            <span class="svg-icon svg-icon-2">
                                <i class="fa-solid fa-book-open"></i>
                            </span>
                        </span>
                        <span class="menu-title">@lang('navigation.stories')</span>
                    </a>
                    <!--end:Menu link-->
                </div>
                <!--end:Menu item-->
                
                <!--begin:Menu item-->
                <div class="menu-item {{setMenuOpenClass(['admin.flipbooks.index', 'admin.flipbooks.create', 'admin.flipbooks.edit'])}}">
                    <!--begin:Menu link-->
                    <a class="menu-link {{setActiveClass(['admin.flipbooks.index', 'admin.flipbooks.create', 'admin.flipbooks.edit'])}}" href="{{route('admin.flipbooks.index')}}">
                        <span class="menu-icon">
                            <span class="svg-icon svg-icon-2">
                                <i class="fa-solid fa-book"></i>
                            </span>
                        </span>
                        <span class="menu-title">@lang('navigation.flipbooks')</span>
                    </a>
                    <!--end:Menu link-->
                </div>
                <!--end:Menu item-->
                
                <!--begin:Menu item-->
                <div class="menu-item {{setMenuOpenClass(['admin.projects.index', 'admin.projects.create', 'admin.projects.edit'])}}">
                    <!--begin:Menu link-->
                    <a class="menu-link {{setActiveClass(['admin.projects.index', 'admin.projects.create', 'admin.projects.edit'])}}" href="{{route('admin.projects.index')}}">
                        <span class="menu-icon">
                            <span class="svg-icon svg-icon-2">
                                <i class="fa-solid fa-briefcase"></i>
                            </span>
                        </span>
                        <span class="menu-title">@lang('common.projects')</span>
                    </a>
                    <!--end:Menu link-->
                </div>
                <!--end:Menu item-->
            </div>
            <!--end::Menu-->
        </div>
        <!--end::Menu wrapper-->
    </div>
    <!--end::sidebar menu-->
</div>


<div id="kt_app_sidebar" class="app-sidebar  flex-column " data-kt-drawer="true" data-kt-drawer-name="app-sidebar"
    data-kt-drawer-activate="{default: true, lg: false}" data-kt-drawer-overlay="true" data-kt-drawer-width="225px"
    data-kt-drawer-direction="start" data-kt-drawer-toggle="#kt_app_sidebar_mobile_toggle">
    <!--begin::Logo-->
    <div class="app-sidebar-logo px-6" id="kt_app_sidebar_logo">
        <!--begin::Logo image-->
        <a href="/">
            <img alt="Logo" src="{{ asset('assets/images/logo.png') }}"
                class="h-50px w-auto app-sidebar-logo-default" />
            <img alt="Logo" src="{{ asset('assets/images/logo/favicon.png') }}"
                class="h-40px app-sidebar-logo-minimize" />
        </a>
        <!--end::Logo image-->
        <div id="kt_app_sidebar_toggle"
            class="app-sidebar-toggle btn btn-icon btn-shadow btn-sm btn-color-muted btn-active-color-primary body-bg h-30px w-30px position-absolute top-50 start-100 translate-middle rotate "
            data-kt-toggle="true" data-kt-toggle-state="active" data-kt-toggle-target="body"
            data-kt-toggle-name="app-sidebar-minimize">

            <i class="ki-duotone ki-double-left fs-2 rotate-180"><span class="path1"></span><span
                    class="path2"></span></i>
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
            data-kt-scroll-wrappers="#kt_app_sidebar_menu" data-kt-scroll-offset="5px" data-kt-scroll-save-state="true">
            <!--begin::Menu-->
            <div class="menu menu-column menu-rounded menu-sub-indention px-3" id="#kt_app_sidebar_menu"
                data-kt-menu="true" data-kt-menu-expand="false">
                <!--begin:Menu item-->
                <div class="menu-item"><!--begin:Menu link--><a class="menu-link active" href="index.html"><span
                            class="menu-icon"><i class="ki-duotone ki-element-11 fs-2"><span class="path1"></span><span
                                    class="path2"></span><span class="path3"></span><span
                                    class="path4"></span></i></span><span
                            class="menu-title">Default</span></a><!--end:Menu link--></div>

                <div class="menu-item pt-5"><!--begin:Menu content-->
                    <div class="menu-content"><span class="menu-heading fw-bold text-uppercase fs-7">Pages</span></div>
                    <!--end:Menu content-->
                </div><!--end:Menu item-->
                <!--begin:Menu item-->

                <div class="menu-item"><!--begin:Menu link--><a class="menu-link" href="/agents"><span
                            class="menu-link"><span class="menu-icon"><i class="ki-duotone ki-abstract-28 fs-2"><span
                                        class="path1"></span><span class="path2"></span></i></span><span
                                class="menu-title">Agent</span></a><!--end:Menu link--></div>

                <div class="menu-item"><!--begin:Menu link--><a class="menu-link" href="/attendance"><span
                            class="menu-link"><span class="menu-icon"><i class="ki-duotone ki-abstract-28 fs-2"><span
                                        class="path1"></span><span class="path2"></span></i></span><span
                                class="menu-title">Attendance</span></a><!--end:Menu link--></div>
                <div data-kt-menu-trigger="click" class="menu-item menu-accordion">
                    <!--begin:Menu link--><span class="menu-link"><span class="menu-icon"><i
                                class="ki-duotone ki-address-book fs-2"><span class="path1"></span><span
                                    class="path2"></span><span class="path3"></span></i></span><span
                            class="menu-title">User Profile</span><span
                            class="menu-arrow"></span></span><!--end:Menu link--><!--begin:Menu sub-->
                    <div class="menu-sub menu-sub-accordion"><!--begin:Menu item-->
                        <div class="menu-item"><!--begin:Menu link--><a class="menu-link" href="/"><span
                                    class="menu-bullet"><span class="bullet bullet-dot"></span></span><span
                                    class="menu-title">Overview</span></a><!--end:Menu link--></div>
                    </div><!--end:Menu sub-->
                </div>
                <!--end:Menu item-->
                <!--begin:Menu item-->
                <div class="menu-item pt-5"><!--begin:Menu content-->
                    <div class="menu-content"><span class="menu-heading fw-bold text-uppercase fs-7">Apps</span></div>
                    <!--end:Menu content-->
                </div><!--end:Menu item--><!--begin:Menu item-->
                <!--begin:Menu item-->
                <div data-kt-menu-trigger="click" class="menu-item menu-accordion">
                    <!--begin:Menu link--><span class="menu-link"><span class="menu-icon"><i
                                class="ki-duotone ki-message-text-2 fs-2"><span class="path1"></span><span
                                    class="path2"></span><span class="path3"></span></i></span><span
                            class="menu-title">Chat</span><span
                            class="menu-arrow"></span></span><!--end:Menu link--><!--begin:Menu sub-->
                    <div class="menu-sub menu-sub-accordion"><!--begin:Menu item-->
                        <div class="menu-item"><!--begin:Menu link--><a class="menu-link" href="/"><span
                                    class="menu-bullet"><span class="bullet bullet-dot"></span></span><span
                                    class="menu-title">Private
                                    Chat</span></a><!--end:Menu link--></div>
                    </div><!--end:Menu sub-->
                </div>
                <div data-kt-menu-trigger="click" class="menu-item menu-accordion">
                    <!--begin:Menu link--><span class="menu-link"><span class="menu-icon"><i
                                class="ki-duotone ki-abstract-28 fs-2"><span class="path1"></span><span
                                    class="path2"></span></i></span><span class="menu-title">User
                            Management</span><span
                            class="menu-arrow"></span></span><!--end:Menu link--><!--begin:Menu sub-->
                    <div class="menu-sub menu-sub-accordion" kt-hidden-height="124"
                        style="display: none; overflow: hidden;"><!--begin:Menu item-->
                        <div data-kt-menu-trigger="click" class="menu-item menu-accordion mb-1">
                            <!--begin:Menu link--><span class="menu-link"><span class="menu-bullet"><span
                                        class="bullet bullet-dot"></span></span><span
                                    class="menu-title">Users</span><span
                                    class="menu-arrow"></span></span><!--end:Menu link--><!--begin:Menu sub-->
                            <div class="menu-sub menu-sub-accordion" kt-hidden-height="81"
                                style="display: none; overflow: hidden;"><!--begin:Menu item-->
                                <div class="menu-item"><!--begin:Menu link--><a class="menu-link"
                                        href="/user"><span class="menu-bullet"><span
                                                class="bullet bullet-dot"></span></span><span class="menu-title">Users
                                            List</span></a><!--end:Menu link-->
                                </div><!--end:Menu item--><!--begin:Menu item-->
                                <div class="menu-item"><!--begin:Menu link--><a class="menu-link"
                                        href="/"><span class="menu-bullet"><span
                                                class="bullet bullet-dot"></span></span><span class="menu-title">View
                                            User</span></a><!--end:Menu link-->
                                </div><!--end:Menu item-->
                            </div><!--end:Menu sub-->
                        </div><!--end:Menu item--><!--begin:Menu item-->
                        <div data-kt-menu-trigger="click" class="menu-item menu-accordion">
                            <!--begin:Menu link--><span class="menu-link"><span class="menu-bullet"><span
                                        class="bullet bullet-dot"></span></span><span
                                    class="menu-title">Roles</span><span
                                    class="menu-arrow"></span></span><!--end:Menu link--><!--begin:Menu sub-->
                            <div class="menu-sub menu-sub-accordion" kt-hidden-height="81"
                                style="display: none; overflow: hidden;"><!--begin:Menu item-->
                                <div class="menu-item"><!--begin:Menu link--><a class="menu-link"
                                        href="/role"><span class="menu-bullet"><span
                                                class="bullet bullet-dot"></span></span><span class="menu-title">Roles
                                            List</span></a><!--end:Menu link-->
                                </div><!--end:Menu item--><!--begin:Menu item-->
                                <div class="menu-item"><!--begin:Menu link--><a class="menu-link"
                                        href="/role-view"><span class="menu-bullet"><span
                                                class="bullet bullet-dot"></span></span><span class="menu-title">View
                                            Role</span></a><!--end:Menu link-->
                                </div><!--end:Menu item-->
                            </div><!--end:Menu sub-->
                        </div><!--end:Menu item--><!--begin:Menu item-->
                        <div class="menu-item"><!--begin:Menu link--><a class="menu-link" href="/permissions"><span
                                    class="menu-bullet"><span class="bullet bullet-dot"></span></span><span
                                    class="menu-title">Permissions</span></a><!--end:Menu link--></div>
                        <!--end:Menu item-->
                    </div><!--end:Menu sub-->
                </div>
                <!--end:Menu item--><!--begin:Menu item-->
                <div class="menu-item"><!--begin:Menu link--><a class="menu-link" href="/"><span
                            class="menu-icon"><i class="ki-duotone ki-calendar-8 fs-2"><span
                                    class="path1"></span><span class="path2"></span><span
                                    class="path3"></span><span class="path4"></span><span
                                    class="path5"></span><span class="path6"></span></i></span><span
                            class="menu-title">Calendar</span></a><!--end:Menu link--></div>
                <!--end:Menu item--><!--begin:Menu item-->
                <div class="menu-item pt-5"><!--begin:Menu content-->
                    <div class="menu-content"><span class="menu-heading fw-bold text-uppercase fs-7">Layouts</span>
                    </div>
                    <!--end:Menu content-->
                </div><!--end:Menu item--><!--begin:Menu item-->
                <div data-kt-menu-trigger="click" class="menu-item menu-accordion">
                    <!--begin:Menu link--><span class="menu-link"><span class="menu-icon"><i
                                class="ki-duotone ki-element-7 fs-2"><span class="path1"></span><span
                                    class="path2"></span></i></span><span class="menu-title">Layout
                            Options</span><span
                            class="menu-arrow"></span></span><!--end:Menu link--><!--begin:Menu sub-->
                    <div class="menu-sub menu-sub-accordion"><!--begin:Menu item-->
                        <div class="menu-item"><!--begin:Menu link--><a class="menu-link" href="/"><span
                                    class="menu-bullet"><span class="bullet bullet-dot"></span></span><span
                                    class="menu-title">Light
                                    Sidebar</span></a><!--end:Menu link-->
                        </div><!--end:Menu item--><!--begin:Menu item-->

                        <!--end:Menu item-->
                    </div><!--end:Menu sub-->
                </div><!--end:Menu item--><!--begin:Menu item-->
                <div class="menu-item pt-5"><!--begin:Menu content-->
                    <div class="menu-content"><span class="menu-heading fw-bold text-uppercase fs-7">Help</span>
                    </div>
                    <!--end:Menu content-->
                </div><!--end:Menu item--><!--begin:Menu item-->
                <div class="menu-item"><!--begin:Menu link--><a class="menu-link"
                        href="https://preview.keenthemes.com/html/metronic/docs/base/utilities" target="_blank"><span
                            class="menu-icon"><i class="ki-duotone ki-rocket fs-2"><span class="path1"></span><span
                                    class="path2"></span></i></span><span
                            class="menu-title">Components</span></a><!--end:Menu link--></div>
                <!--end:Menu item-->
            </div>
            <!--end::Menu-->
        </div>
        <!--end::Menu wrapper-->
    </div>
    <!--end::sidebar menu-->
    <!--begin::Footer-->
    <div class="app-sidebar-footer flex-column-auto pt-2 pb-6 px-6" id="kt_app_sidebar_footer">
        <a href="https://preview.keenthemes.com/html/metronic/docs"
            class="btn btn-flex flex-center btn-custom btn-primary overflow-hidden text-nowrap px-0 h-40px w-100"
            data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-dismiss-="click"
            title="200+ in-house components and 3rd-party plugins">

            <span class="btn-label">
                Docs & Components
            </span>

            <i class="ki-duotone ki-document btn-icon fs-2 m-0"><span class="path1"></span><span
                    class="path2"></span></i> </a>
    </div>
    <!--end::Footer-->
</div>

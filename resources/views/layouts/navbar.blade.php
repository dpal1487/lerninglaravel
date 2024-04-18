<div id="kt_app_header" class="app-header ">

    <!--begin::Header container-->
    <div class="app-container  container-fluid d-flex align-items-stretch justify-content-between "
        id="kt_app_header_container">

        <!--begin::Sidebar mobile toggle-->
        <div class="d-flex align-items-center d-lg-none ms-n3 me-1 me-md-2" title="Show sidebar menu">
            <div class="btn btn-icon btn-active-color-primary w-35px h-35px" id="kt_app_sidebar_mobile_toggle">
                <i class="ki-duotone ki-abstract-14 fs-2 fs-md-1"><span class="path1"></span><span
                        class="path2"></span></i>
            </div>
        </div>
        <!--end::Sidebar mobile toggle-->
        <!--begin::Mobile logo-->
        <div class="d-flex align-items-center flex-grow-1 flex-lg-grow-0">
            <a href="index.html" class="d-lg-none">
                <img alt="Logo" src="{{ asset('assets/images/logo/favicon.png') }}" class="h-30px" />
            </a>
        </div>
        <!--end::Mobile logo-->

        <!--begin::Header wrapper-->
        <div class="d-flex align-items-stretch justify-content-between flex-lg-grow-1" id="kt_app_header_wrapper">

            <!--begin::Menu wrapper-->
            <div class="app-header-menu app-header-mobile-drawer align-items-stretch " data-kt-drawer="true"
                data-kt-drawer-name="app-header-menu" data-kt-drawer-activate="{default: true, lg: false}"
                data-kt-drawer-overlay="true" data-kt-drawer-width="250px" data-kt-drawer-direction="end"
                data-kt-drawer-toggle="#kt_app_header_menu_toggle" data-kt-swapper="true"
                data-kt-swapper-mode="{default: 'append', lg: 'prepend'}"
                data-kt-swapper-parent="{default: '#kt_app_body', lg: '#kt_app_header_wrapper'}">
                <!--begin::Menu-->
                <div class="menu menu-rounded menu-column menu-lg-row my-5 my-lg-0 align-items-stretch fw-semibold px-2 px-lg-0"
                    id="kt_app_header_menu" data-kt-menu="true">
                    {{-- @include('layouts.header.menu-wrapper') --}}
                </div>
            </div>
            <!--end::Menu wrapper-->


            <!--begin::Navbar-->
            <div class="app-navbar flex-shrink-0">
                {{-- @include('layouts.header.search') --}}

                <!--begin::Activities-->
                <div class="app-navbar-item ms-1 ms-md-3">
                    <!--begin::Drawer toggle-->
                    <div class="btn btn-icon btn-custom btn-icon-muted btn-active-light btn-active-color-primary w-30px h-30px w-md-40px h-md-40px"
                        id="kt_activities_toggle">
                        <i class="ki-duotone ki-notification-on fs-2 fs-lg-1"><span class="path1"></span><span
                                class="path2"></span><span class="path3"></span><span class="path4"></span><span
                                class="path5"></span></i>
                    </div>
                    <!--end::Drawer toggle-->
                </div>
                <!--end::Activities-->

                <!--begin::Notifications-->
                @include('layouts.header.notification')
                <!--end::Notifications-->

                <!--begin::Chat-->
                @include('layouts.header.chat')
                <!--end::Chat-->

                <!--begin::My apps links-->
               @include('layouts.header.my-app-links')
                <!--end::My apps links-->

                <!--begin::Theme mode-->
                @include('layouts.header.theme')
                <!--end::Theme mode-->

                <!--begin::User menu-->
                @include('layouts.header.user-menu')
                <!--end::User menu-->
            </div>
            <!--end::Navbar-->
        </div>
        <!--end::Header wrapper-->
    </div>
    <!--end::Header container-->
</div>

<x-app-layout>
    <div id="kt_app_toolbar" class="app-toolbar  py-3 py-lg-6 ">
        <x-header title="Agent List" />
    </div>
    <div id="kt_app_content" class="app-content  flex-column-fluid ">
        <div id="kt_app_content_container" class="app-container  container-fluid ">
            <div class="card">
                <!--begin::Card header-->
                <div class="card-header border-0 pt-6">
                    <!--begin::Card title-->
                    <div class="card-title">
                        <!--begin::Search-->
                        <form action={{ route('user.index') }} class="d-flex align-items-center position-relative my-1">
                            <!--begin::Svg Icon | path: icons/duotune/general/gen021.svg-->
                            <span class="svg-icon svg-icon-1 position-absolute ms-4">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <rect opacity="0.5" x="17.0365" y="15.1223" width="8.15546" height="2" rx="1" transform="rotate(45 17.0365 15.1223)" fill="currentColor" />
                                    <path d="M11 19C6.55556 19 3 15.4444 3 11C3 6.55556 6.55556 3 11 3C15.4444 3 19 6.55556 19 11C19 15.4444 15.4444 19 11 19ZM11 5C7.53333 5 5 7.53333 5 11C5 14.4667 7.53333 17 11 17C14.4667 17 17 14.4667 17 11C17 7.53333 14.4667 5 11 5Z" fill="currentColor" />
                                </svg>
                            </span>
                            <!--end::Svg Icon-->
                            <input type="text" class="form-control form-control-solid w-250px ps-14" placeholder="Search " name="search" />
                           
                            <div class="d-flex d-flex-end position-relative mx-5">
                                <button type="submit" class="btn btn-primary">Search</button>
                                </div>
                        </form>
                        <!--end::Search-->
                    </div>
                    <!--begin::Card title-->

                    <!--begin::Card toolbar-->
                    <div class="card-toolbar">
                        <!--begin::Toolbar-->
                        <div class="d-flex justify-content-end">
                            <a href="{{ route('user.create') }}" class="btn btn-primary">
                                <i class="ki-duotone ki-plus fs-2"></i> Add User
                            </a>
                        </div>
                    </div>
                </div>
                <!--begin::Card body-->
                <div class="card-body py-4">

                    <!--begin::Table-->
                    <table class="table  table-row-dashed fs-6 gy-5" id="user_table">
                        <thead class="">
                            <tr class=" text-muted fw-bold fs-7 text-uppercase gs-0">

                                <th class="">Sr. number</th>
                                <th class="">Agent Name</th>
                                <th class="">Emial</th>
                                <th class="">Shift Time</th>
                                <th class="text-center">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="text-gray-600 fw-semibold">
                            @foreach ($agents as $agent)
                                <tr>
                                    <td>
                                        {{ $loop->iteration }}

                                    </td>
                                    <td user-filter="user_title">
                                        {{ $agent->name }}
                                    </td>
                                    <td>
                                        {{ $agent->email }}
                                    </td>
                                    <td>
                                        {{ $agent->shift_time }}
                                    </td>

                                    <td class="text-start">
                                        <a href="#"
                                            class="btn btn-light btn-active-light-primary btn-flex btn-sm"
                                            data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
                                            Actions
                                            <i class="ki-duotone ki-down fs-5 ms-1"></i> </a>
                                        <!--begin::Menu-->
                                        <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4"
                                            data-kt-menu="true">
                                            <!--begin::Menu item-->
                                            <div class="menu-item px-3">
                                                <a href="user/{{ $agent->id }}/edit" class="menu-link px-3">
                                                    <i class="bi bi-pencil mx-5"></i> Edit
                                                </a>
                                            </div>
                                            <!--end::Menu item-->

                                            <!--begin::Menu item-->
                                            <div class="menu-item px-3">
                                                <a href="#" class="menu-link px-3" data-id="{{ $agent->id }}"
                                                    user-table="delete_row"><i class="bi bi-trash mx-5"></i>Delete</a>
                                            </div>
                                            <!--end::Menu item-->
                                        </div>
                                        <!--end::Menu-->
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <!--end::Table-->
                    {!! $agents->withQueryString()->links('pagination::bootstrap-5') !!}
                </div>
                <!--end::Card body-->
            </div>
        </div>
    </div>

    @section('javascript')
        @livewireScripts

        <script src="{{ asset('assets/js/widgets.bundle.js') }}"></script>
        <script src="{{ asset('assets/js/custom/widgets.js') }}"></script>
        <script src="{{ asset('assets/js/custom/pages/user/index.js') }}"></script>
    @endsection
</x-app-layout>

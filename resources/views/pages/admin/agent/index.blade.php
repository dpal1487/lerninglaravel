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
                        {{-- <div class="d-flex align-items-center position-relative my-1">
                            <i class="ki-duotone ki-magnifier fs-3 position-absolute ms-5"><span
                                    class="path1"></span><span class="path2"></span></i> <input type="text"
                                data-kt-user-table-filter="search" class="form-control form-control-solid w-250px ps-13"
                                placeholder="Search user" />
                        </div> --}}
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
                        <thead>
                            <tr class=" text-muted fw-bold fs-7 text-uppercase gs-0">

                                <th class="min-w-125px">Sr. number</th>
                                <th class="min-w-125px">Agent Name</th>
                                <th class="min-w-125px">Emial</th>
                                <th class="text-end min-w-100px">Actions</th>
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
                                    </td>

                                    <td>
                                        <a href="#"
                                            class="btn btn-light btn-active-light-primary btn-flex btn-center btn-sm"
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

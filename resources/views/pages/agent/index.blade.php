@section('stylesheet')
    <!--begin::Vendor Stylesheets(used for this page only)-->
    @livewireStyles

    <!--end::Vendor Stylesheets-->
@endsection
<x-app-layout>

    <!--begin::Toolbar-->
    <div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
        <!--begin::Toast-->
        @if (Session::has('message'))
            <div class="position-fixed top-1 end-0 p-2 z-index-3">
                <div class="toast show" role="alert" aria-live="assertive" aria-atomic="true">
                    <div class="toast-header">
                        <i class="ki-duotone ki-abstract-39 fs-2 text-primary me-3"><span class="path1"></span><span
                                class="path2"></span></i>
                        <strong class="me-auto">Category</strong>
                        <small>11 mins ago</small>
                        <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
                    </div>
                    <div class="toast-body success">
                        {{ session()->get('message') }}
                    </div>
                </div>
            </div>
        @endif
        <!--end::Toast-->
        <x-header title="Agent" />
        <pre>
    </div>
    <!--end::Toolbar-->
   <!--begin::Content-->
   <div id="kt_app_content" class="app-content flex-column-fluid">
    <!--begin::Content container-->
    <div id="kt_app_content_container" class="app-container container-xxl">
        <!--begin::Category-->
        <div class="card card-flush">
            <!--begin::Card header-->
            <div class="card-header align-items-center py-5 gap-2 gap-md-5">
                <!--begin::Card title-->
                <div class="card-title">
                    <!--begin::Search-->
                    <div class="d-flex align-items-center position-relative my-1">
                        <!--begin::Svg Icon | path: icons/duotune/general/gen021.svg-->

                        <!--end::Svg Icon-->

                    </div>
                    <!--end::Search-->
                </div>
                <!--end::Card title-->
                <!--begin::Card toolbar-->
                <div class="card-toolbar">
                    <!--begin::Add customer-->
                        <a href="{{ route('agents.create') }}" class="btn btn-primary">Add New</a>
                    <!--end::Add customer-->
                </div>
                <!--end::Card toolbar-->
            </div>
            <!--end::Card header-->
            <!--begin::Card body-->
            <div class="card-body overflow-auto pt-0">
                <!--begin::Table-->
                <table class="table align-middle text-center table-row-dashed fs-6 gy-5" id="banner_table">
                    <!--begin::Table head-->
                    <thead class="text-center">
                        <!--begin::Table row-->
                        <tr class="text-center text-gray-400 fw-bold fs-7 text-uppercase gs-0">
                            <th class="w-1px pe-2">
                                  <div class="form-check form-check-sm form-check-custom form-check-solid">
                                    <input class="form-check-input" type="checkbox" data-kt-check="true" data-kt-check-target="#banner_table .form-check-input" value="1" />
                                </div>
                            </th>
                            <th class="min-w-250px">Title</th>

                            <th class="min-w-250px"> Description</th>
                            <th class="min-w-250px"> Status</th>

                            <th class="text-end min-w-100px">Actions</th>
                        </tr>
                        <!--end::Table row-->
                    </thead>
                    <!--end::Table head-->
                    <!--begin::Table body-->
                    <tbody class="fw-semibold text-gray-600">
                        <!--begin::Table row-->
                            @foreach ($agents as $agent)
                            <tr>
                                <!--begin::Checkbox-->
                                <td>
                                    <div class="form-check form-check-sm form-check-custom form-check-solid">
                                        <input class="form-check-input" type="checkbox" value="1" />
                                    </div>
                                </td>
                                <!--end::Checkbox-->
                                <!--begin::Category=-->

                                <!--end::Category=-->

                                    <!--begin::Type=-->
                                    <td>
                                        <!--begin::Badges-->



                                            {{ $agent }}

                                        <!--end::Badges-->
                                    </td>



                                 <!--begin::Type=-->
                                 <td>
                                    <!--begin::Badges-->
                                    @if ($agent->status == 1)
                                    <div class="badge badge-light-success">Active</div>
                                    @else
                                    <div class="badge badge-light-danger">In Active</div>
                                    @endif
                                    <!--end::Badges-->
                                </td>
                                <!--end::Type=-->
                                <!--begin::Action=-->
                                <td>
                                    <a href="#" class="btn btn-sm btn-light btn-active-light-primary" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">Actions
                                    <!--begin::Svg Icon | path: icons/duotune/arrows/arr072.svg-->
                                    <span class="svg-icon svg-icon-5 m-0">
                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M11.4343 12.7344L7.25 8.55005C6.83579 8.13583 6.16421 8.13584 5.75 8.55005C5.33579 8.96426 5.33579 9.63583 5.75 10.05L11.2929 15.5929C11.6834 15.9835 12.3166 15.9835 12.7071 15.5929L18.25 10.05C18.6642 9.63584 18.6642 8.96426 18.25 8.55005C17.8358 8.13584 17.1642 8.13584 16.75 8.55005L12.5657 12.7344C12.2533 13.0468 11.7467 13.0468 11.4343 12.7344Z" fill="currentColor" />
                                        </svg>
                                    </span>
                                    <!--end::Svg Icon--></a>
                                    <!--begin::Menu-->
                                    <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4" data-kt-menu="true">
                                        <!--begin::Menu item-->
                                        <div class="menu-item px-3">
                                            {{-- <a href="{{ route('banners.view', ['id' => $banners->id]) }}" class="menu-link px-3">View</a> --}}
                                        </div>
                                        <div class="menu-item px-3">
                                            <a href="{{ route('agents.edit', ['id' => $agent->id]) }}" class="menu-link px-3">Edit</a>
                                        </div>
                                        <!--end::Menu item-->
                                        <!--begin::Menu item-->

                                        <div class="menu-item px-3">

                                            <a href="#" class="menu-link px-3" data-id="{{ $agent->id }}" banner-table="delete_row">Delete</a>


                                        </div>
                                        <!--end::Menu item-->
                                    </div>
                                    <!--end::Menu-->
                                </td>
                                <!--end::Action=-->
                            </tr>
                        @endforeach

                        <!--end::Table row-->
                    </tbody>
                    <!--end::Table body-->
                </table>
                <!--end::Table-->

            <div class="row">
                <div class="col-sm-12 d-flex align-items-center justify-content-center justify-content-md-end">
                        {{ $agents->links() }}
                </div>
            </div>
            </div>
            <!--end::Card body-->
        </div>
        <!--end::Category-->
    </div>
    <!--end::Content container-->
</div>
<!--end::Content-->
    @section('javascript')
@livewireScripts

    <script src="{{ asset('assets/js/widgets.bundle.js') }}"></script>
      <script src="{{ asset('assets/js/custom/widgets.js') }}"></script>
            <script src="{{ asset('assets/js/custom/pages/agent/index.js') }}"></script>
@endsection
</x-app-layout>

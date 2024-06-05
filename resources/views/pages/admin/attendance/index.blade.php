@section('stylesheet')
    <!--begin::Vendor Stylesheets(used for this page only)-->
    @livewireStyles
@endsection
<x-app-layout>

    <div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
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
        <x-header title="Agent" />
        <pre>
    </div>
   <div id="kt_app_content" class="app-content flex-column-fluid">
    <div id="kt_app_content_container" class="app-container container-xxl">
        <div class="card card-flush">
            <div class="card-header align-items-center">
                <div class="card-title">

                    <form action={{ route('attendance.index') }} class="d-flex align-items-center position-relative my-1">
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
                            <input type="date" class="form-control form-control-solid w-250px ps-14" placeholder="Search " name="date" />
                        </div>
                        <div class="d-flex d-flex-end position-relative mx-5">
                            <button type="submit" class="btn btn-primary">Search</button>
                            </div>
                    </form>
                </div>
            </div>
            <div class="card-body overflow-auto pt-0">
                <table class="table align-middle text-center table-row-dashed fs-6 " id="banner_table">
                    <thead class="text-center">
                        <tr class="text-center text-gray-400 fw-bold fs-7 text-uppercase gs-0">
                            <th class="w-1px pe-2">
                                 Sr. Number
                            </th>
                            <th class="min-w-250px">Agent Name</th>
                            <th class="text-end min-w-100px">Date</th>
                            <th class="min-w-250px"> Check In</th>
                            <th class="min-w-250px"> Check Out</th>
                            <th class="text-end min-w-100px">Status</th>
                        </tr>
                    </thead>
                    <tbody class="fw-semibold text-gray-600">
                            @foreach ($attendances as $attendance)
                            <tr>
                                <td>
                                    {{ $loop->iteration  }}
                                </td>
                                    <td>
                                        <div class="ms-5">
                                            <!--begin::Title-->
                                            <a href="/attendance/{{ $attendance->id}}" class="text-gray-800 text-hover-primary fs-5 fw-bold">
                                                <!--end::Title-->
                                                {{ $attendance->user->name }}
                                            </a>
                                        </div>
                                    </td>
                                 <td>
                                    {{ $attendance->date }}
                                    </td>
                                <td>
                                    {{ $attendance->check_in }}
                                </td>
                                <td>
                                    {{ $attendance->check_out }}
                                </td>
                                <td>
                                    @if ($attendance->status =='full_day')
                                    <div class="badge badge-light-success">{{ $attendance->status }}</div>
                                    @else
                                    <div class="badge badge-light-danger">{{ $attendance->status }}</div>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            <div class="row">
                <div class="col-sm-12 d-flex align-items-center justify-content-center justify-content-md-end">
                        {{ $attendances->links() }}
                </div>
            </div>
            </div>
        </div>
    </div>
</div>
    @section('javascript')
@livewireScripts
    <script src="{{ asset('assets/js/widgets.bundle.js') }}"></script>
    <script src="{{ asset('assets/js/custom/widgets.js') }}"></script>
    <script src="{{ asset('assets/js/custom/pages/attendance/index.js') }}"></script>
@endsection
</x-app-layout>

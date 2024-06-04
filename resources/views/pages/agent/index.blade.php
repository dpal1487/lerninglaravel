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
                        <tr>
                            <th>Sr No.</th>
                            <th>Name</th>
                            <th>Company Cost</th>
                            <th>Mark Up</th>
                            <th>Date of Travel</th>
                            <th>Service Name</th>
                          
                        </tr>
                        <!--end::Table row-->
                    </thead>
                    <!--end::Table head-->
                    <!--begin::Table body-->
                    <tbody class="fw-semibold text-gray-600">
                        @foreach ($agents as $agent)
                            <tr> 
                                <td>{{$loop->iteration }}</td>  
                                <td>{{ $agent->customer_name }}</td>
                                <td>{{ $agent->company_cost }}</td>
                                <td>{{ $agent->mark_up }}</td>
                                <td>{{ $agent->date_of_travel }}</td>
                                <td>
                                    @foreach ($agent->services as $service)
                                        <div>{{ $service->service_name }}</div>
                                    @endforeach
                                </td>
                             
                            </tr>
                        @endforeach
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

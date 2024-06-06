@section('stylesheet')
@endsection
<x-app-layout>
    <div class="mt-3">
        <x-header title="Create Agent" />
    </div>
    <div id="kt_app_toolbar" class="app-toolbar my-5 py-lg-6">
        <div id="kt_app_content_container" class="app-container container-xxl">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            <form class="form d-flex flex-column flex-lg-row" id="user_form" action="{{ url('user/store') }}"
                method="POST">
                @csrf
                <div class="d-flex flex-column flex-row-fluid gap-7 gap-lg-10">
                    <div class="card card-flush py-10">
                        @include('pages.admin.agent._fields')
                    </div>
                    <div class="d-flex justify-content-end">
                        <a href="{{ route('user.index') }}" class="btn btn-light me-5">Cancel</a>
                        <button type="submit" class="btn btn-primary" id="submit">
                            <span class="indicator-label">Save</span>
                            <span class="indicator-progress">Please wait...
                                <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    @section('javascript')
        <script src="{{ asset('assets/js/widgets.bundle.js') }}"></script>
        <script src="{{ asset('assets/js/custom/widgets.js') }}"></script>
        <script src="{{ asset('assets/js/custom/pages/user/form.js') }}"></script>
        <script src="{{ asset('assets/plugins/custom/formrepeater/formrepeater.bundle.js') }}"></script>
    @endsection
</x-app-layout>

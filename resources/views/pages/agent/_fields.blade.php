<style>
    .form-select+span+span {
        display: none;
    }
</style>

<!--end::Card header-->
<!--begin::Card body-->
<div class="card-body pt-0">
    <!--begin::Input group-->
    <div class="row g-3">
        <div class="mb-10 fv-row col-12">
            <!--begin::Label-->
            <label class="required form-label">Customer Name</label>
            <!--end::Label-->
            <div class="">
                <!--begin::Input-->
                <input type="text" name="customer_name" class="form-control mb-2" placeholder="Customer name"
                    value="{{ @$attribute->customer_name }}" />
                <!--end::Input-->
                <!--begin::Description-->
                @error('customer_name')
                <div class="error">{{ $message }}</div>
            @enderror
                <!--end::Description-->

            </div>
        </div>
    </div>


    <div class="row g-3">
        <div class="mb-10 fv-row col-6">
            <label class="required form-label">Company Cost</label>
            <!--end::Label-->
            <div class="">
                <!--begin::Input-->
                <input type="text" name="company_cost" class="form-control mb-2" placeholder="Company Cost"
                    value="{{ @$attribute->company_cost }}" />

                    @error('company_cost')
                    <div class="error">{{ $message }}</div>
                @enderror
                <!--end::Input-->
            </div>
        </div>
        <div class="mb-10 fv-row col-6">
            <!--begin::Label-->
            <label class="form-label required">Mark Up</label>
            <!--end::Label-->
            <input type="text" name="mark_up" class="form-control mb-2" placeholder="Mark Up"
                value="{{ @$attribute->mark_up }}" />
                @error('mark_up')
                <div class="error">{{ $message }}</div>
            @enderror
        </div>
    </div>

    <!--begin::Input group-->
    <div class="row g-3">
        <div class="fv-row col-6">
            <label class="required form-label">Date Of Travel</label>
            <!--end::Label-->
            <div class="">
                <!--begin::Input-->
                <input type="date" name="date_of_travel" class="form-control mb-2" placeholder="Travel Date"
                    value="{{ @$attribute->date_of_travel }}" />
                <!--end::Input-->
                @error('date_of_travel')
                <div class="error">{{ $message }}</div>
            @enderror
            </div>
        </div>
        <div class="mb-10 fv-row col-6">
            <div id="services" class="card-body py-0"></div>
            <div class="card-footer  border-0">
                <button type="button" id="add-services" class="btn btn-primary">
                    Add Services
                </button>
            </div>
        </div>
    </div>
</div>

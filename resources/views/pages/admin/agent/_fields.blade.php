<style>
    .form-select+span+span {
        display: none;
    }
</style>

        <!--end::Card header-->
        <!--begin::Card body-->
        <div class="card-body pt-0">
            <!--begin::Input group-->
            <div class="row mb-2">
                <div class="fv-row col-6">
                    <label class="required form-label">Agent Name</label>
                    <!--end::Label-->
                    <div class="">
                        <!--begin::Input-->
                        <input type="text" name="name" class="form-control mb-2" placeholder="Agent Name"
                            value="{{ @$attribute->name }}" />
                        <!--end::Input-->
                        <div class="text-muted fs-7">Agent Name is required.</div>
                        @error('name')
                        <div class="error">{{ $message }}</div>
                    @enderror
                    </div>

                </div>
                <div class="fv-row col-6">
                    <!--begin::Label-->
                    <label class="form-label required">Email</label>
                    <!--end::Label-->
                    <input type="email" name="email" class="form-control mb-2" placeholder="Email"
                    value="{{ @$attribute->email }}" />
                    <div class="text-muted fs-7">Email is required.</div>
                    @error('email')
                    <div class="error">{{ $message }}</div>
                @enderror
                </div>

            </div>

              <!--begin::Input group-->
              <div class="row g-3">
                <div class="fv-row col-6">
                    <label class="required form-label">Password</label>
                    <!--end::Label-->
                    <div class="">
                        <!--begin::Input-->
                        <input type="password" name="password" class="form-control mb-2" placeholder="Password"
                            value="{{ @$attribute->password }}" />
                        <!--end::Input-->
                        <div class="text-muted fs-7">Password is required.</div>

                        @error('password')
                        <div class="error">{{ $message }}</div>
                    @enderror

                    </div>
                    <!-- Services details starts -->

            <!-- Services  details ends -->
                </div>

            </div>
        </div>

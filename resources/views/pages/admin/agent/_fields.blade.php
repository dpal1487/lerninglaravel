<style>
    .form-select+span+span {
        display: none;
    }
</style>
<div class="card-body pt-0">
    <div class="row mb-2">
        <div class="fv-row col-6">
            <label class="required form-label">Agent Name</label>
            <div class="">
                <input type="text" name="name" class="form-control mb-2" placeholder="Agent Name"
                    value="{{ @$user->name }}" />
                @error('customer_name')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>

        </div>
        <div class="fv-row col-6">
            <label class="form-label required">Email</label>
            <input type="email" name="email" class="form-control mb-2" placeholder="Email"
                value="{{ @$user->email }}" />
            @error('email')
                <div class="error">{{ $message }}</div>
            @enderror
        </div>

    </div>
    <div class="row g-3">
        <div class="fv-row col-6">
            <label class="required form-label">Password</label>
            <div class="">
                <input type="password" name="password" class="form-control mb-2" placeholder="Password"
                     />
                @error('password')
                    <div class="error">{{ $message }}</div>
                @enderror

            </div>
        </div>

        <div class="fv-row w-100 flex-md-root">
            <label class="required form-label">Shift Time</label>
            <select class="form-select mb-2" name="shift_time" data-control="select2" data-hide-search="true"
                data-placeholder="Select an option">
                <option></option>
                <option value="1 - 10">1 - 10</option>
                <option value="2 - 11">2 - 11</option>
                <option value="3 - 12">3 - 12</option>
                <option value="4 - 1">4 - 1</option>
                <option value="5 - 2">5 - 2</option>
                <option value="6 - 3">6 - 3</option>
                <option value="7 - 4">7 - 4</option>
                <option value="8 - 5">8 - 5</option>
                <option value="9 - 6.30">9 - 6.30</option>
                <option value="10 - 7.30">10 - 7.30</option>
                <option value="11 - 8">11 - 8</option>
                <option value="12 - 9">12 - 9</option>
            </select>
            <div class="text-muted fs-7">Please set shift time according .</div>
            @error('shift_time')
                <div class="error">{{ $message }}</div>
            @enderror
        </div>
    </div>
</div>

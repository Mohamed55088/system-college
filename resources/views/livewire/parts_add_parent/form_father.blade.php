@if ($currentStep != 1)
    <div style="display:none" class="row setup-content" id="step-1">
@endif
@if ($message)
    <div class="alert alert-danger" id="success-danger" style="background-color: #75e957;">
        <button type="button" class="close" data-dismiss="alert">x</button>
        {{ $message }}
    </div>
    error_message
@endif
@if ($error_message)
    <div class="alert alert-danger" id="success-danger">
        <button type="button" class="close" data-dismiss="alert">x</button>
        {{ $error_message }}
    </div>
@endif
<div class="col-xs-12" style="margin-right: 4%;margin-left:4%">
    <div class="col-md-12">
        <br>
        <div class="form-row">
            <div class="col ">
                <label for="title">{{ trans('Parent_trans.Name_Father') }}</label>
                <input type="text" wire:model="name_Father_ar" class="form-control">
                @error('name_Father_ar')
                    <span class="error " style="color:brown">{{ $message }}</span>
                @enderror
            </div>
            <div class="col">
                <label for="title">{{ trans('Parent_trans.Password') }}</label>
                @if ($showEdit)
                    <input type="password" wire:model="password" class="form-control" disabled>
                @else
                    <input type="password" wire:model="password" class="form-control">
                @endif
                @error('password')
                    <span class="error" style="color:brown">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <div class="form-row">
            <div class="col">
                <label for="title">{{ trans('Parent_trans.Email') }}</label>

                @if ($showEdit)
                    <input type="email" wire:model="email" class="form-control" disabled>
                @else
                    <input type="email" wire:model="email" class="form-control">
                @endif


                @error('email')
                    <span class="error" style="color:brown">{{ $message }}</span>
                @enderror
            </div>

            <div class="col">
                <label for="title">{{ trans('Parent_trans.Name_Father_en') }}</label>
                <input type="text" wire:model="name_Father_en" class="form-control">
                @error('name_Father_en')
                    <span class="error" style="color:brown">{{ $message }}</span>
                @enderror
            </div>
        </div>

        <div class="form-row">
            <div class="col-md-3">
                <label for="title">{{ trans('Parent_trans.Job_Father') }}</label>
                <input type="text" wire:model="job_Father" class="form-control">
                @error('job_Father')
                    <span class="error" style="color:brown">{{ $message }}</span>
                @enderror
            </div>
            <div class="col-md-3">
                <label for="title">{{ trans('Parent_trans.Job_Father_en') }}</label>
                <input type="text" wire:model="job_Father_en" class="form-control">
                @error('job_Father_en')
                    <span class="error"style="color:brown">{{ $message }}</span>
                @enderror
            </div>

            <div class="col">
                <label for="title">{{ trans('Parent_trans.National_ID_Father') }}</label>
                <input type="text" wire:model="national_ID_Father" class="form-control">
                @error('national_ID_Father')
                    <span class="error" style="color:brown">{{ $message }}</span>
                @enderror
            </div>
            <div class="col">
                <label for="title">{{ trans('Parent_trans.Passport_ID_Father') }}</label>
                <input type="text" wire:model="passport_ID_Father" class="form-control">
                @error('passport_ID_Father')
                    <span class="error" style="color:brown">{{ $message }}</span>
                @enderror
            </div>

            <div class="col">
                <label for="title">{{ trans('Parent_trans.Phone_Father') }}</label>
                <input type="text" wire:model="phone_Father" class="form-control">
                @error('phone_Father')
                    <span class="error" style="color:brown">{{ $message }}</span>
                @enderror
            </div>

        </div>


        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="inputCity">{{ trans('Parent_trans.Nationality_Father_id') }}</label>
                <select class="custom-select my-1 mr-sm-2" wire:model="nationality_Father_id">
                    <option selected>{{ trans('Parent_trans.Choose') }}...</option>
                    @foreach ($nationalty as $nationalty)
                        <option value="{{ $nationalty->id }}">{{ $nationalty->name }}</option>
                    @endforeach
                </select>
                @error('nationality_Father_id')
                    <span class="error" style="color:brown">{{ $message }}</span>
                @enderror

            </div>
            <div class="form-group col">
                <label for="inputState">{{ trans('Parent_trans.Blood_Type_Father_id') }}</label>
                <select class="custom-select my-1 mr-sm-2" wire:model="blood_Type_Father_id">
                    <option selected>{{ trans('Parent_trans.Choose') }}...</option>
                    @foreach ($type_blood as $type_blood)
                        <option value="{{ $type_blood->id }}">{{ $type_blood->name }}</option>
                    @endforeach
                </select>
                @error('blood_Type_Father_id')
                    <span class="error" style="color:brown">{{ $message }}</span>
                @enderror

            </div>
            <div class="form-group col">
                <label for="inputZip">{{ trans('Parent_trans.Religion_Father_id') }}</label>
                <select class="custom-select my-1 mr-sm-2" wire:model="religion_Father_id">
                    <option selected>{{ trans('Parent_trans.Choose') }}...</option>
                    @foreach ($religion as $religion)
                        <option value="{{ $religion->id }}">{{ $religion->name }}</option>
                    @endforeach


                </select>
                @error('religion_Father_id')
                    <span class="error" style="color:brown">{{ $message }}</span>
                @enderror
            </div>
        </div>

        <div class="form-group">
            <label for="exampleFormControlTextarea1">{{ trans('Parent_trans.Address_Father') }}</label>
            <textarea class="form-control" wire:model="address_Father" id="exampleFormControlTextarea1" rows="4"></textarea>
            @error('address_Father')
                <span class="error" style="color:brown">{{ $message }}</span>
            @enderror
        </div>
        @if ($showEdit)
            <button class="btn btn-success btn-sm nextBtn btn-lg pull-right" wire:click="StepSubmit_edit"
                type="button">{{ trans('Teacher_trans.Next') }}
            </button>
        @else
            <button class="btn btn-success btn-sm nextBtn btn-lg pull-right" wire:click="StepSubmit"
                type="button">{{ trans('Teacher_trans.Next') }}
            </button>
        @endif


    </div>
</div>
</div>

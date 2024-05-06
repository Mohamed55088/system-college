@if ($currentStep != 2)
    <div style="display:none" class="row setup-content" id="step-2">
@endif
<div class="col-xs-12" style="margin-right: 4%;margin-left:4%">
    <div class="col-md-12">
        <br>

        <div class="form-row">
            <div class="col">
                <label for="title">{{ trans('Parent_trans.Name_Mother') }}</label>
                <input type="text" wire:model="name_Mother_ar" class="form-control">
                @error('name_Mother_ar')
                    <span class="error" style="color:brown">{{ $message }}</span>
                @enderror

            </div>
            <div class="col">
                <label for="title">{{ trans('Parent_trans.Name_Mother_en') }}</label>
                <input type="text" wire:model="name_Mother_en" class="form-control">
                @error('name_Mother_en')
                    <span class="error" style="color:brown">{{ $message }}</span>
                @enderror
            </div>
        </div>

        <div class="form-row">
            <div class="col-md-3">
                <label for="title">{{ trans('Parent_trans.Job_Mother') }}</label>
                <input type="text" wire:model="job_Mother" class="form-control">
                @error('job_Mother')
                    <span class="error" style="color:brown">{{ $message }}</span>
                @enderror
            </div>
            <div class="col-md-3">
                <label for="title">{{ trans('Parent_trans.Job_Mother_en') }}</label>
                <input type="text" wire:model="job_Mother_en" class="form-control">
                @error('job_Mother_en')
                    <span class="error" style="color:brown">{{ $message }}</span>
                @enderror
            </div>

            <div class="col">
                <label for="title">{{ trans('Parent_trans.National_ID_Mother') }}</label>
                <input type="text" wire:model="national_ID_Mother" class="form-control">
                @error('national_ID_Mother')
                    <span class="error" style="color:brown">{{ $message }}</span>
                @enderror
            </div>
            <div class="col">
                <label for="title">{{ trans('Parent_trans.Passport_ID_Mother') }}</label>
                <input type="text" wire:model="passport_ID_Mother" class="form-control">
                @error('passport_ID_Mother')
                    <span class="error" style="color:brown">{{ $message }}</span>
                @enderror
            </div>

            <div class="col">
                <label for="title">{{ trans('Parent_trans.Phone_Mother') }}</label>
                <input type="text" wire:model="phone_Mother" class="form-control">
                @error('phone_Mother')
                    <span class="error" style="color:brown">{{ $message }}</span>
                @enderror
            </div>

        </div>


        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="inputCity">{{ trans('Parent_trans.Nationality_Father_id') }}</label>
                <select class="custom-select my-1 mr-sm-2" wire:model="nationality_Mother_id">
                    <option selected>{{ trans('Parent_trans.Choose') }}...</option>
                    @foreach ($nationalty as $nationalty)
                        <option value="{{ $nationalty->id }}">{{ $nationalty->name }}</option>
                    @endforeach

                </select>
                @error('nationality_Mother_id')
                    <span class="error" style="color:brown">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group col">
                <label for="inputState">{{ trans('Parent_trans.Blood_Type_Father_id') }}</label>
                <select class="custom-select my-1 mr-sm-2" wire:model="blood_Type_Mother_id">
                    <option selected>{{ trans('Parent_trans.Choose') }}...</option>

                    @foreach ($type_blood as $type_blood)
                        <option value="{{ $type_blood->id }}">{{ $type_blood->name }}</option>
                    @endforeach

                </select>
                @error('blood_Type_Mother_id')
                    <span class="error" style="color:brown">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group col">
                <label for="inputZip">{{ trans('Parent_trans.Religion_Father_id') }}</label>
                <select class="custom-select my-1 mr-sm-2" wire:model="religion_Mother_id">
                    <option selected>{{ trans('Parent_trans.Choose') }}...</option>
                    @foreach ($religion as $religion)
                        <option value="{{ $religion->id }}">{{ $religion->name }}</option>
                    @endforeach
                </select>
                @error('religion_Mother_id')
                    <span class="error" style="color:brown">{{ $message }}</span>
                @enderror
            </div>
        </div>

        <div class="form-group">
            <label for="exampleFormControlTextarea1">{{ trans('Parent_trans.Address_Mother') }}</label>
            <textarea class="form-control" wire:model="address_Mother" id="exampleFormControlTextarea1" rows="4"></textarea>
            @error('address_Mother')
                <span class="error" style="color:brown">{{ $message }}</span>
            @enderror
        </div>

        <button class="btn btn-danger btn-sm nextBtn btn-lg pull-right" type="button" wire:click="back(1)">
            {{ trans('Parent_trans.Back') }}
        </button>

        <button class="btn btn-success btn-sm nextBtn btn-lg pull-right" type="button"
            wire:click="StepSubmit_edit">{{ trans('Teacher_trans.Next') }}</button>

    </div>
</div>
</div>

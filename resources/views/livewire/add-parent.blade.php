@if ($showform == null)
    <div style="{{ $showform != null ? 'display: none' : '' }}">
        @include('livewire.parts_add_parent.table_data')
    </div>
@else
    <div>
        <br> <br>
        <div class="stepwizard">
            <div class="stepwizard-row setup-panel">
                <div class="stepwizard-step">
                    <a href="#step-1" type="button"
                        class="btn btn-circle {{ $currentStep != 1 ? 'btn-default' : 'btn-success' }}">1</a>
                    <p>{{ trans('Parent_trans.Step1') }}</p>
                </div>
                <div class="stepwizard-step">
                    <a href="#step-2" type="button"
                        class="btn btn-circle {{ $currentStep != 2 ? 'btn-default' : 'btn-success' }}">2</a>
                    <p>{{ trans('Parent_trans.Step2') }}</p>
                </div>
                <div class="stepwizard-step">
                    <a href="#step-3" type="button"
                        class="btn btn-circle {{ $currentStep != 3 ? 'btn-default' : 'btn-success' }}"
                        disabled="disabled">3</a>
                    <p>{{ trans('Parent_trans.Step3') }}</p>
                </div>
            </div>
        </div>
        <br> <br> <br> <br>

        @include('livewire.parts_add_parent.form_father')
        @include('livewire.parts_add_parent.form_mother')

        @if ($currentStep != 3)
            <div style="display: none" class="row setup-content" id="step-3">
        @endif
        <div class="col-xs-12">
            <div class="col-md-12">
                <h5>{{ trans('Parent_trans.up_file') }}</h5>
                <input type="file" wire:model="photos" multiple>
                @error('photos')
                    <span class="error " style="color:brown">{{ $message }}</span>
                @enderror
                <br>
                <br>
                <input type="hidden" wire:model="id_edit">
                <br>
                <br>

                @if ($showEdit)
                    <button class="btn btn-success btn-sm btn-lg pull-right" wire:click="update"
                        type="button">{{ trans('Parent_trans.Finish') }}</button>
                    </button>
                @else
                    <button class="btn btn-success btn-sm btn-lg pull-right" wire:click="submit"
                        type="button">{{ trans('Parent_trans.Finish') }}</button>
                @endif
            </div>
        </div>
    </div>


    </div>

@endif

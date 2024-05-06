@extends('layouts.master')
@section('css')
    @toastr_css
@section('title')
    {{ trans('Teacher_trans.Edit_Teacher') }}
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
@section('PageTitle')
    {{ trans('Teacher_trans.Edit_Teacher') }}
@stop
<!-- breadcrumb -->
@endsection
@section('content')
<!-- row -->
<div class="row">
    <div class="col-md-12 mb-30">
        <div class="card card-statistics h-100">
            <div class="card-body">

                @if (session()->has('error'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>{{ session()->get('error') }}</strong>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif
                <div class="col-xs-12">
                    <div class="col-md-12">
                        <br>
                        <form action="{{ route('teacher.update') }}" method="post">
                            @csrf
                            @method('post')
                            <div class="form-row">
                                <div class="col">
                                    <label for="title">{{ trans('Teacher_trans.Email') }}</label>
                                    <input type="hidden" value="{{ $teacher->id }}" name="id">
                                    <input type="email" name="email" value="{{ $teacher->email }}"
                                        class="form-control" disabled>
                                </div>
                                <div class="col">
                                    <label for="title">{{ trans('Teacher_trans.Password') }}</label>
                                    <input type="password" name="Password" value="{{ $teacher->password }}"
                                        class="form-control" disabled>
                                </div>
                            </div>
                            <br>


                            <div class="form-row">
                                <div class="col">
                                    <label for="title">{{ trans('Teacher_trans.Name_ar') }}</label>
                                    <input type="text" name="name_ar"
                                        value="{{ $teacher->getTranslation('name', 'ar') }}" class="form-control">

                                </div>
                                <div class="col">
                                    <label for="title">{{ trans('Teacher_trans.Name_en') }}</label>
                                    <input type="text" name="name_en"
                                        value="{{ $teacher->getTranslation('name', 'en') }}" class="form-control">
                                    @error('Name_en')
                                        <div class="alert alert-danger"></div>
                                    @enderror
                                </div>
                            </div>
                            <br>
                            <div class="form-row">
                                <div class="form-group col">
                                    <label for="inputCity">{{ trans('Teacher_trans.specialization') }}</label>
                                    <select class="custom-select my-1 mr-sm-2" name="specialization_id">
                                        <option value="{{ $teacher->specialization->id }}">
                                            {{ $teacher->specialization->name }}</option>
                                        @foreach ($special as $special)
                                            <option value="{{ $special->id }}">{{ $special->name }}
                                            </option>
                                        @endforeach

                                    </select>

                                </div>
                                <div class="form-group col">
                                    <label for="inputState">{{ trans('Teacher_trans.Gender') }}</label>
                                    <select class="custom-select my-1 mr-sm-2" name="Gender_id">
                                        <option value="{{ $teacher->genders->id }}">
                                            {{ $teacher->genders->name }}
                                        </option>
                                        @foreach ($gender as $gender)
                                            <option value="{{ $gender->id }}">{{ $gender->name }}</option>
                                        @endforeach
                                    </select>

                                </div>
                            </div>
                            <br>

                            <div class="form-row">
                                <div class="col">
                                    <label for="title">{{ trans('Teacher_trans.Joining_Date') }}</label>
                                    <div class='input-group date'>
                                        <input class="form-control" type="text" id="datepicker-action"
                                            value="{{ $teacher->joining_Date }}" name="joining_Date"
                                            data-date-format="yyyy-mm-dd" required>
                                    </div>

                                </div>
                            </div>
                            <br>

                            <div class="form-group">
                                <label for="exampleFormControlTextarea1">{{ trans('Teacher_trans.Address') }}</label>
                                <textarea class="form-control" name="Address" id="exampleFormControlTextarea1" rows="4">p</textarea>

                            </div>

                            <button class="btn btn-success btn-sm nextBtn btn-lg pull-right"
                                type="submit">{{ trans('Teacher_trans.edit') }}</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- row closed -->
@endsection
@section('js')
@toastr_js
@toastr_render
@endsection

@extends('layouts.master')
@section('css')
    @toastr_css
@section('title')
    {{ trans('Teacher_trans.Add_Teacher') }}
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
@section('PageTitle')
    {{ trans('Teacher_trans.Add_Teacher') }}
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
                        <form action="{{ route('teacher.store') }}" method="post">
                            @method('post')
                            @csrf
                            <div class="form-row">
                                <div class="col">
                                    <label for="title">{{ trans('Teacher_trans.Email') }}</label>
                                    <input type="email" name="email" class="form-control"
                                        value="{{ old('email') }}">
                                    @error('email')
                                        <span class="error" style="color:brown">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col">
                                    <label for="title">{{ trans('Teacher_trans.Password') }}</label>
                                    <input type="password" name="password" class="form-control"
                                        value="{{ old('password') }}">
                                    @error('password')
                                        <span class="error" style="color:brown">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <br>


                            <div class="form-row">
                                <div class="col">
                                    <label for="title">{{ trans('Teacher_trans.Name_ar') }}</label>
                                    <input type="text" name="name_ar" class="form-control"
                                        value="{{ old('name_ar') }}">
                                    @error('name_ar')
                                        <span class="error" style="color:brown">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col">
                                    <label for="title">{{ trans('Teacher_trans.Name_en') }}</label>
                                    <input type="text" name="name_en" class="form-control"
                                        value="{{ old('name_en') }}">
                                </div>
                            </div>
                            <br>
                            <div class="form-row">
                                <div class="form-group col">
                                    <label for="inputCity">{{ trans('Teacher_trans.specialization') }}</label>
                                    <select class="custom-select my-1 mr-sm-2" name="specialization_id">
                                        <option selected disabled value="{{ old('specialization_id') }}">
                                            {{ trans('Parent_trans.Choose') }}...</option>

                                        @foreach ($special as $special)
                                            <option value="{{ $special->id }}">{{ $special->name }}
                                            </option>
                                        @endforeach



                                    </select>
                                </div>
                                <div class="form-group col">
                                    <label for="inputState">{{ trans('Teacher_trans.Gender') }}</label>
                                    <select class="custom-select my-1 mr-sm-2" name="gender_id">
                                        <option selected disabled value="{{ old('gender_id') }}">
                                            {{ trans('Parent_trans.Choose') }}...</option>
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
                                            name="joining_Date" data-date-format="yyyy-mm-dd" required
                                            value="{{ old('joining_Date') }}">
                                    </div>
                                </div>
                            </div>
                            <br>

                            <div class="form-group">
                                <label for="exampleFormControlTextarea1">{{ trans('Teacher_trans.Address') }}</label>
                                <textarea class="form-control" name="address" id="exampleFormControlTextarea1" rows="4"></textarea>
                            </div>

                            <button class="btn btn-success btn-sm nextBtn btn-lg pull-right"
                                type="submit">{{ trans('Teacher_trans.Add') }}</button>
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

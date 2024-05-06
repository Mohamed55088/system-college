@extends('layouts.master')
@section('css')
    @toastr_css
@section('title')
    {{ trans('main_trans.add_student') }}
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
@section('PageTitle')
    {{ trans('main_trans.add_student') }}
@stop
<!-- breadcrumb -->
@endsection
@section('content')
<!-- row -->
<div class="row">
    <div class="col-md-12 mb-30">
        <div class="card card-statistics h-100">
            <div class="card-body">

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form method="post" action="{{ route('student.update', 'no') }}" autocomplete="off">
                    @csrf
                    @method('patch')
                    <h6 style="font-family: 'Cairo', sans-serif;color: blue">
                        {{ trans('Students_trans.personal_information') }}</h6><br>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>{{ trans('Students_trans.name_ar') }} : <span
                                        class="text-danger">*</span></label>
                                <input type="text" name="name_ar" class="form-control"
                                    value="{{ $student->getTranslation('name', 'ar') }}">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>{{ trans('Students_trans.name_en') }} : <span
                                        class="text-danger">*</span></label>
                                <input class="form-control" name="name_en" type="text"
                                    value="{{ $student->getTranslation('name', 'en') }}">
                            </div>
                        </div>
                    </div>
                    <input type="hidden" name="id_student" value="{{ $student->id }}" disabled>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>{{ trans('Students_trans.email') }} : </label>
                                <input type="email" name="email" class="form-control"
                                    value="{{ $student->email }}">
                            </div>
                        </div>


                        <div class="col-md-6">
                            <div class="form-group">
                                <label>{{ trans('Students_trans.password') }} :</label>
                                <input type="password" name="password" class="form-control"
                                    value="{{ $student->password }}">
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="gender">{{ trans('Students_trans.gender') }} : <span
                                        class="text-danger">*</span></label>
                                <select class="custom-select mr-sm-2" name="gender_id">
                                    <option selected disabled value="{{ $student->gender->id }}">
                                        {{ $student->gender->name }}</option>
                                    @foreach ($data['genders'] as $gender)
                                        <option value="{{ $gender->id }}">{{ $gender->name }}
                                        </option>
                                    @endforeach

                                </select>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="nal_id">{{ trans('Students_trans.Nationality') }} : <span
                                        class="text-danger">*</span></label>
                                <select class="custom-select mr-sm-2" name="nationalitie_id">
                                    <option selected disabled value="{{ $student->nationality->id }}">
                                        {{ $student->nationality->name }}</option>
                                    @foreach ($data['nationalities'] as $national)
                                        <option value="{{ $national->id }}">{{ $national->name }}</option>
                                    @endforeach

                                </select>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="bg_id">{{ trans('Students_trans.blood_type') }} : </label>
                                <select class="custom-select mr-sm-2" name="blood_id">
                                    <option selected disabled value="{{ $student->type_blood->id }}">
                                        {{ $student->type_blood->name }}</option>
                                    @foreach ($data['typeBloods'] as $type)
                                        <option value="{{ $type->id }}">{{ $type->name }}</option>
                                    @endforeach

                                </select>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="bg_id">{{ trans('Students_trans.reliogions') }} : </label>
                                <select class="custom-select mr-sm-2" name="reliogions">
                                    <option selected disabled value="{{ $student->religion->id }}">
                                        {{ $student->religion->name }}</option>
                                    @foreach ($data['reliogions'] as $type)
                                        <option value="{{ $type->id }}">{{ $type->name }}</option>
                                    @endforeach

                                </select>
                            </div>
                        </div>

                    </div>

                    <h6 style="font-family: 'Cairo', sans-serif;color: blue">
                        {{ trans('Students_trans.Student_information') }}</h6><br>
                    <div class="row">
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="Grade_id">{{ trans('Students_trans.Grade') }} : <span
                                        class="text-danger">*</span></label>
                                <select class="custom-select mr-sm-2" name="grade_id">
                                    <option selected disabled value="{{ $student->grade->id }}">
                                        {{ $student->grade->name }}</option>
                                    @foreach ($data['grades'] as $grade)
                                        <option value="{{ $grade->id }}">{{ $grade->name }}</option>
                                    @endforeach


                                </select>
                            </div>
                        </div>

                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="Classroom_id">{{ trans('Students_trans.classrooms') }} : <span
                                        class="text-danger">*</span></label>
                                <select class="custom-select mr-sm-2" name="Classroom_id">
                                    <option selected disabled value="{{ $student->class_room->id }}">
                                        {{ $student->class_room->nameRoom }}</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="section_id">{{ trans('Students_trans.section') }} : </label>
                                <select class="custom-select mr-sm-2" name="section_id">
                                    <option selected disabled value="{{ $student->section->id }}">
                                        {{ $student->section->name }}</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="parent_id">{{ trans('Students_trans.parent') }} : <span
                                        class="text-danger">*</span></label>
                                <select class="custom-select mr-sm-2" name="parent_id">
                                    <option selected disabled value="{{ $student->parent->father->id }}">
                                        {{ $student->parent->father->name_Father }}</option>
                                    @foreach ($data['parents'] as $parent)
                                        <option value="{{ $parent->father->id }}">{{ $parent->father->name_Father }}
                                        </option>
                                    @endforeach

                                </select>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="academic_year">{{ trans('Students_trans.academic_year') }} : <span
                                        class="text-danger">*</span></label>
                                <select class="custom-select mr-sm-2" name="academic_year">
                                    <option selected disabled>{{ trans('Parent_trans.Choose') }}...</option>
                                    <option selected disabled value="{{ $student->academic_year }}">
                                        {{ $student->academic_year }} </option>
                                    <option value="llll">lll</option>

                                </select>
                            </div>
                        </div>
                    </div><br>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label>{{ trans('Students_trans.Date_of_Birth') }} :</label>
                            <input class="form-control" type="text" id="datepicker-action" name="birth_date"
                                data-date-format="yyyy-mm-dd" value="{{ $student->birth_date }}">
                            <label>{{ trans('Students_trans.academic_year') }} :</label>
                            <input class="form-control" type="text" id="datepicker-action" name="academic_year"
                                data-date-format="yyyy-mm-dd" value="{{ $student->acadmic_year }}">
                        </div>
                    </div>

                    <button class="btn btn-success btn-sm nextBtn btn-lg pull-right"
                        type="submit">{{ trans('Students_trans.submit') }}</button>
                </form>

            </div>
        </div>
    </div>
</div>
<!-- row closed -->
@endsection
@section('js')
@toastr_js
@toastr_render

<script>
    $(document).ready(function() {
        $('select[name="grade_id"]').on('change', function() {
            var grade_id = $(this).val();
            if (grade_id) {
                $.ajax({
                    url: "{{ URL::to('grade_student_id') }}/" + grade_id,
                    type: "GET",
                    dataType: "json",
                    success: function(data) {
                        $('select[name="Classroom_id"]').empty();
                        $.each(data, function(key, value) {

                            $('select[name="Classroom_id"]').append(
                                '<option value="' + key + '">' + value +
                                '</option>');
                        });
                    },
                });
            } else {
                console.log('AJAX load did not work');
            }
        });
    });
</script>


<script>
    $(document).ready(function() {
        $('select[name="Classroom_id"]').on('change', function() {
            var Classroom_id = $(this).val();
            if (Classroom_id) {
                $.ajax({
                    url: "{{ URL::to('section_student_id') }}/" + Classroom_id,
                    type: "GET",
                    dataType: "json",
                    success: function(data) {
                        $('select[name="section_id"]').empty();
                        $.each(data, function(key, value) {
                            $('select[name="section_id"]').append(
                                '<option value="' +
                                key + '">' + value + '</option>');
                        });
                    },
                });
            } else {
                console.log('AJAX load did not work');
            }
        });
    });
</script>

@endsection

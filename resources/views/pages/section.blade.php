@extends('layouts.master')
@section('css')
    @toastr_css
    @notifyCss
@section('title')
    {{ trans('Sections_trans.title_page') }}
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
@section('PageTitle')
    {{ trans('Sections_trans.title_page') }}
@stop
<!-- breadcrumb -->
@endsection
@section('content')
<!-- row -->
<div class="row">
    <div class="col-md-12 mb-30">
        <div class="card card-statistics h-100">
            <div class="card-body">
                <a class="button x-small" href="#" data-toggle="modal" data-target="#exampleModal">
                    {{ trans('Sections_trans.add_section') }}</a>
            </div>

            @if ($errors->any())
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif

            <div class="card card-statistics h-100">
                <div class="card-body">
                    <div class="accordion gray plus-icon round">
                        @forelse ($grade as $grade)
                            <div class="acd-group">
                                <a href="#" class="acd-heading">{{ $grade->name }}</a>
                                <div class="acd-des">
                                    <div class="row">
                                        <div class="col-xl-12 mb-30">
                                            <div class="card card-statistics h-100">
                                                <div class="card-body">
                                                    <div class="d-block d-md-flex justify-content-between">
                                                        <div class="d-block">
                                                        </div>
                                                    </div>
                                                    <div class="table-responsive mt-15">
                                                        <table class="table center-aligned-table mb-0">
                                                            <thead>
                                                                <tr class="text-dark">
                                                                    <th>#</th>
                                                                    <th>{{ trans('Sections_trans.Name_Section') }}
                                                                    </th>
                                                                    <th>{{ trans('Sections_trans.Name_Class') }}</th>
                                                                    <th>{{ trans('Sections_trans.Status') }}</th>
                                                                    <th>{{ trans('Sections_trans.Processes') }}</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                @foreach ($grade->section as $section)
                                                                    <tr>
                                                                        <td>{{ $loop->index + 1 }}</td>
                                                                        <td>{{ $section->name }}</td>
                                                                        <td>{{ $section->classRoom->nameRoom }}</td>

                                                                        <td>
                                                                            @if ($section->status == 1)
                                                                                <label
                                                                                    class="badge badge-success">{{ trans('Sections_trans.Status_Section_AC') }}</label>
                                                                            @else
                                                                                <label
                                                                                    class="badge badge-danger">{{ trans('Sections_trans.Status_Section_No') }}</label>
                                                                            @endif

                                                                        </td>
                                                                        <td>
                                                                            <a href="#"
                                                                                class="btn btn-outline-info btn-sm"
                                                                                data-toggle="modal"
                                                                                data-target="#edit{{ $section->id }}">{{ trans('Sections_trans.Edit') }}</a>
                                                                            <a href="#"
                                                                                class="btn btn-outline-danger btn-sm"
                                                                                data-toggle="modal"
                                                                                data-target="#delete{{ $section->id }}">{{ trans('Sections_trans.Delete') }}</a>
                                                                        </td>
                                                                    </tr>


                                                                    <!--تعديل قسم جديد -->
                                                                    <div class="modal fade"
                                                                        id="edit{{ $section->id }}" tabindex="-1"
                                                                        role="dialog"
                                                                        aria-labelledby="exampleModalLabel"
                                                                        aria-hidden="true">
                                                                        <div class="modal-dialog" role="document">
                                                                            <div class="modal-content">
                                                                                <div class="modal-header">
                                                                                    <h5 class="modal-title"
                                                                                        style="font-family: 'Cairo', sans-serif;"
                                                                                        id="exampleModalLabel">
                                                                                        {{ trans('Sections_trans.edit_Section') }}
                                                                                    </h5>
                                                                                    <button type="button"
                                                                                        class="close"
                                                                                        data-dismiss="modal"
                                                                                        aria-label="Close">
                                                                                        <span
                                                                                            aria-hidden="true">&times;</span>
                                                                                    </button>
                                                                                </div>
                                                                                <div class="modal-body">

                                                                                    <form
                                                                                        action="{{ route('section.update', 2) }}"
                                                                                        method="POST">
                                                                                        @csrf
                                                                                        @method('PATCH')
                                                                                        <div class="row">
                                                                                            <div class="col">
                                                                                                <input type="text"
                                                                                                    name="name_section_ar"
                                                                                                    class="form-control"
                                                                                                    value="{{ $section->getTranslation('name', 'ar') }}">
                                                                                            </div>

                                                                                            <div class="col">
                                                                                                <input type="text"
                                                                                                    name="name_section_en"
                                                                                                    class="form-control"
                                                                                                    value="{{ $section->getTranslation('name', 'en') }}">
                                                                                                <input id="id"
                                                                                                    type="hidden"
                                                                                                    name="id"
                                                                                                    class="form-control"
                                                                                                    value="{{ $section->id }}">
                                                                                            </div>

                                                                                        </div>
                                                                                        <br>


                                                                                        <div class="col">
                                                                                            <label for="inputName"
                                                                                                class="control-label">{{ trans('Sections_trans.Name_Grade') }}</label>
                                                                                            <select name="grade_id"
                                                                                                class="custom-select"
                                                                                                onclick="console.log($(this).val())">
                                                                                                <!--placeholder-->
                                                                                                <option
                                                                                                    value="{{ $section->grade->id }}"
                                                                                                    disabled>
                                                                                                    {{ $section->grade->name }}
                                                                                                </option>
                                                                                                @foreach ($grade1 as $grade)
                                                                                                    <option
                                                                                                        value="{{ $grade->id }}">
                                                                                                        {{ $grade->name }}
                                                                                                    </option>
                                                                                                @endforeach

                                                                                            </select>
                                                                                        </div>
                                                                                        <br>
                                                                                        <div class="col">
                                                                                            <label for="inputName"
                                                                                                class="control-label">{{ trans('Sections_trans.Name_Class') }}</label>
                                                                                            <select name="class_id"
                                                                                                class="custom-select">
                                                                                                <option
                                                                                                    value="{{ $section->classRoom->id }}">
                                                                                                    {{ $section->classRoom->nameRoom }}
                                                                                                </option>
                                                                                                <option value="">
                                                                                                </option>
                                                                                            </select>
                                                                                        </div>
                                                                                        <br>



                                                                                        <div class="col">
                                                                                            <label for="inputName"
                                                                                                class="control-label">{{ trans('Sections_trans.Name_Teacher') }}</label>
                                                                                            <select multiple
                                                                                                name="teacher_id[]"
                                                                                                class="form-control"
                                                                                                id="exampleFormControlSelect2">
                                                                                                @foreach ($section->teachers as $teacher)
                                                                                                    <option
                                                                                                        value="{{ $teacher->id }}"
                                                                                                        selected
                                                                                                        disabled>
                                                                                                        {{ $teacher->name }}
                                                                                                    </option>
                                                                                                @endforeach
                                                                                                @foreach ($section->teachers as $teacher)
                                                                                                    <option
                                                                                                        value="{{ $teacher->id }}">
                                                                                                        {{ $teacher->name }}
                                                                                                    </option>
                                                                                                @endforeach


                                                                                            </select>
                                                                                        </div>

                                                                                        {{-- ! heeeeeeeeeerrrrrrrrrrrrrrrreeeeeeeee --}}
                                                                                        <div class="col">
                                                                                            <div class="form-check">
                                                                                                @if ($section->status == 1)
                                                                                                    <input
                                                                                                        type="checkbox"
                                                                                                        checked
                                                                                                        class="form-check-input"
                                                                                                        name="status"
                                                                                                        id="exampleCheck1">

                                                                                                    <label
                                                                                                        class="form-check-label"
                                                                                                        for="exampleCheck1">{{ trans('Sections_trans.Status') }}</label>
                                                                                                @else
                                                                                                    <input
                                                                                                        type="checkbox"
                                                                                                        class="form-check-input"
                                                                                                        name="status"
                                                                                                        id="exampleCheck1">

                                                                                                    <label
                                                                                                        class="form-check-label"
                                                                                                        for="exampleCheck1">{{ trans('Sections_trans.Status') }}</label>
                                                                                                @endif




                                                                                            </div>
                                                                                        </div>

                                                                                </div>
                                                                                <div class="modal-footer">
                                                                                    <button type="button"
                                                                                        class="btn btn-secondary"
                                                                                        data-dismiss="modal">{{ trans('Sections_trans.Close') }}</button>
                                                                                    <button type="submit"
                                                                                        class="btn btn-danger">{{ trans('Sections_trans.submit') }}</button>
                                                                                </div>
                                                                                </form>
                                                                            </div>
                                                                        </div>
                                                                    </div>


                                                                    <!-- delete_modal_Grade -->
                                                                    <div class="modal fade"
                                                                        id="delete{{ $section->id }}" tabindex="-1"
                                                                        role="dialog"
                                                                        aria-labelledby="exampleModalLabel"
                                                                        aria-hidden="true">
                                                                        <div class="modal-dialog" role="document">
                                                                            <div class="modal-content">
                                                                                <div class="modal-header">
                                                                                    <h5 style="font-family: 'Cairo', sans-serif;"
                                                                                        class="modal-title"
                                                                                        id="exampleModalLabel">
                                                                                        {{ trans('Sections_trans.delete_Section') }}
                                                                                    </h5>
                                                                                    <button type="button"
                                                                                        class="close"
                                                                                        data-dismiss="modal"
                                                                                        aria-label="Close">
                                                                                        <span
                                                                                            aria-hidden="true">&times;</span>
                                                                                    </button>
                                                                                </div>
                                                                                <div class="modal-body">
                                                                                    <form
                                                                                        action="{{ route('section.destroy', '1') }}"
                                                                                        method="post">
                                                                                        {{ method_field('Delete') }}
                                                                                        @csrf
                                                                                        {{ trans('Sections_trans.Warning_Section') }}
                                                                                        <input id="id"
                                                                                            type="hidden"
                                                                                            name="id"
                                                                                            class="form-control"
                                                                                            value="{{ $section->id }}">
                                                                                        <div class="modal-footer">
                                                                                            <button type="button"
                                                                                                class="btn btn-secondary"
                                                                                                data-dismiss="modal">{{ trans('Sections_trans.Close') }}</button>
                                                                                            <button type="submit"
                                                                                                class="btn btn-danger">{{ trans('Sections_trans.submit') }}</button>
                                                                                        </div>
                                                                                    </form>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                @endforeach
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        @empty
                            no there grades
                        @endforelse
                    </div>
                </div>

                <!--اضافة قسم جديد -->
                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" style="font-family: 'Cairo', sans-serif;"
                                    id="exampleModalLabel">
                                    {{ trans('Sections_trans.add_section') }}</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">

                                <form action="{{ route('section.store') }}" method="POST">
                                    @csrf
                                    <div class="row">
                                        <div class="col">
                                            <input type="text" name="name_section_ar" class="form-control"
                                                placeholder="{{ trans('Sections_trans.Section_name_ar') }}">
                                        </div>

                                        <div class="col">
                                            <input type="text" name="name_section_en" class="form-control"
                                                placeholder="{{ trans('Sections_trans.Section_name_en') }}">
                                        </div>

                                    </div>
                                    <br>


                                    <div class="col">
                                        <label for="inputName"
                                            class="control-label">{{ trans('Sections_trans.Name_Grade') }}</label>
                                        <select name="grade_id" class="custom-select"
                                            onchange="console.log($(this).val())">
                                            <!--placeholder-->
                                            <option value="" selected disabled>
                                                {{ trans('Sections_trans.select_grade') }}
                                            </option>

                                            @foreach ($grade1 as $grade)
                                                <option value="{{ $grade->id }}"> {{ $grade->name }}
                                                </option>
                                            @endforeach

                                        </select>
                                    </div>
                                    <br>

                                    <div class="col">
                                        <label for="inputName"
                                            class="control-label">{{ trans('Sections_trans.Name_Class') }}</label>

                                        <select name="class_id" class="custom-select">
                                            <option value="" selected disabled>
                                                {{ trans('Sections_trans.select_grade') }}
                                            </option>
                                            <option value="">
                                            </option>

                                        </select>
                                    </div>

                                    <div class="col">
                                        <label for="inputName"
                                            class="control-label">{{ trans('Sections_trans.Name_Teacher') }}</label>
                                        <select multiple name="teacher_id[]" class="form-control"
                                            id="exampleFormControlSelect2">
                                            @foreach ($teachers as $teacher)
                                                <option value="{{ $teacher->id }}">{{ $teacher->name }}</option>
                                            @endforeach


                                        </select>
                                    </div>


                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-dismiss="modal">{{ trans('Sections_trans.Close') }}</button>
                                        <button type="submit"
                                            class="btn btn-danger">{{ trans('Sections_trans.submit') }}</button>
                                    </div>
                                </form>
                            </div>
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
    {{-- !**************** ajax grade_id************ --}}
    <script>
        $(document).ready(function() {
            $('select[name="grade_id"]').on('change', function() {
                var grade_id = $(this).val();
                if (grade_id) {
                    $.ajax({
                        url: "{{ URL::to('grade_id') }}/" + grade_id,
                        type: "GET",
                        dataType: "json",
                        success: function(data) {
                            $('select[name="class_id"]').empty();
                            $.each(data, function(key, value) {
                                $('select[name="class_id"]').append('<option value="' +
                                    key + '">' + value + '</option>');
                            });
                        },
                    });
                } else {
                    console.log('AJAX load did not work');
                }
            });
        });
        // $(document).on('click', '#click44', function() {
        //     $.ajax({
        //         type: 'POST',
        //         url: "{{ route('section.store') }}",
        //         dataType: "json",
        //         data: {
        //             '_token': "{{ csrf_token() }}",

        //             'name_section_ar': $("input[name='name_section_ar']").val(),
        //             'name_section_en': $("input[name='name_section_en']").val(),
        //             'grade_id': $("input[name='grade_id']").val(),
        //             'class_id': $("input[name='class_id']").val()
        //         },
        //         success: function(response) {
        //             // Handle the response from the server if needed
        //             console.log(response);
        //         },
        //         error: function(xhr, status, error) {
        //             // Handle the error if the request fails
        //             console.error(xhr.responseText);
        //         }
        //     });
        // });
    </script>

    @notifyJs
@endsection

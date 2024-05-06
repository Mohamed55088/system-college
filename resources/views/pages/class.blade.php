@extends('layouts.master')
@section('css')
    @notifyCss

@section('title')
    {{ trans('classes.title_page') }}
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
@section('PageTitle')
    {{ trans('classes.title_page') }}
@stop
<!-- breadcrumb -->
@endsection
@section('content')
<!-- row -->
<div class="row">

    <div class="col-xl-12 mb-30">
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

                <button type="button" class="button x-small" data-toggle="modal" data-target="#exampleModal">
                    {{ trans('classes.add_class') }}
                </button>

                <button type="button" class="button x-small" id="btn_delete_all">
                    {{ trans('classes.delete_checkbox') }}
                </button>
                <br><br>
                <form action="{{ route('filter') }}" method="POST">
                    {{ csrf_field() }}
                    <select class="selectpicker" data-style="btn-info" name="Grade_id" required
                        onchange="this.form.submit()">
                        <option value="" selected disabled>{{ trans('classes.search_by_grade') }}
                        </option>
                        @foreach ($grades as $grade)
                            <option value="{{ $grade->id }}">{{ $grade->name }}</option>
                        @endforeach
                    </select>
                </form>

                <div class="table-responsive">
                    <table id="datatable" class="table  table-hover table-sm table-bordered p-0" data-page-length="50"
                        style="text-align: center">
                        <thead>
                            <tr>
                                <th><input name="select_all" id="example-select-all" type="checkbox"
                                        onclick="CheckAll('box1', this)" /></th>
                                <th>#</th>
                                <th>{{ trans('classes.name_class') }}</th>
                                <th>{{ trans('classes.name_grade') }}</th>
                                <th>{{ trans('classes.processes') }}</th>

                            </tr>
                        </thead>
                        <tbody>
                            @if (isset($details))
                                <?php $List_Classes = $details; ?>
                            @else
                                <?php $List_Classes = $classes; ?>
                            @endif

                            @foreach ($List_Classes as $class)
                                <tr>
                                    <td><input type="checkbox" value="{{ $class->id }}" class="box1"></td>
                                    <td>{{ $loop->index + 1 }}</td>
                                    <td>{{ $class->nameRoom }}</td>
                                    <td>{{ $class->grade->name }}</td>
                                    <td>
                                        <button type="button" class="btn btn-info btn-sm" data-toggle="modal"
                                            data-target="#edit{{ $class->id }}"
                                            title="{{ trans('classes.Edit') }}"><i class="fa fa-edit"></i></button>
                                        <button type="button" class="btn btn-danger btn-sm" data-toggle="modal"
                                            data-target="#delete{{ $class->id }}"
                                            title="{{ trans('classes.Delete') }}"><i class="fa fa-trash"></i></button>
                                    </td>
                                </tr>
                                <!-- edit_modal_Grade -->
                                <div class="modal fade" id="edit{{ $class->id }}" tabindex="-1" role="dialog"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title"
                                                    id="exampleModalLabel">
                                                    {{ trans('classes.edit_grade') }}
                                                </h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <!-- add_form -->
                                                <form action="{{ route('classroom.update', '1') }}" method="post">
                                                    {{ method_field('patch') }}
                                                    @csrf
                                                    <div class="row">
                                                        <div class="col">
                                                            <label for="Name"
                                                                class="mr-sm-2">{{ trans('classes.stage_name_ar') }}
                                                                :</label>
                                                            <input id="Name" type="text" name="name_ar"
                                                                class="form-control"
                                                                value="{{ $class->getTranslation('nameRoom', 'ar') }}"
                                                                required>
                                                            <input id="id" type="hidden" name="id"
                                                                class="form-control" value="{{ $class->id }}">
                                                        </div>
                                                        <div class="col">
                                                            <label for="Name_en"
                                                                class="mr-sm-2">{{ trans('classes.stage_name_en') }}
                                                                :</label>
                                                            <input type="text" class="form-control"
                                                                value="{{ $class->getTranslation('nameRoom', 'en') }}"
                                                                name="name_en" required>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label
                                                            for="exampleFormControlTextarea1">{{ trans('classes.grade') }}
                                                            :</label>
                                                        <div class="box" style="    position: absolute;"><select
                                                                class="fancyselect" name="grade_id">
                                                                @forelse ($grades as $grade)
                                                                    <option value="{{ $grade->id }}">
                                                                        {{ $grade->name }}
                                                                    </option>

                                                                @empty
                                                                    no thing
                                                                @endforelse
                                                            </select>
                                                        </div>


                                                    </div>
                                                    <br><br>

                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-dismiss="modal">{{ trans('classes.close') }}</button>
                                                        <button type="submit"
                                                            class="btn btn-success">{{ trans('classes.submit') }}</button>
                                                    </div>
                                                </form>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- delete_modal_Grade -->
                                <div class="modal fade" id="delete{{ $class->id }}" tabindex="-1" role="dialog"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title"
                                                    id="exampleModalLabel">
                                                    {{ trans('classes.delete_class') }}
                                                </h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="{{ route('classroom.destroy', '1') }}" method="post">
                                                    {{ method_field('Delete') }}
                                                    @csrf
                                                    {{ trans('classes.warning_grade') }}
                                                    <input id="id" type="hidden" name="id"
                                                        class="form-control" value="{{ $class->id }}">
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-dismiss="modal">{{ trans('classes.close') }}</button>
                                                        <button type="submit"
                                                            class="btn btn-danger">{{ trans('classes.submit') }}</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>



    <!-- delete_all_modal_class -->
    <div class="modal fade" id="delete_all" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title" id="exampleModalLabel">
                        {{ trans('My_Classes_trans.delete_class') }}
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <form action="{{ route('delete_all', 1) }}" method="POST">
                    {{ csrf_field() }}
                    <div class="modal-body">
                        {{ trans('My_Classes_trans.Warning_Grade') }}
                        <input class="text" type="hidden" id="delete_all_id" name="delete_all_id"
                            value=''>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary"
                            data-dismiss="modal">{{ trans('My_Classes_trans.Close') }}</button>
                        <button type="submit" class="btn btn-danger">{{ trans('My_Classes_trans.submit') }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>




    <!-- add_modal_class -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title" id="exampleModalLabel">
                        {{ trans('classes.add_class') }}
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <form class=" row mb-30" action="{{ route('classroom.store') }}" method="POST">
                        @csrf

                        <div class="card-body">
                            <div class="repeater">
                                <div data-repeater-list="List_Classes">
                                    <div data-repeater-item>

                                        <div class="row">

                                            <div class="col">
                                                <label for="Name"
                                                    class="mr-sm-2">{{ trans('classes.name_class_ar') }}
                                                    :</label>
                                                <input class="form-control" type="text" name="name_ar" required />
                                            </div>


                                            <div class="col">
                                                <label for="Name"
                                                    class="mr-sm-2">{{ trans('classes.name_class_en') }}
                                                    :</label>
                                                <input class="form-control" type="text" name="name_en" required />
                                            </div>


                                            <div class="col">
                                                <label for="Name_en"
                                                    class="mr-sm-2">{{ trans('classes.name_grade') }}
                                                    :</label>
                                                <div class="box"><select class="fancyselect" name="grade_id">
                                                        @forelse ($grades as $grade)
                                                            <option value="{{ $grade->id }}">{{ $grade->name }}
                                                            </option>

                                                        @empty
                                                            no thing
                                                        @endforelse
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col">
                                                <label for="Name_en"
                                                    class="mr-sm-2">{{ trans('classes.processes') }}
                                                    :</label>
                                                <input class="btn btn-danger btn-block" data-repeater-delete
                                                    type="button" value="{{ trans('classes.delete_row') }}" />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-20">
                                    <div class="col-12">
                                        <input class="button" data-repeater-create type="button"
                                            value="{{ trans('classes.add_row') }}" />
                                    </div>

                                </div>

                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                        data-dismiss="modal">{{ trans('classes.close') }}</button>
                                    <button type="submit"
                                        class="btn btn-success">{{ trans('classes.submit') }}</button>
                                </div>


                            </div>
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
<script>
    function CheckAll(className, elem) {
        var elements = document.getElementsByClassName(className);
        var l = elements.length;

        if (elem.checked) {
            for (var i = 0; i < l; i++) {
                elements[i].checked = true;
            }
        } else {
            for (var i = 0; i < l; i++) {
                elements[i].checked = false;
            }
        }
    }
</script>
<script type="text/javascript">
    $(function() {
        $("#btn_delete_all").click(function() {
            var selected = new Array();
            $("#datatable input[type=checkbox]:checked").each(function() {
                selected.push(this.value);
            });

            if (selected.length > 0) {
                $('#delete_all').modal('show')
                $('input[id="delete_all_id"]').val(selected);
            }
        });
    });
</script>

@notifyJs
@endsection

@extends('layouts.master')
@section('css')
    @notifyCss
@section('title')
    {{ trans('trans_grade.title') }}
@endsection
@section('PageTitle')
    {{ trans('trans_grade.grade_title') }}

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
                        {{ trans('trans_grade.add_grade') }}
                    </button>
                    <br>

                    <br>

                    <div class="table-responsive">
                        <table id="datatable" class="table  table-hover table-sm table-bordered p-0" data-page-length="50"
                            style="text-align: center">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>{{ trans('trans_grade.names') }}</th>
                                    <th>{{ trans('trans_grade.notes') }}</th>
                                    <th>{{ trans('trans_grade.process') }}</th>
                                </tr>
                            </thead>
                            <tbody>

                                @forelse ($grades as $grade)
                                    <tr>
                                        <td> {{ $loop->index + 1 }}</td>
                                        <td>{{ $grade->name }} </td>
                                        <td>{{ $grade->note }} </td>
                                        <td>


                                            <button type="button" class=" x-small btn btn-info btn-sm" data-toggle="modal"
                                                data-target="#edit{{ $grade->id }}">
                                                <i class="fa fa-edit"></i>
                                            </button>


                                            <button type="button" class="btn btn-danger btn-sm" data-toggle="modal"
                                                data-target="#delete{{ $grade->id }}"
                                                title="{{ trans('trans_grade.delete') }}"><i
                                                    class="fa fa-trash"></i></button>
                                        </td>
                                    </tr>
                                    <!-- edit_modal_Grade -->
                                    <div class="modal fade" id="edit{{ $grade->id }}" tabindex="-1" role="dialog"
                                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title"
                                                        id="exampleModalLabel">
                                                        {{ trans('trans_grade.edit') }}
                                                    </h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <!-- add_form -->
                                                    <form action="{{ route('grade.update', 'update') }}" method="post">
                                                        {{ method_field('PUT') }}
                                                        @csrf
                                                        <div class="row">
                                                            <div class="col">
                                                                <label for="name_ar"
                                                                    class="mr-sm-2">{{ trans('trans_grade.name_ar') }}
                                                                    :</label>
                                                                <input id="Name" type="text" name="name_ar"
                                                                    class="form-control"
                                                                    value="{{ $grade->getTranslation('name', 'ar') }}"
                                                                    required>
                                                                <input id="id" type="hidden" name="id"
                                                                    class="form-control" value="{{ $grade->id }}">
                                                            </div>
                                                            <div class="col">
                                                                <label for="name_en"
                                                                    class="mr-sm-2">{{ trans('trans_grade.name_en') }}
                                                                    :</label>
                                                                <input type="text" class="form-control"
                                                                    value="{{ $grade->getTranslation('name', 'en') }}"
                                                                    name="name_en" required>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label
                                                                for="exampleFormControlTextarea1">{{ trans('trans_grade.notes') }}
                                                                :</label>
                                                            <textarea class="form-control" name="Notes" id="exampleFormControlTextarea1" rows="3">{{ $grade->note }} </textarea>
                                                        </div>
                                                        <br><br>

                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary"
                                                                data-dismiss="modal">{{ trans('trans_grade.close') }}</button>
                                                            <button type="submit"
                                                                class="btn btn-success">{{ trans('trans_grade.submit_update') }}</button>
                                                        </div>
                                                    </form>

                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- delete_modal_Grade -->
                                    <div class="modal fade" id="delete{{ $grade->id }}" tabindex="-1" role="dialog"
                                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title"
                                                        id="exampleModalLabel">
                                                        {{ trans('trans_grade.delete_grade') }}
                                                    </h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <form action="{{ route('grade.destroy', 'delete') }}" method="post">
                                                        {{ method_field('Delete') }}
                                                        @csrf
                                                        {{ trans('trans_grade.warning_grade') }}
                                                        <input id="id" type="text" name="id"
                                                            class="form-control" value="{{ $grade->name }} " disabled>

                                                        <div class="modal-footer">
                                                            <input id="id" type="hidden" name="id"
                                                                class="form-control" value="{{ $grade->id }} ">
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary"
                                                                    data-dismiss="modal">{{ trans('trans_grade.close') }}</button>
                                                                <button type="submit"
                                                                    class="btn btn-danger">{{ trans('trans_grade.submit_delete') }}</button>
                                                            </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @empty
                                @endforelse






                        </table>
                    </div>
                </div>
            </div>
        </div>


        <!-- add_modal_Grade -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title" id="exampleModalLabel">
                            {{ trans('trans_grade.add_grade') }}
                        </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <!-- add_form -->
                        <form action="{{ route('grade.store') }}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col">
                                    <label for="Name" class="mr-sm-2">{{ trans('trans_grade.name_ar') }}
                                        :</label>
                                    <input id="Name" type="text" name="name_ar" value="{{ old('name_ar') }}"
                                        class="form-control">
                                </div>
                                <div class="col">
                                    <label for="Name_en" class="mr-sm-2">{{ trans('trans_grade.name_en') }}
                                        :</label>
                                    <input type="text" class="form-control" name="name_en"
                                        value="{{ old('name_en') }}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlTextarea1">{{ trans('trans_grade.notes') }}
                                    :</label>
                                <textarea class="form-control" name="note" id="exampleFormControlTextarea1" rows="3">{{ old('note') }}</textarea>
                            </div>
                            <br><br>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary"
                            data-dismiss="modal">{{ trans('trans_grade.close') }}</button>
                        <button type="submit" class="btn btn-success">{{ trans('trans_grade.submit') }}</button>
                    </div>
                    </form>

                </div>
            </div>
        </div>

    </div>
    <!-- row closed -->
@endsection
@section('js')

    @notifyJs
@endsection

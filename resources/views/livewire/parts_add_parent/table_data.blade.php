<button class="btn btn-success btn-sm btn-lg pull-right" wire:click="showformadd"
    type="button">{{ trans('Parent_trans.add_parent') }}</button><br><br>
<div class="table-responsive">
    <table id="datatable" class="table  table-hover table-sm table-bordered p-0" data-page-length="50"
        style="text-align: center">
        <thead>
            <tr class="table-success">
                <th>#</th>
                <th>{{ trans('Parent_trans.Name_Father') }}</th>
                <th>{{ trans('Parent_trans.Email') }}</th>
                <th>{{ trans('Parent_trans.name_Mother') }}</th>
                <th>{{ trans('Parent_trans.Job_Father') }}</th>
                <th>{{ trans('Parent_trans.Phone_Father') }}</th>
                <th>{{ trans('Parent_trans.nationality_Father') }}</th>


                <th>{{ trans('Parent_trans.nationality_mother') }}</th>
                <th>{{ trans('Parent_trans.Processes') }}</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($parents as $parent)
                <tr>
                    <td>{{ $loop->index + 1 }}</td>
                    <td>{{ $parent->father->name_Father }}</td>
                    <td>{{ $parent->email }}</td>
                    <td>{{ $parent->mother->name_Mother }}</td>
                    <td>{{ $parent->father->job_Father }}</td>
                    <td>{{ $parent->father->phone_Father }}</td>
                    <td>{{ $parent->father->nationality->name }}</td>
                    <td>{{ $parent->mother->nationality->name }}</td>

                    <td>

                        <button title="{{ trans('Grades_trans.Edit') }}" class="btn btn-primary btn-sm"
                            wire:click='edit({{ $parent->id }})'><i class="fa fa-edit"></i></button>
                        <button type="button" class="btn btn-danger btn-sm" wire:click='delete({{ $parent->id }})'
                            title="{{ trans('Grades_trans.Delete') }}"><i class="fa fa-trash"></i></button>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="8">
                        <h6> no parents here</h6>
                    </td>
                </tr>
            @endforelse
    </table>
</div>

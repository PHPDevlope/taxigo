@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="card bg-blueGray-100">
        <div class="card-header">
            <div class="card-header-container">
                <h6 class="card-title">
                    {{ trans('global.view') }}
                    {{ trans('cruds.disputeType.title_singular') }}:
                    {{ trans('cruds.disputeType.fields.id') }}
                    {{ $disputeType->id }}
                </h6>
            </div>
        </div>

        <div class="card-body">
            <div class="pt-3">
                <table class="table table-view">
                    <tbody class="bg-white">
                        <tr>
                            <th>
                                {{ trans('cruds.disputeType.fields.id') }}
                            </th>
                            <td>
                                {{ $disputeType->id }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.disputeType.fields.dispute_type') }}
                            </th>
                            <td>
                                {{ $disputeType->dispute_type_label }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.disputeType.fields.dispute_issue') }}
                            </th>
                            <td>
                                {{ $disputeType->dispute_issue }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.disputeType.fields.status') }}
                            </th>
                            <td>
                                {{ $disputeType->status_label }}
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="form-group">
                @can('dispute_type_edit')
                    <a href="{{ route('admin.dispute-types.edit', $disputeType) }}" class="btn btn-indigo mr-2">
                        {{ trans('global.edit') }}
                    </a>
                @endcan
                <a href="{{ route('admin.dispute-types.index') }}" class="btn btn-secondary">
                    {{ trans('global.back') }}
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
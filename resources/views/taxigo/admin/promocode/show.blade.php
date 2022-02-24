@extends('taxigo.layouts.admin')
@section('content')
<div class="row">
    <div class="card bg-blueGray-100">
        <div class="card-header">
            <div class="card-header-container">
                <h6 class="card-title">
                    {{ trans('global.view') }}
                    {{ trans('cruds.promocode.title_singular') }}:
                    {{ trans('cruds.promocode.fields.id') }}
                    {{ $promocode->id }}
                </h6>
            </div>
        </div>

        <div class="card-body">
            <div class="pt-3">
                <table class="table table-view">
                    <tbody class="bg-white">
                        <tr>
                            <th>
                                {{ trans('cruds.promocode.fields.id') }}
                            </th>
                            <td>
                                {{ $promocode->id }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.promocode.fields.promocode') }}
                            </th>
                            <td>
                                {{ $promocode->promocode }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.promocode.fields.discount') }}
                            </th>
                            <td>
                                {{ $promocode->discount }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.promocode.fields.promocodes_use') }}
                            </th>
                            <td>
                                {{ $promocode->promocodes_use_label }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.promocode.fields.use_count') }}
                            </th>
                            <td>
                                {{ $promocode->use_count }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.promocode.fields.from_date') }}
                            </th>
                            <td>
                                {{ $promocode->from_date }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.promocode.fields.expiration') }}
                            </th>
                            <td>
                                {{ $promocode->expiration }}
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="form-group">
                @can('promocode_edit')
                    <a href="{{ route('admin.promocodes.edit', $promocode) }}" class="btn btn-indigo mr-2">
                        {{ trans('global.edit') }}
                    </a>
                @endcan
                <a href="{{ route('admin.promocodes.index') }}" class="btn btn-secondary">
                    {{ trans('global.back') }}
                </a>
            </div>
        </div>
    </div>
</div>
@endsection